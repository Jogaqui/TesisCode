@extends('layouts.guest')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/teachers_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/teachers_responsive.css') }}">
@endsection
@section('contenido')
<!-- Home -->
<div class="home">

  <!-- Hero Slider -->
  <div class="hero_slider_container">
    <div class="hero_slider owl-carousel">
      <!-- Hero Slide -->
      <div class="hero_slide">
        <div class="hero_slide_background" style="background-image:url(images/teachers_background.jpg)"></div>
        <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center" style="height:100%">
          <div class="hero_slide_content text-center" style="padding-top: 60px">
             <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut"><span>Unidades</span></h1> 
          </div>
        </div>
      </div>
      <!-- Hero Slide -->
      <div class="hero_slide">
        <div class="hero_slide_background" style="background-image:url(images/teachers_background.jpg)"></div>
        <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center" style="height:100%">
          <div class="hero_slide_content text-center" style="padding-top: 60px">
             <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut"><span>Unidades</span></h1> 
          </div>
        </div>
      </div>
    
    </div>

  </div>

</div>

{{-- <div class="home">
  <div class="home_background_container prlx_parent">
    <div class="home_background prlx" style="background-image:url(images/teachers_background.jpg)"></div>
  </div>
  <div class="home_content">
    <h1>Unidades</h1>
  </div>
</div> --}}

<div class="services page_section">
  <div class="container">

    @foreach($unidad as $item)
      <div class="row">
        <div class="col">
          <div class="section_title text-center">
            <h1>{{$item->descripcion}}</h1>
          </div>
        </div>
      </div>


      <!-- Teachers -->
      <div class="teachers page_section ">
        <div class="container ">
          <div class="row justify-content-center">

            @foreach($trabajador as $itemT)
              @if($item->idUnidad===$itemT->idUnidad)
                <!-- Teacher -->
                <div class="col-lg-4 teacher">
                  <div class="card">
                    <div class="card_img">
                      <div class="trans_200 text-center"></div>
                      <img class="card-img-top trans_200" src="{{$itemT->imagen}}" alt="">
                    </div>
                    <div class="card-body text-center">
                      <div class="card-title"><a href="#">{{$itemT->abrevGrado}} {{$itemT->apPaterno}} {{$itemT->apMaterno}}, {{$itemT->nombres}}</a></div>
                      <div class="card-text"><h3>{{$itemT -> puesto}}</h3></div>
                      <div class="card-text"><h8>{{$itemT -> correo}}</h8></div>
                      <div class="teacher_social">
                        <ul class="menu_social">
                          <!-- <li class="menu_social_item"><a href="#"><i class="fab fa-pinterest"></i></a></li> -->
                          <li class="menu_social_item"><a href="{{$itemT->linkedin}}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                          <!-- <li class="menu_social_item"><a href="#"><i class="fab fa-instagram"></i></a></li> -->
                          <li class="menu_social_item"><a href="{{$itemT->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                          <!-- <li class="menu_social_item"><a href="#"><i class="fab fa-twitter"></i></a></li> -->
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              @endif
            @endforeach
          </div>
        </div>
      </div>
    @endforeach

  </div>
</div>
@endsection
