<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funciones extends Model
{
    protected $table="funciones";
    protected $primaryKey="idFuncion";
    public $timestamps=false;
    protected $fillable = [
        'unidad','descripcion','estado',
    ];
    public function unidades()
    {
        return $this->hasOne('App\unidades','idUnidad','unidad');
    }
}
