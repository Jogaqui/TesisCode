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
<div>

  <!-- Home -->
  <div class="home">

    <!-- Hero Slider -->
    <div class="hero_slider_container">
      <div class="hero_slider owl-carousel">
        
        <!-- Hero Slide -->
        <div class="hero_slide">
          <div class="hero_slide_background" style="background-image:url(images/background_unt_9.jpg)"></div>
          <div class="hero_slide_container_2 d-flex flex-column align-items-center justify-content-center">
            <div class="hero_slide_content text-center">
              <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut"><span>Normativas</span></h1>
            </div>
          </div>
        </div>
        
        <!-- Hero Slide -->
        <div class="hero_slide">
          <div class="hero_slide_background" style="background-image:url(images/background_unt_9.jpg)"></div>
  
          <div class="hero_slide_container_2 d-flex flex-column align-items-center justify-content-center">
            <div class="hero_slide_content text-center">
              <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut"><span>Normativas</span></h1>
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

  <!-- Descripcion e imagen URAA -->
  <div class="page_section" style="padding-top:0px; padding-bottom:0px;">

    <!-- Div modo register para tramites -->
      <div class="register">
    
        <div class="container-fluid">
          
          <div class="row row-eq-height">
            <div class="col-lg-6 nopadding">
              
              <!-- Texto -->
    
              <div class="register_section d-flex flex-column align-items-center justify-content-center">
                <div class="register_content text-center">

                  <h1 class="register_title"><span>Normativas Institucionales y Nacionales</span></h1><br><br>

                  <h2 class="register_title">Resoluciones y directivas aplicadas por nuestra casa superior de estudios <span>Universidad Nacional de Trujillo.</span> Brindado bajo la gestión y direccionamiento del Consejo universitario y Rectorado así como para su desempeño en el rubro académico-administrativo.</h2>
                
                  <br><br>
                  <div class="button button_color_2 text-center trans_200"><a href="{{url('normativas')}}#normativas_vigentes">Normativas Vigentes</a></div>
                  <br><br>
                  <div class="button button_line_2 text-center trans_200"><a href="{{url('normativas')}}#normativas_pasadas">Normativas Pasadas</a></div>
                </div>
              </div>
    
            </div>
    
            <div class="col-lg-6 nopadding">
              
              <!-- Search -->
    
              <div class="search_section d-flex flex-column align-items-center justify-content-center">
                <div class="search_background" style="background-image:url(images/search_background.jpg);"></div>
                <div class="search_content text-center">
                  <img src="images/normativas_2.png" alt="Imagen Normativa 1 UNT" width="110%">
                </div> 
              </div>
    
            </div>
          </div>
        </div>
      </div>
    
  </div>


  <!-- Normativas Vigentes -->
  <div id="normativas_vigentes" class="page_section tag_fade_in" style="padding-bottom: 20px;">

    <div class="row">
      <div class="col">
        <div class="section_title text-center"  style="margin: 20px">
          <h1>Normativas Vigentes</h1>
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

              <!--  NORMATIVAS VIGENTES POR PROCESO DINAMICO -->
             
              @foreach ($procesos_normVigentes as $proceso)
							  <div class="accordion_container">
								  <div class="accordion d-flex flex-row align-items-center">{{$proceso->nombre}}</div>
								  <div class="accordion_panel">

									  <div id="normativasByProceso" class="row tag_fade_in icon_boxes_container">
                
                     @foreach ($proceso->normativas as $item)
                        <div class="col-lg-4 icon_box text-left d-flex flex-column align-items-start justify-content-start">
                         <div class="icon_container d-flex flex-column justify-content-end">
                           <img src="images/icons-certificate.png" alt="">
                         </div>
                         <h3 style="">{{$item->titulo}}</h3>
                         <p style="margin-bottom: 20px">{{$item->descripcion}}</p>
                         <div class="button button_color_2 text-center trans_200"><a target="_blank" href="{{$item->archivo}}">Ver Documento</a></div>
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
    
    
      
    
  </div>

  <!-- Normativas Pasadas -->
  <div id="normativas_pasadas" class="page_section tag_fade_in" style="padding-bottom: 20px;">

    <div class="row">
      <div class="col">
        <div class="section_title text-center"  style="margin: 20px">
          <h1>Normativas Pasadas</h1>
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

              <!--  NORMATIVAS PASADAS POR PROCESO DINAMICO -->
             
              @foreach ($procesos_normPasadas as $proceso)
							  <div class="accordion_container">
								  <div class="accordion d-flex flex-row align-items-center">{{$proceso->nombre}}</div>
								  <div class="accordion_panel">

									  <div id="normativasByProceso" class="row tag_fade_in icon_boxes_container">
                
                     @foreach ($proceso->normativas as $item)
                        <div class="col-lg-4 icon_box text-left d-flex flex-column align-items-start justify-content-start">
                         <div class="icon_container d-flex flex-column justify-content-end">
                           <img src="images/icons-certificate.png" alt="">
                         </div>
                         <h3 style="">{{$item->titulo}}</h3>
                         <p style="margin-bottom: 20px">{{$item->descripcion}}</p>
                         <div class="button button_color_2 text-center trans_200"><a target="_blank" href="{{$item->archivo}}">Ver Documento</a></div>
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
    
    
      
    
  </div>
</div>


@endsection
