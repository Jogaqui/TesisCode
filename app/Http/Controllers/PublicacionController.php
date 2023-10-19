<?php

namespace App\Http\Controllers;
use App\Publicacion;
use App\Etiqueta;
use App\Publicacion_Etiqueta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Post;
use Illuminate\Http\UploadedFile;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publicacion = Publicacion::where('estado',1)->orderBy('fecha','desc')->get();
        return view('tablas.Publicaciones.index',compact('publicacion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $etiqueta=Etiqueta::get();
        // dd($etiqueta);
        return view('tablas.Publicaciones.create',compact('etiqueta'));
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
            'titulo'=>'required|unique:publicaciones',
        ],
        [
            'titulo.required'=>'Ingrese título',
        ]);

       
        DB::beginTransaction();
        try{
            $publicacion = new Publicacion();
            // $img = $request->hasFile('archivo1');
            // dd($img);
            // $nombre=$img->getClientOriginalName();
            // $img->move('/uploads/', $nombre);
            $nombreUsuario=Auth::user()->usu_nombres." ".Auth::user()->usu_apepaterno;

            //return dd($nombreUsuario);

            $puestoUsuario=Auth::user()->trab_puesto;

            if(!empty($request->file('imagen'))){
                $img = $request->file('imagen');
                $nombre=$img->getClientOriginalName();      
                $img->storeAs("public/publicaciones", $nombre);
            }
            else{
                $nombre="logount".$publicacion->idPublicacion.".png";     
            }
          
            $nombreBD="/storage/publicaciones/".$nombre;
       
            $publicacion->imagen=$nombreBD;
            $publicacion->titulo=$request->titulo;
            $publicacion->fecha=date('Y-m-d H:i:s');
            
            if(!empty($request->file('archivo'))){
                $archivo_file = $request->file('archivo');
                $nombre_archivo=$archivo_file->getClientOriginalName();      
                $archivo_file->storeAs("public/publicaciones/archivos", $nombre_archivo);
                
                $nombre_archivo_BD = "/storage/publicaciones/archivos/".$nombre_archivo;
                $publicacion->archivo=$nombre_archivo_BD;
            } 
            
            $publicacion->creador=$nombreUsuario;
            $publicacion->creador_puesto=$puestoUsuario;
            $publicacion->resumen=$request->resumen;
            $publicacion->texto=$request->texto;

            $publicacion->vistas=0;
            $publicacion->estado=1;
            $publicacion->save();


            $etiquetas=$request->etiquetas;

            if($etiquetas){
                $publicacion= Publicacion::all();
                $lastPublicacion=$publicacion->last();
                $id=$lastPublicacion->idPublicacion;
                
                // dd( $etiquetas);
                // bucle para guardar la relacion Publicacion/Etiqueta
                for($i = 0; $i < sizeof($etiquetas); $i++){
                    $publicacion_etiqueta=new Publicacion_Etiqueta();
                    $publicacion_etiqueta->idPublicacion=$id;
                    $publicacion_etiqueta->idEtiqueta=$etiquetas[$i];
                    $publicacion_etiqueta->save();
                }
            }
          
           
            //fin de bucle
            DB::commit();
            return redirect()->route('publicacion.index')->with('datos', 'G');
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
        return redirect()->route('publicacion.index')->with('datos','C');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publicacion=Publicacion::findOrFail($id);
        //$idPublicacion=$publicacion->idPublicacion;
        
        // $etiquetas=Publicacion_Etiqueta::where('idPublicacion',$idPublicacion)->get();
        
        
        $etiquetas=Publicacion_Etiqueta::select('publicacion_etiqueta.idEtiqueta','publicacion_etiqueta.idPublicacion','etiquetas.estado','etiquetas.descripcion')->join('etiquetas','etiquetas.idEtiqueta','=','publicacion_etiqueta.idEtiqueta')->where('publicacion_etiqueta.idPublicacion',$id)->where('etiquetas.estado','1')->get();
        
        $etiqueta=Etiqueta::where('etiquetas.estado','1')->get();
        //dd($etiquetas);
        return view('tablas.Publicaciones.edit',compact('publicacion','etiquetas','etiqueta'));
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
        
            $publicacion = Publicacion::findOrFail($id);
            if ($publicacion->titulo==$request->titulo) {

                if(!empty($request->imagen)){
                    $img = $request->file('imagen');
                    // dd($img);
                    $nombre=$img->getClientOriginalName();
                    $nombreBD="/storage/publicaciones/".$nombre;
                    $img->storeAs("public/publicaciones", $nombre);
                    $publicacion->imagen=$nombreBD;
                }

                
                if(!empty($request->archivo)){
                    $archivo_file = $request->file('archivo');
                    $nombre_archivo=$archivo_file->getClientOriginalName();      
                    $archivo_file->storeAs("public/publicaciones/archivos", $nombre_archivo);
                
                    $nombre_archivo_BD = "/storage/publicaciones/archivos/".$nombre_archivo;
                    $publicacion->archivo=$nombre_archivo_BD;
                }
                // $img = $request->file('imagen');
                // $nombre=$img->getClientOriginalName();
                // $nombreBD="/storage/publicaciones/".$nombre;
                // $img->storeAs("public/publicaciones", $nombre);
                // $publicacion->imagen=$nombreBD;
                //$publicacion->titulo=$request->titulo;
                $publicacion->resumen=$request->resumen;
                $publicacion->texto=$request->texto;
              
                $etiquetas=$request->etiquetas;
                $publicacion_etiqueta=Publicacion_Etiqueta::where('idPublicacion',$id)->delete();
                //dd($publicacion_etiqueta);
                if($etiquetas){
                    for($i = 0; $i < sizeof($etiquetas); $i++){
                        $publicacion_etiqueta=new Publicacion_Etiqueta();
                        $publicacion_etiqueta->idPublicacion=$id;
                        $publicacion_etiqueta->idEtiqueta=$etiquetas[$i];
                        $publicacion_etiqueta->save();
                    }
                }
               
                $publicacion->estado='1';
            }else {
                $data=request()->validate([
                    'titulo'=>'required|unique:publicaciones',
                ],
                [
                    'titulo.required'=>'Ingrese título',
                ]);
                if(!empty($request->imagen)){
                    $img = $request->file('imagen');
                    // dd($img);
                    $nombre=$img->getClientOriginalName();
                    $nombreBD="/storage/publicaciones/".$nombre;
                    $img->storeAs("public/publicaciones", $nombre);
                    $publicacion->imagen=$nombreBD;
                }

                if(!empty($request->archivo)){
                    $archivo_file = $request->file('archivo');
                    $nombre_archivo=$archivo_file->getClientOriginalName();      
                    $archivo_file->storeAs("public/publicaciones/archivos", $nombre_archivo);
                
                    $nombre_archivo_BD = "/storage/publicaciones/archivos/".$nombre_archivo;
                    $publicacion->archivo=$nombre_archivo_BD;
                }
                // $img = $request->file('imagen');
                // $nombre=$img->getClientOriginalName();
                // $nombreBD="/storage/publicaciones/".$nombre;
                // $img->storeAs("public/publicaciones", $nombre);
                // $publicacion->imagen=$nombreBD;
                $publicacion->titulo=$request->titulo;
                $publicacion->resumen=$request->resumen;
                $publicacion->texto=$request->texto;
                $etiquetas=$request->etiquetas;
                $publicacion_etiqueta=Publicacion_Etiqueta::where('idPublicacion',$id)->delete();
                //dd($publicacion_etiqueta);
                if($etiquetas){
                    for($i = 0; $i < sizeof($etiquetas); $i++){
                        $publicacion_etiqueta=new Publicacion_Etiqueta();
                        $publicacion_etiqueta->idPublicacion=$id;
                        $publicacion_etiqueta->idEtiqueta=$etiquetas[$i];
                        $publicacion_etiqueta->save();
                    }
                }
                $publicacion->estado='1';
            }
            $publicacion->save();
            // bucle para guardar la relacion Publicacion/Etiqueta
            //$publicacion= Publicacion::all();
            //$lastPublicacion=$publicacion->last();
            
            //$ide=$lastPublicacion->idPublicacion;
            //dd($id);
            
            DB::commit();
            return redirect()->route('publicacion.index')->with('datos', 'T');
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
            $publicacion=Publicacion::findOrFail($id);
            if($publicacion->estado==1){
                $publicacion->estado='0';
                $publicacion->save();
                DB::commit();
                return redirect()->route('publicacion.index')->with('datos','D');
            }else{
                $publicacion->estado='1';
                $publicacion->save();
                DB::commit();
                return redirect()->route('publicacion.index')->with('datos','A');
            }
        }catch(Exception $e){
            DB::rollback();
        }


    }


    public function leerPublicacion($id)
    {

        DB::beginTransaction();
        try{
            $publicacion=Publicacion::findOrFail($id);
            // dd($publicacion);
            $publicacion->vistas=$publicacion->vistas+1;
            $publicacion->save();
            DB::commit();
            // return redirect()->route('publicacion.index',compact('publicacion'));
        }catch(Exception $e){
            DB::rollback();
        }


    }
    // public function cancelar(){
    //     return redirect()->route('publicacion.index')->with('datos','Acción Cancelada!!');
    // }
}
