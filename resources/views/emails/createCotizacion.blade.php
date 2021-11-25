@component('mail::message')
Hola {{$usuario->primer_nombre}} {{$usuario->apellido_paterno}} {{$usuario->apellido_materno}}
<br>
<p>Se ha generado una nueva Solicitud de Cotización de la Empresa {{$empresa}} por la Campaña {{$cotizacion->titulo}}</p>
<p>Para responder la Solicitud de Cotización haga click en el siguiente enlace:</p>

<a href="{{$url}}"> Click aqui </a>

<small>En caso de que no funcione, haga click en el siguiente enlace <a href="{{$url}}">{{$url}}</a></small>

@endcomponent