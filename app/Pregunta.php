<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
  protected $table="preguntas";
  protected $primaryKey="idPregunta";
  public $timestamps=false;
  protected $fillable = [
      'idUnidad', 'titulo','texto','fecha','creador','archivo','vistas','estado'
  ];
  public function unidad()
  {
      return $this->hasOne('App\Unidad','idUnidad','idUnidad');
  }
}
