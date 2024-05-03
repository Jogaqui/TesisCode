<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Contactanos;
use App\Escuela;
use App\Facultad;
use App\Formulario_Alumno;
use App\Manual;
use App\SGA_Dependencia;
use App\Tramite;
use App\Ubigeo_Departamento;
use App\URAA_TipoUsuario;
use App\SGA_Persona;
use App\SUV_Estructura;
use App\SUV_Persona;
use App\Ubigeo_Distrito;
use App\Ubigeo_Provincia;

class FormularioDireccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $info = Contactanos::where('estado',1)->first();
      
      $ubigeo_departamentos = Ubigeo_Departamento::all();

      return view('formulario_direcciones') -> with(compact('info', 'ubigeo_departamentos'));
    }

    public function getAlumnoByCodigo($codigo)
    {
      DB::beginTransaction();
      try{
        
        $alumno = collect();
        
        $alumno_SGA=SGA_Persona::select('per_nombres','per_apellidos','per_login', 'per_dni', 'per_direccion','dependencia.dep_id','dependencia.dep_nombre','dependencia.sdep_id', 'perfil.pfl_cond', 'sga_datos_alumno.con_id')
              ->join('perfil','persona.per_id','perfil.per_id')
              ->join('sga_datos_alumno','sga_datos_alumno.pfl_id','perfil.pfl_id')
              ->join('sga_sede','sga_sede.sed_id','perfil.sed_id')
              ->join('dependencia','dependencia.dep_id','perfil.dep_id')
              ->where('per_login', $codigo)
              ->where('sga_datos_alumno.con_id',1)
              ->first();


        $alumno_SUV=SUV_Persona::select('persona.per_dni','persona.per_apepaterno','persona.per_apematerno', 'persona.per_nombres', 'matriculas.alumno.idalumno','patrimonio.sede.sed_descripcion','patrimonio.estructura.idestructura','patrimonio.estructura.estr_descripcion','patrimonio.estructura.iddependencia', 'curricula.curr_mencion', 'matriculas.alumno.alu_estado')    
              ->join('matriculas.alumno','matriculas.alumno.idpersona','persona.idpersona')
              ->join('matriculas.curricula','matriculas.alumno.alu_curricula','matriculas.curricula.idcurricula')
              ->join('patrimonio.area','matriculas.alumno.idarea','patrimonio.area.idarea')
              ->join('patrimonio.estructura','patrimonio.area.idestructura','patrimonio.estructura.idestructura')
              ->join('patrimonio.sede','matriculas.alumno.idsede','patrimonio.sede.idsede')
              ->where('matriculas.alumno.idalumno', $codigo)
              ->where('matriculas.alumno.alu_estado',1)
              ->first();

        if($alumno_SUV){
            $facultad_SUV = Facultad::where('idSUV_PREG',$alumno_SUV->iddependencia)->first();
            //return dd($facultad_SUV);
            $alumno->push(
                ['codigo' => ($alumno_SUV->idalumno),
                'dni' => ($alumno_SUV->per_dni),
                'escuela' => ($alumno_SUV->estr_descripcion),
                'facultad' => ($facultad_SUV->denominacion),
                'apellidos' => ($alumno_SUV->per_apepaterno.' '.$alumno_SUV->per_apematerno),
                'nombres' => ($alumno_SUV->per_nombres),
                'direccion' => ($alumno_SUV->per_direccion),
                'condicion' => ($alumno_SUV->alu_estado == 6 ? "EGRESADO" : "ALUMNO"),
                'tipo' => ("SUV"),
                
            ]); 
        }

        elseif($alumno_SGA){
            $facultad_SGA = Facultad::where('idSGA_PREG',$alumno_SGA->sdep_id)->first();
            //return dd($facultad_SGA);
            $alumno->push(
                ['codigo' => ($alumno_SGA->per_login),
                'dni' => ($alumno_SGA->per_dni),
                'escuela' => ($alumno_SGA->dep_nombre),
                'facultad' => ($facultad_SGA->denominacion),
                'apellidos' => ($alumno_SGA->per_apellidos),
                'nombres' => ($alumno_SGA->per_nombres),
                'direccion' => ($alumno_SGA->per_direccion),
                'condicion' => ($alumno_SGA->con_id == 6 ? "EGRESADO" : "ALUMNO"),
                'tipo' => ("SGA"),
            ]); 
      
        }    
 
  
        return response()->json(['alumno' => $alumno]);
        DB::commit();
        
      }catch(Exception $e){
       
        return response()->json(['alumno' => $e->getMessage()]);
        DB::rollback();
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=request()->validate([
            'formulario_direcciones_codigo'=>'required',
            'formulario_direcciones_dni'=>'required',
            'formulario_direcciones_apellidos'=>'required',
            'formulario_direcciones_nombres'=>'required',
            'formulario_direcciones_facultad'=>'required',
            'formulario_direcciones_escuela'=>'required',
            'formulario_direcciones_direccion'=>'required',
            'formulario_direcciones_ubigeo_Departamento'=>'required',
            'formulario_direcciones_ubigeo_Provincia'=>'required',
            'formulario_direcciones_ubigeo_Distrito'=>'required',

        ],
        [
            'formulario_direcciones_codigo'=>'Ingrese Código de matrícula',
            'formulario_direcciones_dni'=>'Ingrese DNI',
            'formulario_direcciones_apellidos'=>'Ingrese Apellidos',
            'formulario_direcciones_nombres'=>'Ingrese Nombres',
            'formulario_direcciones_facultad'=>'Ingrese Facultad',
            'formulario_direcciones_escuela'=>'Ingrese Escuela',
            'formulario_direcciones_direccion.required'=>'Ingrese Dirección',
            'formulario_direcciones_ubigeo_Departamento.required'=>'Ingrese Departamento',
            'formulario_direcciones_ubigeo_Provincia.required'=>'Ingrese Provincia',
            'formulario_direcciones_ubigeo_Distrito.required'=>'Ingrese Distrito',
        ]);


        DB::beginTransaction();
        try{
            $temp_alumno = Formulario_Alumno::where('form_al_dni',$request->formulario_direcciones_dni)->first();

            $temp_escuela = "";
            $id_temp_escuela_SGA = SGA_Dependencia::where('dep_nombre',$request->formulario_direcciones_escuela)->first();
            
            // NOMBRES SUV A TODOS LOS REGISTROS
            if($id_temp_escuela_SGA){
                $temp_escuela_general = Escuela::where('idSGA_PREG',$id_temp_escuela_SGA->dep_id)->first();
                $nombre_escuela_SUV = SUV_Estructura::where('idestructura',$temp_escuela_general->idSUV_PREG)->first();
                $temp_escuela = $nombre_escuela_SUV->estr_descripcion;
            }
            else{
                $temp_escuela = $request->formulario_direcciones_escuela;
            }

            // $temp_ubigeo_departamento = Ubigeo_Departamento::findOrFail('id',$request->formulario_direcciones_ubigeo_Departamento);
            // $temp_ubigeo_provincia = Ubigeo_Provincia::findOrFail('id',$request->formulario_direcciones_ubigeo_Provincia);
            // $temp_ubigeo_distrito = Ubigeo_Distrito::findOrFail('id',$request->formulario_direcciones_ubigeo_Distrito);

            // VERIFICAR SI ALUMNO NO HA ACTUALIZADO SUS DATOS ANTES
            if(!$temp_alumno){
                $formulario_alumno = new Formulario_Alumno();
                $formulario_alumno->form_al_codigo = $request->formulario_direcciones_codigo;
                $formulario_alumno->form_al_dni = $request->formulario_direcciones_dni;
                $formulario_alumno->form_al_apellidos = $request->formulario_direcciones_apellidos;
                $formulario_alumno->form_al_nombres = $request->formulario_direcciones_nombres;
                $formulario_alumno->form_al_facultad = $request->formulario_direcciones_facultad;
                $formulario_alumno->form_al_escuela = $temp_escuela;

                $formulario_alumno->form_al_direccion = $request->formulario_direcciones_direccion;
                $formulario_alumno->form_al_departamento = $request->formulario_direcciones_ubigeo_Departamento;
                $formulario_alumno->form_al_provincia = $request->formulario_direcciones_ubigeo_Provincia;
                $formulario_alumno->form_al_distrito = $request->formulario_direcciones_ubigeo_Distrito;
    
                $formulario_alumno->estado = 1;
 
                $formulario_alumno->save();
                DB::commit();
                return redirect()->route('formulario_direcciones.index')->with('mensaje_alerta_success', 'Actualización de datos exitosa!! Gracias');
            }
            else{

                return redirect()->route('formulario_direcciones.index')->with('mensaje_alerta_error', 'Alumno ya ha actualizado sus datos previamente.');
            }
          
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
