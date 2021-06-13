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
    return redirect()->route('tipoconoce.index')->with('datos', 'Acción Cancelada');
})->name('cancelart');
//Route::get('tipoconoce/{id}/confirmar','TipoConoceController@confirmar')->name('tipoconoce.confirmar');

// Trabajadores
Route::resource('trabajador','TrabajadorController');
// Route::resource('/alumno', AlumnoController::class);
Route::get(('cancelarT'), function(){
  return redirect()->route('trabajador.index')->with('datos', 'Acción Cancelada');
})->name('cancelarT');
Route::get('trabajador/{id}/confirmar','TrabajadorController@confirmar')->name('trabajador.confirmar');
