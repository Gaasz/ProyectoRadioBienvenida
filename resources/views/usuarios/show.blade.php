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
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title"><span class="material-icons">
              person
              </span><b> Usuario</b></h4>
            <p class="card-category">Información de Usuario</p>
          </div>
          <div class="card-body ">
            @if(session('success'))
              <div class="alert alert-success" role="success">
                  {{ session('success') }}
              </div>
            @endif

            @if(session('successContraseña'))
              <div class="alert alert-success" role="success">
                  {{ session('successContraseña') }}
              </div>
            @endif

            <div class="row">
              <label class="col-sm-2 col-form-label">Primer Nombre</label>
              <div class="col-sm-4">
                <div class="form-group bmd-form-group is-filled">
                  {{$usuario->primer_nombre}}
                </div>
              </div>
              <label class="col-sm-2 col-form-label">Segundo Nombre</label>
              <div class="col-sm-4">
                <div class="form-group bmd-form-group is-filled">
                  {{$usuario->segundo_nombre}}
                </div>
              </div>
            </div>
            
 
            <div class="row">
              <label class="col-sm-2 col-form-label">Apellido Paterno</label>
              <div class="col-sm-4">
                <div class="form-group bmd-form-group is-filled">
                  {{$usuario->apellido_paterno}}
                </div>
              </div>
              <label class="col-sm-2 col-form-label">Apellido Materno</label>
              <div class="col-sm-4">
                <div class="form-group bmd-form-group is-filled">
                  {{$usuario->apellido_materno}}
                </div>
              </div>
            </div>
            <div class="row">
              <label class="col-sm-2 col-form-label">Numero de Telefono</label>
              <div class="col-sm-4">
                <div class="form-group bmd-form-group is-filled">
                  {{$usuario->telefono}}
                </div>
              </div>
              <label class="col-sm-2 col-form-label">Correo Electronico</label>
              <div class="col-sm-4">
                <div class="form-group bmd-form-group is-filled">
                  {{$usuario->email}}
                </div>
              </div>
            </div>
          </div>
          @if($usuario->id == session()->get('id') || session()->get('rol') == 1)

          <div class="card-footer ml-auto mr-auto">
            <a href={{route('usuarios.editar', $usuario->id)}} class="btn btn-primary">Modificar</a>
          </div>
         @endif
        </div>
        &nbsp;
        <div class="card mt-2">
          <div class="card-header card-header-primary">
            <h4 class="card-title"><span class="material-icons">
              business
              </span><b> Empresa</b></h4>
            <p class="card-category">Información de Empresa</p>
          </div>
          <div class="card-body ">
            @if(session('successEmpresa'))
            <div class="alert alert-success" role="success">
                {{ session('successEmpresa') }}
            </div>
            @endif
            <div class="row">
              <label class="col-sm-2 col-form-label">Nombre Empresa</label>
              <div class="col-sm-4">
                <div class="form-group bmd-form-group is-filled">
                  {{$usuario->empresa->nombre_empresa}}
                </div>
              </div>
            </div>
            <div class="row">
              <label class="col-sm-2 col-form-label">Direccion</label>
              <div class="col-sm-4">
                <div class="form-group bmd-form-group is-filled">
                  {{$usuario->empresa->direccion}}
                </div>
              </div>
            </div> 
          </div>
          @if($usuario->id == session()->get('id') || session()->get('rol')==1)
          <div class="card-footer ml-auto mr-auto">
            <a href="{{route('empresas.editar', $usuario->id)}}" class="btn btn-primary">Modificar</a>
          </div>
          @endif
        </div>

    </div>
</div>
@endsection