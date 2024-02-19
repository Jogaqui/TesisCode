<?php

namespace App\Http\Controllers;

use App\Manual;
use App\Normativa;
use App\Publicacion;
use App\Trabajador;
use Illuminate\Http\Request;

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
        $n_trabajadores = Trabajador::where('estado',1)->count();

        return view('home', compact(
            'n_publicaciones',
            'n_manuales',
            'n_normativas',
            'n_trabajadores'
        ));
    }
}
