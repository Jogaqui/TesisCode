@extends('layouts.plantilla')

@section('contenido')
<div class="container" align="center">
    
    <form method="POST" action="{{route('multimedia.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="card text-white bg-dark mb-3" style="max-width: 50rem; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif !important;">
            <div class="card-header"><h1 style="font-weight: bold;text-align:center">Crear Multimedia</h1></div>

            <div class="card-body">
                <div class="form-group">
                    <label for="titulo" style="float: left">Título</label>
                    <input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo" name="titulo" required>
                    @error('titulo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="resumen" style="float: left">Resumen</label>
                    <textarea rows="2" class="form-control @error('resumen') is-invalid @enderror" id="resumen" name="resumen" required></textarea>
                    @error('resumen')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div> 

                <div class="form-group">
                    <label for="descripcion" style="float: left">Descripción</label>
                    <textarea rows="3" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" required></textarea>
                    @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>  

                <div class="form-group">
                    <label for="tipo_multimedia" style="float: left">Tipo de Multimedia</label>
                    <select class="form-control @error('tipo_multimedia') is-invalid @enderror" id="tipo_multimedia" name="tipo_multimedia" required>
                        <option value="" disabled selected>Seleccionar tipo de multimedia ...</option>
                        @foreach($tipos_multimedia as $item)
                            <option value="{{$item['idTipo_multimedia']}}">{{$item['descripcion']}}</option>
                        @endforeach
                    </select>
                    @error('tipo_multimedia')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tipo_tramite" style="float: left">Tipo de Trámite</label>
                    <select class="form-control @error('tipo_tramite') is-invalid @enderror" id="tipo_tramite" name="tipo_tramite">
                        <option value="" disabled selected>Seleccionar tipo de trámite ...</option>
                        @foreach($tipos_tramite as $item)
                            <option value="{{$item['idTipo_tramite']}}">{{$item['descripcion']}}</option>
                        @endforeach
                        <option value="99">- NINGUNO -</option>
                    </select>
                    @error('tipo_tramite')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ruta" style="float: left">Ruta</label>
                    <input type="text" class="form-control @error('ruta') is-invalid @enderror" id="ruta" name="ruta" required>
                    @error('ruta')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            
                <div class="form-group" align="start">
                    <label for="principal" style="float: left;">Principal</label><br><br>
                    <label class="switchBtn" align="start">
                        <input type="checkbox" id="principal" name="principal" checked>
                
                        <div class="slide round" role="">Principal</div>       
                    </label>               
                </div>

              
            </div>
            <div class="card-footer" style="text-align:center">
                <button type="submit" class="btn btn-primary "><i class="fas fa-save"></i> Grabar</button>
                <a href="{{route('cancelarMultimedia')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
            </div>
        </div>     
    </form>
</div>

<style>
    .switchBtn {
         position: relative;
         display: inline-block;
         width: 120px;
         height: 34px;
     }
     .switchBtn input {display:none;}
     .slide {
         position: absolute;
         cursor: pointer;
         top: 0;
         left: 0;
         right: 0;
         bottom: 0;
         background-color: #ccc;
         -webkit-transition: .4s;
         transition: .4s;
         padding: 8px;
         color: #fff;
     }
     .slide:before {
         position: absolute;
         content: "";
         height: 26px;
         width: 26px;
         left: 78px;
         bottom: 4px;
         background-color: white;
         -webkit-transition: .4s;
         transition: .4s;
     }
     input:checked + .slide {
         background-color: #ffb606;
         padding-left: 40px;
     }
     input:focus + .slide {
         box-shadow: 0 0 1px #01aeed;
     }
     input:checked + .slide:before {
         -webkit-transform: translateX(26px);
         -ms-transform: translateX(26px);
         transform: translateX(26px);
         left: -20px;
     } 
     .slide.round {
         border-radius: 34px;
     }
     .slide.round:before {
         border-radius: 50%;
     }
</style>

@endsection

@section('scripts')

<script>
    $(document).ready(function() { 
        const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 4800,
        timerProgressBar: true,
        background: "#f8cd69",
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
      });
      Toast.fire({
        icon: "info",
        title: "Campo Ruta corresponde al link embebido listo para usar en iframe Multimedia"
      });
     });
    
</script>
@endsection