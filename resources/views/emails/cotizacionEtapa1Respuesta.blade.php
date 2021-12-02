@component('mail::message')
Hola {{$usuario->primer_nombre}} {{$usuario->apellido_paterno}} {{$usuario->apellido_materno}}
<br>
<<<<<<< HEAD
<p>Se ha se ha respondido a su Solicitud de Cotización de la Campaña: {{$cotizacion->titulo}}</p>
<p>Para responder y seguir con el proceso de Cotización haga click en el siguiente enlace:</p>

<a href="{{$url}}"> Click Aquí </a>
=======
<p>Se ha se ha respondido a tu Solicitud de Cotización de la Campaña: {{$cotizacion->titulo}}</p>
<p>Para responder y seguir con el proceso de Cotización haga click en el siguiente enlace:</p>

<a href="{{$url}}"> Click aqui </a>
>>>>>>> 01fa2ca914a289a145b5ee0fc2b793feaecc94a0

<small>En caso de que no funcione, haga click en el siguiente enlace <a href="{{$url}}">{{$url}}</a></small>

@endcomponent