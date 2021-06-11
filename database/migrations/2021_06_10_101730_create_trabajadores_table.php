<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajadores', function (Blueprint $table) {
            $table->id('idTrabajador');
            $table->string('apPaterno');
            $table->string('apMaterno');
            $table->string('nombres');
            $table->char('dni',8);
            $table->string('puesto')->nullable();
            $table->string('correo');
            $table->char('telefono',9);
            $table->tinyInteger('estado');
            $table->bigInteger('idUnidad')->unsigned();
            $table->foreign('idUnidad')->references('idUnidad')->on('unidades');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabajadores');
    }
}
