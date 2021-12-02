@extends('layouts.main', ['activePage' => 'cotizaciones', 'titlePage' => 'Subir Orden de Compra'])
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <form action="{{ route('cotizaciones.guardar2', $cotizacion->id_cotizacion) }}" method="post" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    @foreach($errors->all() as $error)
                    {{ $error }} <br>
                    @endforeach 
                   

                    <div class="card col-sm-12 col-md-12 mx-auto">
                        
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Aceptar Cotización</h4>
                                <p class="card-category">Por Favor su archivo de Orden de Compra</p>
                            </div>
                        <div class="card-body">
                                {{-- aqui --}}

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
                                <div class="row mt-3">
                                    <div class="mx-auto">
                                        <label for="">¿Acepta la Cotización?</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mx-auto">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" value="1" class="custom-control-input" id="aceptar" name="seleccioneOpción">
                                            <label class="custom-control-label" for="aceptar">Aceptar y subir orden de compra</label>
                                        </div>
                                    </div>
                                </div>
                                
                                {{-- <div class="row">
                                    <div class="mx-auto" id="archivoOculto" style="display: none">
                                            <input name="archivo" class="form-control" type="file" id="formFile">

                                            <div class="row">
                                                <div class="mx-auto">
                                                    <p><small>Por Favor Selecione un Archivo formato PDF</small></p>
                                                </div>
                                            </div>
                                    </div>
                                </div> --}}

                                <div class="row" id="archivoOculto" style="display: none">
                                    <div class="my-3 col-md-12 text-center">
                                        <label style="color:white" for="archivo" id="labelTexto" class="btn btn-primary">
                                            Archivo de Texto
                                            <input type="file" id="archivo" class="custom-control custom-" name="archivo" style="display:none">
                                        </label>
                                        </button>
                                        <input class="form-control col-sm-3 mx-auto text-center" readonly id="valorArchivo" style="background-color:white">
                                    </div>
                                </div>
                               
                                <div class="row">
                                    <div class="mx-auto">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" value="2" class="custom-control-input" id="rechazar" name="seleccioneOpción">
                                            <label class="custom-control-label" for="rechazar">Rechazar y volver a Etapa 1</label>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="row">
                                    <div class="mx-auto">
                                        <small id="alertaRechazar" style="display: none"><p>Se regresara la Solicitud de Cotizacion a etapa 1 y se podra Renegociar de nuevo</p></small>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mx-auto">
                                        <span style="color:red"><small>@error('seleccioneOpción'){{$message}}@enderror</small></span>
                                        <span style="color:red"><small>@error('archivo'){{$message}}@enderror</small></span>

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


<script>

    $(document).ready(function(){
        $('#archivo').on('change', function(){
            var filename = $('#archivo').val().replace(/.*(\/|\\)/, '');
            if(filename==null){
                $('#valorArchivo').val('Cargando...');
            }else{
                $('#valorArchivo').val(filename);
            }
            $('#valorArchivo').val(filename);
        });
    });
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
        $('#crear').text('Volver a Etapa 1');
        $('#alertaRechazar').show('slow');

    });
</script>



@endsection
@endsection