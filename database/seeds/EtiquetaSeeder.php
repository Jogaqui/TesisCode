<?php

use Illuminate\Database\Seeder;
use App\Etiqueta;

class EtiquetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // $etiquetas = factory(Etiqueta::class, 10)->create();
      Etiqueta::create([
          'descripcion' => 'Matrículas',
          'estado' => 1,
      ]);
      Etiqueta::create([
          'descripcion' => 'Grados',
          'estado' => 1,
      ]);
      Etiqueta::create([
          'descripcion' => 'Títulos',
          'estado' => 1,
      ]);
      Etiqueta::create([
          'descripcion' => 'Certificados',
          'estado' => 1,
      ]);
      Etiqueta::create([
          'descripcion' => 'Notas',
          'estado' => 1,
      ]);
    }
}
