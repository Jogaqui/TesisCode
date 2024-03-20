<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DIPLOMASAPP_Diploma extends Model
{
    protected $connection = 'mysql4';
    protected $table="diplomas";
    protected $primaryKey="Cod_diploma";
    public $timestamps=false;
    protected $fillable = [];
    protected $guarded = [];
}
