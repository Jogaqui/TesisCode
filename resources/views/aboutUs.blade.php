@extends('layouts.guest')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/contact_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/contact_responsive.css') }}">
@endsection
@section('contenido')
<!-- Home -->
<div class="home">
  <div class="home_background_container prlx_parent">
    <div class="home_background prlx" style="background-image:url(images/teachers_background.jpg)"></div>
  </div>
  <div class="home_content">
    <h1>Conócenos</h1>
  </div>
</div>

<!-- Contact -->
<div class="contact">
  <div class="container">
    <div class="row">
      @for ($i = 0; $i < 2; $i++)
      <div class="col-lg-6">
        <div class="about">
          <div class="about_title">{{$generalidades[$i]->nombre}}</div>
          <p class="about_text">{{$generalidades[$i]->detalles[0]->descripcion}}</p>
        </div>
      </div>
      @endfor
    </div>
    @for ($i = 2; $i < count($generalidades); $i++)
    <div class="row">
      <div class="col-lg-12">
        <div class="about">
          <div class="about_title">{{$generalidades[$i]->nombre}}</div>
          <p class="about_text">
            @foreach ($generalidades[$i]->detalles as $item)
            {{ $loop->index+1 }}. {{$item->descripcion}}<br>
            @endforeach
          </p>
        </div>
      </div>
    </div>
    @endfor
  </div>
</div>
@endsection
