<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SGA_Matricula extends Model
{
    protected $connection = 'mysql3';
    protected $table="sga_matricula";
    protected $primaryKey="mat_id";
    public $timestamps=false;
    protected $fillable = [];
    protected $guarded = [];
}
