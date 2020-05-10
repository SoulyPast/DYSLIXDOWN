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
            $table->string('opcio1')->nullable();
            $table->string('opcio2')->nullable();
            $table->string('opcio3')->nullable();
            $table->string('opcio4')->nullable();
            $table->string('opcio5')->nullable();
            $table->string('opcio6')->nullable();
            $table->string('opcio7')->nullable();
            $table->timestamps();
        });

        Schema::table('exercicis', function ($table)
        {
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
        Schema::dropIfExists('exercicis');
    }
}
