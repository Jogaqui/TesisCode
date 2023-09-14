<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SGA_Semestre extends Model
{
    protected $connection = 'mysql3';
    protected $table="sga_anio";
    protected $primaryKey="ani_id";
    public $timestamps=false;
    protected $fillable = [];
    protected $guarded = [];
}
