<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('user_firstname');
            $table->string('user_lastname');
            $table->string('email')->unique();
            $table->string('rijksnr')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable()->default('NULL');
            $table->boolean('status')->default('1');
            $table->integer('address_id')->unsigned()->index()->nullable();
            $table->rememberToken();
            $table->timestamps();
            //$table->foreign('address_id')->references('id')->on('addresses');
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
