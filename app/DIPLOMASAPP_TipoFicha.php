<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DIPLOMASAPP_TipoFicha extends Model
{
    protected $connection = 'mysql4';
    protected $table="tipoficha";
    protected $primaryKey="Tip_ficha";
    public $timestamps=false;
    protected $fillable = [];
    protected $guarded = [];
}
