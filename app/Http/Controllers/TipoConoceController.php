<?php

namespace App\Http\Controllers;
use App\TipoConoce;
use App\Conocenos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoConoceController extends Controller
{
    public function index()
    {
        $tipoconoce = TipoConoce::get();
        $conocenos = Conocenos::where('estado','=','1');
        return view('tablas.tipoconoce.index', compact('tipoconoce','conocenos'));
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
        $tipoconoce = Tipoconoce::findOrFail($id);
        //dd($tipoconoce);
        $conocenos = Conocenos::where('tipo','=',$id)->get();
        return view('tablas.tipoconoce.show', compact('conocenos','tipoconoce','id'));
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
            'nombre'=>'unique:tipoconoce'
        ]);

        DB::beginTransaction();
        try{
            $tipoconoce = new Tipoconoce();
            $tipoconoce->nombre=$request->nombre;
            $tipoconoce->estado='1';
            $tipoconoce->save();
            DB::commit();
            return redirect()->route('tipoconoce.index')->with('datos', 'G');
        }catch(Exception $e){
            DB::rollback();
        }    
    }

    public function edit($id)
    {
        $tipoconoce=Tipoconoce::findOrFail($id);
        return view('tablas.tipoconoce.edit',compact('tipoconoce'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try{
            $tipoconoce = Tipoconoce::findOrFail($id);
            if ($tipoconoce->nombre==$request->nombre) {
                $tipoconoce->estado='1';
            }
            else {
                $data=request()->validate([
                    'nombre'=>'unique:tipoconoce'
                ]);
                $tipoconoce->nombre=$request->nombre;
                $tipoconoce->estado='1';
            }
            $tipoconoce->save();
            DB::commit();
            return redirect()->route('tipoconoce.index')->with('datos', 'T');
        }catch(Exception $e){
            DB::rollback();
        }


        
    }

    public function destroy($id)
    {

        DB::beginTransaction();
        try{
            $tipoconoce=Tipoconoce::findOrFail($id);
            if ($tipoconoce->estado==1) {
                $tipoconoce->estado='0';
                $tipoconoce->save();
                DB::commit();
                return redirect()->route('tipoconoce.index')->with('datos','D');
            }else {
                $tipoconoce->estado='1';
                $tipoconoce->save();
                DB::commit();
                return redirect()->route('tipoconoce.index')->with('datos','A');
            } 
        }catch(Exception $e){
            DB::rollback();
        }

 
    }
}
