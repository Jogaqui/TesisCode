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
<!-- Home -->
<div class="home">

  <!-- Hero Slider -->
  <div class="hero_slider_container">
    <div class="hero_slider owl-carousel">
      
      <!-- Hero Slide -->
      <div class="hero_slide">
        <div class="hero_slide_background" style="background-image:url(images/background_unt_4.jpg)"></div>
        <div class="hero_slide_container_2 d-flex flex-column align-items-center justify-content-center">
          <div class="hero_slide_content text-center">
            <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut"><span>Estadísticas</span></h1>
          </div>
        </div>
      </div>
      
      <!-- Hero Slide -->
      <div class="hero_slide">
        <div class="hero_slide_background" style="background-image:url(images/background_unt_4.jpg)"></div>

        <div class="hero_slide_container_2 d-flex flex-column align-items-center justify-content-center">
          <div class="hero_slide_content text-center">
            <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut"><span>Estadísticas</span></h1>
          </div>
        </div>
      </div>
      
    
    </div>

   
  </div>

</div>

{{-- <div class="home">
  <div class="home_background_container prlx_parent">
    <div class="home_background prlx" style="background-image:url(images/background_unt_4.jpg)"></div>
  </div>
  <div class="home_content">
    <h1>Estadísticas</h1>
  </div>
</div>
<br> --}}


<!-- ELEMENTOS -->

<div class="elements">
  
  <!-- Loaders -->

  <div class="loaders">


    <div class="container tag_fade_in">
      
      <div class="row">
        <div class="col">
          <div class="section_title text-center">
            <h1>Trámites principales</h1>
          </div>
        </div>
      </div>


      <div class="row elements_loaders_container justify-content-center">
        <div class="col-lg-3 loader_col">
          <!-- Certificados -->
          <div class="loader" data-perc="{{$porcentaje_certificados}}"></div>
          <div class="loader_text text-center">Certificados de Estudios</div>
          <div class="loader_sub text-center">Certificados tramitados del total de trámites</div>
        </div>
        <div class="col-lg-3 loader_col">
          <!-- Carpetas -->
          <div class="loader" data-perc="{{$porcentaje_carpetas}}"></div>
          <div class="loader_text text-center">Elaboración de Carpetas</div>
          <div class="loader_sub text-center">Grados y Títulos tramitados del total de trámites</div>
          <span></span>
        </div>
        <div class="col-lg-3 loader_col">
          <!-- Carnets -->
          <div class="loader" data-perc="{{$porcentaje_carnets}}"></div>
          <div class="loader_text text-center">Carnets Universitario</div>
          <div class="loader_sub text-center">Carnets tramitados del total de trámites</div>
        </div>
        
      </div>

    </div>
  </div>
  
  <!-- Tramites - Pregrado -->
  <div class="milestones">

    <div class="milestones_container tag_fade_in">
      <div class="milestones_background" style="background-image:url(images/milestones_background.jpg)"></div>

      <div class="row">
        <div class="col">
          <div class="section_title text-center">
            <h1 style="color: white; margin-bottom:74px;">Pregrado</h1>
          </div>
        </div>
      </div>
      
      <div class="container">
        <div class="row">
          
          <!-- Certificados -->
          <div class="col-lg-3 milestone_col">
            <div class="milestone text-center">
              <div class="milestone_icon"><img src="images/icons-certificate.png" alt=""></div>
              <div class="milestone_counter" data-end-value="{{$tramites_pregrado_certificados}}">0</div>
              <div class="milestone_text">Certificados tramitados</div>
            </div>
          </div>

          <!-- Grados -->
          <div class="col-lg-3 milestone_col">
            <div class="milestone text-center">
              <div class="milestone_icon"><img src="images/icons-diploma.png" alt=""></div>
              <div class="milestone_counter" data-end-value="{{$tramites_pregrado_grados}}">0</div>
              <div class="milestone_text">Grados entregados</div>
            </div>
          </div>

          <!-- Títulos -->
          <div class="col-lg-3 milestone_col">
            <div class="milestone text-center">
              <div class="milestone_icon"><img src="images/milestone_4.svg" alt=""></div>
              <div class="milestone_counter" data-end-value="{{$tramites_pregrado_titulos}}">0</div>
              <div class="milestone_text">Títulos entregados</div>
            </div>
          </div>

          <!-- Carnets -->
          <div class="col-lg-3 milestone_col">
            <div class="milestone text-center">
              <div class="milestone_icon"><img src="images/milestone_2.svg" alt=""></div>
              <div class="milestone_counter" data-end-value="{{$tramites_pregrado_carnets}}" data-sign-before="+">0</div>
              <div class="milestone_text">Carnets tramitados</div>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>


  <!-- Tramites - Segunda especialidad -->
  <div class="milestones">

    <div class="milestones_container tag_fade_in">
      <div class="milestones_background"></div>

      <div class="row ">
        <div class="col">
          <div class="section_title text-center">
            <h1 style="margin-bottom:74px;">Segunda Especialidad</h1>
          </div>
        </div>
      </div>
      
      <div class="container">
        <div class="row justify-content-center">
          
          <!-- Certificados_SE -->
          <div class="col-lg-3 milestone_col">
            <div class="milestone text-center">
              <div class="milestone_icon"><img src="images/icons-certificate.png" alt=""></div>
              <div class="milestone_counter" data-end-value="{{$tramites_se_certificados}}">0</div>
              <div class="milestone_text" style="color: black">Certificados tramitados</div>
            </div>
          </div>

          <!-- Títulos_SE -->
          <div class="col-lg-3 milestone_col">
            <div class="milestone text-center">
              <div class="milestone_icon"><img src="images/milestone_4.svg" alt=""></div>
              <div class="milestone_counter" data-end-value="{{$tramites_se_titulos}}">0</div>
              <div class="milestone_text" style="color: black">Títulos entregados</div>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>

  <!-- Tramites - Posgrado -->
  <div class="milestones">

    <div class="milestones_container tag_fade_in">
      <div class="milestones_background" style="background-image:url(images/milestones_background.jpg)"></div>

      <div class="row">
        <div class="col">
          <div class="section_title text-center">
            <h1 style="color: white; margin-bottom:74px;">Posgrado</h1>
          </div>
        </div>
      </div>
      
      <div class="container justify-content-center">
        <div class="row justify-content-center">
          
          <!-- Certificados Posgrado -->
          <div class="col-lg-3 milestone_col">
            <div class="milestone text-center">
              <div class="milestone_icon"><img src="images/milestone_4.svg" alt=""></div>
              <div class="milestone_counter" data-end-value="{{$tramites_posgrado_gradosMaestria}}" data-sign-before="+">0</div>
              <div class="milestone_text">Grados académicos de Maestría entregados</div>
            </div>
          </div>

          <!-- Títulos Posgrado -->
          <div class="col-lg-3 milestone_col">
            <div class="milestone text-center">
              <div class="milestone_icon"><img src="images/icons-doctorado.png" alt=""></div>
              <div class="milestone_counter" data-end-value="{{$tramites_posgrado_gradosDoctorado}}" data-sign-before="+">0</div>
              <div class="milestone_text">Grados académicos de Doctorado entregados</div>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>


<!-- Reportes Matrículas y Otros -->
<div class="page_section tag_fade_in" style="padding-bottom: 20px;">

  <div class="row">
    <div class="col">
      <div class="section_title text-center"  style="margin: 20px">
        <h1>Reportes</h1>
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

            <!-- Matrículas - SGA -->
            <div class="accordion_container">
              <div class="accordion d-flex flex-row align-items-center">MATRÍCULAS - SGA</div>
              <div id="accordion_panel_1" class="accordion_panel">
                <br>
                <h3>Sede:</h3>
								<select class="combo_reportes input_field search_form_name @error('sede') is-invalid @enderror" id="sede" name="sede" required="required" >
									<option value="0" disabled selected>Seleccionar la sede...</option>
									@foreach($sedes_SGA as $itemSede)
										<option value="{{$itemSede['sed_id']}}">
											{{$itemSede['sed_nombre']}}
										</option>
									@endforeach
								</select>
				
                <br>
                <h3>Semestre:</h3>
								<select class=" combo_reportes input_field search_form_name @error('semestre') is-invalid @enderror" id="semestre" name="semestre" required="required" >
									<option value="0" disabled selected>Seleccionar el semestre...</option>
									@foreach($semestres_SGA as $itemsemestre)
										<option value="{{$itemsemestre['ani_id']}}">
											{{$itemsemestre['ani_anio']}} - {{$itemsemestre['tan_semestre']}}
										</option>
									@endforeach
								</select>

                <br>
                <h3>Facultad:</h3>
								<select class="combo_reportes input_field search_form_name @error('dependencia') is-invalid @enderror" id="dependencia" name="dependencia" required="required" >
									<option value="0" disabled selected>Seleccionar la facultad...</option>
									@foreach($facultades_SGA as $itemfacultad)
										<option value="{{$itemfacultad['dep_id']}}">
											{{$itemfacultad['dep_nombre']}}
										</option>
									@endforeach
								</select>

                <button class="btn btn-dark btn-user btn-block" style="margin-top: 16px" type="button" id="btnBuscarMatriculados_SGA">
                  BUSCAR MATRÍCULAS
                </button>

                <div class="d-flex" style="margin-top: 32px;">
                  <table class="table table-bordered" style=" color:black !important;" width="90%" cellspacing="0" id="tablaMatriculados_SGA">
                   
                  </table> 
                </div>      
     

              </div>
            </div>

            <!-- Matrículas - SUV -->
            <div class="accordion_container">
              <div class="accordion d-flex flex-row align-items-center">MATRÍCULAS - SUV</div>
              <div id="accordion_panel_2" class="accordion_panel">
                <br>
                <h3>Sede:</h3>
								<select class="combo_reportes input_field search_form_name @error('sede_SUV') is-invalid @enderror" id="sede_SUV" name="sede_SUV" required="required" >
									<option value="0" disabled selected>Seleccionar la sede...</option>
									@foreach($sedes_SUV as $itemSede)
										<option value="{{$itemSede['idsede']}}">
											{{$itemSede['sed_descripcion']}}
										</option>
									@endforeach
								</select>
				
                <br>
                <h3>Semestre:</h3>
								<select class=" combo_reportes input_field search_form_name @error('semestre_SUV') is-invalid @enderror" id="semestre_SUV" name="semestre_SUV" required="required" >
									<option value="0" disabled selected>Seleccionar el semestre...</option>
									@foreach($semestres_SUV as $itemsemestre)
										<option value="{{$itemsemestre['periodo']}}">
											{{$itemsemestre->periodo}}
										</option>
									@endforeach
								</select>

                <br>
                <h3>Facultad:</h3>
								<select class="combo_reportes input_field search_form_name @error('dependencia_SUV') is-invalid @enderror" id="dependencia_SUV" name="dependencia_SUV" required="required" >
									<option value="0" disabled selected>Seleccionar la facultad...</option>
									@foreach($facultades_SUV as $itemfacultad)
										<option value="{{$itemfacultad['idestructura']}}">
											{{$itemfacultad['estr_descripcion']}}
										</option>
									@endforeach
								</select>

                <button class="btn btn-dark btn-user btn-block" style="margin-top: 16px" type="button" id="btnBuscarMatriculados_SUV">
                  BUSCAR MATRÍCULAS
                </button>

                <div class="d-flex" style="margin-top: 32px;">
                  <table class="table table-bordered" style=" color:black !important;" width="90%" cellspacing="0" id="tablaMatriculados_SUV">
                   
                  </table> 
                </div>      

              </div>
            </div>

            <!-- Matrículas - Consolidado -->
            <div class="accordion_container">
              <div class="accordion d-flex flex-row align-items-center">MATRÍCULAS - Consolidado</div>
              <div id="accordion_panel_3" class="accordion_panel">
                <br>
                <h3>Semestre:</h3>
								<select class=" combo_reportes input_field search_form_name @error('semestre_Consolidado') is-invalid @enderror" id="semestre_Consolidado" name="semestre_Consolidado" required="required" >
									<option value="0" disabled selected>Seleccionar el semestre...</option>
									@foreach($semestres_SUV as $itemsemestre)
										<option value="{{$itemsemestre['periodo']}}">
											{{$itemsemestre->periodo}}
										</option>
									@endforeach
								</select>

                <button class="btn btn-dark btn-user btn-block" style="margin-top: 16px" type="button" id="btnBuscarMatriculados_Consolidado">
                  BUSCAR MATRÍCULAS
                </button>

                <div class="d-flex" style="margin-top: 32px;">
                  <table class="table table-bordered" style=" color:black !important;" width="90%" cellspacing="0" id="tablaMatriculados_Consolidado">
                   
                  </table> 
                </div>      

              </div>
            </div>


            <!-- Grados y Títulos -->
            <div class="accordion_container">
              <div class="accordion d-flex flex-row align-items-center">GRADOS Y TÍTULOS</div>
              <div id="accordion_panel_4" class="accordion_panel">

                <br>
                <h3>Tipo:</h3>
								<select class="combo_reportes input_field search_form_name @error('tipo_GT') is-invalid @enderror" id="tipo_GT" name="tipo_GT" required="required" >
									<option value="0" disabled selected>Seleccionar el tipo de carpeta...</option>
									<option value="1">GRADOS</option>
                  <option value="2">TÍTULOS</option>
								</select>

                <br>
                <h3>Condición:</h3>
								<select class="combo_reportes input_field search_form_name @error('condicion_GT') is-invalid @enderror" id="condicion_GT" name="condicion_GT" required="required" >
									<option value="0" disabled selected>Seleccionar la condición del tipo...</option>
									<option value="1">Regulares</option>
                  <option value="2">Duplicados</option>
								</select>

                <br>
                <h3>Año:</h3>
								<select class=" combo_reportes input_field search_form_name @error('anio_GT') is-invalid @enderror" id="anio_GT" name="anio_GT" required="required" >
									<option value="0" disabled selected>Seleccionar el año...</option>
									@foreach($anios_grados_titulos as $itemanio_gradostitulos)
										<option value="{{$itemanio_gradostitulos['anio']}}">
											{{$itemanio_gradostitulos['anio']}}
										</option>
									@endforeach
								</select>

                <br>
                <h3>Facultad:</h3>
								<select class="combo_reportes input_field search_form_name @error('dependencia_GT') is-invalid @enderror" id="dependencia_GT" name="dependencia_GT" required="required" >
									<option value="0" disabled selected>Seleccionar la facultad...</option>
									@foreach($facultades_DiplomasApp as $itemfacultad)
										<option value="{{$itemfacultad['Nom_facultad']}}">
                      
											{{$itemfacultad['Nom_facultad']}}
										</option>
									@endforeach
								</select>

                <button class="btn btn-dark btn-user btn-block" style="margin-top: 16px" type="button" id="btnBuscarGraduados_Titulados">
                  BUSCAR REPORTE
                </button>

                <div class="d-flex" style="margin-top: 32px;">
                  <table class="table table-bordered" style=" color:black !important;" width="90%" cellspacing="0" id="tablaGraduados_Titulados">
                   
                  </table> 
                </div>      

              </div>
            </div>

            <!-- Grados y Títulos - Consolidado -->
            <div class="accordion_container">
              <div class="accordion d-flex flex-row align-items-center">GRADOS Y TÍTULOS - Consolidado</div>
              <div id="accordion_panel_5" class="accordion_panel">

                <br>
                <h3>Condición:</h3>
								<select class="combo_reportes input_field search_form_name @error('condicion_GT_Consolidado') is-invalid @enderror" id="condicion_GT_Consolidado" name="condicion_GT_Consolidado" required="required" >
									<option value="0" disabled selected>Seleccionar la condición del tipo...</option>
									<option value="1">Regulares</option>
                  <option value="2">Duplicados</option>
								</select>

                <br>
                <h3>Año:</h3>
								<select class=" combo_reportes input_field search_form_name @error('anio_GT_Consolidado') is-invalid @enderror" id="anio_GT_Consolidado" name="anio_GT_Consolidado" required="required" >
									<option value="0" disabled selected>Seleccionar el año...</option>
									@foreach($anios_grados_titulos as $itemanio_gradostitulos)
										<option value="{{$itemanio_gradostitulos['anio']}}">
											{{$itemanio_gradostitulos['anio']}}
										</option>
									@endforeach
								</select>

                <button class="btn btn-dark btn-user btn-block" style="margin-top: 16px" type="button" id="btnBuscarGraduados_Titulados_Consolidado">
                  BUSCAR REPORTE
                </button>

                <div class="d-flex" style="margin-top: 32px;">
                  <table class="table table-bordered" style=" color:black !important;" width="90%" cellspacing="0" id="tablaGraduados_Titulados_Consolidado">
                   
                  </table> 
                </div>      

              </div>
            </div>
           
            <!-- Egresados -->
            {{-- <div class="accordion_container">
              <div class="accordion d-flex flex-row align-items-center">EGRESADOS</div>
              <div id="accordion_panel_4" class="accordion_panel">

     
                <br>
                <h3>Condición:</h3>
								<select class="combo_reportes input_field search_form_name @error('condicion_GT') is-invalid @enderror" id="condicion_GT" name="condicion_GT" required="required" >
									<option value="0" disabled selected>Seleccionar la condición del tipo...</option>
									<option value="1">Regulares</option>
                  <option value="2">Duplicados</option>
								</select>

                <br>
                <h3>Año:</h3>
								<select class=" combo_reportes input_field search_form_name @error('anio_GT') is-invalid @enderror" id="anio_GT" name="anio_GT" required="required" >
									<option value="0" disabled selected>Seleccionar el año...</option>
									@foreach($anios_grados_titulos as $itemanio_gradostitulos)
										<option value="{{$itemanio_gradostitulos['anio']}}">
											{{$itemanio_gradostitulos['anio']}}
										</option>
									@endforeach
								</select>

                <br>
                <h3>Facultad:</h3>
								<select class="combo_reportes input_field search_form_name @error('dependencia_GT') is-invalid @enderror" id="dependencia_GT" name="dependencia_GT" required="required" >
									<option value="0" disabled selected>Seleccionar la facultad...</option>
									@foreach($facultades_DiplomasApp as $itemfacultad)
										<option value="{{$itemfacultad['Nom_facultad']}}">
                      
											{{$itemfacultad['Nom_facultad']}}
										</option>
									@endforeach
								</select>

                <button class="btn btn-dark btn-user btn-block" style="margin-top: 16px" type="button" id="btnBuscarGraduados_Titulados">
                  BUSCAR REPORTE
                </button>

                <div class="d-flex" style="margin-top: 32px;">
                  <table class="table table-bordered" style=" color:black !important;" width="90%" cellspacing="0" id="tablaGraduados_Titulados">
                   
                  </table> 
                </div>      

              </div>
            </div> --}}

          </div>
        </div>

      </div>
    </div>
  </div>

  
</div>

  <!-- Icon Boxes -->
  {{-- <div class="icon_boxes">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="elements_title">Icon Boxes</div>
        </div>
      </div>

      <div class="row icon_boxes_container">

        <div class="col-lg-4 icon_box text-left d-flex flex-column align-items-start justify-content-start">
          <div class="icon_container d-flex flex-column justify-content-end">
            <img src="images/earth-globe.svg" alt="">
          </div>
          <h3>Online Courses</h3>
          <p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
        </div>

        <div class="col-lg-4 icon_box text-left d-flex flex-column align-items-start justify-content-start">
          <div class="icon_container d-flex flex-column justify-content-end">
            <img src="images/exam.svg" alt="">
          </div>
          <h3>Indoor Courses</h3>
          <p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
        </div>

        <div class="col-lg-4 icon_box text-left d-flex flex-column align-items-start justify-content-start">
          <div class="icon_container d-flex flex-column justify-content-end">
            <img src="images/books.svg" alt="">
          </div>
          <h3>Amazing Library</h3>
          <p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
        </div>

      </div>

    </div>
  </div> --}}






</div>

@endsection

@section('scripts')
<script>
  $('#btnBuscarMatriculados_SGA').on('click', function(){
    $.ajax({
      url: "/statitics/reportes/matriculas_sga/" + $('#sede').val() + "/" + $('#semestre').val() + "/" + $('#dependencia').val(),
      type: 'GET',
      success: function (response) {
        console.log(response)
        try {
            var html = '';
         
            html+='<thead><tr><th>#</th><th>Escuela Profesional</th><th style="text-align:center;">Femenino</th><th style="text-align:center;">Masculino</th><th style="text-align:center;">TOTAL MATRICULADOS</th></tr></thead>';

            var matriculados = response.matriculados;
            var matriculados_total = 0;
            var matriculados_femenino_total = 0;
            var matriculados_masculino_total = 0;

            for (var i = 0; i < matriculados.length; i++) {
              var fila = matriculados[i];
              var idx = i+1;
              matriculados_total += fila.nro_matriculados;
              matriculados_femenino_total += fila.femenino;
              matriculados_masculino_total += fila.masculino;
              html += '<tbody> <tr>' +
              '<td>' + idx + '</td>' +
              '<td>' + fila.dep_nombre + '</td>' + 
              '<td style="text-align:center;">' + fila.femenino + '</td>' +
              '<td style="text-align:center;">' + fila.masculino + '</td>' +
              '<td style="text-align:center;">' + fila.nro_matriculados + '</td>' +
              '</tr> </tbody>';
              
            }

            html+='<tfoot><tr style="border: 2px solid #332D2D;"><th> </th><th>TOTAL GENERAL</th><th style="text-align:center;">' + matriculados_femenino_total + '</th><th style="text-align:center;">' +  matriculados_masculino_total + '</th><th style="text-align:center;">' + matriculados_total + '</tr></tfoot>';

            $('#tablaMatriculados_SGA').html(html);

            $("#accordion_panel_1").css("max-height", "1500px");
        } catch (e) {
          console.log(e);
        }
      }
    });
  });

  $('#btnBuscarMatriculados_SUV').on('click', function(){
  $.ajax({
    url: "/statitics/reportes/matriculas_suv/" + $('#sede_SUV').val() + "/" + $('#semestre_SUV').val() + "/" + $('#dependencia_SUV').val(),
    type: 'GET',
    success: function (response) {
      console.log(response)
      try {
          var html = '';
       
          html+='<thead><tr><th>#</th><th>Escuela Profesional</th><th style="text-align:center;">Femenino</th><th style="text-align:center;">Masculino</th><th style="text-align:center;">TOTAL MATRICULADOS</th></tr></thead>';

          var matriculados = response.matriculados;
          var matriculados_total = 0;
          var matriculados_femenino_total = 0;
          var matriculados_masculino_total = 0;

          for (var i = 0; i < matriculados.length; i++) {
            var fila = matriculados[i];
            var idx = i+1;
            
            matriculados_total += fila.nro_matriculados;
            matriculados_femenino_total += fila.femenino;
            matriculados_masculino_total += fila.masculino;
            html += '<tbody> <tr>' +
            '<td>' + idx + '</td>' +
            '<td>' + fila.estr_descripcion+ '</td>' + 
            '<td style="text-align:center;">' + fila.femenino + '</td>' +
            '<td style="text-align:center;">' + fila.masculino + '</td>' +
            '<td style="text-align:center;">' + fila.nro_matriculados + '</td>' +
            '</tr> </tbody>';
            
          }

         html+='<tfoot><tr style="border: 2px solid #332D2D;"><th> </th><th>TOTAL GENERAL</th><th style="text-align:center;">' + matriculados_femenino_total + '</th><th style="text-align:center;">' +  matriculados_masculino_total + '</th><th style="text-align:center;">' + matriculados_total + '</tr></tfoot>';

          $('#tablaMatriculados_SUV').html(html);

          $("#accordion_panel_2").css("max-height", "1500px");
      } catch (e) {
        console.log(e);
      }
    }
  });
  });

  $('#btnBuscarMatriculados_Consolidado').on('click', function(){
  $.ajax({
    url: "/statitics/reportes/matriculas_consolidado/" + $('#semestre_Consolidado').val(),
    type: 'GET',
    success: function (response) {
      console.log(response)
      try {
          var html = '';
       
          html+='<thead><tr><th>#</th><th style="text-align:center;">Sistema Académico</th><th style="text-align:center;">Femenino</th><th style="text-align:center;">Masculino</th><th style="text-align:center;">N° ALUMNOS MATRICULADOS</th></tr></thead>';

          var matriculados = response.matriculados;
          var matriculados_total = 0;
          var matriculados_femenino_total = 0;
          var matriculados_masculino_total = 0;
   
          for (var i = 0; i < matriculados.length; i++) {
            var fila = matriculados[i];
            var idx = i+1;           

            matriculados_femenino_total += fila.femenino;
            matriculados_masculino_total += fila.masculino;
            matriculados_total += fila.nro_matriculados_consolidado;

            html += '<tbody> <tr>' +
            '<td style="text-align:center;">' + idx + '</td>' +
            '<td style="text-align:center;">' + fila.sistema_descri+ '</td>' + 
            '<td style="text-align:center;">' + fila.femenino + '</td>' +
            '<td style="text-align:center;">' + fila.masculino + '</td>' +
            '<td style="text-align:center;">' + fila.nro_matriculados_consolidado + '</td>' +
            '</tr> </tbody>';
            
          }

          html+='<tfoot><tr style="border: 2px solid #332D2D;"><th> </th><th style="text-align:center;">TOTAL GENERAL</th><th style="text-align:center;">' + matriculados_femenino_total + '</th><th style="text-align:center;">' +  matriculados_masculino_total + '</th><th style="text-align:center;">' + matriculados_total + '</tr></tfoot>';

          $('#tablaMatriculados_Consolidado').html(html);

          $("#accordion_panel_3").css("max-height", "1500px");
      } catch (e) {
        console.log(e);
      }
    }
  });
  });

  $('#btnBuscarGraduados_Titulados').on('click', function(){
  $.ajax({
    url: "/statitics/reportes/graduados_titulados/" + $('#tipo_GT').val() + "/" + $('#condicion_GT').val() + "/" + $('#anio_GT').val() + "/" + $('#dependencia_GT').val(),
    type: 'GET',
    success: function (response) {
      console.log(response)
      try {
          var html = '';
          var header_tipo = response.header_tipo;
          html+='<thead><tr><th>#</th><th>Escuela Profesional</th><th style="text-align:center;">N° ' + header_tipo + '</th></tr></thead>';

          var graduados_titulados = response.graduados_titulados;
          var graduados_titulados_total = 0;

          for (var i = 0; i < graduados_titulados.length; i++) {
            var fila = graduados_titulados[i];
            var idx = i+1;
            
            graduados_titulados_total += fila.nro_graduados_titulados;
 
            html += '<tbody> <tr>' +
            '<td>' + idx + '</td>' +
            '<td>' + fila.nombre_escuela + '</td>' + 
            '<td style="text-align:center;">' + fila.nro_graduados_titulados + '</td>' +
            '</tr> </tbody>';
            
          }

         html+='<tfoot><tr style="border: 2px solid #332D2D;"><th> </th><th>TOTAL GENERAL</th><th style="text-align:center;">' + graduados_titulados_total + '</tr></tfoot>';

          $('#tablaGraduados_Titulados').html(html);

          $("#accordion_panel_4").css("max-height", "1500px");
      } catch (e) {
        console.log(e);
      }
    }
  });
  });

  $('#btnBuscarGraduados_Titulados_Consolidado').on('click', function(){
  $.ajax({
    url: "/statitics/reportes/graduados_titulados_consolidado/" + $('#condicion_GT_Consolidado').val() + "/" + $('#anio_GT_Consolidado').val(),
    type: 'GET',
    success: function (response) {
      console.log(response)
      try {
          var html = '';
          var header_condicion = response.header_condicion;
          html+='<thead><tr><th>#</th><th>Nombre Ficha</th><th style="text-align:center;">N° ' + header_condicion + '</th></tr></thead>';

          var graduados_titulados_consolidado = response.graduados_titulados_consolidado;
          var graduados_titulados_consolidado_total = 0;

          for (var i = 0; i < graduados_titulados_consolidado.length; i++) {
            var fila = graduados_titulados_consolidado[i];
            var idx = i+1;
            
            graduados_titulados_consolidado_total += fila.nro_graduados_titulados_consolidado;
 
            html += '<tbody> <tr>' +
            '<td>' + idx + '</td>' +
            '<td>' + fila.nombre_ficha + '</td>' + 
            '<td style="text-align:center;">' + fila.nro_graduados_titulados_consolidado + '</td>' +
            '</tr> </tbody>';
            
          }

         html+='<tfoot><tr style="border: 2px solid #332D2D;"><th> </th><th>TOTAL GENERAL</th><th style="text-align:center;">' + graduados_titulados_consolidado_total + '</tr></tfoot>';

          $('#tablaGraduados_Titulados_Consolidado').html(html);

          $("#accordion_panel_5").css("max-height", "1500px");
      } catch (e) {
        console.log(e);
      }
    }
  });
  });



$(document).ready(function(){
});



</script>
@endsection
