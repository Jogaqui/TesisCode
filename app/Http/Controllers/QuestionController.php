<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publicacion;
use App\Etiqueta;
use App\Contactanos;
use App\Publicacion_Etiqueta;
use App\Unidad;
use App\Pregunta;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $preguntas = Pregunta::where('idUnidad', $id)->orderBy('fecha', 'DESC')->where('estado', 1)->paginate(5);
      $unidades = Unidad::where('estado', 1)->get();
      $top = Publicacion::orderBy('fecha', 'DESC')->where('estado', 1)->skip(0)->take(3)->get();
      $mejoresPublicaciones = Publicacion::orderBy('vistas', 'DESC')->where('estado', 1)->skip(0)->take(3)->get();
      $etiquetas = Etiqueta::all();
      $info = Contactanos::where('estado',1)->first();
      return view('questions') -> with(compact('preguntas', 'top', 'etiquetas', 'info', 'mejoresPublicaciones', 'unidades'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
