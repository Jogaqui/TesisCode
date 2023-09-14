<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SGA_Sede extends Model
{
    protected $connection = 'mysql3';
    protected $table="sga_sede";
    protected $primaryKey="sede_id";
    public $timestamps=false;
    protected $fillable = [];
    protected $guarded = [];
}
