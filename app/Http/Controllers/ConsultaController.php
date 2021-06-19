<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Consulta;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consulta=Consulta::get();
        return view('tablas.Consultas.index',compact('consulta'));
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
        // dd($request->correo);
        DB::beginTransaction();
        try{
            $consulta = new Consulta();
            $consulta->nombre=$request->nombre;
            $consulta->correo=$request->correo;
            $consulta->mensaje=$request->mensaje;
            $consulta->fecha=date('Y-m-d H:i:s');
            $consulta->estado='1';
            $consulta->save();
            DB::commit();
            return redirect()->route('contact.index')->with('datos', 'Registro Nuevo Guardado!!');
        }catch(Exception $e){
            DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consulta=Consulta::findOrFail($id);
        return view('tablas.Consultas.message',compact('consulta'));
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        DB::beginTransaction();
        try{
            $consulta=Consulta::findOrFail($id);
            if($consulta->estado==1){
                $consulta->estado='0';
                $consulta->save();
                DB::commit();
                return redirect()->route('consulta.index')->with('datos','Registro Desactivado!!');
            }else{
                $consulta->estado='1';
                $consulta->save();
                DB::commit();
                return redirect()->route('consulta.index')->with('datos','Registro Activado!!');
            }
        }catch(Exception $e){
            DB::rollback();
        }


    }
}
