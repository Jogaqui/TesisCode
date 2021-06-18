<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    protected $table="etiquetas";
    protected $primaryKey="idEtiqueta";
    public $timestamps=false;
    protected $fillable = [
        'descripcion', 'estado',
    ];
}
