<?php

namespace App\Http\Controllers;
use App\Unidad;
use App\Funciones;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UnidadController extends Controller
{
    
    public function index(Request $request)
    {
        $unidad = Unidad::get();
        return view('tablas.Unidades.index', compact('unidad'));
    }

    public function create() 
    {
        return view('tablas.Unidades.create');
    }

    public function store(Request $request)
    {
        $data=request()->validate([
            'descripcion'=>'required|unique:unidades'
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
            return redirect()->route('unidad.index')->with('datos', 'G');
        }catch(Exception $e){
            DB::rollback();
        }
    }

    public function show($id)
    {
        //dd($id);
        $unidad = Unidad::findOrFail($id);
        //dd($tipoconoce);
        //$conocenos = Conocenos::where('tipo','=',$id)->get();
        $funciones = Funciones::where('unidad','=',$id)->get();
        //return view('tablas.funciones.index', compact('funciones'));
        return view('tablas.Unidades.show', compact('funciones','unidad','id'));
    }

    public function edit($id)
    {
        $unidad=Unidad::findOrFail($id);
        return view('tablas.Unidades.edit',compact('unidad')); 
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try{
            $unidad = Unidad::findOrFail($id);
            if ($unidad->descripcion==$request->descripcion) {
                $unidad->estado='1';
            }
            else {
                $data=request()->validate([
                    'descripcion'=>'unique:unidades'
                ]);
                $unidad->descripcion=$request->descripcion;
                $unidad->estado='1';
            }
            $unidad->save();
            DB::commit();
            return redirect()->route('unidad.index')->with('datos', 'T');
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
                return redirect()->route('unidad.index')->with('datos','D');
            }else{
                $unidad->estado='1';
                $unidad->save();
                DB::commit();
                return redirect()->route('unidad.index')->with('datos','A');
            }
        }catch(Exception $e){
            DB::rollback();
        }  

    }
}
