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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// Unidades

Route::resource('unidad', 'UnidadController');
Route::get(('cancelarp'), function(){
    return redirect()->route('unidad.index')->with('datos', 'Acción Cancelada');
})->name('cancelarp');
Route::get('unidad/{id}/confirmar','UnidadController@confirmar')->name('unidad.confirmar');


// Trabajadores

Route::resource('trabajador','TrabajadorController');

// Route::resource('/alumno', AlumnoController::class);


Route::get(('cancelarT'), function(){
    return redirect()->route('trabajador.index')->with('datos', 'Acción Cancelada');
})->name('cancelarT');
Route::get('trabajador/{id}/confirmar','TrabajadorController@confirmar')->name('trabajador.confirmar');