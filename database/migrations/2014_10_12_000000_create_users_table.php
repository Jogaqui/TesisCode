<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('usu_apepaterno');
            $table->string('usu_apematerno');
            $table->string('usu_nombres');
            $table->string('usu_email');
            $table->string('usu_login');
            $table->string('password');
            $table->string('usu_dni',10);
            $table->bigInteger('usu_rol');
            $table->bigInteger('idfacultad')->default(0);
            $table->boolean('usu_estado')->default(1);
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
        Schema::dropIfExists('users');
    }
}
