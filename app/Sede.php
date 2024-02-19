<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    protected $table="sedes";
    protected $primaryKey="idSede";
    public $timestamps=false;
    protected $fillable = [];
    protected $guarded = [];
}
