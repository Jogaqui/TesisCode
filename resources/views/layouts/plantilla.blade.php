<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>URA-A | Intranet</title>

  <link rel="icon" href="{{ asset('images/logo-icon.png') }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">


 <!-- daterange picker -->
  <link rel="stylesheet" href="/adminlte/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="/adminlte/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="/adminlte/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="/adminlte/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="/adminlte/plugins/dropzone/min/dropzone.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<!-- Site wrapper -->
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand" style="background: rgb(3, 15, 54)">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button" style="color: white"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="/adminlte/dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline" style="color: white">{{ Auth::user()->name }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header" style="background: rgb(3, 15, 54);color: white">
            <img src="/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">

            <p>
              {{ Auth::user()->name }} - Web Developer
              <small>@php
                $fecha = Auth::user()->created_at;
                $date = strtotime($fecha);
                  echo date("d/m/Y", $date);
              @endphp</small>
            </p>
          </li>
          <!-- Menu Body -->

          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="/welcome" class="btn btn-default btn-flat float-left">Página Web</a>
            <a href="{{ route('logout') }}"
            onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-default btn-flat float-right">{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: rgb(3, 15, 54)">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link" style="background: rgb(3, 15, 54)">
      <img src="/adminlte/dist/img/unt1.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-bold">URA-Administrativo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="padding-top: 15px">

        <div class="image">
          <img src="/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" style="font-weight: bold" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('unidad.index')}}" class="nav-link {{ Request::routeIs('unidad.index','unidad.create','unidad.edit') ? 'active' : '' }}">
              <i class="nav-icon far fa-id-badge"></i>
              <p>
                Unidades
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('tipoconoce.index')}}" class="nav-link {{ Request::routeIs('tipoconoce.index','tipoconoce.create','tipoconoce.edit','tipoconoce.show','conocenos.create','conocenos.edit') ? 'active' : '' }}">
              <i class="nav-icon fab fa-audible"></i>
              <p>
                Tipos de Generalidades
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('grados.index')}}" class="nav-link {{ Request::routeIs('grados.index','grados.create','grados.edit') ? 'active' : '' }}">
              <i class="nav-icon fas fa-industry"></i>
              <p>
                Grados
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('trabajador.index')}}" class="nav-link {{ Request::routeIs('trabajador.index','trabajador.create','trabajador.edit') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Trabajadores
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('contactanos.index')}}" class="nav-link {{ Request::routeIs('contactanos.index','contactanos.create','contactanos.edit') ? 'active' : '' }}">
              <i class="nav-icon fas fa-at"></i>
              <p>
                Informacion de Contacto
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('etiqueta.index')}}" class="nav-link {{ Request::routeIs('etiqueta.index','etiqueta.create','etiqueta.edit') ? 'active' : '' }}">
              <i class="nav-icon fab fa-buffer"></i>
              <p>
                Etiquetas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('publicacion.index')}}" class="nav-link {{ Request::routeIs('publicacion.index','publicacion.delet','publicacion.create','publicacion.edit') ? 'active' : '' }}">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Publicaciones
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('icono.index')}}" class="nav-link {{ Request::routeIs('icono.index','icono.create','icono.edit') ? 'active' : '' }}">
              <i class="nav-icon fab fa-font-awesome-alt"></i>
              <p>
                Íconos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('tramite.index')}}" class="nav-link {{ Request::routeIs('tramite.index','tramite.create','tramite.edit') ? 'active' : '' }}">
              <i class="nav-icon fas fa-envelope-open-text"></i>
              <p>
                Trámites
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('consulta.index')}}" class="nav-link {{ Request::routeIs('consulta.index','consulta.show') ? 'active' : '' }}">
              <i class="nav-icon fas fa-book-reader"></i>
              <p>
                Consultas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('portada.index')}}" class="nav-link {{ Request::routeIs('portada.index','portada.show') ? 'active' : '' }}">
              <i class="nav-icon fas fa-book-reader"></i>
              <p>
                Portadas
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: #f8f9fa;">
    <!-- Main content -->
    <section class="content" style="background-color: #f8f9fa;">
      <br>
      @yield('contenido')
      <br><br><br>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- jQuery Mapael -->
<script src="/adminlte/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="/adminlte/plugins/raphael/raphael.min.js"></script>
<script src="/adminlte/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="/adminlte/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/adminlte/plugins/jszip/jszip.min.js"></script>
<script src="/adminlte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/adminlte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Select2 -->
<script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="/adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/adminlte/dist/js/demo.js"></script>
<!-- Page specific script -->
<script src="/adminlte/dist/js/pages/dashboard2.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="/adminlte/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="/adminlte/plugins/moment/moment.min.js"></script>
<script src="/adminlte/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="/adminlte/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="/adminlte/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="/adminlte/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="/adminlte/plugins/dropzone/min/dropzone.min.js"></script>

<script>
    $(function () {
      $('#example1').DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
      });
    });

var table = $('#example1').DataTable({
    "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "todo"]],
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ - _END_ de un total de  _TOTAL_ registros",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    }
});
  </script>
  <script src="sweetalert2.all.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('datos') == 'T')
    <script>
        Swal.fire({
        title: '¡Actualizado!',
        text: 'Su registro ha sido actualizado correctamente.',
        icon: 'success',
        showConfirmButton: false,
        footer: '<a href="javascript:location.reload()" class="btn btn-primary">Ok</a>',
        timer: 1500
      })
    </script>

    @elseif (session('datos') == 'G')
    <script>
        Swal.fire({
        title: '¡Guardado!',
        text: 'Su registro ha sido guardado correctamente.',
        icon: 'success',
        showConfirmButton: false,
        footer: '<a href="javascript:location.reload()" class="btn btn-primary">Ok</a>',
        timer: 1500
      })
    </script>

    @elseif (session('datos') == 'E')
    <script>
        Swal.fire({
        title: '¡Eliminado!',
        text: 'Su registro ha sido eliminado correctamente.',
        icon: 'success',
        showConfirmButton: false,
        footer: '<a href="javascript:location.reload()" class="btn btn-primary">Ok</a>',
        timer: 1500
      })
    </script>

    @elseif (session('datos') == 'C')
    <script>
        Swal.fire({
        title: '¡Cancelado!',
        text: 'Su registro ha sido cancelado correctamente.',
        icon: 'error',
        showConfirmButton: false,
        footer: '<a href="javascript:location.reload()" class="btn btn-primary">Ok</a>',
        timer: 1500
      })
    </script>

    @elseif (session('datos') == 'A')
    <script>
        Swal.fire({
        title: '¡Activado!',
        text: 'Su registro ha sido activado correctamente.',
        icon: 'success',
        showConfirmButton: false,
        footer: '<a href="javascript:location.reload()" class="btn btn-primary">Ok</a>',
        timer: 1500
      })
    </script>

    @elseif (session('datos') == 'D')
    <script>
        Swal.fire({
        title: '¡Desactivado!',
        text: 'Su registro ha sido desactivado correctamente.',
        icon: 'success',
        showConfirmButton: false,
        footer: '<a href="javascript:location.reload()" class="btn btn-primary">Ok</a>',
        timer: 1500
      })
    </script>
    @endif
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  });

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false;

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template");
  previewNode.id = "";
  var previewTemplate = previewNode.parentNode.innerHTML;
  previewNode.parentNode.removeChild(previewNode);

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  });

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
  });

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
  });

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1";
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
  });

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0";
  });

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
  };
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true);
  };
  // DropzoneJS Demo Code End
</script>
</body>
</html>
