<?php

use Illuminate\Database\Seeder;
use App\Tramite;

class TramiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tramite::create([
            'titulo' => 'Obtención de certificado de estudios',
            'descripcion' => 'Trámite para solicitar la obtención de certificados de estudios digitales y físicos.',
            'ruta' => 'https://drt.unitru.edu.pe/registrar/tramite',
            'estado' => 1,
            'idIcono' => 5,
        ]);
        Tramite::create([
            'titulo' => 'Obtención de grado y título',
            'descripcion' => 'Trámite para solicitar el inicio del procedimiento para la obtención de grados y títulos.',
            'ruta' => 'https://drt.unitru.edu.pe/registrar/gradotitulo',
            'estado' => 1,
            'idIcono' => 6,
        ]);
        Tramite::create([
            'titulo' => 'Consultar trámite',
            'descripcion' => 'Si desea conocer el estado actual en el que se encuentra su trámite.',
            'ruta' => 'https://drt.unitru.edu.pe/consulta/tramite',
            'estado' => 1,
            'idIcono' => 9,
        ]);
    }
}
