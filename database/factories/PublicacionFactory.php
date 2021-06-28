<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Publicacion;
use Faker\Generator as Faker;

$factory->define(Publicacion::class, function (Faker $faker) {
    return [
      'imagen' => $faker->imageUrl(),
      'titulo' => $faker->sentence(),
      'fecha' => $faker->date(),
      'creador' => $faker->name(),
      'resumen' => $faker->paragraph(),
      'texto' => $faker->paragraph(),
      'archivo' => '',
      'estado' => 1,
    ];
});
