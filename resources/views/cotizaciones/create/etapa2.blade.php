@extends('layouts.main', ['activePage' => 'cotizaciones', 'titlePage' => 'Responder Solicitud de Cotización'])
@section('css')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />






@endsection
@section('content')



<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                
                   
                    @foreach($errors->all() as $error)
                    {{ $error }} <br>
                    @endforeach 
                    
                    <div class="card mx-auto">
                        <form action="{{route('cotizaciones.responder',$cotizacion->id_cotizacion)}}" method="post" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Responder Solicitud de Cotizacion</h4>
                                <p class="card-category">Ingresar Datos de la Respuesta</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                        {{-- card --}}
                                    <div class="card mx-auto col-md-5 col-sm-12">
                                        <div class="card-header card-header-primary">
                                            <h4 class="card-title">Solicitud de Cotizacion de {{$empresa->nombre_empresa}}</h4>
                                            <p class="card-category">Información de la Solicitud</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="row col-form-label">
                                                <label class="col-sm-2 col-form-label">Titulo: </label>
                                                <div class="form-group bmd-form-group is-filled">
                                                    {{$cotizacion->titulo}}
                                                </div>                                            
                                            </div>
            
                                            <div class="row col-form-label">
                                                <label class="col-sm-3 col-form-label">Descripción: </label>
                                                <div class="form-group bmd-form-group is-filled mx-auto" style="width:90%;
                                                word-wrap: break-word;">
                                                   <p>{{$cotizacion->descripcion}}</p>
                                                </div>                                            
                                            </div>
                                            
                                            <div class="row  col-form-label">
                                                <label class="col-sm-3 col-form-label">Valor: </label>
                                                <div class="form-group bmd-form-group is-filled ">
                                                    ${{$valor}}
                                                </div> 
                                            </div>
                                            <div class="row col-form-label">
                                                <label class="col-sm-3 col-form-label">Cantidad:</label>
                                                <div class="form-group bmd-form-group is-filled">
                                                    {{$cotizacion->cantidad}}
                                                </div>      
                                            </div>                                             
                                            
            
                                            <div class="row col-form-label">
                                                <label class="col-sm-3 col-form-label">Precio Total:</label>
                                                <div class="form-group bmd-form-group is-filled">
                                                    ${{$total}}
                                                </div>      
                                            </div> 
            
                                            <div class="row col-form-label">
                                                <label class="col-sm-3 col-form-label">Fecha de Inicio:</label>
                                                <div class="form-group bmd-form-group is-filled">
                                                    {{$cotizacion->fecha_inicio}}
                                                </div>      
                                            </div> 
                                            <div class="row col-form-label">
                                                <label class="col-sm-3 col-form-label">Fecha de Fin:</label>
                                                <div class="form-group bmd-form-group is-filled">
                                                    {{$cotizacion->fecha_fin}}
                                                </div>      
                                            </div> 
            
                                            <div class="row ">
                                              
                                               
                                                    <label class="col-sm-3 col-form-label">Horario: </label>      
                                               
                                                
                                                
                                                    @if($contador==0)
                                               
                                                    <div class="form-group bmd-form-group is-filled">
                                                        Horario Libre
                                                    </div>      
                                               
                                                    @endif 

                                                    @if($contador!=0)
                                                    {{-- ciclo for para recorrer hasta contador --}}
                                                    @for($i=0;$i<$contador;$i++)

                                                    <div class="form-group bmd-form-group is-filled col-sm-3">
                                                        {{$horarios[$i]}}
                                                    </div>

                                                    {{-- if para separar de 5 en 5 los horarios --}}
                                                    {{-- <div>
                                                        @if($i>=0 && $i<=4)

                                                        <div class="form-group bmd-form-group is-filled mx-3">
                                                            {{$horarios[$i]}}
                                                        </div>
    
                                                        @endif
                                                    </div>

                                                    <div>
                                                        @if($i>=4 && $i<=9)

                                                        <div class="form-group bmd-form-group is-filled mx-3">
                                                            {{$horarios[$i]}}
                                                        </div>
    
                                                        @endif
                                                    </div>

                                                    <div>
                                                        @if($i>=9 && $i<=14)

                                                        <div class="form-group bmd-form-group is-filled mx-3">
                                                            {{$horarios[$i]}}
                                                        </div>
    
                                                        @endif
                                                    </div>

                                                    <div>
                                                        @if($i>=14 && $i<=19)

                                                        <div class="form-group bmd-form-group is-filled mx-3">
                                                            {{$horarios[$i]}}
                                                        </div>
    
                                                        @endif
                                                    </div>

                                                    <div>
                                                        @if($i>=19 && $i<=24)

                                                        <div class="form-group bmd-form-group is-filled mx-3">
                                                            {{$horarios[$i]}}
                                                        </div>
    
                                                        @endif
                                                    </div>

                                                    <div>
                                                        @if($i>=24 && $i<=29)

                                                        <div class="form-group bmd-form-group is-filled mx-3">
                                                            {{$horarios[$i]}}
                                                        </div>
    
                                                        @endif
                                                    </div>

                                                    <div>
                                                        @if($i>=29 && $i<=34)

                                                        <div class="form-group bmd-form-group is-filled mx-3">
                                                            {{$horarios[$i]}}
                                                        </div>
    
                                                        @endif
                                                    </div>

                                                    <div>
                                                        @if($i>=34 && $i<=39)

                                                        <div class="form-group bmd-form-group is-filled mx-3">
                                                            {{$horarios[$i]}}
                                                        </div>
    
                                                        @endif
                                                    </div>

                                                    <div>
                                                        @if($i>=39 && $i<=44)

                                                        <div class="form-group bmd-form-group is-filled mx-3">
                                                            {{$horarios[$i]}}
                                                        </div>
    
                                                        @endif
                                                    </div>

                                                    <div>
                                                        @if($i>=44 && $i<=49)

                                                        <div class="form-group bmd-form-group is-filled mx-3">
                                                            {{$horarios[$i]}}
                                                        </div>
    
                                                        @endif
                                                    </div>

                                                    --}}
                                                    @endfor 
                                                    
                                                    @endif
                                                   
                                            </div>

                                                
                                                
                                        </div>
                                            
                                    </div>                                    
                                        {{-- otro card --}}
                                    <div class="card mx-auto col-md-5 col-sm-12">
                                        <div class="card-header card-header-primary">
                                            <h4 class="card-title">Respuesta a Solicitud</h4>
                                            <p class="card-category">Ingrese los datos de la Respuesta</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="row col-form-label">
                                                <label class="col-sm-2 col-form-label">Titulo: </label>
                                                <div class="form-group bmd-form-group is-filled">
                                                    {{$cotizacion->titulo}}
                                                </div>                                            
                                            </div>
                                            
                                            <div class="row col-form-label">
                                                <label class="col-sm-2 col-form-label">Respuesta: </label>
                                                
                                                   <div class="col-sm-10">
                                                        <textarea class="form-control" name="descripcion" id="textarea" rows="5">{{@old('descripcion')}}</textarea>
                                                   </div>
                                                                                          
                                            </div>
                                            <span style="color:red"><small>@error('descripcion'){{$message}}@enderror</small></span>

                                            <div class="row col-form-label">
                                                <label class="col-sm-3 col-form-label">Cantidad de Frases Diarias: </label>
                                                <div class="form-group bmd-form-group is-filled">
                                                    <input id="cantidad" name="cantidad" type="number" class="form-control text-center" value="{{@old('cantidad',$cotizacion->cantidad)}}">
                                                </div>                                            
                                            </div>
                                            <span style="color:red"><small>@error('cantidad'){{$message}}@enderror</small></span>

                                            <div class="row col-form-label">
                                                <label class="col-sm-3 col-form-label">Valor Unitario actual del Anuncio: </label>
                                                <div class="form-group bmd-form-group is-filled">
                                                    <input id="valor" name="valor" type="number" class="form-control text-center" value="{{old('valor',$cotizacion->valor)}}">
                                                </div>                                            
                                            </div>
                                            <span style="color:red"><small>@error('valor'){{$message}}@enderror</small></span>

                                            <div class="row col-form-label">
                                                <label class="col-sm-3 col-form-label">Bonificación: </label>
                                                <div class="form-group bmd-form-group is-filled">
                                                    <input id="extra" name="extra" type="number" class="form-control text-center" value="{{old('extra')}}">
                                                </div>                                            
                                            </div>
                                            <span id="alertaExtra" style="color:red; display:none"><small>La Cantidad de Frases Diarias sumadas a la Cantidad de Frases Extras no pueden ser mayor a 48</small></span>
                                            
                                            <div class="row col-form-label">
                                                <label class="col-sm-3 col-form-label">Precio Total: </label>
                                                <div class="form-group bmd-form-group is-filled">
                                                    <input id="precio" class="form-control text-center" name="precio" readonly style="border-radius: 25px;
                                                    background: rgb(240, 236, 236);
                                                    width: fit-content;font-weight: bold;">
                                                </div>                                            
                                            </div>
        
                                            {{-- fecha inicio y fin --}}
                                                
                                            
                                                
                                                <div class="row col-form-label">
                                                    <label class="col-sm-12 col-md-5 col-form-label">Fecha Inicio </label>
                                                    <div class="form-group bmd-form-group is-filled">
                                                        <input id="calendarioInicio" name="fecha_inicio" class="form-control" value="{{@old('fecha_inicio',$cotizacion->fecha_inicio)}}">
                                                    </div>                                            
                                                </div>
                                                <span style="color:red"><small>@error('fecha_inicio'){{$message}}@enderror</small></span>

                                               
                                                <div class="row col-form-label">
                                                    <label class="col-sm-12 col-md-5 col-form-label">Fecha Fin </label>
                                                    <div class="form-group bmd-form-group is-filled">
                                                        <input id="calendarioFin" name="fecha_fin" class="form-control" value="{{@old('fecha_fin',$cotizacion->fecha_fin)}}">
                                                    </div>                                            
                                                </div>
                                                <span style="color:red"><small>@error('fecha_fin'){{$message}}@enderror</small></span>

                                                
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary mx-auto">Enviar</button>
                            </div>
                        </form>
                        </div>
                    
            </div>
        </div>
    </div>  
</div>    




@section('js')



<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script><script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<script>
    
   
    $(document).ready(function(){

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
   
</script>
<script>
       //funcion para mantener el valor de #cantidad entre 0 y 48
        $(document).ready(function(){
            $('#cantidad').change(function(){
        if($('#cantidad').val()>48){
            $('#cantidad').val(48);
        }
        if($('#cantidad').val()<1){
            $('#cantidad').val(1);
        }
        });
        $('#valor').change(function(){
        if($('#valor').val()>5001){
            $('#valor').val(5000);
        }
        if($('#valor').val()<1){
            $('#valor').val(0);
        }
        });
        
        }); 
        
        $(document).ready(function(){
            //si valor comienza con 0 y es mayor a 0 eliminar el cero
            $('#valor').change(function(){
                if($('#valor').val()>0){
                    $('#valor').val($('#valor').val().replace(/^0+/, ''));
                }
            });
        });
    </script>
 
    <script>
    //if id cantidad val plus id extra val is equal or greater than 48 make id extra value max id cantidad val less 48
    $(document).ready(function(){
        $('#extra').change(function(){
       if($('#cantidad').val()+$('#extra').val()>48){
           var max = 48-$('#cantidad').val();
           //maximum value of extra is max
              $('#extra').attr('max',max);
              if($('#extra').val()>max){
                  $('#extra').val(max);
                  //show alertaExtra id
                    $('#alertaExtra').show('slow');
                   
              }
        
        }else{
            
            $('#alertaExtra').hide('slow');
        }
    });
    });
    
   
</script>

<script>
$(document).ready(function(){
        
        let distancia = 0;
        let total = 0;
        $('#calendarioInicio').change(function(){
            if($('#calendarioInicio').val()!=''){
           
            //#calendarioFin min value is #calendarioInicio value
            $('#calendarioFin').datepicker('option', 'minDate', $('#calendarioInicio').val());
            }
            
            //si calendarioInicio y calendarioFin son distintos de null y distintos de vacio entonces se calcula la distancia entre ellos
            if($('#calendarioInicio').val()!='' && $('#calendarioFin').val()!='' && $('#calendarioInicio').val()!=null && $('#calendarioFin').val()!=null && $('#cantidad').val()!='' && $('#cantidad').val()!=null && $('#valor').val()!=null && $('#valor').val()!=''){
                distancia = Math.abs(new Date($('#calendarioInicio').val()).getTime() - new Date($('#calendarioFin').val()).getTime());
                distancia = Math.ceil(distancia / (1000 * 3600 * 24));
                total = $('#cantidad').val()*distancia*$('#valor').val();
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
           
            
       
        });

        $('#calendarioFin').change(function(){
            if($('#calendarioFin').val()!=''){
           
            //#calendarioInicio max value is #calendarioFin value
            $('#calendarioInicio').datepicker('option', 'maxDate', $('#calendarioFin').val());
            }

            //si calendarioInicio y calendarioFin son distintos de null y distintos de vacio entonces se calcula la distancia entre ellos
            if($('#calendarioInicio').val()!='' && $('#calendarioFin').val()!='' && $('#calendarioInicio').val()!=null && $('#calendarioFin').val()!=null && $('#cantidad').val()!='' && $('#cantidad').val()!=null && $('#valor').val()!=null && $('#valor').val()!=''){
                distancia = Math.abs(new Date($('#calendarioInicio').val()).getTime() - new Date($('#calendarioFin').val()).getTime());
                distancia = Math.ceil(distancia / (1000 * 3600 * 24));
                total = $('#cantidad').val()*distancia*$('#valor').val();
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
            
    
        });

        $('#cantidad').change(function(){
            if($('#cantidad').val()>48){
               $('#cantidad').val(48);
            }
            if($('#cantidad').val()<0){
                $('#cantidad').val(1);
            }

            

            //si calendarioInicio y calendarioFin son distintos de null y distintos de vacio entonces se calcula la distancia entre ellos
            if($('#calendarioInicio').val()!='' && $('#calendarioFin').val()!='' && $('#calendarioInicio').val()!=null && $('#calendarioFin').val()!=null && $('#cantidad').val()!='' && $('#cantidad').val()!=null && $('#valor').val()!=null && $('#valor').val()!=''){
                distancia = Math.abs(new Date($('#calendarioInicio').val()).getTime() - new Date($('#calendarioFin').val()).getTime());
                distancia = Math.ceil(distancia / (1000 * 3600 * 24));
                total = $('#cantidad').val()*distancia*$('#valor').val();
                $('#precio').val('$'+total);
                

            }



        });

        $('#valor').change(function(){
            

            //si calendarioInicio y calendarioFin son distintos de null y distintos de vacio entonces se calcula la distancia entre ellos
            if($('#calendarioInicio').val()!='' && $('#calendarioFin').val()!='' && $('#calendarioInicio').val()!=null && $('#calendarioFin').val()!=null && $('#cantidad').val()!='' && $('#cantidad').val()!=null && $('#valor').val()!=null && $('#valor').val()!=''){
                distancia = Math.abs(new Date($('#calendarioInicio').val()).getTime() - new Date($('#calendarioFin').val()).getTime());
                distancia = Math.ceil(distancia / (1000 * 3600 * 24));
                total = $('#cantidad').val()*distancia*$('#valor').val();
                $('#precio').val('$'+total);
                

            }
        });   
        

       
        $(document).ready(function (){
             if($('#calendarioInicio').val()!='' && $('#calendarioFin').val()!='' && $('#calendarioInicio').val()!=null && $('#calendarioFin').val()!=null && $('#cantidad').val()!='' && $('#cantidad').val()!=null && $('#valor').val()!='' && $('#valor').val()!=null){
                distancia = Math.abs(new Date($('#calendarioInicio').val()).getTime() - new Date($('#calendarioFin').val()).getTime());
                distancia = Math.ceil(distancia / (1000 * 3600 * 24));
                total = $('#cantidad').val()*distancia*$('#valor').val();
                $('#precio').val('$'+total);
                

                
            }
        });

    });
</script>

@endsection
@endsection