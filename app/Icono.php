<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Icono extends Model
{
    protected $table="iconos";
    protected $primaryKey="idIcono";
    public $timestamps=false;
    protected $fillable = [
        'nombre', 'estado',
    ];
}
