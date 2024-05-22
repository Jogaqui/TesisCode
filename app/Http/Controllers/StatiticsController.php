<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Publicacion;
use App\Etiqueta;
use App\Contactanos;
use App\DIPLOMASAPP_Diploma;
use App\DIPLOMASAPP_Escuela;
use App\Publicacion_Etiqueta;
use App\SGA_Dependencia;
use App\Unidad;
use App\Facultad;
use App\Escuela;
use App\Periodo;
use App\Sede;
use App\Alumno_Ponderado;
use App\DIPLOMASAPP_Graduado;
use App\DIPLOMASAPP_Facultad;
use App\DIPLOMASAPP_Graduado_duplicado;
use App\DIPLOMASAPP_TipoFicha;
use App\SE_Alumno;
use App\URAA_Tramite;
use App\URAA_SemestreAcademico;
use App\SGA_Perfil;
use App\SGA_Sede;
use App\SGA_Semestre;
use App\SGA_Matricula;
use App\SGA_Matricula_Detalle;
use App\SGA_Persona;
use App\SUV_Sede;
use App\SUV_Semestre;
use App\SUV_Matricula;
use App\SUV_Estructura;
use App\SUV_Matricula_Detalle;
use App\SUV_Persona;
use App\URAA_Dependencia;
use App\URAA_Tipo_tramite_unidad;
use Illuminate\Database\Eloquent\Collection;
use PhpParser\Node\Stmt\Else_;

class StatiticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $publicaciones = Publicacion::orderBy('fecha', 'DESC')->where('estado', 1)->paginate(5);
      $unidades = Unidad::where('estado', 1)->get();
      $top = Publicacion::orderBy('fecha', 'DESC')->where('estado', 1)->skip(0)->take(3)->get();
      $mejoresPublicaciones = Publicacion::orderBy('vistas', 'DESC')->where('estado', 1)->skip(0)->take(3)->get();
      $info = Contactanos::where('estado',1)->first();

      $tramites = URAA_Tramite::where('estado',1)
      ->where(function($query)
      {
          $query->where('tramite.idEstado_tramite',15)
          ->orWhere('tramite.idEstado_tramite',44);
      })
      ->count();


      //COUNT - Pregrado tramites para statitics
      $tramites_pregrado_certificados=URAA_Tramite::select('tramite.idTramite','tramite.idUsuario','tramite.idUnidad','tramite.idPrograma','tramite.idEstado_tramite', 
        'tramite.created_at as fecha','tramite.nro_tramite','tramite.nro_matricula')
        ->join('tipo_tramite_unidad','tipo_tramite_unidad.idTipo_tramite_unidad','tramite.idTipo_tramite_unidad')
        ->where('tipo_tramite_unidad.idTipo_tramite',1)
        ->where('tramite.idUnidad',1)
        ->where('tramite.idEstado_tramite',15)
        ->count();

      $tramites_pregrado_grados=URAA_Tramite::select('tramite.idTramite','tramite.idUsuario','tramite.idUnidad','tramite.idPrograma','tramite.idEstado_tramite', 
        'tramite.created_at as fecha','tramite.nro_tramite','tramite.nro_matricula')
        ->join('tipo_tramite_unidad','tipo_tramite_unidad.idTipo_tramite_unidad','tramite.idTipo_tramite_unidad')
        ->where('tipo_tramite_unidad.idTipo_tramite_unidad',15)
        ->where(function($query)
        {
            $query->where('tramite.idEstado_tramite',15)
            ->orWhere('tramite.idEstado_tramite',44);
        })
        ->count();

      $tramites_pregrado_titulos=URAA_Tramite::select('tramite.idTramite','tramite.idUsuario','tramite.idUnidad','tramite.idPrograma','tramite.idEstado_tramite', 
        'tramite.created_at as fecha','tramite.nro_tramite','tramite.nro_matricula')
        ->join('tipo_tramite_unidad','tipo_tramite_unidad.idTipo_tramite_unidad','tramite.idTipo_tramite_unidad')
        ->where('tipo_tramite_unidad.idTipo_tramite_unidad',16)
        ->where(function($query)
        {
            $query->where('tramite.idEstado_tramite',15)
            ->orWhere('tramite.idEstado_tramite',44);
        })
        ->count();


      $tramites_pregrado_carnets=URAA_Tramite::select('tramite.idTramite','tramite.idUsuario','tramite.idUnidad','tramite.idPrograma','tramite.idEstado_tramite', 
        'tramite.created_at as fecha','tramite.nro_tramite','tramite.nro_matricula')
        ->join('tipo_tramite_unidad','tipo_tramite_unidad.idTipo_tramite_unidad','tramite.idTipo_tramite_unidad')
        ->where('tipo_tramite_unidad.idTipo_tramite',3)
        ->where('tramite.idUnidad',1)
        ->where('tramite.idEstado_tramite',15)
        ->count();

      //COUNT - Segunda especialidad tramites para statitics
      $tramites_se_certificados=URAA_Tramite::select('tramite.idTramite','tramite.idUsuario','tramite.idUnidad','tramite.idPrograma','tramite.idEstado_tramite', 
        'tramite.created_at as fecha','tramite.nro_tramite','tramite.nro_matricula')
        ->join('tipo_tramite_unidad','tipo_tramite_unidad.idTipo_tramite_unidad','tramite.idTipo_tramite_unidad')
        ->where('tipo_tramite_unidad.idTipo_tramite',1)
        ->where('tramite.idUnidad',4)
        ->where('tramite.idEstado_tramite',15)
        ->count();

      $tramites_se_titulos=URAA_Tramite::select('tramite.idTramite','tramite.idUsuario','tramite.idUnidad','tramite.idPrograma','tramite.idEstado_tramite', 
        'tramite.created_at as fecha','tramite.nro_tramite','tramite.nro_matricula')
        ->join('tipo_tramite_unidad','tipo_tramite_unidad.idTipo_tramite_unidad','tramite.idTipo_tramite_unidad')
        ->where('tipo_tramite_unidad.idTipo_tramite_unidad',34)
        ->where(function($query)
        {
            $query->where('tramite.idEstado_tramite',15)
            ->orWhere('tramite.idEstado_tramite',44);
        })
        ->count();



      //COUNT - Posgrado tramites para statitics
      $tramites_posgrado_gradosMaestria=1500;
      $tramites_posgrado_gradosDoctorado=600;



      //PERCENTAGE - Porcentaje de tipos de tramite
      $porcentaje_certificados = ($tramites_pregrado_certificados + $tramites_se_certificados) / $tramites;

      $porcentaje_carpetas = ($tramites_pregrado_grados + $tramites_pregrado_titulos + $tramites_se_titulos) / $tramites;

      $porcentaje_carnets = $tramites_pregrado_carnets/ $tramites;

     // dd($porcentaje_certificados, $porcentaje_carpetas, $porcentaje_carnets);

      //Reportes - Matriculas SGA
      $sedes_SGA = SGA_Sede::all();
      $semestres_SGA = SGA_Semestre::select('sga_anio.ani_id','sga_anio.tan_id','sga_tanio.tan_semestre','sga_anio.ani_anio')
      ->join('sga_tanio','sga_tanio.tan_id','sga_anio.tan_id')
      ->orderBy('sga_anio.ani_anio','desc')
      ->orderBy('sga_anio.tan_id','asc')
      ->get();
      $facultades_SGA = SGA_Dependencia::select('dependencia.dep_id','dependencia.tde_id','dependencia.dep_nombre','dependencia.dep_abrev')
      ->where('dependencia.dep_estado',1)
      ->where('dependencia.tde_id',2)
      ->get();

       //Reportes - Matriculas SUV
       $sedes_SUV = SUV_Sede::where('sed_estado', true)->get();
       $semestres_SUV = SUV_Semestre::select('periodo.idperiodo as periodo','periodo.peri_observacion')
       ->where('periodo.peri_estado',true)
       ->orderBy('periodo.idperiodo','desc')
       ->get();
       $facultades_SUV = SUV_Estructura::select('estructura.idestructura','estructura.estr_descripcion')
       ->where('estructura.estr_estado',true)
       ->where('estructura.estr_nivel',1)
       ->get();
  
       //Reportes - Matriculas Consolidado
       $semestres_consolidado = SGA_Semestre::select('sga_anio.ani_id','sga_anio.tan_id','sga_tanio.tan_semestre','sga_anio.ani_anio')
       ->join('sga_tanio','sga_tanio.tan_id','sga_anio.tan_id')
       ->where('sga_anio.ani_activo',1)
       ->orderBy('sga_anio.ani_anio','desc')
       ->orderBy('sga_anio.tan_id','asc')
       ->get();

       // Años Reporte Grados y Titulos
       SGA_Semestre::select('sga_anio.ani_id','sga_anio.tan_id','sga_tanio.tan_semestre','sga_anio.ani_anio')
       ->join('sga_tanio','sga_tanio.tan_id','sga_anio.tan_id')
       ->where('sga_anio.ani_activo',1)
       ->orderBy('sga_anio.ani_anio','desc')
       ->orderBy('sga_anio.tan_id','asc')
       ->first();


       //$facultades_DiplomasApp = DIPLOMASAPP_Facultad::where('Nom_facultad','LIKE','FACULTAD%')->get();

       // ------------------------ DATOS MAESTROS -------------------------------------
       //FACULTADES
       $facultades_URAA_Website = Facultad::where('estado', '1')->get();

       //ESCUELAS
       $escuelas_URAA_Website = Escuela::where('estado', '1')->get();

       //SEMESTRES
       $semestres_URAA_Website = Periodo::where('estado', '1')->orderBy('denominacion','desc')->get();
       $semestres_URAA_Website_primerosPuestos = Periodo::where('anio','2023')->whereIn('tipo_anio',['I','II'])->where('estado', '1')->orderBy('denominacion','asc')->get();

       //SEDES
       $sedes_URAA_Website = Sede::where('estado', '1')->get();

       // ------------------------------------------------------------------------------


       // ULTIMO AÑO - TABLA SEMESTRE ACADEMICO URAA-Tramites
       $query_diplomas_anio_antiguo =  DIPLOMASAPP_Graduado::select(DB::raw('SUBSTR(graduado.fec_expe_d,1,4) as anio_expe'))->where('graduado.fec_expe_d','>=','1970-01-01')->orderBy('graduado.fec_expe_d','asc')->first();

       $query_uraa_anio_ultimo =  URAA_SemestreAcademico::where('semestre_academico.estado',1)->orderBy('semestre_academico.anio','desc')->first();
     
        //Valores numericos de los años traidos por querys
       $diplomas_anio_antiguo =  intval($query_diplomas_anio_antiguo->anio_expe);
       $uraa_anio_ultimo = intval($query_uraa_anio_ultimo->anio);

        //LLenar Coleccion de Años a partir del espectro entre Diplomas App antiguo - URAA Tramite Ultimo
       $pre_anios_grados_titulos = collect();
       for($i=1;$i<=($uraa_anio_ultimo-$diplomas_anio_antiguo+1);$i++){
        $pre_anios_grados_titulos->push(['id'=>$i,'anio'=>strval($diplomas_anio_antiguo+$i-1)]);
       }
       $anios_grados_titulos = $pre_anios_grados_titulos->sortByDesc('anio');


      //dd($anios_grados_titulos);
      //
      // dd($semestres_SUV);
      return view('statitics') -> with(compact(
        'publicaciones', 
        'unidades', 
        'top', 
        'mejoresPublicaciones',
        'info',
        'tramites',
        'tramites_pregrado_certificados', 
        'tramites_pregrado_grados', 
        'tramites_pregrado_titulos', 
        'tramites_pregrado_carnets',
        'tramites_se_certificados',
        'tramites_se_titulos',
        'tramites_posgrado_gradosMaestria',
        'tramites_posgrado_gradosDoctorado',
        'porcentaje_certificados',
        'porcentaje_carpetas',
        'porcentaje_carnets',
        'sedes_SGA',
        'semestres_SGA',
        'facultades_SGA',
        'sedes_SUV',
        'semestres_SUV',
        'facultades_SUV',
        //'facultades_DiplomasApp',
        'facultades_URAA_Website',
        'escuelas_URAA_Website',
        'semestres_URAA_Website',
        'semestres_URAA_Website_primerosPuestos',
        'sedes_URAA_Website',
        'semestres_consolidado',
        'anios_grados_titulos',
  
      ));
    }


    // *********************************************************** EX-REPORTES **************************************************************************
    // ***********************************************************************************************************************************************
    
    // public function getNroAlumnosMatriculadosByEscuela_SGA($sede, $semestre, $dependencia)
    // {
    //   DB::beginTransaction();
    //   try{

    //     //NUEVA QUERY CON GENEROS
    //     $matriculados_SGA =  SGA_Matricula::select('escuela.dep_nombre',
    //     DB::raw('COUNT(CASE WHEN persona.per_sexo = "F" THEN 1 END) AS femenino'),
    //     DB::raw('COUNT(CASE WHEN persona.per_sexo = "M" THEN 1 END) AS masculino'),
    //     DB::raw('COUNT(escuela.dep_id) AS nro_matriculados'))
    //     ->join('perfil','perfil.pfl_id','sga_matricula.pfl_id')
    //     ->join('persona','persona.per_id','perfil.per_id')
    //     ->join('dependencia AS escuela','escuela.dep_id','perfil.dep_id')
    //     //->join('sga_orden_pago AS op','sga_matricula.mat_id','op.mat_id')
    //     ->where('sga_matricula.ani_id',$semestre)
    //     ->where('perfil.sed_id',$sede)
    //     ->where('escuela.sdep_id',$dependencia)
    //     ->where('sga_matricula.mat_estado',1)
    //    // ->where('op.ord_pagado',1)
    //     ->groupBy('escuela.dep_id', 'escuela.dep_nombre')
    //     ->get();
      
    //     return response()->json(['matriculados' => $matriculados_SGA]);
    //     DB::commit();
        
    //   }catch(Exception $e){
    //     return response()->json(['matriculados' => $e->getMessage()]);
    //     DB::rollback();
    //   }
     
    // }

    // public function getNroAlumnosMatriculadosByEscuela_SUV($sede, $semestre, $dependencia)
    // {
    //   DB::beginTransaction();
    //   try{
        
    //     $matriculados_SUV =  SUV_Matricula::select('patrimonio.estructura.estr_descripcion',
    //     DB::raw('COUNT(*) AS nro_matriculados'),
    //     DB::raw("COUNT(CASE WHEN sistema.persona.per_sexo = '0' THEN 1 END) AS femenino"),
    //     DB::raw("COUNT(CASE WHEN sistema.persona.per_sexo = '1' THEN 1 END) AS masculino"))
    //     ->join('matriculas.alumno','matriculas.alumno.idalumno','matricula.idalumno')
    //     ->join('sistema.persona','sistema.persona.idpersona','matriculas.alumno.idpersona')
    //     ->join('patrimonio.area','patrimonio.area.idarea','matriculas.alumno.idarea')
    //     ->join('patrimonio.estructura','patrimonio.estructura.idestructura','patrimonio.area.idestructura')
    //     ->join('matriculas.orden_pago','matriculas.orden_pago.idmatricula','matricula.idmatricula')
    //     ->where('matricula.mat_periodo',$semestre)
    //     ->where('matriculas.alumno.idsede',$sede)
    //     ->where('patrimonio.estructura.iddependencia',$dependencia)
    //     ->where('matriculas.orden_pago.ord_estado',"PAGADA")
    //     ->where('matricula.mat_estado',"1")
    //     ->groupBy('patrimonio.estructura.idestructura')
    //     ->get();
      
    //     return response()->json(['matriculados' => $matriculados_SUV]);
    //     DB::commit();
        
    //   }catch(Exception $e){
    //     return response()->json(['matriculados' => $e->getMessage()]);
    //     DB::rollback();
    //   }
     
    // }

    // Milestones - Matriculas
    public function getMatriculadosTotalesByAnio(){
             
      DB::beginTransaction();
      try{
      
        // N° Matriculados por año - ultimos 5 años
       $n_matriculados_ultimos_5_anios = collect();


       $query_ultimo_periodo = Periodo::where('estado',1)->orderBy('idPeriodo','desc')->first();

       $valor_cantidad_anios = 5;
       $value_query_ultimo_anio_minus5 = intval($query_ultimo_periodo->anio) - $valor_cantidad_anios;
  

        // -------------- SGA -------------
        $query_Matriculados_5anios_SGA =  SGA_Matricula::select('sga_anio.ani_anio',
            DB::raw('COUNT(DISTINCT persona.per_login) AS nro_matriculados'))
            ->join('sga_anio','sga_matricula.ani_id','sga_anio.ani_id')
            ->join('perfil','perfil.pfl_id','sga_matricula.pfl_id')
            ->join('persona','persona.per_id','perfil.per_id')
            ->join('sga_orden_pago AS op','sga_matricula.mat_id','op.mat_id')
            ->where('sga_anio.ani_anio', '>', $value_query_ultimo_anio_minus5)
            ->where('sga_matricula.mat_estado',1)
            ->where('op.ord_pagado',1)
            ->groupBy('sga_anio.ani_anio')
            ->get();
        
        //return dd($query_Matriculados_5anios_SGA);

        // -------------- SUV -------------
        $query_Matriculados_5anios_SUV=  SUV_Matricula::select(
            DB::raw('SUBSTRING(planificacion.periodo.idperiodo,1,4) as anio'),
            DB::raw('COUNT(DISTINCT matricula.idalumno) AS nro_matriculados'))
            ->join('planificacion.periodo','matriculas.matricula.mat_periodo','planificacion.periodo.idperiodo')
            ->join('matriculas.orden_pago','matriculas.orden_pago.idmatricula','matriculas.matricula.idmatricula')
            ->whereRaw('CAST(SUBSTRING(planificacion.periodo.idperiodo,1,4) as INT) >'.$value_query_ultimo_anio_minus5)
            ->where('matriculas.orden_pago.ord_estado',"PAGADA")
            ->where('matricula.mat_estado',1)
            ->groupBy(DB::raw('SUBSTRING(planificacion.periodo.idperiodo,1,4)'))
            ->get();

        // return dd($query_Matriculados_5anios_SGA, $query_Matriculados_5anios_SUV);

          

          //recorrido del array y llenado del collect a mandar a front n_matriculados_ultimos_5anios
          for ($i=0; $i < $valor_cantidad_anios; $i++){

            $total_matriculados_anio = $query_Matriculados_5anios_SGA[$i]['nro_matriculados'] + $query_Matriculados_5anios_SUV[$i]['nro_matriculados'];

            $n_matriculados_ultimos_5_anios->push(
              ['value' => ($total_matriculados_anio),
                'anio' => ($value_query_ultimo_anio_minus5 + $i + 1),
              ]); 

          }

        return response()->json(['n_matriculados_ultimos_5_anios' => $n_matriculados_ultimos_5_anios]);
        DB::commit();
        
      }catch(Exception $e){
        return response()->json(['n_matriculados_ultimos_5_anios' => $e->getMessage()]);
        DB::rollback();
      } 
    
    }


    // Matrículas
    public function getNroMatriculadosByFacultad($sede, $semestre, $dependencia, $tipo)
    {
      DB::beginTransaction();
      try{

        $matriculados = collect();
        $semestre_query = Periodo::where('idPeriodo',$semestre)->where('estado',1)->first();
        $sede_query = Sede::where('idSede',$sede)->where('estado',1)->first();
        $facultad_query = Facultad::where('idFacultad',$dependencia)->where('estado',1)->first();

        $tipo_matriculados = $tipo;

        // TIPO 1 = Por Género
        if($tipo_matriculados == 1){
          
          // -------------- SGA -------------
          $query_Matriculados_SGA =  SGA_Matricula::select('escuela.dep_id','escuela.dep_nombre',
          DB::raw('COUNT(CASE WHEN persona.per_sexo = "F" THEN 1 END) AS femenino'),
          DB::raw('COUNT(CASE WHEN persona.per_sexo = "M" THEN 1 END) AS masculino'),
          DB::raw('COUNT(escuela.dep_id) AS nro_matriculados'))
          ->join('perfil','perfil.pfl_id','sga_matricula.pfl_id')
          ->join('persona','persona.per_id','perfil.per_id')
          ->join('dependencia AS escuela','escuela.dep_id','perfil.dep_id')
          ->join('sga_orden_pago AS op','sga_matricula.mat_id','op.mat_id')
          ->where('sga_matricula.ani_id',$semestre_query->idSGA_PREG)
          ->where(function($query) use ($sede, $sede_query)
          {
            if ($sede != 99) {
              $query->where('perfil.sed_id',$sede_query->idSGA_PREG); //Eligieron Sede
            }  
          })
          ->where('escuela.sdep_id',$facultad_query->idSGA_PREG)
          ->where('sga_matricula.mat_estado',1)
          ->where('op.ord_pagado',1)
          ->where('op.ord_nro','<>',0)
          ->groupBy('escuela.dep_id', 'escuela.dep_nombre')
          ->get();
      
          // -------------- SUV -------------
          $query_Matriculados_SUV=  SUV_Matricula::select(
            'patrimonio.estructura.idestructura',
            'patrimonio.estructura.estr_descripcion', 
            'matriculas.curricula.curr_mencion',
              DB::raw('COUNT(*) AS nro_matriculados'),
              DB::raw("COUNT(CASE WHEN sistema.persona.per_sexo = '0' THEN 1 END) AS femenino"),
              DB::raw("COUNT(CASE WHEN sistema.persona.per_sexo = '1' THEN 1 END) AS masculino"))
              ->join('matriculas.alumno','matriculas.alumno.idalumno','matricula.idalumno')
              ->join('matriculas.curricula','matriculas.alumno.alu_curricula','matriculas.curricula.idcurricula')
              ->join('sistema.persona','sistema.persona.idpersona','matriculas.alumno.idpersona')
              ->join('patrimonio.area','patrimonio.area.idarea','matriculas.alumno.idarea')
              ->join('patrimonio.estructura','patrimonio.estructura.idestructura','patrimonio.area.idestructura')
              ->join('matriculas.orden_pago','matriculas.orden_pago.idmatricula','matricula.idmatricula')
              ->where('matricula.mat_periodo',$semestre_query->idSUV_PREG)
              ->where(function($query) use ($sede, $sede_query)
              {
                if ($sede != 99) {
                  $query->where('matriculas.alumno.idsede',$sede_query->idSUV_PREG); // Eligieron Sede
                }  
              })
              ->where('patrimonio.estructura.iddependencia',$facultad_query->idSUV_PREG)
              ->where('matriculas.orden_pago.ord_estado',"PAGADA")
              ->where('matricula.mat_estado',"1")
              ->groupBy('patrimonio.estructura.idestructura', 'matriculas.curricula.curr_mencion')
              ->get();
        
              //************** VALIDACION SGA + SUV ***************
              $escuela_original = Escuela::where('estado',1)->get();
            
              $idx_temp_SGA = -1;
              $idx_temp_SUV = -1;
       
              foreach ($escuela_original as $key => $escuela_item) { 
                foreach ($query_Matriculados_SGA as $key => $item_SGA) { 
                  if($escuela_item->idSGA_PREG == $item_SGA->dep_id){
                    $idx_temp_SGA = $key;  
                  }
                }
            
                foreach ($query_Matriculados_SUV as $key => $item_SUV) { 
                  if($item_SUV->idestructura != 0){
                    if($escuela_item->idSUV_PREG == $item_SUV->idestructura){
                      $idx_temp_SUV= $key;  
                    }
                  }
                  else{
                    if($escuela_item->idMencionSUV_PREG == $item_SUV->curr_mencion){
                      $idx_temp_SUV= $key;  
                    }
                  }
                }
                // SUMAR ARRAY Consolidado 
                if($idx_temp_SGA != -1 && $idx_temp_SUV != -1){
                  $matriculados->push(
                    ['nro_matriculados' => (
                      $query_Matriculados_SGA[$idx_temp_SGA]->nro_matriculados + 
                      $query_Matriculados_SUV[$idx_temp_SUV]->nro_matriculados),
                      'femenino' => (
                        $query_Matriculados_SGA[$idx_temp_SGA]->femenino + 
                        $query_Matriculados_SUV[$idx_temp_SUV]->femenino),
                      'masculino' => (
                        $query_Matriculados_SGA[$idx_temp_SGA]->masculino + 
                        $query_Matriculados_SUV[$idx_temp_SUV]->masculino),
                     'dep_nombre' => ($escuela_item->nombre),
                    ]);       
                }
                elseif($idx_temp_SGA == -1 && $idx_temp_SUV != -1){
                  $matriculados->push(
                    ['nro_matriculados' => (
                      $query_Matriculados_SUV[$idx_temp_SUV]->nro_matriculados),
                      'femenino' => ($query_Matriculados_SUV[$idx_temp_SUV]->femenino),
                      'masculino' => ($query_Matriculados_SUV[$idx_temp_SUV]->masculino),
                     'dep_nombre' => ($escuela_item->nombre),
                    ]);       
                }
                elseif($idx_temp_SGA != -1 && $idx_temp_SUV == -1){
                  $matriculados->push(
                    ['nro_matriculados' => (
                      $query_Matriculados_SGA[$idx_temp_SGA]->nro_matriculados),
                      'femenino' => ($query_Matriculados_SGA[$idx_temp_SGA]->femenino),
                      'masculino' => ($query_Matriculados_SGA[$idx_temp_SGA]->masculino),
                     'dep_nombre' => ($escuela_item->nombre),
                    ]);       
                }
                
                $idx_temp_SGA = -1;
                $idx_temp_SUV = -1;
            
                 
              }
        }

        // TIPO 2 = Por Sede
        elseif($tipo_matriculados == 2){
          
          // -------------- SGA -------------
          $query_Matriculados_SGA =  SGA_Matricula::select('escuela.dep_id','escuela.dep_nombre',
          DB::raw('COUNT(CASE WHEN perfil.sed_id = "1" THEN 1 END) AS trujillo'),
          DB::raw('COUNT(CASE WHEN perfil.sed_id = "2" THEN 1 END) AS valle_jequetepeque'),
          DB::raw('COUNT(CASE WHEN perfil.sed_id = "4" THEN 1 END) AS huamachuco'),
          DB::raw('COUNT(CASE WHEN perfil.sed_id = "6" THEN 1 END) AS santiago_de_chuco'),
          DB::raw('COUNT(escuela.dep_id) AS nro_matriculados'))
          ->join('perfil','perfil.pfl_id','sga_matricula.pfl_id')
          ->join('persona','persona.per_id','perfil.per_id')
          ->join('dependencia AS escuela','escuela.dep_id','perfil.dep_id')
          ->join('sga_orden_pago AS op','sga_matricula.mat_id','op.mat_id')
          ->where('sga_matricula.ani_id',$semestre_query->idSGA_PREG)
          ->where(function($query) use ($sede, $sede_query)
          {
            if ($sede != 99) {
              $query->where('perfil.sed_id',$sede_query->idSGA_PREG); //Eligieron Sede
            }  
          })
          ->where('escuela.sdep_id',$facultad_query->idSGA_PREG)
          ->where('sga_matricula.mat_estado',1)
         
          ->where('op.ord_pagado',1)
          ->where('op.ord_nro','<>',0)
          ->groupBy('escuela.dep_id', 'escuela.dep_nombre')
          ->get();
      
          // -------------- SUV -------------
          $query_Matriculados_SUV=  SUV_Matricula::select(
            'patrimonio.estructura.idestructura',
            'patrimonio.estructura.estr_descripcion', 
            'matriculas.curricula.curr_mencion',
              DB::raw('COUNT(*) AS nro_matriculados'),
              DB::raw("COUNT(CASE WHEN matriculas.alumno.idsede = '1' THEN 1 END) AS trujillo"),
              DB::raw("COUNT(CASE WHEN matriculas.alumno.idsede = '2' THEN 1 END) AS valle_jequetepeque"),
              DB::raw("COUNT(CASE WHEN matriculas.alumno.idsede = '3' THEN 1 END) AS huamachuco"),
              DB::raw("COUNT(CASE WHEN matriculas.alumno.idsede = '13' THEN 1 END) AS santiago_de_chuco"))
              ->join('matriculas.alumno','matriculas.alumno.idalumno','matricula.idalumno')
              ->join('matriculas.curricula','matriculas.alumno.alu_curricula','matriculas.curricula.idcurricula')
              ->join('sistema.persona','sistema.persona.idpersona','matriculas.alumno.idpersona')
              ->join('patrimonio.area','patrimonio.area.idarea','matriculas.alumno.idarea')
              ->join('patrimonio.estructura','patrimonio.estructura.idestructura','patrimonio.area.idestructura')
              ->join('matriculas.orden_pago','matriculas.orden_pago.idmatricula','matricula.idmatricula')
              ->where('matricula.mat_periodo',$semestre_query->idSUV_PREG)
              ->where(function($query) use ($sede, $sede_query)
              {
                if ($sede != 99) {
                  $query->where('matriculas.alumno.idsede',$sede_query->idSUV_PREG); // Eligieron Sede
                }  
              })
              ->where('patrimonio.estructura.iddependencia',$facultad_query->idSUV_PREG)
              ->where('matriculas.orden_pago.ord_estado',"PAGADA")
              ->where('matricula.mat_estado',"1")
              ->groupBy('patrimonio.estructura.idestructura', 'matriculas.curricula.curr_mencion')
              ->get();
        
              //************** VALIDACION SGA + SUV ***************
              $escuela_original = Escuela::where('estado',1)->get();
            
              $idx_temp_SGA = -1;
              $idx_temp_SUV = -1;
              foreach ($escuela_original as $key => $escuela_item) { 
                foreach ($query_Matriculados_SGA as $key => $item_SGA) { 
                  if($escuela_item->idSGA_PREG == $item_SGA->dep_id){
                    $idx_temp_SGA = $key;  
                  }
                }
            
                foreach ($query_Matriculados_SUV as $key => $item_SUV) { 
                  if($item_SUV->idestructura != 0){
                    if($escuela_item->idSUV_PREG == $item_SUV->idestructura){
                      $idx_temp_SUV= $key;  
                    }
                  }
                  else{
                    if($escuela_item->idMencionSUV_PREG == $item_SUV->curr_mencion){
                      $idx_temp_SUV= $key;  
                    }
                  }
                }
                 
               // SUMAR ARRAY Consolidado 
               if($idx_temp_SGA != -1 && $idx_temp_SUV != -1){
                 $matriculados->push(
                  ['nro_matriculados' => (
                    $query_Matriculados_SGA[$idx_temp_SGA]->nro_matriculados + 
                    $query_Matriculados_SUV[$idx_temp_SUV]->nro_matriculados),
                    'trujillo' => (
                    $query_Matriculados_SGA[$idx_temp_SGA]->trujillo + 
                    $query_Matriculados_SUV[$idx_temp_SUV]->trujillo),
                    'valle_jequetepeque' => (
                    $query_Matriculados_SGA[$idx_temp_SGA]->valle_jequetepeque + 
                    $query_Matriculados_SUV[$idx_temp_SUV]->valle_jequetepeque),
                    'huamachuco' => (
                    $query_Matriculados_SGA[$idx_temp_SGA]->huamachuco + 
                    $query_Matriculados_SUV[$idx_temp_SUV]->huamachuco),
                    'santiago_de_chuco' => (
                    $query_Matriculados_SGA[$idx_temp_SGA]->santiago_de_chuco + 
                    $query_Matriculados_SUV[$idx_temp_SUV]->santiago_de_chuco),
                    'dep_nombre' => ($escuela_item->nombre),
                  ]
                 );       
                }
               elseif($idx_temp_SGA == -1 && $idx_temp_SUV != -1){
                $matriculados->push(
                  ['nro_matriculados' => (
                    $query_Matriculados_SUV[$idx_temp_SUV]->nro_matriculados),
                    'trujillo' => ($query_Matriculados_SUV[$idx_temp_SUV]->trujillo),
                    'valle_jequetepeque' => ($query_Matriculados_SUV[$idx_temp_SUV]->valle_jequetepeque),
                    'huamachuco' => ($query_Matriculados_SUV[$idx_temp_SUV]->huamachuco),
                    'santiago_de_chuco' => ($query_Matriculados_SUV[$idx_temp_SUV]->santiago_de_chuco),
                    'dep_nombre' => ($escuela_item->nombre),
                  ]
                );       
               }
               elseif($idx_temp_SGA != -1 && $idx_temp_SUV == -1){
                $matriculados->push(
                  ['nro_matriculados' => (
                    $query_Matriculados_SGA[$idx_temp_SGA]->nro_matriculados),
                    'trujillo' => ($query_Matriculados_SGA[$idx_temp_SGA]->trujillo),
                    'valle_jequetepeque' => ($query_Matriculados_SGA[$idx_temp_SGA]->valle_jequetepeque),
                    'huamachuco' => ($query_Matriculados_SGA[$idx_temp_SGA]->huamachuco),
                    'santiago_de_chuco' => ($query_Matriculados_SGA[$idx_temp_SGA]->santiago_de_chuco),
                    'dep_nombre' => ($escuela_item->nombre),
                  ]
                );       
               }
                       
               $idx_temp_SGA = -1;
               $idx_temp_SUV = -1;
                 
              }
        }

        // TIPO 3 = Por Vez
        elseif($tipo_matriculados == 3){
  
  
          // -------------- SGA -------------
          //$subq_SGA_1 = SGA_Matricula_Detalle::select(DB::raw('MAX(sga_det_matricula.dma_vez) as maxima_vez, sga_det_matricula.mat_id'))->groupBy('sga_det_matricula.mat_id');
  
          $query_Matriculados_SGA =  SGA_Matricula_Detalle::select('escuela.dep_id','escuela.dep_nombre',
          DB::raw('COUNT(DISTINCT sga_matricula.mat_id) AS nro_matriculados'),
          DB::raw("( COUNT(DISTINCT sga_matricula.mat_id) 
                      - COUNT(DISTINCT CASE WHEN sga_det_matricula.dma_vez = 2 THEN sga_matricula.mat_id END) 
                      - COUNT(DISTINCT CASE WHEN sga_det_matricula.dma_vez = 3 THEN sga_matricula.mat_id END) 
                      - COUNT(DISTINCT CASE WHEN sga_det_matricula.dma_vez = 4 THEN sga_matricula.mat_id END) ) AS vez_1"),
          DB::raw("COUNT(DISTINCT CASE WHEN sga_det_matricula.dma_vez = 2 THEN sga_matricula.mat_id END) AS vez_2"),
          DB::raw("COUNT(DISTINCT CASE WHEN sga_det_matricula.dma_vez = 3 THEN sga_matricula.mat_id END) AS vez_3"),
          DB::raw("COUNT(DISTINCT CASE WHEN sga_det_matricula.dma_vez = 4 THEN sga_matricula.mat_id END) AS vez_4"))
          ->join('sga_matricula','sga_matricula.mat_id','sga_det_matricula.mat_id')
          ->join('perfil','perfil.pfl_id','sga_matricula.pfl_id')
          ->join('persona','persona.per_id','perfil.per_id')
          ->join('dependencia AS escuela','escuela.dep_id','perfil.dep_id')
          ->join('sga_orden_pago AS op','sga_matricula.mat_id','op.mat_id')
          ->where('sga_matricula.ani_id',$semestre_query->idSGA_PREG)
          ->where(function($query) use ($sede, $sede_query)
          {
            if ($sede != 99) {
              $query->where('perfil.sed_id',$sede_query->idSGA_PREG); // Eligieron Sede
            }  
          })
          ->where('escuela.sdep_id',$facultad_query->idSGA_PREG)
          ->where('sga_matricula.mat_estado',1)
          ->where('sga_det_matricula.dma_estado',1)
         
          ->where('op.ord_pagado',1)
          ->where('op.ord_nro','<>',0)
          ->groupBy('escuela.dep_id', 'escuela.dep_nombre')
          ->get();
      
          // -------------- SUV -------------
          //$subq_SUV_1 = SUV_Matricula_Detalle::select(DB::raw('MAX(matricula_detalle.dem_numvez), matricula_detalle.idmatricula'))->groupBy('matricula_detalle.idmatricula');
  
          $query_Matriculados_SUV=  SUV_Matricula_Detalle::select(
            'patrimonio.estructura.idestructura',
            'patrimonio.estructura.estr_descripcion', 
            'matriculas.curricula.curr_mencion',
              DB::raw('COUNT(DISTINCT matricula.idmatricula) AS nro_matriculados'),
              DB::raw("( COUNT(DISTINCT matricula.idmatricula) 
                        - COUNT(DISTINCT CASE WHEN matricula_detalle.dem_numvez = 2 THEN matricula.idmatricula END) 
                        - COUNT(DISTINCT CASE WHEN matricula_detalle.dem_numvez = 3 THEN matricula.idmatricula END) 
                        - COUNT(DISTINCT CASE WHEN matricula_detalle.dem_numvez = 4 THEN matricula.idmatricula END) ) AS vez_1"),
              DB::raw("COUNT(DISTINCT CASE WHEN matricula_detalle.dem_numvez = 2 THEN matricula.idmatricula END) AS vez_2"),
              DB::raw("COUNT(DISTINCT CASE WHEN matricula_detalle.dem_numvez = 3 THEN matricula.idmatricula END) AS vez_3"),
              DB::raw("COUNT(DISTINCT CASE WHEN matricula_detalle.dem_numvez = 4 THEN matricula.idmatricula END) AS vez_4"))
              ->join('matriculas.matricula','matricula_detalle.idmatricula','matriculas.matricula.idmatricula')
              ->join('matriculas.alumno','matriculas.alumno.idalumno','matriculas.matricula.idalumno')
              ->join('matriculas.curricula','matriculas.alumno.alu_curricula','matriculas.curricula.idcurricula')
              ->join('sistema.persona','sistema.persona.idpersona','matriculas.alumno.idpersona')
              ->join('patrimonio.area','patrimonio.area.idarea','matriculas.alumno.idarea')
              ->join('patrimonio.estructura','patrimonio.estructura.idestructura','patrimonio.area.idestructura')
              ->join('matriculas.orden_pago','matriculas.orden_pago.idmatricula','matriculas.matricula.idmatricula')
              ->where('matriculas.matricula.mat_periodo',$semestre_query->idSUV_PREG)
              ->where(function($query) use ($sede, $sede_query)
              {
                if ($sede != 99) {
                  $query->where('matriculas.alumno.idsede',$sede_query->idSUV_PREG); // Eligieron Sede
                }  
              })
              ->where('patrimonio.estructura.iddependencia',$facultad_query->idSUV_PREG)
              ->where('matriculas.orden_pago.ord_estado',"PAGADA")
              ->where('matriculas.matricula.mat_estado',"1")
              ->where('matricula_detalle.dem_estado',"1")
              ->groupBy('patrimonio.estructura.idestructura', 'matriculas.curricula.curr_mencion')
              ->get();
        
              //return dd($query_Matriculados_SGA, $query_Matriculados_SUV);
              //************** VALIDACION SGA + SUV ***************
              $escuela_original = Escuela::where('estado',1)->get();
            
              $idx_temp_SGA = -1;
              $idx_temp_SUV = -1;
       
              foreach ($escuela_original as $key => $escuela_item) { 
                foreach ($query_Matriculados_SGA as $key => $item_SGA) { 
                  if($escuela_item->idSGA_PREG == $item_SGA->dep_id){
                    $idx_temp_SGA = $key;  
                  }
                }
            
                foreach ($query_Matriculados_SUV as $key => $item_SUV) { 
                  if($item_SUV->idestructura != 0){
                    if($escuela_item->idSUV_PREG == $item_SUV->idestructura){
                      $idx_temp_SUV= $key;  
                    }
                  }
                  else{
                    if($escuela_item->idMencionSUV_PREG == $item_SUV->curr_mencion){
                      $idx_temp_SUV= $key;  
                    }
                  }
                }
                // SUMAR ARRAY  
                if($idx_temp_SGA != -1 && $idx_temp_SUV != -1){
                  $matriculados->push(
                    ['nro_matriculados' => (
                      $query_Matriculados_SGA[$idx_temp_SGA]->nro_matriculados + 
                      $query_Matriculados_SUV[$idx_temp_SUV]->nro_matriculados),
                      'vez_1' => (
                        $query_Matriculados_SGA[$idx_temp_SGA]->vez_1 + 
                        $query_Matriculados_SUV[$idx_temp_SUV]->vez_1),
                      'vez_2' => (
                        $query_Matriculados_SGA[$idx_temp_SGA]->vez_2 + 
                        $query_Matriculados_SUV[$idx_temp_SUV]->vez_2),
                      'vez_3' => (
                        $query_Matriculados_SGA[$idx_temp_SGA]->vez_3 + 
                        $query_Matriculados_SUV[$idx_temp_SUV]->vez_3),
                      'vez_4' => (
                        $query_Matriculados_SGA[$idx_temp_SGA]->vez_4 + 
                        $query_Matriculados_SUV[$idx_temp_SUV]->vez_4),
                     'dep_nombre' => ($escuela_item->nombre),
                    ]);       
                }
                elseif($idx_temp_SGA == -1 && $idx_temp_SUV != -1){
                  $matriculados->push(
                    ['nro_matriculados' => (
                      $query_Matriculados_SUV[$idx_temp_SUV]->nro_matriculados),
                      'vez_1' => ($query_Matriculados_SUV[$idx_temp_SUV]->vez_1),
                      'vez_2' => ($query_Matriculados_SUV[$idx_temp_SUV]->vez_2),
                      'vez_3' => ($query_Matriculados_SUV[$idx_temp_SUV]->vez_3),
                      'vez_4' => ($query_Matriculados_SUV[$idx_temp_SUV]->vez_4),
                     'dep_nombre' => ($escuela_item->nombre),
                    ]);       
                }
                elseif($idx_temp_SGA != -1 && $idx_temp_SUV == -1){
                  $matriculados->push(
                    ['nro_matriculados' => (
                      $query_Matriculados_SGA[$idx_temp_SGA]->nro_matriculados),
                      'vez_1' => ($query_Matriculados_SGA[$idx_temp_SGA]->vez_1),
                      'vez_2' => ($query_Matriculados_SGA[$idx_temp_SGA]->vez_2),
                      'vez_3' => ($query_Matriculados_SGA[$idx_temp_SGA]->vez_3),
                      'vez_4' => ($query_Matriculados_SGA[$idx_temp_SGA]->vez_4),
                     'dep_nombre' => ($escuela_item->nombre),
                    ]);       
                }
                
                $idx_temp_SGA = -1;
                $idx_temp_SUV = -1;
            
                 
              }
        }
        

        return response()->json(['matriculados' => $matriculados, 'tipo_matriculados' => $tipo_matriculados]);
        DB::commit();
        
      }catch(Exception $e){
        return response()->json(['matriculados' => $e->getMessage()]);
        DB::rollback();
      }
    }


    // Matrículas - Consolidado
    public function getNroMatriculadosConsolidado($semestre, $tipo_consolidado)
    {
      DB::beginTransaction();
      try{
        
        $matriculados_Consolidado = collect();
        $semestre_query = Periodo::where('idPeriodo',$semestre)->where('estado',1)->first();

        $tipo_consolidado_Matriculados = $tipo_consolidado;
        
        // Tipo Consolidado por Género = 1
        if($tipo_consolidado_Matriculados == 1){
            
          // -------------- SGA -------------
          $query_Matriculados_SGA =  SGA_Matricula::select('facultad.dep_id','facultad.dep_nombre',
          DB::raw('COUNT(CASE WHEN persona.per_sexo = "F" THEN 1 END) AS femenino'),
          DB::raw('COUNT(CASE WHEN persona.per_sexo = "M" THEN 1 END) AS masculino'),
          DB::raw('COUNT(facultad.dep_id) AS nro_matriculados'))
          ->join('perfil','perfil.pfl_id','sga_matricula.pfl_id')
          ->join('persona','persona.per_id','perfil.per_id')
          ->join('dependencia AS escuela','escuela.dep_id','perfil.dep_id')
          ->join('dependencia AS facultad','facultad.dep_id','escuela.sdep_id')
          ->join('sga_orden_pago AS op','sga_matricula.mat_id','op.mat_id')
          ->where('sga_matricula.ani_id',$semestre_query->idSGA_PREG)
          ->where('facultad.tde_id', '2')
          ->where('facultad.dep_estado',1)
          ->where('sga_matricula.mat_estado',1)
          ->where('op.ord_pagado',1)
          ->where('op.ord_nro','<>',0)
          ->groupBy('facultad.dep_id', 'facultad.dep_nombre')
          ->get();
          // -------------- SUV -------------
          $query_Matriculados_SUV=  SUV_Matricula::select(
            'facultad.idestructura',
            'facultad.estr_descripcion', 
              DB::raw('COUNT(*) AS nro_matriculados'),
              DB::raw("COUNT(CASE WHEN sistema.persona.per_sexo = '0' THEN 1 END) AS femenino"),
              DB::raw("COUNT(CASE WHEN sistema.persona.per_sexo = '1' THEN 1 END) AS masculino"))
              ->join('matriculas.alumno','matriculas.alumno.idalumno','matricula.idalumno')
              ->join('sistema.persona','sistema.persona.idpersona','matriculas.alumno.idpersona')
              ->join('patrimonio.area','patrimonio.area.idarea','matriculas.alumno.idarea')
              ->join('patrimonio.estructura AS escuela','escuela.idestructura','patrimonio.area.idestructura')
              ->join('patrimonio.estructura AS facultad','facultad.idestructura','escuela.iddependencia')
              ->join('matriculas.orden_pago','matriculas.orden_pago.idmatricula','matricula.idmatricula')
              ->where('matricula.mat_periodo',$semestre_query->idSUV_PREG)
              ->where('facultad.estr_descripcion','like','FACULTAD%')
              ->where('facultad.estr_estado',1)
              ->where('matriculas.orden_pago.ord_estado',"PAGADA")
              ->where('matricula.mat_estado',1)
              ->groupBy('facultad.idestructura', 'facultad.estr_descripcion')
              ->get();
              
              
          //return dd($query_Matriculados_SGA, $query_Matriculados_SUV);
          //************** VALIDACION URAA + DIPLOMAS APP ***************
                  
          $facultad_original = Facultad::where('estado',1)->get();
             
          $idx_temp_SGA = -1;
          $idx_temp_SUV = -1;
          foreach ($facultad_original as $key => $facultad_item) { 
            foreach ($query_Matriculados_SGA as $key => $item_SGA) { 
              if($facultad_item->idSGA_PREG == $item_SGA->dep_id){
                $idx_temp_SGA = $key;  
              }
            }
             
            foreach ($query_Matriculados_SUV as $key => $item_SUV) { 
              if($facultad_item->idSUV_PREG == $item_SUV->idestructura){
                $idx_temp_SUV= $key;  
              }
            }
             
           // SUMAR ARRAY Consolidado 
           if($idx_temp_SGA != -1 && $idx_temp_SUV != -1){
             $matriculados_Consolidado->push(
              ['nro_matriculados_consolidado' => (
                $query_Matriculados_SGA[$idx_temp_SGA]->nro_matriculados + 
                $query_Matriculados_SUV[$idx_temp_SUV]->nro_matriculados),
                'femenino' => (
                $query_Matriculados_SGA[$idx_temp_SGA]->femenino + 
                $query_Matriculados_SUV[$idx_temp_SUV]->femenino),
                'masculino' => (
                $query_Matriculados_SGA[$idx_temp_SGA]->masculino + 
                $query_Matriculados_SUV[$idx_temp_SUV]->masculino),
                'dep_nombre' => ($facultad_item->nombre),
              ]
             );       
            }
           elseif($idx_temp_SGA == -1 && $idx_temp_SUV != -1){
            $matriculados_Consolidado->push(
              ['nro_matriculados_consolidado' => (
                $query_Matriculados_SUV[$idx_temp_SUV]->nro_matriculados),
                'femenino' => ($query_Matriculados_SUV[$idx_temp_SUV]->femenino),
                'masculino' => ($query_Matriculados_SUV[$idx_temp_SUV]->masculino),
                'dep_nombre' => ($facultad_item->nombre),
              ]
            );       
           }
           elseif($idx_temp_SGA != -1 && $idx_temp_SUV == -1){
            $matriculados_Consolidado->push(
              ['nro_matriculados_consolidado' => (
                $query_Matriculados_SGA[$idx_temp_SGA]->nro_matriculados),
                'femenino' => ($query_Matriculados_SGA[$idx_temp_SGA]->femenino),
                'masculino' => ($query_Matriculados_SGA[$idx_temp_SGA]->masculino),
                'dep_nombre' => ($facultad_item->nombre),
              ]
            );       
           }
                   
           $idx_temp_SGA = -1;
           $idx_temp_SUV = -1;
             
          }
        }

        // Tipo Consolidado por Sede = 2
        elseif($tipo_consolidado_Matriculados == 2){
            
          // -------------- SGA -------------
          $query_Matriculados_SGA =  SGA_Matricula::select('facultad.dep_id','facultad.dep_nombre',
          DB::raw('COUNT(CASE WHEN perfil.sed_id = "1" THEN 1 END) AS trujillo'),
          DB::raw('COUNT(CASE WHEN perfil.sed_id = "2" THEN 1 END) AS valle_jequetepeque'),
          DB::raw('COUNT(CASE WHEN perfil.sed_id = "4" THEN 1 END) AS huamachuco'),
          DB::raw('COUNT(CASE WHEN perfil.sed_id = "6" THEN 1 END) AS santiago_de_chuco'),
          DB::raw('COUNT(facultad.dep_id) AS nro_matriculados'))
          ->join('perfil','perfil.pfl_id','sga_matricula.pfl_id')
          ->join('persona','persona.per_id','perfil.per_id')
          ->join('dependencia AS escuela','escuela.dep_id','perfil.dep_id')
          ->join('dependencia AS facultad','facultad.dep_id','escuela.sdep_id')
          ->join('sga_orden_pago AS op','sga_matricula.mat_id','op.mat_id')
          ->where('sga_matricula.ani_id',$semestre_query->idSGA_PREG)
          ->where('facultad.tde_id', '2')
          ->where('facultad.dep_estado',1)
          ->where('sga_matricula.mat_estado',1)
          ->where('op.ord_pagado',1)
          ->where('op.ord_nro','<>',0)
          ->groupBy('facultad.dep_id', 'facultad.dep_nombre')
          ->get();
          // -------------- SUV -------------
          $query_Matriculados_SUV=  SUV_Matricula::select(
            'facultad.idestructura',
            'facultad.estr_descripcion', 
              DB::raw('COUNT(*) AS nro_matriculados'),
              DB::raw("COUNT(CASE WHEN matriculas.alumno.idsede = '1' THEN 1 END) AS trujillo"),
              DB::raw("COUNT(CASE WHEN matriculas.alumno.idsede = '2' THEN 1 END) AS valle_jequetepeque"),
              DB::raw("COUNT(CASE WHEN matriculas.alumno.idsede = '3' THEN 1 END) AS huamachuco"),
              DB::raw("COUNT(CASE WHEN matriculas.alumno.idsede = '13' THEN 1 END) AS santiago_de_chuco"))
              ->join('matriculas.alumno','matriculas.alumno.idalumno','matricula.idalumno')
              ->join('sistema.persona','sistema.persona.idpersona','matriculas.alumno.idpersona')
              ->join('patrimonio.area','patrimonio.area.idarea','matriculas.alumno.idarea')
              ->join('patrimonio.estructura AS escuela','escuela.idestructura','patrimonio.area.idestructura')
              ->join('patrimonio.estructura AS facultad','facultad.idestructura','escuela.iddependencia')
              ->join('matriculas.orden_pago','matriculas.orden_pago.idmatricula','matricula.idmatricula')
              ->where('matricula.mat_periodo',$semestre_query->idSUV_PREG)
              ->where('facultad.estr_descripcion','like','FACULTAD%')
              ->where('facultad.estr_estado',1)
              ->where('matriculas.orden_pago.ord_estado',"PAGADA")
              ->where('matricula.mat_estado',1)
              ->groupBy('facultad.idestructura', 'facultad.estr_descripcion')
              ->get();
              
              
          //return dd($query_Matriculados_SGA, $query_Matriculados_SUV);
          //************** VALIDACION URAA + DIPLOMAS APP ***************
                  
          $facultad_original = Facultad::where('estado',1)->get();
             
          $idx_temp_SGA = -1;
          $idx_temp_SUV = -1;
          foreach ($facultad_original as $key => $facultad_item) { 
            foreach ($query_Matriculados_SGA as $key => $item_SGA) { 
              if($facultad_item->idSGA_PREG == $item_SGA->dep_id){
                $idx_temp_SGA = $key;  
              }
            }
             
            foreach ($query_Matriculados_SUV as $key => $item_SUV) { 
              if($facultad_item->idSUV_PREG == $item_SUV->idestructura){
                $idx_temp_SUV= $key;  
              }
            }
             
           // SUMAR ARRAY Consolidado 
           if($idx_temp_SGA != -1 && $idx_temp_SUV != -1){
             $matriculados_Consolidado->push(
              ['nro_matriculados_consolidado' => (
                $query_Matriculados_SGA[$idx_temp_SGA]->nro_matriculados + 
                $query_Matriculados_SUV[$idx_temp_SUV]->nro_matriculados),
                'trujillo' => (
                $query_Matriculados_SGA[$idx_temp_SGA]->trujillo + 
                $query_Matriculados_SUV[$idx_temp_SUV]->trujillo),
                'valle_jequetepeque' => (
                $query_Matriculados_SGA[$idx_temp_SGA]->valle_jequetepeque + 
                $query_Matriculados_SUV[$idx_temp_SUV]->valle_jequetepeque),
                'huamachuco' => (
                $query_Matriculados_SGA[$idx_temp_SGA]->huamachuco + 
                $query_Matriculados_SUV[$idx_temp_SUV]->huamachuco),
                'santiago_de_chuco' => (
                $query_Matriculados_SGA[$idx_temp_SGA]->santiago_de_chuco + 
                $query_Matriculados_SUV[$idx_temp_SUV]->santiago_de_chuco),
                'dep_nombre' => ($facultad_item->nombre),
              ]
             );       
            }
           elseif($idx_temp_SGA == -1 && $idx_temp_SUV != -1){
            $matriculados_Consolidado->push(
              ['nro_matriculados_consolidado' => (
                $query_Matriculados_SUV[$idx_temp_SUV]->nro_matriculados),
                'trujillo' => ($query_Matriculados_SUV[$idx_temp_SUV]->trujillo),
                'valle_jequetepeque' => ($query_Matriculados_SUV[$idx_temp_SUV]->valle_jequetepeque),
                'huamachuco' => ($query_Matriculados_SUV[$idx_temp_SUV]->huamachuco),
                'santiago_de_chuco' => ($query_Matriculados_SUV[$idx_temp_SUV]->santiago_de_chuco),
                'dep_nombre' => ($facultad_item->nombre),
              ]
            );       
           }
           elseif($idx_temp_SGA != -1 && $idx_temp_SUV == -1){
            $matriculados_Consolidado->push(
              ['nro_matriculados_consolidado' => (
                $query_Matriculados_SGA[$idx_temp_SGA]->nro_matriculados),
                'trujillo' => ($query_Matriculados_SGA[$idx_temp_SGA]->trujillo),
                'valle_jequetepeque' => ($query_Matriculados_SGA[$idx_temp_SGA]->valle_jequetepeque),
                'huamachuco' => ($query_Matriculados_SGA[$idx_temp_SGA]->huamachuco),
                'santiago_de_chuco' => ($query_Matriculados_SGA[$idx_temp_SGA]->santiago_de_chuco),
                'dep_nombre' => ($facultad_item->nombre),
              ]
            );       
           }
                   
           $idx_temp_SGA = -1;
           $idx_temp_SUV = -1;
             
          }
        }

        // Tipo Consolidado por Vez de Matrícula = 3 
        elseif($tipo_consolidado_Matriculados == 3){
  
  
          // -------------- SGA -------------
          //$subq_SGA_1 = SGA_Matricula_Detalle::select(DB::raw('MAX(sga_det_matricula.dma_vez) as maxima_vez, sga_det_matricula.mat_id'))->groupBy('sga_det_matricula.mat_id');
  
          $query_Matriculados_SGA =  SGA_Matricula_Detalle::select('facultad.dep_id','facultad.dep_nombre',
          DB::raw('COUNT(DISTINCT sga_matricula.mat_id) AS nro_matriculados'),
          DB::raw("( COUNT(DISTINCT sga_matricula.mat_id) 
                      - COUNT(DISTINCT CASE WHEN sga_det_matricula.dma_vez = 2 THEN sga_matricula.mat_id END) 
                      - COUNT(DISTINCT CASE WHEN sga_det_matricula.dma_vez = 3 THEN sga_matricula.mat_id END) 
                      - COUNT(DISTINCT CASE WHEN sga_det_matricula.dma_vez = 4 THEN sga_matricula.mat_id END) ) AS vez_1"),
          DB::raw("COUNT(DISTINCT CASE WHEN sga_det_matricula.dma_vez = 2 THEN sga_matricula.mat_id END) AS vez_2"),
          DB::raw("COUNT(DISTINCT CASE WHEN sga_det_matricula.dma_vez = 3 THEN sga_matricula.mat_id END) AS vez_3"),
          DB::raw("COUNT(DISTINCT CASE WHEN sga_det_matricula.dma_vez = 4 THEN sga_matricula.mat_id END) AS vez_4"))
          ->join('sga_matricula','sga_matricula.mat_id','sga_det_matricula.mat_id')
          ->join('perfil','perfil.pfl_id','sga_matricula.pfl_id')
          ->join('dependencia AS escuela','escuela.dep_id','perfil.dep_id')
          ->join('dependencia AS facultad','facultad.dep_id','escuela.sdep_id')
          ->join('sga_orden_pago AS op','sga_matricula.mat_id','op.mat_id')
          ->where('sga_matricula.ani_id',$semestre_query->idSGA_PREG)
          ->where('facultad.tde_id', '2')
          ->where('facultad.dep_estado',1)
          ->where('sga_matricula.mat_estado',1)
          ->where('sga_det_matricula.dma_estado',1)
         
          ->where('op.ord_pagado',1)
          ->where('op.ord_nro','<>',0)
          ->groupBy('facultad.dep_id', 'facultad.dep_nombre')
          ->get();
      
          // -------------- SUV -------------
          //$subq_SUV_1 = SUV_Matricula_Detalle::select(DB::raw('MAX(matricula_detalle.dem_numvez), matricula_detalle.idmatricula'))->groupBy('matricula_detalle.idmatricula');
  
          $query_Matriculados_SUV=  SUV_Matricula_Detalle::select(
            'facultad.idestructura',
            'facultad.estr_descripcion',  
              DB::raw('COUNT(DISTINCT matricula.idmatricula) AS nro_matriculados'),
              DB::raw("( COUNT(DISTINCT matricula.idmatricula) 
                        - COUNT(DISTINCT CASE WHEN matricula_detalle.dem_numvez = 2 THEN matricula.idmatricula END) 
                        - COUNT(DISTINCT CASE WHEN matricula_detalle.dem_numvez = 3 THEN matricula.idmatricula END) 
                        - COUNT(DISTINCT CASE WHEN matricula_detalle.dem_numvez = 4 THEN matricula.idmatricula END) ) AS vez_1"),
              DB::raw("COUNT(DISTINCT CASE WHEN matricula_detalle.dem_numvez = 2 THEN matricula.idmatricula END) AS vez_2"),
              DB::raw("COUNT(DISTINCT CASE WHEN matricula_detalle.dem_numvez = 3 THEN matricula.idmatricula END) AS vez_3"),
              DB::raw("COUNT(DISTINCT CASE WHEN matricula_detalle.dem_numvez = 4 THEN matricula.idmatricula END) AS vez_4"))
              ->join('matriculas.matricula','matricula_detalle.idmatricula','matriculas.matricula.idmatricula')
              ->join('matriculas.alumno','matriculas.alumno.idalumno','matriculas.matricula.idalumno')
              ->join('patrimonio.area','patrimonio.area.idarea','matriculas.alumno.idarea')
              ->join('patrimonio.estructura AS escuela','escuela.idestructura','patrimonio.area.idestructura')
              ->join('patrimonio.estructura AS facultad','facultad.idestructura','escuela.iddependencia')
              ->join('matriculas.orden_pago','matriculas.orden_pago.idmatricula','matriculas.matricula.idmatricula')
              ->where('matriculas.matricula.mat_periodo',$semestre_query->idSUV_PREG)
              ->where('facultad.estr_descripcion','like','FACULTAD%')
              ->where('facultad.estr_estado',1)
              ->where('matriculas.orden_pago.ord_estado',"PAGADA")
              ->where('matriculas.matricula.mat_estado',"1")
              ->where('matricula_detalle.dem_estado',"1")
              ->groupBy('facultad.idestructura', 'facultad.estr_descripcion')
              ->get();
        
              //return dd($query_Matriculados_SGA, $query_Matriculados_SUV);
              //************** VALIDACION SGA + SUV ***************
              $facultad_original = Facultad::where('estado',1)->get();
                 
              $idx_temp_SGA = -1;
              $idx_temp_SUV = -1;

              foreach ($facultad_original as $key => $facultad_item) { 
                foreach ($query_Matriculados_SGA as $key => $item_SGA) { 
                  if($facultad_item->idSGA_PREG == $item_SGA->dep_id){
                    $idx_temp_SGA = $key;  
                  }
                }
                 
                foreach ($query_Matriculados_SUV as $key => $item_SUV) { 
                  if($facultad_item->idSUV_PREG == $item_SUV->idestructura){
                    $idx_temp_SUV= $key;  
                  }
                }  
                       
                // SUMAR ARRAY  
                if($idx_temp_SGA != -1 && $idx_temp_SUV != -1){
                  $matriculados_Consolidado->push(
                    ['nro_matriculados_consolidado' => (
                      $query_Matriculados_SGA[$idx_temp_SGA]->nro_matriculados + 
                      $query_Matriculados_SUV[$idx_temp_SUV]->nro_matriculados),
                      'vez_1' => (
                        $query_Matriculados_SGA[$idx_temp_SGA]->vez_1 + 
                        $query_Matriculados_SUV[$idx_temp_SUV]->vez_1),
                      'vez_2' => (
                        $query_Matriculados_SGA[$idx_temp_SGA]->vez_2 + 
                        $query_Matriculados_SUV[$idx_temp_SUV]->vez_2),
                      'vez_3' => (
                        $query_Matriculados_SGA[$idx_temp_SGA]->vez_3 + 
                        $query_Matriculados_SUV[$idx_temp_SUV]->vez_3),
                      'vez_4' => (
                        $query_Matriculados_SGA[$idx_temp_SGA]->vez_4 + 
                        $query_Matriculados_SUV[$idx_temp_SUV]->vez_4),
                     'dep_nombre' => ($facultad_item->nombre),
                    ]);       
                }
                elseif($idx_temp_SGA == -1 && $idx_temp_SUV != -1){
                  $matriculados_Consolidado->push(
                    ['nro_matriculados_consolidado' => (
                      $query_Matriculados_SUV[$idx_temp_SUV]->nro_matriculados),
                      'vez_1' => ($query_Matriculados_SUV[$idx_temp_SUV]->vez_1),
                      'vez_2' => ($query_Matriculados_SUV[$idx_temp_SUV]->vez_2),
                      'vez_3' => ($query_Matriculados_SUV[$idx_temp_SUV]->vez_3),
                      'vez_4' => ($query_Matriculados_SUV[$idx_temp_SUV]->vez_4),
                     'dep_nombre' => ($facultad_item->nombre),
                    ]);       
                }
                elseif($idx_temp_SGA != -1 && $idx_temp_SUV == -1){
                  $matriculados_Consolidado->push(
                    ['nro_matriculados_consolidado' => (
                      $query_Matriculados_SGA[$idx_temp_SGA]->nro_matriculados),
                      'vez_1' => ($query_Matriculados_SGA[$idx_temp_SGA]->vez_1),
                      'vez_2' => ($query_Matriculados_SGA[$idx_temp_SGA]->vez_2),
                      'vez_3' => ($query_Matriculados_SGA[$idx_temp_SGA]->vez_3),
                      'vez_4' => ($query_Matriculados_SGA[$idx_temp_SGA]->vez_4),
                     'dep_nombre' => ($facultad_item->nombre),
                    ]);       
                }
                
                $idx_temp_SGA = -1;
                $idx_temp_SUV = -1;
            
                 
              }
        }

        return response()->json(['matriculados' => $matriculados_Consolidado, 'tipo_consolidado_Matriculados' => $tipo_consolidado_Matriculados]);
        DB::commit();
        
      }catch(Exception $e){
        return response()->json(['matriculados' => $e->getMessage()]);
        DB::rollback();
      }
     
    }


    // Grados y Títulos
    public function getNroGraduadosTituladosByFacultad($tipo, $condicion, $anio, $dependencia)
    {
      DB::beginTransaction();
      try{

        $graduados_titulados = collect();
        $header_tipo = "";
        $idTipo_ficha_DiplomasApp_1 = "0";
        $idTipo_ficha_DiplomasApp_2 = "0";
        $idTipo_tramite_unidad_URAA = "0";
        $idTipo_tramite_unidad_URAA_duplicados = "0";

        // ------------------------------------------------------------ TIPO -------------------------------------------------------------------
        // ----------------- Tipo: GRADOS -----------------
        if($tipo==1){

          $header_tipo = "GRADUADOS";
          $idTipo_ficha_DiplomasApp_1 = "1";
          $idTipo_ficha_DiplomasApp_2 = "7";
          $idTipo_tramite_unidad_URAA = "15";
          $idTipo_tramite_unidad_URAA_duplicados = "0";

        }

        // ----------------- Tipo: TÍTULOS -----------------
        elseif($tipo==2){

          $header_tipo = "TITULADOS";
          $idTipo_ficha_DiplomasApp_1 = "2";
          $idTipo_ficha_DiplomasApp_2 = "8";
          $idTipo_tramite_unidad_URAA = "16";
          $idTipo_tramite_unidad_URAA_duplicados = "0";
          
        }

        // ----------------- Tipo: TÍTULOS - SE -----------------
        elseif($tipo==3){

          $header_tipo = "TITULADOS - SE";
          $idTipo_ficha_DiplomasApp_1 = "6";
          $idTipo_ficha_DiplomasApp_2 = "0";
          $idTipo_tramite_unidad_URAA = "34";
          $idTipo_tramite_unidad_URAA_duplicados = "0";
          
        }

        // ------------------------------------------------------------ CONDICIÓN -------------------------------------------------------------------
        // ----------------- Condición: REGULARES -----------------
        if($condicion==1){

          // Diplomas App
          $idDependencia_DiplomasApp = DIPLOMASAPP_Facultad::select('facultad.Cod_facultad')->where('facultad.Nom_facultad',$dependencia)->first();

          $query_GradosTitulos_DiplomasApp =  DIPLOMASAPP_Graduado::select(DB::raw('COUNT(graduado.idgraduado) AS nro_graduados'), 'escuela.Nom_escuela', 'escuela.Cod_escuela', 'diplomas.Des_diploma_h')
          ->join('alumno','alumno.Cod_alumno','graduado.cod_alumno')
          ->join('diplomas','graduado.Cod_diploma','diplomas.Cod_diploma')
          ->join('escuela','escuela.Cod_escuela','alumno.Cod_escuela')
          ->whereRaw('SUBSTRING(graduado.fec_expe_d, 1, 4) = '.$anio)
          ->where('escuela.Cod_facultad', $idDependencia_DiplomasApp->Cod_facultad)
          ->whereNotIn('graduado.grad_estado', [3,5])
          ->where(function($query) use ($idTipo_ficha_DiplomasApp_1, $idTipo_ficha_DiplomasApp_2)
          {
              $query->where('graduado.tipo_ficha',$idTipo_ficha_DiplomasApp_1)
              ->orWhere('graduado.tipo_ficha',$idTipo_ficha_DiplomasApp_2);
          })  
          ->groupBy('escuela.Nom_escuela','escuela.Cod_escuela','diplomas.Des_diploma_h')
          ->get();
        
          // URAA
          $idDependencia_URAA = URAA_Dependencia::select('dependencia.idDependencia')->where('dependencia.denominacion',$dependencia)->first();

          $dependencias_URAA_SE = URAA_Dependencia::where('dependencia.idDependencia2',$idDependencia_URAA->idDependencia)->where('dependencia.estado',1)->get();

          $query_GradosTitulos_URAA = URAA_Tramite::select(DB::raw('COUNT(tramite.idTramite) AS nro_graduados'), 'programa.nombre', 'programa.idDiplomas_App')
          ->join('tramite_detalle','tramite.idTramite_detalle','tramite_detalle.idTramite_detalle')
          ->join('tipo_tramite_unidad','tipo_tramite_unidad.idTipo_tramite_unidad','tramite.idTipo_tramite_unidad')
          ->join('dependencia','tramite.idDependencia','dependencia.idDependencia')
          ->join('programa','programa.idPrograma','tramite.idPrograma')
          ->join('cronograma_carpeta','cronograma_carpeta.idCronograma_carpeta','tramite_detalle.idCronograma_carpeta')
          ->whereRaw('SUBSTRING(cronograma_carpeta.fecha_colacion, 1, 4) = '.$anio)
          ->where('tipo_tramite_unidad.idTipo_tramite_unidad',$idTipo_tramite_unidad_URAA)
          ->where(function($query) use ($tipo, $idDependencia_URAA, $dependencias_URAA_SE)
          {
              if($tipo==1 || $tipo==2){
                $query->where('tramite.idDependencia',$idDependencia_URAA->idDependencia);
              }
              else{
                $query->whereIn('tramite.idDependencia',$dependencias_URAA_SE->pluck('idDependencia'));
              }
          })  
          ->where(function($query)
          {
              $query->where('tramite.idEstado_tramite',15)
              ->orWhere('tramite.idEstado_tramite',44);
          })
          ->groupBy('programa.nombre', 'programa.idDiplomas_App')
          ->get();

          //*********** VALIDACION URAA + DIPLOMAS APP *********

         //    return dd($query_GradosTitulos_DiplomasApp, $query_GradosTitulos_URAA);

          // *************** (BACHILLER & TITULO) **************
          if($tipo==1 || $tipo==2){

            $escuela_original = DIPLOMASAPP_Escuela::all();
    
            $idx_temp_URAA = -1;
            $idx_temp_DIPLOMASAPP = -1;
            
            foreach ($escuela_original as $key => $escuela_item) { 
              foreach ($query_GradosTitulos_DiplomasApp as $key_DiplomasApp => $item_DiplomasApp) { 
                if($escuela_item->Cod_escuela == $item_DiplomasApp->Cod_escuela){
                  $idx_temp_DIPLOMASAPP = $key_DiplomasApp;  
                }
              }
    
              foreach ($query_GradosTitulos_URAA as $key_URAA => $item_URAA) { 
                if($item_URAA->idDiplomas_App != null){
                  if($escuela_item->Cod_escuela == $item_URAA->idDiplomas_App){
                    $idx_temp_URAA = $key_URAA;
                  }
                }
                else{
                  if($escuela_item->Nom_escuela == $item_URAA->nombre){
                    $idx_temp_URAA= $key_URAA;  
                  }
                }
                
              }
               
                 // SUMAR ARRAY Consolidado 
              
              if($idx_temp_URAA != -1 && $idx_temp_DIPLOMASAPP != -1){
                $graduados_titulados->push(
                  ['nro_graduados_titulados' => (
                    $query_GradosTitulos_URAA[$idx_temp_URAA]->nro_graduados + 
                    $query_GradosTitulos_DiplomasApp[$idx_temp_DIPLOMASAPP]->nro_graduados),
                   'nombre_escuela' => ($escuela_item->Nom_escuela),
                  ]);       
              }
              elseif($idx_temp_URAA == -1 && $idx_temp_DIPLOMASAPP != -1){
                $graduados_titulados->push(
                  ['nro_graduados_titulados' => (
                    $query_GradosTitulos_DiplomasApp[$idx_temp_DIPLOMASAPP]->nro_graduados),
                   'nombre_escuela' => ($escuela_item->Nom_escuela),
                  ]);       
              }
              elseif($idx_temp_URAA != -1 && $idx_temp_DIPLOMASAPP == -1){
                $graduados_titulados->push(
                  ['nro_graduados_titulados' => (
                    $query_GradosTitulos_URAA[$idx_temp_URAA]->nro_graduados),
                   'nombre_escuela' => ($query_GradosTitulos_URAA[$idx_temp_URAA]->nombre),
                  ]);       
              }
      
              $idx_temp_URAA = -1;
              $idx_temp_DIPLOMASAPP = -1;

            } 
          }
        
          //**************** (TITULO SEGUNDA ESPECIALIDAD) **************
          else{
              
            $escuela_original = DIPLOMASAPP_Diploma::select(DB::raw('diplomas.Cod_diploma AS codigo, diplomas.Des_diploma_h'))->get();
    
            $idx_temp_URAA = -1;
            $idx_temp_DIPLOMASAPP = -1;
            //return dd($escuela_original);

            foreach ($escuela_original as $key => $escuela_item) { 
            //      return dd($escuela_item->codigo, $escuela_item->Des_diploma_h, $escuela_original[$key]->Des_diploma_h);
              
              foreach ($query_GradosTitulos_DiplomasApp as $key_DiplomasApp => $item_DiplomasApp) { 
                if($escuela_item->Des_diploma_h == $item_DiplomasApp->Des_diploma_h){
                  $idx_temp_DIPLOMASAPP = $key_DiplomasApp;  
                }
              }
    
              foreach ($query_GradosTitulos_URAA as $key_URAA => $item_URAA) { 
                if($item_URAA->idDiplomas_App == $escuela_item->codigo){
                  $idx_temp_URAA = $key_URAA;
                  
                }
              }
               
                 // SUMAR ARRAY Consolidado 
              if($idx_temp_URAA != -1 && $idx_temp_DIPLOMASAPP != -1){
                $graduados_titulados->push(
                  ['nro_graduados_titulados' => (
                    $query_GradosTitulos_URAA[$idx_temp_URAA]->nro_graduados + 
                    $query_GradosTitulos_DiplomasApp[$idx_temp_DIPLOMASAPP]->nro_graduados),
                   'nombre_escuela' => ($escuela_item->Des_diploma_h),
                  ]);       
              }
              elseif($idx_temp_URAA == -1 && $idx_temp_DIPLOMASAPP != -1){
                $graduados_titulados->push(
                  ['nro_graduados_titulados' => (
                    $query_GradosTitulos_DiplomasApp[$idx_temp_DIPLOMASAPP]->nro_graduados),
                   'nombre_escuela' => ($escuela_item->Des_diploma_h),
                  ]);       
              }
              elseif($idx_temp_URAA != -1 && $idx_temp_DIPLOMASAPP == -1){
                $graduados_titulados->push(
                  ['nro_graduados_titulados' => (
                    $query_GradosTitulos_URAA[$idx_temp_URAA]->nro_graduados),
                    'nombre_escuela' => ($query_GradosTitulos_URAA[$idx_temp_URAA]->nombre),
                  ]);       
              }
      
              $idx_temp_URAA = -1;
              $idx_temp_DIPLOMASAPP = -1;

            }
           

          } 

        }
        
        

        // ----------------- Condición: DUPLICADOS -----------------
        elseif($condicion==2){
          
          $header_tipo.= " - Duplicados";
          
          // Diplomas App
          $idDependencia_DiplomasApp = DIPLOMASAPP_Facultad::select('facultad.Cod_facultad')->where('facultad.Nom_facultad',$dependencia)->first();

          $query_GradosTitulos_DiplomasApp =  DIPLOMASAPP_Graduado_duplicado::select(DB::raw('COUNT(graduado_duplicado.idgraduado_duplicado) AS nro_graduados'), 'escuela.Nom_escuela', 'escuela.Cod_escuela', 'diplomas.Des_diploma_h')
          ->join('graduado','graduado.idgraduado','graduado_duplicado.grad_idgraduado')
          ->join('alumno','alumno.Cod_alumno','graduado.cod_alumno')
          ->join('escuela','escuela.Cod_escuela','alumno.Cod_escuela')
          ->whereRaw('SUBSTRING(graduado_duplicado.fec_emision, 1, 4) = '.$anio)
          ->where('escuela.Cod_facultad', $idDependencia_DiplomasApp->Cod_facultad)
          ->whereNotIn('graduado_duplicado.grad_estado', [3,5])
          ->where(function($query) use ($idTipo_ficha_DiplomasApp_1, $idTipo_ficha_DiplomasApp_2)
          {
              $query->where('graduado.tipo_ficha', $idTipo_ficha_DiplomasApp_1)
              ->orWhere('graduado.tipo_ficha', $idTipo_ficha_DiplomasApp_2);
          })  
          ->groupBy('escuela.Nom_escuela','escuela.Cod_escuela','diplomas.Des_diploma_h')
          ->get();
        
          // URAA
          $idDependencia_URAA = URAA_Dependencia::select('dependencia.idDependencia')->where('dependencia.denominacion',$dependencia)->first();

          $dependencias_URAA_SE = URAA_Dependencia::where('dependencia.idDependencia2',$idDependencia_URAA->idDependencia)->where('dependencia.estado',1)->get();

          $query_GradosTitulos_URAA = URAA_Tramite::select(DB::raw('COUNT(tramite.idTramite) AS nro_graduados'), 'programa.nombre', 'programa.idDiplomas_App')
          ->join('tramite_detalle','tramite.idTramite_detalle','tramite_detalle.idTramite_detalle')
          ->join('tipo_tramite_unidad','tipo_tramite_unidad.idTipo_tramite_unidad','tramite.idTipo_tramite_unidad')
          ->join('dependencia','tramite.idDependencia','dependencia.idDependencia')
          ->join('programa','programa.idPrograma','tramite.idPrograma')
          ->join('cronograma_carpeta','cronograma_carpeta.idCronograma_carpeta','tramite_detalle.idCronograma_carpeta')
          ->whereRaw('SUBSTRING(cronograma_carpeta.fecha_colacion, 1, 4) = '.$anio)
          ->where('tramite.idDependencia',$idDependencia_URAA->idDependencia)
          ->where('tipo_tramite_unidad.idTipo_tramite_unidad',$idTipo_tramite_unidad_URAA)
          ->where(function($query) use ($tipo, $idDependencia_URAA, $dependencias_URAA_SE)
          {
              if($tipo==1 || $tipo==2){
                $query->where('tramite.idDependencia',$idDependencia_URAA->idDependencia);
              }
              else{
                $query->whereIn('tramite.idDependencia',$dependencias_URAA_SE->pluck('idDependencia'));
              }
          })  
          ->where(function($query)
          {
              $query->where('tramite.idEstado_tramite',15)
              ->orWhere('tramite.idEstado_tramite',44);
          })
          ->groupBy('programa.nombre', 'programa.idDiplomas_App')
          ->get();

          //*********** VALIDACION URAA + DIPLOMAS APP *********

         // *************** (BACHILLER & TITULO) **************
         if($tipo==1 || $tipo==2){

          $escuela_original = DIPLOMASAPP_Escuela::all();
  
          $idx_temp_URAA = -1;
          $idx_temp_DIPLOMASAPP = -1;
          
          foreach ($escuela_original as $key => $escuela_item) { 
            foreach ($query_GradosTitulos_DiplomasApp as $key_DiplomasApp => $item_DiplomasApp) { 
              if($escuela_item->Cod_escuela == $item_DiplomasApp->Cod_escuela){
                $idx_temp_DIPLOMASAPP = $key_DiplomasApp;  
              }
            }
  
            foreach ($query_GradosTitulos_URAA as $key_URAA => $item_URAA) { 
              if($item_URAA->idDiplomas_App != null){
                if($escuela_item->Cod_escuela == $item_URAA->idDiplomas_App){
                  $idx_temp_URAA = $key_URAA;
                }
              }
              else{
                if($escuela_item->Nom_escuela == $item_URAA->nombre){
                  $idx_temp_URAA= $key_URAA;  
                }
              }
              
            }
             
               // SUMAR ARRAY Consolidado 
            
            if($idx_temp_URAA != -1 && $idx_temp_DIPLOMASAPP != -1){
              $graduados_titulados->push(
                ['nro_graduados_titulados' => (
                  $query_GradosTitulos_URAA[$idx_temp_URAA]->nro_graduados + 
                  $query_GradosTitulos_DiplomasApp[$idx_temp_DIPLOMASAPP]->nro_graduados),
                 'nombre_escuela' => ($escuela_item->Nom_escuela),
                ]);       
            }
            elseif($idx_temp_URAA == -1 && $idx_temp_DIPLOMASAPP != -1){
              $graduados_titulados->push(
                ['nro_graduados_titulados' => (
                  $query_GradosTitulos_DiplomasApp[$idx_temp_DIPLOMASAPP]->nro_graduados),
                 'nombre_escuela' => ($escuela_item->Nom_escuela),
                ]);       
            }
            elseif($idx_temp_URAA != -1 && $idx_temp_DIPLOMASAPP == -1){
              $graduados_titulados->push(
                ['nro_graduados_titulados' => (
                  $query_GradosTitulos_URAA[$idx_temp_URAA]->nro_graduados),
                 'nombre_escuela' => ($query_GradosTitulos_URAA[$idx_temp_URAA]->nombre),
                ]);       
            }
    
            $idx_temp_URAA = -1;
            $idx_temp_DIPLOMASAPP = -1;

          } 

          }
      
        //**************** (TITULO SEGUNDA ESPECIALIDAD) **************
        else{
            
          $escuela_original = DIPLOMASAPP_Diploma::select(DB::raw('diplomas.Cod_diploma AS codigo, diplomas.Des_diploma_h'))->get();
  
          $idx_temp_URAA = -1;
          $idx_temp_DIPLOMASAPP = -1;
          //return dd($escuela_original);

          foreach ($escuela_original as $key => $escuela_item) { 
          //      return dd($escuela_item->codigo, $escuela_item->Des_diploma_h, $escuela_original[$key]->Des_diploma_h);
            
            foreach ($query_GradosTitulos_DiplomasApp as $key_DiplomasApp => $item_DiplomasApp) { 
              if($escuela_item->Des_diploma_h == $item_DiplomasApp->Des_diploma_h){
                $idx_temp_DIPLOMASAPP = $key_DiplomasApp;  
              }
            }
  
            foreach ($query_GradosTitulos_URAA as $key_URAA => $item_URAA) { 
              if($item_URAA->idDiplomas_App == $escuela_item->codigo){
                $idx_temp_URAA = $key_URAA;
                
              }
            }
             
               // SUMAR ARRAY Consolidado 
            if($idx_temp_URAA != -1 && $idx_temp_DIPLOMASAPP != -1){
              $graduados_titulados->push(
                ['nro_graduados_titulados' => (
                  $query_GradosTitulos_URAA[$idx_temp_URAA]->nro_graduados + 
                  $query_GradosTitulos_DiplomasApp[$idx_temp_DIPLOMASAPP]->nro_graduados),
                 'nombre_escuela' => ($escuela_item->Des_diploma_h),
                ]);       
            }
            elseif($idx_temp_URAA == -1 && $idx_temp_DIPLOMASAPP != -1){
              $graduados_titulados->push(
                ['nro_graduados_titulados' => (
                  $query_GradosTitulos_DiplomasApp[$idx_temp_DIPLOMASAPP]->nro_graduados),
                 'nombre_escuela' => ($escuela_item->Des_diploma_h),
                ]);       
            }
            elseif($idx_temp_URAA != -1 && $idx_temp_DIPLOMASAPP == -1){
              $graduados_titulados->push(
                ['nro_graduados_titulados' => (
                  $query_GradosTitulos_URAA[$idx_temp_URAA]->nro_graduados),
                  'nombre_escuela' => ($query_GradosTitulos_URAA[$idx_temp_URAA]->nombre),
                ]);       
            }
    
            $idx_temp_URAA = -1;
            $idx_temp_DIPLOMASAPP = -1;

          }
         

        } 
        
        }

           //return dd($graduados_titulados);
        return response()->json(['graduados_titulados' => $graduados_titulados, 'header_tipo' => $header_tipo]);
        DB::commit();
        
      }catch(Exception $e){
        return response()->json(['graduados_titulados' => $e->getMessage()]);
        DB::rollback();
      }
     
    }

    // Grados y Titulos - Consolidado
    public function getNroGraduadosTituladosConsolidado($condicion, $anio)
    {
      DB::beginTransaction();
      try{

        $header_condicion = "";

        // ----------------- REGULARES - Consolidado -----------------
        if($condicion==1){

          $graduados_titulados_consolidado = collect();

          $header_condicion = "GRADUADOS";
          
          // Diplomas App
          $query_GradosTitulosConsolidado_DiplomasApp =  DIPLOMASAPP_TipoFicha::select(DB::raw('COUNT(tipoficha.Tip_ficha) AS nro_graduados'), 'tipoficha.Nom_ficha')
          ->join('graduado','graduado.tipo_ficha','tipoficha.Tip_ficha')
          ->whereRaw('SUBSTRING(graduado.fec_expe_d, 1, 4) = '.$anio)
          ->whereNotIn('graduado.grad_estado', [3,5])
          ->groupBy('tipoficha.Nom_ficha')
          ->get();
        
          // URAA
          $query_GradosTitulosConsolidado_URAA = URAA_Tipo_tramite_unidad::select(DB::raw('COUNT(tipo_tramite_unidad.idTipo_tramite_unidad) AS nro_graduados, 
          CASE WHEN tipo_tramite_unidad.descripcion = "GRADO DE BACHILLER" THEN "BACHILLER"
               WHEN tipo_tramite_unidad.descripcion = "TÍTULO PROFESIONAL" THEN "TITULO"
               WHEN tipo_tramite_unidad.descripcion = "TÍTULO EN SEGUNDA ESPECIALIDAD  PROFESIONAL" THEN "SEGUNDA ESPECIALIDAD" 
          END AS nombre_ficha'))
          ->join('tramite','tramite.idTipo_tramite_unidad','tipo_tramite_unidad.idTipo_tramite_unidad')
          ->join('tramite_detalle','tramite.idTramite_detalle','tramite_detalle.idTramite_detalle')
          ->join('cronograma_carpeta','cronograma_carpeta.idCronograma_carpeta','tramite_detalle.idCronograma_carpeta')
          ->whereRaw('SUBSTRING(cronograma_carpeta.fecha_colacion, 1, 4) = '.$anio)
          ->whereIn('tipo_tramite_unidad.idTipo_tramite_unidad', [15,16,34])

          ->where(function($query)
          {
              $query->where('tramite.idEstado_tramite',15)
              ->orWhere('tramite.idEstado_tramite',44);
          })
          ->groupBy('tipo_tramite_unidad.descripcion')
          ->get();

         // dd($query_GradosTitulosConsolidado_URAA);
         // dd($query_GradosTitulosConsolidado_DiplomasApp);

          //*********************** VALIDACION URAA + DIPLOMAS APP *************************
          $tipo_ficha_original = DIPLOMASAPP_TipoFicha::all();

          $idx_temp_URAA = -1;
          $idx_temp_DIPLOMASAPP = -1;
         

          foreach ($tipo_ficha_original as $key => $tipo_ficha_item) { 

            foreach ($query_GradosTitulosConsolidado_DiplomasApp as $key_DiplomasApp => $item_DiplomasApp) { 
              if($tipo_ficha_item->Nom_ficha == $item_DiplomasApp->Nom_ficha){

                $idx_temp_DIPLOMASAPP = $key_DiplomasApp;
                
              }
            }

            foreach ($query_GradosTitulosConsolidado_URAA as $key_URAA => $item_URAA) { 
              if($tipo_ficha_item->Nom_ficha == $item_URAA->nombre_ficha){

                $idx_temp_URAA = $key_URAA;
                
              }
            }
             
            // SUMAR ARRAY Consolidado 
            if($idx_temp_URAA != -1 && $idx_temp_DIPLOMASAPP != -1){
              $graduados_titulados_consolidado->push(
                ['nro_graduados_titulados_consolidado' => (
                  $query_GradosTitulosConsolidado_URAA[$idx_temp_URAA]->nro_graduados + 
                  $query_GradosTitulosConsolidado_DiplomasApp[$idx_temp_DIPLOMASAPP]->nro_graduados),
                 'nombre_ficha' => ($tipo_ficha_item->Nom_ficha),
                ]);       
            }
            elseif($idx_temp_URAA == -1 && $idx_temp_DIPLOMASAPP != -1){
              $graduados_titulados_consolidado->push(
                ['nro_graduados_titulados_consolidado' => (
                  $query_GradosTitulosConsolidado_DiplomasApp[$idx_temp_DIPLOMASAPP]->nro_graduados),
                 'nombre_ficha' => ($tipo_ficha_item->Nom_ficha),
                ]);       
            }
            elseif($idx_temp_URAA != -1 && $idx_temp_DIPLOMASAPP == -1){
              $graduados_titulados_consolidado->push(
                ['nro_graduados_titulados_consolidado' => (
                  $query_GradosTitulosConsolidado_URAA[$idx_temp_URAA]->nro_graduados),
                 'nombre_ficha' => ($tipo_ficha_item->Nom_ficha),
                ]);       
            }
            $idx_temp_URAA = -1;
            $idx_temp_DIPLOMASAPP = -1;

            
          }
        }

          
         // ----------------- DUPLICADOS - Consolidado -----------------
         if($condicion==2){

          $graduados_titulados_consolidado = collect();

          $header_condicion = "GRADUADOS";
          
          // Diplomas App
          $query_GradosTitulosConsolidado_DiplomasApp =  DIPLOMASAPP_TipoFicha::select(DB::raw('COUNT(tipoficha.Tip_ficha) AS nro_graduados'), 'tipoficha.Nom_ficha')
          ->join('graduado','graduado.tipo_ficha','tipoficha.Tip_ficha')
          ->join('graduado_duplicado','graduado_duplicado.grad_idgraduado','graduado.idgraduado')
          ->whereRaw('SUBSTRING(graduado_duplicado.fec_emision, 1, 4) = '.$anio)
          ->whereNotIn('graduado_duplicado.grad_estado', [3,5])
          ->groupBy('tipoficha.Nom_ficha')
          ->get();
        
          // URAA
          $query_GradosTitulosConsolidado_URAA = URAA_Tipo_tramite_unidad::select(DB::raw('COUNT(tipo_tramite_unidad.idTipo_tramite_unidad) AS nro_graduados, 
          CASE WHEN tipo_tramite_unidad.descripcion = "GRADO DE BACHILLER" THEN "BACHILLER"
               WHEN tipo_tramite_unidad.descripcion = "TÍTULO PROFESIONAL" THEN "TITULO"
               WHEN tipo_tramite_unidad.descripcion = "TÍTULO EN SEGUNDA ESPECIALIDAD  PROFESIONAL" THEN "SEGUNDA ESPECIALIDAD" 
          END AS nombre_ficha'))
          ->join('tramite','tramite.idTipo_tramite_unidad','tipo_tramite_unidad.idTipo_tramite_unidad')
          ->join('tramite_detalle','tramite.idTramite_detalle','tramite_detalle.idTramite_detalle')
          ->join('cronograma_carpeta','cronograma_carpeta.idCronograma_carpeta','tramite_detalle.idCronograma_carpeta')
          ->whereRaw('SUBSTRING(cronograma_carpeta.fecha_colacion, 1, 4) = '.$anio)
          ->whereIn('tipo_tramite_unidad.idTipo_tramite_unidad', [0])

          ->where(function($query)
          {
              $query->where('tramite.idEstado_tramite',15)
              ->orWhere('tramite.idEstado_tramite',44);
          })
          ->groupBy('tipo_tramite_unidad.descripcion')
          ->get();


          //*********************** VALIDACION URAA + DIPLOMAS APP *************************
          $tipo_ficha_original = DIPLOMASAPP_TipoFicha::all();

          $idx_temp_URAA = -1;
          $idx_temp_DIPLOMASAPP = -1;
         

          foreach ($tipo_ficha_original as $key => $tipo_ficha_item) { 

            foreach ($query_GradosTitulosConsolidado_DiplomasApp as $key_DiplomasApp => $item_DiplomasApp) { 
              if($tipo_ficha_item->Nom_ficha == $item_DiplomasApp->Nom_ficha){

                $idx_temp_DIPLOMASAPP = $key_DiplomasApp;
                
              }
            }

            foreach ($query_GradosTitulosConsolidado_URAA as $key_URAA => $item_URAA) { 
              if($tipo_ficha_item->Nom_ficha == $item_URAA->nombre_ficha){

                $idx_temp_URAA = $key_URAA;
                
              }
            }
             
            // SUMAR ARRAY Consolidado 
            if($idx_temp_URAA != -1 && $idx_temp_DIPLOMASAPP != -1){
              $graduados_titulados_consolidado->push(
                ['nro_graduados_titulados_consolidado' => (
                  $query_GradosTitulosConsolidado_URAA[$idx_temp_URAA]->nro_graduados + 
                  $query_GradosTitulosConsolidado_DiplomasApp[$idx_temp_DIPLOMASAPP]->nro_graduados),
                 'nombre_ficha' => ($tipo_ficha_item->Nom_ficha),
                ]);       
            }
            elseif($idx_temp_URAA == -1 && $idx_temp_DIPLOMASAPP != -1){
              $graduados_titulados_consolidado->push(
                ['nro_graduados_titulados_consolidado' => (
                  $query_GradosTitulosConsolidado_DiplomasApp[$idx_temp_DIPLOMASAPP]->nro_graduados),
                 'nombre_ficha' => ($tipo_ficha_item->Nom_ficha),
                ]);       
            }
            elseif($idx_temp_URAA != -1 && $idx_temp_DIPLOMASAPP == -1){
              $graduados_titulados_consolidado->push(
                ['nro_graduados_titulados_consolidado' => (
                  $query_GradosTitulosConsolidado_URAA[$idx_temp_URAA]->nro_graduados),
                 'nombre_ficha' => ($tipo_ficha_item->Nom_ficha),
                ]);       
            }
            $idx_temp_URAA = -1;
            $idx_temp_DIPLOMASAPP = -1;

            
          }



        }
     

        return response()->json(['graduados_titulados_consolidado' => $graduados_titulados_consolidado, 'header_condicion' => $header_condicion]);
        DB::commit();
        
      }catch(Exception $e){
        return response()->json(['graduados_titulados_consolidado' => $e->getMessage()]);
        DB::rollback();
      }
    }


    // Egresados
    public function getNroEgresadosByFacultad($sede, $semestre, $dependencia)
    {
      DB::beginTransaction();
      try{

        $egresados = collect();
        
        $sede_query = Sede::where('idSede',$sede)->where('estado',1)->first();
        $facultad_query = Facultad::where('idFacultad',$dependencia)->where('estado',1)->first();
        $semestre_query = Periodo::where('idPeriodo',$semestre)->where('estado',1)->first();


        // -------------- SGA -------------
        // $subq_SGA = SGA_Matricula::select('sga_matricula.pfl_id')
        //                           ->groupBy('sga_matricula.pfl_id')
        //                           ->having(DB::raw('MAX(sga_matricula.ani_id)'), '>=', $semestre_query->idSGA_PREG)
        //                           ->having(DB::raw('MAX(sga_matricula.ani_id)'), '<=', $semestre_SGA_maximo);

        $subq_SGA = SGA_Matricula::select('sga_matricula.pfl_id', DB::raw('MAX(sga_matricula.mat_id)'))->groupBy('sga_matricula.pfl_id');
        
        $query_Egresados_SGA =  SGA_Perfil::select('escuela.dep_id','escuela.dep_nombre',
        DB::raw('COUNT(DISTINCT CASE WHEN persona.per_sexo = "F" THEN perfil.pfl_id END) AS femenino'),
        DB::raw('COUNT(DISTINCT CASE WHEN persona.per_sexo = "M" THEN perfil.pfl_id END) AS masculino'),
        DB::raw('COUNT(DISTINCT perfil.pfl_id) AS nro_egresados'))
        ->joinSub($subq_SGA, 'subq_SGA', 
              function($join){
                $join->on('subq_SGA.pfl_id', '=', 'perfil.pfl_id');
              })
        ->join('sga_matricula','sga_matricula.pfl_id','perfil.pfl_id')
        ->join('persona','persona.per_id','perfil.per_id')
        ->join('dependencia AS escuela','escuela.dep_id','perfil.dep_id')
        ->join('sga_orden_pago AS op','sga_matricula.mat_id','op.mat_id')
        ->join('sga_datos_alumno','sga_datos_alumno.pfl_id','perfil.pfl_id')
        ->where('sga_matricula.ani_id',$semestre_query->idSGA_PREG)
        ->where('perfil.sed_id',$sede_query->idSGA_PREG)
        ->where('escuela.sdep_id',$facultad_query->idSGA_PREG)
        ->where('sga_datos_alumno.con_id',6)
        ->where('sga_matricula.mat_estado',1)
        ->where('op.ord_pagado',1)
        ->groupBy('escuela.dep_id', 'escuela.dep_nombre')
        ->get();
      
        
        // -------------- SUV -------------
        // $subq_SUV = SUV_Matricula::select('matricula.idalumno')->groupBy('matricula.idalumno')->having(DB::raw('MAX(matricula.mat_periodo)'), '=', $semestre_query->idSUV_PREG);

        $subq_SUV = SUV_Matricula::select('matricula.idalumno', DB::raw('MAX(matricula.idmatricula)'))->groupBy('matricula.idalumno');

        $query_Egresados_SUV=  SUV_Matricula::select(
          'patrimonio.estructura.idestructura',
          'patrimonio.estructura.estr_descripcion', 
          'matriculas.curricula.curr_mencion',
        DB::raw('COUNT(DISTINCT matriculas.alumno.idalumno) AS nro_egresados'),
        DB::raw("COUNT(DISTINCT CASE WHEN sistema.persona.per_sexo = '0' THEN matriculas.alumno.idalumno END) AS femenino"),
        DB::raw("COUNT(DISTINCT CASE WHEN sistema.persona.per_sexo = '1' THEN matriculas.alumno.idalumno END) AS masculino"))
        ->joinSub($subq_SUV, 'subq_SUV', 
              function($join){
                 $join->on('subq_SUV.idalumno', '=', 'matricula.idalumno');
              })
        ->join('matriculas.alumno','matriculas.alumno.idalumno','matricula.idalumno')
        ->join('matriculas.curricula','matriculas.alumno.alu_curricula','matriculas.curricula.idcurricula')
        ->join('sistema.persona','sistema.persona.idpersona','matriculas.alumno.idpersona')
        ->join('patrimonio.area','patrimonio.area.idarea','matriculas.alumno.idarea')
        ->join('patrimonio.estructura','patrimonio.estructura.idestructura','patrimonio.area.idestructura')
        ->join('matriculas.orden_pago','matriculas.orden_pago.idmatricula','matricula.idmatricula')
        ->where('matricula.mat_periodo',$semestre_query->idSUV_PREG)
        ->where('matriculas.alumno.idsede',$sede_query->idSUV_PREG)
        ->where('patrimonio.estructura.iddependencia',$facultad_query->idSUV_PREG)
        ->where('matriculas.alumno.alu_estado',6)
        ->where('matriculas.orden_pago.ord_estado',"PAGADA")
        ->where('matricula.mat_estado',1)
        ->groupBy('patrimonio.estructura.idestructura', 'matriculas.curricula.curr_mencion')
        ->get();


        //return  dd($query_Egresados_SGA, $query_Egresados_SUV);

         //*********************** VALIDACION URAA + DIPLOMAS APP *************************
         
        $escuela_original = Escuela::where('estado',1)->get();

        $idx_temp_SGA = -1;
        $idx_temp_SUV = -1;
        
        foreach ($escuela_original as $key => $escuela_item) { 
          foreach ($query_Egresados_SGA as $key => $item_SGA) { 
            if($escuela_item->idSGA_PREG == $item_SGA->dep_id){
              $idx_temp_SGA = $key;  
            }
          }

          foreach ($query_Egresados_SUV as $key => $item_SUV) { 
            if($item_SUV->idestructura != 0){
              if($escuela_item->idSUV_PREG == $item_SUV->idestructura){
                $idx_temp_SUV= $key;  
              }
            }
            else{
              if($escuela_item->idMencionSUV_PREG == $item_SUV->curr_mencion){
                $idx_temp_SUV= $key;  
              }
            }
          }
          // SUMAR ARRAY Consolidado 
          if($idx_temp_SGA != -1 && $idx_temp_SUV != -1){
            $egresados->push(
              ['nro_egresados' => (
                $query_Egresados_SGA[$idx_temp_SGA]->nro_egresados + 
                $query_Egresados_SUV[$idx_temp_SUV]->nro_egresados),
                'femenino' => (
                  $query_Egresados_SGA[$idx_temp_SGA]->femenino + 
                  $query_Egresados_SUV[$idx_temp_SUV]->femenino),
                'masculino' => (
                  $query_Egresados_SGA[$idx_temp_SGA]->masculino + 
                  $query_Egresados_SUV[$idx_temp_SUV]->masculino),
               'dep_nombre' => ($escuela_item->nombre),
              ]);       
          }
          elseif($idx_temp_SGA == -1 && $idx_temp_SUV != -1){
            $egresados->push(
              ['nro_egresados' => (
                $query_Egresados_SUV[$idx_temp_SUV]->nro_egresados),
                'femenino' => ($query_Egresados_SUV[$idx_temp_SUV]->femenino),
                'masculino' => ($query_Egresados_SUV[$idx_temp_SUV]->masculino),
               'dep_nombre' => ($escuela_item->nombre),
              ]);       
          }
          elseif($idx_temp_SGA != -1 && $idx_temp_SUV == -1){
            $egresados->push(
              ['nro_egresados' => (
                $query_Egresados_SGA[$idx_temp_SGA]->nro_egresados),
                'femenino' => ($query_Egresados_SGA[$idx_temp_SGA]->femenino),
                'masculino' => ($query_Egresados_SGA[$idx_temp_SGA]->masculino),
               'dep_nombre' => ($escuela_item->nombre),
              ]);       
          }
          
          $idx_temp_SGA = -1;
          $idx_temp_SUV = -1;

           
        }

        return response()->json(['egresados' => $egresados]);
        DB::commit();
        
      }catch(Exception $e){
        return response()->json(['egresados' => $e->getMessage()]);
        DB::rollback();
      }
    }


    // Egresados - Consolidado
    public function getNroEgresadosConsolidado($semestre)
    {
      DB::beginTransaction();
      try{
        
        $egresados_Consolidado = collect();
        $semestre_query = Periodo::where('idPeriodo',$semestre)->where('estado',1)->first();

        // -------------- SGA -------------
        $subq_SGA = SGA_Matricula::select('sga_matricula.pfl_id', DB::raw('MAX(sga_matricula.mat_id)'))->groupBy('sga_matricula.pfl_id');

        $query_Egresados_SGA =  SGA_Perfil::select('facultad.dep_id','facultad.dep_nombre',
            DB::raw('COUNT(DISTINCT CASE WHEN persona.per_sexo = "F" THEN perfil.pfl_id END) AS femenino'),
            DB::raw('COUNT(DISTINCT CASE WHEN persona.per_sexo = "M" THEN perfil.pfl_id END) AS masculino'),
            DB::raw('COUNT(DISTINCT perfil.pfl_id) AS nro_egresados'))
            ->joinSub($subq_SGA, 'subq_SGA', 
              function($join){
                $join->on('subq_SGA.pfl_id', '=', 'perfil.pfl_id');
              })
            ->join('sga_matricula','sga_matricula.pfl_id','perfil.pfl_id')
            ->join('persona','persona.per_id','perfil.per_id')
            ->join('dependencia AS escuela','escuela.dep_id','perfil.dep_id')
            ->join('dependencia AS facultad','facultad.dep_id','escuela.sdep_id')
            ->join('sga_orden_pago AS op','sga_matricula.mat_id','op.mat_id')
            ->join('sga_datos_alumno','sga_datos_alumno.pfl_id','perfil.pfl_id')
            ->where('sga_matricula.ani_id',$semestre_query->idSGA_PREG)
            ->where('facultad.tde_id', '2')
            ->where('sga_datos_alumno.con_id',6)
            ->where('sga_matricula.mat_estado',1)
            ->where('op.ord_pagado',1)
            ->groupBy('facultad.dep_id', 'facultad.dep_nombre')
            ->get();
        

        // -------------- SUV -------------
        $subq_SUV = SUV_Matricula::select('matricula.idalumno', DB::raw('MAX(matricula.idmatricula)'))->groupBy('matricula.idalumno');

        $query_Egresados_SUV=  SUV_Matricula::select(
          'facultad.idestructura',
          'facultad.estr_descripcion', 
            DB::raw('COUNT(DISTINCT matriculas.alumno.idalumno) AS nro_egresados'),
            DB::raw("COUNT(DISTINCT CASE WHEN sistema.persona.per_sexo = '0' THEN matriculas.alumno.idalumno END) AS femenino"),
            DB::raw("COUNT(DISTINCT CASE WHEN sistema.persona.per_sexo = '1' THEN matriculas.alumno.idalumno END) AS masculino"))
            ->joinSub($subq_SUV, 'subq_SUV', 
              function($join){
                 $join->on('subq_SUV.idalumno', '=', 'matricula.idalumno');
              })
            ->join('matriculas.alumno','matriculas.alumno.idalumno','matricula.idalumno')
            ->join('sistema.persona','sistema.persona.idpersona','matriculas.alumno.idpersona')
            ->join('patrimonio.area','patrimonio.area.idarea','matriculas.alumno.idarea')
            ->join('patrimonio.estructura AS escuela','escuela.idestructura','patrimonio.area.idestructura')
            ->join('patrimonio.estructura AS facultad','facultad.idestructura','escuela.iddependencia')
            ->join('matriculas.orden_pago','matriculas.orden_pago.idmatricula','matricula.idmatricula')
            ->where('matricula.mat_periodo',$semestre_query->idSUV_PREG)
            ->where('facultad.estr_descripcion','like','FACULTAD%')
            ->where('matriculas.orden_pago.ord_estado',"PAGADA")
            ->where('matricula.mat_estado',1)
            ->where('matriculas.alumno.alu_estado',6)
            ->groupBy('facultad.idestructura', 'facultad.estr_descripcion')
            ->get();

          // ACUMULADOS
          $acumulado_egresados_SGA = 0;
          $acumulado_egresados_SUV = 0;
          foreach ($query_Egresados_SGA as $key => $item_1){
              $acumulado_egresados_SGA += $item_1->nro_egresados;
            }
            
          foreach ($query_Egresados_SUV as $key => $item_2){
              $acumulado_egresados_SUV += $item_2->nro_egresados;
            }
          //
          //dd($acumulado_egresados_SGA, $acumulado_egresados_SUV);

         
         //************** VALIDACION URAA + DIPLOMAS APP ***************
         
        $facultad_original = Facultad::where('estado',1)->get();

        $idx_temp_SGA = -1;
        $idx_temp_SUV = -1;
        
        foreach ($facultad_original as $key => $facultad_item) { 
          foreach ($query_Egresados_SGA as $key => $item_SGA) { 
            if($facultad_item->idSGA_PREG == $item_SGA->dep_id){
              $idx_temp_SGA = $key;  
            }
          }

          foreach ($query_Egresados_SUV as $key => $item_SUV) { 
            if($facultad_item->idSUV_PREG == $item_SUV->idestructura){
              $idx_temp_SUV= $key;  
            }
          }

          // SUMAR ARRAY Consolidado 
          if($idx_temp_SGA != -1 && $idx_temp_SUV != -1){
            $egresados_Consolidado->push(
              ['nro_egresados_consolidado' => (
                $query_Egresados_SGA[$idx_temp_SGA]->nro_egresados + 
                $query_Egresados_SUV[$idx_temp_SUV]->nro_egresados),
                'femenino' => (
                  $query_Egresados_SGA[$idx_temp_SGA]->femenino + 
                  $query_Egresados_SUV[$idx_temp_SUV]->femenino),
                'masculino' => (
                  $query_Egresados_SGA[$idx_temp_SGA]->masculino + 
                  $query_Egresados_SUV[$idx_temp_SUV]->masculino),
               'dep_nombre' => ($facultad_item->nombre),
              ]);       
          }
          elseif($idx_temp_SGA == -1 && $idx_temp_SUV != -1){
            $egresados_Consolidado->push(
              ['nro_egresados_consolidado' => (
                $query_Egresados_SUV[$idx_temp_SUV]->nro_egresados),
                'femenino' => ($query_Egresados_SUV[$idx_temp_SUV]->femenino),
                'masculino' => ($query_Egresados_SUV[$idx_temp_SUV]->masculino),
               'dep_nombre' => ($facultad_item->nombre),
              ]);       
          }
          elseif($idx_temp_SGA != -1 && $idx_temp_SUV == -1){
            $egresados_Consolidado->push(
              ['nro_egresados_consolidado' => (
                $query_Egresados_SGA[$idx_temp_SGA]->nro_egresados),
                'femenino' => ($query_Egresados_SGA[$idx_temp_SGA]->femenino),
                'masculino' => ($query_Egresados_SGA[$idx_temp_SGA]->masculino),
               'dep_nombre' => ($facultad_item->nombre),
              ]);       
          }
          
          $idx_temp_SGA = -1;
          $idx_temp_SUV = -1;

        }

        return response()->json(['egresadosConsolidado' => $egresados_Consolidado]);
        DB::commit();
        
      }catch(Exception $e){
        return response()->json(['egresadosConsolidado' => $e->getMessage()]);
        DB::rollback();
      }
     
    }

    // AlumnoEgresado - Consulta
    public function getAlumnoEgresado_Consulta($unidad, $tipo_busqueda, $input_alumno_egresado)
    {
      DB::beginTransaction();
      try{
        
        $alumnos = collect();
        
        if($unidad == 1){
          $alumnos_SGA=SGA_Persona::select('per_nombres','per_apellidos','per_login', 'per_dni','dependencia.dep_id','dependencia.dep_nombre','dependencia.sdep_id', 'perfil.pfl_cond', 'sga_datos_alumno.con_id')
                ->join('perfil','persona.per_id','perfil.per_id')
                ->join('sga_datos_alumno','sga_datos_alumno.pfl_id','perfil.pfl_id')
                ->join('sga_sede','sga_sede.sed_id','perfil.sed_id')
                ->join('dependencia','dependencia.dep_id','perfil.dep_id')
                ->where(function($query) use ($tipo_busqueda, $input_alumno_egresado)
                {
                    if ($tipo_busqueda==1) {
                      $query->where('per_login','LIKE', '%'.$input_alumno_egresado);
                    }
                    if ($tipo_busqueda==2) {
                      $query->where('per_dni','=', $input_alumno_egresado);
                    }
                    if ($tipo_busqueda==3) {
                      $query->where('per_apellidos','LIKE', '%'.$input_alumno_egresado.'%');
                    }
                    if ($tipo_busqueda==4) {
                      $query->where('per_nombres','LIKE', '%'.$input_alumno_egresado.'%');
                    }
                })
                ->orderBy('per_apellidos','asc')
                ->get();


          $alumnos_SUV=SUV_Persona::select('persona.per_dni','persona.per_apepaterno','persona.per_apematerno', 'persona.per_nombres', 'matriculas.alumno.idalumno','patrimonio.sede.sed_descripcion','patrimonio.estructura.idestructura','patrimonio.estructura.estr_descripcion','patrimonio.estructura.iddependencia', 'curricula.curr_mencion', 'matriculas.alumno.alu_estado')    
                ->join('matriculas.alumno','matriculas.alumno.idpersona','persona.idpersona')
                ->join('matriculas.curricula','matriculas.alumno.alu_curricula','matriculas.curricula.idcurricula')
                ->join('patrimonio.area','matriculas.alumno.idarea','patrimonio.area.idarea')
                ->join('patrimonio.estructura','patrimonio.area.idestructura','patrimonio.estructura.idestructura')
                ->join('patrimonio.sede','matriculas.alumno.idsede','patrimonio.sede.idsede')
                ->where(function($query) use ($tipo_busqueda, $input_alumno_egresado)
                {
                  if ($tipo_busqueda==1) {
                    $query->where('matriculas.alumno.idalumno','LIKE', '%'.$input_alumno_egresado);
                  }
                  if ($tipo_busqueda==2) {
                    $query->where('persona.per_dni','=', $input_alumno_egresado);
                  }
                  if ($tipo_busqueda==3) {
                    $query->whereRaw("CONCAT('persona.per_apepaterno', ' ', 'persona.per_apematerno') LIKE ?", ['%'.$input_alumno_egresado.'%']);
                  }
                  if ($tipo_busqueda==4) {
                    $query->where('per_nombres','LIKE', '%'.$input_alumno_egresado.'%');
                  }
                })
                ->orderBy('persona.per_apepaterno','asc')
                ->get();

                // llenado array alumnos SGA
                foreach ($alumnos_SGA as $key => $alumnoSGA){

                  $alumnos->push(
                    ['codigo' => ($alumnoSGA->per_login),
                    'dni' => ($alumnoSGA->per_dni),
                    'escuela' => ($alumnoSGA->dep_nombre),
                    'nombreCompleto' => ($alumnoSGA->per_apellidos.' - '.$alumnoSGA->per_nombres),
                    'condicion' => ($alumnoSGA->con_id == 6 ? "EGRESADO" : "ALUMNO"),
                    
                    ]); 
        
                }

                // llenado array alumnos SUV
                foreach ($alumnos_SUV as $key => $alumnoSUV){
      
                  $alumnos->push(
                    ['codigo' => ($alumnoSUV->idalumno),
                    'dni' => ($alumnoSUV->per_dni),
                    'escuela' => ($alumnoSUV->estr_descripcion),
                    'nombreCompleto' => ($alumnoSUV->per_apepaterno.' '.$alumnoSUV->per_apematerno.' - '.$alumnoSUV->per_nombres),
                    'condicion' => ($alumnoSUV->alu_estado == 6 ? "EGRESADO" : "ALUMNO"),
                    
                    ]); 
        
                }
                       

        }
        elseif($unidad == 3){
          $alumnos_SE = SE_Alumno::select('nombre','paterno','materno', 'nro_documento','codigo','descripcion','segunda_especialidad.nombre')
                ->join('mencion','alumno.idMencion','mencion.idMencion')
                ->join('segunda_especialidad','segunda_especialidad.idSegunda_Especialidad','mencion.idSegunda_Especialidad')

                ->where(function($query) use ($tipo_busqueda, $input_alumno_egresado)
                {
                    if ($tipo_busqueda==1) {
                      $query->where('codigo','LIKE', '%'.$input_alumno_egresado);
                    }
                    if ($tipo_busqueda==2) {
                      $query->where('nro_documento','=', $input_alumno_egresado);
                    }
                    if ($tipo_busqueda==3) {
                      $query->whereRaw("CONCAT('paterno', ' ', 'materno') LIKE ?", ['%'.$input_alumno_egresado.'%']);
                    }
                    if ($tipo_busqueda==4) {
                      $query->where('nombre','LIKE', '%'.$input_alumno_egresado.'%');
                    }
                })
                ->orderBy('paterno','asc')
                ->get();

                foreach ($alumnos_SE as $key => $alumno_SE){

                  $alumnos->push(
                    ['codigo' => ($alumno_SE->codigo),
                    'dni' => ($alumno_SE->nro_documento),
                    'escuela' => ($alumno_SE->nombre),
                    'nombreCompleto' => ($alumno_SE->paterno.' '.$alumno_SE->materno.' - '.$alumno_SE->nombre),
                    'condicion' => ($alumno_SE->descripcion),
                    
                    ]); 
        
                }
        }

    
  
        return response()->json(['alumnos' => $alumnos]);
        DB::commit();
        
      }catch(Exception $e){
       
        return response()->json(['alumnos' => $e->getMessage()]);
        DB::rollback();
      }
     
    }

    // PrimerosPuestos - Consulta
    public function getPrimerosPuestos_Consulta($sede, $semestre, $escuela, $ciclo)
    {
      DB::beginTransaction();
      try{
        
        $primeros_puestos = collect();

        $query_val_escuela = Escuela::where('estado',1)->where('idEscuela',$escuela)->first();
        $val_escuela = $query_val_escuela->nombre;

        $query_val_semestre = Periodo::where('estado',1)->where('idPeriodo',$semestre)->first();
        $val_semestre = $query_val_semestre->denominacion;


        $query_primeros_puestos=Alumno_Ponderado::where('estado', 1)
              ->where('idPeriodo', $semestre)
              ->where('idEscuela', $escuela)
              ->where('ap_ciclo', $ciclo)
              ->where(function($query) use ($sede)
              {
                if ($sede != 99) {
                  $query->where('idSede',$sede); //Eligieron Sede
                }  
              })
              ->orderBy('ap_orden_merito','asc')
              ->get();

        //return dd($query_primeros_puestos);

        foreach($query_primeros_puestos as $key => $item_query){
          $primeros_puestos->push(
            ['orden_merito' => ($item_query->ap_orden_merito),
             'nro_matricula' => ($item_query->ap_nro_matricula),
             'nombres' => ($item_query->ap_nombres),
             'promedio_ponderado' => (strval($item_query->ap_promedio_ponderado)),
             'escuela' => ($item_query->idEscuela)
              ]);
        }
        
        return response()->json(['primeros_puestos' => $primeros_puestos, 'semestre' => $val_semestre, 'escuela' => $val_escuela]);
        DB::commit();
        
      }catch(Exception $e){
       
        return response()->json(['primeros_puestos' => $e->getMessage()]);
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
      //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $post = Publicacion::findOrFail($id);
      $unidades = Unidad::where('estado', 1)->get();
      $top = Publicacion::orderBy('fecha', 'DESC')->where('estado', 1)->skip(0)->take(3)->get();
      $mejoresPublicaciones = Publicacion::orderBy('vistas', 'DESC')->where('estado', 1)->skip(0)->take(3)->get();
      $etiquetas = Etiqueta::all();
      $info = Contactanos::where('estado',1)->first();
      $etiquetasPost = Publicacion_Etiqueta::where('publicacion_etiqueta.idPublicacion', $id)->get();
      return view('post') -> with(compact('post', 'top', 'etiquetas', 'info', 'mejoresPublicaciones', 'etiquetasPost', 'unidades'));
    }

     public function showByTag($id)
     {
       $tag = Etiqueta::findOrFail($id);
       $unidades = Unidad::where('estado', 1)->get();
       $publicaciones = Publicacion::join('publicacion_etiqueta', 'publicacion_etiqueta.idPublicacion', 'publicaciones.idPublicacion')
       ->orderBy('fecha', 'DESC')->where('publicacion_etiqueta.idEtiqueta', $tag->idEtiqueta)->where('estado', 1)->paginate(5);
       $top = Publicacion::orderBy('fecha', 'DESC')->where('estado', 1)->skip(0)->take(3)->get();
       $mejoresPublicaciones = Publicacion::orderBy('vistas', 'DESC')->where('estado', 1)->skip(0)->take(3)->get();
       $etiquetas = Etiqueta::all();
       $info = Contactanos::where('estado',1)->first();
       return view('posts') -> with(compact('publicaciones', 'top', 'etiquetas', 'info', 'mejoresPublicaciones', 'tag', 'unidades'));
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
