<?php

namespace App\Http\Controllers;
use App\TipoConoce;
use Illuminate\Http\Request;

class TipoConoceController extends Controller
{
    const PAGINATION ='4';
    public function index(Request $request)
    {
        $buscarpor=$request->buscarpor;
        $tipoconoce = TipoConoce::where('estado','=','1')->where('nombre', 'like', '%' .$buscarpor. '%')->paginate($this::PAGINATION);
        return view('tablas.tipoconoce.index', compact('tipoconoce','buscarpor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tablas.tipoconoce.create');
    }

    public function store(Request $request)
    {
        $data=request()->validate([
            'nombre'=>'required|max:70'
        ],
        [
            'nombre.required'=>'Ingrese Nombre',
        ]);
        $tipoconoce = new Tipoconoce();
        $tipoconoce->nombre=$request->nombre;
        $tipoconoce->estado='1';
        $tipoconoce->save();
        return redirect()->route('tipoconoce.index')->with('datos', 'Registro Nuevo Guardado!!');
    }

    public function edit($id)
    {
        $tipoconoce=Tipoconoce::findOrFail($id);
        return view('tablas.tipoconoce.edit',compact('tipoconoce'));
    }

    public function update(Request $request, $id)
    {
        $data=request()->validate([
            'nombre'=>'required|max:70'
        ],
        [
            'nombre.required'=>'Ingrese Nombre',
        ]);
        $tipoconoce = Tipoconoce::findOrFail($id);
        $tipoconoce->nombre=$request->nombre;
        $tipoconoce->estado='1';
        $tipoconoce->save();
        return redirect()->route('tipoconoce.index')->with('datos', 'Registro Actualizado!!');
    }

    public function destroy($id)
    {
        $tipoconoce=Tipoconoce::findOrFail($id);
        $tipoconoce->estado='0';
        $tipoconoce->save();
        return redirect()->route('tipoconoce.index')->with('datos','Registro Eliminado!!');
    }
}
