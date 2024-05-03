<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Multimedia extends Model
{
    protected $table="tipo_multimedia";
    protected $primaryKey="idTipo_multimedia";
    public $timestamps=false;
    protected $fillable = [];
   
}
