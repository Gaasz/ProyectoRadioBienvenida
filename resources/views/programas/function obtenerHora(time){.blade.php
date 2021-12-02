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
    // $(document).ready(function(){
    //     $('input[type="checkbox"]').click(function(){
    //         var id = $(this).val();

    //         //switch para interpretar id
    //         switch(id){
    //             case '1':
    //                     id = 'LunesOculto';
                        
    //                 break;
    //             case '2':
    //                     id = 'MartesOculto';
    //                 break;
    //             case '3':
    //                     id = 'MiércolesOculto';
    //                 break;
    //             case '4':
    //                     id = 'JuevesOculto';
    //                 break;
    //             case '5':
    //                     id = 'ViernesOculto';
    //                 break;
    //             case '6':
    //                     id = 'SábadoOculto';
    //                 break;
    //             case '7':
    //                     id = 'DomingoOculto';
    //                 break;
    //         }

    //         var x = $('#'+id);
    //         if(x.css('display') == 'none'){
    //             x.css('display', 'block');
    //         }else{
    //             x.css('display', 'none');
    //         }

    //     });
    // });


    $(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            if($(this).is(":checked")){
                var id = $(this).val();

    //         //switch para interpretar id
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
            }
            else if($(this).is(":not(:checked)")){
                console.log("Checkbox is unchecked.");
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

            
@section('js')
<script>
    $('#imagen').change(function(){
           
        let reader = new FileReader();
        reader.onload = (e) => { 
            $('#preview-image').attr('src', e.target.result); 
        }
        reader.readAsDataURL(this.files[0]); 
    
    });