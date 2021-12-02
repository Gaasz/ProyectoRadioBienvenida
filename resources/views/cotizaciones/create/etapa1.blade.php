@extends('layouts.main', ['activePage' => 'cotizaciones', 'titlePage' => 'Crear Nueva Solicitud de Cotización'])
@section('css')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
@endsection
@section('content')



<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('cotizaciones.guardar') }}" method="post" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    @foreach($errors->all() as $error)
                    {{ $error }} <br>
                    @endforeach 
                    @if(session()->get('indices'))
                    @foreach (session()->get('indices') as $indice)
                    <?php $cantidad[] = $indice ?>
                    @endforeach
                    
                    @endif


                    @if(isset(($cotizacion)))
                    <input type="hidden" name="id" value="{{ $cotizacion->id_cotizacion }}">
                    @endif

                    <div class="card col-sm-12 col-md-12 mx-auto">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Nuevo Solicitud de Cotización</h4>
                            <p class="card-category">Ingresar Datos de la Solicitud</p>
                        </div>
                        <div class="card-body">
                            

                            <div class="row mt-3">
                                <label for="titulo" class="col-sm-2 col-form-label">Título de la Campaña</label>
                                <div class="col-sm-4">
                                    <input type="text" value="{{@old('titulo')}}" class="form-control" name="titulo" placeholder="Ingresa el Título de la Campaña..." autofocus >
                                    <span style="color:red"><small>@error('titulo'){{$message}}@enderror</small></span>

                                </div>
                                <label for="valor" class="col-sm-2 col-form-label">Valor Unitario actual del Anuncio</label>
                                <div class="col-sm-4">
                                    <div>
                                         <input name="valor" id="oferta" disabled class="form-control col-md-4 text-center" value="${{$oferta}}" style="border-radius: 25px;
                                         background: rgb(240, 236, 236);
                                         width: fit-content; font-weight: bold;">
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="row mt-3">
                                <label for="descripcion" class="col-sm-2 col-form-label">Descripción de la Campaña</label>
                                <div class="col-sm-4">
                                    <textarea class="form-control" name="descripcion" rows="3" placeholder="Ingresa la descripción de la Campaña...">{{@old('descripcion')}}</textarea>
                                    <span style="color:red"><small>@error('descripcion'){{$message}}@enderror</small></span>

                                </div>
                                <label for="cantidad" class="col-sm-2 col-form-label">Cantidad de Frases Diarias</label>
                                <div class="col-sm-4">
                                    <input type="number" value="{{@old('cantidad')}}" class="form-control col-sm-2 text-center" name="cantidad" id="cantidad">
                                    <span style="color: red"><small>@error('cantidad'){{$message}}@enderror</small></span>
                                </div>
                            </div>
                            <div class="row my-4">
                                
                                <div class="mx-auto">
                                    <label for="valor" class=" col-form-label">Precio Total de la Solicitud de Cotización</label>
                                
                                
                                    
                                    <div class="mx-auto">
                                        <input value="{{@old('precio')}}" name="precio" id="precio" readonly class="form-control col-md-6 mx-auto text-center" style="border-radius: 25px;
                                        background: rgb(240, 236, 236);
                                        width: fit-content;font-weight: bold;">
                                    </div>
                                    
                                
                                </div>
                            </div>  

                            <div class="row mt-3" id="calendarios">
                                <label for="fechaInicio" class="col-sm-2 col-form-label">Fecha Inicio</label>
                                <div class="col-sm-3">
                                    <input readonly style="background-color:white" class="form-control datepicker" id="calendarioInicio" name="fecha[]" value="{{old('fecha.0')}}">
                                    <span style="color:red; display:none" id="errorFechas1"><small>Fecha de Inicio y Fecha de Fin no pueden ser iguales</small></span>
                                    <span style="color: red"><small>@error('fecha.0'){{$message}}@enderror</small></span>

                                </div>
                                <label for="fechaFin" class="col-sm-2 col-form-label">Fecha Fin</label>
                                <div class="col-sm-3">
                                    <input readonly style="background-color:white" class="form-control datepicker" id="calendarioFin" name="fecha[]" value="{{old('fecha.1')}}">
                                    <span style="color: red"><small>@error('fecha.1'){{$message}}@enderror</small></span>
                                    <span style="color:red; display:none" id="errorFechas2"><small>Fecha de Inicio y Fecha de Fin no pueden ser iguales</small></span>
                                </div>
                            </div>
                            

                            <div class="row mt-3">
                                <label for="tipoHorario"  class="col-sm-2 col-form-label">Seleccione Tipo de Horario</label>
                                <div class="col-sm-4">

                                    <div class="row ml-2">
                                        <input type="radio" class="form-check" value="1" @if(old('tipoHorario')=='1') checked @endif name="tipoHorario" id="solicitar" >
                                        &nbsp;
                                        <label for="tipoHorario">Solicitar Horario</label>
                                    </div>
                                    
                                    <div class="row ml-2">
                                        <input type="radio" class="form-check" @if(old('tipoHorario')=='2') checked @endif value="2" name="tipoHorario" id="libre">
                                        &nbsp;
                                        <label for="tipoHorario">Horario Libre</label>
                                    </div>
                                    <span style="color:red"><small>@error('tipoHorario'){{$message}}@enderror</small></span>


                                </div>

                            </div>
                            
                            <div class="text-center" style="display:none" id="etiquetaHorario"><label for="">Ingrese Horarios</label></div>
                            <div class="text-center" style="display:none" id="etiquetaHorario2"><label for=""><small>Estos Horarios son solo referenciales, cuando se le responda se enviaran los horarios reales</small></label></div>
                            {{-- input time con boton agregar y eliminar --}}
                            <div class="row mt-3 mx-auto" id="horarios"
                            @if(session()->get('solicitado') == false)
                            style="display: none"
                            @endif
                            >
                                
                                @for($i=0; $i<48; $i++)
                                    
                                    @if($i==0)
                                    <div class="row" id="horario{{$i}}" >
                                        
                                        <div class="col-sm-8">
                                            <input class="form-control timepicker" id="hora{{$i}}" name="horario[]" value="{{ old('horario.'.$i)}}" placeholder="Ingresa el Horario">
                                            <span style="color:red"><small>@error('horario.'.$i){{$message}}@enderror</small></span>
                                            <div style="display:none" class="row" id="horariorepetido0">
                                                <span style="color:red"><small>Horario Repetido</small></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <a class="btn btn-primary btn-sm" id="agregar0">
                                                <span class="material-icons" style="color:white">
                                                    add_circle
                                                </span>
                                            </a>
                                            {{-- <a class="btn btn-danger btn-sm" id="eliminar0">
                                                <span class="material-icons" style="color:white">
                                                    remove_circle
                                                </span>
                                            </a> --}}
                                        </div>
                                       
                                    </div>
                                        
                                   
                                   
                                    @elseif($i>0 && $i<16)
                                        <div class="row" id="horario{{$i}}" 
                                        @if(session()->get('indices'))
                                            @if($cantidad[$i]==null)
                                            style="display: none"
                                            @endif
                                        @else
                                            style="display: none"
                                        @endif
                                        >
                                            <div class="col-sm-8">
                                                <input class="form-control timepicker" id="hora{{$i}}" name="horario[]" value="{{ old('horario.'.$i)}}" placeholder="Ingresa el Horario">
                                                <span style="color:red"><small>@error('horario.'.$i){{$message}}@enderror</small></span>
                                                <div style="display:none" class="row" id="horariorepetido{{$i}}">
                                                    <span style="color:red"  ><small>Horario Repetido</small></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                {{-- <a class="btn btn-primary btn-sm" id="agregar{{$i}}">
                                                    <span class="material-icons" style="color:white">
                                                        add_circle
                                                    </span>
                                                </a> --}}
                                                <a class="btn btn-danger btn-sm" id="eliminar{{$i}}">
                                                    <span class="material-icons" style="color:white">
                                                        remove_circle
                                                    </span>
                                                </a>
                                            </div>
                                            
                                        </div>
                                        
                                    @elseif($i>15 && $i<32)
                                        <div class="row" id="horario{{$i}}"
                                        @if(session()->get('indices'))
                                            @if($cantidad[$i]==null)
                                            style="display: none"
                                            @endif
                                        @else
                                            style="display: none"
                                        @endif>
                                            <div class="col-sm-8">
                                                <input class="form-control timepicker" id="hora{{$i}}" name="horario[]" value="{{ old('horario.'.$i)}}" placeholder="Ingresa el Horario">
                                                <span style="color:red"><small>@error('horario.'.$i){{$message}}@enderror</small></span>
                                                <div style="display:none" class="row" id="horariorepetido{{$i}}">
                                                    <span style="color:red"><small>Horario Repetido</small></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                {{-- <a class="btn btn-primary btn-sm" id="agregar{{$i}}">
                                                    <span class="material-icons" style="color:white">
                                                        add_circle
                                                    </span>
                                                </a> --}}
                                                <a class="btn btn-danger btn-sm" id="eliminar{{$i}}">
                                                    <span class="material-icons" style="color:white">
                                                        remove_circle
                                                    </span>
                                                </a>
                                            </div>
                                            
                                        </div>
                                        
                                    @elseif($i>31 && $i<48)
                                    <div class="row" id="horario{{$i}}" 
                                    @if(session()->get('indices'))
                                            @if($cantidad[$i]==null)
                                            style="display: none"
                                            @endif
                                        @else
                                            style="display: none"
                                        @endif
                                    >
                                        <div class="col-sm-8">
                                            <input class="form-control timepicker" id="hora{{$i}}" name="horario[]" value="{{ old('horario.'.$i)}}"  placeholder="Ingresa el Horario">
                                            <span style="color:red"><small>@error('horario.'.$i){{$message}}@enderror</small></span>
                                            <span style="color:red"><small>@error('horario'){{$message}}@enderror</small></span>
                                        </div>
                                        <div class="col-sm-2">
                                            {{-- <a class="btn btn-primary btn-sm" id="agregar{{$i}}">
                                                <span class="material-icons" style="color:white">
                                                    add_circle
                                                </span>
                                            </a> --}}
                                            <a class="btn btn-danger btn-sm" id="eliminar{{$i}}">
                                                <span class="material-icons" style="color:white">
                                                    remove_circle
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                                            
                                    @endif
                                @endfor
                            </div>
                            
                            

                            

                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button id="crear" type="submit" class="btn btn-primary">Crear</button>
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
    $(document).ready(function () {
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
        dateFormat: 'yy-mm-dd',
        firstDay: 1,
        minDate: 0,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
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
        dateFormat: 'yy-mm-dd',
        firstDay: 1,
        minDate: 0,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    })

        
    });

    $(document).ready(function(){
        
        let distancia = 0;
        let total = 0;
        $('#calendarioInicio').change(function(){
            if($('#calendarioInicio').val()!=''){
           
            //#calendarioFin min value is #calendarioInicio value
            $('#calendarioFin').datepicker('option', 'minDate', $('#calendarioInicio').val());
            }
            
            //si calendarioInicio y calendarioFin son distintos de null y distintos de vacio entonces se calcula la distancia entre ellos
            if($('#calendarioInicio').val()!='' && $('#calendarioFin').val()!='' && $('#calendarioInicio').val()!=null && $('#calendarioFin').val()!=null && $('#cantidad').val()!='' && $('#cantidad').val()!=null){
                distancia = Math.abs(new Date($('#calendarioInicio').val()).getTime() - new Date($('#calendarioFin').val()).getTime());
                distancia = Math.ceil(distancia / (1000 * 3600 * 24));
                oferta = $('#oferta').val();
                oferta = oferta.replace('$', '');
                total = $('#cantidad').val()*distancia*oferta*1000;
                $('#precio').val('$'+total);
               
            }

            //si calendario inicio y calendario fin son iguales, distintos de vacio y distintos de null entonces deshabilita el boton de id crear
            if($('#calendarioInicio').val()==$('#calendarioFin').val() && $('#calendarioInicio').val()!='' && $('#calendarioFin').val()!='' && $('#calendarioInicio').val()!=null && $('#calendarioFin').val()!=null){
                $('#crear').attr('disabled', true);
                $('#errorFechas1').show('slow');
                $('#errorFechas2').show('slow');
            }else{
                $('#crear').attr('disabled', false);
                $('#errorFechas1').hide('slow');
                $('#errorFechas2').hide('slow');
            }
           
            // console.log(total);
       
        });

        $('#calendarioFin').change(function(){
            if($('#calendarioFin').val()!=''){
           
            //#calendarioInicio max value is #calendarioFin value
            $('#calendarioInicio').datepicker('option', 'maxDate', $('#calendarioFin').val());
            }

            //si calendarioInicio y calendarioFin son distintos de null y distintos de vacio entonces se calcula la distancia entre ellos
            if($('#calendarioInicio').val()!='' && $('#calendarioFin').val()!='' && $('#calendarioInicio').val()!=null && $('#calendarioFin').val()!=null && $('#cantidad').val()!='' && $('#cantidad').val()!=null){
                distancia = Math.abs(new Date($('#calendarioInicio').val()).getTime() - new Date($('#calendarioFin').val()).getTime());
                distancia = Math.ceil(distancia / (1000 * 3600 * 24));
                oferta = $('#oferta').val();
                oferta = oferta.replace('$', '');
                total = $('#cantidad').val()*distancia*oferta*1000;
                $('#precio').val('$'+total);
                

                
            }

             //si calendario inicio y calendario fin son iguales, distintos de vacio y distintos de null entonces deshabilita el boton de id crear
             if($('#calendarioInicio').val()==$('#calendarioFin').val() && $('#calendarioInicio').val()!='' && $('#calendarioFin').val()!='' && $('#calendarioInicio').val()!=null && $('#calendarioFin').val()!=null){
                $('#crear').attr('disabled', true);
                $('#errorFechas1').show('slow');
                $('#errorFechas2').show('slow');
            }else{
                $('#crear').attr('disabled', false);
                $('#errorFechas1').hide('slow');
                $('#errorFechas2').hide('slow');
                
            }
            
            // console.log(total);
        });

        $('#cantidad').change(function(){
            if($('#cantidad').val()>48){
               $('#cantidad').val(48);
            }
            if($('#cantidad').val()<1){
                $('#cantidad').val(1);
            }

            //si calendarioInicio y calendarioFin son distintos de null y distintos de vacio entonces se calcula la distancia entre ellos
            if($('#calendarioInicio').val()!='' && $('#calendarioFin').val()!='' && $('#calendarioInicio').val()!=null && $('#calendarioFin').val()!=null && $('#cantidad').val()!='' && $('#cantidad').val()!=null){
                distancia = Math.abs(new Date($('#calendarioInicio').val()).getTime() - new Date($('#calendarioFin').val()).getTime());
                distancia = Math.ceil(distancia / (1000 * 3600 * 24));
                oferta = $('#oferta').val();
                oferta = oferta.replace('$', '');
                total = $('#cantidad').val()*distancia*oferta*1000;
                $('#precio').val('$'+total);
                

            }

            let contador=0;
            for(var i=0; i<48; i++){
               //ver cuantos inputs horario+i estan visibles
                if($('#horario'+i).is(':visible')){
                     
                    contador = contador+1;
                   
                    //ocultar los horario+i si el valor es mayor al valor de cantidad
                    if(contador>$('#cantidad').val()){
                        for($i=48; $i>=$('#cantidad').val(); $i--){
                            
                            $('#horario'+$i).hide('slow');
                            $('#horario'+$i).val('');
                        }
                    }
                }
            }
            

        });

       


    });


    $(document).ready(function (){
    
        $('.timepicker').timepicker({
            timeFormat: 'h:mm p',
            interval: 30,
            dynamic: false,
            dropdown: true,
            scrollbar: true,
            
        });

        //mostrar id horarios al seleccionar id solicitar
        $('#solicitar').click(function(){
            $('#etiquetaHorario').show('slow');
            $('#etiquetaHorario2').show('slow');
            $('#horarios').show('slow');
        });
        //esconder id horarios al seleccionar id libre
        $('#libre').click(function(){
            $('#etiquetaHorario').hide('slow');
            $('#etiquetaHorario2').hide('slow');
            $('#horarios').hide();
        });

        //agregar mas inputs horarios
        $('.btn-sm').click(function(){
            if($(this).attr('id').includes('agregar')){
                let id = $(this).attr('id').replace('agregar','');
                var cont = 0;
                var oculto;
                
                if($('#cantidad').val()>1){
                    for(cont; cont < $('#cantidad').val(); cont++){
                    if($('#horario'+cont).is(':visible')){
                    }else{
                        oculto = cont;  
                    }
                    }
                }
            
                var masuno = parseInt(id) + 1;
            
                $('#horario'+oculto).show('slow');
            }else{
                let id = $(this).attr('id').replace('eliminar','');
                if(id!=0){
                    $('#horario'+id).hide();
                    $('#horario'+id).find('input').val('');
                }
            }
        
        


        });


    });
</script>


@endsection
@endsection