<?php

namespace App\Http\Controllers;

use App\Etiqueta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EtiquetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etiqueta=Etiqueta::get();
        return view('tablas.Etiquetas.index',compact('etiqueta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tablas.Etiquetas.create');
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
            'descripcion'=>'required|max:40'
        ],
        [
            'descripcion.required'=>'Ingrese Descripción',
        ]);

        DB::beginTransaction();
        try{

            $etiqueta = new Etiqueta();
            $etiqueta->descripcion=$request->descripcion;
            $etiqueta->estado='1';
            $etiqueta->save();
            DB::commit();
            return redirect()->route('etiqueta.index')->with('datos', 'G');
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
        $etiqueta=Etiqueta::findOrFail($id);
        return view('tablas.Etiquetas.edit',compact('etiqueta')); 
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
            'descripcion'=>'required|max:40'
        ],
        [
            'descripcion.required'=>'Ingrese Descripcion',
        ]);

        DB::beginTransaction();
        try{
            $etiqueta = Etiqueta::findOrFail($id);
            $etiqueta->descripcion=$request->descripcion;
            $etiqueta->estado='1';
            $etiqueta->save();
            DB::commit();
            return redirect()->route('etiqueta.index')->with('datos', 'T');
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
            $etiqueta=Etiqueta::findOrFail($id);
            if($etiqueta->estado==1){
                $etiqueta->estado='0';
                $etiqueta->save();
                DB::commit();
                return redirect()->route('etiqueta.index')->with('datos','D');
            }else{
                $etiqueta->estado='1';
                $etiqueta->save();
                DB::commit();
                return redirect()->route('etiqueta.index')->with('datos','A');
            }
        }catch(Exception $e){
            DB::rollback();
        }


    }
}
