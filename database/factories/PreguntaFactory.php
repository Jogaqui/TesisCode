<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pregunta;
use Faker\Generator as Faker;

$factory->define(Pregunta::class, function (Faker $faker) {
  return [
    'idUnidad' => $faker->numberBetween(1, 6),
    'titulo' => $faker->sentence(),
    'texto' => $faker->paragraph(),
    'fecha' => $faker->date(),
    'creador' => $faker->name(),
    'archivo' => '',
    'vistas' => $faker->randomNumber(),
    'estado' => 1,
  ];
});
