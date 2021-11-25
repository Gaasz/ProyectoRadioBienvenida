<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CreateCotizacion extends Mailable
{
    use Queueable, SerializesModels;
    public $cotizacion;
    public $usuario;
    public $textSubject;
    public $textMessage;
    public $empresa;
    public $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(object $usuario, string $empresa, $url, object $cotizacion)
    {   
        $this->cotizacion = $cotizacion;
        $this->url = $url;
        $this->usuario = $usuario;
       
        $this->empresa = $empresa;
    
     
    }
   

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject("Nueva Solicitud de Cotización - ".config('app.name'))->markdown('emails.createCotizacion');
        }
            
}
