<?php

namespace App\Http\Controllers;

use App\Normativa;
use App\Icono;
use App\Proceso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Post;
use Illuminate\Http\UploadedFile;

class NormaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $normativas=Normativa::where('estado','1')->get();
        
        foreach ($normativas as $key => $normativa) {
             $normativa->proceso = Proceso::select('nombre')
             ->where('idProceso',$normativa->idProceso)
             ->first();
        }
        //return dd($manuales);      
      
        return view('tablas.Normativas.index', compact('normativas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $icono=Icono::get();
        $procesos = Proceso::where('estado',1)->get();
        return view('tablas.Normativas.create',compact('icono', 'procesos'));
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
            'titulo'=>'required|unique:normativas'
        ],
        [
            'titulo.required'=>'Ingrese Título',
        ]);


        DB::beginTransaction();
        try{
            $normativa = new Normativa();
            $normativa->titulo=$request->titulo;
            $normativa->descripcion=$request->descripcion;
            $normativa->idProceso=$request->proceso;
           
            $vigencia_bool = $request->vigente=='on'? 1 : 0;

            if(!empty($request->file('archivo'))){
                $archivo_file = $request->file('archivo');
                $nombre_archivo=$archivo_file->getClientOriginalName();      
                $archivo_file->storeAs("public/normativas", $nombre_archivo);
                
                $nombre_archivo_BD = "/storage/normativas/".$nombre_archivo;
                $normativa->archivo = $nombre_archivo_BD;
            } 
            
            $normativa->vigente = $vigencia_bool;
            $normativa->estado='1';
            $normativa->save();
            DB::commit();
            return redirect()->route('norma.index')->with('datos', 'Registro Nuevo Guardado!!');
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
        // $tramite=DB::table('tramites as t')
        // ->join('iconos as i','t.idIcono','=','i.idIcono')->where('t.idTramite',$id)->select('*')->get();
        $normativa=Normativa::findOrFail($id);
        // dd($tramite);
        $procesos = Proceso::where('estado',1)->get();

        $normativa_proceso = Proceso::select('nombre')
        ->where('idProceso',$normativa->idProceso)
        ->where('estado',1)
        ->first();

        $iconos=Icono::get();
        return view('tablas.Normativas.edit',compact('normativa','procesos','normativa_proceso','iconos'));
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

        DB::beginTransaction();
        try{
           
            $normativa =Normativa::findOrFail($id);

            $normativa->titulo=$request->titulo;
            $normativa->descripcion=$request->descripcion;
            $normativa->idProceso=$request->proceso;
          
            $vigencia_bool = $request->vigente=='on'? 1 : 0;
            
            //dd($request->file('archivo'));
            if(!empty($request->file('archivo'))){
                $archivo_file = $request->file('archivo');
                $nombre_archivo=$archivo_file->getClientOriginalName();      
                $archivo_file->storeAs("public/normativas", $nombre_archivo);
                
                $nombre_archivo_BD = "/storage/normativas/".$nombre_archivo;
                $normativa->archivo = $nombre_archivo_BD;
            }  
            
            $normativa->vigente = $vigencia_bool;
            $normativa->estado='1';
            $normativa->save();

            DB::commit();
            return redirect()->route('norma.index')->with('datos', 'T');
        }catch(Exception $e){
            DB::rollback();
        } 
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
            $normativa=Normativa::findOrFail($id);
            if($normativa->estado==1){
                $normativa->estado='0';
                $normativa->save();
                DB::commit();
                return redirect()->route('norma.index')->with('datos','D');
            }else{
                $normativa->estado='1';
                $normativa->save();
                DB::commit();
                return redirect()->route('norma.index')->with('datos','A');
            }
        }catch(Exception $e){
            DB::rollback();
        }
    }
}
