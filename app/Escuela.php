<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    protected $table="escuelas";
    protected $primaryKey="idEscuela";
    public $timestamps=false;
    protected $fillable = [];
    protected $guarded = [];
}
