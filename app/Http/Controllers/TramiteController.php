<?php

namespace App\Http\Controllers;

use App\Tramite;
use Illuminate\Http\Request;

class TramiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tramite=Tramite::get();
        return view('tablas.Tramites.index',compact('tramite'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tablas.Tramites.create');
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
        $tramite = new Tramite();
        $tramite->icono=$request->icono;
        $tramite->titulo=$request->titulo;
        $tramite->descripcion=$request->descripcion;
        $tramite->ruta=$request->ruta;
        $tramite->estado='1';
        $tramite->save();
        return redirect()->route('tramite.index')->with('datos', 'Registro Nuevo Guardado!!');
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
        $tramite=Tramite::findOrFail($id);
        return view('tablas.Tramites.edit',compact('tramite'));
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
        $tramite =Tramite::findOrFail($id);
        $tramite->icono=$request->icono;
        $tramite->titulo=$request->titulo;
        $tramite->descripcion=$request->descripcion;
        $tramite->ruta=$request->ruta;
        $tramite->estado='1';
        $tramite->save();

        return redirect()->route('tramite.index')->with('datos', 'Registro Actualizado!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tramite=Tramite::findOrFail($id);
        if($tramite->estado==1){
            $tramite->estado='0';
            $tramite->save();
            return redirect()->route('tramite.index')->with('datos','Registro Desactivado!!');
        }else{
            $tramite->estado='1';
            $tramite->save();
            return redirect()->route('tramite.index')->with('datos','Registro Activado!!');
        }
    }
}
