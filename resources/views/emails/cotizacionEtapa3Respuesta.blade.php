
@component('mail::message')
Hola {{$usuario->primer_nombre}} {{$usuario->apellido_paterno}} {{$usuario->apellido_materno}}
<br>
<p>Se ha aceptado su Orden de Compra para la Campaña: {{$cotizacion->titulo}}.</p>
<p>Además se han subido los horarios que Radio Bienvenida le ha otorgado</p>
<p>Para Aceptar los Horarios y seguir con el proceso de Cotización haga click en el siguiente enlace:</p>

<a href="{{$url}}"> Click Aquí </a>

<small>En caso de que no funcione, haga click en el siguiente enlace <a href="{{$url}}">{{$url}}</a></small>

@endcomponent