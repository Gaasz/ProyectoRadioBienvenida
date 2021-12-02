@extends('layouts.main', ['activePage' => 'rubros', 'titlePage' => 'Nuevo Rubro de Empresa'])

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('rubros.guardar') }}" method="post" class="form-horizontal">
                    @csrf
                        <div class="card col-sm-12 col-md-10 mx-auto">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Crear Nuevo Rubro de Empresa</h4>
                                <p class="card-category">Ingrese el Rubro</p>
                            </div>
                            <div class="card-body">
                                <div class="row mt-3">
                                    <label for="primerNombre" class="col-sm-2 col-form-label">Nombre Rubro</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="nombre" placeholder="Ingresa el Nombre del Rubro..." autofocus value="{{@old('nombre')}}">
                                        <span style="color:red"><small>@error('nombre'){{$message}}@enderror</small></span>
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