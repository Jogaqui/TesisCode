<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Publicacion;
use App\Etiqueta;
use App\Contactanos;
use App\Publicacion_Etiqueta;
use App\SGA_Dependencia;
use App\Unidad;
use App\URAA_Tramite;
use App\SGA_Sede;
use App\SGA_Semestre;
use App\SGA_Matricula;
use App\SUV_Sede;
use App\SUV_Semestre;
use App\SUV_Matricula;
use App\SUV_Estructura;
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
        'semestres_consolidado'
      ));
    }



    public function getNroAlumnosMatriculadosByEscuela_SGA($sede, $semestre, $dependencia)
    {
      DB::beginTransaction();
      try{
        
        $matriculados_SGA =  SGA_Matricula::select(DB::raw('COUNT(escuela.dep_id) AS nro_matriculados'), 'escuela.dep_nombre')
        ->join('perfil','perfil.pfl_id','sga_matricula.pfl_id')
        ->join('dependencia AS escuela','escuela.dep_id','perfil.dep_id')
        ->where('sga_matricula.ani_id',$semestre)
        ->where('perfil.sed_id',$sede)
        ->where('escuela.sdep_id',$dependencia)
        ->where('sga_matricula.mat_estado',1)
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
        
        $matriculados_SUV =  SUV_Matricula::select(DB::raw('COUNT(*) AS nro_matriculados'), 'patrimonio.estructura.estr_descripcion')
        ->join('matriculas.alumno','matriculas.alumno.idalumno','matricula.idalumno')
        ->join('patrimonio.area','patrimonio.area.idarea','matriculas.alumno.idarea')
        ->join('patrimonio.estructura','patrimonio.estructura.idestructura','patrimonio.area.idestructura')
        ->join('matriculas.orden_pago','matriculas.orden_pago.idmatricula','matricula.idmatricula')
        ->where('matricula.mat_periodo',$semestre)
        ->where('matriculas.alumno.idsede',$sede)
        ->where('patrimonio.estructura.iddependencia',$dependencia)
        ->where('matriculas.orden_pago.ord_estado',"PAGADA")
        ->where('matricula.mat_estado',1)
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
        
        $matriculados_SUV =  SUV_Matricula::select(DB::raw('COUNT(*) AS nro_matriculados'))
        ->join('matriculas.orden_pago','matriculas.orden_pago.idmatricula','matricula.idmatricula')
        ->where('matricula.mat_periodo',$semestre)
        ->where('matriculas.orden_pago.ord_estado',"PAGADA")
        ->where('matricula.mat_estado',1)
        ->first();

       
       
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
   

        $matriculados_SGA = SGA_Matricula::select(DB::raw('COUNT(sga_matricula.mat_id) AS nro_matriculados'))
        ->where('sga_matricula.ani_id',$semestre_SGA->ani_id)
        ->where('sga_matricula.mat_estado',1)
        ->first();

        //dd($matriculados_SGA);

        $matriculados_Consolidado_array = "";

        $matriculados_Consolidado = collect([
          ['sistema_descri' => 'SGA' , 'nro_matriculados_consolidado' => $matriculados_SGA->nro_matriculados], 
          ['sistema_descri' => 'SUV' , 'nro_matriculados_consolidado' => $matriculados_SUV->nro_matriculados]
        ]);
           

        return response()->json(['matriculados' => $matriculados_Consolidado]);
        DB::commit();
        
      }catch(Exception $e){
        return response()->json(['matriculados' => $e->getMessage()]);
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
