<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    protected $table="tramites";
    protected $primaryKey="idTramite";
    public $timestamps=false;
    protected $fillable = [
        'icono', 'titulo','descripcion','ruta','estado',
    ];
}
