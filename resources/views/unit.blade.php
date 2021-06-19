@extends('layouts.guest')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/teachers_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/teachers_responsive.css') }}">
@endsection
@section('contenido')
<!-- Home -->
<div class="home">
  <div class="home_background_container prlx_parent">
    <div class="home_background prlx" style="background-image:url(images/teachers_background.jpg)"></div>
  </div>
  <div class="home_content">
    <h1>Unidades</h1>
  </div>
</div>

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
      <div class="teachers page_section">
        <div class="container">
          <div class="row">

            @foreach($trabajador as $itemT)
              @if($item->idUnidad===$itemT->idUnidad)
                <!-- Teacher -->
                <div class="col-lg-4 teacher">
                  <div class="card">
                    <div class="card_img">
                      <div class="card_plus trans_200 text-center"><a href="#">+</a></div>
                      <img class="card-img-top trans_200" src="images/teacher_1.jpg" alt="https://unsplash.com/@michaeldam">
                    </div>
                    <div class="card-body text-center">
                      <div class="card-title"><a href="#">{{$itemT->apPaterno}} {{$itemT->apMaterno}} {{$itemT->nombres}}</a></div>
                      <div class="card-text">Graphic Designer</div>
                      <div class="teacher_social">
                        <ul class="menu_social">
                          <li class="menu_social_item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                          <li class="menu_social_item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                          <li class="menu_social_item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                          <li class="menu_social_item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                          <li class="menu_social_item"><a href="#"><i class="fab fa-twitter"></i></a></li>
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
