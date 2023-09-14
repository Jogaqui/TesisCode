<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contactanos;
use App\Manual;
use App\Tramite;
use App\URAA_TipoUsuario;

class ProcedureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $info = Contactanos::where('estado',1)->first();
      $tramites = Tramite::join('iconos', 'iconos.idIcono', 'tramites.idIcono')->get();

      // $manuales = Manual::where('estado',1)->get();
      $idTipo_usuario_manuales = Manual::select('manuales.idTipo_usuario')->where('estado',1)->groupBy('manuales.idTipo_usuario')->get();
    
      for($i=0;$i<count($idTipo_usuario_manuales);$i++)
      {
        $array_manuales_idTipo_usu[$i] = $idTipo_usuario_manuales[$i]->idTipo_usuario;
      }
      $tipos_usuario = URAA_TipoUsuario::whereIn('idTipo_usuario',$array_manuales_idTipo_usu)->where('tipo_usuario.estado',1)->get();
      foreach ($tipos_usuario as $key => $tipo_usuario) {
        $tipo_usuario->manuales = Manual::where('estado',1)->where('manuales.idTipo_usuario',$tipo_usuario->idTipo_usuario)->get();
      }      
      
      return view('procedure') -> with(compact('info', 'tramites','tipos_usuario'));
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
