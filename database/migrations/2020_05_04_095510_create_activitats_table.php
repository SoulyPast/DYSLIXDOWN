<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activitats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom_activitat');
            $table->string('descripcio_activiatat');
            $table->boolean('acabat')->default(true);
            $table->boolean('public')->default(true);
            $table->integer('codi');
            $table->unsignedBigInteger('user_id')->unisgned();
            $table->unsignedInteger('nivell_id')->unisgned();
            $table->unsignedInteger('tipus_id')->unisgned();
            $table->timestamps();
        });

        Schema::table('activitats', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('nivell_id')->references('id')->on('nivells');
            $table->foreign('tipus_id')->references('id')->on('tipuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activitats');
    }
}
