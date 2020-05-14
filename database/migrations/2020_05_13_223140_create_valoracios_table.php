<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValoraciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valoracios', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('stars');
            $table->unsignedBigInteger('user_id')->unisgned();
            $table->unsignedInteger('activitat_id')->unisgned();
            $table->timestamps();
        });

        Schema::table('valoracios', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
            $table->foreign('activitat_id')->references('id')->on('activitats')->onDelete('cascade');;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('valoracios');
    }
}
