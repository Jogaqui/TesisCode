<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id('idConsulta');
            $table->string('nombre');
            $table->string('correo');
            $table->text('mensaje');
            $table->date('fecha');
            $table->bigInteger('idUnidad')->unsigned();
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
        Schema::dropIfExists('consultas');
    }
}
