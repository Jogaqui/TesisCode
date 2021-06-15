<?php

namespace App\Http\Controllers;

use App\Etiqueta;
use Illuminate\Http\Request;

class EtiquetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etiqueta=Etiqueta::get();
        return view('tablas.Etiquetas.index',compact('etiqueta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tablas.Etiquetas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=request()->validate([
            'descripcion'=>'required|max:40'
        ],
        [
            'descripcion.required'=>'Ingrese Descripción',
        ]);
        $etiqueta = new Etiqueta();
        $etiqueta->descripcion=$request->descripcion;
        $etiqueta->estado='1';
        $etiqueta->save();
        return redirect()->route('etiqueta.index')->with('datos', 'Registro Nuevo Guardado!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $etiqueta=Etiqueta::findOrFail($id);
        return view('tablas.Etiquetas.edit',compact('etiqueta')); 
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
        $data=request()->validate([
            'descripcion'=>'required|max:40'
        ],
        [
            'descripcion.required'=>'Ingrese Descripcion',
        ]);
        $etiqueta = Etiqueta::findOrFail($id);
        $etiqueta->descripcion=$request->descripcion;
        $etiqueta->estado='1';
        $etiqueta->save();
        return redirect()->route('etiqueta.index')->with('datos', 'Registro Actualizado!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $etiqueta=Etiqueta::findOrFail($id);
        if($etiqueta->estado==1){
            $etiqueta->estado='0';
            $etiqueta->save();
            return redirect()->route('etiqueta.index')->with('datos','Registro Desactivado!!');
        }else{
            $etiqueta->estado='1';
            $etiqueta->save();
            return redirect()->route('etiqueta.index')->with('datos','Registro Activado!!');
        }
    }
}
