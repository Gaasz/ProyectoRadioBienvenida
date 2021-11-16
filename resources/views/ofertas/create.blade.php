@extends('layouts.main', ['activePage' => 'ofertas', 'titlePage' => 'Nueva Oferta'])

@section('content')
@section('css')
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />

@endsection

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('ofertas.guardar') }}" method="post" class="form-horizontal">
                    @csrf
                        <div class="card col-sm-12 col-md-10 mx-auto">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Crear Nueva Oferta</h4>
                                <p class="card-category">Ingresar Datos</p>
                            </div>
                            <div class="card-body">
                                <div class="row mt-3">
                                    <label for="nombreOferta" class="col-sm-2 col-form-label">Nombre de la Oferta</label>
                                    <div class="col-sm-4">
                                        <input type="text" value="{{@old('nombreOferta')}}" class="form-control" name="nombreOferta" placeholder="Ingresa el Nombre de la Oferta..." autofocus >
                                        <span style="color:red"><small>@error('nombreOferta'){{$message}}@enderror</small></span>

                                    </div>
                                    <label for="tipoOferta" class="col-sm-2 col-form-label">Tipo de Oferta</label>
                                    <div class="col-sm-4">

                                        <div class="row ml-2">
                                            <input type="radio" class="form-check" value="1" @if(old('tipoOferta')=='1') checked @endif name="tipoOferta" id="oferta" >
                                            &nbsp;
                                            <label for="tipoOferta">Oferta</label>
                                        </div>
                                        
                                        <div class="row ml-2">
                                            <input type="radio" class="form-check" @if(old('tipoOferta')=='2') checked @endif value="2" name="tipoOferta" id="descuento">
                                            &nbsp;
                                            <label for="tipoOferta">Descuento</label>
                                        </div>
                                        <span style="color:red"><small>@error('tipoOferta'){{$message}}@enderror</small></span>


                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
                                    <div class="col-sm-4">
                                        <textarea class="form-control" name="descripcion" rows="3" placeholder="Ingresa la descripcion de la Oferta...">{{old('descripcion')}}</textarea>
                                        <span style="color:red"><small>@error('descripcion'){{$message}}@enderror</small></span>
                                    </div>
                                </div>

                                <div class="row mt-3" 
                                @if(session('oferta')==false)
                                style="display:none"
                                @endif
                                id="tipoOfertaOculta">
                                    
                                    <label for="valor" class="col-sm-2 col-form-label">Valor Unitario Frase</label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="valor" id="valor" value="{{old('valor')}}">
                                    </div>
                                    <label for="cantidad" class="col-sm-2 col-form-label">Cantidad de Frases</label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="cantidad" id="cantidad" value="{{old('cantidad')}}">
                                    </div>
                                    
                                </div>

                                <div class="row mt-3" 
                                @if(session('descuento')==false)
                                style="display:none"
                                @endif
                                id="tipoDescuentoOculto">
                                    
                                    <div class="mx-auto">
                                        <label for="valor" class="col-form-label">Porcentaje de Decuento</label>
                                        <div class="col-md-8">
                                            <input type="number" class="form-control col-md-10" name="descuento" id="descuentoInput" value="{{old('descuento')}}">
                                        </div>
                                    </div>
                                        
                                </div>
                                
                                
                                <div class="row mt-3" id="calendarios" 
                                @switch(session()->all())
                                    @case(session('oferta')==true)
                                        
                                        @break
                                    @case(session('descuento')==true)
                                            
                                        @break
                                    @default
                                        style="display:none"
                                        @break 
                                @endswitch>
                                    <label for="fechaInicio" class="col-sm-2 col-form-label">Fecha Inicio</label>
                                    <div class="col-sm-4">
                                        <input class="form-control datepicker" id="calendarioInicio" name="fechaInicio" value="{{old('fechaInicio')}}">
                                        <span style="color: red"><small>@error('fechaInicio'){{$message}}@enderror</small></span>

                                    </div>
                                    <label for="fechaFin" class="col-sm-2 col-form-label">Fecha Fin</label>
                                    <div class="col-sm-4">
                                        <input class="form-control datepicker" id="calendarioFin" name="fechaFin" value="{{old('fechaFin')}}">
                                        <span style="color: red"><small>@error('fechaFin'){{$message}}@enderror</small></span>
                                    </div>
                                </div>
                                
                               
                                
                            
                                
                            </div>

                            <div class="card-footer ml-auto mr-auto">
                                <button id="botonCrear" class="btn btn-primary">Crear</button>
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
        $('#oferta').click(function(){
            $('#calendarios').hide();
            $('#descuento').prop('checked', false);
            $('#tipoOfertaOculta').show("slow");
            $('#calendarios').show("slow");
            $('#tipoDescuentoOculto').hide();
            $('#descuentoInput').val('');
        });
        $('#descuento').click(function(){
            $('#calendarios').hide();
            $('#oferta').prop('checked', false);
            $('#tipoOfertaOculta').hide();
            $('#tipoDescuentoOculto').show("slow");
            $('#calendarios').show("slow");
            $('#valor').val('');
            $('#cantidad').val('');
            

        });
    });
</script>


<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<script>
    $(function () {
    $("#calendarioInicio").datepicker({
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        minDate: 0,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    });
    });

    //evitar que input id calendarioInicio sea menor a la fecha actual
    $('#calendarioFin').datepicker({
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        minDate: $('#calendarioInicio').val(),
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    })

   
</script>

<script>
    $(document).ready(function() {
    ///////
        var startDate;
        var endDate;
        $( "#calendarioInicio" ).datepicker({
            dateFormat: 'dd-mm-yy'
        })
    ///////
    ///////
        $( "#calendarioFin" ).datepicker({
            dateFormat: 'dd-mm-yy'
        });
    ///////
        $('#calendarioInicio').change(function() {
            startDate = $(this).datepicker('getDate');
            $("#calendarioFin").datepicker("option", "minDate", startDate );
        })
    
    ///////
        $('#calendarioFin').change(function() {
            endDate = $(this).datepicker('getDate');
            $("#calendarioInicio").datepicker("option", "maxDate", endDate );
        })
        
    ////////////////

    //alerta si calendarioInicio y CalendarioFin son iguales
        $('#calendarioInicio').change(function() {
            if($('#calendarioInicio').val() == $('#calendarioFin').val()){
                $(this).parent().parent().append('<span class="alertaFechas" style="color: red"><small>Fecha Inicio y Fecha Fin iguales</small></span>');
                $('#botonCrear').prop('disabled', true);
            }else{
                $('.alertaFechas').remove();
                $('#botonCrear').prop('disabled', false);
            }
        })
        $('#calendarioFin').change(function() {
            if($('#calendarioInicio').val() == $('#calendarioFin').val()){
                $(this).parent().parent().append('<span class="alertaFechas" style="color: red"><small>Fecha Inicio y Fecha Fin iguales</small></span>');  
                $('#botonCrear').prop('disabled', true);
            }else{
                $('.alertaFechas').remove();
                $('#botonCrear').prop('disabled', false);
            }
        })
    })
</script>
@endsection

@endsection