<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DIPLOMASAPP_Graduado extends Model
{
    protected $connection = 'mysql4';
    protected $table="graduado";
    protected $primaryKey="idgraduado";
    public $timestamps=false;
    protected $fillable = [];
    protected $guarded = [];
}
