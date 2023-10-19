<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DIPLOMASAPP_Facultad extends Model
{
    protected $connection = 'mysql4';
    protected $table="facultad";
    protected $primaryKey="Cod_facultad";
    public $timestamps=false;
    protected $fillable = [];
    protected $guarded = [];
}
