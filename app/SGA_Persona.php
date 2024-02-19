<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SGA_Persona extends Model
{
    protected $connection = 'mysql3';
    protected $table="persona";
    protected $primaryKey="per_id";
    public $timestamps=false;
    protected $fillable = [];
    protected $guarded = [];
}
