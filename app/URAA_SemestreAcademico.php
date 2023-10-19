<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class URAA_SemestreAcademico extends Model
{
    protected $connection = 'mysql2';
    protected $table="semestre_academico";
    protected $primaryKey="idSemestre_academico";
    public $timestamps=false;
    protected $fillable = [];
    protected $guarded = [];
}
