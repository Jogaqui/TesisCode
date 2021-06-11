<?php

namespace App\Http\Controllers;
use App\Unidad;
use App\Trabajador;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    const PAGINATION='4';
    public function index(Request $request)
    {
        $buscarpor= $request->buscarpor;
        $trabajador=Trabajador::where('estado','=','1')
        ->where('apPaterno', 'like', '%' .$buscarpor. '%')
        ->where('apMaterno', 'like', '%' .$buscarpor. '%')
        ->where('nombres', 'like', '%' .$buscarpor. '%')
        ->paginate($this::PAGINATION);
        return view('tablas.trabajadores.index', compact('trabajador','buscarpor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tablas.Trabajadores.create');
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
        $trabajador = new Trabajador();
        if(!empty($request->puesto)){
            $trabajador->apPaterno=$request->apPaterno;
            $trabajador->apMaterno=$request->apMaterno;
            $trabajador->nombres=$request->nombres;
            $trabajador->dni=$request->dni;
            $trabajador->puesto=$request->puesto;
            $trabajador->correo=$request->email;
            $trabajador->telefono=$request->telefono;
            $trabajador->idUnidad='1';
            $trabajador->estado='1';
        }else{
            $trabajador->apPaterno=$request->apPaterno;
            $trabajador->apMaterno=$request->apMaterno;
            $trabajador->nombres=$request->nombres;
            $trabajador->dni=$request->dni;
            $trabajador->correo=$request->email;
            $trabajador->telefono=$request->telefono;
            $trabajador->idUnidad='1';
            $trabajador->estado='1';
        }

        $trabajador->save();
        return redirect()->route('trabajador.index')->with('datos', 'Registro Nuevo Guardado!!');
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
        $trabajador=Trabajador::findOrFail($id);
        return view('tablas.Trabajadores.edit',compact('trabajador')); 
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
        //     'apellidos.required'=>'Ingrese Descripcion',
        // ]);
        $trabajador = Trabajador::findOrFail($id);
        if(!empty($request->puesto)){
            $trabajador->apPaterno=$request->apPaterno;
            $trabajador->apMaterno=$request->apMaterno;
            $trabajador->nombres=$request->nombres;
            $trabajador->dni=$request->dni;
            $trabajador->puesto=$request->puesto;
            $trabajador->correo=$request->email;
            $trabajador->telefono=$request->telefono;
            $trabajador->idUnidad='1';
            $trabajador->estado='1';
        }else{
            $trabajador->apPaterno=$request->apPaterno;
            $trabajador->apMaterno=$request->apMaterno;
            $trabajador->nombres=$request->nombres;
            $trabajador->dni=$request->dni;
            $trabajador->correo=$request->email;
            $trabajador->telefono=$request->telefono;
            $trabajador->idUnidad='1';
            $trabajador->estado='1';
        }
        $trabajador->save();
        return redirect()->route('trabajador.index')->with('datos', 'Registro Actualizado!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trabajador=Trabajador::findOrFail($id);
        $trabajador->estado='0';
        $trabajador->save();
        return redirect()->route('trabajador.index')->with('datos','Registro Eliminado!!');
    }
    public function confirmar($id)
    {
        $trabajador=Trabajador::findOrFail($id);
        return view('tablas.Trabajadores.confirmar',compact('trabajador'));
    }    
}
