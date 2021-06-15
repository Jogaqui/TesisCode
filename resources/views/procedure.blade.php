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
        <div class="col-lg-4 icon_box text-left d-flex flex-column align-items-start justify-content-start">
          <div class="icon_container d-flex flex-column justify-content-end">
            <img src="images/exam.svg" alt="">
          </div>
          <h3>Indoor Courses</h3>
          <p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
          <div class="button button_color_1 text-center trans_200"><a href="#">Realizar Trámite</a></div>
        </div>

        <div class="col-lg-4 icon_box text-left d-flex flex-column align-items-start justify-content-start">
					<div class="icon_container d-flex flex-column justify-content-end">
						<img src="images/mortarboard.svg" alt="">
					</div>
					<h3>Graduate Diploma</h3>
					<p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
          <div class="button button_color_1 text-center trans_200"><a href="#">Realizar Trámite</a></div>
				</div>

        <div class="col-lg-4 icon_box text-left d-flex flex-column align-items-start justify-content-start">
					<div class="icon_container d-flex flex-column justify-content-end">
						<img src="images/professor.svg" alt="">
					</div>
					<h3>Exceptional Professors</h3>
					<p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
          <div class="button button_color_1 text-center trans_200"><a href="#">Realizar Trámite</a></div>
				</div>

      </div>
    </div>

  </div>
</div>


@endsection
