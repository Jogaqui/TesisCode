<?php

namespace App\Http\Controllers;
use App\Grados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GradosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grado = Grados::get();
        return view('tablas.grados.index', compact('grado'));
    }

    public function create()
    {
        return view('tablas.grados.create');
    }

    public function store(Request $request)
    {
        $data=request()->validate([
            'nombre'=>'required|unique:grados',
            'abreviatura'=>'required|unique:grados'
        ]);
        DB::beginTransaction();
        try{
            $grado = new Grados();
            $grado->abreviatura=$request->abreviatura;
            $grado->nombre=$request->nombre;
            $grado->estado='1';
            $grado->save();
            DB::commit();
            return redirect()->route('grados.index')->with('datos', 'G');
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
        $grado = Grados::findOrFail($id);
        return view('tablas.grados.edit', compact('grado'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try{
            $grado = Grados::findOrFail($id);
            if ($grado->nombre==$request->nombre && $grado->abreviatura==$request->abreviatura) {
                $grado->estado='1';
            }
            elseif ($grado->nombre!=$request->nombre && $grado->abreviatura==$request->abreviatura) {
                $data=request()->validate([
                    'nombre'=>'unique:grados'
                ]);
                $grado->nombre=$request->nombre;
                $grado->estado='1';
            }
            elseif ($grado->nombre==$request->nombre && $grado->abreviatura!=$request->abreviatura) {
                $data=request()->validate([
                    'abreviatura'=>'required|unique:grados'
                ]);
                $grado->abreviatura=$request->abreviatura;
                $grado->estado='1';
            }
            else {
                $data=request()->validate([
                    'nombre'=>'unique:grados',
                    'abreviatura'=>'required|unique:grados'
                ]);
                $grado->abreviatura=$request->abreviatura;
                $grado->nombre=$request->nombre;
                $grado->estado='1';
            }
            $grado->save();
            DB::commit();
            return redirect()->route('grados.index')->with('datos', 'T');
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
            $grado=Grados::findOrFail($id);
            if($grado->estado==1){
                $grado->estado='0';
                $grado->save();
                DB::commit();
                return redirect()->route('grados.index')->with('datos','D');
            }else{
                $grado->estado='1';
                $grado->save();
                DB::commit();
                return redirect()->route('grados.index')->with('datos','A');
            }
        }catch(Exception $e){
            DB::rollback();
        }
    }
}
