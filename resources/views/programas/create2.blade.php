@extends('layouts.main', ['activePage' => 'programas', 'titlePage' => 'Crear Nuevo Programa'])
@section('css')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
@endsection
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('programas.guardar') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                        <div class="card col-sm-12 col-md-12 mx-auto">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Crear Nuevo Programa</h4>
                                <p class="card-category">Ingresar Datos del Programa</p>
                            </div>
                            <div class="card-body">
                                <div class="row mt-3">
                                    <label for="primerNombre" class="col-sm-2 col-form-label">Nombre del Programa</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="nombreDelPrograma" placeholder="Ingresa el Nombre del Programa..." autofocus>
                                        <span style="color:red"><small>@error('primerNombre'){{$message}}@enderror</small></span>

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
                                                            <input name="dias[]" value="{{$dia->id}}" type="checkbox" class="form-check-input">
                                                            {{$dia->nombre}}
                                                        </label>
                                                        <div id="inputextra"></div>
                                                    </div>  
                                                </div>
                                            @endforeach
                                            
                                        </div>
                                        <span style="color: red"><small>@error('diasDeEmision'){{$message}}@enderror</small></span>

                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="horarios" class="col-sm-2 col-form-label">Horarios</label>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <ul>
                                                @foreach ($dias as $dia)
                                                    <div id="{{$dia->nombre}}Oculto" class="{{$dia->nombre}}Oculto" style="display:none">
                                                        <div class="row">
                                                            <li>{{$dia->nombre}}</li>
                                                        </div>
                                                       
                                                            <div class="row">
                                                                <div>
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control timepicker" id="inicio{{$dia->nombre}}" name="{{$dia->nombre}}_inicio" placeholder="Hora Inicio">
                                                                    </div>
                                                                </div>
                                                                &nbsp;
                                                                <div>
                                                                    <div class="form-group">
                                                                        <input type="text" class="timepicker form-control" id="fin{{$dia->nombre}}" name="{{$dia->nombre}}_fin" placeholder="Hora Fin" disabled >
                                                                    </div>
                                                                </div>
                                                                &nbsp;
                                                                
                                                                    {{-- boton agregar horario --}}
                                                                    <div>
                                                                        <div class="form-group my-auto">
                                                                            <button type="button" class="btn btn-primary btn-sm" id="{{$dia->nombre}}Add">
                                                                                <span class="material-icons">
                                                                                    add_circle
                                                                                </span>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                
                                                                  
                                                            </div>  
                                                            <div class="row"><span id="alerta1" style="color:red; display:none"><small>error</small></span></div>

                                                            <div>
                                                                <div class="row" id="eliminar{{$dia->nombre}}Oculto1" style="display: none">
                                                                    <div>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control timepicker" id="inicio{{$dia->nombre}}1" name="{{$dia->nombre}}_inicio1" placeholder="Hora Inicio">
                                                                        </div>
                                                                    </div>
                                                                    &nbsp;
                                                                    <div>
                                                                        <div class="form-group">
                                                                            <input disabled type="text"  class="timepicker form-control" id="fin{{$dia->nombre}}1" name="{{$dia->nombre}}_fin1" placeholder="Hora Fin">
                                                                        </div>
                                                                    </div>
                                                                    &nbsp;
                                                                    
                                                                       
                                                                    {{-- boton elimiar horario --}}

                                                                        <div>
                                                                            <div class="form-group my-auto">
                                                                                <button type="button" class="btn btn-danger btn-sm" id="{{$dia->nombre}}Remove">
                                                                                    <span class="material-icons">
                                                                                        remove
                                                                                    </span>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    
                                                                </div>  
                                                                <div class="row"><span id="alerta2" style="color:red; display:none"><small>error</small></span></div>

                                                                <div class="row" id="eliminar{{$dia->nombre}}Oculto2" style="display: none">
                                                                    <div>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control timepicker" id="inicio{{$dia->nombre}}2" name="{{$dia->nombre}}_inicio2" placeholder="Hora Inicio">
                                                                        </div>
                                                                    </div>
                                                                    &nbsp;
                                                                    <div>
                                                                        <div class="form-group">
                                                                            <input disabled class="timepicker form-control" id="fin{{$dia->nombre}}2" name="{{$dia->nombre}}_fin2" placeholder="Hora Fin">
                                                                        </div>
                                                                    </div>
                                                                    &nbsp;
                                                                    
                                                                        
                                                                    
                                                                       {{-- boton elimiar horario --}}
                                                                       <div>
                                                                        <div class="form-group my-auto">
                                                                            <button type="button" class="btn btn-danger btn-sm" id="{{$dia->nombre}}Remove">
                                                                                <span class="material-icons">
                                                                                    remove
                                                                                </span>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                                <div class="row"><span id="alerta3" style="color:red; display:none"><small>error</small></span></div>

                                                            </div>
                                                    </div>  
                                                @endforeach
                                            </ul>           
                                        </div>
                                                
                                            
                                    </div>
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
        change: obtenerHora
        
    });

    function obtenerHora(time){
        //reescribir esto despues
        id = $(this).attr('id');
        if(id.includes('inicio')){
            dia = id = id.replace('inicio', '');
            
        }else{
            dia = id = id.replace('fin', '');
            
        }
        var inicio1 = $('#inicio'+dia).val();
            var fin1 = $('#fin'+dia).val();
            if($('#inicio'+dia).val()!= ''){
            $('#fin'+dia).prop('disabled', false);
            }
            if(inicio1>=fin1 && fin1!=''){
                $('#fin'+dia).val(inicio1);
            }
            var inicio2 = $('#inicio'+dia+'1').val();
            var fin2 = $('#fin'+dia+'1').val();
            if($('#inicio'+dia+'1').val()!= ''){
                $('#fin'+dia+'1').prop('disabled', false);
            }if(inicio2>=fin2 && fin2!=''){
                $('#fin'+dia+'1').val(inicio2);
            }
            var inicio3 = $('#inicio'+dia+'2').val();
            var fin3 = $('#fin'+dia+'2').val();
            if($('#inicio'+dia+'2').val()!= ''){
                $('#fin'+dia+'2').prop('disabled', false);
            }if(inicio3>=fin3 && fin3!=''){
                $('#fin'+dia+'2').val(inicio3);
            }
        
    }

    
    //funcion para mostrar campos de horario cuando checkbox esta seleccionado
    $(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            var id = $(this).val();

            //switch para interpretar id
            switch(id){
                case '1':
                        id = 'LunesOculto';
                        
                    break;
                case '2':
                        id = 'MartesOculto';
                    break;
                case '3':
                        id = 'MiércolesOculto';
                    break;
                case '4':
                        id = 'JuevesOculto';
                    break;
                case '5':
                        id = 'ViernesOculto';
                    break;
                case '6':
                        id = 'SábadoOculto';
                    break;
                case '7':
                        id = 'DomingoOculto';
                    break;
            }

            var x = $('#'+id);
            if(x.css('display') == 'none'){
                x.css('display', 'block');
            }else{
                x.css('display', 'none');
            }

        });
    });
      //contador para cada dia de la semana
      let contlunes = 0;
    let contmartes = 0;
    let contmiercoles = 0;
    let contjueves = 0;
    let contviernes = 0;
    let contsabado = 0;
    let contdomingo = 0;    
    $(document).ready(function(){   
        $('button').click(function(event){
           
  

    //saber dia de la semana con el id
    var id = $(this).attr('id');
    //saber si es agregar o remover
    var accion = id.includes('Add');
    //eliminar el add o remove
    id = id.replace('Add', '');
    id = id.replace('Remove', '');

   
    
    //swith para saber el dia de la semana
    switch(id){
        case 'Lunes':
            if(accion){
                
                switch(contlunes){
                    case 0:
                        id = 'eliminar'+id+'Oculto1';
                        $('#'+id).show();
                        
                        contlunes++;
                        break;
                    case 1:
                        id = 'eliminar'+id+'Oculto2';
                        $('#'+id).show();
                        contlunes++;
                        break;
                    default:

                        break;
                }
            }else{
                
                switch(contlunes){
                    case 2:
                        id = 'eliminar'+id+'Oculto1';
                        $('#'+id).hide();
                        contlunes--;

                        break;
                    case 1:
                        id = 'eliminar'+id+'Oculto2';
                        $('#'+id).hide();
                        contlunes--;

                        break;
                    default:
                    id = 'eliminar'+id+'Oculto1';
                        $('#'+id).hide();
                        id = 'eliminar'+id+'Oculto2';
                        $('#'+id).hide();
                        break;
                        break;
                }
            }
        
            break;
        case 'Martes':
        if(accion){
                
                
                switch(contmartes){
                    case 0:
                        id = 'eliminar'+id+'Oculto1';
                        $('#'+id).show();
                        contmartes++;
                        break;
                    case 1:
                        id = 'eliminar'+id+'Oculto2';
                        $('#'+id).show();
                        contmartes++;
                        break;
                    default:

                        break;
                }
            }else{
                
                switch(contmartes){
                    case 2:
                        id = 'eliminar'+id+'Oculto1';
                        $('#'+id).hide();
                        contmartes--;

                        break;
                    case 1:
                        id = 'eliminar'+id+'Oculto2';
                        $('#'+id).hide();
                        contmartes--;

                        break;
                    default:
                    id = 'eliminar'+id+'Oculto1';
                        $('#'+id).hide();
                        id = 'eliminar'+id+'Oculto2';
                        $('#'+id).hide();
                        break;
                        break;
                }
            }
        
            break;
        case 'Miércoles':
        if(accion){
                
                
                switch(contmiercoles){
                    case 0:
                        id = 'eliminar'+id+'Oculto1';
                        $('#'+id).show();
                        contmiercoles++;
                        break;
                    case 1:
                        id = 'eliminar'+id+'Oculto2';
                        $('#'+id).show();
                        contmiercoles++;
                        break;
                    default:

                        break;
                }
            }else{
                
                switch(contmiercoles){
                    case 2:
                        id = 'eliminar'+id+'Oculto1';
                        $('#'+id).hide();
                        contmiercoles--;

                        break;
                    case 1:
                        id = 'eliminar'+id+'Oculto2';
                        $('#'+id).hide();
                        contmiercoles--;

                        break;
                    default:
                    id = 'eliminar'+id+'Oculto1';
                        $('#'+id).hide();
                        id = 'eliminar'+id+'Oculto2';
                        $('#'+id).hide();
                        break;
                        break;
                }
            }
        
            break;
        case 'Jueves':
        if(accion){
              
                
                switch(contjueves){
                    case 0:
                        id = 'eliminar'+id+'Oculto1';
                        $('#'+id).show();
                        contjueves++;
                        break;
                    case 1:
                        id = 'eliminar'+id+'Oculto2';
                        $('#'+id).show();
                        contjueves++;
                        break;
                    default:

                        break;
                }
            }else{
                
                switch(contjueves){
                    case 2:
                        id = 'eliminar'+id+'Oculto1';
                        $('#'+id).hide();
                        contjueves--;

                        break;
                    case 1:
                        id = 'eliminar'+id+'Oculto2';
                        $('#'+id).hide();
                        contjueves--;

                        break;
                    default:
                    id = 'eliminar'+id+'Oculto1';
                        $('#'+id).hide();
                        id = 'eliminar'+id+'Oculto2';
                        $('#'+id).hide();
                        break;
                        break;
                }
            }
        
            break;
        case 'Viernes':
        if(accion){
               
                switch(contviernes){
                    case 0:
                        id = 'eliminar'+id+'Oculto1';
                        $('#'+id).show();
                        contviernes++;
                        break;
                    case 1:
                        id = 'eliminar'+id+'Oculto2';
                        $('#'+id).show();
                        contviernes++;
                        break;
                    default:

                        break;
                }
            }else{
                
                switch(contviernes){
                    case 2:
                        id = 'eliminar'+id+'Oculto1';
                        $('#'+id).hide();
                        contviernes--;

                        break;
                    case 1:
                        id = 'eliminar'+id+'Oculto2';
                        $('#'+id).hide();
                        contviernes--;

                        break;
                    default:
                    id = 'eliminar'+id+'Oculto1';
                        $('#'+id).hide();
                        id = 'eliminar'+id+'Oculto2';
                        $('#'+id).hide();
                        break;
                        break;
                }
            }

            break;
        case 'Sábado':
        if(accion){
              
                
                switch(contsabado){
                    case 0:
                        id = 'eliminar'+id+'Oculto1';
                        $('#'+id).show();
                        contsabado++;
                        break;
                    case 1:
                        id = 'eliminar'+id+'Oculto2';
                        $('#'+id).show();
                        contsabado++;
                        break;
                    default:

                        break;
                }
            }else{
                
                switch(contsabado){
                    case 2:
                        id = 'eliminar'+id+'Oculto1';
                        $('#'+id).hide();
                        contsabado--;

                        break;
                    case 1:
                        id = 'eliminar'+id+'Oculto2';
                        $('#'+id).hide();
                        contsabado--;

                        break;
                    default:
                    id = 'eliminar'+id+'Oculto1';
                        $('#'+id).hide();
                        id = 'eliminar'+id+'Oculto2';
                        $('#'+id).hide();
                        break;
                        break;
                }
            }

            break;
        case 'Domingo':
        if(accion){
                
                
                switch(contdomingo){
                    case 0:
                        id = 'eliminar'+id+'Oculto1';
                        $('#'+id).show();
                        contdomingo++;
                        break;
                    case 1:
                        id = 'eliminar'+id+'Oculto2';
                        $('#'+id).show();
                        contdomingo++;
                        break;
                    default:

                        break;
                }
            }else{
                
                switch(contdomingo){
                    case 2:
                        id = 'eliminar'+id+'Oculto1';
                        $('#'+id).hide();
                        contdomingo--;

                        break;
                    case 1:
                        id = 'eliminar'+id+'Oculto2';
                        $('#'+id).hide();
                        contdomingo--;

                        break;
                       
                    default:
                    id = 'eliminar'+id+'Oculto1';
                        $('#'+id).hide();
                        id = 'eliminar'+id+'Oculto2';
                        $('#'+id).hide();
                        break;
                }
            }

            break;

         


    }

        
    });
    });

</script>

            




@endsection
@endsection
