<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/welcome');
});

// Auth::routes();
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('login', function() {
  $info = App\Contactanos::where('estado',1)->first();
  return view('auth.login')->with(compact('info'));
})->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::group(['middleware' => 'auth'], function () {
  Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
  Route::post('register', 'Auth\RegisterController@register');
});

//WEB
Route::resource('/welcome', WelcomeController::class);
Route::get('/news/etiqueta/{posts}', 'NewsController@showByTag')->name('news.showByTag');
Route::resource('/procedure', ProcedureController::class);
Route::resource('/unit', UnitController::class);
Route::resource('/news', NewsController::class);
Route::resource('/aboutus', AboutUsController::class);
Route::resource('/contact', ContactController::class);
Route::resource('/question', QuestionController::class);
Route::resource('/statitics', StatiticsController::class);
Route::get('/statitics/reportes/matriculas_sga/{sede}/{semestre}/{dependencia}', 'StatiticsController@getNroAlumnosMatriculadosByEscuela_SGA');

Route::get('/statitics/reportes/matriculas_suv/{sede}/{semestre}/{dependencia}', 'StatiticsController@getNroAlumnosMatriculadosByEscuela_SUV');

Route::get('/statitics/reportes/matriculas_consolidado/{semestre}', 'StatiticsController@getNroAlumnosMatriculadosByEscuela_Consolidado');


//APP
Route::group(['middleware' => 'auth'], function () {
  Route::get('/home', 'HomeController@index')->name('home');

  // Unidades
  Route::resource('unidad', 'UnidadController');
  Route::get(('cancelarp'), function(){
      return redirect()->route('unidad.index')->with('datos', 'C');
  })->name('cancelarp');

  // TipoConoce
  Route::resource('tipoconoce', 'TipoConoceController');
  Route::get(('cancelart'), function(){
      return redirect()->route('tipoconoce.index')->with('datos', 'C');
  })->name('cancelart');

  // Trabajadores
  Route::resource('trabajador','TrabajadorController');
  Route::get(('cancelarTr'), function(){
    return redirect()->route('trabajador.index')->with('datos', 'C');
  })->name('cancelarTr');

  // Grados
  Route::resource('grados', 'GradosController');
  Route::get(('cancelargr'), function(){
      return redirect()->route('grados.index')->with('datos', 'C');
  })->name('cancelargr');

  // Publicaciones
  Route::resource('publicacion', 'PublicacionController');
  Route::get('vistas/{id}', 'PublicacionController@leerPublicacion')->name('vistas');
  Route::get(('cancelarPu'), function(){
      return redirect()->route('publicacion.index')->with('datos', 'C');
  })->name('cancelarPu');

  //Etiquetas
  Route::resource('etiqueta', 'EtiquetaController');
  Route::get(('cancelarE'), function(){
      return redirect()->route('etiqueta.index')->with('datos', 'C');
  })->name('cancelarE');

   //Manual
   Route::resource('manual', 'ManualController');
   Route::get(('cancelarHis'), function(){
       return redirect()->route('manual.index')->with('datos', 'C');
   })->name('cancelarHis');

   //Pregunta
   Route::resource('pregunta', 'PreguntaController');
   Route::get(('cancelarPreg'), function(){
       return redirect()->route('pregunta.index')->with('datos', 'C');
   })->name('cancelarPreg'); 

   //Tramite
  Route::resource('tramite', 'TramiteController');
  Route::get(('cancelarT'), function(){
      return redirect()->route('tramite.index')->with('datos', 'C');
  })->name('cancelarT');
  Route::get('trabajador/{id}/confirmar','TrabajadorController@confirmar')->name('trabajador.confirmar');

  // Conocenos
  Route::resource('conocenos', 'ConocenosController');
  Route::get('TipoConoce/{id}','TipoConoceController@show')->name('TipoConoce.show');
  Route::get('Conocenos/{id}','ConocenosController@creartipogene')->name('creartipogene');
  Route::get(('cancelarc/{id}'), function($tipo){
    return redirect()->route('TipoConoce.show',$tipo)->with('datos', 'C');
  })->name('cancelarc');

  // Contactanos
  Route::resource('contactanos', 'ContactanosController');
  Route::get(('cancelars'), function(){
    return redirect()->route('contactanos.index')->with('datos', 'C');
  })->name('cancelars');

  //Ícono
  Route::resource('icono', 'IconoController');
  Route::get(('cancelarI'), function(){
      return redirect()->route('icono.index')->with('datos', 'C');
  })->name('cancelarI');

  //Consulta
  Route::resource('consulta', 'ConsultaController');
  Route::get(('cancelarC'), function(){
      return redirect()->route('consulta.index')->with('datos', 'C');
  })->name('cancelarC');


  //Portada
  Route::resource('portada', 'PortadaController');
  Route::get(('cancelarPor'), function(){
      return redirect()->route('portada.index')->with('datos', 'C');
  })->name('cancelarPor');

  // Funciones
  Route::resource('funciones', 'FuncionesController');
  Route::get('Funciones/{id}','FuncionesController@crearfuncion')->name('crearfuncion');
  Route::get('Unidad/{id}','UnidadController@show')->name('Unidad.show');
  Route::get(('cancelarf/{id}'), function($tipo){
    return redirect()->route('Unidad.show',$tipo)->with('datos', 'C');
  })->name('cancelarf');
});
