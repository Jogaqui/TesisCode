<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SUV_Persona extends Model
{
    protected $connection = 'pgsql';
    protected $table="sistema.persona";
    protected $primaryKey="idpersona";
    public $timestamps=false;
    protected $fillable = [];
    protected $guarded = [];
}
