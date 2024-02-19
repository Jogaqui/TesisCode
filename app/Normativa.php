<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Normativa extends Model
{
    protected $table="normativas";
    protected $primaryKey="idNormativa";
    public $timestamps=false;
    protected $fillable = [
        'titulo','descripcion','idProceso','archivo','vigente','estado'
    ];
   
}
