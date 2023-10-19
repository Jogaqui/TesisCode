<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class URAA_Dependencia extends Model
{
    protected $connection = 'mysql2';
    protected $table="dependencia";
    protected $primaryKey="idDependencia";
    public $timestamps=false;
    protected $fillable = [];
    protected $guarded = [];
}
