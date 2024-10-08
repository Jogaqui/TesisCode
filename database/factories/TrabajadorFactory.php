<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Trabajador;
use Faker\Generator as Faker;

$factory->define(Trabajador::class, function (Faker $faker) {
    return [
      'apPaterno' => $faker->lastName,
      'apMaterno' => $faker->lastName,
      'nombres' => $faker->firstName,
      'dni' => $faker->unique()->bothify('########'),
      // verificar el tipo de dato
      'puesto' => $faker->jobTitle,
      'correo' => $faker->unique()->safeEmail(), // password
      'telefono' => $faker->bothify('9########'),
      'imagen' => $faker->imageUrl(),
      'estado' => 1,
      'idGrado' => $faker->numberBetween(1, 8),
      'idUnidad' => $faker->numberBetween(1, 6),
    ];
});
