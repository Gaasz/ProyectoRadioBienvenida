@extends('layouts.main', ['activePage' => 'cotizaciones', 'titlePage' => 'Aceptar Orden de Compra'])

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
                                <h4 class="card-title">Aceptar Orden de Compra de {{$empresa->nombre_empresa}} por la Campaña {{$cotizacion->titulo}}</h4>
                                {{-- <p class="card-category">Por Favor su archivo de Orden de Compra</p> --}}
                            </div>
                        <div class="card-body">
                                {{-- aqui --}}

                               
                                {{-- <div class="d-none d-lg-block">
                                    <div class="embed-responsive embed-responsive-4by3">
                                        <iframe class="embed-responsive-item" src="{{asset('storage/').'/'.$cotizacion->archivo }}"></iframe>
                                    </div>
                                </div> --}}
                              


                                <div class="mt-3 card-header card-header-primary">
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

                                


                                <div class="text-center">

                                    <div class="row mt-3">
                                        <div class="mx-auto">
                                            <label for="">¿Aceptar la Orden de Compra?</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mx-auto">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" value="1" class="custom-control-input" id="aceptar" name="seleccioneOpción">
                                                <label class="custom-control-label" for="aceptar">Aceptar y asignar horarios Reales</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-12">
                                        <div class="mx-auto" id="archivoOculto" 
                                        @if(session()->get('aceptar')==false)
                                        style="display: none"
                                        @endif
                                        >

                                            <div class="row my-3">
                                                
                                                
                                            </div>
                                        
                                            <div class="row my-3">
                                                @for($i = 0; $i < $respuesta->cantidad+$respuesta->frases_extras; $i++)
                                                <div class="col-md-2 col-sm-6 mx-auto">
                                                    <input class="form-control text-center timepicker" name="hora[]" placeholder="Horario {{$i+1}}" value="{{ old('hora.'.$i)}}">
                                                    <span style="color:red"><small>@error('hora.'.$i){{$message}}@enderror</small></span>
                                                </div>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="row">
                                        <div class="mx-auto">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" value="2" class="custom-control-input" id="rechazar" name="seleccioneOpción">
                                                <label class="custom-control-label" for="rechazar">Rechazar y volver a Etapa 3</label>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="row">
                                        <div class="mx-auto">
                                            <small id="alertaRechazar" style="display: none"><p>El Cliente debera enviar nuevamente su orden de Compra</p></small>
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
        
    
        let flag = 0;
    $( "#ordenCompra" ).click(function() {
        if(flag == 0){
            $("#ordenCompraPC").slideDown( "slow" );
            $( "#flechaAbajo" ).hide();
            $( "#flechaArriba" ).show();
            flag = 1;
        }else{
            $("#ordenCompraPC").slideUp('slow');
            $( "#flechaAbajo" ).show();
            $( "#flechaArriba" ).hide();
            flag = 0;
        }
    });

    let flag2 = 0;
    $( "#horarios" ).click(function() {
        if(flag2 == 0){
            $("#cantidadOculta").show( "slow" );
            $( "#flechaAbajo2" ).hide();
            $( "#flechaArriba2" ).show();
            flag2 = 1;
        }else{
            $("#cantidadOculta").hide('slow');
            $( "#flechaAbajo2" ).show();
            $( "#flechaArriba2" ).hide();
            flag2 = 0;
        }
    });

        

});
           
</script>

<script>
   $(document).ready(function(){
        //cuando se seleccione el radio id aceptar append el input de archivo
    $('#aceptar').click(function(){
        $('#archivoOculto').show('slow');
        $('#crear').removeClass('btn-danger');
        $('#crear').addClass('btn-primary');
        $('#crear').text('Enviar');
        $('#alertaRechazar').hide('slow');
    });
    //cuando se seleccione el radio id rechazar eliminar el input de archivo
    $('#rechazar').click(function(){
        $('#archivoOculto').hide('slow');
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