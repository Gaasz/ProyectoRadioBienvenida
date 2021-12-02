<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CotizacionEtapa3Respuesta extends Mailable
{
    use Queueable, SerializesModels;

<<<<<<< HEAD

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
        // $this->textSubject = 'Se ha Aceptado su Orden de Compra para la Campaña '.$cotizacion->titulo.'.';
        // $this->textMessage = 'Se ha enviado una cotización de servicio a su correo';
        $this->empresa = $empresa;
        $this->url = $url;
=======
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
>>>>>>> 01fa2ca914a289a145b5ee0fc2b793feaecc94a0
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
<<<<<<< HEAD
        return $this
        ->subject("Se ha Aceptado su Orden de Compra - ".config('app.name'))->markdown('emails.cotizacionEtapa3Respuesta');
=======
        return $this->view('view.name');
>>>>>>> 01fa2ca914a289a145b5ee0fc2b793feaecc94a0
    }
}
