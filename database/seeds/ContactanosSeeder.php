<?php

use Illuminate\Database\Seeder;
use App\Contactanos;

class ContactanosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Contactanos::create([
          'correo' => 'ort@unitru.edu.pe',
          'telefono' => '(044) 205377',
          'direccion' => 'Av. Juan Pablo II 3°Puerta',
          'estado' => 1,
      ]);
    }
}
