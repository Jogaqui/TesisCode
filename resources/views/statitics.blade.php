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

      <!-- Hero Slide - Veraniego -->
				<div class="hero_slide">
					<div class="hero_slide_background" style="background-image:url(images/background_unt_9.jpg)"></div>

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

<div class="elements" style="padding-bottom: 0px !important;">
  
  <!-- Tramites Principales - Loaders -->
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

  <!--  Milestones - Matrículas -->
  {{-- <div class="milestones" style="margin-top: 0px !important;">

    <div class="milestones_container tag_fade_in"  style="margin-top: 0px !important;">
      <div class="milestones_background" style="background-image:url(images/background_milestones_matriculas_2.jpg); opacity: 0.5 !important;"></div>

      <div class="row ">
        <div class="col">
          <div class="section_title text-center">
            <h1 style="margin-bottom:60px;">Matrículas</h1>
          </div>
        </div>
      </div>
      
      <div class="container">
        <div class="row justify-content-center">

            <div class="row col-12 justify-content-center" style="align-items: center;">
              <button class="btn button_color_1 text-center trans_200 px-4 py-3 align-items-center" style="width:auto; !important; border-color:transparent !important;" type="" id="btnVerMatriculas">
                <i class="button__icon nav-icon fas fa-eye"></i>
                <span class="button__text">Ver Alumnos Matriculados</span>
              </button>
            </div>
            
        
            <div class="row col-12 justify-content-center pt-4" style="margin-top: 40px;" id="divAlumnosMatriculadosByAnio">

              

            </div>  

        </div>
      </div>
    </div>

  </div>  --}}
  {{-- CODIGO HTML PARA MOSTRAR MATRICULADOS POR AÑO --}}
              {{-- @foreach($n_matriculados_ultimos_5_anios as $item_n_matriculados)
  
               <!-- N Alumnos matriculados -->
               <div class="col-lg-2 milestone_col">
                   <div class="milestone text-center">
                      @if($item_n_matriculados['anio']%2==0)
                         <div class="milestone_icon"><img src="images/icon-student-2.png" alt=""></div>
                      @else
                         <div class="milestone_icon"><img src="images/icon-student-1.png" alt=""></div>
                      @endif
                      <div class="milestone_counter" data-end-value="{{$item_n_matriculados['value']}}" data-sign-after="">69</div>
                      <div class="milestone_text" style="color: black; margin-top:20px !important;">Año {{$item_n_matriculados['anio']}}</div>
                    </div>
                </div>
              @endforeach --}}

  
  <!-- Reportes - Consultas y Otros -->
  <div class="page_section tag_fade_in" style="padding-bottom: 0px;">
  
    <div class="row">
      <div class="col">
        <div class="section_title text-center"  style="margin: 20px">
          <h1>Reportes</h1>
        </div>
      </div>
    </div>
  
    <!-- Reportes Accordions -->
    <div class="pbars_accordions">
      <div class="container">
  
        <div class="row pbars_accordions_container">
          <!-- Progress Bars & Accordions -->
  
          <div class="col">
  
            <!-- Accordions -->
            <div class="elements_accordions">
  
              {{-- <!-- Matrículas - SGA -->
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
              </div> --}}
  
              <!-- Matrículas -->
              <div class="accordion_container">
                <div class="accordion d-flex flex-row align-items-center" style="color: #393d42 !important;">MATRÍCULAS</div>
                <div id="accordion_panel_1" class="accordion_panel">
                  
                  <br>
                  <h3>Sede:</h3>
                  <select class=" combo_reportes input_field search_form_name @error('sede_matriculados') is-invalid @enderror" id="sede_matriculados" name="sede_matriculados" required="required" >
                    <option value="0" disabled selected>Seleccionar la sede...</option>
                    
                    @foreach($sedes_URAA_Website as $itemsede)
                      <option value="{{$itemsede['idSede']}}">
                        {{$itemsede['nombre']}}
                      </option>
                    @endforeach
                    <option value="99"> - Todas las Sedes - </option>

                  </select>
  
                  <br>
                  <h3>Semestre:</h3>
                  <select class=" combo_reportes input_field search_form_name @error('semestre_matriculados') is-invalid @enderror" id="semestre_matriculados" name="semestre_matriculados" required="required" >
                    <option value="0" disabled selected>Seleccionar el semestre...</option>
                    @foreach($semestres_URAA_Website as $itemsemestre)
                      <option value="{{$itemsemestre['idPeriodo']}}">
                        {{$itemsemestre['denominacion']}}
                      </option>
                    @endforeach
                  </select>
  
                  <br>
                  <h3>Facultad:</h3>
                  <select class="combo_reportes input_field search_form_name @error('dependencia_matriculados') is-invalid @enderror" id="dependencia_matriculados" name="dependencia_matriculados" required="required" >
                    <option value="0" disabled selected>Seleccionar la facultad...</option>
                    @foreach($facultades_URAA_Website as $itemfacultad)
                      <option value="{{$itemfacultad['idFacultad']}}">
                        
                        {{$itemfacultad['denominacion']}}
                      </option>
                    @endforeach
                  </select>

                  <br>
                  <h3>Tipo:</h3>
                  <select class="combo_reportes input_field search_form_name @error('tipo_matriculados') is-invalid @enderror" id="tipo_matriculados" name="tipo_matriculados" required="required" >
                    <option value="0" disabled selected>Seleccionar el tipo de Reporte...</option>
                    <option value="1">Por Género</option>
                    <option value="2">Por Sede</option>
                    <option value="3">Por Vez de Matrícula</option>
                  </select>
  
                  <div class="justify-content-center">
                    <button class="btn btn-dark btn-block py-2" style="margin-top: 8px; background-color:black !important;" type="button" id="btnBuscarMatriculados">
                      <i class="button__icon nav-icon fas fa-search"></i>
                      <span class="button__text">BUSCAR MATRÍCULAS</span>
                  
                    </button>
                  </div>
                  
  
                  <div class="d-flex table-responsive" style="margin-top: 32px;">
                    <table class="table table-bordered" style=" color:black !important;" width="90%" cellspacing="0" id="tablaMatriculados">
                     
                    </table> 
                  </div>      
       
  
                </div>
              </div>
  
              <!-- Grados y Títulos -->
              <div class="accordion_container">
                <div class="accordion d-flex flex-row align-items-center"  style="color: #393d42 !important;">GRADOS Y TÍTULOS</div>
                <div id="accordion_panel_2" class="accordion_panel">
  
                  <br>
                  <h3>Tipo:</h3>
                  <select class="combo_reportes input_field search_form_name @error('tipo_GT') is-invalid @enderror" id="tipo_GT" name="tipo_GT" required="required" >
                    <option value="0" disabled selected>Seleccionar el tipo de carpeta...</option>
                    <option value="1">GRADOS</option>
                    <option value="2">TÍTULOS</option>
                    <option value="3">TÍTULOS - SEGUNDA ESPECIALIDAD</option>
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
                    @foreach($facultades_URAA_Website as $itemfacultad)
                      <option value="{{$itemfacultad['nombre']}}">
                        
                        {{$itemfacultad['denominacion']}}
                      </option>
                    @endforeach
                  </select>
  
                  <div class="justify-content-center">
                    <button class="btn btn-dark btn-block py-2" style="margin-top: 8px; background-color:black !important;" type="button" id="btnBuscarGraduados_Titulados">
                      <i class="button__icon nav-icon fas fa-search"></i>
                      <span class="button__text">BUSCAR REPORTE</span>
                  
                    </button>
                  </div>

  
                  <div class="d-flex table-responsive" style="margin-top: 32px;">
                    <table class="table table-bordered" style=" color:black !important;" width="90%" cellspacing="0" id="tablaGraduados_Titulados">
                     
                    </table> 
                  </div>      
  
                </div>
              </div>
             
              <!-- Egresados -->
              <div class="accordion_container">
                <div class="accordion d-flex flex-row align-items-center"  style="color: #393d42 !important;">EGRESADOS</div>
                <div id="accordion_panel_3" class="accordion_panel"> 
  
                  <br>
                  <h3>Sede:</h3>
                  <select class=" combo_reportes input_field search_form_name @error('sede_egresados') is-invalid @enderror" id="sede_egresados" name="sede_egresados" required="required" >
                    <option value="0" disabled selected>Seleccionar la sede...</option>
                    @foreach($sedes_URAA_Website as $itemsede)
                      <option value="{{$itemsede['idSede']}}">
                        {{$itemsede['nombre']}}
                      </option>
                    @endforeach
                  </select>
  
                  <br>
                  <h3>Semestre:</h3>
                  <select class=" combo_reportes input_field search_form_name @error('semestre_egresados') is-invalid @enderror" id="semestre_egresados" name="semestre_egresados" required="required" >
                    <option value="0" disabled selected>Seleccionar el semestre...</option>
                    @foreach($semestres_URAA_Website as $itemsemestre)
                      <option value="{{$itemsemestre['idPeriodo']}}">
                        {{$itemsemestre['denominacion']}}
                      </option>
                    @endforeach
                  </select>
  
                  <br>
                  <h3>Facultad:</h3>
                  <select class="combo_reportes input_field search_form_name @error('dependencia_egresados') is-invalid @enderror" id="dependencia_egresados" name="dependencia_egresados" required="required" >
                    <option value="0" disabled selected>Seleccionar la facultad...</option>
                    @foreach($facultades_URAA_Website as $itemfacultad)
                      <option value="{{$itemfacultad['idFacultad']}}">
                        
                        {{$itemfacultad['denominacion']}}
                      </option>
                    @endforeach
                  </select>
  
                  <div class="justify-content-center">
                    <button class="btn btn-dark btn-block py-2" style="margin-top: 8px; background-color:black !important;" type="button" id="btnBuscarEgresados">
                      <i class="button__icon nav-icon fas fa-search"></i>
                      <span class="button__text">BUSCAR EGRESADOS</span>
                  
                    </button>
                  </div>
                  
                  
                  <div class="d-flex table-responsive" style="margin-top: 32px;">
                    <table class="table table-bordered" style=" color:black !important;" width="90%" cellspacing="0" id="tablaEgresados">
                     
                    </table> 
                  </div>      
  
                </div>
              </div>
  
  

  
            </div>
          </div>
  
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="section_title text-center"  style="margin: 20px">
          <h1>Reportes - Consolidado</h1>
        </div>
      </div>
    </div>
  
    <!-- Reportes - CONSOLIDADOS Accordions -->
    <div class="pbars_accordions">
      <div class="container">
  
        <div class="row pbars_accordions_container">
          <!-- Progress Bars & Accordions -->
  
          <div class="col">
  
            <!-- Accordions -->
            <div class="elements_accordions">
  
              <!-- Matrículas - Consolidado -->
              <div class="accordion_container">
                <div class="accordion d-flex flex-row align-items-center"  style="color: #393d42 !important;">Consolidado - MATRÍCULAS</div>
                <div id="accordion_panel_4" class="accordion_panel">
                  <br>
                  <h3>Semestre:</h3>
                  <select class=" combo_reportes input_field search_form_name @error('semestre_matriculasConsolidado') is-invalid @enderror" id="semestre_matriculasConsolidado" name="semestre_matriculasConsolidado" required="required" >
                    <option value="0" disabled selected>Seleccionar el semestre...</option>
                    @foreach($semestres_URAA_Website as $itemsemestre)
                      <option value="{{$itemsemestre['idPeriodo']}}">
                        {{$itemsemestre['denominacion']}}
                      </option>
                    @endforeach
                  </select>

                  <br>
                  <h3>Tipo de Consolidado:</h3>
                  <select class="combo_reportes input_field search_form_name @error('tipo_matriculasConsolidado') is-invalid @enderror" id="tipo_matriculasConsolidado" name="tipo_matriculasConsolidado" required="required" >
                    <option value="0" disabled selected>Seleccionar el tipo de Consolidado...</option>
                    <option value="1">Por Género</option>
                    <option value="2">Por Sede</option>
                    <option value="3">Por Vez de Matrícula</option>
                  </select>
  
                  <div class="justify-content-center">
                    <button class="btn btn-dark btn-block py-2" style="margin-top: 8px; background-color:black !important;" type="button" id="btnBuscarMatriculados_Consolidado">
                      <i class="button__icon nav-icon fas fa-search"></i>
                      <span class="button__text">BUSCAR MATRÍCULAS</span>
                  
                    </button>
                  </div>
  
                  <div class="d-flex table-responsive" style="margin-top: 32px;">
                    <table class="table table-bordered" style=" color:black !important;" width="90%" cellspacing="0" id="tablaMatriculados_Consolidado">
                     
                    </table> 
                  </div>      
  
                </div>
              </div>
  

              <!-- Grados y Títulos - Consolidado -->
              <div class="accordion_container">
                <div class="accordion d-flex flex-row align-items-center"  style="color: #393d42 !important;">Consolidado - GRADOS Y TÍTULOS</div>
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
  
                  <div class="justify-content-center">
                    <button class="btn btn-dark btn-block py-2" style="margin-top: 8px; background-color:black !important;" type="button" id="btnBuscarGraduados_Titulados_Consolidado">
                      <i class="button__icon nav-icon fas fa-search"></i>
                      <span class="button__text">BUSCAR REPORTE</span>
                  
                    </button>
                  </div>
  
                  <div class="d-flex table-responsive" style="margin-top: 32px; margin-bottom: 32px;">
                    <table class="table table-bordered" style=" color:black !important;" width="90%" cellspacing="0" id="tablaGraduados_Titulados_Consolidado">
                     
                    </table> 
                  </div>      
  
                </div>
              </div>
  

              <!-- Egresados - Consolidado -->
              <div class="accordion_container">
                <div class="accordion d-flex flex-row align-items-center"  style="color: #393d42 !important;">Consolidado - EGRESADOS</div>
                <div id="accordion_panel_6" class="accordion_panel">
                  <br>
                  <h3>Semestre:</h3>
                  <select class=" combo_reportes input_field search_form_name @error('semestre_egresadosConsolidado') is-invalid @enderror" id="semestre_egresadosConsolidado" name="semestre_egresadosConsolidado" required="required" >
                    <option value="0" disabled selected>Seleccionar el semestre...</option>
                    @foreach($semestres_URAA_Website as $itemsemestre)
                      <option value="{{$itemsemestre['idPeriodo']}}">
                        {{$itemsemestre['denominacion']}}
                      </option>
                    @endforeach
                  </select>
  
                  <div class="justify-content-center">
                    <button class="btn btn-dark btn-block py-2" style="margin-top: 8px; background-color:black !important;" type="button" id="btnBuscarEgresados_Consolidado">
                      <i class="button__icon nav-icon fas fa-search"></i>
                      <span class="button__text">BUSCAR EGRESADOS</span>
                  
                    </button>
                  </div>
  
                  <div class="d-flex table-responsive" style="margin-top: 32px;">
                    <table class="table table-bordered" style=" color:black !important;" width="90%" cellspacing="0" id="tablaEgresados_Consolidado">
                     
                    </table> 
                  </div>      
  
                </div>
              </div>
  

  
            </div>
          </div>
  
        </div>
      </div>
    </div>


    <!-- Consultas -->
    <div class="milestones">
    
      <div class="milestones_container tag_fade_in">
        <div class="milestones_background" style="background-image:url(images/milestones_background.jpg)"></div>
    
        <div class="row">
          <div class="col">
            <div class="section_title text-center">
              <h1 style="color: white; margin-bottom:74px;">Consultas</h1>
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
                
                 
                  <!-- Alumno / Egresado -->
                  <div class="accordion_container">
                    <div class="accordion d-flex flex-row align-items-center"  style="color: #393d42 !important;">ALUMNO / EGRESADO</div>
                    <div id="accordion_panel_7" class="accordion_panel" style="background-color: #eeeeee;"> 

                      <br>
                      <h3>Unidad:</h3>
                      <select class="combo_reportes input_field search_form_name @error('unidad_AlumnoEgresado') is-invalid @enderror" id="unidad_AlumnoEgresado" name="unidad_AlumnoEgresado" required>
                        <option style="font-size: 110%;" value="0" disabled selected>Seleccionar la unidad...</option>
                        <option style="font-size: 110%;" value="1">Pregrado</option>
                        <!-- option style="font-size: 110%;" value="2">Posgrado</option -->
                      
                      </select>
      
                      <br>
                      <h3>Buscar por:</h3>
                      <select class="combo_reportes input_field search_form_name @error('tipobusqueda_AlumnoEgresado') is-invalid @enderror" id="tipobusqueda_AlumnoEgresado" name="tipobusqueda_AlumnoEgresado" required>
                        <option style="font-size: 110%;" value="0" disabled selected>Seleccionar el tipo de búsqueda...</option>
                        <option style="font-size: 110%;" value="1">Código</option>
                        <option style="font-size: 110%;" value="2">DNI</option>
                        <option style="font-size: 110%;" value="3">Apellidos</option>
                        <option style="font-size: 110%;" value="4">Nombres</option>
                      </select>

                     

                      <!-- Inputs dinamicos -->
                      
                      <div class="" style="justify-content: center !important; margin-top: 16px; text-align: center;">
                        <h3>INGRESE DATOS:</h3>
                      </div>
                      

                      <div class="combo_consulta input-group mb-3" style="margin-top: 20px;" id="combo_AlumnoEgresado">

                        <span class="input-group-addon" id="basic-addon2">
                          <i class="nav-icon fas fa-search" id="icono_input_alumno_egresado"></i>
                        </span>

                        <!--   ^[a-zA-Z0-9áéíóúÁÉÍÓÚüÜñÑ\s]+$ -->
                        <!--   /^(?!.*(select|insert|update|delete|from|where|drop|create|alter))[a-zA-Z0-9áéíóúÁÉÍÓÚüÜñÑ\s]+$/i  -->
                        <input type="text" 
                        class="form-control @error('input_AlumnoEgresado') is-invalid @enderror" 
                        name="input_AlumnoEgresado" 
                        id="input_AlumnoEgresado" 
                        pattern="/^(?!.*(select|insert|update|delete|from|where|drop|create|alter))[a-zA-Z0-9áéíóúÁÉÍÓÚüÜñÑ\s]+$/i"
                        placeholder="BÚSQUEDA" 
                        aria-label="Ingrese Codigo" 
                        aria-describedby="basic-addon2" 
                        style="font-size: 16px;" 
                        required> 
                        @error('input_AlumnoEgresado')
                          <div class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          </div>
                          
                        @enderror   
                        
                      </div>
  
                      
                      <!-- CAPTCHA -->
                      <div class="row" style="justify-content:center; margin-top: 20px; margin-bottom: 12px;" >
                        <div class="g-recaptcha" id="captcha_1" data-callback="validarCaptcha_AlumnoEgresado" data-sitekey="6LcgHFopAAAAAM4FPzXfUmKB_Cn_pU9c8CPfCQHU"></div>
                      </div>

                      <!-- BOTONES -->
                      <div class="row" style="justify-content:center; margin-bottom: 10px;">
                        <button class="btn btn-success py-2" style="margin-top: 16px; background-color:rgb(40, 156, 40) !important; border-color: white; font-size:14px;" type="button" id="btnBuscar_AlumnoEgresado" disabled>
                          <i class="button__icon nav-icon fas fa-search"></i>
                          <span class="button__text">BUSCAR</span>
                      
                        </button>

                        <button class="btn btn-danger py-2" style="margin-top: 16px; background-color:rgb(194, 34, 34)!important; border-color: white; font-size:14px;" type="button" id="btnLimpiar_AlumnoEgresado" disabled>
                          <i class="button__icon nav-icon fas fa-trash-alt"></i>
                          <span class="button__text">LIMPIAR</span>
                      
                        </button>

                      </div>

                      
                    
                      
                      <hr>
      
                      <div class="d-flex table-responsive" style="margin-top: 24px;" id="contenedor_tablaConsulta_AlumnoEgresado">
                        <table class="table table-bordered table-hover" style=" color:black !important; background: white !important" width="90%" cellspacing="0" id="tablaConsulta_AlumnoEgresado" bordercolor="#000000">
                          <thead>
                            <tr class="table-info">
                              <th class="" style="text-align:center;" scope="col">#</th>
                              <th class="" scope="col">Código</th>
                              <th class="" scope="col">N° DNI</th>
                              <th class="" scope="col">Escuela Profesional</th>
                              <th class="" scope="col">Apellidos y Nombres</th>
                              <th class="" style="text-align:center;" scope="col">Condición</th>
                            </tr>
                          </thead>
                          <tbody class="page-data">


                          </tbody>

                        </table> 
                        

                      </div>      
      
                      <div class="d-flex" style="margin-top: 24px; margin-bottom: 48px; justify-content:center;">
                        <nav aria-label="Page navigation example">
                          <ul class="pagination">
                              <li onclick="prePage()" class="page-item page-list">
                                  <a class="page-link" href="javascript:void(0)" aria-label="Previous">
                                      <span aria-hidden="true">&laquo;</span>
                                      <span class="sr-only">Previous</span>
                                  </a>
                              </li>
                  
                              <li onclick="nextPage()" class="page-item">
                                  <a class="page-link" href="javascript:void(0)" aria-label="Next">
                                      <span aria-hidden="true">&raquo;</span>
                                      <span class="sr-only">Next</span>
                                  </a>
                              </li>
                          </ul>
                        </nav>
                      </div>
                      
                      
                    </div>
                  </div>
      
                  <!-- Primeros puestos -->
                  <div class="accordion_container">
                    <div class="accordion d-flex flex-row align-items-center"  style="color: #393d42 !important;">PRIMEROS PUESTOS</div>
                    <div id="accordion_panel_8" class="accordion_panel" style="background-color: #eeeeee;"> 

                      <br>
                      <h3>Sede:</h3>
                      <select class=" combo_reportes input_field search_form_name @error('sede_primeros_puestos') is-invalid @enderror" id="sede_primeros_puestos" name="sede_primeros_puestos" required="required" >
                        <option value="" disabled selected>Seleccionar la sede...</option>
                        
                        @foreach($sedes_URAA_Website as $itemsede)
                          <option value="{{$itemsede['idSede']}}">
                            {{$itemsede['nombre']}}
                          </option>
                        @endforeach
                        <option value="99"> - Todas las Sedes - </option>
    
                      </select>
      
                      <br>
                      <h3>Semestre:</h3>
                      <select class=" combo_reportes input_field search_form_name @error('semestre_primeros_puestos') is-invalid @enderror" id="semestre_primeros_puestos" name="semestre_primeros_puestos" required="required" >
                        <option value="" disabled selected>Seleccionar el semestre...</option>
                        @foreach($semestres_URAA_Website_primerosPuestos as $itemsemestre)
                          <option value="{{$itemsemestre['idPeriodo']}}">
                            {{$itemsemestre['denominacion']}}
                          </option>
                        @endforeach
                      </select>
      
                      <br>
                      <h3>Escuela:</h3>
                      <select class="combo_reportes input_field search_form_name @error('escuela_primeros_puestos') is-invalid @enderror" id="escuela_primeros_puestos" name="escuela_primeros_puestos" required="required" >
                        <option value="" disabled selected>Seleccionar la escuela...</option>
                        @foreach($escuelas_URAA_Website as $itemescuela)
                          <option value="{{$itemescuela['idEscuela']}}">
                            
                            {{$itemescuela['nombre']}}
                          </option>
                        @endforeach
                      </select>

                      <br>
                      <h3>Ciclo:</h3>
                      <select class="combo_reportes input_field search_form_name @error('ciclo_primeros_puestos') is-invalid @enderror" id="ciclo_primeros_puestos" name="ciclo_primeros_puestos" required="required" >
                        <option value="" disabled selected>Seleccionar el ciclo...</option>

                      </select>
                      

                      <div class="justify-content-center">
                        <button class="btn btn-dark btn-block py-2 mb-4" style="margin-top: 16px; background-color:black !important;" type="button" id="btnBuscarPrimerosPuestos">
                          <i class="button__icon nav-icon fas fa-search"></i>
                          <span class="button__text">BUSCAR REPORTE</span>
                      
                        </button>
                      </div>
                      
                      <hr>
      
                      <div class="d-flex table-responsive" style="margin-top: 32px;">
                        <table class="table table-bordered table-hover" style=" color:black !important; background: white !important; margin-bottom: 32px !important;" width="90%" cellspacing="0" id="tablaPrimerosPuestos" bordercolor="#000000">
                         
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
  
  $(document).ready(function() { 
      const Toast = Swal.mixin({
      toast: true,
      position: "top-start",
      showConfirmButton: false,
      timer: 3600,
      timerProgressBar: true,
      background: "#E4FFFC",
      didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
      }
    });
    Toast.fire({
      icon: "info",
      title: "Recuerda ver nuestros ultimos Reportes Estadisticos y Consultas &copy;"
    });

   });
  
  
  //
  // MILESTONES - MATRICULAS
  $('#btnVerMatriculas').on('click', function(){
    $.ajax({
      url: "/statitics/milestones/matriculadosByAnio/",
      type: 'GET',

      beforeSend: function(){
        $('#btnVerMatriculas').addClass("button--loading");
      },

      success: function (response) {
        console.log(response)
        try {
            var html = '';   

            var n_matriculados_ultimos_5_anios = response.n_matriculados_ultimos_5_anios;  

            for (var i = 0; i < n_matriculados_ultimos_5_anios.length; i++) {
              var fila = n_matriculados_ultimos_5_anios[5-(i+1)];
              var idx = i+1;
  
              html += '<div class="col-md-2 milestone_col mb-5">'+
                '<div class="milestone text-center">'+
                '<div class="milestone_icon"><img src="images/icon-student-1.png" alt=""></div>';

              // if(fila.anio % 2 == 0){
              //   html += '<div class="milestone_icon"><img src="images/icon-student-2.png" alt=""></div>';
              // }
              // else{
              //   html += '<div class="milestone_icon"><img src="images/icon-student-1.png" alt=""></div>';
              // }


              html += '<div class="milestone_counter" data-end-value="'+ fila.value + '" data-sign-after="">'+ fila.value + '</div>' +
              ' <div class="milestone_text" style="color: black; margin-top:20px !important;"> Año ' + fila.anio + '</div>'+
              '</div>' + '</div>';
              
            }

           
            $('#divAlumnosMatriculadosByAnio').html(html);

            $("#divAlumnosMatriculadosByAnio").css("display", "flex");
        } catch (e) {
          console.log(e);
        }
      },

      complete: function(){
        $('#btnVerMatriculas').removeClass("button--loading");
        $('#btnVerMatriculas').css("background-color","#bdbebd");
        

        // Get a reference to the button element
        const btnVerMatriculas = document.getElementById("btnVerMatriculas");
        btnVerMatriculas.disabled = true;
      },
    });
  });


  //  **************************** REPORTES **********************************
  $('#btnBuscarMatriculados').on('click', function(){
    $.ajax({
      url: "/statitics/reportes/matriculas/" + $('#sede_matriculados').val() + "/" + $('#semestre_matriculados').val() + "/" + $('#dependencia_matriculados').val() + "/" + $('#tipo_matriculados').val(),
      type: 'GET',

      beforeSend: function(){
        $('#btnBuscarMatriculados').addClass("button--loading");

        // Get a reference to the button element
        const btnBuscarMatriculados = document.getElementById("btnBuscarMatriculados");
        btnBuscarMatriculados.disabled = true;
        
      },

    
      success: function (response) {
        console.log(response)
        try {
            var html = '';

            // Por Género
            if(response.tipo_matriculados == 1){

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
            }


            //Por Sede
            else if(response.tipo_matriculados == 2){
              
              html+='<thead><tr><th style="text-align:center;">#</th><th>Dependencia Académica</th><th style="text-align:center;">  Trujillo  </th><th style="text-align:center;">Jequetepeque</th><th style="text-align:center;">Huamachuco</th><th style="text-align:center;">S. de Chuco</th><th style="text-align:center;">TOTAL MATRICULADOS</th></tr></thead>';
              
              var matriculados = response.matriculados;
              var matriculados_total = 0;
              var matriculados_trujillo_total = 0;
              var matriculados_valleJequetepeque_total = 0;
              var matriculados_huamachuco_total = 0;
              var matriculados_santiagoDeChuco_total = 0;
              
              for (var i = 0; i < matriculados.length; i++) {
                var fila = matriculados[i];
                var idx = i+1;           
              
                matriculados_trujillo_total += fila.trujillo;
                matriculados_valleJequetepeque_total += fila.valle_jequetepeque;
                matriculados_huamachuco_total += fila.huamachuco;
                matriculados_santiagoDeChuco_total += fila.santiago_de_chuco;
                matriculados_total += fila.nro_matriculados;
              
                html += '<tbody> <tr>' +
                '<td style="text-align:center;">' + idx + '</td>' +
                '<td>' + fila.dep_nombre + '</td>' + 
                '<td style="text-align:center;">' + fila.trujillo + '</td>' +
                '<td style="text-align:center;">' + fila.valle_jequetepeque + '</td>' +
                '<td style="text-align:center;">' + fila.huamachuco + '</td>' +
                '<td style="text-align:center;">' + fila.santiago_de_chuco + '</td>' +
                '<td style="text-align:center;">' + fila.nro_matriculados + '</td>' +
                '</tr> </tbody>';
              
              }
              
              html+='<tfoot><tr style="border: 2px solid #332D2D;"><th> </th><th>TOTAL GENERAL</th><th style="text-align:center;">' + matriculados_trujillo_total + '</th><th style="text-align:center;">' +  matriculados_valleJequetepeque_total + '</th><th style="text-align:center;">' +  matriculados_huamachuco_total + '</th><th style="text-align:center;">' +  matriculados_santiagoDeChuco_total + '</th><th style="text-align:center;">' + matriculados_total + '</tr></tfoot>';
            
            }


            //Por Vez
            else if(response.tipo_matriculados == 3){
              
              html+='<thead><tr><th>#</th><th>Escuela Profesional</th><th style="text-align:center;">1ra Vez</th><th style="text-align:center;">2da Vez</th><th style="text-align:center;">3ra Vez</th><th style="text-align:center;">4ta Vez</th><th style="text-align:center;">TOTAL MATRICULADOS</th></tr></thead>';
              
              var matriculados = response.matriculados;
              var matriculados_total = 0;
              var matriculados_vez_1_total = 0;
              var matriculados_vez_2_total = 0;
              var matriculados_vez_3_total = 0;
              var matriculados_vez_4_total = 0;
              
              for (var i = 0; i < matriculados.length; i++) {
                var fila = matriculados[i];
                var idx = i+1;
                matriculados_total += fila.nro_matriculados;
                matriculados_vez_1_total += fila.vez_1;
                matriculados_vez_2_total += fila.vez_2;
                matriculados_vez_3_total += fila.vez_3;
                matriculados_vez_4_total += fila.vez_4;
                html += '<tbody> <tr>' +
                '<td>' + idx + '</td>' +
                '<td>' + fila.dep_nombre + '</td>' + 
                '<td style="text-align:center;">' + fila.vez_1 + '</td>' +
                '<td style="text-align:center;">' + fila.vez_2 + '</td>' +
                '<td style="text-align:center;">' + fila.vez_3 + '</td>' +
                '<td style="text-align:center;">' + fila.vez_4 + '</td>' +
                '<td style="text-align:center;">' + fila.nro_matriculados + '</td>' +
                '</tr> </tbody>';
                
              }
              
              html+='<tfoot><tr style="border: 2px solid #332D2D;"><th> </th><th>TOTAL GENERAL</th><th style="text-align:center;">' + matriculados_vez_1_total + '</th><th style="text-align:center;">' +  matriculados_vez_2_total + '</th><th style="text-align:center;">' + matriculados_vez_3_total + '</th><th style="text-align:center;">' +  matriculados_vez_4_total + '</th><th style="text-align:center;">' + matriculados_total + '</tr></tfoot>';
            }
            

            $('#tablaMatriculados').html(html);

            $("#accordion_panel_1").css("max-height", "1500px");
        } catch (e) {
          console.log(e);
        }
      },

      complete: function(){
        $('#btnBuscarMatriculados').removeClass("button--loading");
    
        // Get a reference to the button element
        const btnBuscarMatriculados = document.getElementById("btnBuscarMatriculados");
        btnBuscarMatriculados.disabled = false;
    
      },

    });
  });

  $('#btnBuscarGraduados_Titulados').on('click', function(){
  $.ajax({
    url: "/statitics/reportes/graduados_titulados/" + $('#tipo_GT').val() + "/" + $('#condicion_GT').val() + "/" + $('#anio_GT').val() + "/" + $('#dependencia_GT').val(),
    type: 'GET',

    beforeSend: function(){
        $('#btnBuscarGraduados_Titulados').addClass("button--loading");

         // Get a reference to the button element - disabled
         const btnBuscarGraduados_Titulados = document.getElementById("btnBuscarGraduados_Titulados");
         btnBuscarGraduados_Titulados.disabled = true;

    },

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

          $("#accordion_panel_2").css("max-height", "2400px");
      } catch (e) {
        console.log(e);
      }
    },

    complete: function(){
        $('#btnBuscarGraduados_Titulados').removeClass("button--loading");
    
        // Get a reference to the button element - enabled
        const btnBuscarGraduados_Titulados = document.getElementById("btnBuscarGraduados_Titulados");
        btnBuscarGraduados_Titulados.disabled = false;
    },
  });
  });

  $('#btnBuscarEgresados').on('click', function(){
    $.ajax({
      url: "/statitics/reportes/egresados/" + $('#sede_egresados').val() + "/" + $('#semestre_egresados').val() + "/" + $('#dependencia_egresados').val(),
      type: 'GET',

      beforeSend: function(){
        $('#btnBuscarEgresados').addClass("button--loading");
        // Get a reference to the button element - disabled
        const btnBuscarEgresados = document.getElementById("btnBuscarEgresados");
        btnBuscarEgresados.disabled = true;
      },

      success: function (response) {
        console.log(response)
        try {
            var html = '';
         
            html+='<thead><tr><th style="text-align:center;">#</th><th>Escuela Profesional</th><th style="text-align:center;">Femenino</th><th style="text-align:center;">Masculino</th><th style="text-align:center;">TOTAL EGRESADOS</th></tr></thead>';

            var egresados = response.egresados;
            var egresados_total = 0;
            var egresados_femenino_total = 0;
            var egresados_masculino_total = 0;

            for (var i = 0; i < egresados.length; i++) {
              var fila = egresados[i];
              var idx = i+1;
              egresados_total += fila.nro_egresados;
              egresados_femenino_total += fila.femenino;
              egresados_masculino_total += fila.masculino;

              html += '<tbody> <tr>' +
              '<td style="text-align:center;">' + idx + '</td>' +
              '<td>' + fila.dep_nombre + '</td>' + 
              '<td style="text-align:center;">' + fila.femenino + '</td>' +
              '<td style="text-align:center;">' + fila.masculino + '</td>' +
              '<td style="text-align:center;">' + fila.nro_egresados + '</td>' +
              '</tr> </tbody>';
              
            }

            html+='<tfoot><tr style="border: 2px solid #332D2D;"><th> </th><th>TOTAL GENERAL</th><th style="text-align:center;">' + egresados_femenino_total + '</th><th style="text-align:center;">' +  egresados_masculino_total + '</th><th style="text-align:center;">' + egresados_total + '</tr></tfoot>';

            $('#tablaEgresados').html(html);

            $("#accordion_panel_3").css("max-height", "1500px");
        } catch (e) {
          console.log(e);
        }
      },

      complete: function(){
        $('#btnBuscarEgresados').removeClass("button--loading");
    
        // Get a reference to the button element - enabled
        const btnBuscarEgresados = document.getElementById("btnBuscarEgresados");
        btnBuscarEgresados.disabled = false;
      },
    });
  });


  // ************************ REPORTES - Consolidado ****************************
  $('#btnBuscarMatriculados_Consolidado').on('click', function(){
  $.ajax({
    url: "/statitics/reportes/matriculas_consolidado/" + $('#semestre_matriculasConsolidado').val() + "/" + $('#tipo_matriculasConsolidado').val(),
    type: 'GET',

    beforeSend: function(){
        $('#btnBuscarMatriculados_Consolidado').addClass("button--loading");

        // Get a reference to the button element - disabled
        const btnBuscarMatriculados_Consolidado = document.getElementById("btnBuscarMatriculados_Consolidado");
        btnBuscarMatriculados_Consolidado.disabled = true;
        
    },

    success: function (response) {
      console.log(response)
      try {
          var html = '';
       
          // Por Género
          if(response.tipo_consolidado_Matriculados == 1){
            html+='<thead><tr><th style="text-align:center;">#</th><th>Dependencia Académica</th><th style="text-align:center;">Femenino</th><th style="text-align:center;">Masculino</th><th style="text-align:center;">TOTAL MATRICULADOS</th></tr></thead>';

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
              '<td>' + fila.dep_nombre + '</td>' + 
              '<td style="text-align:center;">' + fila.femenino + '</td>' +
              '<td style="text-align:center;">' + fila.masculino + '</td>' +
              '<td style="text-align:center;">' + fila.nro_matriculados_consolidado + '</td>' +
              '</tr> </tbody>';
            
            }

            html+='<tfoot><tr style="border: 2px solid #332D2D;"><th> </th><th>TOTAL GENERAL</th><th style="text-align:center;">' + matriculados_femenino_total + '</th><th style="text-align:center;">' +  matriculados_masculino_total + '</th><th style="text-align:center;">' + matriculados_total + '</tr></tfoot>';
          }



          // Por Sede

          else if(response.tipo_consolidado_Matriculados == 2){

            html+='<thead><tr><th style="text-align:center;">#</th><th>Dependencia Académica</th><th style="text-align:center;">  Trujillo  </th><th style="text-align:center;">Jequetepeque</th><th style="text-align:center;">Huamachuco</th><th style="text-align:center;">S. de Chuco</th><th style="text-align:center;">TOTAL MATRICULADOS</th></tr></thead>';

            var matriculados = response.matriculados;
            var matriculados_total = 0;
            var matriculados_trujillo_total = 0;
            var matriculados_valleJequetepeque_total = 0;
            var matriculados_huamachuco_total = 0;
            var matriculados_santiagoDeChuco_total = 0;
   
            for (var i = 0; i < matriculados.length; i++) {
              var fila = matriculados[i];
              var idx = i+1;           

              matriculados_trujillo_total += fila.trujillo;
              matriculados_valleJequetepeque_total += fila.valle_jequetepeque;
              matriculados_huamachuco_total += fila.huamachuco;
              matriculados_santiagoDeChuco_total += fila.santiago_de_chuco;
              matriculados_total += fila.nro_matriculados_consolidado;

              html += '<tbody> <tr>' +
              '<td style="text-align:center;">' + idx + '</td>' +
              '<td>' + fila.dep_nombre + '</td>' + 
              '<td style="text-align:center;">' + fila.trujillo + '</td>' +
              '<td style="text-align:center;">' + fila.valle_jequetepeque + '</td>' +
              '<td style="text-align:center;">' + fila.huamachuco + '</td>' +
              '<td style="text-align:center;">' + fila.santiago_de_chuco + '</td>' +
              '<td style="text-align:center;">' + fila.nro_matriculados_consolidado + '</td>' +
              '</tr> </tbody>';
            
            }

            html+='<tfoot><tr style="border: 2px solid #332D2D;"><th> </th><th>TOTAL GENERAL</th><th style="text-align:center;">' + matriculados_trujillo_total + '</th><th style="text-align:center;">' +  matriculados_valleJequetepeque_total + '</th><th style="text-align:center;">' +  matriculados_huamachuco_total + '</th><th style="text-align:center;">' +  matriculados_santiagoDeChuco_total + '</th><th style="text-align:center;">' + matriculados_total + '</tr></tfoot>';
          }


          // Por Vez de Matrícula

          else if(response.tipo_consolidado_Matriculados == 3){

            html+='<thead><tr><th>#</th><th>Dependencia Académica</th><th style="text-align:center;">1ra Vez</th><th style="text-align:center;">2da Vez</th><th style="text-align:center;">3ra Vez</th><th style="text-align:center;">4ta Vez</th><th style="text-align:center;">TOTAL MATRICULADOS</th></tr></thead>';
              
              var matriculados = response.matriculados;
              var matriculados_total = 0;
              var matriculados_vez_1_total = 0;
              var matriculados_vez_2_total = 0;
              var matriculados_vez_3_total = 0;
              var matriculados_vez_4_total = 0;
              
              for (var i = 0; i < matriculados.length; i++) {
                var fila = matriculados[i];
                var idx = i+1;
                matriculados_total += fila.nro_matriculados_consolidado;
                matriculados_vez_1_total += fila.vez_1;
                matriculados_vez_2_total += fila.vez_2;
                matriculados_vez_3_total += fila.vez_3;
                matriculados_vez_4_total += fila.vez_4;
                html += '<tbody> <tr>' +
                '<td>' + idx + '</td>' +
                '<td>' + fila.dep_nombre + '</td>' + 
                '<td style="text-align:center;">' + fila.vez_1 + '</td>' +
                '<td style="text-align:center;">' + fila.vez_2 + '</td>' +
                '<td style="text-align:center;">' + fila.vez_3 + '</td>' +
                '<td style="text-align:center;">' + fila.vez_4 + '</td>' +
                '<td style="text-align:center;">' + fila.nro_matriculados_consolidado + '</td>' +
                '</tr> </tbody>';
                
              }
              
              html+='<tfoot><tr style="border: 2px solid #332D2D;"><th> </th><th>TOTAL GENERAL</th><th style="text-align:center;">' + matriculados_vez_1_total + '</th><th style="text-align:center;">' +  matriculados_vez_2_total + '</th><th style="text-align:center;">' + matriculados_vez_3_total + '</th><th style="text-align:center;">' +  matriculados_vez_4_total + '</th><th style="text-align:center;">' + matriculados_total + '</tr></tfoot>';
          
          }

          

          $('#tablaMatriculados_Consolidado').html(html);

          $("#accordion_panel_4").css("max-height", "1500px");
      } catch (e) {
        console.log(e);
      }
    },

    complete: function(){
        $('#btnBuscarMatriculados_Consolidado').removeClass("button--loading");
    
        // Get a reference to the button element - enabled
        const btnBuscarMatriculados_Consolidado = document.getElementById("btnBuscarMatriculados_Consolidado");
        btnBuscarMatriculados_Consolidado.disabled = false;
    
    },

  });
  });

  $('#btnBuscarGraduados_Titulados_Consolidado').on('click', function(){
  $.ajax({
    url: "/statitics/reportes/graduados_titulados_consolidado/" + $('#condicion_GT_Consolidado').val() + "/" + $('#anio_GT_Consolidado').val(),
    type: 'GET',

    beforeSend: function(){
        $('#btnBuscarGraduados_Titulados_Consolidado').addClass("button--loading");

        // Get a reference to the button element - disabled
        const btnBuscarGraduados_Titulados_Consolidado = document.getElementById("btnBuscarGraduados_Titulados_Consolidado");
        btnBuscarGraduados_Titulados_Consolidado.disabled = true;
        
    },

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
    },

    complete: function(){
        $('#btnBuscarGraduados_Titulados_Consolidado').removeClass("button--loading");
    
        // Get a reference to the button element - enabled
        const btnBuscarGraduados_Titulados_Consolidado = document.getElementById("btnBuscarGraduados_Titulados_Consolidado");
        btnBuscarGraduados_Titulados_Consolidado.disabled = false;
      },

  });
  });

  $('#btnBuscarEgresados_Consolidado').on('click', function(){
  $.ajax({
    url: "/statitics/reportes/egresados_consolidado/" + $('#semestre_egresadosConsolidado').val(),
    type: 'GET',

    beforeSend: function(){
        $('#btnBuscarEgresados_Consolidado').addClass("button--loading");

        // Get a reference to the button element - disabled
        const btnBuscarGraduados_Titulados_Consolidado = document.getElementById("btnBuscarEgresados_Consolidado");
        btnBuscarEgresados_Consolidado.disabled = true;
        
    },
    success: function (response) {
      console.log(response)
      try {
          var html = '';
       
          html+='<thead><tr><th style="text-align:center;">#</th><th>Dependencia Académica</th><th style="text-align:center;">Femenino</th><th style="text-align:center;">Masculino</th><th style="text-align:center;">TOTAL EGRESADOS</th></tr></thead>';

          var egresados = response.egresadosConsolidado;
          var egresados_total = 0;
          var egresados_femenino_total = 0;
          var egresados_masculino_total = 0;
   
          for (var i = 0; i < egresados.length; i++) {
            var fila = egresados[i];
            var idx = i+1;           

            egresados_femenino_total += fila.femenino;
            egresados_masculino_total += fila.masculino;
            egresados_total += fila.nro_egresados_consolidado;

            html += '<tbody> <tr>' +
              '<td style="text-align:center;">' + idx + '</td>' +
              '<td>' + fila.dep_nombre + '</td>' + 
              '<td style="text-align:center;">' + fila.femenino + '</td>' +
              '<td style="text-align:center;">' + fila.masculino + '</td>' +
              '<td style="text-align:center;">' + fila.nro_egresados_consolidado + '</td>' +
              '</tr> </tbody>';
            
          }

          html+='<tfoot><tr style="border: 2px solid #332D2D;"><th> </th><th>TOTAL GENERAL</th><th style="text-align:center;">' + egresados_femenino_total + '</th><th style="text-align:center;">' +  egresados_masculino_total + '</th><th style="text-align:center;">' + egresados_total + '</tr></tfoot>';

          $('#tablaEgresados_Consolidado').html(html);

          $("#accordion_panel_6").css("max-height", "1500px");
      } catch (e) {
        console.log(e);
      }
    },

    complete: function(){
        $('#btnBuscarEgresados_Consolidado').removeClass("button--loading");
    
        // Get a reference to the button element - enabled
        const btnBuscarEgresados_Consolidado = document.getElementById("btnBuscarEgresados_Consolidado");
        btnBuscarEgresados_Consolidado.disabled = false;
    },
    
    
  });
  });

   //  ***************************** CONSULTAS  ************************************
  $('#btnBuscarPrimerosPuestos').on('click', function(){
  $.ajax({
    url: "/statitics/consultas/primeros_puestos/" + $('#sede_primeros_puestos').val() + "/" + $('#semestre_primeros_puestos').val() + "/" + $('#escuela_primeros_puestos').val() + "/" + $('#ciclo_primeros_puestos').val(),
    type: 'GET',

    beforeSend: function(){
        $('#btnBuscarPrimerosPuestos').addClass("button--loading");

        // Get a reference to the button element - disabled
        const btnBuscar_PrimerosPuestos = document.getElementById("btnBuscarPrimerosPuestos");
        btnBuscar_PrimerosPuestos.disabled = true;
        
    },
    success: function (response) {
      console.log(response)
      try {

          var escuela = response.escuela;
          var semestre_academico = response.semestre;

          var html = '';
          html+='<caption>Reporte URA '+ semestre_academico + '. Primeros puestos Escuela Profesional de '+ escuela + '.</caption>';

          html+='<thead><tr class="table-primary"><th style="text-align:center;">Orden de Mérito</th><th style="text-align:center;">Código</th><th style="text-align:center;">Nombres completos</th><th style="text-align:center;">Promedio Ponderado</th></tr></thead>';

          var primeros_puestos = response.primeros_puestos;
          console.log(primeros_puestos);

          html+= '<tbody>';

          for (var i = 0; i < primeros_puestos.length; i++) {
            var fila = primeros_puestos[i];           
            if(fila.orden_merito == 1){
              html += '<tr style="align-items:center;">' +
              '<td class="table-warning" style="text-align:center;"><img src="{{ asset("images/gold_medal.png") }}" width="24" alt="">' + 
                fila.orden_merito + '°</td>' +
              '<td style="text-align:center;">' + fila.nro_matricula + '</td>' +
              '<td>' + fila.nombres + '</td>' + 
              '<td style="text-align:center;">' + fila.promedio_ponderado + '</td>' +
              '</tr> </tbody>';
            }
            else if(fila.orden_merito == 2){
              html += '<tbody> <tr style="align-items:center;">' +
              '<td class="table-active" style="text-align:center;"><img src="{{ asset("images/silver_medal.png") }}" width="24" alt="">' + 
                fila.orden_merito + '°</td>' +
              '<td style="text-align:center;">' + fila.nro_matricula + '</td>' +
              '<td>' + fila.nombres + '</td>' + 
              '<td style="text-align:center;">' + fila.promedio_ponderado + '</td>' +
              '</tr> </tbody>';
            }
            else{
            html += '<tbody> <tr style="align-items:center;">' +
              '<td style="text-align:center;">' + fila.orden_merito + '°</td>' +
              '<td style="text-align:center;">' + fila.nro_matricula + '</td>' +
              '<td>' + fila.nombres + '</td>' + 
              '<td style="text-align:center;">' + fila.promedio_ponderado + '</td>' +
              '</tr>';
            }
          }

          html+= '</tbody>';

          $('#tablaPrimerosPuestos').html(html);

          $("#accordion_panel_8").css("max-height", "1800px");
      } catch (e) {
        console.log(e);
      }
    },

    complete: function(){
        $('#btnBuscarPrimerosPuestos').removeClass("button--loading");
    
        // Get a reference to the button element - enabled
        const btnBuscar_PrimerosPuestos = document.getElementById("btnBuscarPrimerosPuestos");
        btnBuscar_PrimerosPuestos.disabled = false;
    },
    
    
  });
  });

 
  // BUSCAR ALUMNO-EGRESADO
  // $('#btnBuscar_AlumnoEgresado').on('click', function(){
  //   $.ajax({
  //     url: "/statitics/consultas/alumno_egresado/" + $('#unidad_AlumnoEgresado').val() + "/" + $('#tipobusqueda_AlumnoEgresado').val() + "/" + $('#input_AlumnoEgresado').val() ,
  //     type: 'GET',

  //     beforeSend: function(){
  //       $('#btnBuscar_AlumnoEgresado').addClass("button--loading");

  //       // Get a reference to the button element - disabled
  //       const btnBuscar_AlumnoEgresado = document.getElementById("btnBuscar_AlumnoEgresado");
  //       btnBuscar_AlumnoEgresado.disabled = true;
        
  //     },

  //     success: function (response) {
  //       const tablaConsulta_AlumnoEgresado = document.getElementById("tablaConsulta_AlumnoEgresado");
  //       tablaConsulta_AlumnoEgresado.classList.remove("d-none");

  //       console.log(response)
  //       try {
  //           var html = '';
         
  //           html+=
  //             '<thead>'+
  //               '<tr>'+
  //                 '<th style="text-align:center;">#</th>'+
  //                 '<th>Código</th>'+
  //                 '<th>N° DNI</th>'+
  //                 '<th>Escuela Profesional</th>'+
  //                 '<th>Apellidos y Nombres</th>'+
  //                 '<th style="text-align:center;">Condición</th>'+
  //               '</tr>'+
  //             '</thead>';

  //           var alumnos = response.alumnos;

  //           for (var i = 0; i < alumnos.length; i++) {
  //             var fila = alumnos[i];
  //             var idx = i+1;

  //             html += '<tbody> <tr>' +
  //             '<td style="text-align:center;">' + idx + '</td>' +
  //             '<td>' + fila.codigo + '</td>' + 
  //             '<td>' + fila.dni + '</td>' + 
  //             '<td>' + fila.escuela + '</td>' +
  //             '<td>' + fila.nombreCompleto + '</td>' +
  //             '<td style="text-align:center;">'+ fila.condicion + '</td>';

  //             /*
  //               '<button class="btn btn-primary" style="margin-top: 16px; background-color: rgb(43, 120, 209) !important; border-color: white;" type="button" id="btnVerDetalles_AlumnoEgresado">'+
  //                   '<i class="nav-icon fa fa-eye"></i>'+
  //                     'Ver detalles' +
  //                 '</button></td>' +
  //             '</tr> </tbody>';
  //             */
              
  //           }


  //           $('#tablaConsulta_AlumnoEgresado').html(html);

  //           $("#accordion_panel_7 ").css("max-height", "1600px");
  //       } catch (e) {
  //         console.log(e);
  //       }
  //     },
  //     complete: function(){
  //       $('#btnBuscar_AlumnoEgresado').removeClass("button--loading");
    
  //       // Get a reference to the button element - enabled
  //       const btnBuscar_AlumnoEgresado = document.getElementById("btnBuscar_AlumnoEgresado");
  //       btnBuscar_AlumnoEgresado.disabled = false;
  //     },
  //   });
  // });

  // LIMPIAR ALUMNO-EGRESADO
  $('#btnLimpiar_AlumnoEgresado').on('click', function(){
    
    document.getElementById("input_AlumnoEgresado").value = "";
  
    const tablaConsulta_AlumnoEgresado = document.getElementById("tablaConsulta_AlumnoEgresado");
    tablaConsulta_AlumnoEgresado.classList.add("d-none");

    //Reset Combos
    const comboUnidad_AlumnoEgresado = document.querySelector('#unidad_AlumnoEgresado');
    comboUnidad_AlumnoEgresado.value = '0';

    const comboTipoBusqueda_AlumnoEgresado = document.querySelector('#tipobusqueda_AlumnoEgresado');
    comboTipoBusqueda_AlumnoEgresado.value = '0';

    // ELIMINAR LOS ITEMS DE LA PAGINACIÓN ULTIMA
    document.querySelectorAll("li.list-item").forEach(e => e.remove());


    //DESACTIVAR BOTONES
    const btnBuscar_AlumnoEgresado = document.getElementById("btnBuscar_AlumnoEgresado");
    btnBuscar_AlumnoEgresado.disabled = true;

    const btnLimpiar_AlumnoEgresado = document.getElementById("btnLimpiar_AlumnoEgresado");
    btnLimpiar_AlumnoEgresado.disabled = true;

  });



$(document).ready(function(){
});



 

</script>
@endsection

