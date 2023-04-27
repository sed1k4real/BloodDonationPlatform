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
            $table->integer('room_ref');
            $table->integer('donor_ref');
            $table->integer('don_qty');
            $table->integer('type');
            $table->integer('skd_ref');
            $table->integer('camp_ref');
            $table->integer('user_ref');
            $table->timestamps();
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
