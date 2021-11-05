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
            <div class="row">
              <label class="col-sm-2 col-form-label">Nombre Empresa</label>
              <div class="col-sm-4">
                <div class="form-group bmd-form-group is-filled">
                  {{$empresa->nombre_empresa}}
                </div>
              </div>
            </div>
            <div class="row">
              <label class="col-sm-2 col-form-label">Direccion</label>
              <div class="col-sm-4">
                <div class="form-group bmd-form-group is-filled">
                  {{$empresa->direccion}}
                </div>
              </div>
            </div> 
          </div>
          <div class="card-footer ml-auto mr-auto">
            <a href="{{route('empresa.editar', $usuario->id)}}" class="btn btn-primary">Modificar</a>
          </div>
        </div>

    </div>
</div>
@endsection