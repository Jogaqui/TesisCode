<?php

namespace App\Http\Controllers;
use App\Unidad;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UnidadController extends Controller
{
    
    public function index(Request $request)
    {
        $unidad = Unidad::get();
        return view('tablas.unidades.index', compact('unidad'));
    }

    public function create() 
    {
        return view('tablas.Unidades.create');
    }

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
            $unidad = new Unidad();
            $unidad->descripcion=$request->descripcion;
            $unidad->estado='1';
            $unidad->save();
            DB::commit();
            return redirect()->route('unidad.index')->with('datos', 'Registro Nuevo Guardado!!');
        }catch(Exception $e){
            DB::rollback();
        }
    }


    public function edit($id)
    {
        $unidad=Unidad::findOrFail($id);
        return view('tablas.Unidades.edit',compact('unidad')); 
    }

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
            $unidad = Unidad::findOrFail($id);
            $unidad->descripcion=$request->descripcion;
            $unidad->estado='1';
            $unidad->save();
            DB::commit();
            return redirect()->route('unidad.index')->with('datos', 'Registro Actualizado!!');
        }catch(Exception $e){
            DB::rollback();
        }  
    }

    public function destroy($id)
    {

        DB::beginTransaction();
        try{
            $unidad=Unidad::findOrFail($id);
            if($unidad->estado==1){
                $unidad->estado='0';
                $unidad->save();
                DB::commit();
                return redirect()->route('unidad.index')->with('datos','Registro Desactivado!!');
            }else{
                $unidad->estado='1';
                $unidad->save();
                DB::commit();
                return redirect()->route('unidad.index')->with('datos','Registro Activado!!');
            }
        }catch(Exception $e){
            DB::rollback();
        }  

    }
    // public function confirmar($id)
    // {
    //     $unidad=Unidad::findOrFail($id);
    //     return view('tablas.Unidades.confirmar',compact('unidad'));
    // }    

}
