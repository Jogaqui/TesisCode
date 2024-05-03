<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class URAA_Tipo_tramite extends Model
{
    protected $connection = 'mysql2';
    protected $table="tipo_tramite";
    protected $primaryKey="idTipo_tramite";
    public $timestamps=false;
    protected $fillable = [];
    protected $guarded = [];
}
