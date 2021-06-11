<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    protected $table="trabajadores";
    protected $primaryKey="idTrabajador";
    public $timestamps=false;
    protected $fillable = [
        'apPaterno', 'apMaterno','Nombres','dni','puesto','correo','telefono','estado','idUnidad',
    ];
    public function unidad()
    {
        return $this->hasOne('App\Unidad','idUnidad','idUnidad');
    }
}
