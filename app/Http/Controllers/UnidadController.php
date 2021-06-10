<?php

namespace App\Http\Controllers;
use App\Unidad;
use Illuminate\Http\Request;

class UnidadController extends Controller
{
    const PAGINATION ='4';
    public function index(Request $request)
    {
        $buscarpor=$request->buscarpor;
        $unidad = Unidad::where('estado','=','1')
        ->where('descripcion', 'like', '%' .$buscarpor. '%')->paginate($this::PAGINATION);
        return view('tablas.unidades.index', compact('unidad','buscarpor'));
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
        $unidad = new Unidad();
        $unidad->descripcion=$request->descripcion;
        $unidad->estado='1';
        $unidad->save();
        return redirect()->route('unidad.index')->with('datos', 'Registro Nuevo Guardado!!');
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
            'apellidos.required'=>'Ingrese Descripcion',
        ]);
        $unidad = Unidad::findOrFail($id);
        $unidad->descripcion=$request->descripcion;
        $unidad->estado='1';
        $unidad->save();
        return redirect()->route('unidad.index')->with('datos', 'Registro Actualizado!!');
    }

    public function destroy($id)
    {
        $unidad=Unidad::findOrFail($id);
        $unidad->estado='0';
        $unidad->save();
        return redirect()->route('unidad.index')->with('datos','Registro Eliminado!!');
    }
    public function confirmar($id)
    {
        $unidad=Unidad::findOrFail($id);
        return view('tablas.Unidades.confirmar',compact('unidad'));
    }    

}
