<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class URAA_TipoUsuario extends Model
{
    protected $connection = 'mysql2';
    protected $table="tipo_usuario";
    protected $primaryKey="idTipo_usuario";
    public $timestamps=false;
    protected $fillable = [];
    protected $guarded = [];
}
