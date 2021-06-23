<?php

use Illuminate\Database\Seeder;
use App\Unidad;

class UnidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Unidad::create([
          'descripcion' => 'Dirección de Registro Técnico',
          'estado' => 1,
      ]);
      Unidad::create([
          'descripcion' => 'Unidad de Matrículas',
          'estado' => 1,
      ]);
      Unidad::create([
          'descripcion' => 'Unidad de Notas y Certificados',
          'estado' => 1,
      ]);
      Unidad::create([
          'descripcion' => 'Unidad de Grados y Títulos',
          'estado' => 1,
      ]);
      Unidad::create([
          'descripcion' => 'Seccion de Actas y Archivo',
          'estado' => 1,
      ]);
    }
}
