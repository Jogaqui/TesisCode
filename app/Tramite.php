<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    protected $table="tramites";
    protected $primaryKey="idTramite";
    public $timestamps=false;
    protected $fillable = [
        'titulo','descripcion','ruta','estado','idIcono',
    ];
    public function icono()
    {
        return $this->hasOne('App\Icono','idIcono','idIcono');
    }
}
