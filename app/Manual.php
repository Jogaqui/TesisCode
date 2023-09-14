<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manual extends Model
{
    protected $table="manuales";
    protected $primaryKey="idManual";
    public $timestamps=false;
    protected $fillable = [
        'titulo','descripcion','ruta_manual','estado','idTipo_usuario','estado'
    ];
   
}
