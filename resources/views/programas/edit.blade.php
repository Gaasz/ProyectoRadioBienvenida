@extends('layouts.main', ['activePage' => 'programas', 'titlePage' => 'Crear Nuevo Programa'])
@section('css')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
@endsection
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('programas.actualizar', $programa->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    {{ method_field('PUT') }}
                            
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                            <div class="card col-sm-12 col-md-12 mx-auto">
                                                <div class="card-header card-header-primary">
                                                    <h4 class="card-title">Editar {{$programa->nombre_programa}}</h4>
                                                    <p class="card-category">Edite los Datos del Programa</p>
                                                </div>
                                                <div class="card-body">
                                                    <div class="author mb-3">
                                                        <div class="col-md-12">
                                                            <img class="avatar border-gray mx-auto d-block" src="{{ asset('storage').'/'.$programa->imagen_programa}}" alt="..." id="preview-image">
                                                            <h5 class="title">{{ $programa->nombre }}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <label for="primerNombre" class="col-sm-2 col-form-label">Nombre del Programa</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" name="nombreDelPrograma" value={{$programa->nombre_programa}} autofocus>
                                                            <span style="color:red"><small>@error('nombreDelPrograma'){{$message}}@enderror</small></span>
                    
                                                        </div>
                                                        <label for="imagen" class="col-sm-2 col-form-label">Imagen</label>
                                                        <div class="col-sm-4">
                                                           
                                                               <input type="file" class="form-control" name="imagen" id="imagen">
                                                                
                                                           
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="row mt-3">
                                                        <label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <textarea class="form-control" name="descripcion" rows="3">{{$programa->descripcion_programa}}</textarea>
                                                              </div>
                                                            <span style="color: red"><small>@error('descripcion'){{$message}}@enderror</small></span>
                    
                                                        </div>
                    
                                                        <label for="diasDeEmision" class="col-sm-2 form-check-label mb-2">Dias de Emisión</label>
                                                        <div class="col-sm-4">
                                                            <div class="row">
                                                                
                                                                
                                                                @foreach($dias as $dia) 
                                                                    <div class="col-md-6 col-sm-6 text-left">
                                                                        <div class="checkbox">
                                                                            <label>
                                                                                <input name="dias[]" value="{{$dia->id}}" type="checkbox" class="form-check-input" 
                                                                                @foreach ($programa->dias as $semana)
                                                                                    @if ($semana->id == $dia->id)
                                                                                    checked
                                                                                    @endif
                                                                                @endforeach>
                                                                                {{$dia->nombre}}
                                                                            </label>
                                                                        </div>  
                                                                    </div>
                                                                @endforeach
                                                                
                                                            </div>
                                                            <span style="color: red"><small>@error('dias'){{$message}}@enderror</small></span>
                    
                                                        </div>
                                                    </div>
                    
                                                    {{-- <div class="row mt-3">
                                                        <label for="horarios" class="col-sm-2 col-form-label">Horarios</label>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <ul>
                                                                    @foreach ($dias as $dia)
                                                                        <div id="{{$dia->nombre}}Oculto" class="{{$dia->nombre}}Oculto" style="display:none">
                                                                            <div class="row">
                                                                                <li>{{$dia->nombre}}</li>
                                                                            </div>
                                                                           
                                                                                <div class="row">
                                                                                    <div>
                                                                                        <div class="form-group">
                                                                                            <input type="hour" class="form-control timepicker" id="inicio{{$dia->nombre}}" name="{{$dia->nombre}}_inicio" placeholder="Hora Inicio">
                                                                                        </div>
                                                                                    </div>
                                                                                    &nbsp;
                                                                                    <div>
                                                                                        <div class="form-group">
                                                                                            <input type="hour" class="timepicker form-control" id="fin{{$dia->nombre}}" name="{{$dia->nombre}}_fin" placeholder="Hora Fin" disabled >
                                                                                        </div>
                                                                                    </div>
                                                                                    &nbsp;
                                                                                    
                                                                                        boton agregar horario
                                                                                        <div>
                                                                                            <div class="form-group my-auto">
                                                                                                <button type="button" class="btn btn-primary btn-sm" id="{{$dia->nombre}}Add">
                                                                                                    <span class="material-icons">
                                                                                                        add_circle
                                                                                                    </span>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    
                                                                                      
                                                                                </div>  
                    
                                                                                <div>
                                                                                    <div class="row" id="eliminar{{$dia->nombre}}Oculto1" style="display: none">
                                                                                        <div>
                                                                                            <div class="form-group">
                                                                                                <input type="text" class="form-control timepicker" id="inicio{{$dia->nombre}}1" name="{{$dia->nombre}}_inicio1" placeholder="Hora Inicio">
                                                                                            </div>
                                                                                        </div>
                                                                                        &nbsp;
                                                                                        <div>
                                                                                            <div class="form-group">
                                                                                                <input disabled type="text"  class="timepicker form-control" id="fin{{$dia->nombre}}1" name="{{$dia->nombre}}_fin1" placeholder="Hora Fin">
                                                                                            </div>
                                                                                        </div>
                                                                                        &nbsp;
                                                                                        
                                                                                           
                                                                                        boton elimiar horario
                    
                                                                                            <div>
                                                                                                <div class="form-group my-auto">
                                                                                                    <button type="button" class="btn btn-danger btn-sm" id="{{$dia->nombre}}Remove">
                                                                                                        <span class="material-icons">
                                                                                                            remove
                                                                                                        </span>
                                                                                                    </button>
                                                                                                </div>
                                                                                            </div>
                                                                                        
                                                                                    </div>  
                                                                                    <div class="row"><span id="alerta2" style="color:red; display:none"><small>error</small></span></div>
                    
                                                                                    <div class="row" id="eliminar{{$dia->nombre}}Oculto2" style="display: none">
                                                                                        <div>
                                                                                            <div class="form-group">
                                                                                                <input type="text" class="form-control timepicker" id="inicio{{$dia->nombre}}2" name="{{$dia->nombre}}_inicio2" placeholder="Hora Inicio">
                                                                                            </div>
                                                                                        </div>
                                                                                        &nbsp;
                                                                                        <div>
                                                                                            <div class="form-group">
                                                                                                <input disabled class="timepicker form-control" id="fin{{$dia->nombre}}2" name="{{$dia->nombre}}_fin2" placeholder="Hora Fin">
                                                                                            </div>
                                                                                        </div>
                                                                                        &nbsp;
                                                                                        
                                                                                            
                                                                                        
                                                                                           boton elimiar horario
                                                                                           <div>
                                                                                            <div class="form-group my-auto">
                                                                                                <button type="button" class="btn btn-danger btn-sm" id="{{$dia->nombre}}Remove">
                                                                                                    <span class="material-icons">
                                                                                                        remove
                                                                                                    </span>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div> 
                                                                                    <div class="row"><span id="alerta3" style="color:red; display:none"><small>error</small></span></div>
                    
                                                                                </div>
                                                                        </div>  
                                                                    @endforeach
                                                                </ul>           
                                                            </div>
                                                                    
                                                                
                                                        </div>
                                                    </div> --}}
                                                </div>
                                                <div class="card-footer ml-auto mr-auto">
                                                    <button type="submit" class="btn btn-primary">Crear</button>
                                                </div>
                                            </div>
                                                
                                               
                                                
                    
                                                
                                
                                </div>
                            </div>    
                        </div>    
                    </div>

                            
                        
                </form>
            </div>
        </div>    
    </div>    
</div>


@section('js')
<script>
    $('#imagen').change(function(){
           
        let reader = new FileReader();
        reader.onload = (e) => { 
            $('#preview-image').attr('src', e.target.result); 
        }
        reader.readAsDataURL(this.files[0]); 
    
    });
</script>
@endsection

@endsection
