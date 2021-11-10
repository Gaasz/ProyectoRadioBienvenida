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
                                       
                                           <input type="file" name="imagen">
                                            
                                       
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
                                            
                                            @foreach ($dias as $dia)
                                            <div class="col-md-6 col-sm-6 text-left">
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="dias[{{$dia->id}}]" value="{{$dia->id}}" type="checkbox" class="form-check-input">{{$dia->nombre}}
                                                    </label>
                                                    <div id="inputextra"></div>
                                                </div>  
                                            </div>
                                                
                                            @endforeach
                                            
                                        </div>
                                        <span style="color: red"><small>@error('diasDeEmision'){{$message}}@enderror</small></span>

                                    </div>
                                    

                                    
                                </div>
                                {{-- <div class="row mt3">
                                    <label for="horario" class="col-sm-2 col-form-label">Horario</label>
                                    
                                        <div  class="col-md-2">
                                            <input id="hora1" type="text" class="timePicker">
                                        </div>
                                        <div  class="col-md-2">
                                            <input id="hora2" type="text" class="timePicker">
                                        </div>
                                        <span style="color: red"><small>@error('horario'){{$message}}@enderror</small></span>

                                        
                                    
                                </div> --}}
                                
                                
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-2">
                                        <input id="hora1" type="time" class="timePicker">
                                    </div>
                                    <div class="col-md-2">
                                        <input id="hora2" type="time" class="timePicker">
                                    </div>
                                    <div class="col-md-2 pb-6">
                                        <a id="addHour" class="btn btn-primary btn-sm addHour text-right">
                                            <i class="material-icons">add</i>
                                        </a>
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

@endsection

@section('js')
{{-- <script>


  
  $('.form-file-simple .inputFileVisible').click(function() {
    $(this).siblings('.inputFileHidden').trigger('click');
  });

  $('.form-file-simple .inputFileHidden').change(function() {
    var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
    $(this).siblings('.inputFileVisible').val(filename);
  });

  

  
</script> --}}


<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script>
   let inputhoramas = '<div class="row"><div class="col-md-2"><input id="hora1" type="time" class="timePicker"></div><div class="col-md-2"><input id="hora2" type="time" class="timePicker"></div><div class="col-md-2 pb-6"><a id="addHour" class="btn btn-primary btn-sm addHour text-right"><i class="material-icons">add</i></a></div></div>';
   let inputhoramenos = '<div class="row"><div class="col-md-2"><input id="hora1" type="time" class="timePicker"></div><div class="col-md-2"><input id="hora2" type="time" class="timePicker"></div><div class="col-md-2 pb-6"><a id="removeHour" class="btn btn-danger btn-sm removeHour text-right"><i class="material-icons">remove</i></a></div></div>';
   let i=0;
   //create input hour when checkbox dia is checked
    $('.form-check-input').change(function(){
        if($(this).is(':checked')){
            $('#inputextra').append(inputhoramas);

            // var horamin = document.getElementById('hora1');
            // var horamax = document.getElementById('hora2');

            // console.log(horamin);
            // console.log(horamax);
            
        }else{
           var inputhoraextra = $('#inputextra').children();
           inputhoraextra.eq(i).remove();           
        }
    });

    
    
    console.log(i); 
    //add input hour when click addHour
    $(document).on('click', '#addHour', function(){
        
        if(i<2){
            i=i+1;
            // $(this).parent().parent().append('<div class="col-md-4"><input id="hora1" type="time" class="timePicker"></div>');
            // $(this).parent().parent().append('<div class="col-md-4"><input id="hora2" type="time" class="timePicker"></div><a id="removeHour" class="btn btn-danger btn-sm removeHour my-auto"><i class="material-icons">remove</i></a>');
            $('#inputextra').append(inputhoramenos);
            
            console.log(i);
        }
        
    });

    //remove input hour when click removeHour
    $(document).on('click', '#removeHour', function(){
       if(i>0){
        
        
        
        var inputhoraextra = $('#inputextra').children();
        inputhoraextra.eq(i).remove();
        i=i-1;
       }
    });

    
   
    

</script>
<script>
    $(document).ready(function(){
    $('input.timepicker').timepicker({});
});
</script>

@endsection
