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
                                            
                                            <div class="col-md-6 col-sm-6 text-left">
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="dias[]" value="{{$lunes->id}}" type="checkbox" class="form-check-input">Lunes
                                                    </label>
                                                    <div id="inputextra"></div>
                                                </div>  
                                            </div>
                                            <div class="col-md-6 col-sm-6 text-left">
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="dias[]" value="{{$martes->id}}" type="checkbox" class="form-check-input ">Martes
                                                    </label>
                                                    <div id="inputextra"></div>
                                                </div>  
                                            </div>
                                            <div class="col-md-6 col-sm-6 text-left">
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="dias[]" value="{{$miercoles->id}}" type="checkbox" class="form-check-input ">Miercoles
                                                    </label>
                                                    <div id="inputextra"></div>
                                                </div>  
                                            </div>
                                            <div class="col-md-6 col-sm-6 text-left">
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="dias[]" value="{{$jueves->id}}" type="checkbox" class="form-check-input ">Jueves
                                                    </label>
                                                    <div id="inputextra"></div>
                                                </div>  
                                            </div>
                                            <div class="col-md-6 col-sm-6 text-left">
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="dias[]" value="{{$viernes->id}}" type="checkbox" class="form-check-input ">Viernes
                                                    </label>
                                                    <div id="inputextra"></div>
                                                </div>  
                                            </div>
                                            <div class="col-md-6 col-sm-6 text-left">
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="dias[]" value="{{$sabado->id}}" type="checkbox" class="form-check-input ">Sabado
                                                    </label>
                                                    <div id="inputextra"></div>
                                                </div>  
                                            </div>
                                            <div class="col-md-6 col-sm-6 text-left">
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="dias[]" value="{{$domingo->id}}" type="checkbox" class="form-check-input ">Domingo
                                                    </label>
                                                    <div id="inputextra"></div>
                                                </div>  
                                            </div>
                                            
                                                
                                            
                                        </div>
                                        <span style="color: red"><small>@error('diasDeEmision'){{$message}}@enderror</small></span>

                                    </div>


                                   
                                    

                                </div>   

                                    
                                 {{-- input time para los dias de la semana --}}
                                    <div class="row mt-3">
                                        <label for="diasDeEmision" class="col-sm-2 col-form-label">Horario</label>
                                        <div class="col-md-4">
                                            <ul>
                                                {{-- lunes --}}
                                                <div class="dia lunes" style="display:none;">
                                                    <div class="row">
                                                        <div>
                                                             <li>
                                                                 <label for="lunes" class="col-form-label 1">Lunes</label>
                                                             </li>
                                                        </div>
                                                     </div>
                                                        <div>
                                                            <div class="row"  style="margin:auto">
                                                             {{-- inputs time para dia lunes --}}
                                                                <div>
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control timepicker" id="inicioLunes1" name="lunes_inicio" placeholder="Hora Inicio">
                                                                    </div>
                                                                </div>
                                                                &nbsp;
                                                                <div>
                                                                    <div class="form-group">
                                                                        <input class="timepicker form-control" id="finLunes1" name="lunes_fin" placeholder="Hora Fin">
                                                                    </div>
                                                                </div>
                                                                &nbsp;
                                                                {{-- boton agregar horario --}}
                                                                <div>
                                                                    <div class="form-group my-auto">
                                                                        <button type="button" class="btn btn-primary btn-sm" id="lunesAdd">
                                                                            <span class="material-icons">
                                                                                add_circle
                                                                            </span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="row lunes2" style="margin-left: auto; margin-right: 0; display:none;">
                                                                <div>
                                                                    <div class="form-group">
                                                                        <input class="timepicker form-control " name="lunes_inicio2" placeholder="Hora Inicio">
                                                                    </div>
                                                                </div>
                                                            &nbsp;
                                                                <div>
                                                                    <div class="form-group">
                                                                        <input class="timepicker form-control" name="lunes_fin2" placeholder="Hora Fin">
                                                                    </div>
                                                                </div>
                                                            &nbsp;
                                                            {{-- boton remover horario --}}
                                                                <div>
                                                                    <div class="form-group my-auto">
                                                                        <button type="button" class="btn btn-danger btn-sm removeLunes">
                                                                            <span class="material-icons">
                                                                                remove_circle
                                                                            </span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row lunes3" style="margin-left: auto; margin-right: 0; display:none;">
                                                                <div>
                                                                    <div class="form-group">
                                                                        <input class="timepicker form-control" name="lunes_inicio3" placeholder="Hora Inicio">
                                                                    </div>
                                                                </div>
                                                                &nbsp;
                                                                <div>
                                                                    <div class="form-group">
                                                                        <input class="timepicker form-control" name="lunes_fin3" placeholder="Hora Fin">
                                                                    </div>
                                                                </div>
                                                                &nbsp;
                                                            {{-- boton remover horario --}}
                                                                <div>
                                                                    <div class="form-group my-auto">
                                                                        <button type="button" class="btn btn-danger btn-sm removeLunes">
                                                                            <span class="material-icons">
                                                                                remove_circle
                                                                            </span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>

                                                {{-- martes --}}
                                                <div class="dia martes" style="display: none">
                                                    <div class="row">
                                                        <div>
                                                             <li>
                                                                 <label for="martes" class="col-form-label">Martes</label>
                                                             </li>
                                                        </div>
                                                     </div>
                                                     <div>
                                                         <div class="row"  style="margin:auto">
                                                             {{-- inputs time para dia martes --}}
                                                                <div>
                                                                    <div class="form-group">
                                                                        <input class="form-control timepicker" name="martes_inicio" placeholder="Hora Inicio">
                                                                    </div>
                                                                </div>
                                                                &nbsp;
                                                                <div>
                                                                    <div class="form-group">
                                                                        <input class="timepicker form-control" name="martes_fin" placeholder="Hora Fin">
                                                                    </div>
                                                                </div>
                                                                &nbsp;
                                                                {{-- boton agregar horario --}}
                                                                <div>
                                                                    <div class="form-group my-auto">
                                                                        <button type="button" class="btn btn-primary btn-sm" id="btn-agregar-horario">
                                                                            <span class="material-icons">
                                                                                add_circle
                                                                            </span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                         </div>
                                                         <div class="row" style="margin-left: auto; 
                                                         margin-right: 0;">
                                                            <div>
                                                                <div class="form-group">
                                                                    <input class="timepicker form-control " name="martes_inicio2" >
                                                                </div>
                                                            </div>
                                                            &nbsp;
                                                            <div>
                                                                <div class="form-group">
                                                                    <input class="timepicker form-control" name="martes_fin2" >
                                                                </div>
                                                            </div>
                                                            &nbsp;
                                                            {{-- boton remover horario --}}
                                                            <div>
                                                                <div class="form-group my-auto">
                                                                    <button type="button" class="btn btn-danger btn-sm" id="btn-remover-horario">
                                                                        <span class="material-icons">
                                                                            remove_circle
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            </div>
                                                            </div>
                                                            <div class="row" style="margin-left: auto;
                                                            margin-right: 0;">
                                                            <div>
                                                                <div class="form-group">
                                                                    <input class="timepicker form-control" name="martes_inicio3" >
                                                                </div>
                                                            </div>
                                                            &nbsp;
                                                            <div>
                                                                <div class="form-group">
                                                                    <input class="timepicker form-control" name="martes_fin3" >
                                                                </div>
                                                            </div>
                                                            &nbsp;
                                                            {{-- boton remover horario --}}
                                                            <div>
                                                                <div class="form-group my-auto">
                                                                    <button type="button" class="btn btn-danger btn-sm" id="btn-remover-horario">
                                                                        <span class="material-icons">
                                                                            remove_circle
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                    
                                                {{-- miercoles --}}
                                                <div class="dia miercoles"  style="display: none">
                                                    <div class="row">
                                                        <div>
                                                                <li>
                                                                    <label for="miercoles" class="col-form-label">Miercoles</label>
                                                                </li>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="row"  style="margin:auto">
                                                            {{-- inputs time para dia miercoles --}}
                                                            <div>
                                                                <div class="form-group">
                                                                    <input class="form-control timepicker" name="miercoles_inicio" placeholder="Hora Inicio">
                                                                </div>
                                                            </div>
                                                            &nbsp;
                                                            <div>
                                                                <div class="form-group">
                                                                    <input class="timepicker form-control" name="miercoles_fin" placeholder="Hora Fin">
                                                                </div>
                                                            </div>
                                                            &nbsp;
                                                            {{-- boton agregar horario --}}
                                                            <div>
                                                                <div class="form-group my-auto">
                                                                    <button type="button" class="btn btn-primary btn-sm" id="btn-agregar-horario">
                                                                        <span class="material-icons">
                                                                            add_circle
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row" style="margin-left: auto; margin-right: 0;">
                                                            <div>
                                                                <div class="form-group">
                                                                    <input class="timepicker form-control " name="miercoles_inicio2" >
                                                                </div>
                                                            </div>
                                                            &nbsp;
                                                            <div>
                                                                <div class="form-group">
                                                                    <input class="timepicker form-control" name="miercoles_fin2" >
                                                                </div>
                                                            </div>
                                                            &nbsp;
                                                        {{-- boton remover horario --}}
                                                            <div>
                                                                <div class="form-group my-auto">
                                                                    <button type="button" class="btn btn-danger btn-sm" id="btn-remover-horario">
                                                                        <span class="material-icons">
                                                                            remove_circle
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <div class="row" style="margin-left: auto; margin-right: 0;">
                                                        <div>
                                                            <div class="form-group">
                                                                <input class="timepicker form-control" name="miercoles_inicio3" >
                                                            </div>
                                                        </div>
                                                        &nbsp;
                                                        <div>
                                                            <div class="form-group">
                                                                <input class="timepicker form-control" name="miercoles_fin3" >
                                                            </div>
                                                        </div>
                                                        &nbsp;
                                                        {{-- boton remover horario --}}
                                                        <div>
                                                            <div class="form-group my-auto">
                                                                <button type="button" class="btn btn-danger btn-sm" id="btn-remover-horario">
                                                                    <span class="material-icons">
                                                                        remove_circle
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                {{-- jueves --}}
                                                <div class="dia jueves" style="display: none">
                                                    <div class="row">
                                                        <div>
                                                                <li>
                                                                    <label for="jueves" class="col-form-label">Jueves</label>
                                                                </li>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="row"  style="margin:auto">
                                                            {{-- inputs time para dia jueves --}}
                                                            <div>
                                                                <div class="form-group">
                                                                    <input class="form-control timepicker" name="jueves_inicio" placeholder="Hora Inicio">
                                                                </div>
                                                            </div>
                                                            &nbsp;
                                                            <div>
                                                                <div class="form-group">
                                                                    <input class="timepicker form-control" name="jueves_fin" placeholder="Hora Fin">
                                                                </div>
                                                            </div>
                                                            &nbsp;
                                                            {{-- boton agregar horario --}}
                                                            <div>
                                                                <div class="form-group my-auto">
                                                                    <button type="button" class="btn btn-primary btn-sm" id="btn-agregar-horario">
                                                                        <span class="material-icons">
                                                                            add_circle
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row" style="margin-left: auto; margin-right: 0;">
                                                            <div>
                                                                <div class="form-group">
                                                                    <input class="timepicker form-control " name="jueves_inicio2" >
                                                                </div>
                                                            </div>
                                                            &nbsp;
                                                            <div>
                                                                <div class="form-group">
                                                                    <input class="timepicker form-control" name="jueves_fin2" >
                                                                </div>
                                                            </div>
                                                            &nbsp;
                                                        {{-- boton remover horario --}}
                                                            <div>
                                                                <div class="form-group my-auto">
                                                                    <button type="button" class="btn btn-danger btn-sm" id="btn-remover-horario">
                                                                        <span class="material-icons">
                                                                            remove_circle
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <div class="row" style="margin-left: auto; margin-right: 0;">
                                                        <div>
                                                            <div class="form-group">
                                                                <input class="timepicker form-control" name="jueves_inicio3" >
                                                            </div>
                                                        </div>
                                                        &nbsp;
                                                        <div>
                                                            <div class="form-group">
                                                                <input class="timepicker form-control" name="jueves_fin3" >
                                                            </div>
                                                        </div>
                                                        &nbsp;
                                                        {{-- boton remover horario --}}
                                                        <div>
                                                            <div class="form-group my-auto">
                                                                <button type="button" class="btn btn-danger btn-sm" id="btn-remover-horario">
                                                                    <span class="material-icons">
                                                                        remove_circle
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                    
                                                {{-- viernes --}}
                                                <div class="dia viernes" style="display: none">
                                                    <div class="row">
                                                        <div>
                                                                <li>
                                                                    <label for="viernes" class="col-form-label">Viernes</label>
                                                                </li>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="row"  style="margin:auto">
                                                            {{-- inputs time para dia viernes --}}
                                                            <div>
                                                                <div class="form-group">
                                                                    <input class="form-control timepicker" name="viernes_inicio" placeholder="Hora Inicio">
                                                                </div>
                                                            </div>
                                                            &nbsp;
                                                            <div>
                                                                <div class="form-group">
                                                                    <input class="timepicker form-control" name="viernes_fin" placeholder="Hora Fin">
                                                                </div>
                                                            </div>
                                                            &nbsp;
                                                            {{-- boton agregar horario --}}
                                                            <div>
                                                                <div class="form-group my-auto">
                                                                    <button type="button" class="btn btn-primary btn-sm" id="btn-agregar-horario">
                                                                        <span class="material-icons">
                                                                            add_circle
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row" style="margin-left: auto; margin-right: 0;">
                                                            <div>
                                                                <div class="form-group">
                                                                    <input class="timepicker form-control " name="viernes_inicio2" >
                                                                </div>
                                                            </div>
                                                            &nbsp;
                                                            <div>
                                                                <div class="form-group">
                                                                    <input class="timepicker form-control" name="viernes_fin2" >
                                                                </div>
                                                            </div>
                                                            &nbsp;
                                                        {{-- boton remover horario --}}
                                                            <div>
                                                                <div class="form-group my-auto">
                                                                    <button type="button" class="btn btn-danger btn-sm" id="btn-remover-horario">
                                                                        <span class="material-icons">
                                                                            remove_circle
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <div class="row" style="margin-left: auto; margin-right: 0;">
                                                        <div>
                                                            <div class="form-group">
                                                                <input class="timepicker form-control" name="viernes_inicio3" >
                                                            </div>
                                                        </div>
                                                        &nbsp;
                                                        <div>
                                                            <div class="form-group">
                                                                <input class="timepicker form-control" name="viernes_fin3" >
                                                            </div>
                                                        </div>
                                                        &nbsp;
                                                        {{-- boton remover horario --}}
                                                        <div>
                                                            <div class="form-group my-auto">
                                                                <button type="button" class="btn btn-danger btn-sm" id="btn-remover-horario">
                                                                    <span class="material-icons">
                                                                        remove_circle
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                {{-- sabado --}}
                                                <div class="dia sabado" style="display: none">
                                                    <div class="row">
                                                        <div>
                                                                <li>
                                                                    <label for="sabado" class="col-form-label">Sabado</label>
                                                                </li>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="row"  style="margin:auto">
                                                            {{-- inputs time para dia sabado --}}
                                                            <div>
                                                                <div class="form-group">
                                                                    <input class="form-control timepicker" name="sabado_inicio" placeholder="Hora Inicio">
                                                                </div>
                                                            </div>
                                                            &nbsp;
                                                            <div>
                                                                <div class="form-group">
                                                                    <input class="timepicker form-control" name="sabado_fin" placeholder="Hora Fin">
                                                                </div>
                                                            </div>
                                                            &nbsp;
                                                            {{-- boton agregar horario --}}
                                                            <div>
                                                                <div class="form-group my-auto">
                                                                    <button type="button" class="btn btn-primary btn-sm" id="btn-agregar-horario">
                                                                        <span class="material-icons">
                                                                            add_circle
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row" style="margin-left: auto; margin-right: 0;">
                                                            <div>
                                                                <div class="form-group">
                                                                    <input class="timepicker form-control " name="sabado_inicio2" >
                                                                </div>
                                                            </div>
                                                            &nbsp;
                                                            <div>
                                                                <div class="form-group">
                                                                    <input class="timepicker form-control" name="sabado_fin2" >
                                                                </div>
                                                            </div>
                                                            &nbsp;
                                                        {{-- boton remover horario --}}
                                                            <div>
                                                                <div class="form-group my-auto">
                                                                    <button type="button" class="btn btn-danger btn-sm" id="btn-remover-horario">
                                                                        <span class="material-icons">
                                                                            remove_circle
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <div class="row" style="margin-left: auto; margin-right: 0;">
                                                        <div>
                                                            <div class="form-group">
                                                                <input class="timepicker form-control" name="sabado_inicio3" >
                                                            </div>
                                                        </div>
                                                        &nbsp;
                                                        <div>
                                                            <div class="form-group">
                                                                <input class="timepicker form-control" name="sabado_fin3" >
                                                            </div>
                                                        </div>
                                                        &nbsp;
                                                        {{-- boton remover horario --}}
                                                        <div>
                                                            <div class="form-group my-auto">
                                                                <button type="button" class="btn btn-danger btn-sm" id="btn-remover-horario">
                                                                    <span class="material-icons">
                                                                        remove_circle
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- domingo --}}
                                                <div class="dia domingo" style="display: none">
                                                    <div class="row">
                                                        <div>
                                                                <li>
                                                                    <label for="domingo" class="col-form-label">Domingo</label>
                                                                </li>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="row"  style="margin:auto">
                                                            {{-- inputs time para dia domingo --}}
                                                            <div>
                                                                <div class="form-group">
                                                                    <input class="form-control timepicker" name="domingo_inicio" placeholder="Hora Inicio">
                                                                </div>
                                                            </div>
                                                            &nbsp;
                                                            <div>
                                                                <div class="form-group">
                                                                    <input class="timepicker form-control" name="domingo_fin" placeholder="Hora Fin">
                                                                </div>
                                                            </div>
                                                            &nbsp;
                                                            {{-- boton agregar horario --}}
                                                            <div>
                                                                <div class="form-group my-auto">
                                                                    <button type="button" class="btn btn-primary btn-sm" id="btn-agregar-horario">
                                                                        <span class="material-icons">
                                                                            add_circle
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row" style="margin-left: auto; margin-right: 0;">
                                                            <div>
                                                                <div class="form-group">
                                                                    <input class="timepicker form-control " name="domingo_inicio2" >
                                                                </div>
                                                            </div>
                                                            &nbsp;
                                                            <div>
                                                                <div class="form-group">
                                                                    <input class="timepicker form-control" name="domingo_fin2" >
                                                                </div>
                                                            </div>
                                                            &nbsp;
                                                        {{-- boton remover horario --}}
                                                            <div>
                                                                <div class="form-group my-auto">
                                                                    <button type="button" class="btn btn-danger btn-sm" id="btn-remover-horario">
                                                                        <span class="material-icons">
                                                                            remove_circle
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <div class="row" style="margin-left: auto; margin-right: 0;">
                                                        <div>
                                                            <div class="form-group">
                                                                <input class="timepicker form-control" name="domingo_inicio3" >
                                                            </div>
                                                        </div>
                                                        &nbsp;
                                                        <div>
                                                            <div class="form-group">
                                                                <input class="timepicker form-control" name="domingo_fin3" >
                                                            </div>
                                                        </div>
                                                        &nbsp;
                                                        {{-- boton remover horario --}}
                                                        <div>
                                                            <div class="form-group my-auto">
                                                                <button type="button" class="btn btn-danger btn-sm" id="btn-remover-horario">
                                                                    <span class="material-icons">
                                                                        remove_circle
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                            
                                            

                                                   
                                                    
                                                    
                                                
                                                    



                                                
                                               

                                               
                                                
                                            </ul>
                                        </div>
                                    </div>
                                
                                
                            </div>
                            
                           
                            <span id="caca  "></span>

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
        //show horarios when check
        let dia;
        $('.form-check-input').click(function(){
            var id = $(this).val();
            if($(this).is(':checked')){
                console.log(id);
                //swith para interpretar el id
                switch(id){
                    case '1':
                        $('.lunes').show();
                        dia = 'lunes';
                        break;
                    case '2':
                        $('.martes').show();
                        dia = 'martes';
                        break;
                    case '3':
                        $('.miercoles').show();
                        dia = 'miercoles';
                        break;
                    case '4':
                        $('.jueves').show();
                        dia = 'jueves';
                        break;
                    case '5':
                        $('.viernes').show();
                        dia = 'viernes';
                        break;
                    case '6':
                        $('.sabado').show();
                        dia = 'sabado';
                        break;
                    case '7':
                        $('.domingo').show();
                        dia = 'domingo';
                        break;
                }
            }else{
                $('.dia').hide();
            }

            console.log(dia);

        });

        var contlunes = 0;
        var contmartes = 0;
        var contmiercoles = 0;
        var contjueves = 0;
        var contviernes = 0;
        var contsabado = 0;
        var contdomingo = 0;

        //agregar horario
        $('#lunesAdd').click(function(){

            if(contlunes<2 && contlunes>=0){
               //switch contlunes
                switch(contlunes){
                    
                    case 0:
                        $('.lunes2').show();
                        
                        break;
                    case 1:
                        $('.lunes3').show();
                        break;
                    
                }
                contlunes++;
                console.log(contlunes);
        }else{
            $('#lunesAdd').prop('disabled', true);
        }  
        });
        
        
        $('.removeLunes').click(function(){
           
        $(this).parent().parent().parent().hide();
        $('#lunesAdd').prop('disabled', false);

        contlunes--;

        });



        

    </script>
    
    <script>
        //lunes
        //obtener valor de timepicker inicioLunes1
        $('document').ready(function(){
            $('#inicioLunes1').timepicker({
                timeFormat: 'h:mm p',
                interval: 60
            });
            $('#inicioLunes1').on('ChangeTime', function(){
                console.log($(this).id);
            });
            });
        
    </script>


    @endsection
@endsection