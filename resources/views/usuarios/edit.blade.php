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
              </span><b> Editar Perfil</b></h4>
            <p class="card-category">Información de Usuario</p>
          </div>
          <div class="card-body ">
            <form action="{{route('usuarios.actualizar',$usuario->id)}}" method="POST">
                {{method_field('PUT')}}
             
                @csrf
                <div class="row">
                    <label class="col-sm-2 col-form-label">Primer Nombre</label>
                    <div class="col-sm-4">
                      <div class="form-group bmd-form-group is-filled">
                        <input type="text" name="primerNombre" value="{{$usuario->primer_nombre}}" class="form-control">
                        <span style="color:red"><small>@error('primerNombre'){{$message}}@enderror</small></span>
                      </div>
                    </div>
                    <label class="col-sm-2 col-form-label">Segundo Nombre</label>
                    <div class="col-sm-4">
                      <div class="form-group bmd-form-group is-filled">
                          <input type="text" name="segundoNombre" value="{{$usuario->segundo_nombre}}" class="form-control">
                          <span style="color:red"><small>@error('segundoNombre'){{$message}}@enderror</small></span>
                      </div>
                    </div>
                  </div>
                  
       
                  <div class="row">
                    <label class="col-sm-2 col-form-label">Apellido Paterno</label>
                    <div class="col-sm-4">
                      <div class="form-group bmd-form-group is-filled">
                          <input type="text" name="apellidoPaterno" value="{{$usuario->apellido_paterno}}" class="form-control">
      
                          <span style="color:red"><small>@error('apellidoPaterno'){{$message}}@enderror</small></span>

                      </div>
                    </div>
                    <label class="col-sm-2 col-form-label">Apellido Materno</label>
                    <div class="col-sm-4">
                      <div class="form-group bmd-form-group is-filled">
                          <input type="text" name="apellidoMaterno" value="{{$usuario->apellido_materno}}" class="form-control">
      
                          <span style="color:red"><small>@error('apellidoMaterno'){{$message}}@enderror</small></span>

                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">Numero de Telefono</label>
                    <div class="col-sm-4">
                      <div class="form-group bmd-form-group is-filled">
                          <input type="text" name="telefono" value="{{$usuario->telefono}}" class="form-control">
                          <span style="color:red"><small>@error('telefono'){{$message}}@enderror</small></span>

                          
                      </div>
                    </div>
                    <label class="col-sm-2 col-form-label">Correo Electronico</label>
                    <div class="col-sm-4">
                      <div class="form-group bmd-form-group is-filled">
                          <input type="text" name="email" value="{{$usuario->email}}" class="form-control">  
                          <span style="color:red"><small>@error('email'){{$message}}@enderror</small></span>
              
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
          <a href="{{ route('empresas.editar', $usuario->id) }}" class="text-light">
              <small style="color:orange">{{ __('¿Quieres cambiar información de la Empresa? ¡Click Aquí!') }}</small>
          </a>
        </div> 
        &nbsp;
        
         <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title"><span class="material-icons">
              lock
              </span><b> Cambiar Contraseña</b></h4>
          </div>
          <div class="card-body ">
            <form action="{{route('usuarios.actualizarcontraseña',$usuario->id)}}" method="POST">
                {{method_field('PUT')}}
                @csrf
                <div class="row">
                    <label class="col-sm-2 col-form-label">Contraseña Actual</label>
                    <div class="col-sm-4">
                      <div class="form-group bmd-form-group is-filled">
                        <input required class="form-control" type="password" name="contraseñaActual" required>
                      </div>
                      <span style="color:red"><small>@error('contraseña'){{$message}}@enderror</small></span>
      
                    </div>
                  </div>
                  <div class="row">
                      <label class="col-sm-2 col-form-label">Nueva Contraseña</label>
                      <div class="col-sm-4">
                          <div class="form-group bmd-form-group is-filled">
                              <input class="form-control" type="password" name="nuevaContraseña" required>
                          </div>
                          <span style="color:red"><small>@error('nuevaContraseña'){{$message}}@enderror</small></span>
      
                      </div>
                    </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">Direccion</label>
                    <div class="col-sm-4">
                      <div class="form-group bmd-form-group is-filled">
                          <input class="form-control"type="password" name="nuevaContraseña_confirmation" required>
                        </div>
                    </div>
                  </div> 
            
          </div>

          <div class="card-footer ml-auto mr-auto">
            <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
          </div>
        </form>
        </div>
        

          
    </div>
</div>
@endsection