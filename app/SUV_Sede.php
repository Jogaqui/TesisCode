<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SUV_Sede extends Model
{
    protected $connection = 'pgsql';
    protected $table="patrimonio.sede";
    protected $primaryKey="idsede";
    public $timestamps=false;
    protected $fillable = [];
    protected $guarded = [];
}
