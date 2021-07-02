@extends('layouts.guest')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/elements_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/elements_responsive.css') }}">
@endsection
@section('contenido')
<div>
  <!-- Home -->
  <div class="home">
    <div class="home_background_container prlx_parent">
      <div class="home_background prlx" style="background-image:url(images/contact_background.jpg)"></div>
    </div>
    <div class="home_content">
      <h1>Trámites</h1>
    </div>
  </div>

  <!-- Elements -->
  <div class="elements">
    <div class="container">
      <div class="row icon_boxes_container">
        @foreach ($tramites as $proc)
        <div class="col-lg-4 icon_box text-left d-flex flex-column align-items-start justify-content-start">
          <div class="icon_container d-flex flex-column justify-content-end">
            <img src="images/{{$proc->nombre}}.svg" alt="">
          </div>
          <h3>{{$proc -> titulo}}</h3>
          <p>{{$proc -> descripcion}}</p>
          <div class="button button_color_1 text-center trans_200"><a href="{{$proc->ruta}}">Realizar Trámite</a></div>
        </div>
        @endforeach
      </div>
    </div>

  </div>
</div>


@endsection
