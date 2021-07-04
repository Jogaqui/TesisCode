<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    protected $table="trabajadores";
    protected $primaryKey="idTrabajador";
    public $timestamps=false;
    protected $fillable = [
        'apPaterno', 'apMaterno','Nombres','dni','puesto','correo','telefono','imagen','estado','idUnidad','idGrado'
    ];
    public function unidad()
    {
        return $this->hasOne('App\Unidad','idUnidad','idUnidad');
    }
    public function grados()
    {
        return $this->hasOne('App\Grados','idGrado','idGrado');
    }
}
