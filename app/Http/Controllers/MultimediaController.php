<?php

namespace App\Http\Controllers;

use App\Manual;
use App\Icono;
use App\URAA_TipoUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Post;
use App\Multimedia;
use App\Tipo_Multimedia;
use App\URAA_Tipo_tramite;
use Illuminate\Http\UploadedFile;

class MultimediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $multimedias=Multimedia::where('estado','1')->get();
        
        foreach ($multimedias as $key => $multi) {

             $multi->tipo_multimedia = Tipo_Multimedia::select('descripcion')->where('idTipo_multimedia',$multi->idTipo_multimedia)
             ->first();

             $multi->tipo_tramite = URAA_Tipo_tramite::select('descripcion')->where('idTipo_tramite',$multi->idTipo_tramite)
             ->first();
        }
        //eturn dd($multimedias);      
      
        return view('tablas.Multimedia.index', compact('multimedias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $icono=Icono::get();
        $tipos_tramite = URAA_Tipo_tramite::whereIn('estado',[0,1])->get();
        $tipos_multimedia = Tipo_Multimedia::where('estado',1)->get();
        return view('tablas.Multimedia.create',compact('icono', 'tipos_tramite','tipos_multimedia'));
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
            'titulo'=>'required|unique:multimedia'
        ],
        [
            'titulo.required'=>'Ingrese Título',
        ]);


        DB::beginTransaction();
        try{
            $multimedia = new Multimedia();
            $multimedia->titulo=$request->titulo;
            $multimedia->resumen=$request->resumen;
            $multimedia->descripcion=$request->descripcion;
            $multimedia->idTipo_multimedia = $request->tipo_multimedia;
           
            if($request->tipo_tramite){
                if($request->tipo_tramite!=99){
                    $multimedia->idTipo_tramite = $request->tipo_tramite;
                }
            }
            
            $multimedia->ruta=$request->ruta;

            $principal_bool = $request->principal=='on'? 1 : 0;
            $multimedia->principal = $principal_bool;

            $multimedia->estado='1';
            $multimedia->save();
            DB::commit();
            return redirect()->route('multimedia.index')->with('datos', 'G');
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
        $multimedia=Multimedia::findOrFail($id);
        // dd($tramite);
        $tipos_tramite = URAA_Tipo_tramite::whereIn('estado',[0,1])->get();
        $tipos_multimedia = Tipo_Multimedia::where('estado',1)->get();

        $multimedia_tipo_multimedia = Tipo_Multimedia::where('idTipo_multimedia',$multimedia->idTipo_multimedia)->first();

        $multimedia_tipo_tramite = URAA_Tipo_tramite::where('idTipo_tramite',$multimedia->idTipo_tramite)->first();
        

        $iconos=Icono::get();
        return view('tablas.Multimedia.edit',compact('multimedia','tipos_tramite','tipos_multimedia','multimedia_tipo_tramite','multimedia_tipo_multimedia','iconos'));
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
           
            $multimedia =Multimedia::findOrFail($id);

            $multimedia->titulo=$request->titulo;
            $multimedia->resumen=$request->resumen;
            $multimedia->descripcion=$request->descripcion;
            $multimedia->idTipo_multimedia=$request->tipo_multimedia;
           
            if($request->tipo_tramite){
                if($request->tipo_tramite!=99){
                    $multimedia->idTipo_tramite = $request->tipo_tramite;
                }
            } 
            
            $multimedia->ruta=$request->ruta;

            $principal_bool = $request->principal=='on'? 1 : 0;
            $multimedia->principal = $principal_bool;

            $multimedia->estado='1';
            $multimedia->save();

            DB::commit();
            return redirect()->route('multimedia.index')->with('datos', 'T');
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
            $multimedia=Multimedia::findOrFail($id);
            if($multimedia->estado==1){
                $multimedia->estado='0';
                $multimedia->save();
                DB::commit();
                return redirect()->route('multimedia.index')->with('datos','D');
            }else{
                $multimedia->estado='1';
                $multimedia->save();
                DB::commit();
                return redirect()->route('multimedia.index')->with('datos','A');
            }
        }catch(Exception $e){
            DB::rollback();
        }
    }
}
