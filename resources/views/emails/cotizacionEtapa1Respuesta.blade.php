@component('mail::message')
Hola {{$usuario->primer_nombre}} {{$usuario->apellido_paterno}} {{$usuario->apellido_materno}}
<br>
<p>Se ha se ha respondido a su Solicitud de Cotización de la Campaña: {{$cotizacion->titulo}}</p>
<p>Para responder y seguir con el proceso de Cotización haga click en el siguiente enlace:</p>

<a href="{{$url}}"> Click Aquí </a>

<small>En caso de que no funcione, haga click en el siguiente enlace <a href="{{$url}}">{{$url}}</a></small>

@endcomponent