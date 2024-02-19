<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SE_Alumno extends Model
{
    protected $connection = 'mysql5';
    protected $table="alumno";
    protected $primaryKey="idAlumno";
    public $timestamps=false;
    protected $fillable = [];
    protected $guarded = [];
}
