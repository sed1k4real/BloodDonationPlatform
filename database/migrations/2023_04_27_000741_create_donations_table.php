<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id('don_ref');
            $table->date('don_date');
            $table->unsignedBigInteger('room_ref');
            $table->unsignedBigInteger('donor_ref');
            $table->integer('don_qty');
            $table->integer('type');
            $table->unsignedBigInteger('skd_ref');
            $table->unsignedBigInteger('camp_ref');
            $table->unsignedBigInteger('user_ref');
            $table->timestamps();
            
            $table->foreign('donor_ref')->references('id')->on('donors')->onDelete('cascade');
            $table->foreign('skd_ref')->references('skd_num')->on('schedules')->onDelete('cascade');
            $table->foreign('room_ref')->references('room_num')->on('rooms')->onDelete('cascade');
            $table->foreign('camp_ref')->references('id')->on('campaigns')->onDelete('cascade');
            $table->foreign('user_ref')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donations');
    }
}
