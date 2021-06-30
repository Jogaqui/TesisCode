<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Icono;

class IconoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $icono = Icono::get();
        return view('tablas.Iconos.index', compact('icono'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tablas.Iconos.create');
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
            'nombre'=>'required|unique:iconos'
        ],
        [
            'nombre.required'=>'Ingrese Nombre',
        ]);

        DB::beginTransaction();
        try{
            $icono = new Icono();
            $icono->nombre=$request->nombre;
            $icono->estado='1';
            $icono->save();
            DB::commit();
            return redirect()->route('icono.index')->with('datos', 'G');
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
        $icono=Icono::findOrFail($id);
        return view('tablas.Iconos.edit',compact('icono'));
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
            'nombre'=>'required|unique:iconos'
        ],
        [
            'nombre.required'=>'Ingrese Nombre',
        ]);

        DB::beginTransaction();
        try{
            $icono = Icono::findOrFail($id);
            $icono->nombre=$request->nombre;
            $icono->estado='1';
            $icono->save();
            DB::commit();
            return redirect()->route('icono.index')->with('datos', 'T');
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
            $icono=Icono::findOrFail($id);
            if($icono->estado==1){
                $icono->estado='0';
                $icono->save();
                DB::commit();
                return redirect()->route('icono.index')->with('datos','D');
            }else{
                $icono->estado='1';
                $icono->save();
                DB::commit();
                return redirect()->route('icono.index')->with('datos','A');
            }
        }catch(Exception $e){
            DB::rollback();
        }  


    }
}
