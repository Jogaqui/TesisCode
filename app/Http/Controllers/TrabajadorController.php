<?php

namespace App\Http\Controllers;
use App\Unidad;
use App\Trabajador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrabajadorController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        // $curso=DB::table('secciones as s')->join('grados as g','g.idGrado','=','s.idGrado')  
        // ->join('curso_grado as cg','g.idGrado','=','cg.idGrado')  
        // ->join('cursos as c','c.idCurso','=','cg.idCurso')               
        //  ->where('s.idSeccion','=',$id)
        // ->select('*')->get();  

        $trabajador=DB::table('trabajadores as t')
        ->join('unidades as u','t.idUnidad','=','u.idUnidad')->where('t.estado','1')->select('*')->get();

        return view('tablas.trabajadores.index', compact('trabajador'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidad=Unidad::where('estado','=','1')->get();
        // dd($unidad);
        return view('tablas.Trabajadores.create',compact('unidad'));
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
        //     'descripcion'=>'required|max:40'
        // ],
        // [
        //     'descripcion.required'=>'Ingrese Descripción',
        // ]);
        $trabajador = new Trabajador();
        if(!empty($request->puesto)){
            $trabajador->apPaterno=$request->apPaterno;
            $trabajador->apMaterno=$request->apMaterno;
            $trabajador->nombres=$request->nombres;
            $trabajador->dni=$request->dni;
            $trabajador->puesto=$request->puesto;
            $trabajador->correo=$request->email;
            $trabajador->telefono=$request->telefono;
            $trabajador->idUnidad=$request->idUnidad;
            $trabajador->estado='1';
        }else{
            $trabajador->apPaterno=$request->apPaterno;
            $trabajador->apMaterno=$request->apMaterno;
            $trabajador->nombres=$request->nombres;
            $trabajador->dni=$request->dni;
            $trabajador->correo=$request->email;
            $trabajador->telefono=$request->telefono;
            $trabajador->idUnidad=$request->idUnidad;
            $trabajador->estado='1';
        }

        $trabajador->save();
        return redirect()->route('trabajador.index')->with('datos', 'Registro Nuevo Guardado!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trabajador=Trabajador::findOrFail($id);
        return view('tablas.Trabajadores.edit',compact('trabajador')); 
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
        //     'descripcion'=>'required|max:40'
        // ],
        // [
        //     'apellidos.required'=>'Ingrese Descripcion',
        // ]);
        $trabajador = Trabajador::findOrFail($id);
        if(!empty($request->puesto)){
            $trabajador->apPaterno=$request->apPaterno;
            $trabajador->apMaterno=$request->apMaterno;
            $trabajador->nombres=$request->nombres;
            $trabajador->dni=$request->dni;
            $trabajador->puesto=$request->puesto;
            $trabajador->correo=$request->email;
            $trabajador->telefono=$request->telefono;
            $trabajador->idUnidad='1';
            $trabajador->estado='1';
        }else{
            $trabajador->apPaterno=$request->apPaterno;
            $trabajador->apMaterno=$request->apMaterno;
            $trabajador->nombres=$request->nombres;
            $trabajador->dni=$request->dni;
            $trabajador->correo=$request->email;
            $trabajador->telefono=$request->telefono;
            $trabajador->idUnidad='1';
            $trabajador->estado='1';
        }
        $trabajador->save();
        return redirect()->route('trabajador.index')->with('datos', 'Registro Actualizado!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trabajador=Trabajador::findOrFail($id);
        $trabajador->estado='0';
        $trabajador->save();
        return redirect()->route('trabajador.index')->with('datos','Registro Eliminado!!');
    }
    public function confirmar($id)
    {
        $trabajador=Trabajador::findOrFail($id);
        return view('tablas.Trabajadores.confirmar',compact('trabajador'));
    }    
}
