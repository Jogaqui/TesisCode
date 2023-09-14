<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SGA_Dependencia extends Model
{
    protected $connection = 'mysql3';
    protected $table="dependencia";
    protected $primaryKey="dep_id";
    public $timestamps=false;
    protected $fillable = [];
    protected $guarded = [];
}
