<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;

class MensajeRespuesta extends Mailable
{
    use Queueable, SerializesModels;
    public $emisor, $nro_consulta, $consulta, $respuesta;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emisor, $nro_consulta, $consulta, $respuesta)
    {
      $this->emisor = $emisor;
      $this->nro_consulta = $nro_consulta;
      $this->consulta = $consulta;
      $this->respuesta = $respuesta;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $anio_string = Carbon::now();
      $anio_string = $anio_string->format('Y-m-d');

      $subject = 'URA - RESPUESTA CONSULTA N° '.$this->nro_consulta;
      return  $this->from($this->emisor, 'UNIDAD DE REGISTROS ACADÉMICOS (URA)')->subject($subject)->view('mails.RespuestaEnviada', compact('anio_string'));
    }
}
