<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SUV_Semestre extends Model
{
    protected $connection = 'pgsql';
    protected $table="planificacion.periodo";
    protected $primaryKey="idperiodo";
    public $timestamps=false;
    protected $fillable = [];
    protected $guarded = [];
}
