<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultats', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('puntuacio');
            $table->unsignedBigInteger('user_id')->unisgned();
            $table->unsignedInteger('activitat_id')->unisgned();
            $table->text('eroors')->nullable();
            $table->text('correctes')->nullable();
            $table->timestamps();
        });

        Schema::table('resultats', function (Blueprint $table) {
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
        Schema::dropIfExists('resultats');
    }
}
