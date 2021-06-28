<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Portada;

class PortadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portada=Portada::get();
        return view('tablas.Portadas.index',compact('portada'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tablas.Portadas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data=request()->validate([
        //     'titulo'=>'required|unique:publicaciones',
        // ],
        // [
        //     'titulo.required'=>'Ingrese título',
        // ]);

        DB::beginTransaction();
        try{
            $portada = new Portada();
            $img = $request->file('imagen');
            $nombre=$img->getClientOriginalName();
            // dd($nombre);
            $nombreBD="/storage/portadas/".$nombre;
            $img->storeAs("public/portadas", $nombre);
            $portada->imagen=$nombreBD;
            $portada->inicial=$request->inicial;
            $portada->intermedia=$request->intermedia;
            $portada->final=$request->final;
            $portada->estado='1';
            $portada->save();
            DB::commit();
            return redirect()->route('portada.index')->with('datos', 'G');
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
        return redirect()->route('portada.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $portada=Portada::findOrFail($id);
        return view('tablas.Portadas.edit',compact('portada'));
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
        // $data=request()->validate([
        //     'titulo'=>'required|unique:publicaciones',
        // ],
        // [
        //     'titulo.required'=>'Ingrese título',
        // ]);

        DB::beginTransaction();
        try{

            $portada = Portada::findOrFail($id);
            if(!empty($request->imagen)){
                $img = $request->file('imagen');
                // dd($img);
                $nombre=$img->getClientOriginalName();
                $nombreBD="/storage/portadas/".$nombre;
                $img->storeAs("public/portadas", $nombre);
                $portada->imagen=$nombreBD;
            }
            // $img = $request->file('imagen');
            // $nombre=$img->getClientOriginalName();
            // $nombreBD="/storage/publicaciones/".$nombre;
            // $img->storeAs("public/publicaciones", $nombre);
            // $publicacion->imagen=$nombreBD;
            $portada->inicial=$request->inicial;
            $portada->intermedia=$request->intermedia;
            $portada->final=$request->final;
            $portada->estado='1';
            $portada->save();
            DB::commit();
            return redirect()->route('portada.index')->with('datos', 'T');
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
            $portada=Portada::findOrFail($id);
            if($portada->estado==1){
                $portada->estado='0';
                $portada->save();
                DB::commit();
                return redirect()->route('portada.index')->with('datos','D');
            }else{
                $portada->estado='1';
                $portada->save();
                DB::commit();
                return redirect()->route('portada.index')->with('datos','A');
            }
        }catch(Exception $e){
            DB::rollback();
        }
    }
}
