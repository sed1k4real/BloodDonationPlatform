<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('receiver_id');
            $table->unsignedBigInteger('admin_id')->nullable();;
            $table->unsignedBigInteger('blood_id');
            $table->integer('order_qty')->nullable();
            $table->date('deadline');
            $table->timestamps();

            $table->foreign('blood_id')
            ->references('id')
            ->on('blood_categories')
            ->onDelete('cascade');
            
            $table->foreign('receiver_id')
            ->references('id')
            ->on('receivers')
            ->onDelete('cascade');
            
            $table->foreign('admin_id')
            ->references('id')
            ->on('admins')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
