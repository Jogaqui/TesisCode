<?php

namespace App\Http\Controllers;

use App\Ubigeo_Distrito;
use Illuminate\Http\Request;

class UbigeoProvinciaController extends Controller
{
    public function distritos($provincia)
    {
        $str_id_provincia = $provincia < 1000 ? "0".$provincia : $provincia;
        $distritos = Ubigeo_Distrito::where('province_id', $str_id_provincia)->get();
        return response()->json(['distritos' => $distritos]);
    }
}
