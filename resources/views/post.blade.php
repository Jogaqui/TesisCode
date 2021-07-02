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
    <h1>Publicación</h1>
  </div>
</div>

<!-- News -->

<div class="news">
  <div class="container">
    <div class="row">

      <!-- News Post Column -->

      <div class="col-lg-8">

        <div class="news_post_container">
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
                  <a href="#">{{$post -> titulo}}</a>
                </div>
                <div class="news_post_meta">
                  <span class="news_post_author"><a href="#">By {{$post -> creador}}</a></span>
                  <span>|</span>
                  <span class="news_post_comments"><a href="#">{{date('Y', strtotime($post -> fecha))}}</a></span>
                </div>
              </div>
            </div>

            <div class="tags d-flex flex-row flex-wrap">
              @foreach ($etiquetasPost as $tag)
              @foreach ($etiquetas as $itag)
              @if($tag->idEtiqueta == $itag->idEtiqueta)
              <div class="tag"><a href="{{route('welcome.showByTag', $itag->idEtiqueta)}}">{{$itag->descripcion}}</a></div>
              @endif
              @endforeach
              @endforeach
            </div>

            <div class="news_post_quote">
              <p class="news_post_quote_text"><span>E</span>tiam eu purus nec eros varius luctus. Praesent finibus risus facilisis ultricies venena tis. Suspendisse fermentum sodales lacus, lacinia gravida elit.</p>
            </div>

            <p class="news_post_text" style="margin-top: 59px;">{{$post -> texto}}</p>

            <div class="news_post_button text-center trans_200">
              <a href="{{$post -> archivo}}" target="_blank">Descargar archivo adjunto</a>
            </div>
          </div>

        </div>

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
