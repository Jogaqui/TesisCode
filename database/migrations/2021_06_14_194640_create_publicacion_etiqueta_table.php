<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicacionEtiquetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicacion_etiqueta', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('idPublicacion')->unsigned();
            $table->bigInteger('idEtiqueta')->unsigned();
            
            $table->foreign('idPublicacion')->references('idPublicacion')->on('publicaciones')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('idEtiqueta')->references('idEtiqueta')->on('etiquetas')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publicacion_etiqueta');
    }
}
