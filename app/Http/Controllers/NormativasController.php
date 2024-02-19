<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contactanos;
use App\Proceso;
use App\Normativa;




class NormativasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $info = Contactanos::where('estado',1)->first();
      
      // ************************ Normativas VIGENTES ************************************

      // Obtengo los idProceso agrupados de todas las normativas existentes
      $idProceso_normativas_vigentes = Normativa::select('normativas.idProceso')->where('estado',1)->where('vigente',1)->groupBy('normativas.idProceso')->get();
    
      //Creo array y almaceno esos id
      $array_normVigentes_idProceso= collect();
      
      for($i=0;$i<count($idProceso_normativas_vigentes);$i++)
      {
        $array_normVigentes_idProceso[$i] = $idProceso_normativas_vigentes[$i]->idProceso;
      }

      //Obtengo los procesos que sean mencionados dentro de los idProceso de las normativas
      $procesos_normVigentes = Proceso::whereIn('idProceso',$array_normVigentes_idProceso)->where('estado',1)->get();

      //Incluyo las normativas por cada proceso respectivo
      foreach ($procesos_normVigentes as $key => $proceso) {
        $proceso->normativas = Normativa::where('estado',1)->where('normativas.idProceso',$proceso->idProceso)->get();
      } 

      

      // ************************ Normativas PASADAS ************************************

      // Obtengo los idProceso agrupados de todas las normativas existentes
      $idProceso_normativas_pasadas = Normativa::select('normativas.idProceso')->where('estado',1)->where('vigente',0)->groupBy('normativas.idProceso')->get();
    
      //Creo array y almaceno esos id
      $array_normPasadas_idProceso= collect();
      
      for($i=0;$i<count($idProceso_normativas_pasadas);$i++)
      {
        $array_normPasadas_idProceso[$i] = $idProceso_normativas_pasadas[$i]->idProceso;
      }

      //Obtengo los procesos que sean mencionados dentro de los idProceso de las normativas
      $procesos_normPasadas = Proceso::whereIn('idProceso',$array_normPasadas_idProceso)->where('estado',1)->get();

      //Incluyo las normativas por cada proceso respectivo
      foreach ($procesos_normPasadas as $key => $proceso) {
        $proceso->normativas = Normativa::where('estado',1)->where('normativas.idProceso',$proceso->idProceso)->get();
      } 
         
      
      return view('normativas') -> with(compact('info', 'procesos_normVigentes','procesos_normPasadas'));
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
