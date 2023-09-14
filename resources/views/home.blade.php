@extends('layouts.plantilla')

@section('contenido')
<div class="container" >
    <div class="row justify-content-center">
       
        <h3 style="text-align: center;font-size:45px;color:rgb(3, 15, 54); margin-bottom:25px;">BIENVENIDOS AL SISTEMA INTRANET DE LA UNIDAD DE REGISTRO ACADÉMICO...</h3>
        <div class="d-flex flex-column justify-content-center">
            <img src="{{ asset('images/logo_uraa.png') }}" alt="Logo UNT Intranet">
        </div>
        
    </div>

    <div class="row justify-content-center align-items-end" style="margin-top: 60px">
        <div class="d-flex flex-column">
            <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados URAA-UNT
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </span>
            
        </div>
        
    </div>
  
</div>
    
@endsection
