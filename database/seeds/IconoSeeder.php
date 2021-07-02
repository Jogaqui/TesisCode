<?php

use Illuminate\Database\Seeder;
use App\Icono;

class IconoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Icono::create([
          'nombre' => 'blackboard',
          'estado' => 1,
      ]);
      Icono::create([
          'nombre' => 'books',
          'estado' => 1,
      ]);
      Icono::create([
          'nombre' => 'earth-globe',
          'estado' => 1,
      ]);
      Icono::create([
          'nombre' => 'envelope',
          'estado' => 1,
      ]);
      Icono::create([
          'nombre' => 'exam',
          'estado' => 1,
      ]);
      Icono::create([
          'nombre' => 'mortarboard',
          'estado' => 1,
      ]);
      Icono::create([
          'nombre' => 'phone-call',
          'estado' => 1,
      ]);
      Icono::create([
          'nombre' => 'placeholder',
          'estado' => 1,
      ]);
      Icono::create([
          'nombre' => 'professor',
          'estado' => 1,
      ]);
      Icono::create([
          'nombre' => 'smartphone',
          'estado' => 1,
      ]);
    }
}
