<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Funciones;
use App\Unidad;
use Illuminate\Http\Request;

class FuncionesController extends Controller
{
    public function index()
    {
        
    }

    public function create()
    {

    }

    public function crearfuncion($id)
    {
        $tipo=Unidad::FindOrFail($id);
        $unidad = Unidad::select('idUnidad','descripcion')->where('estado','1')->get();
        return view('tablas.funciones.create',compact('unidad','tipo'));
    }
    
    public function store(Request $request)
    {
        $data=request()->validate([
            'descripcion'=>'unique:funciones'
        ]);
        //dd($request);
        DB::beginTransaction();
        try{
            $funciones = new Funciones();
            $funciones->unidad=$request->unidad;
            $funciones->descripcion=$request->descripcion;
            $funciones->estado='1';
            $funciones->save();
            DB::commit();
            return redirect()->route('Unidad.show',$funciones->unidad)->with('datos', 'G');
        }catch(Exception $e){
            DB::rollback();
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $funciones = Funciones::findOrFail($id);
        return view('tablas.funciones.edit',compact('funciones'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try{
            $funciones = Funciones::findOrFail($id);
            if ($funciones->descripcion==$request->descripcion) {
                $funciones->unidad=$request->unidad;
                $funciones->estado='1';
            }
            else {
                $data=request()->validate([
                    'descripcion'=>'unique:funciones'
                ]);
                $funciones->unidad=$request->unidad;
                $funciones->descripcion=$request->descripcion;
                $funciones->estado='1';
            }
            $funciones->save();
            DB::commit();
            return redirect()->route('Unidad.show',$funciones->unidad)->with('datos', 'T');
        }catch(Exception $e){
            DB::rollback();
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try{
            $funciones=Funciones::findOrFail($id);
            if ($funciones->estado==1) {
                $funciones->estado='0';
                $funciones->save();
                DB::commit();
                return redirect()->route('Unidad.show',$funciones->unidad)->with('datos','D');
            }else {
                $funciones->estado='1';
                $funciones->save();
                DB::commit();
                return redirect()->route('Unidad.show',$funciones->unidad)->with('datos','A');
            }
        }catch(Exception $e){
            DB::rollback();
        }
    }
}
