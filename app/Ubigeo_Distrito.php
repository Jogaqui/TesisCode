<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubigeo_Distrito extends Model
{
    protected $table="ubigeo_peru_districts";
    protected $primaryKey="id";
    public $timestamps=false;
    protected $fillable = [];
    protected $guarded = [];
}
