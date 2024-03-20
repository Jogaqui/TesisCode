<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SGA_Matricula_Detalle extends Model
{
    protected $connection = 'mysql3';
    protected $table="sga_det_matricula";
    protected $primaryKey="dma_id";
    public $timestamps=false;
    protected $fillable = [];
    protected $guarded = [];
}
