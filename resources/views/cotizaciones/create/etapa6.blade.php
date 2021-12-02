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
                                <h4 class="card-title">Aceptar Archivos y Subir Audios de Muestra: {{$cotizacion->titulo}}</h4>
                                {{-- <p class="card-category">Por Favor su archivo de Orden de Compra</p> --}}
                            </div>
                        <div class="card-body mb-3">
                            
                            <div class="card-header card-header-primary mt-3 col-sm-10 mx-auto">
                                <a id="mostrarArchivos" style="color:white" href="#"><h6><i id="flechaAbajo2" class="material-icons">keyboard_arrow_down</i><i id="flechaArriba2" style="display:none" class="material-icons">keyboard_arrow_up</i>
                                    Archivo de Texto Cliente</h6>
                                </a>
                            </div>
                            <div id="archivosOcultos" style="display:none">
                            @if($extensionTexto == 'pdf')
                                
                                        <div class="d-none d-lg-block mt-4">
                                            <div class="row">
                                                <div class="card-header card-header-primary col-sm-8 mx-auto mt-3">
                                                    <a id="mostrarPdf" style="color:white" href="#"><h6><i id="flechaAbajo" class="material-icons">keyboard_arrow_down</i><i id="flechaArriba" style="display:none" class="material-icons">keyboard_arrow_up</i>
                                                        Archivo de Texto Cliente</h6>
                                                    </a>
                                                </div>
                                                <div class="embed-responsive embed-responsive-4by3 col-sm-8 ml-3 mx-auto" id="archivoPc" style="display:none">
                                                    
                                                            <iframe class="embed-responsive-item" src="{{asset('storage').'/'.$anuncio->archivo_texto }}"></iframe>
                                                </div>
                                            </div>
                                        </div>
                            @else
                                <div id="archivosOcultos2" style="display:none">
                                    <div class="row">
                                        <div class="mx-auto d-none d-lg-block">
                                        
                                            <a href="{{route('archivo.descargar',$anuncio->id_anuncio)}}" class="btn btn-primary mx-auto mt-3">Descargar Archivo de Texto</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="d-lg-none mx-auto">
                                       
                                            <a href="{{route('archivo.descargar',$anuncio->id_anuncio)}}" class="btn btn-primary mx-auto mt-3 btn-sm">Descargar Archivo de Texto</a>
                                        </div>
                                    </div>
                                </div>
                                
                            @endif

                            @if($extensionAudio!=null)
                            <div class="row">
                                <div class="mx-auto mt-3">
                                    <label for="">Archivo de Audio</label>
                                </div>
                            </div>
                            @endif
                        
                            <div class="row mb-3">
                                <div class="mx-auto">
                                    @if($extensionAudio == 'mp3')
                                    <audio controls style="width: 200px; min-width:250px">
                                        <source src="{{asset('storage/').'/'.$anuncio->archivo_audio }}" type="audio/mpeg"> 
                                    </audio>
                                    @endif
                                    @if($extensionAudio == 'wav')
                                    <audio controls style="width: 200px;">
                                        <source src="{{asset('storage/').'/'.$anuncio->archivo_audio }}" type="audio/wav">
                                    </audio>
                                    @endif
                                </div>
                            </div>
                                
                            </div>
                           
                        
                      
                        
                            <div class="row">
                                <div class="mx-auto mt-3">
                                    <label for="">Subir Audio de Muestra para Cliente</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mx-auto">
                                    <label style="color:white" for="archivoDeAudio" id="labelAudio" class="btn btn-primary ml-4">
                                        Archivo de Audio
                                        <input type="file" id="archivoDeAudio" class="custom-control custom-" name="archivoDeAudio" style="display:none">
                                    </label>
                                    <input class="form-control mx-auto text-center" readonly id="valorArchivo" style="background-color:white">
                                    <label for=""><small>El audio debe estar en Formato MP3 o WAV</small></label>
                                    <span style="color:red"><small>@error('archivoDeAudio'){{$message}}@enderror</small></span>
                                    
                            
                                </div>
                            </div>
                               
                               
                            
                            
                        
                        

                            
                           
                        </div>    
                        <div class="card-footer mx-auto">
                            <button id="crear" type="submit" class="btn btn-primary">Enviar</button>
                            </div>
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
    let flag = 0;
    $( "#mostrarPdf" ).click(function() {
        if(flag == 0){
            $("#archivoPc").slideDown( "slow" );
            $( "#flechaAbajo" ).hide();
            $( "#flechaArriba" ).show();
            flag = 1;
        }else{
            $("#archivoPc").slideUp('slow');
            $( "#flechaAbajo" ).show();
            $( "#flechaArriba" ).hide();
            flag = 0;
        }
    });
   });

   $(document).ready(function(){
    $('#archivoDeAudio').change(function(){
        var valor = $(this).val();
        var valor = valor.replace(/C:\\fakepath\\/i, '');
        $('#valorArchivo').val(valor);
    });
   });

   $(document).ready(function(){
    let flag2 = 0;
    $( "#mostrarArchivos" ).click(function() {
        if(flag2 == 0){
            $("#archivosOcultos").slideDown( "slow" );
            $('#archivosOcultos2').slideDown( "slow" );
            $( "#flechaAbajo2" ).hide();
            $( "#flechaArriba2" ).show();
            flag2 = 1;
        }else{
            $("#archivosOcultos").slideUp('slow');
            $('#archivosOcultos2').slideUp('slow');
            $( "#flechaAbajo2" ).show();
            $( "#flechaArriba2" ).hide();
            flag2 = 0;
        }
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