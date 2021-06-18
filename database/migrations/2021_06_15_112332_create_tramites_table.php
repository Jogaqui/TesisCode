<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTramitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tramites', function (Blueprint $table) {
            $table->id('idTramite');
            // $table->string('icono');
            $table->string('titulo');
            $table->string('descripcion');
            $table->string('ruta');
            $table->tinyInteger('estado');
            $table->bigInteger('idIcono')->unsigned();
            $table->foreign('idIcono')->references('idIcono')->on('iconos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tramites');
    }
}
