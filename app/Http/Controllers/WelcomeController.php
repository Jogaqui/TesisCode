<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publicacion;
use App\Etiqueta;
use App\Contactanos;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $publicaciones = Publicacion::orderBy('fecha', 'DESC')->where('estado', 1)->paginate(5);
      $top = Publicacion::orderBy('fecha', 'DESC')->where('estado', 1)->skip(0)->take(3)->get();
      $mejoresPublicaciones = Publicacion::orderBy('fecha', 'DESC')->where('estado', 1)->skip(0)->take(3)->get();
      $etiquetas = Etiqueta::all();
      $info = Contactanos::where('estado',1)->first();
      return view('welcome') -> with(compact('publicaciones', 'top', 'etiquetas', 'info', 'mejoresPublicaciones'));
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
      $post = Publicacion::findOrFail($id);
      $top = Publicacion::orderBy('fecha', 'DESC')->where('estado', 1)->skip(0)->take(3)->get();
      $mejoresPublicaciones = Publicacion::orderBy('fecha', 'DESC')->where('estado', 1)->skip(0)->take(3)->get();
      $etiquetas = Etiqueta::all();
      $info = Contactanos::where('estado',1)->first();
      return view('post') -> with(compact('post', 'top', 'etiquetas', 'info', 'mejoresPublicaciones'));
    }

     public function showByTag($id)
     {
       $tag = Etiqueta::findOrFail($id);
       $publicaciones = Publicacion::join('publicacion_etiqueta', 'publicacion_etiqueta.idPublicacion', 'publicaciones.idPublicacion')
       ->orderBy('fecha', 'DESC')->where('publicacion_etiqueta.idEtiqueta', $tag->idEtiqueta)->where('estado', 1)->paginate(5);
       $top = Publicacion::orderBy('fecha', 'DESC')->where('estado', 1)->skip(0)->take(3)->get();
       $mejoresPublicaciones = Publicacion::orderBy('fecha', 'DESC')->where('estado', 1)->skip(0)->take(3)->get();
       $etiquetas = Etiqueta::all();
       $info = Contactanos::where('estado',1)->first();
       return view('posts') -> with(compact('publicaciones', 'top', 'etiquetas', 'info', 'mejoresPublicaciones', 'tag'));
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
