<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CotizacionEtapa1Respuesta extends Mailable
{
    use Queueable, SerializesModels;

    public $cotizacion;
    public $usuario;
    public $empresa;
    public $textSubject;
    public $textMessage;
    public $url;
    

    /**
     * Create a new message instance.
     *
     *
     */
    public function __construct(object $cotizacion, object $usuario, object $empresa, $url)
    {
     
        $this->cotizacion = $cotizacion;
        $this->usuario = $usuario;
        $this->empresa = $empresa;
        $this->url = $url;
    
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Nueva Respuesta a su Solicitud de Cotizacion - ".config('app.name'))->markdown('emails.cotizacionEtapa1Respuesta');
    }
}
