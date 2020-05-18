<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipusTable extends Migration
{
    public function up()
    {
        Schema::create('tipus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom_tipus');
            $table->string('descripcio_tipus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipus');
    }
}
