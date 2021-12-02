<div class="card col-sm-12 col-md-12 mx-auto">
                        
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Responder Solicitud de Cotizacion</h4>
                            <p class="card-category">Ingresar Datos de la Respuesta</p>
                        </div>
                        <div class="card-body">
                            {{-- aqui --}}

                       <div class="row">
                        <div class="card col-sm-12 col-md-5 mx-auto">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Solicitud de Cotizacion de {{$empresa->nombre_empresa}}</h4>
                                <p class="card-category">Información de la Solicitud</p>
                            </div>
                            <div class="card-body">
                                <div class="row mt-3 col-form-label">
                                    <label for="">Titulo: </label>
                                    <input type="text"  class="form-control lectura ml-3 col-md-12 text-center" value="{{$cotizacion->titulo}}" readonly >
                                </div>

                                <div class="row mt-3 col-form-label">
                                    <label for="">Descripcion: </label>
                                    <textarea name="descripcion" class="form-control lectura ml-3 col-md-12 text-center" rows="5" readonly>{{$cotizacion->descripcion}}</textarea>
                                </div>
                                
                                <div class="row mt-3">
                                    <label for="">Valor: </label>
                                    <input type="text" class="form-control lectura ml-3 text-center col-md-5  mx-auto" value="{{$cotizacion->valor}}" readonly>
                                    <label for="">Cantidad: </label>
                                    <input type="text" class="form-control lectura ml-3 text-center col-md-5  mx-auto" value="{{$cotizacion->cantidad}}" readonly>
                                    
                                </div>

                                <div class="row mt-3">
                                    <label for="">Precio Total: </label>
                                    <input type="text" class="form-control lectura ml-3 col-md-12 text-center" value="${{$cotizacion->cantidad * $cotizacion->valor}}" readonly>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-5">
                                        <label for="">Fecha Inicio: </label>
                                        <input type="text" class="form-control lectura ml-3 col-md-5 text-center" value="{{$cotizacion->fecha_inicio}}" readonly>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="">Fecha Fin: </label>
                                        <input type="text" class="form-control lectura ml-3 col-md-5 text-center" value="{{$cotizacion->fecha_fin}}" readonly>
                                    </div>
                                    
                                </div>

                                <div class="row mt-3">
                                  
                                    <label for="">Horario: </label>
                                    <div class="d-flex justify-content-evenly">
                                    @if($contador!=0)

                                       <div class="row"> 
                                            @if($contador>0 && $contador<5)
                                                @for($i=0; $i<$contador; $i++)
                                                    <input type="text" class="form-control lectura ml8 text-center" value="{{$horarios[$i]}}" readonly>
                                                @endfor
                                            @endif
                                        </div>

                                        <div class="row">
                                        @if($contador>=5 && $contador<10)
                                            @for($i=0; $i<$contador; $i++)
                                                <input type="text" class="form-control lectura ml-3 col-md-8 text-center" value="{{$horarios[$i]}}" readonly>
                                            @endfor
                                        @endif
                                        </div>

                                        <div class="row">
                                        @if($contador>=10 && $contador<15)
                                            @for($i=0; $i<$contador; $i++)
                                                <input type="text" class="form-control lectura ml-3 col-md-8 text-center" value="{{$horarios[$i]}}" readonly>
                                            @endfor
                                        @endif
                                        </div>  

                                        <div class="row">
                                            @if($contador>=15 && $contador<20)
                                            @for($i=0; $i<$contador; $i++)
                                                <input type="text" class="form-control lectura ml-3 col-md-8 text-center" value="{{$horarios[$i]}}" readonly>
                                            @endfor
                                            @endif
                                        </div>

                                       <div class="row">
                                        @if($contador>=20 && $contador<25)
                                        @for($i=0; $i<$contador; $i++)
                                            <input type="text" class="form-control lectura ml-3 col-md-8 text-center" value="{{$horarios[$i]}}" readonly>
                                        @endfor
                                        @endif
                                       </div>

                                        <div class="row">
                                            @if($contador>=25&& $contador<30)
                                            @for($i=0; $i<$contador; $i++)
                                                <input type="text" class="form-control lectura ml-3 col-md-8 text-center" value="{{$horarios[$i]}}" readonly>
                                            @endfor
                                        @endif  
                                        </div>

                                       <div class="row">
                                        @if($contador>=35 && $contador<40)
                                        @for($i=0; $i<$contador; $i++)
                                            <input type="text" class="form-control lectura ml-3 col-md-8 text-center" value="{{$horarios[$i]}}" readonly>
                                        @endfor
                                        @endif

                                       </div>

                                       <div class="row">
                                        @if($contador>=40 && $contador<45)
                                        @for($i=0; $i<$contador; $i++)
                                            <input type="text" class="form-control lectura ml-3 col-md-8 text-center" value="{{$horarios[$i]}}" readonly>
                                        @endfor
                                        @endif
                                       </div>

                                        <div class="row">
                                            @if($contador>=45 && $contador<48)
                                            @for($i=0; $i<$contador; $i++)
                                                <input type="text" class="form-control lectura ml-3 col-md-8 text-center" value="{{$horarios[$i]}}" readonly>
                                            @endfor
                                        @endif
                                        </div>
                                        
                                       
                                    </div>
                                   
                                    @elseif($contador==0)
                                        <input type="text" class="form-control lectura ml-3 col-md-12 text-center" value="Horario Libre" readonly>
                                    @endif
                                </div>
                                
                            </div>
                        </div>
                        
                            <div class="card col-sm-12 col-md-5 mx-auto">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Respuesta a Solicitud</h4>
                                    <p class="card-category">Ingrese los datos de la Respuesta</p>
                                </div>
                                <div class="card-body">
                                    <div class="row mt-3 col-form-label">
                                        <label for="">Respuestaa: {{$cotizacion->titulo}}</label>
                                    </div>
                                    
                                    <div class="row mt-3 d-flex justify-content-evenly">
                                        <div>
                                            <label for="">Valor </label>
                                            <input name="valor" id="valor" type="number" class="form-control lectura ml-3 col-md-5 text-center">
                                            <span style="color:red"><small>@error('valor'){{$message}}@enderror</small></span>

                                        </div>
                                        <div class="div">
                                            <label for="">Cantidad: </label>
                                            <input name="cantidad" id="cantidad" type="number" class="form-control lectura ml-3 col-md-5 text-center">
                                                <span style="color:red"><small>@error('cantidad'){{$message}}@enderror</small></span>
                                        </div>
                                    </div>

                                    <div class="row mt-3 mx-auto">
                                        <label for="extras">Frases Extras: </label>
                                        <input type="number" name="extras" class="form-control ml-3 text-center">
                                    </div>
                                    
                                    <div class="row mt-3 mx-auto">
                                        <label for="">Precio Total: </label>
                                        <input id="total" class="form-control ml-3 text-center" readonly>
                                    </div>

                                    <div class="row mt-3">
                                        
                                        <label for="descripcion">Descripción: </label>
                                        <textarea name="descripcion" class="form-control lectura col-md-12 ml-3" rows="5"></textarea>
                                        <span style="color:red"><small>@error('descripcion'){{$message}}@enderror</small></span>

                                    
                                    </div>

                                    {{-- fecha inicio y fin --}}
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <label for="">Fecha Inicio: </label>
                                            <input name="fecha_inicio" class="form-control lectura ml-3 col-md-12 text-center datepicker" id="calendarioInicio">
                                            <span style="color:red"><small>@error('fecha_inicio'){{$message}}@enderror</small></span>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Fecha Fin: </label>
                                            <input name="fecha_fin" class="form-control lectura ml-3 col-md-12 text-center datepicker" id="calendarioFin" disabled>
                                            <span style="color:red"><small>@error('fecha_fin'){{$message}}@enderror</small></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                       </div>


                            
                       
                        </div>
                        <div class="card-footer mx-auto">
                            <button id="crear" type="submit" class="btn btn-primary">Crear</button>
                        </div>
                    
                </div>