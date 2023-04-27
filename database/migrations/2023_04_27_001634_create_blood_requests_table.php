<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_requests', function (Blueprint $table) {
            $table->id('rqst_ref');
            $table->date('rqst_date');
            $table->unsignedBigInteger('rec_ref');
            $table->unsignedBigInteger('blood_type');
            $table->integer('rqst_qty');
            $table->string('status');
            $table->date('date_limit')->nullable();
            $table->date('date_deliv')->nullable();
            
            $table->timestamps();

            $table->foreign('blood_type')->references('ref')->on('blood_categories')->onDelete('cascade');
            $table->foreign('rec_ref')->references('rec_id')->on('receivers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blood_requests');
    }
}
