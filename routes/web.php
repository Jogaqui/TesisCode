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
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::group(['middleware' => 'auth'], function () {
  Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
  Route::post('register', 'Auth\RegisterController@register');
});

//WEB
Route::resource('/welcome', WelcomeController::class);
Route::resource('/procedure', ProcedureController::class);
Route::resource('/unit', UnitController::class);
Route::resource('/aboutus', AboutUsController::class);
Route::resource('/contact', ContactController::class);

//APP
Route::get('/home', 'HomeController@index')->name('home');

// Unidades
Route::resource('unidad', 'UnidadController');
Route::get(('cancelarp'), function(){
    return redirect()->route('unidad.index')->with('datos', 'Acción Cancelada');
})->name('cancelarp');
Route::get('unidad/{id}/confirmar','UnidadController@confirmar')->name('unidad.confirmar');

// TipoConoce
Route::resource('tipoconoce', 'TipoConoceController');
Route::get(('cancelart'), function(){
    return redirect()->route('tipoconoce.index')->with('datos', 'C');
})->name('cancelart');
//Route::get('tipoconoce/{id}/confirmar','TipoConoceController@confirmar')->name('tipoconoce.confirmar');

// Trabajadores
Route::resource('trabajador','TrabajadorController');
// Route::resource('/alumno', AlumnoController::class);
Route::get(('cancelarTr'), function(){
  return redirect()->route('trabajador.index')->with('datos', 'Acción Cancelada');
})->name('cancelarTr');


// Unidades

Route::resource('publicacion', 'PublicacionController');

Route::get(('cancelarPu'), function(){
    return redirect()->route('publicacion.index')->with('datos', 'Acción Cancelada');
})->name('cancelarPu');


//Etiquetas
Route::resource('etiqueta', 'EtiquetaController');

Route::get(('cancelarE'), function(){
    return redirect()->route('etiqueta.index')->with('datos', 'Acción Cancelada');
})->name('cancelarE');


//Tramite
Route::resource('tramite', 'TramiteController');

Route::get(('cancelarT'), function(){
    return redirect()->route('tramite.index')->with('datos', 'Acción Cancelada');
})->name('cancelarT');
Route::get('trabajador/{id}/confirmar','TrabajadorController@confirmar')->name('trabajador.confirmar');

// Conocenos
Route::resource('conocenos', 'ConocenosController');
Route::get('TipoConoce/{id}','TipoConoceController@show')->name('TipoConoce.show');
//Route::get('Conocenos/create','ConocenosController@create')->name('Conocenos.create');
Route::get(('cancelarc/{id}'), function($tipo){
  //dd($tipo);
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
    return redirect()->route('icono.index')->with('datos', 'Acción Cancelada');
})->name('cancelarI');


//Ícono
Route::resource('consulta', 'ConsultaController');

Route::get(('cancelarC'), function(){
    return redirect()->route('consulta.index')->with('datos', 'Acción Cancelada');
})->name('cancelarC');

