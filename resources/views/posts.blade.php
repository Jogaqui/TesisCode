@extends('layouts.guest')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/news_post_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/news_post_responsive.css') }}">
@endsection
@section('contenido')
<!-- Home -->

<div class="home">
  <div class="home_background_container prlx_parent">
    <div class="home_background prlx" style="background-image:url({{ asset('images/news_background.jpg') }})"></div>
  </div>
  <div class="home_content">
    <h1>{{$tag -> descripcion}}</h1>
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
              <a href="{{route('welcome.show', $post->idPublicacion)}}">Leer publicación</a>
            </div>
            <div class="news_post_button text-center trans_200">
              <a href="{{$post -> archivo}}">Descargar archivo adjunto</a>
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
