<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno_Ponderado extends Model
{
    protected $table="alumno_ponderado";
    protected $primaryKey="idAlumno_ponderado";
    public $timestamps=false;
    protected $fillable = [];
    protected $guarded = [];
}
