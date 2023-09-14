@extends('layouts.guest')
@section('styles')

<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
@endsection
@section('contenido')

<div class="home">

  <!-- Hero Slider -->
  <div class="hero_slider_container">
    <div class="hero_slider owl-carousel">
      
      <!-- Hero Slide -->
      <div class="hero_slide">
        <div class="hero_slide_background" style="background-image:url(images/background_unt_nosotros_2.jpg)"></div>
        <div class="hero_slide_container_2 d-flex flex-column align-items-center">
          <div class="hero_slide_content text-center">
            <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut"><span>Conócenos</span></h1>
          </div>
        </div>
      </div>
      
      <!-- Hero Slide -->
      <div class="hero_slide">
        <div class="hero_slide_background" style="background-image:url(images/background_unt_nosotros_1.jpg)"></div>

        <div class="hero_slide_container_2 d-flex flex-column align-items-center justify-content-end">
          <div class="hero_slide_content text-center">
            <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut"><span>Conócenos</span></h1>
          </div>
        </div>
      </div>
      
    
    </div>

   
  </div>

</div>

{{-- Mision y vision --}}
<div class="page_section ">
		
  {{-- Mision --}}
  <div class="container tag_fade_in ">

    <div class="row">
      <div class="col">
        <div class="section_title text-center"  style="margin: 20px">
          <h1>Misión</h1>
        </div>
      </div>
    </div>

    <div class="tag_fade_in row align-items-center justify-content-center">

        <div class="tag_fade_in event_image d-flex flex-column justify-content-center w-50" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
          <img src="images/background_unt_4.jpg" alt="Imagen de Misión">
        </div>
        <h2 class="tag_fade_in text-center" style="margin-bottom: 80px; margin-top:40px">{{$generalidades[0]->detalles[0]->descripcion}}</h2>
    </div>

  </div>


  {{-- Visión --}}
  <div class="testimonials page_section">

    <!-- <div class="testimonials_background" style="background-image:url(images/testimonials_background.jpg)"></div> -->
		<div class="testimonials_background_container prlx_parent">
			<div class="testimonials_background prlx" style="background-image:url(images/milestones_background.jpg)"></div>
		</div>

    <div class="container tag_fade_in ">

      <div class="row">
        <div class="col">
          <div class="section_title text-center" style="margin: 20px; color: white">
            <h1>Visión</h1>
          </div>
        </div>
      </div>
  
      <div class="tag_fade_in  row align-items-center justify-content-center">
  
          <div class="tag_fade_in event_image d-flex flex-column justify-content-centerw w-50" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
            <img src="images/background_unt_8.jpg" alt="Imagen de Visión">
          </div>
          <h2 class="tag_fade_in text-center" style="margin-bottom: 20px; margin-top:40px; color: white;">{{$generalidades[1]->detalles[0]->descripcion}}</h2>
        
      </div>
      
    </div>
  </div>
 


  {{-- Funciones --}}
  <div class="container tag_fade_in ">

    <div class="row" style="margin-top: 80px; margin: 40px;">
      <div class="col">
        <div class="section_title text-center" >
          <h1>Funciones</h1>
        </div>
      </div>
    </div>

    @for ($i = 2; $i < count($generalidades); $i++)
    <div class="row tag_fade_in ">
      <div class="col-lg-12">
        <div class="about">
          <h3 class="about_text " style="margin: 10px">
            @foreach ($generalidades[$i]->detalles as $item)
            {{ $loop->index+1 }}. {{$item->descripcion}}<br><hr>
            @endforeach
          </h3>
        </div>
      </div>
    </div>
    @endfor


  </div>
</div>

{{-- 
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
</div> --}}



@endsection
