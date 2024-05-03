
// id de los widget de captcha
var widget1;
var widget2;

// variables de los combos de la consulta Alumno_Egresado
var tipobusqueda_AlumnoEgresado = document.getElementById("tipobusqueda_AlumnoEgresado");
var unidad_AlumnoEgresado = document.getElementById("unidad_AlumnoEgresado");

//METODO QUE DETECTA CAMBIOS - combo tipobusqueda_AlumnoEgresado
tipobusqueda_AlumnoEgresado.addEventListener("change",()=>{
  $("#accordion_panel_7 ").css("max-height", "1600px");
    
    let valorSeleccionado = tipobusqueda_AlumnoEgresado.options[tipobusqueda_AlumnoEgresado.selectedIndex].value;

    
    switch (valorSeleccionado) {
      case '1':
        $('#input_AlumnoEgresado').attr('placeholder','CÓDIGO DE MATRÍCULA');
        let icono_codigo_alu_egre = document.getElementById("icono_input_alumno_egresado");
        icono_codigo_alu_egre.className = '';
        icono_codigo_alu_egre.classList.add("nav-icon", "fas", "fa-university");
          break;
      case '2':
        $('#input_AlumnoEgresado').attr('placeholder','N° DNI');
        let icono_dni_alu_egre = document.getElementById("icono_input_alumno_egresado");
        icono_dni_alu_egre.className = '';
        icono_dni_alu_egre.classList.add("nav-icon", "fas", "fa-address-card");
  
          break;
      case '3':
        $('#input_AlumnoEgresado').attr('placeholder','APELLIDOS');
        let icono_apellidos_alu_egre = document.getElementById("icono_input_alumno_egresado");
        icono_apellidos_alu_egre.className = '';
        icono_apellidos_alu_egre.classList.add("nav-icon", "fas", "fa-user");
  
          break;
      case '4':
        $('#input_AlumnoEgresado').attr('placeholder','NOMBRES');
        let icono_nombres_alu_egre = document.getElementById("icono_input_alumno_egresado");
        icono_nombres_alu_egre.className = '';
        icono_nombres_alu_egre.classList.add("nav-icon", "fas", "fa-user");
  
          break;
    
      default:
          break;
    }
    
});

// ************************************** PAGINATION / CONSULTA ALUMNO - EGRESADO *******************************************************
var alumnos = null;
var pages = 0;
var page = null;
var currentPage = 0;
var page_size = 20;
var checkCaptcha_AlumnoEgresado = false;

// ******************************* Comienzo: AJAX ***************************************
$('#btnBuscar_AlumnoEgresado').on('click', function(){

var consulta1 = $('#input_AlumnoEgresado').val();
var comboUnidad = $('#unidad_AlumnoEgresado').val();
var comboTipoBusqueda = $('#tipobusqueda_AlumnoEgresado').val();

//var regex1 = /^[a-zA-Z0-9áéíóúÁÉÍÓÚüÜñÑ\s]+$/;

var regex1 = /^(?!.*(select|insert|update|delete|from|where|drop|create|alter))[a-zA-Z0-9áéíóúÁÉÍÓÚüÜñÑ\s]+$/i;

// Cumple con el regex1
if(regex1.test(consulta1)){

if(comboUnidad!=0 && comboTipoBusqueda!=0 && checkCaptcha_AlumnoEgresado==true && consulta1!=null){
$.ajax({
  url: "/statitics/consultas/alumno_egresado/" + $('#unidad_AlumnoEgresado').val() + "/" + $('#tipobusqueda_AlumnoEgresado').val() + "/" + $('#input_AlumnoEgresado').val() ,
  type: 'GET',
  beforeSend: function(){
    
    spinner_On_BotonesBuscarLimpiar();

    alumnos = null;
    pages = 0;
    page = null;
    currentPage = 0;
    page_size = 20;

    document.querySelectorAll("li.list-item").forEach(e => e.remove());

  },
  success: function(response) {

    alumnos = response.alumnos;

    const tablaConsulta_AlumnoEgresado = document.getElementById("tablaConsulta_AlumnoEgresado");
    tablaConsulta_AlumnoEgresado.classList.remove("d-none");

    // response = tiene resultados
    if(alumnos.length > 0){

      //console.log("hola alumnos");

      $("#accordion_panel_7 ").css("max-height", "1920px");
  
      pages = paginate(alumnos, page_size);
      let pageLi = "";
      let nlimit = pages.length - 2;
  
      pages.forEach((element, index) => {
          if (index == 0){
            pageLi += '<li onclick="pageChange(' + index + ')" id="page_' + index + '" class="page-item list-item active"><a class="page-link" href="javascript:void(0)">' + (index+1) + '</a></li>';
          }
          else if(index > 0 && index < 8){
            pageLi += '<li onclick="pageChange(' + index + ')" id="page_' + index + '" class="page-item list-item"><a class="page-link" href="javascript:void(0)">' + (index+1) + '</a></li>';
          }
          else if(index == 8){
            pageLi += '<li onclick="" class="page-item list-item"><a class="page-link" href="javascript:void(0)">' + '...' + '</a></li>';
          }
          else if(index == 9){
            
            pageLi += '<li onclick="pageChange(' + nlimit + ')" id="page_' + nlimit + '" class="page-item list-item"><a class="page-link" href="javascript:void(0)">' + (nlimit+1) + '</a></li>';
            nlimit = nlimit + 1;
          }
          else if(index == 10){
            pageLi += '<li onclick="pageChange(' + nlimit + ')" id="page_' + nlimit + '" class="page-item list-item"><a class="page-link" href="javascript:void(0)">' + (nlimit+1) + '</a></li>';
          }
             
              
      });
      $(".page-list").after(pageLi);
      
  
      page = pages[currentPage];
  
      let nroItem = currentPage*page_size + 1;
  
      printRows(page, nroItem);
  

    }

    // response = null
    else{
      let msg_html = 'No se encontraron resultados';

      html = '<div class="alert alert-warning" role="alert">'+
       msg_html +
       '</div>';
       
      $(".page-data").html("");
      $(".page-data").html(html);

    }

    // Resetear captcha
    grecaptcha.reset(widget1);
    checkCaptcha_AlumnoEgresado = false;

    //Fin - consulta success
    
  },
  error: function(jqXHR, exception) { // if error occured
    
    var msg_html = '';
    
    if (jqXHR.status === 0) {
        msg_html = 'Not connect.\n Verify Network.';
    } else if (jqXHR.status == 404) {
        msg_html = 'Requested page not found. [404]';
    } else if (jqXHR.status == 500) {
        msg_html = 'Error de conexión con el servidor [500].';
    } else if (exception === 'parsererror') {
        msg_html = 'Requested JSON parse failed.';
    } else if (exception === 'timeout') {
        msg_html = 'Consulta demoró mucho. Intente nuevamente.';
    } else if (exception === 'abort') {
        msg_html = 'Ajax request aborted.';
    } else {
        msg_html = 'Ingresar campos requeridos correctamente';
    }

    html = '<div class="alert alert-danger" role="alert">'+
       msg_html +
      '</div>';

    $(".page-data").html("");
    $(".page-data").html(html);

    spinner_Off_BotonesBuscarLimpiar();
    // Get a reference to the button element - disabled
    const btnBuscar_AlumnoEgresado = document.getElementById("btnBuscar_AlumnoEgresado");
    btnBuscar_AlumnoEgresado.disabled = true;

    //
    // Resetear captcha
    grecaptcha.reset(widget1);
    
  },
  complete: function(){
    spinner_Off_BotonesBuscarLimpiar();

    // Get a reference to the button element - disabled
    const btnBuscar_AlumnoEgresado = document.getElementById("btnBuscar_AlumnoEgresado");
    btnBuscar_AlumnoEgresado.disabled = true;

  },
});

}
else{
  // La consulta TIENE CAMPOS VACÍOS
  var msg_html = 'Ingrese o complete los datos necesarios para la consulta.';
  html = '<div class="alert alert-danger" role="alert">'+
       msg_html +
      '</div>';

    $(".page-data").html("");
    $(".page-data").html(html);

    // Resetear captcha
    grecaptcha.reset(widget1);
    
    const btnBuscar_AlumnoEgresado = document.getElementById("btnBuscar_AlumnoEgresado");
    btnBuscar_AlumnoEgresado.disabled = true;

}

} // fin del IF de REGEX

else {
  // La consulta NO cumple el regex 1, mensaje de error
  var msg_html = 'Ingrese solo letras o números en los campos requeridos';
  html = '<div class="alert alert-danger" role="alert">'+
       msg_html +
      '</div>';

    $(".page-data").html("");
    $(".page-data").html(html);

    // Resetear captcha
    grecaptcha.reset(widget1);

    const btnBuscar_AlumnoEgresado = document.getElementById("btnBuscar_AlumnoEgresado");
    btnBuscar_AlumnoEgresado.disabled = true;
}



}); 
// ******************************* Fin: AJAX ***************************************

function nextPage() {
    if (pages.length - 1 > currentPage)
      page = currentPage + 1;
    else
      page = 0;
    pageChange(page);
}

function prePage() {
    if (currentPage < pages.length && currentPage != 0)
      page = currentPage - 1;
    else
      page = pages.length -1;
    pageChange(page);
}

function pageChange(page) {
    currentPage = page;
    let nroItem = currentPage*page_size + 1;
    $(".list-item").removeClass("active");
    $("#page_" + page).addClass("active");
    $(".page-data").html("");
    page = pages[page];
    printRows(page, nroItem);
}

function printRows(arr, nroItem) {
  $(".page-data").html("");
   console.log(arr);
    arr.forEach((element) => {
        $(".page-data").append(
        '<tr>' +
        '<td class="" style="text-align:center;">' + (nroItem) + '</td>' +
        '<td class="">' + element.codigo + '</td>' + 
        '<td class="">' + element.dni + '</td>' + 
        '<td class="">' + element.escuela + '</td>' +
        '<td class="">' + element.nombreCompleto + '</td>' +
        '<td class="" style="text-align:center;">'+ element.condicion + '</td>' + 
        '</tr>'
        );
      nroItem++;
    });
}

function paginate(arr, size) {
    return arr.reduce((acc, val, i) => {
        let idx = Math.floor(i / size);
        let page = acc[idx] || (acc[idx] = []);
        page.push(val);
        return acc;
    }, []);
}

// ----------------------------- GOOGLE CAPTCHA --------------------------------
function onloadCaptcha_Statitics(){
  widget1 = grecaptcha.render( document.getElementById('captcha_1'), {
    'sitekey' : '6LcgHFopAAAAAM4FPzXfUmKB_Cn_pU9c8CPfCQHU'
  });
}

function onloadCaptcha_FormularioDirecciones(){
  widget2 = grecaptcha.render( document.getElementById('captcha_2'), {
    'sitekey' : '6LcgHFopAAAAAM4FPzXfUmKB_Cn_pU9c8CPfCQHU'
  });
}

function validarCaptcha_AlumnoEgresado(token){

  checkCaptcha_AlumnoEgresado = true;

  const btnBuscar_AlumnoEgresado = document.getElementById("btnBuscar_AlumnoEgresado");
  btnBuscar_AlumnoEgresado.disabled = false;

  const btnLimpiar_AlumnoEgresado = document.getElementById("btnLimpiar_AlumnoEgresado");
  btnLimpiar_AlumnoEgresado.disabled = false;

}
// ------------------------------ FIN CAPTCHA ----------------------------------

// FUNCIONES SPINNER BOTONES LIMPIAR - BUSCAR (consulta AlumnoEgresado)
function spinner_On_BotonesBuscarLimpiar(){
  $('#btnBuscar_AlumnoEgresado').addClass("button--loading");
  
    // Get a reference to the button element - disabled
    const btnBuscar_AlumnoEgresado = document.getElementById("btnBuscar_AlumnoEgresado");
    btnBuscar_AlumnoEgresado.disabled = true;

    const btnLimpiar_AlumnoEgresado = document.getElementById("btnLimpiar_AlumnoEgresado");
    btnLimpiar_AlumnoEgresado.disabled = true;
  
}

function spinner_Off_BotonesBuscarLimpiar(){
  $('#btnBuscar_AlumnoEgresado').removeClass("button--loading");
      
  // Get a reference to the button element - enabled
  const btnBuscar_AlumnoEgresado = document.getElementById("btnBuscar_AlumnoEgresado");
  btnBuscar_AlumnoEgresado.disabled = false;

  const btnLimpiar_AlumnoEgresado = document.getElementById("btnLimpiar_AlumnoEgresado");
  btnLimpiar_AlumnoEgresado.disabled = false;
  
}


//METODO QUE DETECTA CAMBIOS - combo semestre_primerosPuestos
document.getElementById('semestre_primeros_puestos').addEventListener("change",()=>{
  
  var html = '';
  html+='<option value="" disabled selected>Seleccionar el ciclo ...</option>';

  let valor_combo_semestre_primerosPuestos = $('#semestre_primeros_puestos').val();
  let valor_combo_escuela_primerosPuestos = $('#escuela_primeros_puestos').val();
  let val_ciclo = 0;
  let limit_ciclo = 10;

  // Valida el limite de ciclo
  if(valor_combo_escuela_primerosPuestos == 10 || valor_combo_escuela_primerosPuestos == 17 || valor_combo_escuela_primerosPuestos == 18){
      limit_ciclo = 12;
  }
  else if(valor_combo_escuela_primerosPuestos == 35){
      limit_ciclo = 14;
  }

  // Valida la paridad de ciclo
  for (var i = 1; i <= limit_ciclo; i+=2) {
    if(valor_combo_semestre_primerosPuestos % 4 == 1)
    {
      val_ciclo = i;
    }
    else{
      val_ciclo = i+1;
    }

    html+='<option value="' + val_ciclo + '">' + val_ciclo + '°</option>';
  }

  $('#ciclo_primeros_puestos').html("");
  $('#ciclo_primeros_puestos').html(html);
  
    
});

//METODO QUE DETECTA CAMBIOS - combo escuela_primerosPuestos
document.getElementById('escuela_primeros_puestos').addEventListener("change",()=>{
  
  var html = '';
  html+='<option value="" disabled selected>Seleccionar el ciclo ...</option>';

  let valor_combo_semestre_primerosPuestos = $('#semestre_primeros_puestos').val();
  let valor_combo_escuela_primerosPuestos = $('#escuela_primeros_puestos').val();
  let val_ciclo = 0;
  let limit_ciclo = 10;

  // Valida el limite de ciclo
  if(valor_combo_escuela_primerosPuestos == 10 || valor_combo_escuela_primerosPuestos == 17 || valor_combo_escuela_primerosPuestos == 18){
      limit_ciclo = 12;
  }
  else if(valor_combo_escuela_primerosPuestos == 35){
      limit_ciclo = 14;
  }

  // Valida la paridad de ciclo
  for (var i = 1; i <= limit_ciclo; i+=2) {
    if(valor_combo_semestre_primerosPuestos % 4 == 1)
    {
      val_ciclo = i;
    }
    else{
      val_ciclo = i+1;
    }

    html+='<option value="' + val_ciclo + '">' + val_ciclo + '°</option>';
  }

  $('#ciclo_primeros_puestos').html("");
  $('#ciclo_primeros_puestos').html(html);
  
    
});

// *COMENTARIOS - CONSULTAS ANTIGUAS
// EX CONSULTA REACTIVA COMBO-INPUT
//cada vez que el valor del select cambia
// var tipobusqueda_AlumnoEgresado = document.getElementById("tipobusqueda_AlumnoEgresado");

// //METODO QUE DETECTA CAMBIOS
// tipobusqueda_AlumnoEgresado.addEventListener("change",()=>{
//   $("#accordion_panel_7 ").css("max-height", "1600px");
    
//     let valorSeleccionado = tipobusqueda_AlumnoEgresado.options[tipobusqueda_AlumnoEgresado.selectedIndex].value;
//     // para todos los botones elimina la clese visible
//     // Validadores dinámicos Consulta ALUMNO-EGRESADO
//     let accordion_panel = document.querySelector("#accordion_panel_7");
//     let inputs = accordion_panel.querySelectorAll("div.combo_consulta");
//     inputs.forEach(b =>{b.classList.remove("visible_byselect")});
//     //selecciona el boton que tiene que ser visible
    
//     switch (valorSeleccionado) {
//       case '1':
//           const combo_Codigo_AlumnoEgresado = document.getElementById("combo_codigoAlumnoEgresado");
//           combo_Codigo_AlumnoEgresado.classList.add("visible_byselect");
  
//           break;
//       case '2':
//           const combo_Dni_AlumnoEgresado = document.getElementById("combo_dniAlumnoEgresado");
//           combo_Dni_AlumnoEgresado.classList.add("visible_byselect");
  
//           break;
//       case '3':
//           const combo_Apellidos_AlumnoEgresado = document.getElementById("combo_apellidosAlumnoEgresado");
//           combo_Apellidos_AlumnoEgresado.classList.add("visible_byselect");
  
//           break;
//       case '4':
//           const combo_Nombres_AlumnoEgresado = document.getElementById("combo_nombresAlumnoEgresado");
//           combo_Nombres_AlumnoEgresado.classList.add("visible_byselect");
  
//           break;
    
//       default:
//           break;
//     }
  
//     //ACTIVAR BOTONES CONSULTA
//     const btnBuscar_AlumnoEgresado = document.getElementById("btnBuscar_AlumnoEgresado");
//       btnBuscar_AlumnoEgresado.disabled = false;
  
//     const btnLimpiar_AlumnoEgresado = document.getElementById("btnLimpiar_AlumnoEgresado");
//       btnLimpiar_AlumnoEgresado.disabled = false;
// });