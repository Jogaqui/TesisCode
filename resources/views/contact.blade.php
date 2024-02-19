@extends('layouts.guest')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/contact_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/contact_responsive.css') }}">

@endsection
@section('contenido')
<!-- Home -->
<div class="home">
  <div class="home_background_container prlx_parent">
    <div class="home_background prlx" style="background-image:url(images/contact_background.jpg)"></div>
  </div>
  <div class="home_content">
    <h1>Contáctanos</h1>
  </div>
</div>



<!-- Contact -->
<div class="contact">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">

        <!-- Contact Form -->
        <div class="contact_form">
          <div class="contact_title">Póngase en contacto</div>

          <div class="contact_form_container">
            <form method="post" action="{{route('contact.store')}}">
            @csrf
            <select class="input_field contact_form_name @error('idUnidad') is-invalid @enderror" id="idUnidad" name="idUnidad" required >
              <option value="">Seleccionar Unidad responsable...</option>
              @foreach($unidad as $itemunidad)
              <option value="{{$itemunidad['idUnidad']}}">{{$itemunidad['descripcion']}}</option>
              @endforeach
            </select>

            @error('idUnidad')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            <input name="nombre" id="nombre" class="input_field contact_form_name" type="text" placeholder="Nombre" pattern="^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s]+$"  required="required" data-error="El nombre es requerido.">

            <input name="correo" id="correo" class="input_field contact_form_email" type="email" placeholder="Correo electrónico" pattern="^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$" required="required" data-error="Correo válido es requerido.">

            <textarea name="mensaje" id="mensaje" class="text_field contact_form_message" name="message" placeholder="Mensaje" required="required" data-error="Por favor, escríbenos un mensaje."></textarea>

            <p style="color: red;">*IMPORTANTE: La respuesta a su consulta será enviada a su correo registrado. Por favor, revisar sus correos no deseados o bandeja de spam</p>

            <!-- BOTON SUBMIT -->
            <button id="contact_send_btn" type="Submit" class="contact_send_btn trans_200" >enviar mensaje</button>
            </form>
          </div>
        </div>

      </div>

      <div class="col-lg-4">
        <div class="about">
          <div class="about_title">Unidad de Registro Académico - Administrativo</div>

          <div class="contact_info">
            <ul>
              <li class="contact_info_item">
                <div class="contact_info_icon">
                  <img src="images/placeholder.svg" alt="Icono ubicación">
                </div>
                {{$info->direccion}}
              </li>
              <li class="contact_info_item">
                <div class="contact_info_icon">
                  <img src="images/smartphone.svg" alt="Ícono teléfono">
                </div>
                {{$info->telefono}}
              </li>
              <li class="contact_info_item">
                <div class="contact_info_icon">
                  <img src="images/envelope.svg" alt="Ícono mensaje">
                </div>
                {{$info->correo}}
              </li>
            </ul>
          </div>

        </div>
      </div>

    </div>

    <!-- Google Map -->

    <div class="row">
      <div class="col">
        <div id="google_map">
          <div class="map_container">
            <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1974.9258285253195!2d-79.04047269801454!3d-8.11658267824718!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91ad3d75835ec69b%3A0xbf4e534a98519bbb!2sOficina%20General%20de%20Admisi%C3%B3n%20UNT!5e0!3m2!1ses-419!2spe!4v1625770069276!5m2!1ses-419!2spe" width="100%" height="90%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>

</div>
</div>
@endsection
