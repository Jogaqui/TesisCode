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
          <div class="contact_title">Ponerse en contacto</div>

          <div class="contact_form_container">
            <form method="post" action="{{route('consulta.store')}}">
            @csrf
              <input name="nombre" id="nombre" class="input_field contact_form_name" type="text" placeholder="Nombre" required="required" data-error="El nombre es requerido.">
              <input name="correo" id="correo" class="input_field contact_form_email" type="email" placeholder="Correo electrónico" required="required" data-error="Correo válido es requerido.">
              <textarea name="mensaje" id="mensaje" class="text_field contact_form_message" name="message" placeholder="Mensaje" required="required" data-error="Por favor, escríbenos un mensaje."></textarea>
              <button id="contact_send_btn" type="Submit" class="contact_send_btn trans_200" >enviar mensaje</button>
            </form>
          </div>
        </div>

      </div>

      <div class="col-lg-4">
        <div class="about">
          <div class="about_title">Dirección de registo técnico</div>
          <!-- <p class="about_text">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum. Etiam eu purus nec eros varius luctus. Praesent finibus risus facilisis ultricies. Etiam eu purus nec eros varius luctus.</p> -->

          <div class="contact_info">
            <ul>
              <li class="contact_info_item">
                <div class="contact_info_icon">
                  <img src="images/placeholder.svg" alt="https://www.flaticon.com/authors/lucy-g">
                </div>
                {{$contactanos['0']->direccion}}    
              </li>
              <li class="contact_info_item">
                <div class="contact_info_icon">
                  <img src="images/smartphone.svg" alt="https://www.flaticon.com/authors/lucy-g">
                </div>
                {{$contactanos['0']->telefono}}
              </li>
              <li class="contact_info_item">
                <div class="contact_info_icon">
                  <img src="images/envelope.svg" alt="https://www.flaticon.com/authors/lucy-g">
                </div>
                {{$contactanos['0']->correo}}
              </li>
            </ul>
          </div>

        </div>
      </div>

    </div>

    <!-- Google Map -->

    <!-- <div class="row">
    <div class="col">
    <div id="google_map">
    <div class="map_container">
    <div id="map"></div>
  </div>
</div>
</div>
</div> -->

</div>
</div>
@endsection
