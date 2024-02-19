<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SGA_Perfil extends Model
{
    protected $connection = 'mysql3';
    protected $table="perfil";
    protected $primaryKey="pfl_id";
    public $timestamps=false;
    protected $fillable = [];
    protected $guarded = [];
}
