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
      <div class="col-lg-6">
        <div class="about">
          <div class="about_title">Misión</div>
          <p class="about_text">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum. Etiam eu purus nec eros varius luctus. Praesent finibus risus facilisis ultricies. Etiam eu purus nec eros varius luctus.</p>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="about">
          <div class="about_title">Visión</div>
          <p class="about_text">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum. Etiam eu purus nec eros varius luctus. Praesent finibus risus facilisis ultricies. Etiam eu purus nec eros varius luctus.</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="about">
          <div class="about_title">Funciones</div>
          <p class="about_text">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum. Etiam eu purus nec eros varius luctus. Praesent finibus risus facilisis ultricies. Etiam eu purus nec eros varius luctus.</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
