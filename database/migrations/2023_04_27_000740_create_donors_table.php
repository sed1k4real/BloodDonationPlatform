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
            $table->string('last_name', 64);
            $table->string('first_name', 64);
            $table->string('address');
            $table->integer('tel');
            $table->string('email')->unique();
            $table->string('gender', 8);
            $table->string('chro_dis');
            $table->unsignedBigInteger('blood_type');
            $table->timestamps();

            $table->foreign('blood_type')->references('ref')->on('blood_categories')->onDelete('cascade');
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
