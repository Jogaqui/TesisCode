@extends('layouts.plantilla')

@section('contenido')
<div class="container" >
    <div class="row justify-content-center" style="position:relative; opacity: 1 !important;">
       
        <h3 style="text-align: center;font-size:45px;color:rgb(3, 15, 54); margin-bottom:25px;">BIENVENIDOS AL SISTEMA INTRANET DE LA UNIDAD DE REGISTRO ACADÉMICO-ADMINISTRATIVO...</h3>
        <div class="d-flex flex-column justify-content-center">
            <img src="{{ asset('images/logo_uraa.png') }}" alt="Logo UNT Intranet">
        </div>
        
    </div>

    <br>
    <div class="row justify-content-center" style="margin-top: 30px; flex-wrap:nowrap !important;">

        <!-- Publicaciones -->
        <div class="col-12 col-sm-3 small-box bg-info mr-3">
            <div class="inner">
              <h3>{{$n_publicaciones}}</h3>
              <p>Publicaciones</p>
            </div>
            <div class="icon">
              <i class=" fas fa-chart-line"></i>
            </div>
            <a href="{{route('publicacion.index')}}" class="small-box-footer">
              Ver Info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>

        <!-- Manuales -->
        <div class="col-12 col-sm-3 small-box bg-gradient-warning mr-3">
            <div class="inner">
              <h3>{{$n_manuales}}</h3>
              <p>Manuales</p>
            </div>
            <div class="icon">
              <i class="fas fa-book"></i>
            </div>
            <a href="{{route('manual.index')}}" class="small-box-footer">
              Ver info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>

        <!-- Normativas -->
        <div class="col-12 col-sm-3 small-box bg-dark mr-3">
            <div class="inner">
              <h3>{{$n_normativas}}</h3>
              <p>Normativas</p>
            </div>
            <div class="icon">
              <i class="fas fa-envelope-open-text"></i>
            </div>
            <a href="{{route('norma.index')}}" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>

        <!-- Trabajadores -->
        <div class="col-12 col-sm-3 small-box bg-gradient-success">
            <div class="inner">
              <h3>{{$n_trabajadores}}</h3>
              <p>Trabajadores</p>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <a href="{{route('trabajador.index')}}" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>

        
        

    </div>

     <!------ FOOTER ------->
     <div class="row " style="
     position:relative; 
     margin-top: 128px;
     justify-content: center; 
     opacity: 1 !important;">
        <span class=""><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados URAA-UNT
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </span>
    </div>
  


</div>
    
@endsection
