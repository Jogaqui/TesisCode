<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubigeo_Departamento extends Model
{
    protected $table="ubigeo_peru_departments";
    protected $primaryKey="id";
    public $timestamps=false;
    protected $fillable = [];
    protected $guarded = [];
}
