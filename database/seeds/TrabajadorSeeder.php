<?php

use Illuminate\Database\Seeder;
use App\Trabajador;

class TrabajadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $trabajadores = factory(Trabajador::class, 10)->create();
    }
}
