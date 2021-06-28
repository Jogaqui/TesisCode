<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table="consultas";
    protected $primaryKey="idConsulta";
    public $timestamps=false;
    protected $fillable = [
        'nombre','correo','mensaje','fecha','estado','idUnidad',
    ];
    public function unidad()
    {
        return $this->hasOne('App\Unidad','idUnidad','idUnidad');
    }
}
