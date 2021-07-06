<?php

use Illuminate\Database\Seeder;
use App\Grados;

class GradosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grados::create([
            'abreviatura' => 'Dipl.',
            'nombre' => 'Diplomado',
            'estado' => 1,
        ]);
        Grados::create([
            'abreviatura' => 'Dr.',
            'nombre' => 'Doctor',
            'estado' => 1,
        ]);
        Grados::create([
            'abreviatura' => 'Mg.',
            'nombre' => 'Magister',
            'estado' => 1,
        ]);
        Grados::create([
            'abreviatura' => 'Ing.',
            'nombre' => 'Ingeniero',
            'estado' => 1,
        ]);
        Grados::create([
            'abreviatura' => 'Cat.',
            'nombre' => 'Catedrático',
            'estado' => 1,
        ]);
        Grados::create([
            'abreviatura' => 'Lic.',
            'nombre' => 'Licenciado',
            'estado' => 1,
        ]);
        Grados::create([
            'abreviatura' => 'Bach.',
            'nombre' => 'Bachiller',
            'estado' => 1,
        ]);
        Grados::create([
            'abreviatura' => 'Téc.',
            'nombre' => 'Técnico',
            'estado' => 1,
        ]);
    }
}
