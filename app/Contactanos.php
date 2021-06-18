<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactanos extends Model
{
    protected $table="contactanos";
    protected $primaryKey="idContacto";
    public $timestamps=false;
    protected $fillable = [
        'correo', 'telefono', 'direccion', 'estado',
    ];
}
