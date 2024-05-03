@extends('layouts.plantilla')

@section('contenido')
<div class="container" >
    <div class="row justify-content-center" style="position:relative; opacity: 1 !important;  margin-bottom: 12px;">
       
        <h4 style="text-align: center;font-size:28px;color: black;">BIENVENIDO AL SISTEMA INTRANET DE LA UNIDAD DE REGISTROS ACADÉMICOS &copy</h4>
      
    </div>

    <br>
    <div class="row justify-content-center" style="margin-top: 12px;">
      <div class="col-12">

        <div class="row justify-content-center mb-4">

          <!-- Multimedia -->
          <div class="col-12 col-sm-2 small-box bg-gradient-dark mx-2">
            <div class="inner">
              <h3>{{$n_multimedias}}</h3>
              <p>Multimedia</p>
            </div>
            <div class="icon">
              <i class="fas fa-video"></i>
            </div>
            <a href="{{route('multimedia.index')}}" class="small-box-footer">
              Ver info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
          
         

           <!-- Manuales -->
           <div class="col-12 col-sm-2 small-box bg-gradient-warning mx-2">
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
          <div class="col-12 col-sm-2 small-box bg-gradient-success mx-2">
            <div class="inner">
              <h3>{{$n_normativas}}</h3>
              <p>Normativas</p>
            </div>
            <div class="icon">
              <i class="fas fa-envelope-open-text"></i>
            </div>
            <a href="{{route('norma.index')}}" class="small-box-footer">
              Ver info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
       
          
           <!-- FAQ -->
           <div class="col-12 col-sm-2 small-box bg-gradient-secondary mx-2">
             <div class="inner">
              <h3>{{$n_faq}}</h3>
               <p>FAQ</p>
             </div>
             <div class="icon">
                 <i class="fas fa-question-circle"></i>
             </div>
             <a href="{{route('pregunta.index')}}" class="small-box-footer">
               Ver Info <i class="fas fa-arrow-circle-right"></i>
             </a>
             <!-- spinner info box -->
             <div class="overlay dark">
              <i class="fas fa-2x fa-sync-alt fa-spin"></i>
            </div>

            </div>
           
        </div>

        <div class="row justify-content-center">

          <!-- Publicaciones -->
          <div class="col-12 col-lg-4 info-box bg-gradient-info mx-2">
            <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>
            <div class="info-box-content">

              <span class="info-box-text">Publicaciones</span>
              <span class="info-box-number">{{$n_vistas_totales_publicaciones}}</span>
              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
                vistas totales de {{$n_publicaciones}} publicaciones
              </span>
              <a href="{{route('publicacion.index')}}" class="small-box-footer" style="color: white !important; margin-top: 8px;">
                <u>Más Información</u> <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          
          <!-- Consultas -->
          <div class="col-12 col-lg-4 info-box bg-gradient-danger mx-2">
            <span class="info-box-icon"><i class="fas fa-book-reader"></i></span>
            <div class="info-box-content">

              <span class="info-box-text">Consultas</span>
              <span class="info-box-number">{{$n_consultas_pendientes}}</span>
              <div class="progress">
                <div class="progress-bar" style="width: {{$porcentaje_consultas_pendientes.'%'}}"></div>
              </div>
              <span class="progress-description">
                {{substr($porcentaje_consultas_pendientes,0,2)}}% pendientes de un total de {{$n_consultas_total}}
              </span>
              <a href="{{route('consulta.index')}}" class="small-box-footer" style="color: white !important; margin-top: 8px;">
                <u>Más Información</u> <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
           
           

        </div>
          
    
      </div>

       
        
    </div>

     <!------ FOOTER ------->
     <div class="row " style="
     position:relative; 
     margin-top: 120px;
     justify-content: center; 
     opacity: 1 !important;">
        <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          &copy; <script>document.write(new Date().getFullYear());</script> Unidad de Registros Académicos, UNT. Todos los derechos reservados
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </span>
    </div>
  

</div>
    
@endsection


