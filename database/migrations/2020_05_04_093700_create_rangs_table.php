<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rangs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Nivell');
            $table->integer('Exp');
            $table->unsignedBigInteger('user_id')->unisgned();
            $table->timestamps();
        });

        Schema::table('rangs', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rangs');
    }
}
