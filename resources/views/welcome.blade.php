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
            <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Get your <span>Education</span> today!</h1>
          </div>
        </div>
      </div>
      <!-- Hero Slide -->
      <div class="hero_slide">
        <div class="hero_slide_background" style="background-image:url(images/slider_background.jpg)"></div>
        <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
          <div class="hero_slide_content text-center">
            <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Get your <span>Education</span> today!</h1>
          </div>
        </div>
      </div>
      <!-- Hero Slide -->
      <div class="hero_slide">
        <div class="hero_slide_background" style="background-image:url(images/slider_background.jpg)"></div>
        <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
          <div class="hero_slide_content text-center">
            <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">¡ La mejor <span>Education</span> !</h1>
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
                  <a href="news_post.html">{{$post -> titulo}}</a>
                </div>
                <div class="news_post_meta">
                  <span class="news_post_author"><a href="#">By {{$post -> creador}}</a></span>
                  <span>|</span>
                  <span class="news_post_comments"><a href="#">{{date('Y', strtotime($post -> fecha))}}</a></span>
                  <!-- <span class="news_post_comments"><a href="#">3 Comments</a></span> -->
                </div>
              </div>
            </div>
            <div class="news_post_text">
              <p>{{$post -> texto}}</p>
            </div>
            <div class="news_post_button text-center trans_200">
              <a href="news_post.html">Leer publicación</a>
            </div>
            <div class="news_post_button text-center trans_200">
              <a href="news_post.html">Descargar archivo adjunto</a>
            </div>
          </div>
          @endforeach
        </div>

        <!-- Page Nav -->

        <div class="news_page_nav">
          <ul>
            <li class="active text-center trans_200"><a href="#">01</a></li>
            <li class="text-center trans_200"><a href="#">02</a></li>
            <li class="text-center trans_200"><a href="#">03</a></li>
          </ul>
        </div>

      </div>

      <!-- Sidebar Column -->

      <div class="col-lg-4">
        <div class="sidebar">

          <!-- Archives -->
          <!-- <div class="sidebar_section">
            <div class="sidebar_section_title">
              <h3>Archives</h3>
            </div>
            <ul class="sidebar_list">
              <li class="sidebar_list_item"><a href="#">Design Courses</a></li>
              <li class="sidebar_list_item"><a href="#">All you need to know</a></li>
              <li class="sidebar_list_item"><a href="#">Uncategorized</a></li>
              <li class="sidebar_list_item"><a href="#">About Our Departments</a></li>
              <li class="sidebar_list_item"><a href="#">Choose the right course</a></li>
            </ul>
          </div> -->

          <!-- Latest Posts -->

          <div class="sidebar_section">
            <div class="sidebar_section_title">
              <h3>Últimas publicaciones</h3>
            </div>

            <div class="latest_posts">

              <!-- Latest Post -->
              @foreach ($top as $post)
              <div class="latest_post">
                <div class="latest_post_image">
                  <img src="{{$post->imagen}}" alt="Imagen de las últimas publicaciones">
                </div>
                <div class="latest_post_title"><a href="news_post.html">{{$post -> titulo}}</a></div>
                <div class="latest_post_meta">
                  <span class="latest_post_author"><a href="#">By {{$post -> creador}}</a></span>
                  <span>|</span>
                  <span class="latest_post_comments"><a href="#">{{date('Y', strtotime($post -> fecha))}}</a></span>
                  <!-- <span class="latest_post_comments"><a href="#">3 Comments</a></span> -->
                </div>
              </div>
              @endforeach
            </div>

          </div>

          <!-- Tags -->

          <div class="sidebar_section">
            <div class="sidebar_section_title">
              <h3>Etiquetas</h3>
            </div>
            <div class="tags d-flex flex-row flex-wrap">
              @foreach ($etiquetas as $tag)
              <div class="tag"><a href="#">{{$tag->descripcion}}</a></div>
              @endforeach
              <!-- <div class="tag"><a href="#">Design</a></div>
              <div class="tag"><a href="#">FAQ</a></div>
              <div class="tag"><a href="#">Teachers</a></div>
              <div class="tag"><a href="#">School</a></div>
              <div class="tag"><a href="#">Graduate</a></div> -->
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection
