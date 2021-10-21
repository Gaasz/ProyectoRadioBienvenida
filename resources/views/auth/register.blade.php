@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'register', 'title' => __('Radio Bienvenida')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-lg-8 col-md-6 col-sm-8 ml-auto mr-auto">
      <form class="formulario-registro" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title"><strong>{{ __('Registro') }}</strong></h4>
          </div>
          <div class="card-body ">
           <div class="row">
            <div class="col-md-6">
              <!--Registro información Personal-->
                          <div class="text-center my-3">
                              <h3>Datos Personales</h3>
                          </div>
                          <div class="bmd-form-group{{ $errors->has('primerNombre') ? ' has-danger' : '' }}">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">face</i>
                                </span>
                              </div>
                              <input type="text" name="primerNombre" class="form-control" placeholder="{{ __(' Primer Nombre...') }}" value="{{ old('primerNombre') }}"  autofocus>
                            </div>
                            @if ($errors->has('primerNombre'))
                              <div id="primerNombre-error" class="error text-danger pl-3" for="primerNombre" style="display: block;">
                                <strong>{{ $errors->first('primerNombre') }}</strong>
                              </div>
                            @endif
                          </div>
                          <div class="bmd-form-group{{ $errors->has('segundoNombre') ? ' has-danger' : '' }} mt-3">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                      <i class="material-icons">face</i>
                                  </span>
                                </div>
                                <input type="text" name="segundoNombre" class="form-control" placeholder="{{ __('Segundo Nombre...') }}" value="{{ old('segundoNombre') }}" >
                              </div>
                              @if ($errors->has('segundoNombre'))
                                <div id="segundoNombre-error" class="error text-danger pl-3" for="segundoNombre" style="display: block;">
                                  <strong>{{ $errors->first('segundoNombre') }}</strong>
                                </div>
                              @endif
                            </div>
                            <div class="bmd-form-group{{ $errors->has('apellidoPaterno') ? ' has-danger' : '' }} mt-3">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                      <i class="material-icons">face</i>
                                  </span>
                                </div>
                                <input type="text" name="apellidoPaterno" class="form-control" placeholder="{{ __('Apellido Paterno...') }}" value="{{ old('apellidoPaterno') }}" >
                              </div>
                              @if ($errors->has('apellidoPaterno'))
                                <div id="apellidoPaterno-error" class="error text-danger pl-3" for="apellidoPaterno" style="display: block;">
                                  <strong>{{ $errors->first('apellidoPaterno') }}</strong>
                                </div>
                              @endif
                            </div>
                            <div class="bmd-form-group{{ $errors->has('apellidoMaterno') ? ' has-danger' : '' }} mt-3">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                      <i class="material-icons">face</i>
                                  </span>
                                </div>
                                <input type="text" name="apellidoMaterno" class="form-control" placeholder="{{ __('Apellido Materno...') }}" value="{{ old('apellidoMaterno') }}" >
                              </div>
                              @if ($errors->has('apellidoMaterno'))
                                <div id="apellidoMaterno-error" class="error text-danger pl-3" for="apellidoMaterno" style="display: block;">
                                  <strong>{{ $errors->first('apellidoMaterno') }}</strong>
                                </div>
                              @endif
                            </div>
                          <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="material-icons">email</i>
                                </span>
                              </div>
                              <input type="email" name="email" class="form-control" placeholder="{{ __('Correo Electronico...') }}" value="{{ old('email') }}" >
                            </div>
                            @if ($errors->has('email'))
                              <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                                <strong>{{ $errors->first('email') }}</strong>
                              </div>
                            @endif
                          </div>
              
                          <div class="bmd-form-group{{ $errors->has('telefono') ? ' has-danger' : '' }} mt-3">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="material-icons">phone</i>
                                  </span>
                                </div>
                                <input type="number" name="telefono" class="form-control" placeholder="{{ __('Número Telefónico...') }}" value="{{ old('telefono') }}" >
                              </div>
                              @if ($errors->has('telefono'))
                                <div id="telefono-error" class="error text-danger pl-3" for="telefono" style="display: block;">
                                  <strong>{{ $errors->first('telefono') }}</strong>
                                </div>
                              @endif
                            </div>
                            
                          <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="material-icons">lock_outline</i>
                                </span>
                              </div>
                              <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Contraseña...') }}" >
                            </div>
                            @if ($errors->has('password'))
                              <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                                <strong>{{ $errors->first('password') }}</strong>
                              </div>
                            @endif
                          </div>
                          <div class="bmd-form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }} mt-3">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="material-icons">lock_outline</i>
                                </span>
                              </div>
                              <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Conformar Contraseña...') }}" >
                            </div>
                            @if ($errors->has('password_confirmation'))
                              <div id="password_confirmation-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                              </div>
                            @endif
                          </div>
                          {{-- <div class="form-check mr-auto ml-3 mt-3">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" id="policy" name="policy" {{ old('policy', 1) ? 'checked' : '' }} >
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                              {{ __('I agree with the ') }} <a href="#">{{ __('Privacy Policy') }}</a>
                            </label>  
                          </div> --}}
                        </div>


                        <div class="col-md-6">
                          <!--Registro información Empresa-->
                                      <div class="text-center my-3">
                                          <h3>Datos Empresa</h3>
                                      </div>
                                      <div class="bmd-form-group{{ $errors->has('nombreEmpresa') ? ' has-danger' : '' }}">
                                        <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">business</i>
                                            </span>
                                          </div>
                                          <input type="text" name="nombreEmpresa" class="form-control" placeholder="{{ __(' Nombre Empresa') }}" value="{{ old('nombreEmpresa') }}" >
                                        </div>
                                        @if ($errors->has('nombreEmpresa'))
                                          <div id="nombreEmpresa-error" class="error text-danger pl-3" for="nombreEmpresa" style="display: block;">
                                            <strong>{{ $errors->first('nombreEmpresa') }}</strong>
                                          </div>
                                        @endif
                                      </div>
                                      <div class="bmd-form-group{{ $errors->has('direccion') ? ' has-danger' : '' }} mt-3">
                                          <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                  <i class="material-icons">location_on</i>
                                              </span>
                                            </div>
                                            <input type="text" name="direccion" class="form-control" placeholder="{{ __('Dirección') }}" value="{{ old('direccion') }}" >
                                          </div>
                                          @if ($errors->has('direccion'))
                                            <div id="direccion-error" class="error text-danger pl-3" for="direccion" style="display: block;">
                                              <strong>{{ $errors->first('direccion') }}</strong>
                                            </div>
                                          @endif
                                        </div>
                                        <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }} mt-3">
                                          <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                  <i class="material-icons">business</i>
                                              </span>
                                            </div>
                                            {{-- <input type="text" name="name" class="form-control" placeholder="{{ __('Tipo Empresa') }}" value="{{ old('name') }}" required> --}}
                                            <div class="form-group">
                                              <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" >
                                                <option selected>Seleccione Rubro de la Empresa</option>
                                                <option>Supermercado</option>
                                                <option>Ferreterias</option>
                                                <option>Mecanicos</option>
                                                <option>Comunicaciones</option>
                                                <option>Otros</option>
                                              </select>
                                            </div>
                                          </div>
                                          @if ($errors->has('name'))
                                            <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                                              <strong>{{ $errors->first('name') }}</strong>
                                            </div>
                                          @endif
                                        </div>
                                        <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }} mt-3">
                                          <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                  <i class="material-icons">business</i>
                                              </span>
                                            </div>
                                            {{-- <input type="text" name="name" class="form-control" placeholder="{{ __('Rubro Empresa') }}" value="{{ old('name') }}" required> --}}
                                            <div class="form-group">
                                              <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect2" >
                                                <option >Seleccione Tipo de Empresa</option>
                                                <option>Micro</option>
                                                <option>Pequeña</option>
                                                <option>Mediana</option>
                                                <option>Grande</option>
                                              </select>
                                            </div>
                                          </div>
                                          @if ($errors->has('name'))
                                            <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                                              <strong>{{ $errors->first('name') }}</strong>
                                            </div>
                                          @endif
                                        </div>
                                   
                                    
                                
                                      
                                      {{-- <div class="form-check mr-auto ml-3 mt-3">
                                        <label class="form-check-label">
                                          <input class="form-check-input" type="checkbox" id="policy" name="policy" {{ old('policy', 1) ? 'checked' : '' }} >
                                          <span class="form-check-sign">
                                            <span class="check"></span>
                                          </span>
                                          {{ __('I agree with the ') }} <a href="#">{{ __('Privacy Policy') }}</a>
                                        </label>  
                                      </div> --}}
                                    </div>

           </div>
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('Crear Cuenta') }}</button>
          </div>
        </div>
        <div class="col-8 text-left">
          <a href="{{ route('login') }}" class="text-light">
              <small>{{ __('¿Ya tienes una cuenta? Ingresa') }}</small>
          </a>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection

{{-- @section('js')
<script>

  $('.formulario-registro').submit(function(e){
      e.preventDefault();

      Swal.fire({
          title: '¿Todos los datos estan correctos?',
          text: "Deberias asegurarte",
          icon: 'question',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Cancelar',
          confirmButtonText: 'Si, crear cuenta'
          }).then((result) => {
          if (result.isConfirmed) {
              
                  this.submit();
              
          }
})

      
      
          
  });

  
</script>
@endsection --}}
