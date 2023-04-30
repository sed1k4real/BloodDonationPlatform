<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('don_ref');
            $table->string('status');
            $table->string('factor1')->nullable();
            $table->string('factor2')->nullable();
            $table->string('factor3')->nullable();
            $table->string('factor4')->nullable();
            $table->string('factor5')->nullable();
            $table->timestamps();

            $table->foreign('don_ref')->references('don_ref')->on('donations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
