@extends('layouts.plantilla')

@section('contenido')
<style>
/* .texto-encima{
    position: absolute;
    top: 10px;
    left: 10px;
}
.centrado{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
} */
</style>
<div class="container" align="center">
    <form method="POST" action="{{route('portada.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="card text-white bg-secondary mb-3" style="max-width: 40rem;">
            <div class="card-header"><h1 style="font-weight: bold;text-align:center">Crear Portada</h1></div>
            <div class="card-body">

                <div class="form-group">
                    <label for="inicial" style="float: left">Frase Inicial</label>
                    <input type="text" class="form-control @error('inicial') is-invalid @enderror" id="inicial" name="inicial"
                    pattern="^(?!.* (?: |$))[A-Z][A-Za-záéíóú1-9 ]+$" title="Debe poner solo palabras con la primera letra en Mayúscula" required>
                    @error('inicial')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="intermedia" style="float: left">Frase Resaltada</label>
                    <input type="text" class="form-control @error('intermedia') is-invalid @enderror" id="intermedia" name="intermedia"
                    pattern="^(?!.* (?: |$))[A-Z][A-Za-záéíóú1-9 ]+$" title="Debe poner solo palabras con la primera letra en Mayúscula" required>
                    @error('intermedia')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="final" style="float: left">Frase Final</label>
                    <input type="text" class="form-control @error('final') is-invalid @enderror" id="final" name="final"
                    pattern="^(?!.* (?: |$))[A-Z][A-Za-záéíóú1-9 ]+$" title="Debe poner solo palabras con la primera letra en Mayúscula" required>
                    @error('final')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="imagen" style="float: left">Imagen</label><br><br>
                    <input accept=".png, .jpg, .jpeg"  type="file"  id="imagen" name="imagen">
                    <!-- <input type="text" class="form-control @error('imagen') is-invalid @enderror" id="imagen" name="imagen"> -->
                    @error('imagen')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div style="position: relative;display: inline-block;text-align: center;" id="imagenPrevia">
                    <!-- <h1  style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);" id="inicial"></h1> -->
                    <!-- <div  style="" id="intermedio">intermedio</div> -->
                    <!-- <div class="centrado" id="Final">Final</div> -->
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script type="text/javascript">
                    
                    (function(){
                        function vistaPrevia(input){
                            if(input.files && input.files[0]){
                                var inicial= document.getElementById('.inicial');
                                var reader = new FileReader();
                                reader.onload=function(e){
                                    $('#imagenPrevia').html("<img src='"+e.target.result+"' style='width:500px'/>"+
                                    `<div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);"><h5>`
                                    +$('#inicial').val()+` `
                                    +$('#intermedia').val()+` `
                                    +$('#final').val()+`</h5></div>`);
                                    // $('#imagenPrevia').html("<h1>Hola</h1>");
                                    // $('#inicial').html("Inicial");
                                    // $('#imagenPrevia').html("<img src='"+e.target.result+"'/>");
                                };
                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                        $('#imagen').change(function(){
                            vistaPrevia(this);
                        });
                    })();
                </script>

  <!-- Hero Slider -->
  <!-- <div class="hero_slider_container" style="width:610px"> -->
    <!-- <div class="hero_slider owl-carousel"> -->
      <!-- Hero Slide -->
      <!-- <div class="hero_slide"> -->
        <!-- <div class="" style="background-image:url(images/slider_background.jpg)"></div> -->
        <!-- <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center"> -->
          <!-- <div class="hero_slide_content text-center"> -->
            <!-- <h1 >Get your <span>Education</span> today!</h1> -->
          <!-- </div> -->
        <!-- </div> -->
      <!-- </div> -->
  <!-- </div> -->
<!-- </div> -->

            <div class="card-footer" style="text-align:center">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Grabar</button>
                <a href="{{route('cancelarPor')}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
            </div>
        </div> 
    </form>
</div>
@endsection