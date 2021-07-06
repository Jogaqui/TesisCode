<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grados extends Model
{
    protected $table="grados";
    protected $primaryKey="idGrado";
    public $timestamps=false;
    protected $fillable = [
        'abreviatura','nombre','estado',
    ];
}
