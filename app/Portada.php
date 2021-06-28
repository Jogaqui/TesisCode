<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portada extends Model
{
    protected $table="portadas";
    protected $primaryKey="idPortada";
    public $timestamps=false;
    protected $fillable = [
        'imagen', 'inicial','intermedia','final','estado',
    ];
}
