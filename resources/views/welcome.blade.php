{{-- TEMPLATE THEMEWAGON COURSE: https://technext.github.io/course/elements.html --}}
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


<div class="super_container">

	<!-- Home -->

	<div class="home">

		<!-- Hero Slider -->
		<div class="hero_slider_container">
			<div class="hero_slider owl-carousel">

				{{-- <!-- Hero Slide - Navideño -->
				<div class="hero_slide">
					<div class="hero_slide_background" style="background-image:url(images/background_unt_9.jpg)"></div>
				</div> --}}

				<!-- Hero Slide -->
				<div class="hero_slide">
					<div class="hero_slide_background" style="background-image:url(images/slider_background.jpg)"></div>
					<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
						<div class="hero_slide_content text-center">
							<h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Gestionando  <span>nuevos</span>  desafíos...!!!</h1>
						</div>
					</div>
				</div>

				<!-- Hero Slide -->
				<div class="hero_slide">
					<div class="hero_slide_background" style="background-image:url(images/background_unt_tramites.jpg)"></div>
					<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
						<div class="hero_slide_content text-center">
							<h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut" style="color: rgb(240, 244, 244)">Gestionando  <span>nuevos</span>  desafíos...!!!</h1>
						</div>
					</div>
				</div>


			</div>

			<div class="hero_slider_left hero_slider_nav trans_200"><span class="trans_200"><<</span></div>
			<div class="hero_slider_right hero_slider_nav trans_200"><span class="trans_200">>></span></div>
		</div>

	</div>

	<!-- Tramites principales -->
	<div class="hero_boxes">
		<div class="hero_boxes_inner">
			<div class="container ">
				<div class="row">

					@foreach ($tramites as $proc)

						<div class="col-lg-4 hero_box_col">

							<div class="hero_box d-flex flex-row align-items-center justify-content-start">
								<a href="{{url('procedure')}}#tramites">
									<img src="images/{{$proc->nombre}}.svg" class="svg" alt="">
								</a>
								<div class="hero_box_content">
									<a href="{{url('procedure')}}#tramites">
										<h2 class="hero_box_title">
											{{$proc->titulo_abrev}}
										</h2>
									</a>
									<a href="{{url('procedure')}}#tramites" class="hero_box_link">Ver información</a>
								</div>
							</div>

						</div>

					@endforeach



				</div>
			</div>
		</div>
	</div>

	<!-- News -->

	<div class="popular page_section">
		<div class="container tag_fade_in">
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Noticias recientes</h1>
					</div>
				</div>
			</div>


			<div class="row course_boxes">

				@foreach ($publicaciones as $post)
					<!-- Popular Course Item -->
					<div class="col-lg-4 course_box">
						<div class="card tag_fade_in">
							<img class="card-img-top" src="{{$post->imagen}}" alt="Imagen de las últimas publicaciones">
							<div class="card-body text-center">
								<div class="card-title">
									<a href="{{route('news.show', $post->idPublicacion)}}">
										{{$post->titulo}}
									</a>
								</div>
								<div class="card-text">{{substr($post->resumen,0,80)}}...</div>
							</div>
							<div class="price_box d-flex flex-row align-items-center justify-content-center">
								<div class="col">
									<div class="row course_author_name">{{$post->creador}}</div>
									<div class="row" style="padding-top:4px; padding-bottom:10px; padding-left: 20px;"><span>{{$post->creador_puesto}}</span></div>
								</div>

								<div class="course_price d-flex flex-column align-items-center justify-content-center">
									<span>
										<div>{{date('d', strtotime($post->fecha))}}</div>
                  						<div>{{date('M', strtotime($post->fecha))}}</div>
									</span>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>



		</div>
	</div>

	{{-- <!-- Multimedia -->

	<div id="tutorials" class="testimonials page_section">
		<!-- <div class="testimonials_background" style="background-image:url(images/testimonials_background.jpg)"></div> -->
		<div class="testimonials_background_container prlx_parent">
			<div class="testimonials_background prlx" style="background-image:url(images/slider_background.jpg)"></div>
		</div>
		<div class="container">

			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Multimedia</h1>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-10 offset-lg-1">

					<div class="testimonials_slider_container">

						<!-- Multimedia Slider -->
						<div class="owl-carousel owl-theme testimonials_slider_2">
							@foreach ($multimedias as $multimedia)
								<!-- Multimedia Item -->
								<div class="owl-item">
									<div class="testimonials_item text-center">
										<div class="container container_iframe" style="width: 640px; height: 400px;">
											<iframe class="responsive_iframe" width="100%" height="100%" src="{{$multimedia->ruta}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
										</div>


										<div class="testimonial_user">

											<div class="testimonial_name">{{$multimedia->titulo}}</div>
											<div class="testimonial_title">{{$multimedia->resumen}}</div>
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
			</div>

		</div>
	</div> --}}


	<!-- Register -->
{{--
	<div class="register">

		<div class="container-fluid">

			<div class="row row-eq-height">
				<div class="col-lg-6 nopadding">

					<!-- Register -->

					<div class="register_section d-flex flex-column align-items-center justify-content-center">
						<div class="register_content text-center">
							<h1 class="register_title row justify-content-center">Unidad de Registros Académicos</h1>
							<h1 class="register_title"><span>Universidad Nacional de Trujillo</span></h1>
							<p class="register_text">Dependencia Técnica, enfocada en la gestión y apoyo a los procesos administrativos y académicos del estudiante. Ofreciendo servicios de calidad a las diferentes áreas interdepartamentales de nuestra Universidad, basada en el cumplimiento a los mejores estándares y la evolución integral de la dirección.</p>
							<div class="button button_1 register_button mx-auto trans_200"><a href="{{ url('aboutus') }}">Conócenos</a></div>
						</div>
					</div>

				</div>

				<div class="col-lg-6 nopadding">

					<!-- Search -->

					<div class="search_section d-flex flex-column align-items-center justify-content-center">
						<div class="search_background" style="background-image:url(images/search_background.jpg);"></div>
						<div class="search_content text-center">
							<h1 class="search_title">Preguntas frecuentes</h1>
							<form id="search_form" class="search_form" action="post">

								@csrf
								<select class="input_field search_form_name @error('idUnidad') is-invalid @enderror" id="idUnidad" name="idUnidad" required="required" >
									<option value="0" disabled selected>Seleccionar Unidad responsable...</option>
									@foreach($unidades as $itemunidad)
										<option value="{{$itemunidad['idUnidad']}}">
											{{$itemunidad['descripcion']}}
										</option>
									@endforeach
								</select>
								@error('idUnidad')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror


								<input id="pregunta_welcome" class="input_field search_form_name" type="text" placeholder="Pregunta" required="required" data-error="Course name is required.">


								<button id="search_submit_button" type="submit" class="search_submit_button trans_200" value="Submit">Consultar pregunta</button>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div> --}}

	<!-- Services -->
{{--
	<div class="services page_section">

		<div class="container tag_fade_in">
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Nuestros Servicios</h1>
					</div>
				</div>
			</div>

			<div class="row services_row">

				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
					<div class="icon_container d-flex flex-column justify-content-end">
						<img src="images/books.svg" alt="">
					</div>
					<a href="{{url('normativas')}}"><h3>Organizar Normativas</h3></a>
					<p>Reglamentar y establecer normativas para las distintas prestaciones relacionadas con la inscripción de matrículas, Identificación de alumnos, Análisis estadístico, Cómputo, Grados y Títulos.</p>
				</div>

				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
					<div class="icon_container d-flex flex-column justify-content-end">
						<img src="images/professor.svg" alt="">
					</div>
					<h3>Atención al público</h3>
					<p>Atender las diversas solicitudes y trámites presentados por los docentes, administrativos, estudiantes, egresados y externos en todas las modalidades disponibles.</p>
				</div>

				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
					<div class="icon_container d-flex flex-column justify-content-end">
						<img src="images/exam.svg" alt="">
					</div>
					<h3>Supervisión de padrones</h3>
					<p>Supervisar la elaboración de padrones de alumnos matriculados por sus escuelas, listados, actas de exámenes, entre otros. </p>
				</div>

				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
					<div class="icon_container d-flex flex-column justify-content-end">
						<img src="images/blackboard.svg" alt="">
					</div>
					<a href="{{url('statitics')}}"><h3>Elaboración de Reportes</h3></a>
					<p>Análisis de información de las distintas bases de datos académicas para generar distintos Reportes Estadísticos para las distintas áreas y dependencias académicas.</p>
				</div>

				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
					<div class="icon_container d-flex flex-column justify-content-end">
						<img src="images/icons-calendar.png" style="color: #ffb606;" alt="">
					</div>
					<h3>Establecer cronogramas</h3>
					<p>Proponer y establecer los calendarios de matrículas, traslados, reanudación de estudios y segunda especialidad.</p>
				</div>

				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
					<div class="icon_container d-flex flex-column justify-content-end">
						<img src="images/mortarboard.svg" alt="">
					</div>
					<h3>Diplomas y certificados</h3>
					<p>Gestión y emisión de diplomas y certificados correspondientes a cualquier trámite de graduación o titulación de los usuarios que han cursado estudios en la institución.</p>
				</div>

			</div>
		</div>
	</div> --}}

	<!-- Testimonios -->
{{--
	<div class="testimonials page_section">
		<div class="testimonials_background_container prlx_parent">
			<div class="testimonials_background prlx" style="background-image:url(images/background_unt_testimonios.jpg)"></div>
		</div>
		<div class="container">

			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Testimonios</h1>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-10 offset-lg-1">

					<div class="testimonials_slider_container">

						<!-- Testimonials Slider -->
						<div class="owl-carousel owl-theme testimonials_slider">

							<!-- Testimonials Item -->
							<div class="owl-item">
								<div class="testimonials_item text-center">
									<div class="quote">“</div>
									<p class="testimonials_text">Una Dependencia orgánica de la Universidad Nacional de Trujillo que cumple con sus propuestas y busca la mejora continua en los procesos acádemicos llevándolos a la excelencia, teniendo como principales valores la responsabilidad, compromiso. innovación y el trabajo en equipo.</p>
									<div class="testimonial_user">
										<div class="testimonial_name">VICTOR VERGARA AZABACHE</div>
										<div class="testimonial_title">Jefe de Registro Académico</div>
									</div>
								</div>
							</div>

							<!-- Testimonials Item -->
							<div class="owl-item">
								<div class="testimonials_item text-center">
									<div class="quote">“</div>
									<p class="testimonials_text">Atención al público eficiente e integral, promoviendo la ejecución de la normatividad académico enfocada en las necesidades de los estudiantes, así como teniendo como principal enfoque la innovación tecnológica para el fortalecimiento de la calidad educativa.</p>
									<div class="testimonial_user">

										<div class="testimonial_name">CARLOS LÁZARO ARROYO</div>
										<div class="testimonial_title">Director de Procesos Académicos</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>
	</div> --}}

	<!-- Events -->
{{--
	<div class="events page_section">
		<div class="container tag_fade_in">

			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Publicaciones más vistas</h1>
					</div>
				</div>
			</div>

			<div class="event_items tag_fade_in">



				<!-- Event Item -->

				@foreach ($mejoresPublicaciones as $post)
					<div class="tag_fade_in row event_item">
						<div class="col">
							<div class="row d-flex flex-row align-items-center">

								<div class="col-lg-2 order-lg-1 order-2">
									<div class="event_date d-flex flex-column align-items-center justify-content-center">
										<div class="event_day">{{date('d', strtotime($post->fecha))}}</div>
										<div class="event_month">{{date('M', strtotime($post->fecha))}}</div>
									</div>
								</div>

								<div class="col-lg-6 order-lg-2 order-3">
									<div class="event_content">
										<div class="event_name"><a class="trans_200" href="{{route('news.show', $post->idPublicacion)}}">{{$post->titulo}}</a></div>
										<div class="event_location">{{$post->vistas}} vistas - Por {{$post->creador}}</div>
										<p>{{substr($post->resumen,0,80)}}...</p>
									</div>
								</div>

								<div class="col-lg-4 order-lg-3 order-1">
									<div class="event_image">
										<img src="{{$post->imagen}}" alt="Imagen de publicaciones más vistas">
									</div>
								</div>

							</div>
						</div>
					</div>
				@endforeach


			</div>

		</div>
	</div> --}}



</div>

@endsection

@section('scripts')
<script>

</script>
@endsection
