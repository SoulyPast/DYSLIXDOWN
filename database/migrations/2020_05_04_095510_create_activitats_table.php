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
            $table->boolean('acabat')->default(false);
            $table->boolean('public');
            $table->integer('codi');
            $table->unsignedBigInteger('user_id')->unisgned();
            $table->unsignedInteger('nivell_id')->unisgned();
            $table->unsignedInteger('tipus_id')->unisgned();
            $table->timestamps();
        });

        Schema::table('activitats', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
            $table->foreign('nivell_id')->references('id')->on('nivells')->onDelete('cascade');;
            $table->foreign('tipus_id')->references('id')->on('tipuses')->onDelete('cascade');;
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
