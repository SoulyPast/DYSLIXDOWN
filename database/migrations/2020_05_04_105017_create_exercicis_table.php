<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExercicisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercicis', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('activitat_id')->unisgned();
            $table->string('resposta');
            $table->string('opcio1');
            $table->string('opcio2');
            $table->string('opcio3');
            $table->string('opcio4');
            $table->string('opcio5');
            $table->string('opcio6');
            $table->string('opcio7');
        });

        Schema::table('exercicis', function ($table)
        {
            $table->foreign('activitat_id')->references('id')->on('activitats');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exercicis');
    }
}
