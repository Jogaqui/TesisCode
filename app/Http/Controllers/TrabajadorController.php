<?php

namespace App\Http\Controllers;
use App\Unidad;
use App\Trabajador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrabajadorController extends Controller
{
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

    public function create()
    {
        $unidad=Unidad::where('estado','=','1')->get();
        // dd($unidad);
        return view('tablas.Trabajadores.create',compact('unidad'));
    }

    public function store(Request $request)
    {
        $data=request()->validate([
            'dni'=>'unique:trabajadores',
            'correo'=>'unique:trabajadores'
        ]);

        DB::beginTransaction();
        try{
            $trabajador = new Trabajador();
            if(!empty($request->puesto)){
                $trabajador->apPaterno=$request->apPaterno;
                $trabajador->apMaterno=$request->apMaterno;
                $trabajador->nombres=$request->nombres;
                $trabajador->dni=$request->dni;
                $trabajador->abrevGrado=$request->grado;
                $trabajador->puesto=$request->puesto;
                $trabajador->correo=$request->correo;
                $trabajador->telefono=$request->telefono;
                $trabajador->imagen=$request->imagen;
                $trabajador->idUnidad=$request->idUnidad;
                $trabajador->estado='1';
            }else{
                $trabajador->apPaterno=$request->apPaterno;
                $trabajador->apMaterno=$request->apMaterno;
                $trabajador->nombres=$request->nombres;
                $trabajador->dni=$request->dni;
                $trabajador->abrevGrado=$request->grado;
                $trabajador->correo=$request->correo;
                $trabajador->telefono=$request->telefono;
                $trabajador->imagen=$request->imagen;
                $trabajador->idUnidad=$request->idUnidad;
                $trabajador->estado='1';
            }
            $trabajador->save();
            DB::commit();
            return redirect()->route('trabajador.index')->with('datos', 'G');
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
        $trabajador=Trabajador::findOrFail($id);
        $idUnidad=$trabajador->idUnidad;
        $unidad=Unidad::findOrFail($idUnidad);
        $unidades=Unidad::get();
        return view('tablas.Trabajadores.edit',compact('trabajador','unidad','unidades')); 
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try{
            $trabajador = Trabajador::findOrFail($id);
            if(!empty($request->puesto)){
<<<<<<< HEAD
                $trabajador->apPaterno=$request->apPaterno;
                $trabajador->apMaterno=$request->apMaterno;
                $trabajador->nombres=$request->nombres;
                $trabajador->dni=$request->dni;
                $trabajador->idUnidad=$request->idUnidad;
                $trabajador->abrevGrado=$request->grado;
                $trabajador->puesto=$request->puesto;
                $trabajador->correo=$request->correo;
                $trabajador->telefono=$request->telefono;
                $trabajador->imagen=$request->imagen;
                $trabajador->estado='1';
            }else{
                $trabajador->apPaterno=$request->apPaterno;
                $trabajador->apMaterno=$request->apMaterno;
                $trabajador->nombres=$request->nombres;
                $trabajador->dni=$request->dni;
                $trabajador->idUnidad=$request->idUnidad;
                $trabajador->abrevGrado=$request->grado;
                $trabajador->correo=$request->correo;
                $trabajador->telefono=$request->telefono;
                $trabajador->imagen=$request->imagen;
                $trabajador->estado='1';
=======
                if ($trabajador->dni==$request->dni && $trabajador->correo==$request->correo) {
                    $trabajador->apPaterno=$request->apPaterno;
                    $trabajador->apMaterno=$request->apMaterno;
                    $trabajador->nombres=$request->nombres;
                    $trabajador->idUnidad=$request->idUnidad;
                    $trabajador->puesto=$request->puesto;
                    $trabajador->telefono=$request->telefono;
                    $trabajador->estado='1';
                }
                elseif ($trabajador->dni==$request->dni && $trabajador->correo!=$request->correo) {
                    $data=request()->validate([
                        'correo'=>'unique:trabajadores'
                    ]);
                    $trabajador->apPaterno=$request->apPaterno;
                    $trabajador->apMaterno=$request->apMaterno;
                    $trabajador->nombres=$request->nombres;
                    $trabajador->idUnidad=$request->idUnidad;
                    $trabajador->puesto=$request->puesto;
                    $trabajador->correo=$request->correo;
                    $trabajador->telefono=$request->telefono;
                    $trabajador->estado='1';
                }
                elseif ($trabajador->dni!=$request->dni && $trabajador->correo==$request->correo) {
                    $data=request()->validate([
                        'dni'=>'unique:trabajadores'
                    ]);
                    $trabajador->apPaterno=$request->apPaterno;
                    $trabajador->apMaterno=$request->apMaterno;
                    $trabajador->nombres=$request->nombres;
                    $trabajador->dni=$request->dni;
                    $trabajador->idUnidad=$request->idUnidad;
                    $trabajador->puesto=$request->puesto;
                    $trabajador->correo=$request->correo;
                    $trabajador->telefono=$request->telefono;
                    $trabajador->estado='1';
                }
                else {
                    $data=request()->validate([
                        'dni'=>'unique:trabajadores',
                        'correo'=>'unique:trabajadores'
                    ]);
                    $trabajador->apPaterno=$request->apPaterno;
                    $trabajador->apMaterno=$request->apMaterno;
                    $trabajador->nombres=$request->nombres;
                    $trabajador->dni=$request->dni;
                    $trabajador->idUnidad=$request->idUnidad;
                    $trabajador->puesto=$request->puesto;
                    $trabajador->correo=$request->correo;
                    $trabajador->telefono=$request->telefono;
                    $trabajador->estado='1';
                }
            }else{
                if ($trabajador->dni==$request->dni && $trabajador->correo==$request->correo) {
                    $trabajador->apPaterno=$request->apPaterno;
                    $trabajador->apMaterno=$request->apMaterno;
                    $trabajador->nombres=$request->nombres;
                    $trabajador->idUnidad=$request->idUnidad;
                    $trabajador->puesto=$request->puesto;
                    $trabajador->telefono=$request->telefono;
                    $trabajador->estado='1';
                }
                elseif ($trabajador->dni==$request->dni && $trabajador->correo!=$request->correo) {
                    $data=request()->validate([
                        'correo'=>'unique:trabajadores'
                    ]);
                    $trabajador->apPaterno=$request->apPaterno;
                    $trabajador->apMaterno=$request->apMaterno;
                    $trabajador->nombres=$request->nombres;
                    $trabajador->idUnidad=$request->idUnidad;
                    $trabajador->puesto=$request->puesto;
                    $trabajador->correo=$request->correo;
                    $trabajador->telefono=$request->telefono;
                    $trabajador->estado='1';
                }
                elseif ($trabajador->dni!=$request->dni && $trabajador->correo==$request->correo) {
                    $data=request()->validate([
                        'dni'=>'unique:trabajadores'
                    ]);
                    $trabajador->apPaterno=$request->apPaterno;
                    $trabajador->apMaterno=$request->apMaterno;
                    $trabajador->nombres=$request->nombres;
                    $trabajador->dni=$request->dni;
                    $trabajador->idUnidad=$request->idUnidad;
                    $trabajador->puesto=$request->puesto;
                    $trabajador->correo=$request->correo;
                    $trabajador->telefono=$request->telefono;
                    $trabajador->estado='1';
                }
                else {
                    $data=request()->validate([
                        'dni'=>'unique:trabajadores',
                        'correo'=>'unique:trabajadores'
                    ]);
                    $trabajador->apPaterno=$request->apPaterno;
                    $trabajador->apMaterno=$request->apMaterno;
                    $trabajador->nombres=$request->nombres;
                    $trabajador->dni=$request->dni;
                    $trabajador->idUnidad=$request->idUnidad;
                    $trabajador->puesto=$request->puesto;
                    $trabajador->correo=$request->correo;
                    $trabajador->telefono=$request->telefono;
                    $trabajador->estado='1';
                }
>>>>>>> f8c32443c1f923ad04ff32f1e5fdc5074bb12f0a
            }
            $trabajador->save();
            DB::commit();
            return redirect()->route('trabajador.index')->with('datos', 'T');
        }catch(Exception $e){
            DB::rollback();
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try{
            $trabajador=Trabajador::findOrFail($id);
            $trabajador->estado='0';
            $trabajador->save();
            DB::commit();
            return redirect()->route('trabajador.index')->with('datos','E');
        }catch(Exception $e){
            DB::rollback();
        }    
    }   
}
