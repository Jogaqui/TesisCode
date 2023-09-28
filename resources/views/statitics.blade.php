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
              <div id="accordion_panel_3" class="accordion_panel">

                <br>
                <h3>Tipo:</h3>
								<select class="combo_reportes input_field search_form_name @error('tipo') is-invalid @enderror" id="tipo" name="tipo" required="required" >
									<option value="0" disabled selected>Seleccionar el tipo...</option>
									@foreach($facultades_SUV as $itemfacultad)
										<option value="{{$itemfacultad['idestructura']}}">
											{{$itemfacultad['estr_descripcion']}}
										</option>
									@endforeach
								</select>

                <br>
                <h3>Año:</h3>
								<select class=" combo_reportes input_field search_form_name @error('anio') is-invalid @enderror" id="anio" name="anio" required="required" >
									<option value="0" disabled selected>Seleccionar el año...</option>
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

                <button class="btn btn-dark btn-user btn-block" style="margin-top: 16px" type="button" id="btnBuscarMatriculados_Consolidado">
                  BUSCAR REPORTE
                </button>

                <div class="d-flex" style="margin-top: 32px;">
                  <table class="table table-bordered" style=" color:black !important;" width="90%" cellspacing="0" id="tablaMatriculados_Consolidado">
                   
                  </table> 
                </div>      

              </div>
            </div>
           

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
         
            html+='<thead><tr><th>#</th><th>Escuela</th><th>N° Alumnos matriculados</th></tr></thead>'
            var matriculados = response.matriculados;
            var matriculados_total = 0;

            for (var i = 0; i < matriculados.length; i++) {
              var fila = matriculados[i];
              var idx = i+1;
              matriculados_total += fila.nro_matriculados;
              html += '<tbody> <tr>' +
              '<td>' + idx + '</td>' +
              '<td>' + fila.dep_nombre + '</td>' + 
              '<td>' + fila.nro_matriculados + '</td>' +
              '</tr> </tbody>';
              
            }

            html+='<tfoot><tr style="border: 2px solid #332D2D;"><th> </th><th>TOTAL</th><th>' + matriculados_total + '</th></tr></tfoot>';

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
       
          html+='<thead><tr><th>#</th><th>Escuela</th><th>N° Alumnos matriculados</th></tr></thead>'
          var matriculados = response.matriculados;
          var matriculados_total = 0;

          for (var i = 0; i < matriculados.length; i++) {
            var fila = matriculados[i];
            var idx = i+1;
            
            matriculados_total += fila.nro_matriculados;
            html += '<tbody> <tr>' +
            '<td>' + idx + '</td>' +
            '<td>' + fila.estr_descripcion+ '</td>' + 
            '<td>' + fila.nro_matriculados + '</td>' +
            '</tr> </tbody>';
            
          }

          html+='<tfoot><tr style="border: 2px solid #332D2D;"><th> </th><th>TOTAL</th><th>' + matriculados_total + '</th></tr></tfoot>';

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
       
          html+='<thead><tr><th style="text-align:center;">#</th><th style="text-align:center;">Sistema</th><th>N° Alumnos Matriculados</th></tr></thead>'
          var matriculados = response.matriculados;
          var matriculados_total = 0;
   
          for (var i = 0; i < matriculados.length; i++) {
            var fila = matriculados[i];
            var idx = i+1;           

            matriculados_total += fila.nro_matriculados_consolidado;
            html += '<tbody> <tr>' +
            '<td style="text-align:center;">' + idx + '</td>' +
            '<td style="text-align:center;">' + fila.sistema_descri+ '</td>' + 
            '<td>' + fila.nro_matriculados_consolidado + '</td>' +
            '</tr> </tbody>';
            
          }

          html+='<tfoot><tr style="border: 2px solid #332D2D;"><th> </th><th  style="text-align:center;">TOTAL</th><th>' + matriculados_total + '</th></tr></tfoot>';

          $('#tablaMatriculados_Consolidado').html(html);

          $("#accordion_panel_3").css("max-height", "1500px");
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
