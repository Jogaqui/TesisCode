<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id('idPregunta');
            $table->bigInteger('idUnidad')->unsigned();
            $table->string('titulo');
            $table->text('texto');
            $table->date('fecha');
            $table->string('creador');
            $table->string('archivo');
            $table->integer('vistas');
            $table->tinyInteger('estado');

            $table->foreign('idUnidad')->references('idUnidad')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preguntas');
    }
}
