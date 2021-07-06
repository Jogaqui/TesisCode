<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

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
      $subject = 'RESPUESTA A LA CONSULTA N° '.$this->nro_consulta;
      return  $this->from($this->emisor, 'UNIDAD DE REGISTRO ACADÉMICO ADMINISTRATIVO')->subject($subject)->view('mails.RespuestaEnviada');
    }
}
