<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id('skd_num');
            $table->unsignedBigInteger('plan_ref');
            $table->unsignedMediumInteger('date');
            // $table->unsignedMediumInteger('time');
            $table->integer('dons_num');
            $table->timestamps();

            $table->foreign('plan_ref')->references('plan_num')->on('planings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
