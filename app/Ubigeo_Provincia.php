<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubigeo_Provincia extends Model
{
    protected $table="ubigeo_peru_provinces";
    protected $primaryKey="id";
    public $timestamps=false;
    protected $fillable = [];
    protected $guarded = [];
}
