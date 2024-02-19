<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    protected $table="periodos";
    protected $primaryKey="idPeriodo";
    public $timestamps=false;
    protected $fillable = [];
    protected $guarded = [];
}
