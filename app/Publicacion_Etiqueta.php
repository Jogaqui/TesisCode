<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacion_Etiqueta extends Model
{
    protected $table="publicacion_etiqueta";
    protected $primaryKey="id";
    public $timestamps=false;
    protected $fillable = [
        'idPublicacion', 'idEtiqueta',
    ];
    public function Publicacion()
    {
        return $this->hasOne('App\Publicacion','idPublicacion','idPublicacion');
    }
    public function Etiqueta()
    {
        return $this->hasOne('App\Etiqueta','idEtiqueta','idEtiqueta');
    }

}
