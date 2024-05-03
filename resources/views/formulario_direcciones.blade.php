@extends('layouts.guest')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/login_styles.css') }}">
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
        <div class="hero_slide_background" style="background-image:url(images/search_background.jpg)"></div>
        <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center" style="height:100%">
          <div class="hero_slide_content text-center" style="padding-top: 60px">
             <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut"><span>Actualización de Datos</span></h1> 
          </div>
        </div>
      </div>
      <!-- Hero Slide -->
      <div class="hero_slide">
        <div class="hero_slide_background" style="background-image:url(images/search_background.jpg)"></div>
        <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center" style="height:100%">
          <div class="hero_slide_content text-center" style="padding-top: 60px">
             <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut"><span>Actualización de Datos</span></h1> 
          </div>
        </div>
      </div>
    
    </div>

  </div>

</div>

<!-- Formulario Doble -->
<div class="register" id="formulario_alumno" style="padding-top:0px; padding-bottom:0px; border: 2px solid #000000">
  <div class="container-fluid">
    <div class="row row-eq-height">

      <!-- Busqueda -->
      <div class="col-lg-6 nopadding">

        <div class="register_section d-flex flex-column align-items-center justify-content-center">
          <div class="register_content text-center">
            <h1 class="register_title">
              <span style="color: rgb(35, 40, 53); font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">BÚSQUEDA DE ESTUDIANTE</span>
            </h1>

            <p class="register_text" style="font-size:16px;">
              Ingrese su  <span style="color: black; font-size:16px;"> Código de matrícula </span> para validar si es un estudiante y pueda <span style="color: black">Actualizar su dirección respectiva 
              </span> en el formulario de Datos del estudiante brindado a continuación.
            </p>
            <br>
            
            <div class="combo_formulario_direcciones input-group mb-4 px-5" style="margin-top: 8px;" id="combo_formulario_direcciones">

              <span class="input-group-addon" id="basic-addon3" style="border-color:white;">
                <i class="nav-icon fas fa-address-card" id="icono_input_alumno_egresado"></i>
              </span>

              <!--   ^[a-zA-Z0-9áéíóúÁÉÍÓÚüÜñÑ\s]+$ -->
              <!--   /^(?!.*(select|insert|update|delete|from|where|drop|create|alter))[a-zA-Z0-9áéíóúÁÉÍÓÚüÜñÑ\s]+$/i  -->
              <input type="text" 
              class="form-control input_field @error('input_busqueda_formulario_direcciones') is-invalid @enderror" 
              name="input_busqueda_formulario_direcciones" 
              id="input_busqueda_formulario_direcciones" 
              pattern="/^(?!.*(select|insert|update|delete|from|where|drop|create|alter))[a-zA-Z0-9áéíóúÁÉÍÓÚüÜñÑ\s]+$/i"
              placeholder="CÓDIGO DE MATRÍCULA" 
              aria-label="Ingrese N° de matrícula" 
              aria-describedby="basic-addon3" 
              style="font-size: 16px;" 
              required> 
              @error('input_busqueda_formulario_direcciones')
                <div class="alert alert-danger" role="alert">
                  <strong>{{ $message }}</strong>
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                </div>
                
              @enderror   
              
            </div>  

            <!-- CAPTCHA -->
            <div class="row px-2" style="justify-content:center; margin-top: 20px; margin-bottom: 12px;" >
              <div class="g-recaptcha" id="captcha_2" data-callback="validarCaptcha_FormularioDirecciones" data-sitekey="6LcgHFopAAAAAM4FPzXfUmKB_Cn_pU9c8CPfCQHU"></div>
            </div>

            <!-- BOTONES -->
            <div class="row" style="justify-content:center; margin-bottom: 10px;">
              <button class="btn btn-dark py-3 px-4" style="margin-top: 10px; background-color:black !important; font-size:14px;" type="button" id="btnBuscar_FormularioDirecciones">
                <i class="button__icon nav-icon fas fa-search"></i>
                <span class="button__text ml-1">BUSCAR</span>
            
              </button>

            </div>
    
          </div>
        </div>
      </div>


       <!-- Formulario -->
      <div class="col-lg-6 nopadding">
       
        <div class="search_section d-flex flex-column align-items-center justify-content-center">
          <div class="search_background" style="background-image:url(images/background_milestones_matriculas_2.jpg);"></div>
          <div class="text-center px-3 align-items-center justify-content-center">
            <h1 class="search_title">
              <span style=" font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Datos del Estudiante</span>
            </h1>
            <form method="POST" action="{{ route('formulario_direcciones.store') }}" class="search_form">
                @csrf

                <div class="form-group d-flex mb-3 row justify-content-start">
                  
                  <!-- Código -->
                    <div class="col-md-6 input-group">

                      <span class="input-group-addon" id="basic-addon3" style="border-color:white;">
                        <i class="nav-icon fas fa-university" id=""></i>
                      </span>

                      <input type="text" class="form-control input_field  @error('formulario_direcciones_codigo') is-invalid @enderror" id="formulario_direcciones_codigo" name="formulario_direcciones_codigo" placeholder="CÓDIGO" 
                      value="" style="color: black !important;" readonly required>
                      @error('formulario_direcciones_codigo')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <!-- DNI -->
                    <div class="col-md-6 input-group">

                      <span class="input-group-addon" id="basic-addon3" style="border-color:white;">
                        <i class="nav-icon fas fa-address-card" id=""></i>
                      </span>

                      <input type="text" class="form-control input_field  @error('formulario_direcciones_dni') is-invalid @enderror" id="formulario_direcciones_dni" name="formulario_direcciones_dni" placeholder="DNI" 
                      value="" style="color: black !important;" readonly required>
                      @error('formulario_direcciones_dni')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                </div>

                <div class="form-group d-flex mb-3 row justify-content-start">
                  
                  <!-- Apellidos -->
                  <div class="col-md-6 input-group">

                    <span class="input-group-addon" id="basic-addon3" style="border-color:white;">
                      <i class="nav-icon fas fa-user" id=""></i>
                    </span>

                    <input type="text" class="form-control input_field  @error('formulario_direcciones_apellidos') is-invalid @enderror" id="formulario_direcciones_apellidos" name="formulario_direcciones_apellidos" placeholder="APELLIDOS" 
                    value="" style="color: black !important;"  readonly required>
                    @error('formulario_direcciones_apellidos')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <!-- Nombres -->
                  <div class="col-md-6 input-group">

                    <span class="input-group-addon" id="basic-addon3" style="border-color:white;">
                      <i class="nav-icon fas fa-user" id=""></i>
                    </span>

                    <input type="text" class="form-control input_field  @error('formulario_direcciones_nombres') is-invalid @enderror" id="formulario_direcciones_nombres" name="formulario_direcciones_nombres" placeholder="NOMBRES" 
                    value="" style="color: black !important;"  readonly required>
                    @error('formulario_direcciones_nombres')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                </div>

                <!-- Facultad -->
                <div class="form-group d-flex mb-3 row justify-content-start">
                  
                  <div class="col-md-10 input-group">

                    <span class="input-group-addon" id="basic-addon3" style="border-color:white;">
                      <i class="nav-icon fas fa-university" id=""></i>
                    </span>

                    <input type="text" class="form-control input_field  @error('formulario_direcciones_facultad') is-invalid @enderror" id="formulario_direcciones_facultad" name="formulario_direcciones_facultad" placeholder="DEPENDENCIA ACADÉMICA" 
                    value="" style="color: black !important;"  readonly required>
                    @error('formulario_direcciones_facultad')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                </div>

                <!-- Escuela -->
                <div class="form-group d-flex mb-3 row justify-content-start">
                  
                  <div class="col-md-10 input-group">

                    <span class="input-group-addon" id="basic-addon3" style="border-color:white;">
                      <i class="nav-icon fas fa-university" id=""></i>
                    </span>

                    <input type="text" class="form-control input_field  @error('formulario_direcciones_escuela') is-invalid @enderror" id="formulario_direcciones_escuela" name="formulario_direcciones_escuela" placeholder="ESCUELA PROFESIONAL" 
                    value="" style="color: black !important;"  readonly required>
                    @error('formulario_direcciones_escuela')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                </div>

                <!-- Dirección -->
                <div class="form-group d-flex mb-3 row justify-content-start">
                  
                  <div class="col-md-10 input-group">

                    <span class="input-group-addon" id="basic-addon3" style="border-color:white;">
                      <i class="nav-icon fas fa-home" id=""></i>
                    </span>

                    <textarea rows="3" type="text" class="form-control input_field  @error('formulario_direcciones_direccion') is-invalid @enderror" id="formulario_direcciones_direccion" name="formulario_direcciones_direccion" placeholder="DIRECCIÓN" 
                    value="" required></textarea>
                    @error('formulario_direcciones_direccion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                </div>

                <!-- Ubigeo - Departamento -->
                <div class="form-group d-flex mb-3 row justify-content-start">
                  
                  <div class="col-md-10 input-group">

                    <span class="input-group-addon" id="basic-addon3" style="border-color:white;">
                      <i class="nav-icon fas fa-location-arrow" id=""></i>
                    </span>

                    <select class="form-control @error('formulario_direcciones_ubigeo_Departamento') is-invalid @enderror" id="formulario_direcciones_ubigeo_Departamento" name="formulario_direcciones_ubigeo_Departamento" required>
                      <option value="" disabled selected>SELECCIONAR DEPARTAMENTO ...</option>
                      @foreach($ubigeo_departamentos as $item)
                          <option value="{{$item['id']}}">{{$item['name']}}</option>
                      @endforeach
                    </select>
                    @error('formulario_direcciones_ubigeo_Departamento')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                </div>

                 <!-- Ubigeo - Provincia -->
                 <div class="form-group d-flex mb-3 row justify-content-start">
                  
                  <div class="col-md-10 input-group">

                    <span class="input-group-addon" id="basic-addon3" style="border-color:white;">
                      <i class="nav-icon fas fa-location-arrow" id=""></i>
                    </span>

                    <select class="form-control @error('formulario_direcciones_ubigeo_Provincia') is-invalid @enderror" id="formulario_direcciones_ubigeo_Provincia" name="formulario_direcciones_ubigeo_Provincia" required>
                      <option value="" disabled selected>SELECCIONAR PROVINCIA ...</option>
                   
                    </select>
                    @error('formulario_direcciones_ubigeo_Provincia')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                </div>

                 <!-- Ubigeo - Distrito -->
                 <div class="form-group d-flex mb-4 row justify-content-start">
                  
                  <div class="col-md-10 input-group">

                    <span class="input-group-addon" id="basic-addon3" style="border-color:white;">
                      <i class="nav-icon fas fa-location-arrow" id=""></i>
                    </span>

                    <select class="form-control @error('formulario_direcciones_ubigeo_Distrito') is-invalid @enderror" id="formulario_direcciones_ubigeo_Distrito" name="formulario_direcciones_ubigeo_Distrito" required>
                      <option value="" disabled selected>SELECCIONAR DISTRITO ...</option>
              
                    </select>
                    @error('formulario_direcciones_ubigeo_Distrito')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                </div>

                <!-- BOTON SUBMIT - ACTUALIZAR DATOS-->
                <div class="row" style="justify-content:center; margin-top: 20px; margin-bottom: 10px;">
                  <button class="btn btn-info py-3 px-4" style="margin-top: 10px; background-color:rgb(47, 131, 131) !important; font-size:14px;" type="submit" id="btnActualizarDatos_FormularioDirecciones" disabled>
                    <i class="button__icon nav-icon fas fa-folder-open"></i>
                    <span class="ml-1"> ACTUALIZAR DATOS</span>
                
                  </button>
    
                </div>

            </form>


          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>

  // Verifica si hay mensajes en la sesión
  @if (session('mensaje_alerta_success'))
      // Muestra SweetAlert con el mensaje de exito de datos
      Swal.fire({
        title: 'Mensaje',
        text: '{{ session('mensaje_alerta_success') }}',
        icon: 'success',
        confirmButtonText: 'Aceptar',
        timer:3000
      });
  

  @elseif (session('mensaje_alerta_error'))
      // Muestra SweetAlert con el mensaje de error por registro existente
      Swal.fire({
        title: 'Error',
        text: '{{ session('mensaje_alerta_error') }}',
        icon: 'error',
        confirmButtonText: 'Aceptar',
        timer:3000
      });
            
  @else
      // Muestra SweetAlert cada vez q carga la pagina - E4FFFC
      const Toast = Swal.mixin({
        toast: true,
        position: "top-start",
        showConfirmButton: false,
        timer: 3200,
        timerProgressBar: true,
        background: "#E4FFFC",
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
      });
      Toast.fire({
        icon: "info",
        title: "Recuerda que solo puedes actualizar tus datos por única vez"
      });
  
  @endif


  var checkCaptcha_FormularioDirecciones = false;

  function validarCaptcha_FormularioDirecciones(token){
    checkCaptcha_AlumnoEgresado = true;
    const btnBuscar_FormularioDirecciones = document.getElementById("btnBuscar_FormularioDirecciones");
    btnBuscar_FormularioDirecciones.disabled = false;
  }

  
  //  --------------------------------- CONSULTA AJAX GET ALUMNO BY CODIGO -------------------------------------------
  // -----------------------------------------------------------------------------------------------------------------

  $('#btnBuscar_FormularioDirecciones').on('click', function(){
    
  var consultaFormularioDirecciones = $('#input_busqueda_formulario_direcciones').val();
  var regex1 = /^(?!.*(select|insert|update|delete|from|where|drop|create|alter))[a-zA-Z0-9áéíóúÁÉÍÓÚüÜñÑ\s]+$/i;
  
  // Cumple con el regex1
  if(regex1.test(consultaFormularioDirecciones)){
  
  if(checkCaptcha_AlumnoEgresado==true && consultaFormularioDirecciones!=null){
  
  $.ajax({
    url: "/formulario_direcciones/AlumnobyCodigo/" + $('#input_busqueda_formulario_direcciones').val(),
    type: 'GET',

    beforeSend: function(){
        $('#btnBuscar_FormularioDirecciones').addClass("button--loading");
        // Get a reference to the button element - disabled
        const btnBuscar_FormularioDirecciones = document.getElementById("btnBuscar_FormularioDirecciones");
        btnBuscar_FormularioDirecciones.disabled = true;
        
    },

    success: function (response) {
      console.log(response)
        try {
          var html = '';
          var alumno = response.alumno;
          console.log(alumno);

          if(alumno.length > 0){
            var alumno_str = alumno[0];

            var formulario_direcciones_codigo = document.getElementById('formulario_direcciones_codigo');
            formulario_direcciones_codigo.value = alumno_str.codigo;

            var formulario_direcciones_dni = document.getElementById('formulario_direcciones_dni');
            formulario_direcciones_dni.value = alumno_str.dni;
          
            var formulario_direcciones_apellidos = document.getElementById('formulario_direcciones_apellidos');
            formulario_direcciones_apellidos.value = alumno_str.apellidos;

            var formulario_direcciones_nombres = document.getElementById('formulario_direcciones_nombres');
            formulario_direcciones_nombres.value = alumno_str.nombres;

            var formulario_direcciones_facultad = document.getElementById('formulario_direcciones_facultad');
            formulario_direcciones_facultad.value = alumno_str.facultad;

            var formulario_direcciones_escuela = document.getElementById('formulario_direcciones_escuela');
            formulario_direcciones_escuela.value = alumno_str.escuela;

            var formulario_direcciones_direccion = document.getElementById('formulario_direcciones_direccion');
            formulario_direcciones_direccion.value = alumno_str.direccion;

            // const Toast = Swal.mixin({
            //   toast: true,
            //   position: "top-end",
            //   showConfirmButton: false,
            //   timer: 3000,
            //   timerProgressBar: true,
            //   background: "#ECFFDC",
            //   didOpen: (toast) => {
            //     toast.onmouseenter = Swal.stopTimer;
            //     toast.onmouseleave = Swal.resumeTimer;
            //   }
            // });
            // Toast.fire({
            //   icon: "success",
            //   title: "Datos del alumno encontrados correctamente"
            // });

            Swal.fire({
              position: "top-end",
              icon: "success",
              title: "Datos del alumno encontrados",
              text: 'Ingrese sus datos actualizados para completar el formulario',
              timerProgressBar: true,
              showConfirmButton: false,
              timer: 2400
            });

            // Activar el boton de ACTUALIZAR DATOS
            const btnActualizarDatos_FormularioDirecciones = document.getElementById("btnActualizarDatos_FormularioDirecciones");
            btnActualizarDatos_FormularioDirecciones.disabled = false;

          }
          
          else{
            console.log('No se encontraron resultados');
            
            Swal.fire({
              title: '¡Info!',
              text: 'No se encontró código de matrícula ingresado',
              timer: 3000,
              timerProgressBar: true,
              icon: 'info', // Icono de la alerta (success, error, warning, info)
              confirmButtonText: 'Aceptar' // Texto del botón de confirmación
            });
          }

        } catch (e) {
          console.log(e);
        }
    },

    complete: function(){
        $('#btnBuscar_FormularioDirecciones').removeClass("button--loading");
      
        // Get a reference to the button element - enabled
        const btnBuscar_FormularioDirecciones = document.getElementById("btnBuscar_FormularioDirecciones");
        btnBuscar_FormularioDirecciones.disabled = false;


        //Reset captcha
        checkCaptcha_AlumnoEgresado = false;
        grecaptcha.reset(widget2);
      },

  });

  } else{
    // La consulta NO cumple el captcha o campo vacio
   
    console.log('ERROR: captcha invalido o campos vacios');
    Swal.fire({
        title: '¡Alerta!',
        text: 'Ingrese o complete los datos necesarios para la consulta',
        timer: 3000,
        timerProgressBar: true,
        icon: 'warning', // Icono de la alerta (success, error, warning, info)
        confirmButtonText: 'Aceptar' // Texto del botón de confirmación
    });
    // Resetear captcha
    grecaptcha.reset(widget2);
    const btnBuscar_FormularioDirecciones = document.getElementById("btnBuscar_FormularioDirecciones");
    btnBuscar_FormularioDirecciones.disabled = true;
  }

  }else { 
    // La consulta NO cumple el regex 1, mensaje de error
    console.log('ERROR: regex o vacio');
    Swal.fire({
        title: '¡Alerta!',
        text: 'Ingrese solo letras o números en los campos requeridos',
        timer: 3000,
        timerProgressBar: true,
        icon: 'warning', // Icono de la alerta (success, error, warning, info)
        confirmButtonText: 'Aceptar' // Texto del botón de confirmación
    });
    // Resetear captcha
    grecaptcha.reset(widget2);
    const btnBuscar_FormularioDirecciones = document.getElementById("btnBuscar_FormularioDirecciones");
    btnBuscar_FormularioDirecciones.disabled = true;
  }

  });


  document.getElementById('formulario_direcciones_ubigeo_Departamento').addEventListener('change', function() {
    $.ajax({
      url: "/provincias/" + $('#formulario_direcciones_ubigeo_Departamento').val(),
      type: 'GET',

      beforeSend: function(){
      },

      success: function (response) {
        console.log(response)
        try {
          var html = '';
          var provincias = response.provincias;
          console.log(provincias);

          html+='<option value="0" disabled selected>SELECCIONAR PROVINCIA ...</option>';

          for (var i = 0; i < provincias.length; i++) {
            var provincia = provincias[i];
            html+='<option value="' + provincia.id + '">' + provincia.name + '</option>';
          }
        
          $('#formulario_direcciones_ubigeo_Provincia').html("");
          $('#formulario_direcciones_ubigeo_Provincia').html(html);

          
        } catch (e) {
          console.log(e);
        }
      },

      complete: function(){
      },
    });
  });

  document.getElementById('formulario_direcciones_ubigeo_Provincia').addEventListener('change', function() {
    $.ajax({
      url: "/distritos/" + $('#formulario_direcciones_ubigeo_Provincia').val(),
      type: 'GET',

      beforeSend: function(){
      },

      success: function (response) {
        console.log(response)
        try {
          var html = '';
          var distritos = response.distritos;
          console.log(distritos);

          html+='<option value="0" disabled selected>SELECCIONAR DISTRITO ...</option>';

          for (var i = 0; i < distritos.length; i++) {
            var distrito = distritos[i];
            html+='<option value="' + distrito.id + '">' + distrito.name + '</option>';
          }
        
          $('#formulario_direcciones_ubigeo_Distrito').html("");
          $('#formulario_direcciones_ubigeo_Distrito').html(html);

          
        } catch (e) {
          console.log(e);
        }
      },

      complete: function(){
      },
    });

  });





</script>

{{-- Swal.fire({
  title: '¿Está seguro?',
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Sí'
}).then((result) => {
  if (result.value) {
    // Al confirmar que se desea eliminar
    deleteRequest();
  }
}) --}}

@endsection
