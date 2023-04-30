<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->date('deadline');
            $table->unsignedBigInteger('rec_ref');
            $table->unsignedBigInteger('admin_ref');
            $table->unsignedBigInteger('blood_type');
            $table->integer('qty')->nullable();
            $table->timestamps();

            $table->foreign('blood_type')->references('ref')->on('blood_categories')->onDelete('cascade');
            $table->foreign('rec_ref')->references('id')->on('receivers')->onDelete('cascade');
            $table->foreign('admin_ref')->references('id')->on('admins')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
