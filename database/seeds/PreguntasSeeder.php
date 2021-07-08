<?php

use Illuminate\Database\Seeder;
use App\Pregunta;

class PreguntasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $preguntas = factory(Pregunta::class, 20)->create();
    }
}
