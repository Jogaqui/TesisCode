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


//Etiquetas
Route::resource('tramite', 'TramiteController');

Route::get(('cancelarT'), function(){
    return redirect()->route('tramite.index')->with('datos', 'Acción Cancelada');
})->name('cancelarT');

