<?php

namespace App\Http\Controllers;

use App\Ubigeo_Provincia;
use Illuminate\Http\Request;

class UbigeoDepartamentoController extends Controller
{
    public function provincias($departamento)
    {
        $str_id_departamento = $departamento < 10 ? "0".$departamento : $departamento;
        $provincias = Ubigeo_Provincia::where('department_id', $str_id_departamento)->get();
        return response()->json(['provincias' => $provincias]);
    }
}
