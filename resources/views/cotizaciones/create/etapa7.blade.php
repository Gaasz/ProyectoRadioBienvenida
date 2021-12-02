@extends('layouts.main', ['activePage' => 'cotizaciones', 'titlePage' => 'Corroborar Audio Emitido'])

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
                                <h4 class="card-title">Corroborar Emisión de Anuncio: {{$cotizacion->titulo}}</h4>
                                {{-- <p class="card-category">Por Favor su archivo de Orden de Compra</p> --}}
                            </div>
                        <div class="card-body mb-3">
                           
                            
                            <div class="row mt-3">
                                    <label class="col-sm-2 col-form-label">Titulo:</label>
                                    <div class="col-sm-4">
                                      <div class="form-group bmd-form-group is-filled">
                                        {{$cotizacion->titulo}}
                                      </div>
                                    </div>
                                    <label class="col-sm-2 col-form-label">Descripción:</label>
                                    <div class="col-sm-4">
                                        <div class="form-group bmd-form-group is-filled" style="width:90%;
                                        word-wrap: break-word;">
                                           <p>{{$respuesta->descripcion}}</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mt-3">
                                    <label class="col-sm-2 col-form-label">Fecha de Inicio:</label>
                                    <div class="col-sm-4">
                                        <div class="form-group bmd-form-group is-filled">
                                        {{$respuesta->fecha_inicio}}
                                        </div>
                                    </div>
                                    <label class="col-sm-2 col-form-label">Fecha de Termino:</label>
                                    <div class="col-sm-4">
                                        <div class="form-group bmd-form-group is-filled">
                                        {{$respuesta->fecha_fin}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label class="col-sm-2 col-form-label">Cantidad:</label>
                                    <div class="col-sm-4">
                                        <div class="form-group bmd-form-group is-filled">
                                        {{$respuesta->cantidad+$respuesta->frases_extras}}
                                        </div>
                                    </div>
                                    <label class="col-sm-2 col-form-label">Valor:</label>
                                    <div class="col-sm-4">
                                        <div class="form-group bmd-form-group is-filled">
                                        @php
                                        //poner punto separador de unidades de mil en $respuesta->valor
                                        $valor = number_format($respuesta->valor, 0, ',', '.');
                                        @endphp
                                        {{'$'.$valor}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">


                                    
                                    
                                
                                    <div class="mx-auto">
                                        <label for="valor" class=" col-form-label">Precio Total de la Cotización</label>
                                    
                                        @php
                                            //separar por unidades de mil con punto
                                            $precio = $respuesta->precio;
                                            $precio = number_format($precio, 0, ',', '.');
                                        @endphp
                                        
                                        <div class="mx-auto">
                                            <input value="${{$precio}}" name="precio" id="precio" disabled class="form-control col-md-6 mx-auto text-center" style="border-radius: 25px;
                                            background: rgb(240, 236, 236);
                                            width: fit-content;font-weight: bold;">
                                        </div>
                                    </div>
                                </div>  
                                 
                                <div class="row mb-3 mt-3">
                                    
                                    <div class="mx-auto">
                                        <div class="mx-auto">
                                            <label for="">Audio de Muestra Enviado por la Radio</label>
                                        </div>
                                        <audio controls style="width: 200px; min-width:250px">
                                            <source src="{{asset('storage/').'/'.$anuncio->archivo_audio }}" type="audio/mpeg"> 
                                        </audio>
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-check mx-auto">
                                      <label class="form-check-label">
                                          <input class="form-check-input" type="radio" id="aceptar" value="1" name="aceptar">
                                          Acepta el Audio de Confirmación
                                          <span class="form-check-sign">
                                            <span class="check"></span>
                                          </span>
                                      </label>
                                    </div>
                                </div> 
                                <div class="row" style="display:none" id="aceptarOculto">
                                    <div class="mx-auto">
                                       <small> Si acepta el Audio de Confirmación, el proceso de Cotización se dara por terminado.</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-check mx-auto">
                                      <label class="form-check-label">
                                          <input class="form-check-input" type="radio" id="rechazar" value="2" name="aceptar">
                                          Rechazar Audio de Confirmación
                                          <span class="form-check-sign">
                                            <span class="check"></span>
                                          </span>
                                      </label>
                                    </div>
                                </div>  
                                <div class="row" style="display:none" id="rechazarOculto">
                                    <div class="mx-auto">
                                       <small> Si rechaza el Audio de Confirmación, la Radio debera enviarle otro.</small>
                                    </div>
                                </div> 
                               
                        </div>
                        <div class="card-footer mx-auto">
                            <button id="crear" type="submit" class="btn btn-primary">Aceptar</button>
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
        $('#aceptar').change(function(){
            console.log('hola');
            if($(this).val() == 1){
                $('#aceptarOculto').show('slow');
                $('#rechazarOculto').hide('slow ');
            }
                
            });
        $('#rechazar').change(function(){
            if($(this).val() == 2){
                $('#aceptarOculto').hide('slow ');
                $('#rechazarOculto').show('slow');
            }
                
            });
    });
  
</script>


@endsection
@endsection