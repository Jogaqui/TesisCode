<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Publicacion;
use App\Etiqueta;
use App\Contactanos;
use App\DIPLOMASAPP_Escuela;
use App\Publicacion_Etiqueta;
use App\SGA_Dependencia;
use App\Unidad;
use App\DIPLOMASAPP_Graduado;
use App\DIPLOMASAPP_Facultad;
use App\DIPLOMASAPP_Graduado_duplicado;
use App\DIPLOMASAPP_TipoFicha;
use App\URAA_Tramite;
use App\URAA_SemestreAcademico;
use App\SGA_Sede;
use App\SGA_Semestre;
use App\SGA_Matricula;
use App\SUV_Sede;
use App\SUV_Semestre;
use App\SUV_Matricula;
use App\SUV_Estructura;
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

       $facultades_DiplomasApp = DIPLOMASAPP_Facultad::where('Nom_facultad','LIKE','FACULTAD%')->get();

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
        'facultades_DiplomasApp',
        'semestres_consolidado',
        'anios_grados_titulos',
      ));
    }



    public function getNroAlumnosMatriculadosByEscuela_SGA($sede, $semestre, $dependencia)
    {
      DB::beginTransaction();
      try{
        
         //QUERY CLASICA 
        // $matriculados_SGA =  SGA_Matricula::select(DB::raw('COUNT(escuela.dep_id) AS nro_matriculados'), 'escuela.dep_nombre')
        // ->join('perfil','perfil.pfl_id','sga_matricula.pfl_id')
        // ->join('dependencia AS escuela','escuela.dep_id','perfil.dep_id')
        // ->where('sga_matricula.ani_id',$semestre)
        // ->where('perfil.sed_id',$sede)
        // ->where('escuela.sdep_id',$dependencia)
        // ->where('sga_matricula.mat_estado',1)
        // ->groupBy('escuela.dep_id', 'escuela.dep_nombre')
        // ->get();

        //NUEVA QUERY CON GENEROS
        $matriculados_SGA =  SGA_Matricula::select('escuela.dep_nombre',
        DB::raw('COUNT(CASE WHEN persona.per_sexo = "F" THEN 1 END) AS femenino'),
        DB::raw('COUNT(CASE WHEN persona.per_sexo = "M" THEN 1 END) AS masculino'),
        DB::raw('COUNT(escuela.dep_id) AS nro_matriculados'))
        ->join('perfil','perfil.pfl_id','sga_matricula.pfl_id')
        ->join('persona','persona.per_id','perfil.per_id')
        ->join('dependencia AS escuela','escuela.dep_id','perfil.dep_id')
        //->join('sga_orden_pago AS op','sga_matricula.mat_id','op.mat_id')
        ->where('sga_matricula.ani_id',$semestre)
        ->where('perfil.sed_id',$sede)
        ->where('escuela.sdep_id',$dependencia)
        ->where('sga_matricula.mat_estado',1)
       // ->where('op.ord_pagado',1)
        ->groupBy('escuela.dep_id', 'escuela.dep_nombre')
        ->get();
      
        return response()->json(['matriculados' => $matriculados_SGA]);
        DB::commit();
        
      }catch(Exception $e){
        return response()->json(['matriculados' => $e->getMessage()]);
        DB::rollback();
      }
     
    }

    public function getNroAlumnosMatriculadosByEscuela_SUV($sede, $semestre, $dependencia)
    {
      DB::beginTransaction();
      try{
        
        $matriculados_SUV =  SUV_Matricula::select('patrimonio.estructura.estr_descripcion',
        DB::raw('COUNT(*) AS nro_matriculados'),
        DB::raw("COUNT(CASE WHEN sistema.persona.per_sexo = '0' THEN 1 END) AS femenino"),
        DB::raw("COUNT(CASE WHEN sistema.persona.per_sexo = '1' THEN 1 END) AS masculino"))
        ->join('matriculas.alumno','matriculas.alumno.idalumno','matricula.idalumno')
        ->join('sistema.persona','sistema.persona.idpersona','matriculas.alumno.idpersona')
        ->join('patrimonio.area','patrimonio.area.idarea','matriculas.alumno.idarea')
        ->join('patrimonio.estructura','patrimonio.estructura.idestructura','patrimonio.area.idestructura')
        ->join('matriculas.orden_pago','matriculas.orden_pago.idmatricula','matricula.idmatricula')
        ->where('matricula.mat_periodo',$semestre)
        ->where('matriculas.alumno.idsede',$sede)
        ->where('patrimonio.estructura.iddependencia',$dependencia)
        ->where('matriculas.orden_pago.ord_estado',"PAGADA")
        ->where('matricula.mat_estado',"1")
        ->groupBy('patrimonio.estructura.idestructura')
        ->get();
      
        return response()->json(['matriculados' => $matriculados_SUV]);
        DB::commit();
        
      }catch(Exception $e){
        return response()->json(['matriculados' => $e->getMessage()]);
        DB::rollback();
      }
     
    }

    public function getNroAlumnosMatriculadosByEscuela_Consolidado($semestre)
    {
      DB::beginTransaction();
      try{
        
        $semestre_ani_SGA = "";
        $semestre_ani_SGA = substr($semestre,0,4);

        $semestre_tani_SGA = 0;

        if(substr($semestre,5)=='I'){
          $semestre_tani_SGA = 1;
        }
        elseif(substr($semestre,5)=='II'){
          $semestre_tani_SGA = 2;
        }
        elseif(substr($semestre,5)=='NIV'){
          $semestre_tani_SGA = 3;
        }
        elseif(substr($semestre,5)=='ANUAL'){
          $semestre_tani_SGA = 4;
        }
        elseif(substr($semestre,5)=='VER'){
          $semestre_tani_SGA = 5;
        }
        
        $semestre_SGA = SGA_Semestre::select('sga_anio.ani_id')
                        ->where('sga_anio.tan_id',$semestre_tani_SGA)
                        ->where('sga_anio.ani_anio',$semestre_ani_SGA)
                        ->first();
   
        

        // QUERYS CLASICAS - Matriculas Consolidado

        // $matriculados_SGA = SGA_Matricula::select(DB::raw('COUNT(sga_matricula.mat_id) AS nro_matriculados'))
        // ->where('sga_matricula.ani_id',$semestre_SGA->ani_id)
        // ->where('sga_matricula.mat_estado',1)
        // ->first();

        // $matriculados_SUV =  SUV_Matricula::select(DB::raw('COUNT(*) AS nro_matriculados'))
        // ->join('matriculas.orden_pago','matriculas.orden_pago.idmatricula','matricula.idmatricula')
        // ->where('matricula.mat_periodo',$semestre)
        // ->where('matriculas.orden_pago.ord_estado',"PAGADA")
        // ->where('matricula.mat_estado',1)
        // ->first();


        $matriculados_SGA = SGA_Matricula::select(DB::raw('COUNT(sga_matricula.mat_id) AS nro_matriculados'),
         DB::raw('COUNT(CASE WHEN persona.per_sexo = "F" THEN 1 END) AS femenino'),
         DB::raw('COUNT(CASE WHEN persona.per_sexo = "M" THEN 1 END) AS masculino'),)
        ->join('perfil','perfil.pfl_id','sga_matricula.pfl_id')
        ->join('persona','persona.per_id','perfil.per_id')
        ->join('sga_orden_pago','sga_orden_pago.mat_id', 'sga_matricula.mat_id')
        ->where('sga_matricula.ani_id', $semestre_SGA->ani_id)
        ->where('sga_orden_pago.ord_pagado',1)
        ->where('sga_matricula.mat_estado',1)
        ->first();

        $matriculados_SUV =  SUV_Matricula::select(DB::raw('COUNT(*) AS nro_matriculados'),
        DB::raw("COUNT(CASE WHEN sistema.persona.per_sexo = '0' THEN 1 END) AS femenino"),
        DB::raw("COUNT(CASE WHEN sistema.persona.per_sexo = '1' THEN 1 END) AS masculino"))
        ->join('matriculas.alumno','matriculas.alumno.idalumno','matricula.idalumno')
        ->join('sistema.persona','sistema.persona.idpersona','matriculas.alumno.idpersona')
        ->join('matriculas.orden_pago','matriculas.orden_pago.idmatricula','matricula.idmatricula')
        ->where('matricula.mat_periodo',$semestre)
        ->where('matriculas.orden_pago.ord_estado',"PAGADA")
        ->where('matricula.mat_estado',1)
        ->first();

        //dd($matriculados_SGA);

        $matriculados_Consolidado_array = "";

        $matriculados_Consolidado = collect([
          [
           'sistema_descri' => 'SGA' , 
           'femenino' => $matriculados_SGA->femenino ,
           'masculino' => $matriculados_SGA->masculino , 
           'nro_matriculados_consolidado'=> $matriculados_SGA->nro_matriculados
          ], 
          [
            'sistema_descri' => 'SUV' , 
            'femenino' => $matriculados_SUV->femenino ,
            'masculino' => $matriculados_SUV->masculino , 
            'nro_matriculados_consolidado'=> $matriculados_SUV->nro_matriculados
           ], 
        ]);
           

        return response()->json(['matriculados' => $matriculados_Consolidado]);
        DB::commit();
        
      }catch(Exception $e){
        return response()->json(['matriculados' => $e->getMessage()]);
        DB::rollback();
      }
     
    }


    public function getNroGraduadosTituladosByEscuela($tipo, $condicion, $anio, $dependencia)
    {
      DB::beginTransaction();
      try{

        $header_tipo = "";

        //---------------------------------------------------- GRADUADOS -------------------------------------------------------------
        if($tipo==1){

          // ----------------- REGULARES -----------------
          if($condicion==1){

            $graduados_titulados = collect();
            $header_tipo = "GRADUADOS";
            
            // Diplomas App
            $idDependencia_DiplomasApp = DIPLOMASAPP_Facultad::select('facultad.Cod_facultad')->where('facultad.Nom_facultad',$dependencia)->first();
  
            $query_GradosTitulos_DiplomasApp =  DIPLOMASAPP_Graduado::select(DB::raw('COUNT(graduado.idgraduado) AS nro_graduados'), 'escuela.Nom_escuela')
            ->join('alumno','alumno.Cod_alumno','graduado.cod_alumno')
            ->join('escuela','escuela.Cod_escuela','alumno.Cod_escuela')
            ->whereRaw('SUBSTRING(graduado.fec_expe_d, 1, 4) = '.$anio)
            ->where('escuela.Cod_facultad', $idDependencia_DiplomasApp->Cod_facultad)
            ->whereNotIn('graduado.grad_estado', [3,5])
            ->where(function($query)
            {
                $query->where('graduado.tipo_ficha','1')
                ->orWhere('graduado.tipo_ficha','7');
            })  
            ->groupBy('escuela.Nom_escuela')
            ->get();
          
            // URAA
            $idDependencia_URAA = URAA_Dependencia::select('dependencia.idDependencia')->where('dependencia.denominacion',$dependencia)->first();
  
            $query_GradosTitulos_URAA = URAA_Tramite::select(DB::raw('COUNT(tramite.idTramite) AS nro_graduados'), 'programa.nombre')
            ->join('tramite_detalle','tramite.idTramite_detalle','tramite_detalle.idTramite_detalle')
            ->join('tipo_tramite_unidad','tipo_tramite_unidad.idTipo_tramite_unidad','tramite.idTipo_tramite_unidad')
            ->join('dependencia','tramite.idDependencia','dependencia.idDependencia')
            ->join('programa','programa.idPrograma','tramite.idPrograma')
            ->join('cronograma_carpeta','cronograma_carpeta.idCronograma_carpeta','tramite_detalle.idCronograma_carpeta')
            ->whereRaw('SUBSTRING(cronograma_carpeta.fecha_colacion, 1, 4) = '.$anio)
            ->where('tramite.idDependencia',$idDependencia_URAA->idDependencia)
            ->where('tipo_tramite_unidad.idTipo_tramite_unidad',15)
            ->where(function($query)
            {
                $query->where('tramite.idEstado_tramite',15)
                ->orWhere('tramite.idEstado_tramite',44);
            })
            ->groupBy('programa.nombre')
            ->get();
  
            //*********************** VALIDACION URAA + DIPLOMAS APP *************************
             
            $escuela_original = DIPLOMASAPP_Escuela::all();
   
            $idx_temp_URAA = -1;
            $idx_temp_DIPLOMASAPP = -1;
            
            foreach ($escuela_original as $key => $escuela_item) { 
              foreach ($query_GradosTitulos_DiplomasApp as $key_DiplomasApp => $item_DiplomasApp) { 
                if($escuela_item->Nom_escuela == $item_DiplomasApp->Nom_escuela){
  
                  $idx_temp_DIPLOMASAPP = $key_DiplomasApp;
                  
                }
              }
  
              foreach ($query_GradosTitulos_URAA as $key_URAA => $item_URAA) { 
                if($escuela_item->Nom_escuela == $item_URAA->nombre){
  
                  $idx_temp_URAA = $key_URAA;
                  
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
                   'nombre_escuela' => ($escuela_item->Nom_escuela),
                  ]);       
              }
              
              $idx_temp_URAA = -1;
              $idx_temp_DIPLOMASAPP = -1;
               
            }


          }

          // ----------------- DUPLICADOS -----------------
          elseif($condicion==2){

            $graduados_titulados = collect();
            $header_tipo = "GRADUADOS - Duplicados";
            
            // Diplomas App
            $idDependencia_DiplomasApp = DIPLOMASAPP_Facultad::select('facultad.Cod_facultad')->where('facultad.Nom_facultad',$dependencia)->first();
  
            $query_GradosTitulos_DiplomasApp =  DIPLOMASAPP_Graduado_duplicado::select(DB::raw('COUNT(graduado_duplicado.idgraduado_duplicado) AS nro_graduados'), 'escuela.Nom_escuela')
            ->join('graduado','graduado.idgraduado','graduado_duplicado.grad_idgraduado')
            ->join('alumno','alumno.Cod_alumno','graduado.cod_alumno')
            ->join('escuela','escuela.Cod_escuela','alumno.Cod_escuela')
            ->whereRaw('SUBSTRING(graduado_duplicado.fec_expe_d, 1, 4) = '.$anio)
            ->where('escuela.Cod_facultad', $idDependencia_DiplomasApp->Cod_facultad)
            ->whereNotIn('graduado.grad_estado', [3,5])
            ->where(function($query)
            {
                $query->where('graduado.tipo_ficha','1')
                ->orWhere('graduado.tipo_ficha','7');
            })  
            ->groupBy('escuela.Nom_escuela')
            ->get();

            dd($query_GradosTitulos_DiplomasApp);
          
            // URAA
            $idDependencia_URAA = URAA_Dependencia::select('dependencia.idDependencia')->where('dependencia.denominacion',$dependencia)->first();
  
            $query_GradosTitulos_URAA = URAA_Tramite::select(DB::raw('COUNT(tramite.idTramite) AS nro_graduados'), 'programa.nombre')
            ->join('tramite_detalle','tramite.idTramite_detalle','tramite_detalle.idTramite_detalle')
            ->join('tipo_tramite_unidad','tipo_tramite_unidad.idTipo_tramite_unidad','tramite.idTipo_tramite_unidad')
            ->join('dependencia','tramite.idDependencia','dependencia.idDependencia')
            ->join('programa','programa.idPrograma','tramite.idPrograma')
            ->join('cronograma_carpeta','cronograma_carpeta.idCronograma_carpeta','tramite_detalle.idCronograma_carpeta')
            ->whereRaw('SUBSTRING(cronograma_carpeta.fecha_colacion, 1, 4) = '.$anio)
            ->where('tramite.idDependencia',$idDependencia_URAA->idDependencia)
            ->where('tipo_tramite_unidad.idTipo_tramite_unidad',0)
            ->where(function($query)
            {
                $query->where('tramite.idEstado_tramite',15)
                ->orWhere('tramite.idEstado_tramite',44);
            })
            ->groupBy('programa.nombre')
            ->get();
  
            //*********************** VALIDACION URAA + DIPLOMAS APP *************************
             
            $escuela_original = DIPLOMASAPP_Escuela::all();
   
            $idx_temp_URAA = -1;
            $idx_temp_DIPLOMASAPP = -1;
            
            foreach ($escuela_original as $key => $escuela_item) { 
              foreach ($query_GradosTitulos_DiplomasApp as $key_DiplomasApp => $item_DiplomasApp) { 
                if($escuela_item->Nom_escuela == $item_DiplomasApp->Nom_escuela){
  
                  $idx_temp_DIPLOMASAPP = $key_DiplomasApp;
                  
                }
              }
  
              foreach ($query_GradosTitulos_URAA as $key_URAA => $item_URAA) { 
                if($escuela_item->Nom_escuela == $item_URAA->nombre){
  
                  $idx_temp_URAA = $key_URAA;
                  
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
                   'nombre_escuela' => ($escuela_item->Nom_escuela),
                  ]);       
              }
              
              $idx_temp_URAA = -1;
              $idx_temp_DIPLOMASAPP = -1;
               
            }
          }
         
         

        }

        //---------------------------------------------------- TITULADOS -------------------------------------------------------------
        elseif($tipo==2){

          // ----------------- REGULARES -----------------
          if($condicion==1){

            $graduados_titulados = collect();
            $header_tipo = "TITULADOS";
            
            // Diplomas App
            $idDependencia_DiplomasApp = DIPLOMASAPP_Facultad::select('facultad.Cod_facultad')->where('facultad.Nom_facultad',$dependencia)->first();
  
            $query_GradosTitulos_DiplomasApp =  DIPLOMASAPP_Graduado::select(DB::raw('COUNT(graduado.idgraduado) AS nro_graduados'), 'escuela.Nom_escuela')
            ->join('alumno','alumno.Cod_alumno','graduado.cod_alumno')
            ->join('escuela','escuela.Cod_escuela','alumno.Cod_escuela')
            ->whereRaw('SUBSTRING(graduado.fec_expe_d, 1, 4) = '.$anio)
            ->where('escuela.Cod_facultad', $idDependencia_DiplomasApp->Cod_facultad)
            ->whereNotIn('graduado.grad_estado', [3,5])
            ->where(function($query)
            {
                $query->where('graduado.tipo_ficha','2')
                ->orWhere('graduado.tipo_ficha','8');
            })  
            ->groupBy('escuela.Nom_escuela')
            ->get();
          
            // URAA
            $idDependencia_URAA = URAA_Dependencia::select('dependencia.idDependencia')->where('dependencia.denominacion',$dependencia)->first();
  
            $query_GradosTitulos_URAA = URAA_Tramite::select(DB::raw('COUNT(tramite.idTramite) AS nro_graduados'), 'programa.nombre')
            ->join('tramite_detalle','tramite.idTramite_detalle','tramite_detalle.idTramite_detalle')
            ->join('tipo_tramite_unidad','tipo_tramite_unidad.idTipo_tramite_unidad','tramite.idTipo_tramite_unidad')
            ->join('dependencia','tramite.idDependencia','dependencia.idDependencia')
            ->join('programa','programa.idPrograma','tramite.idPrograma')
            ->join('cronograma_carpeta','cronograma_carpeta.idCronograma_carpeta','tramite_detalle.idCronograma_carpeta')
            ->whereRaw('SUBSTRING(cronograma_carpeta.fecha_colacion, 1, 4) = '.$anio)
            ->where('tramite.idDependencia',$idDependencia_URAA->idDependencia)
            ->where('tipo_tramite_unidad.idTipo_tramite_unidad',16)
            ->where(function($query)
            {
                $query->where('tramite.idEstado_tramite',15)
                ->orWhere('tramite.idEstado_tramite',44);
            })
            ->groupBy('programa.nombre')
            ->get();
  
             //*********************** VALIDACION URAA + DIPLOMAS APP *************************
             
            $escuela_original = DIPLOMASAPP_Escuela::all();
   
            $idx_temp_URAA = -1;
            $idx_temp_DIPLOMASAPP = -1;
            
            foreach ($escuela_original as $key => $escuela_item) { 
              foreach ($query_GradosTitulos_DiplomasApp as $key_DiplomasApp => $item_DiplomasApp) { 
                if($escuela_item->Nom_escuela == $item_DiplomasApp->Nom_escuela){
  
                  $idx_temp_DIPLOMASAPP = $key_DiplomasApp;
                  
                }
              }
  
              foreach ($query_GradosTitulos_URAA as $key_URAA => $item_URAA) { 
                if($escuela_item->Nom_escuela == $item_URAA->nombre){
  
                  $idx_temp_URAA = $key_URAA;
                  
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
                   'nombre_escuela' => ($escuela_item->Nom_escuela),
                  ]);       
              }
              
              $idx_temp_URAA = -1;
              $idx_temp_DIPLOMASAPP = -1;
               
            }
          }

          // ----------------- DUPLICADOS -----------------
          elseif($condicion==2){

            $graduados_titulados = collect();
            $header_tipo = "TITULADOS - Duplicados";
            
            // Diplomas App
            $idDependencia_DiplomasApp = DIPLOMASAPP_Facultad::select('facultad.Cod_facultad')->where('facultad.Nom_facultad',$dependencia)->first();
  
            $query_GradosTitulos_DiplomasApp =  DIPLOMASAPP_Graduado_duplicado::select(DB::raw('COUNT(graduado_duplicado.idgraduado_duplicado) AS nro_graduados'), 'escuela.Nom_escuela')
            ->join('graduado','graduado.idgraduado','graduado_duplicado.grad_idgraduado')
            ->join('alumno','alumno.Cod_alumno','graduado.cod_alumno')
            ->join('escuela','escuela.Cod_escuela','alumno.Cod_escuela')
            ->whereRaw('SUBSTRING(graduado_duplicado.fec_expe_d, 1, 4) = '.$anio)
            ->where('escuela.Cod_facultad', $idDependencia_DiplomasApp->Cod_facultad)
            ->whereNotIn('graduado.grad_estado', [3,5])
            ->where(function($query)
            {
                $query->where('graduado.tipo_ficha','2')
                ->orWhere('graduado.tipo_ficha','8');
            })  
            ->groupBy('escuela.Nom_escuela')
            ->get();
          
            // URAA
            $idDependencia_URAA = URAA_Dependencia::select('dependencia.idDependencia')->where('dependencia.denominacion',$dependencia)->first();
  
            $query_GradosTitulos_URAA = URAA_Tramite::select(DB::raw('COUNT(tramite.idTramite) AS nro_graduados'), 'programa.nombre')
            ->join('tramite_detalle','tramite.idTramite_detalle','tramite_detalle.idTramite_detalle')
            ->join('tipo_tramite_unidad','tipo_tramite_unidad.idTipo_tramite_unidad','tramite.idTipo_tramite_unidad')
            ->join('dependencia','tramite.idDependencia','dependencia.idDependencia')
            ->join('programa','programa.idPrograma','tramite.idPrograma')
            ->join('cronograma_carpeta','cronograma_carpeta.idCronograma_carpeta','tramite_detalle.idCronograma_carpeta')
            ->whereRaw('SUBSTRING(cronograma_carpeta.fecha_colacion, 1, 4) = '.$anio)
            ->where('tramite.idDependencia',$idDependencia_URAA->idDependencia)
            ->where('tipo_tramite_unidad.idTipo_tramite_unidad',0)
            ->where(function($query)
            {
                $query->where('tramite.idEstado_tramite',15)
                ->orWhere('tramite.idEstado_tramite',44);
            })
            ->groupBy('programa.nombre')
            ->get();
  
            //*********************** VALIDACION URAA + DIPLOMAS APP *************************
             
            $escuela_original = DIPLOMASAPP_Escuela::all();
   
            $idx_temp_URAA = -1;
            $idx_temp_DIPLOMASAPP = -1;
            
            foreach ($escuela_original as $key => $escuela_item) { 
              foreach ($query_GradosTitulos_DiplomasApp as $key_DiplomasApp => $item_DiplomasApp) { 
                if($escuela_item->Nom_escuela == $item_DiplomasApp->Nom_escuela){
  
                  $idx_temp_DIPLOMASAPP = $key_DiplomasApp;
                  
                }
              }
  
              foreach ($query_GradosTitulos_URAA as $key_URAA => $item_URAA) { 
                if($escuela_item->Nom_escuela == $item_URAA->nombre){
  
                  $idx_temp_URAA = $key_URAA;
                  
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
                   'nombre_escuela' => ($escuela_item->Nom_escuela),
                  ]);       
              }
              
              $idx_temp_URAA = -1;
              $idx_temp_DIPLOMASAPP = -1;
               
            }


          }
          
        }


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

          // QUERY ANTIGUA
          // elseif($query_GradosTitulosConsolidado_URAA->count()!=0 && $query_GradosTitulosConsolidado_DiplomasApp->count()==0){
          //   foreach ($query_GradosTitulosConsolidado_URAA as $key => $item_URAA) { 
          //     $graduados_titulados_consolidado->push(
          //       ['nro_graduados_titulados_consolidado' => ($item_URAA->nro_graduados),
          //        'nombre_ficha' => ($item_URAA->nombre_ficha),
          //       ]);
          //   }
          // }
          // elseif($query_GradosTitulosConsolidado_DiplomasApp->count()!=0 && $query_GradosTitulosConsolidado_URAA->count()==0 ){
          //   foreach ($query_GradosTitulosConsolidado_DiplomasApp as $key => $item_DiplomasApp) { 
          //     $graduados_titulados_consolidado->push(
          //       ['nro_graduados_titulados_consolidado' => ($item_DiplomasApp->nro_graduados),
          //        'nombre_ficha' => ($item_DiplomasApp->Nom_ficha),
          //       ]);
          //   }
          // }
          
         // ----------------- DUPLICADOS - Regulares -----------------
         if($condicion==2){

          $graduados_titulados_consolidado = collect();

          $header_condicion = "GRADUADOS";
          
          // Diplomas App
          $query_GradosTitulosConsolidado_DiplomasApp =  DIPLOMASAPP_TipoFicha::select(DB::raw('COUNT(tipoficha.Tip_ficha) AS nro_graduados'), 'tipoficha.Nom_ficha')
          ->join('graduado','graduado.tipo_ficha','tipoficha.Tip_ficha')
          ->join('graduado_duplicado','graduado_duplicado.grad_idgraduado','graduado.idgraduado')
          ->whereRaw('SUBSTRING(graduado_duplicado.fec_expe_d, 1, 4) = '.$anio)
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
        return response()->json(['graduados_titulados' => $e->getMessage()]);
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
