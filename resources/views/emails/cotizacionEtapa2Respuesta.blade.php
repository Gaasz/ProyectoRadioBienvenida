
@component('mail::message')
Hola {{$usuario->primer_nombre}} {{$usuario->apellido_paterno}} {{$usuario->apellido_materno}}
<br>
<p>La Empresa {{$empresa}} ha subido la Orden de Compra de la Campaña {{$cotizacion->titulo}}</p>
<p>Para Aceptar la Orden de Compra y seguir con el proceso de Cotización haga click en el siguiente enlace:</p>

<a href="{{$url}}"> Click aqui </a>

<small>En caso de que no funcione, haga click en el siguiente enlace <a href="{{$url}}">{{$url}}</a></small>

@endcomponent