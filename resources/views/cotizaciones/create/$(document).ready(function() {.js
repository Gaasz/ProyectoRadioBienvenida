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

<script>
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
    //reemplazar NaN por 0
    $(document).ready(function(){
        if(isNaN(distancia)){
            distancia = 0;
        }
    });
    
    //funcion para medir la cantidad de dias entre calendarioInicio y calendarioFin
    $('#calendarioFin').change(function(){
        distancia = Math.round((Date.parse($('#calendarioFin').val()) - Date.parse($('#calendarioInicio').val())) / 86400000);
    });

    $('#cantidad').change(function(){
            var cantidad = $('#cantidad').val();
            var valor = $('#valor').val();
            var total = cantidad * valor*distancia;
            //punto para separar unidad de mil
            $('#total').val(total);
            //si cantidad es igual a 48 se deshabilita el input extra
           

        });

        $('#valor').change(function(){
            var cantidad = $('#cantidad').val();
            var valor = $('#valor').val();
            var total = cantidad * valor*distancia;
            //punto para separar unidad de mil
            
            $('#total').val(total);
        });


});

</script>
