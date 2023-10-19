<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_usuario extends Model
{
    protected $table="tipo_usuario";
    protected $primaryKey="idTipo_usuario";
    public $timestamps=false;
    protected $fillable = [
        'idTipo_usuario','rol','estado'
    ];
    public function usuarios()
    {
        return $this->hasMany('App\Usuario','usu_rol','idTipo_usuario');
    }

}
