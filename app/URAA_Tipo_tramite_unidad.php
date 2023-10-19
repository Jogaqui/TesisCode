<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class URAA_Tipo_tramite_unidad extends Model
{
    protected $connection = 'mysql2';
    protected $table="tipo_tramite_unidad";
    protected $primaryKey="idTipo_tramite_unidad";
    public $timestamps=false;
    protected $fillable = [];
    protected $guarded = [];
}
