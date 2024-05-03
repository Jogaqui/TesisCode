<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\Manual;
use App\Normativa;
use App\Publicacion;
use App\Multimedia;
use App\Pregunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $n_publicaciones = Publicacion::where('estado',1)->count();
        $n_manuales = Manual::where('estado',1)->count();
        $n_normativas = Normativa::where('estado',1)->count();
        $n_multimedias = Multimedia::where('estado',1)->count();
        $n_faq = Pregunta::where('estado',1)->count();

        $n_consultas_pendientes = Consulta::where('estado',1)->count();
        $n_consultas_total = Consulta::count();
        $porcentaje_consultas_pendientes = ($n_consultas_pendientes/$n_consultas_total)*100;

        $query_vistas_totales_publicaciones = Publicacion::select(DB::raw('SUM(publicaciones.vistas) as vistas'))->where('estado',1)->first();
        $n_vistas_totales_publicaciones = intval($query_vistas_totales_publicaciones->vistas);

        return view('home', compact(
            'n_publicaciones',
            'n_manuales',
            'n_normativas',
            'n_multimedias',
            'n_faq',

            'n_consultas_pendientes',
            'n_consultas_total',
            'porcentaje_consultas_pendientes',
            'n_vistas_totales_publicaciones'
        ));
    }
}
