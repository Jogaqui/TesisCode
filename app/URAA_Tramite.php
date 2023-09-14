<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class URAA_Tramite extends Model
{
    protected $connection = 'mysql2';
    protected $table="tramite";
    protected $primaryKey="idTramite";
    public $timestamps=false;
    protected $fillable = [];
    protected $guarded = [];
}
