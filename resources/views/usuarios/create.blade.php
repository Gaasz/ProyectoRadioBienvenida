@extends('layouts.main', ['activePage' => 'usuarios', 'titlePage' => 'Nuevo Trabajador Radial'])

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('trabajador.guardar') }}" method="post" class="form-horizontal">
                    @csrf
                        <div class="card col-sm-12 col-md-10 mx-auto">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Crear Nuevo Trabajador Radial</h4>
                                <p class="card-category">Ingresar Datos</p>
                            </div>
                            <div class="card-body">
                                <div class="row mt-3">
                                    <label for="primerNombre" class="col-sm-2 col-form-label">Primer Nombre</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="primerNombre" placeholder="Ingresa el Primer Nombre..." autofocus >
                                        <span style="color:red"><small>@error('primerNombre'){{$message}}@enderror</small></span>

                                    </div>
                                    <label for="segundoNombre" class="col-sm-2 col-form-label">Segundo Nombre</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="segundoNombre" placeholder="Ingresa el Segundo Nombre..." >
                                        <span style="color: red"><small>@error('segundoNombre'){{$message}}@enderror</small></span>

                                    </div>
                                </div>
                                
                                
                                <div class="row mt-3">
                                    <label for="apellidoPaterno" class="col-sm-2 col-form-label">Apellido Paterno</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="apellidoPaterno" placeholder="Ingresa el Apellido Paterno..." >
                                        <span style="color: red"><small>@error('apellidoPaterno'){{$message}}@enderror</small></span>

                                    </div>
                                    <label for="apellidoMaterno" class="col-sm-2 col-form-label">Apellido Materno</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="apellidoMaterno" placeholder="Ingresa el Apellido Materno..." >
                                        <span style="color: red"><small>@error('apellidoMaterno'){{$message}}@enderror</small></span>

                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="correo" class="col-sm-2 col-form-label">Correo Electrónico</label>
                                    <div class="col-sm-4">
                                        <input type="email" class="form-control" name="email" placeholder="Ingresa el Correo Electrónico..." >
                                        <span style="color: red"><small>@error('email'){{$message}}@enderror</small></span>

                                    </div>
                                    <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="telefono" placeholder="Ingresa el Numero de Telefono..." >
                                        <span style="color: red"><small>@error('telefono'){{$message}}@enderror</small></span>

                                    </div>
                                </div>
                                
                                <div class="row mt-3">
                                    <label for="contraseña" class="col-sm-2 col-form-label">Contraseña</label>
                                    <div class="col-sm-4">
                                        <input type="password" class="form-control" name="contraseña" placeholder="Ingresa la Contraseña..." >
                                        <span style="color: red"><small>@error('contraseña'){{$message}}@enderror</small></span>

                                    </div>
                                    <label for="contraseña" class="col-sm-2 col-form-label">Confirme Contraseña</label>
                                    <div class="col-sm-4">
                                        <input type="password" class="form-control" name="contraseña_confirmation" placeholder="Confirme la Contraseña..." >
                                    </div>
                                </div>
                                
                            </div>

                            <div class="card-footer ml-auto mr-auto">
                                <button class="btn btn-primary">Crear</button>
                            </div>
                        </div>
                </form>
            </div>    
        </div>    
    </div>
</div>

@endsection