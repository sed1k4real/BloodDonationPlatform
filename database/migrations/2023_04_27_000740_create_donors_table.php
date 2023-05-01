<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_ref');
            $table->unsignedBigInteger('blood_type');
            $table->string('chro_dis')->nullable();
            $table->timestamps();

            $table->foreign('user_ref')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('blood_type')
            ->references('ref')
            ->on('blood_categories')
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
        Schema::dropIfExists('donors');
    }
}
