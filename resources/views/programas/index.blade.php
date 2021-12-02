@extends('layouts.main', ['activePage' => 'programas', 'titlePage' => 'Listado de Programas'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <div class="card-tittle">Programas</div>
                        <p class="card-category">Listado de Programas</p>
                    </div>
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-right my-2">
                                <a href="{{ route('programas.registro') }}" class="btn btn-sm btn-primary">Nuevo Programa</a>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($programas as $programa)
                            <div class="col-md-3">
                                <div class="card card-user">
                                    <div class="card-header card-header-primary">
                                        <div class="card-tittle">{{$programa->nombre_programa}}</div>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">
                                            <div class="author">
                                                
                                                    <div class="col-md-12">
                                                        <img class="avatar border-gray mx-auto d-block" src="{{ asset('storage').'/'.$programa->imagen_programa}}" alt="...">
                                                        <h5 class="title">{{ $programa->nombre }}</h5>
                                                    </div>
                                                    
                                                    <h5 class="title">{{ $programa->nombre_programa }}</h5>
                                                
                                                <p class="description">
                                                    Descripcion: {{ $programa->descripcion_programa }}
                                                </p>
                                                <p class="description">
                                                    Dias de Emision:
                                                </p>
                                                <ul class="description">
                                                    @foreach ($programa->dias as $dias)
                                                        <li>
                                                        
                                                            {{ $dias->nombre }} <br> 
                                                            
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </p>
                                    </div>
                                    <div class="text-right mr-3 mb-3">
                                        <a href="{{route('programas.editar',$programa->id)}}" class="btn btn-sm btn-primary">Editar</a>
                                        <form action="{{route('programas.eliminar', $programa->id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            {{method_field('DELETE')}}  
                                            <button submit class="btn btn-sm btn-danger">Eliminar</button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection

