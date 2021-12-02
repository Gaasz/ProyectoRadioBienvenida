//desbloquar calendario fin cuando se cambie el valor de calendarioInicio
   
    //reemplazar NaN por 0
    $(document).ready(function(){
       
        let distancia;
        $('#calendarioInicio').change(function(){
            if($('#calendarioFin').prop('disabled', false) && $('#calendarioFin').val()!=''){
                distancia = Math.round((Date.parse($('#calendarioFin').val()) - Date.parse($('#calendarioInicio').val())) / 86400000);
            }else{
                distancia = 0;
            }
            $('#calendarioFin').prop('disabled', false);
            
        });

        if(isNaN(distancia)){
            distancia = 0;
        }

          //funcion para medir la cantidad de dias entre calendarioInicio y calendarioFin
        $('#calendarioFin').change(function(){
            distancia = Math.round((Date.parse($('#calendarioFin').val()) - Date.parse($('#calendarioInicio').val())) / 86400000);
        });

        //funcion para medir la cantidad de dias entre calendarioFin  calendarioInicio 
        $('#calendarioInicio').change(function(){
            distancia = Math.round((Date.parse($('#calendarioFin').val()) - Date.parse($('#calendarioInicio').val())) / 86400000);
        });
    });
    
  

    

    //funcion para mantener el valor de #cantidad entre 0 y 48
   $(document).ready(function(){
    $('#cantidad').change(function(){
        if($('#cantidad').val()>48){
            $('#cantidad').val(48);
        }
        if($('#cantidad').val()<0){
            $('#cantidad').val(0);
        }
    });
    });


    


    

   
</script>

<script>

    //activar timepicker
    
    $('.timepicker').timepicker({
        timeFormat: 'h:mm p',
        interval: 30,
        dynamic: false,
        dropdown: true,
        scrollbar: true,
        // change: buscarRepetidos,
        
    });


    
    //calcular el precio total en base a la cantidad y al valor
    $(document).ready(function(){
        $('#cantidad').on('change', function(){
            var cantidad = $('#cantidad').val();
            var valor = $('#oferta').val();
            //eliminar el signo dolar de valor
            valor = valor.replace('$', '');
            valor = valor*1000;
            var total = cantidad*valor*distancia;
            //poner punto en total	
            total = total.toString();
            total = total.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            $('#precio').val('$'+total);
        });
    });
    
    
    
   
    // funcion buscarRepetidos
    function buscarRepetidos(){

        //bubble sort para recorrer todos los input id hora
        var horas = document.getElementsByClassName('timepicker');
        var horasArray = [];
       
    //     for(var i = 0; i < horas.length; i++){
    //         var cont = 0;
    //         for(var j = 0; j < horas.length; j++){
                
    //             if($('#hora'+i).val() == $('#hora'+j).val() && i != j && $('#hora'+i).val() != '' && $('#hora'+j).val() != ''){
    //                 // console.log($('#crear'));
    //                 // $('#crear').prop("disabled", true);
    //                 $('#horariorepetido'+i).show();
    //                 $('#horariorepetido'+j).show();
    //             }else{
    //                 cont++;
    //                 if(cont == horas.length){
    //                     $('#horariorepetido'+i).hide();
    //                     $('#horariorepetido'+j).hide();
    //                 }
    //             }
    //     }



    // }    
    }
    // //funcion on click time picker
    // $('.timepicker').on('click', function(){
    //     if($(this).val() == ''){
    //         var id = $(this).attr('id');
    //         console.log(id);
    //     }
    // });
    // if(horarios[i] == horarios[j] && i!=j && horarios[i]!='' && horarios[j]!=''){
    //                 $('#horariorepetido'+i).show();
    //                 $('#horariorepetido'+j).show();
    //             }
    
        
       
        
    



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
    
    //mostrar id horarios al seleccionar id seleccionar
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

 
   

        
        $('.btn-sm').click(function(){
            if($(this).attr('id').includes('agregar')){
                let id = $(this).attr('id').replace('agregar','');
                var cont = 0;
                var oculto;
                for(cont; cont < 48; cont++){
                    if($('#horario'+cont).is(':visible')){
                    }else{
                        oculto = cont;
                        
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