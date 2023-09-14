<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SUV_Estructura extends Model
{
    protected $connection = 'pgsql';
    protected $table="patrimonio.estructura";
    protected $primaryKey="idestructura";
    public $timestamps=false;
    protected $fillable = [];
    protected $guarded = [];
}
