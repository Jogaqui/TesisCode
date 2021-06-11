<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoConoce extends Model
{
    protected $table="tipoconoce";
    protected $primaryKey="idConoce";
    public $timestamps=false;
    protected $fillable = [
        'nombre','estado',
    ];
}
