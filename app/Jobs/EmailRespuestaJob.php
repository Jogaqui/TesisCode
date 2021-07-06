<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\MensajeRespuesta;

class EmailRespuestaJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $correoEmisor, $correoReceptor, $nro_consulta, $consulta, $respuesta;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($correoEmisor, $correoReceptor, $nro_consulta, $consulta, $respuesta)
    {
        $this->correoEmisor = $correoEmisor;
        $this->correoReceptor = $correoReceptor;
        $this->nro_consulta = $nro_consulta;
        $this->consulta = $consulta;
        $this->respuesta = $respuesta;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      Mail::to($this->correoReceptor)->send(new MensajeRespuesta($this->correoEmisor, $this->nro_consulta, $this->consulta, $this->respuesta));
    }
}
