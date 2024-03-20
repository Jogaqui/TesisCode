<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SUV_Matricula_Detalle extends Model
{
    protected $connection = 'pgsql';
    protected $table="matriculas.matricula_detalle";
    protected $primaryKey="idmatriculadetalle";
    public $timestamps=false;
    protected $fillable = [];
    protected $guarded = [];
}
