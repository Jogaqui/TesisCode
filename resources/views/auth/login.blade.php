@extends('layouts.guest')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/login_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/teachers_responsive.css') }}">
@endsection
@section('contenido')
<!-- Home -->
<div class="home">
  <div class="home_background_container prlx_parent">
    <div class="home_background prlx" style="background-image:url(images/teachers_background.jpg)"></div>
  </div>
  <div class="home_content">
    <h1>Intranet</h1>
  </div>
</div>

<!-- Login -->
<div class="register">
  <div class="container-fluid">
    <div class="row row-eq-height">
      <div class="col-lg-6 nopadding">
        <div class="register_section d-flex flex-column align-items-center justify-content-center">
          <div class="register_content text-center">
            <p class="register_text"> <br><br> </p>
            <h1 class="register_title"> {{ __('Login') }} al sistema <span>intranet</span> de la Dirección de Registro Técnico</h1>
            <p class="register_text"> Para poder acceder al gestor de contenido de la Dirección de Registro Técnico, debe ingresar sus credenciales otorgadas por el administrador de este sitio web.</p><br><br>
            <h1 class="register_title"><span>MUCHAS GRACIAS</span></h1>
          </div>
        </div>
      </div>
      <div class="col-lg-6 nopadding">
        <!-- Search -->
        <div class="search_section d-flex flex-column align-items-center justify-content-center">
          <div class="search_background" style="background-image:url(images/search_background.jpg);"></div>
          <div class="search_content text-center">
            <h1 class="search_title">Iniciar Sesión</h1>
            <form method="POST" action="{{ route('login') }}" class="search_form">
                @csrf
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="input_field search_form_degree @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="input_field search_form_degree @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                  <div class="col-md-6 offset-md-4">
                    <button type="submit" class="search_submit_button trans_200">
                      {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                  </div>
                </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
