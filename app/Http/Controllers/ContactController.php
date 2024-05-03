<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contactanos;
use App\Unidad;
use App\Consulta;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $info = Contactanos::where('estado',1)->first();
      $unidad = Unidad::where('estado',1)->get();
    //   dd($unidad);
      return view('contact')->with(compact('info','unidad'));
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
        DB::beginTransaction();
        try{
            $consulta = new Consulta();
            $consulta->nombre=$request->nombre;
            $consulta->correo=$request->correo;
            $consulta->mensaje=$request->mensaje;
            $consulta->idUnidad=$request->idUnidad;
            $consulta->fecha=date('Y-m-d H:i:s');
            $consulta->estado='1';
            $consulta->save();
            DB::commit();
            return redirect()->route('contact.index')->with('mensaje_consulta_guardada', 'Consulta enviada con éxito.');
            
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
