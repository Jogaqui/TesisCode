<?php

namespace App\Http\Controllers;

use App\Tramite;
use App\Icono;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TramiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tramite=DB::table('tramites as t')
        ->join('iconos as i','t.idIcono','=','i.idIcono')->select('t.idTramite','t.titulo','t.descripcion','t.ruta','t.estado','i.nombre')->get();
        // $tramite=Tramite::get();
        
        return view('tablas.Tramites.index',compact('tramite'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $icono=Icono::get();
        return view('tablas.Tramites.create',compact('icono'));
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
            'titulo'=>'required|unique:tramites'
        ],
        [
            'titulo.required'=>'Ingrese Título',
        ]);


        DB::beginTransaction();
        try{
            $tramite = new Tramite();
            $tramite->titulo=$request->titulo;
            $tramite->descripcion=$request->descripcion;
            $tramite->ruta=$request->ruta;
            $tramite->idIcono=$request->idIcono;
            $tramite->estado='1';
            $tramite->save();
            DB::commit();
            return redirect()->route('tramite.index')->with('datos', 'Registro Nuevo Guardado!!');
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
        $tramite=Tramite::findOrFail($id);
        // dd($tramite);
        $idIcono=$tramite->idIcono;
        $icono=Icono::findOrFail($idIcono);
        $iconos=Icono::get();
        return view('tablas.Tramites.edit',compact('tramite','icono','iconos'));
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
        // $data=request()->validate([
        //     'descripcion'=>'required|max:40'
        // ],
        // [
        //     'descripcion.required'=>'Ingrese Descripcion',
        // ]);

        DB::beginTransaction();
        try{
            $tramite =Tramite::findOrFail($id);
            $tramite->titulo=$request->titulo;
            $tramite->descripcion=$request->descripcion;
            $tramite->ruta=$request->ruta;
            $tramite->idIcono=$request->idIcono;
            $tramite->estado='1';
            $tramite->save();
            DB::commit();
            return redirect()->route('tramite.index')->with('datos', 'T');
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
            $tramite=Tramite::findOrFail($id);
            if($tramite->estado==1){
                $tramite->estado='0';
                $tramite->save();
                DB::commit();
                return redirect()->route('tramite.index')->with('datos','D');
            }else{
                $tramite->estado='1';
                $tramite->save();
                DB::commit();
                return redirect()->route('tramite.index')->with('datos','A');
            }
        }catch(Exception $e){
            DB::rollback();
        }
    }
}
