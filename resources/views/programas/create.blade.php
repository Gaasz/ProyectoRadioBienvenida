@extends('layouts.main', ['activePage' => 'programas', 'titlePage' => 'Crear Nuevo Programa'])
@section('css')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
@endsection
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('programas.guardar') }}" method="post" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                        <div class="card col-sm-12 col-md-12 mx-auto">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Crear Nuevo Programa</h4>
                                <p class="card-category">Ingresar Datos del Programa</p>
                            </div>
                            <div class="card-body">
                                <div class="author mb-3">
                                    <div class="col-md-12">
                                        <img class="avatar border-gray mx-auto d-block"  src="{{ asset('img/default.png')}}" alt="..."id="preview-image">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="primerNombre" class="col-sm-2 col-form-label">Nombre del Programa</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="nombreDelPrograma" placeholder="Ingresa el Nombre del Programa..." autofocus>
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
                                            <textarea class="form-control" name="descripcion" rows="3"></textarea>
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
                                                            @if(is_array(old('dias')) && in_array($dia->id, old('dias'))) checked @endif>
                                                            {{$dia->nombre}}
                                                        </label>
                                                        
                                                    </div> 
                                                    <div id="diaOculto{{$dia->id}}" style="display:none">
                                                       <div class="row">
                                                            
                                                            <div class="mx-auto">
                                                                <small>Ingrese Horario de Inicio para {{$dia->nombre}}</small> 
                                                                <input name="inicio{{$dia->id}}" id="inicio{{$dia->id}}" readyonly class="timepicker form-control text-center">
                                                            </div>
                                                       </div>
                                                        <div class="row">
                                                            
                                                            <div class="mx-auto">
                                                                <small>Ingrese Horario de Termino para {{$dia->nombre}}</small> 
                                                                <input name="fin{{$dia->id}}" id="fin{{$dia->id}}" readyonly class="timepicker form-control text-center"> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            
                                        </div>
                                        <span style="color: red"><small>@error('dias'){{$message}}@enderror</small></span>

                                    </div>
                                </div>

                              
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">Crear</button>
                            </div>
                        </div>
                            
                           
                            

                            
                        
                </form>
            </div>
        </div>    
    </div>    
</div>



@section('js')



<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<script>

    $(document).ready(function(){
        $('.timepicker').timepicker({
        timeFormat: 'HH:mm',
        interval: 60,
        minTime: '00:00',
        maxTime: '23:59',
        defaultTime: '00:00',
        startTime: '00:00',
        dynamic: false,
        dropdown: true,
        scrollbar: true
    });
    });

    $(document).ready(function(){
        //cuando se selecione input checkbox dia mostrar diaOculto
        $('input[type=checkbox]').click(function(){
            var id = $(this).attr('value');
            console.log(id);
            if($(this).is(':checked')){
                $('#diaOculto'+id).show('slow');
               
            }else{
                $('#diaOculto'+id).hide('slow');
                //vaciar inicioid finid
                $('#inicio'+id).val('');
                $('#fin'+id).val('');

            }
        });
        
    });

    
   

   
</script>




@endsection
@endsection
