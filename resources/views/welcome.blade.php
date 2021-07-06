@extends('layouts.guest')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
@endsection
@section('contenido')
<!-- Home -->
<div class="home">

  <!-- Hero Slider -->
  <div class="hero_slider_container">
    <div class="hero_slider owl-carousel">
      <!-- Hero Slide -->
      <div class="hero_slide">
        <div class="hero_slide_background" style="background-image:url(images/slider_background.jpg)"></div>
        <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
          <div class="hero_slide_content text-center">
            <!-- <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Get your <span>Education</span> today!</h1> -->
          </div>
        </div>
      </div>
      <!-- Hero Slide -->
      <div class="hero_slide">
        <div class="hero_slide_background" style="background-image:url(images/slider_background.jpg)"></div>
        <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
          <div class="hero_slide_content text-center">
            <!-- <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Get your <span>Education</span> today!</h1> -->
          </div>
        </div>
      </div>
      <!-- Hero Slide -->
      <div class="hero_slide">
        <div class="hero_slide_background" style="background-image:url(images/slider_background.jpg)"></div>
        <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
          <div class="hero_slide_content text-center">
            <!-- <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">¡ La mejor <span>Education</span> !</h1> -->
          </div>
        </div>
      </div>
    </div>

    <div class="hero_slider_left hero_slider_nav trans_200"><span class="trans_200"><</span></div>
    <div class="hero_slider_right hero_slider_nav trans_200"><span class="trans_200">></span></div>
  </div>

</div>

<!-- News -->
<div class="news">
  <div class="container">
    <div class="row">

      <!-- News Column -->

      <div class="col-lg-8">

        <div class="news_posts">
          @foreach ($publicaciones as $post)
          <!-- News Post -->
          <div class="news_post">
            <div class="news_post_image">
              <img src="{{$post->imagen}}" alt="Imagen de la publicación">
            </div>
            <div class="news_post_top d-flex flex-column flex-sm-row">
              <div class="news_post_date_container">
                <div class="news_post_date d-flex flex-column align-items-center justify-content-center">
                  <div>{{date('d', strtotime($post -> fecha))}}</div>
                  <div>{{date('M', strtotime($post -> fecha))}}</div>
                </div>
              </div>
              <div class="news_post_title_container">
                <div class="news_post_title">
                  <a href="{{route('welcome.show', $post->idPublicacion)}}">{{$post -> titulo}}</a>
                </div>
                <div class="news_post_meta">
                  <span class="news_post_author"><a href="{{route('welcome.show', $post->idPublicacion)}}">By {{$post -> creador}}</a></span>
                  <span>|</span>
                  <span class="news_post_comments"><a href="{{route('welcome.show', $post->idPublicacion)}}">{{date('Y', strtotime($post -> fecha))}}</a></span>
                  <span>|</span>
                  <span class="news_post_comments"><a href="{{route('welcome.show', $post->idPublicacion)}}">{{$post -> vistas}} Vistas</a></span>
                </div>
              </div>
            </div>
            <div class="news_post_text">
              <p>{{$post -> texto}}</p>
            </div>
            <div class="news_post_button text-center trans_200">
              <a href="{{route('welcome.show', $post->idPublicacion)}}">Leer publicación</a>
            </div>
            <div class="news_post_button text-center trans_200">
              <a href="{{$post -> archivo}}" target="_blank">Descargar archivo adjunto</a>
            </div>
          </div>
          @endforeach
        </div>

        {{ $publicaciones->links('layouts.web.paginate') }}

        <!-- Page Nav -->

        <!-- <div class="news_page_nav">
          <ul>
            <li class="active text-center trans_200"><a href="#">01</a></li>
            <li class="text-center trans_200"><a href="#">02</a></li>
            <li class="text-center trans_200"><a href="#">03</a></li>
          </ul>
        </div> -->

      </div>

      <!-- Sidebar Column -->

      <div class="col-lg-4">
        <div class="sidebar">
          @include('layouts.web.sidebar')
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
