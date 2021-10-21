{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'login', 'title' => __('Radio Bienvenida')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-md-9 ml-auto mr-auto mb-3 text-center">
      <h3>{{ __('Ingrese su correo electronico para recibir un correo para restablecer su contraseña') }} </h3> 
    </div>
    <div class="col-lg-6 col-md-6 col-sm-8 ml-auto mr-auto">
      

        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title"><strong>{{ __('¿Olvidaste tu contraseña?') }}</strong></h4>
          </div>
          <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <br>
            <br>
             @if (session('status'))
                        <div class="alert alert-success mx-2 text-center" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Dirección de Correo Electronico') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="card-footer justify-content-center">
                <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('Enviar Correo') }}</button>
              </div>
            
        </form>
          
        </div>

      <div class="row">
       <div class="col-6 text-left">
          <a href="{{ route('login') }}" class="text-light">
              <small>{{ __('¿Ya tienes una cuenta? Ingresa') }}</small>
          </a>
      </div>
        <div class="col-6 text-right">
            <a href="{{ route('register') }}" class="text-light">
                <small>{{ __('Crear una nueva cuenta') }}</small>
            </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
