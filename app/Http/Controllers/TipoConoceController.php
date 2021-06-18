<?php

namespace App\Http\Controllers;
use App\TipoConoce;
use App\Conocenos;
use Illuminate\Http\Request;

class TipoConoceController extends Controller
{
    public function index()
    {
        $tipoconoce = TipoConoce::get();
        $conocenos = Conocenos::where('estado','=','1');
        return view('tablas.tipoconoce.index', compact('tipoconoce','buscarpor','conocenos'));
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

    public function show($id)
    {
        //dd($id);
        $conocenos = Conocenos::where('tipo','=',$id)->get();
        return view('tablas.tipoconoce.show', compact('conocenos','id'));
    }

/*
    public function show($id)
    {
        return view('tablas.tipoconoce.create',$id);
    }
*/
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
        return redirect()->route('tipoconoce.index')->with('datos', 'G');
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
        return redirect()->route('tipoconoce.index')->with('datos', 'T');
    }

    public function destroy($id)
    {
        $tipoconoce=Tipoconoce::findOrFail($id);
        if ($tipoconoce->estado==1) {
            $tipoconoce->estado='0';
            $tipoconoce->save();
            return redirect()->route('tipoconoce.index')->with('datos','D');
        }else {
            $tipoconoce->estado='1';
            $tipoconoce->save();
            return redirect()->route('tipoconoce.index')->with('datos','A');
        }  
    }
}
