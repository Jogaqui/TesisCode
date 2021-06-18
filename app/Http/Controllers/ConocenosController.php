<?php

namespace App\Http\Controllers;
use App\Conocenos;
use App\TipoConoce;
use Illuminate\Http\Request;

class ConocenosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
       /* dd($id);
        //$id=$request->id;
        $conocenos = Conocenos::where('estado','=','1')->where('tipo','=',$id)->get();
        return view('tablas.conocenos.index', compact('conocenos'));*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoconoce = TipoConoce::select('idConoce','nombre')->get();
        return view('tablas.conocenos.create',compact('tipoconoce'));
    }
    
    public function store(Request $request)
    {
        $data=request()->validate([
            'descripcion'=>'required|max:200'
        ],
        [
            'descripcion.required'=>'Ingrese descripcion',
        ]);
        $conocenos = new Conocenos();
        $conocenos->tipo=$request->tipo;
        $conocenos->descripcion=$request->descripcion;
        $conocenos->estado='1';
        $conocenos->save();
        return redirect()->route('TipoConoce.show',$conocenos->tipo)->with('datos', 'G');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $conocenos = Conocenos::findOrFail($id);
        return view('tablas.conocenos.edit',compact('conocenos'));
    }

    public function update(Request $request, $id)
    {
        $data=request()->validate([
            'descripcion'=>'required|max:200'
        ],
        [
            'descripcion.required'=>'Ingrese descripcion',
        ]);
        $conocenos = Conocenos::findOrFail($id);
        //$tipoconoce = Conocenos::findOrFail($id);
        $conocenos->tipo=$request->tipo;
        $conocenos->descripcion=$request->descripcion;
        $conocenos->estado='1';
        $conocenos->save();
        return redirect()->route('TipoConoce.show',$conocenos->tipo)->with('datos', 'T');
    }

    public function destroy($id)
    {
        $conocenos=Conocenos::findOrFail($id);
        if ($conocenos->estado==1) {
            $conocenos->estado='0';
            $conocenos->save();
            return redirect()->route('tipoconoce.show',$conocenos->tipo)->with('datos','D');
        }else {
            $conocenos->estado='1';
            $conocenos->save();
            return redirect()->route('tipoconoce.show',$conocenos->tipo)->with('datos','A');
        }
    }
}
