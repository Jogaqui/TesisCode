<?php

namespace App\Http\Controllers;

use App\Manual;
use App\Pregunta;
use App\Icono;
use App\Unidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Post;
use Illuminate\Http\UploadedFile;

class PreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preguntas=Pregunta::where('preguntas.estado','1')->get();
             
      
        return view('tablas.Preguntas.index', compact('preguntas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
 
        $unidades = Unidad::where('unidades.estado',1)->get();
        return view('tablas.Preguntas.create',compact('unidades'));
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
            'titulo'=>'required|unique:preguntas'
        ],
        [
            'titulo.required'=>'Ingrese Título',
        ]);


        DB::beginTransaction();
        try{
            $pregunta = new Pregunta();

            $nombreUsuario=Auth::user()->usu_nombreCompleto;


            $pregunta->titulo=$request->titulo;
            $pregunta->texto=$request->texto;
            $pregunta->idUnidad=$request->unidad;
            $pregunta->fecha=$request->fecha;
            $pregunta->creador=$nombreUsuario;
           
            if(!empty($request->file('archivo'))){
                $archivo_file = $request->file('archivo');
                $nombre_archivo=$archivo_file->getClientOriginalName();      
                $archivo_file->storeAs("public/preguntas", $nombre_archivo);
                
                $nombre_archivo_BD = "/storage/preguntas/".$nombre_archivo;
                $pregunta->archivo = $nombre_archivo_BD;
            } 
            
            $pregunta->estado='1';
            $pregunta->save();
            DB::commit();
            return redirect()->route('pregunta.index')->with('datos', 'Registro Nuevo Guardado!!');
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
        $pregunta=Pregunta::findOrFail($id);
        // dd($tramite);
        
        
        $unidades = Unidad::where('unidades.estado',1)->get();
       
        return view('tablas.Preguntas.edit',compact('pregunta','unidades'));
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
           
            $pregunta =Pregunta::findOrFail($id);

            $nombreUsuario=Auth::user()->usu_nombreCompleto;


            $pregunta->titulo=$request->titulo;
            $pregunta->texto=$request->texto;
            $pregunta->idUnidad=$request->unidad;
            $pregunta->fecha=$request->fecha;
            $pregunta->creador=$nombreUsuario;
          
            
            //dd($request->file('archivo'));
            
            if(!empty($request->file('archivo'))){
                $archivo_file = $request->file('archivo');
                $nombre_archivo=$archivo_file->getClientOriginalName();      
                $archivo_file->storeAs("public/preguntas", $nombre_archivo);
                
                $nombre_archivo_BD = "/storage/preguntas/".$nombre_archivo;
                $pregunta->archivo = $nombre_archivo_BD;
            } 
            
            
            $pregunta->estado='1';
            $pregunta->save();

            DB::commit();
            return redirect()->route('pregunta.index')->with('datos', 'T');
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
            $pregunta=Pregunta::findOrFail($id);
            if($pregunta->estado==1){
                $pregunta->estado='0';
                $pregunta->save();
                DB::commit();
                return redirect()->route('pregunta.index')->with('datos','D');
            }else{
                $pregunta->estado='1';
                $pregunta->save();
                DB::commit();
                return redirect()->route('pregunta.index')->with('datos','A');
            }
        }catch(Exception $e){
            DB::rollback();
        }
    }
}
