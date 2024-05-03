<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulario_Alumno extends Model
{
    protected $table="formulario_alumno";
    protected $primaryKey="idFormulario_alumno";
    public $timestamps=false;
    protected $fillable = [
        'form_al_codigo',
        'form_al_dni',
        'form_al_apellidos',
        'form_al_facultad',
        'form_al_escuela',
        'form_al_direccion',
        'form_al_departamento',
        'form_al_provincia',
        'form_al_distrito',
        'estado',
    ];
   
}
