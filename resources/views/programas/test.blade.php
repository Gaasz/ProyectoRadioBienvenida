@extends('layouts.main', ['activePage' => 'programas', 'titlePage' => 'Crear Nuevo Programa'])
@section('css')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
@endsection
@section('content')

<div class="content">
    <div class="row">
        <div class="container-fluid">
            <div class="row">
               <input type="text" class="timepicker" id="timepicker1">
            </div>
            <div class="row">
                <input type="text" class="timepicker" id="timepicker2" disabled>
             </div>
             <div>
                 {{-- alerta --}}
                 <span style="color: red; display:none" id="error"><small>error</small></span>
             </div>
        </div>
    </div>
</div>

<button id="boton">
    CACACACA
</button>

@section('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script>
    $('.timepicker').timepicker({
        timeFormat: 'h:mm p',
        interval: 30,
        dynamic: false,
        dropdown: true,
        scrollbar: true,
        change: obtenerHora
        
    });

    
   
    function obtenerHora(time){
        var inicio = $('#timepicker1').val();
        var fin = $('#timepicker2').val();
        if($('timepicker1').val()!= ''){
            $('#timepicker2').prop('disabled', false);
        }
        if(inicio>=fin && fin!=''){
            $('#error').show();
            $('#timepicker2').val(inicio);

        }else{
            $('#error').hide();
        }
    }

    $('#boton').click(function(){
       $('#timepicker1').val('');
    });

 
</script>
@endsection

@endsection