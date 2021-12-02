@php
if($usuario->id == session()->get('id')){
$activePage = 'profile';
$titlePage = 'Detalles de mi Cuenta';}
else{
$activePage = 'user';
$titlePage = 'Detalles del Usuario';}
@endphp

@extends('layouts.main', ['activePage' => $activePage , 'titlePage' => $titlePage])
@section('content')

<div class="content col-md-10 mx-auto">
    <div class="container-fluid">
        
        <div class="card mt-2">
          <div class="card-header card-header-primary">
            <h4 class="card-title"><span class="material-icons">
              business
              </span><b> Empresa</b></h4>
            <p class="card-category">Información de Empresa</p>
          </div>
          <div class="card-body ">
            <form action="{{route('empresas.actualizar',$usuario->id)}}" method="POST">
              @csrf
              {{method_field('PUT')}}
              <div class="row">
                <label class="col-sm-2 col-form-label">Nombre Empresa</label>
                <div class="col-sm-4">
                  <div class="form-group bmd-form-group is-filled">
                    <input name="nombreEmpresa" type="text" class="form-control" value="{{$empresa->nombre_empresa}}" required autofocus>
                    <span style="color:red"><small>@error('nombreEmpresa'){{$message}}@enderror</small></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">Direccion</label>
                <div class="col-sm-4">
                  <div class="form-group bmd-form-group is-filled">
                    <input name="direccion" type="text" class="form-control" value="{{$empresa->direccion}}" required>
                    <span style="color:red"><small>@error('direccion'){{$message}}@enderror</small></span>

                  </div>
                </div>
              </div> 
           
          </div>
          <div class="card-footer ml-auto mr-auto">
            <button type="submit" class="btn btn-primary">Modificar</button>
          </div>
         </form>
         
        </div>
        <div class="text-left" >
          <a href="{{ route('usuarios.editar', $usuario->id) }}" class="text-light">
              <small style="color:orange">{{ __('¿Quieres cambiar información del usuario o cambiar contraseña? ¡Click Aquí!') }}</small>
          </a>
        </div> 
    </div>
</div>
@endsection