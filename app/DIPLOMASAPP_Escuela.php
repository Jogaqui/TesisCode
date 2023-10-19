<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DIPLOMASAPP_Escuela extends Model
{
    protected $connection = 'mysql4';
    protected $table="escuela";
    protected $primaryKey="Cod_escuela";
    public $timestamps=false;
    protected $fillable = [];
    protected $guarded = [];
}
