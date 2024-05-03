<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    protected $table="multimedia";
    protected $primaryKey="idMultimedia";
    public $timestamps=false;
    protected $fillable = [];
   
}
