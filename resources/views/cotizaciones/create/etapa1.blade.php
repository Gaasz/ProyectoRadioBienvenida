@extends('layouts.main', ['activePage' => 'cotizaciones', 'titlePage' => 'Crear Nueva Solicitud de Cotización'])
@section('css')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
@endsection
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('cotizaciones.guardar') }}" method="post" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    
                    <div class="card col-sm-12 col-md-12 mx-auto">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Nuevo Solicit de Cotización</h4>
                            <p class="card-category">Ingresar de la Solicitud</p>
                        </div>
                        <div class="card-body">
                            

                            <div class="row mt-3">
                                <label for="titulo" class="col-sm-2 col-form-label">Título de la Campaña</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="titulo" placeholder="Ingresa el Título de la Campaña..." autofocus >
                                    <span style="color:red"><small>@error('titulo'){{$message}}@enderror</small></span>

                                </div>
                                <label for="segundoNombre" class="col-sm-2 col-form-label">Valor Unitario actual del Anuncio</label>
                                <div class="col-sm-4">
                                    <div class="col-sm-4 form-control text-center pb-1" style="background-color:rgb(240, 236, 236); border-radius: 5px;">
                                        ${{$oferta}}
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="row mt-3">
                                <label for="descripcion" class="col-sm-2 col-form-label">Descripción de la Campaña</label>
                                <div class="col-sm-4">
                                    <textarea class="form-control" name="descripcion" rows="3" placeholder="Ingresa la descripción de la Campaña..."></textarea>
                                    <span style="color:red"><small>@error('descripcion'){{$message}}@enderror</small></span>

                                </div>
                                <label for="cantidad" class="col-sm-2 col-form-label">Cantidad de Anuncios</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control col-sm-2 text-center" name="cantidad" >
                                    <span style="color: red"><small>@error('cantidad'){{$message}}@enderror</small></span>
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
                            {{-- input time con boton agregar y eliminar --}}
                            <div class="row mt-3 mx-auto" id="horarios" style="display: none">
                                
                                @for($i=0; $i<47; $i++)
                                    
                                    @if($i==0)
                                        <div class="row" id="horario0">
                                            <div class="col-sm-6">
                                                <input class="form-control timepicker" id="hora{{$i}}" name="horario[]" placeholder="Ingresa el Horario...">
                                                <span style="color:red"><small>@error('horario'){{$message}}@enderror</small></span>
                                            </div>
                                            <div class="col-sm-6">
                                                <a class="btn btn-primary btn-sm" id="agregar0">
                                                    <span class="material-icons" style="color:white">
                                                        add_circle
                                                    </span>
                                                </a>
                                                <a class="btn btn-danger btn-sm" id="eliminar0">
                                                    <span class="material-icons" style="color:white">
                                                        remove_circle
                                                    </span>
                                                </a>
                                            </div>
                                            
                                        </div>
                                        {{-- <span style="color:red" id="horariorepetido0" style="display:none"><small>Horario Repetido</small></span> --}}

                                    @elseif($i>0 && $i<16)
                                        <div class="row" id="horario{{$i}}" style="display: none">
                                            <div class="col-sm-6">
                                                <input class="form-control timepicker" id="hora{{$i}}" name="horario[]" placeholder="Ingresa el Horario...">
                                                <span style="color:red"><small>@error('horario'){{$message}}@enderror</small></span>
                                            </div>
                                            <div class="col-sm-6">
                                                <a class="btn btn-primary btn-sm" id="agregar{{$i}}">
                                                    <span class="material-icons" style="color:white">
                                                        add_circle
                                                    </span>
                                                </a>
                                                <a class="btn btn-danger btn-sm" id="eliminar{{$i}}">
                                                    <span class="material-icons" style="color:white">
                                                        remove_circle
                                                    </span>
                                                </a>
                                            </div>
                                            
                                        </div>
                                        {{-- <span id="horariorepetido{{$i}}" style="color:red" style="display:none"><small>Horario Repetido</small></span> --}}

                                    @elseif($i>15 && $i<32)
                                        <div class="row" id="horario{{$i}}" style="display: none">
                                            <div class="col-sm-6">
                                                <input class="form-control timepicker" id="hora{{$i}}" name="horario[]" placeholder="Ingresa el Horario...">
                                                <span style="color:red"><small>@error('horario'){{$message}}@enderror</small></span>
                                            </div>
                                            <div class="col-sm-6">
                                                <a class="btn btn-primary btn-sm" id="agregar{{$i}}">
                                                    <span class="material-icons" style="color:white">
                                                        add_circle
                                                    </span>
                                                </a>
                                                <a class="btn btn-danger btn-sm" id="eliminar{{$i}}">
                                                    <span class="material-icons" style="color:white">
                                                        remove_circle
                                                    </span>
                                                </a>
                                            </div>
                                            
                                        </div>
                                        {{-- <span id="horariorepetido{{$i}}" style="color:red" style="display:none"><small>Horario Repetido</small></span> --}}

                                    @elseif($i>31 && $i<48)
                                        <div class="row" id="horario{{$i}}" style="display: none">
                                            <div class="col-sm-6">
                                                <input class="form-control timepicker" id="hora{{$i}} name="horario[]" placeholder="Ingresa el Horario...">
                                                <span style="color:red"><small>@error('horario'){{$message}}@enderror</small></span>
                                            </div>
                                            <div class="col-sm-6">
                                                <a class="btn btn-primary btn-sm" id="agregar{{$i}}">
                                                    <span class="material-icons" style="color:white">
                                                        add_circle
                                                    </span>
                                                </a>
                                                <a class="btn btn-danger btn-sm" id="eliminar{{$i}}">
                                                    <span class="material-icons" style="color:white">
                                                        remove_circle
                                                    </span>
                                                </a>
                                            </div>
                                            
                                        </div>
                                        {{-- <span id="horariorepetido{{$i}}" style="color:red" style="display:none"><small>Horario Repetido</small></span> --}}
                                    @endif
                                @endfor
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

    //activar timepicker
    
    $('.timepicker').timepicker({
        timeFormat: 'h:mm p',
        interval: 30,
        dynamic: false,
        dropdown: true,
        scrollbar: true,
        change: buscarRepetidos,
        
    });
    
    
    
    
    //funcion buscarRepetidos
    function buscarRepetidos(){
        var contador = 0;
        var limite = 47;
        var cantidad = $('.timepicker').toArray();
        for(contador; contador<cantidad.length; contador++){
            for(var j=contador+1; j<cantidad.length; j++){
                
                if(((cantidad[contador].value) == (cantidad[j].value)) && ((cantidad[contador].value) != '' && (cantidad[j].value) != '') && (contador != j)){
                    $(cantidad[j]).css('border-color', 'red');
                    $(cantidad[j]).css('border-width', '1px');
                    $(cantidad[j]).css('border-radius', '5px');
                    $(cantidad[j]).css('background-color', '#ffcdd2');
                    $(cantidad[j]).css('color', '#721c24');
                    $(cantidad[j]).css('padding', '0.5em');
                    $(cantidad[j]).css('margin-top', '0.5em');
                    $(cantidad[j]).css('margin-bottom', '0.5em');
                    $(cantidad[j]).css('border-color', 'red');
                    $(cantidad[j]).css('border-style', 'solid');
                    $(cantidad[j]).parent().append('');
                    $(cantidad[contador]).css('border-color', 'red');
                    $(cantidad[contador]).css('border-width', '1px');
                    $(cantidad[contador]).css('border-radius', '5px');
                    $(cantidad[contador]).css('background-color', '#ffcdd2');
                    $(cantidad[contador]).css('color', '#721c24');
                    $(cantidad[contador]).css('padding', '0.5em');
                    $(cantidad[contador]).css('margin-top', '0.5em');
                    $(cantidad[contador]).css('margin-bottom', '0.5em');
                    $(cantidad[contador]).css('border-color', 'red');
                    $(cantidad[contador]).css('border-style', 'solid');
                    $(cantidad[contador]).parent().append('<span style="color:red"><small>Horario Repetido</small></span>');
                    console.log('repetido');
                
            }
        }
        
    }

        // //bubblesort para recorrer de contador hasta limite 
        // for(let i=0; i<limite; i++){
        //     for(let j=0; j<limite; j++){
        //         if(i!=j){
        //             if($('#horario'+i).is(':visible') && $('#horario'+j).is(':visible')){
        //                 if($('#hora'+i).val() == $('#hora'+j).val()){
        //                     console.log('repetido');
        //                 }
        //         }
        //         }
        //     }
        // }
    }

    //mostrar id horarios al seleccionar id seleccionar
    $('#solicitar').click(function(){
        $('#etiquetaHorario').show('slow');
        $('#horarios').show('slow');
    });
    //esconder id horarios al seleccionar id libre
    $('#libre').click(function(){
        $('#etiquetaHorario').hide('slow');
        $('#horarios').hide();
    });

 
    $('#hora0').on('changeTime', function() {
            console.log($(this).val());
    });
   
    $('.btn-sm').click(function(){
        if($(this).attr('id').includes('agregar')){
            let id = $(this).attr('id').replace('agregar','');
            
            var masuno = parseInt(id) + 1;
            
            $('#horario'+masuno).show('slow');
        }else{
            let id = $(this).attr('id').replace('eliminar','');
            if(id!=0){
                $('#horario'+id).hide();
                $('#horario'+id).find('input').val('');
            }
        }
        // let limite = 48;
        // for(let i=0; i < limite;i++){
        //     for(let j = i+1; j < limite;j++){
        //         if(i!=j){
        //             if($('#horario'+i).is(':visible') && $('#horario'+j).is(':visible')){
        //                 console.log($('#horario'+i).find('input').val());
        //                 console.log($('#horario'+j).find('input').val());
        //                 if(($('#horario'+i).find('input').val() == $('#horario'+j).find('input').val()) && ($('#horario'+i).find('input').val() != '')){
        //                     $('#horario'+i).find('input').css('border','1px solid red');
        //                     $('#horario'+j).find('input').css('border','1px solid red');
        //                 }
        //             }
        //         }
        //         }
        //     }
        
        


    });
</script>
@endsection
@endsection