<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $table="publicaciones";
    protected $primaryKey="idPublicacion";
    public $timestamps=false;
    protected $fillable = [
        'imagen', 'titulo','fecha','creador','texto','archivo','estado',
    ];
}
