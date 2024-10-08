@extends('layouts.guest')
@section('styles')
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/login_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">

@endsection
@section('contenido')
<div>

  <!-- Home -->
  <div class="home">

    <!-- Hero Slider -->
    <div class="hero_slider_container">
      <div class="hero_slider owl-carousel">
        <!-- Hero Slide -->
        <div class="hero_slide">
          <div class="hero_slide_background" style="background-image:url(images/search_background.jpg)"></div>
          <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center" style="height:100%">
            <div class="hero_slide_content text-center" style="padding-top: 60px">
               <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut"><span>Trámites</span></h1> 
            </div>
          </div>
        </div>
        <!-- Hero Slide -->
        <div class="hero_slide">
          <div class="hero_slide_background" style="background-image:url(images/search_background.jpg)"></div>
          <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center" style="height:100%">
            <div class="hero_slide_content text-center" style="padding-top: 60px">
               <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut"><span>Trámites</span></h1> 
            </div>
          </div>
        </div>
      
      </div>

     
    </div>
  
  </div>
  
 
  {{-- <div class="home">
    <div class="home_background_container prlx_parent">
      <div class="home_background prlx" style="background-image:url(images/background_unt_3.jpg)"></div>
    </div>
    <div class="home_content">
      <h1>Trámites</h1>
    </div>
  </div> --}}

  <!-- Trámites -->
  <div id="tramites" class="testimonials page_section" style="padding-top: 92px !important;">

		<!-- <div class="testimonials_background" style="background-image:url(images/testimonials_background.jpg)"></div> -->
		<div class="testimonials_background_container prlx_parent">
			<div class="testimonials_background prlx" style="background-image:url(images/milestones_background.jpg)"></div>
		</div>

    <div class="container">

      <div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Principales</h1>
					</div>
				</div>
			</div>

      <div class="row icon_boxes_container">
        @foreach ($tramites as $proc)
        <div class="col-lg-4 icon_box text-left d-flex flex-column align-items-start justify-content-start">
          <div class="icon_container d-flex flex-column justify-content-end">
            <img src="images/{{$proc->nombre}}.svg" alt="">
          </div>
          <h3 style="color: white">{{$proc -> titulo}}</h3>
          <p>{{$proc -> descripcion}}</p>
          <div class="button button_color_1 text-center trans_200"><a target="_blank" href="https://tramites-uraa.unitru.edu.pe/message">Realizar Trámite</a></div>
          <div class="button button_line_1 text-center trans_200"><a target="_blank" href="/storage/manuales/{{$proc->ruta}}">Ver Manual</a></div>
         
        </div>
        @endforeach
      </div>
    </div>
  </div>

  <!-- Descripcion e imagen URAA -->
  <div class="page_section" style="padding-top:0px; padding-bottom:0px; border: 2px solid #000000">

    <!-- Div modo register para tramites -->
      <div class="register">
    
        <div class="container-fluid">
          
          <div class="row row-eq-height">
            <div class="col-lg-6 nopadding">
              
              <!-- Register -->
    
              <div class="register_section d-flex flex-column align-items-center justify-content-center">
                <div class="register_content text-center">
                  <h1 class="register_title">Gestiona y realiza todos tus trámites en el <span>Sistema integrado de trámites URA</span>. Accede con tu cuenta y haz seguimiento a tus solicitudes desde cualquier dispositivo y donde quieras.</h1>
                
                  <div class="button button_1 register_button mx-auto trans_200"><a href="https://tramites-uraa.unitru.edu.pe">Ir al sistema</a></div>
                </div>
              </div>
    
            </div>
    
            <div class="col-lg-6 nopadding">
              
              <!-- Search -->
    
              <div class="search_section d-flex flex-column align-items-center justify-content-center">
                <div class="search_background" style="background-image:url(images/search_background.jpg);"></div>
                <div class="search_content text-center">
                  <img src="images/captura_uraa_login_smartphone-1.png" alt="Captura login URAA">
                </div> 
              </div>
    
            </div>
          </div>
        </div>
      </div>
    
  </div>

   <!-- Tutoriales -->
  <div id="procedure_tutorials" class="testimonials page_section" style="padding-top: 92px !important; ">

		<!-- <div class="testimonials_background" style="background-image:url(images/testimonials_background.jpg)"></div> -->
		<div class="testimonials_background_container prlx_parent">
			<div class="testimonials_background prlx" style="background-image:url(images/milestones_background.jpg)"></div>
		</div>

    <div class="container">

      <div class="row" style="margin-bottom: 36px;">
				<div class="col">
					<div class="section_title text-center">
						<h1>Tutoriales</h1>
					</div>
				</div>
			</div>

      <!-- TIPO TRAMITE - TUTORIALES DINAMICO -->
      <div class="row tag_fade_in mt-5">

        @foreach ($tipos_tramite as $tipo_tramite)
        <div class="row w-100 text-center align-items-center">
          <div class="col">
            <h2 class="" style="color: #ffb606; font-family:'Courier New', Courier, monospace">&#9658 <u>{{$tipo_tramite->descripcion}}</u></h2>
          </div>
          
        </div>

        <div class="col-lg-10 offset-lg-1">
					
					<div class="testimonials_slider_container">

						<!-- Multimedia Slider -->
						<div class="owl-carousel owl-theme testimonials_slider_2">
							@foreach ($tipo_tramite->multimedias as $item)
								<!-- Multimedia Item -->
								<div class="owl-item">
									<div class="testimonials_item text-center">
										<div class="container container_iframe" style="width: 640px; height: 400px;">
											<iframe class="responsive_iframe" width="100%" height="100%" src="{{$item->ruta}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
										</div>
										
	
										<div class="testimonial_user">
											
											<div class="testimonial_name">{{$item->titulo}}</div>
											<div class="testimonial_title">{{$item->descripcion}}</div>
										</div>
									</div>
								</div>
							@endforeach
							
						</div>

						<div class="multimedia_slider_left multimedia_slider_nav trans_200">
							<img class="rotated_180"  style="width: 65% !important;" src="{{ asset("images/next-button2.png")}}" alt="">
						</div>
						<div class="multimedia_slider_right multimedia_slider_nav trans_200">
							<img style="width: 65% !important;" src="{{ asset("images/next-button2.png")}}" alt="">
						</div>
					</div>
				</div>
        
        @endforeach

      </div>
    

    </div>
  </div>

  <!-- Guías -->
  <div class="page_section tag_fade_in" style="padding-bottom: 20px;">

    <div class="row">
      <div class="col">
        <div class="section_title text-center"  style="margin: 20px">
          <h1>Manuales</h1>
        </div>
      </div>
    </div>

    <div class="pbars_accordions">
			<div class="container">

				<div class="row pbars_accordions_container">
					<!-- Progress Bars & Accordions -->

					<div class="col">

						<!-- Accordions -->
						<div class="elements_accordions">

              <!-- TIPOS USUARIO MANUALES DINAMICO -->
             
              @foreach ($tipos_usuario as $tipo_usu)
							  <div class="accordion_container">
								  <div class="accordion d-flex flex-row align-items-center">{{$tipo_usu->nombre}}</div>
								  <div class="accordion_panel">

									  <div id="tramites_secretaria" class="row tag_fade_in icon_boxes_container">
                
                     @foreach ($tipo_usu->manuales as $item)
                        <div class="col-lg-4 icon_box text-left d-flex flex-column align-items-start justify-content-start">
                         <div class="icon_container d-flex flex-column justify-content-end">
                           <img src="images/books.svg" alt="">
                         </div>
                         <h3 style="">{{$item->titulo}}</h3>
                         <p style="margin-bottom: 20px">{{$item->descripcion}}</p>
                         <div class="button button_color_2 text-center trans_200"><a target="_blank" href="{{$item->ruta_manual}}">Ver Manual</a></div>
                        </div>
                        
                     @endforeach
                    
                   </div>
								  </div>
							  </div>
              @endforeach

						</div>
					</div>

				</div>
			</div>
		</div>
    <hr>
    
      
    
  </div>

</div>


@endsection
