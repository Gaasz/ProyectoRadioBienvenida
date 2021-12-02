<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CotizacionEtapa2Respuesta extends Mailable
{
    use Queueable, SerializesModels;

    public $cotizacion;
    public $usuario;
    public $textSubject;
    public $textMessage;
    public $empresa;
    public $url;
    
    
    public function __construct(object $usuario, string $empresa, $url, object $cotizacion)
    
    {
        $this->cotizacion = $cotizacion;
        $this->usuario = $usuario;
        $this->empresa = $empresa;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject("Se ha recibido una Orden de Compra - ".config('app.name'))->markdown('emails.cotizacionEtapa2Respuesta');
    }
    
}
