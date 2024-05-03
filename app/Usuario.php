<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table="users";
    protected $primaryKey="id";
    public $timestamps=false;
    protected $fillable = [
        'usu_apepaterno', 'usu_apematerno','usu_nombres','usu_email','usu_login','password','usu_dni','usu_rol','trab_puesto','usu_estado','remember_token'
    ];
    public function roles()
    {
        return $this->belongsTo('App\Tipo_usuario','idTipo_usuario','usu_rol');
    }

}
