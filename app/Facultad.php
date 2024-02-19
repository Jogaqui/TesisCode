<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    protected $table="facultades";
    protected $primaryKey="idFacultad";
    public $timestamps=false;
    protected $fillable = [];
    protected $guarded = [];
}
