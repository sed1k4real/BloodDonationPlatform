<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('last_name', 128);
            $table->string('first_name', 128);
            $table->date('birthdate');
            $table->unsignedBigInteger('gender_ref');
            $table->unsignedBigInteger('role_ref');
            $table->string('tel');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 128);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('role_ref') ->references('role_num')->on('roles')->onDelete('cascade');
            $table->foreign('gender_ref') ->references('gender_num')->on('genders')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
