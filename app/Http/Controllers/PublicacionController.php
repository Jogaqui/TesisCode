<?php

namespace App\Http\Controllers;
use App\Publicacion;
use App\Etiqueta;
use App\Publicacion_Etiqueta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publicacion=Publicacion::get();
        // dd($publicacion);
        return view('tablas.Publicaciones.index',compact('publicacion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $etiqueta=Etiqueta::get();
        // dd($etiqueta);
        return view('tablas.Publicaciones.create',compact('etiqueta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data=request()->validate([
        //     'descripcion'=>'required|max:40'
        // ],
        // [
        //     'descripcion.required'=>'Ingrese Descripción',
        // ]);
        $publicacion = new Publicacion();
        // $img = $request->file('imagen');
        // $nombre=$img->getClientOriginalName();
        // $img->move('/uploads/', $nombre);
        $publicacion->imagen=$request->imagen;
        $publicacion->titulo=$request->titulo;
        $publicacion->fecha=$request->fecha;  
        $publicacion->creador=$request->creador; 
        $publicacion->texto=$request->texto;
        $publicacion->archivo=$request->archivo;

        // bucle para guardar la relacion Publicacion/Etiqueta
        $etiquetas=$request->idUnidad;
        // dd( $etiquetas);
        foreach($etiquetas as $item){

        }
        //fin de bucle

        $publicacion->estado='1';
        $publicacion->save();
        return redirect()->route('publicacion.index')->with('datos', 'Registro Nuevo Guardado!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('publicacion.index')->with('datos','Acción Cancelada!!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publicacion=Publicacion::findOrFail($id);
        return view('tablas.Publicaciones.edit',compact('publicacion')); 
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
        // $data=request()->validate([
        //     'descripcion'=>'required|max:40'
        // ],
        // [
        //     'descripcion.required'=>'Ingrese Descripcion',
        // ]);
        $publicacion = Publicacion::findOrFail($id);
        $publicacion->imagen=$request->imagen;
        $publicacion->titulo=$request->titulo;
        $publicacion->texto=$request->texto;
        $publicacion->estado='1';
        $publicacion->save();
        return redirect()->route('publicacion.index')->with('datos', 'Registro Actualizado!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publicacion=Publicacion::findOrFail($id);
        if($publicacion->estado==1){
            $publicacion->estado='0';
            $publicacion->save();
            return redirect()->route('publicacion.index')->with('datos','Registro Desactivado!!');
        }else{
            $publicacion->estado='1';
            $publicacion->save();
            return redirect()->route('publicacion.index')->with('datos','Registro Activado!!');
        }
    }


    public function cancelar(){
        return redirect()->route('publicacion.index')->with('datos','Acción Cancelada!!');
    }
}
