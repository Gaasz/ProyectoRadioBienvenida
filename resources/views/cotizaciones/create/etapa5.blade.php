@extends('layouts.main', ['activePage' => 'cotizaciones', 'titlePage' => 'Subir Archivos'])

@section('css')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
@endsection
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-10 mx-auto">
                <form action="{{ route('cotizaciones.guardar2', $cotizacion->id_cotizacion) }}" method="post" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    @foreach($errors->all() as $error)
                    {{ $error }} <br>
                    @endforeach 
                   

                    <div class="card">
                        
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Aceptar Horarios y Subir Archivos de Audio de Campaña:   {{$cotizacion->titulo}}</h4>
                                {{-- <p class="card-category">Por Favor su archivo de Orden de Compra</p> --}}
                            </div>
                        <div class="card-body">
                                {{-- aqui --}}

                               
                                {{-- <div class="d-none d-lg-block">
                                    <div class="embed-responsive embed-responsive-4by3">
                                        <iframe class="embed-responsive-item" src="{{asset('storage/').'/'.$cotizacion->archivo }}"></iframe>
                                    </div>
                                </div> --}}
                              


                                {{-- <div class="mt-3 card-header card-header-primary">
                                   <a id="ordenCompra" style="color:white" href="#"><h6><i id="flechaAbajo" class="material-icons">keyboard_arrow_down</i><i id="flechaArriba" style="display:none" class="material-icons">keyboard_arrow_up</i>
                                    Ver Orden de Compra</h6></a>
                                </div>

                                <div id="ordenCompraPC" style="display:none" class="col-md-12 col-lg-12">
                                    <div class="d-none d-lg-block">
                                        <div class="embed-responsive embed-responsive-4by3">
                                            <iframe class="embed-responsive-item" src="{{asset('storage/').'/'.$cotizacion->archivo }}"></iframe>
                                        </div>
                                    </div>
                                    <div class="d-lg-none">
                                   
                                        <a href="{{route('pdf.mostrar',$cotizacion->id_cotizacion)}}" class="btn btn-primary mx-auto mt-3">Descargar</a>
                                    
                                    </div>
                                </div>

                                

                                {{-- <div class="mt-3 card-header card-header-primary">
                                    <a id="horarios" style="color:white" href="#"><h6><i id="flechaAbajo2" class="material-icons">keyboard_arrow_down</i><i id="flechaArriba2" style="display:none" class="material-icons">keyboard_arrow_up</i>
                                     Seleccionar Horarios Para la Cotizacion</h6></a>
                                </div>

                                <div id="cantidadOculta" class="col-md-12 col-lg-11 mt-4 mx-auto" style="display:none">
                                    
                                    <div class="row">
                                        @for($i = 0; $i < $respuesta->cantidad; $i++)
                                        <div class="col-md-2 col-sm-6">
                                            <input class="form-control text-center timepicker" placeholder="Horario {{$i+1}}">
                                        </div>
                                        @endfor
                                    </div>
                                    
                                </div> --}}

                               
                                <div class="col-sm-12 mt-3">
                                    <div class="mx-auto">
                                        <div clas="mt-3">
                                            <label for="">Horarios Enviados Por Radio Bienvenida</label>
                                        </div>
                                        <div class="row my-3">
                                           
                                            @for($i = 0; $i < $contador; $i++)
                                                <div class="col-md-2 col-sm-6 mx-auto">
                                                    <li>
                                                        <b>Horario {{$i+1}}:</b> {{$horarios[$i]}}
                                                    </li>
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                

                                    
                                    
                               

                                    <div class="row mt-3">
                                        <div class="mx-auto">
                                            <label for="">¿Acepta los Horarios Entregados por la Radio?</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mx-auto">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" value="1" @if(old('seleccioneOpción')=='1') checked @endif class="custom-control-input" id="aceptar" name="seleccioneOpción">
                                                <label class="custom-control-label" for="aceptar">Aceptar y subir Archivos de Muestra para el Anuncio</label>
                                            </div>
                                        </div>
                                    </div>
                               
                                    <div class="row"  id="archivosOcultos" 
                                    @if(session()->get('aceptar'))

                                    @else
                                    style="display:none"
                                    @endif
                                    >
                                        
                                        <div class="my-3 col-md-12 text-center">
                                            <div class="mx-auto">
                                                <label for=""><small>Puede subir un Archivo de Audio o de Texto</small></label>
                                            </div>
                                            <label style="color:white" for="archivoDeAudio" id="labelAudio" class="btn btn-primary">
                                                Archivo de Audio
                                                <input type="file" id="archivoDeAudio" class="custom-control custom-" name="archivoDeAudio" style="display:none">
                                            </label>
                                            <input class="form-control col-sm-3 mx-auto text-center" readonly id="valorArchivo" style="background-color:white">
                                            <label for=""><small>El audio debe estar en Formato MP3 o WAV</small></label>
                                        </div>

                                        <div class="my-3 col-md-12 text-center">
                                            <label style="color:white" for="archivoDeTexto" id="labelTexto" class="btn btn-primary">
                                                Archivo de Texto
                                                <input type="file" id="archivoDeTexto" class="custom-control custom-" name="archivoDeTexto" style="display:none">
                                            </label>
                                            </button>
                                            <input class="form-control col-sm-3 mx-auto text-center" readonly id="valorArchivo2" style="background-color:white">
                                            <label for=""><small>El audio debe estar en Formato DOC, DOCX o PDF</small></label>
                                        </div>
                                        
                                    </div>
                                           
                                                
                                
                                       
                                        
                                    
                                   
                                    <div class="row">
                                        <div class="mx-auto">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" value="2"  @if(old('seleccioneOpción')=='2') checked @endif class="custom-control-input" id="rechazar" name="seleccioneOpción">
                                                <label class="custom-control-label" for="rechazar">Rechazar y Renegociar Horarios</label>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="row">
                                        <div class="mx-auto">
                                            <small id="alertaRechazar" style="display: none"><p>Ingrese Nuevos Horarios</p></small>
                                        </div>
                                    </div>

                                   

                                        <div class="mx-auto" id="horariosOcultos" style="display: none">
                                          
                                            <div class="row my-3">
                                                @for($i = 0; $i < $respuesta->cantidad+$respuesta->frases_extras; $i++)
                                                <div class="col-md-2 col-sm-6 mx-auto">
                                                    <input class="form-control text-center timepicker" name="hora[]" placeholder="Horario {{$i+1}}" value="{{ old('hora.'.$i)}}">
                                                    <span style="color:red"><small>@error('hora.'.$i){{$message}}@enderror</small></span>
                                                </div>
                                                @endfor
                                            </div>
                                        </div>
                                        
                                   
    
                                    <div class="row">
                                        <div class="mx-auto">
                                            <span style="color:red"><small>@error('seleccioneOpción'){{$message}}@enderror</small></span>
    
                                        </div>
                                    </div>
    

                               


                                    
                                
                            
                        
                        </div>
                        
                    </div>
                        
                    <div class="card-footer mx-auto">
                        <button id="crear" type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                       
                    
                </form>
            </div>
        </div>
    </div>    
</div>    




@section('js')

<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script><script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>



<script>
    $(document).ready(function(){

        $('.timepicker').timepicker({
        timeFormat: 'h:mm p',
        interval: 30,
        dynamic: true,
        dropdown: true,
        scrollbar: true,
        // change: buscarRepetidos,
        
        });
        
    
        

});
           
</script>

<script>
   

    $(document).ready(function(){
        $('#archivoDeAudio').on('change', function(){
            var filename = $('#archivoDeAudio').val().replace(/.*(\/|\\)/, '');
            if(filename==null){
                $('#valorArchivo').val('Cargando...');
            }else{
                $('#valorArchivo').val(filename);
            }
            $('#valorArchivo').val(filename);
        });
    });

    $(document).ready(function(){
        $('#archivoDeTexto').on('change', function(){
            var filename = $('#archivoDeTexto').val().replace(/.*(\/|\\)/, '');
            if(filename==null){
                $('#valorArchivo2').val('Cargando...');
            }else{
                $('#valorArchivo2').val(filename);
            }
            $('#valorArchivo2').val(filename);
        });
    });
    
   $(document).ready(function(){
        //cuando se seleccione el radio id aceptar append el input de archivo
    $('#aceptar').click(function(){
        $('#archivosOcultos').show('slow');
        $('#horariosOcultos').hide('slow');
        $('#crear').removeClass('btn-danger');
        $('#crear').addClass('btn-primary');
        $('#crear').text('Enviar');
        $('#alertaRechazar').hide('slow');
    });
    //cuando se seleccione el radio id rechazar eliminar el input de archivo
    $('#rechazar').click(function(){
        $('#archivosOcultos').hide('slow');
        $('#horariosOcultos').show('slow');
        //vaciar input archivo
        $('#archivo').val(null);
    });

    $('#rechazar').click(function(){
        $('#crear').removeClass('btn-primary');
        $('#crear').addClass('btn-danger');
        $('#crear').text('Volver a Etapa 3');
        $('#alertaRechazar').show('slow');

    });
   })
</script>


@endsection
@endsection