<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DIPLOMASAPP_Graduado_duplicado extends Model
{
    protected $connection = 'mysql4';
    protected $table="graduado_duplicado";
    protected $primaryKey="idgraduado_duplicado";
    public $timestamps=false;
    protected $fillable = [];
    protected $guarded = [];
}
