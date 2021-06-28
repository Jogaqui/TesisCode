<?php

namespace App\Http\Controllers;
use App\Publicacion;
use App\Etiqueta;
use App\Publicacion_Etiqueta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publicacion = Publicacion::all();
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
            $nombre=Auth::user()->name;
            $publicacion->imagen=$request->imagen;
            $publicacion->titulo=$request->titulo;
            $publicacion->fecha=date('Y-m-d H:i:s');
            $publicacion->creador=$nombre;
            $publicacion->resumen=$request->resumen;
            $publicacion->texto=$request->texto;
            $publicacion->archivo=$request->archivo;
            $publicacion->estado='1';
            $publicacion->save();


            // bucle para guardar la relacion Publicacion/Etiqueta
            $publicacion= Publicacion::all();
            $lastPublicacion=$publicacion->last();
            $id=$lastPublicacion->idPublicacion;
            $etiquetas=$request->etiquetas;
            // dd( $etiquetas);
            for($i = 0; $i < sizeof($etiquetas); $i++){
                $publicacion_etiqueta=new Publicacion_Etiqueta();
                $publicacion_etiqueta->idPublicacion=$id;
                $publicacion_etiqueta->idEtiqueta=$etiquetas[$i];
                $publicacion_etiqueta->save();
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
        $idPublicacion=$publicacion->idPublicacion;
        // dd($idPublicacion);
        // $etiquetas=Publicacion_Etiqueta::where('idPublicacion',$idPublicacion)->get();
        
        
        $etiquetas=DB::table('publicacion_etiqueta as pe')
        ->join('etiquetas as e','pe.idEtiqueta','=','e.idEtiqueta')->where('e.estado','1')->select('*')->get();
        
        $etiqueta=Etiqueta::get();
        // dd($etiquetas);
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
        $data=request()->validate([
            'titulo'=>'required|unique:publicaciones',
        ],
        [
            'titulo.required'=>'Ingrese título',
        ]);

        DB::beginTransaction();
        try{

            $publicacion = Publicacion::findOrFail($id);
            $publicacion->imagen=$request->imagen;
            $publicacion->titulo=$request->titulo;
            $publicacion->resumen=$request->resumen;
            $publicacion->texto=$request->texto;
            $publicacion->estado='1';
            $publicacion->save();
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

    // public function cancelar(){
    //     return redirect()->route('publicacion.index')->with('datos','Acción Cancelada!!');
    // }
}
