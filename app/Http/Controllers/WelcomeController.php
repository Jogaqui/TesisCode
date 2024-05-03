<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publicacion;
use App\Etiqueta;
use App\Contactanos;
use App\Multimedia;
use App\Publicacion_Etiqueta;
use App\Unidad;
use App\Tramite;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $publicaciones = Publicacion::orderBy('fecha', 'DESC')->where('estado', 1)->skip(0)->take(3)->get();
      $unidades = Unidad::where('estado', 1)->get();
      $top = Publicacion::orderBy('fecha', 'DESC')->where('estado', 1)->skip(0)->take(3)->get();
      $mejoresPublicaciones = Publicacion::orderBy('vistas', 'DESC')->where('estado', 1)->skip(0)->take(3)->get();
      $etiquetas = Etiqueta::all();
      $info = Contactanos::where('estado',1)->first();
      $tramites = Tramite::join('iconos', 'iconos.idIcono', 'tramites.idIcono')->limit(3)->get();
      $multimedias = Multimedia::where('principal', 1)->where('estado', 1)->get();
      return view('welcome') -> with(compact('publicaciones', 'unidades', 'top', 'etiquetas', 'info', 'mejoresPublicaciones','tramites', 'multimedias'));
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
      $unidades = Unidad::where('estado', 1)->get();
      $top = Publicacion::orderBy('fecha', 'DESC')->where('estado', 1)->skip(0)->take(3)->get();
      $mejoresPublicaciones = Publicacion::orderBy('vistas', 'DESC')->where('estado', 1)->skip(0)->take(3)->get();
      $etiquetas = Etiqueta::all();
      $info = Contactanos::where('estado',1)->first();
      $etiquetasPost = Publicacion_Etiqueta::where('publicacion_etiqueta.idPublicacion', $id)->get();
      return view('post') -> with(compact('post', 'top', 'etiquetas', 'info', 'mejoresPublicaciones', 'etiquetasPost', 'unidades'));
    }

     public function showByTag($id)
     {
       $tag = Etiqueta::findOrFail($id);
       $unidades = Unidad::where('estado', 1)->get();
       $publicaciones = Publicacion::join('publicacion_etiqueta', 'publicacion_etiqueta.idPublicacion', 'publicaciones.idPublicacion')
       ->orderBy('fecha', 'DESC')->where('publicacion_etiqueta.idEtiqueta', $tag->idEtiqueta)->where('estado', 1)->paginate(5);
       $top = Publicacion::orderBy('fecha', 'DESC')->where('estado', 1)->skip(0)->take(3)->get();
       $mejoresPublicaciones = Publicacion::orderBy('vistas', 'DESC')->where('estado', 1)->skip(0)->take(3)->get();
       $etiquetas = Etiqueta::all();
       $info = Contactanos::where('estado',1)->first();
       return view('posts') -> with(compact('publicaciones', 'top', 'etiquetas', 'info', 'mejoresPublicaciones', 'tag', 'unidades'));
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
