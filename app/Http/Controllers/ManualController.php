<?php

namespace App\Http\Controllers;

use App\Manual;
use App\Icono;
use App\URAA_TipoUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Post;
use Illuminate\Http\UploadedFile;

class ManualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manuales=Manual::where('estado','1')->get();
        
        foreach ($manuales as $key => $manual) {
             $manual->tipo_usuario = URAA_TipoUsuario::select('tipo_usuario.nombre')
             ->where('tipo_usuario.idTipo_usuario',$manual->idTipo_usuario)
             ->where('tipo_usuario.estado',1)
             ->first();
        }
        //return dd($manuales);      
      
        return view('tablas.Manuales.index', compact('manuales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $icono=Icono::get();
        $tipos_usuario = URAA_TipoUsuario::where('tipo_usuario.estado',1)->get();
        return view('tablas.Manuales.create',compact('icono', 'tipos_usuario'));
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
            'titulo'=>'required|unique:manuales'
        ],
        [
            'titulo.required'=>'Ingrese Título',
        ]);


        DB::beginTransaction();
        try{
            $manual = new Manual();
            $manual->titulo=$request->titulo;
            $manual->titulo_abrev=$request->titulo_abrev;
            $manual->descripcion=$request->descripcion;
            $manual->idTipo_usuario=$request->tipo_usuario;
           
            if(!empty($request->file('archivo'))){
                $archivo_file = $request->file('archivo');
                $nombre_archivo=$archivo_file->getClientOriginalName();      
                $archivo_file->storeAs("public/manuales", $nombre_archivo);
                
                $nombre_archivo_BD = "/storage/manuales/".$nombre_archivo;
                $manual->ruta_manual = $nombre_archivo_BD;
            } 
            
            $manual->estado='1';
            $manual->save();
            DB::commit();
            return redirect()->route('manual.index')->with('datos', 'Registro Nuevo Guardado!!');
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
        $manual=Manual::findOrFail($id);
        // dd($tramite);
        $tipos_usuario = URAA_TipoUsuario::where('tipo_usuario.estado',1)->get();

        $manual_tipo_usuario = URAA_TipoUsuario::select('tipo_usuario.nombre')
        ->where('tipo_usuario.idTipo_usuario',$manual->idTipo_usuario)
        ->where('tipo_usuario.estado',1)
        ->first();

        $iconos=Icono::get();
        return view('tablas.Manuales.edit',compact('manual','tipos_usuario','manual_tipo_usuario','iconos'));
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
           
            $manual =Manual::findOrFail($id);

            $manual->titulo=$request->titulo;
            $manual->titulo_abrev=$request->titulo_abrev;
            $manual->descripcion=$request->descripcion;
            $manual->idTipo_usuario=$request->tipo_usuario;
          
            
            //dd($request->file('archivo'));
            if(!empty($request->file('archivo'))){
                $archivo_file = $request->file('archivo');
                $nombre_archivo=$archivo_file->getClientOriginalName();      
                $archivo_file->storeAs("public/manuales", $nombre_archivo);
                
                $nombre_archivo_BD = "/storage/manuales/".$nombre_archivo;
                $manual->ruta_manual=$nombre_archivo_BD;
            } 
            
            $manual->estado='1';
            $manual->save();

            DB::commit();
            return redirect()->route('manual.index')->with('datos', 'T');
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
            $manual=Manual::findOrFail($id);
            if($manual->estado==1){
                $manual->estado='0';
                $manual->save();
                DB::commit();
                return redirect()->route('manual.index')->with('datos','D');
            }else{
                $manual->estado='1';
                $manual->save();
                DB::commit();
                return redirect()->route('manual.index')->with('datos','A');
            }
        }catch(Exception $e){
            DB::rollback();
        }
    }
}
