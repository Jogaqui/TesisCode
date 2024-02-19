@extends('layouts.plantilla')

@section('contenido')
<div class="container" align="center">
    
    <form method="POST" action="{{route('norma.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="card text-white bg-secondary mb-3" style="max-width: 40rem;">
            <div class="card-header"><h1 style="font-weight: bold;text-align:center">Crear Normativa</h1></div>

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
                    <label for="descripcion" style="float: left">Descripción</label>
                    <textarea rows="3" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" required></textarea>
                    @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>  

                <div class="form-group">
                    <label for="proceso" style="float: left">Proceso</label>
                    <select class="form-control @error('proceso') is-invalid @enderror" id="proceso" name="proceso" required>
                        <option value="" disabled selected>Seleccionar proceso ...</option>
                        @foreach($procesos as $item)
                            <option value="{{$item['idProceso']}}">{{$item['nombre']}}</option>
                        @endforeach
                    </select>
                    @error('proceso')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group"  align="start">
                    <label for="vigente" style="float: left;">Vigencia</label><br><br>
                    <label class="switchBtn" align="start">
                        <input type="checkbox" id="vigente" name="vigente" checked>
                
                        <div class="slide round" role="">Vigente</div>       
                    </label>               
                </div>

                <div class="form-group">
                    <label for="archivo" style="float: left">Archivo</label><br><br>
                    <input accept=".pdf, .doc, .docx" type="file"  id="archivo" name="archivo">
                    <!-- <input type="text" class="form-control @error('archivo') is-invalid @enderror" id="imagen" name="imagen"> -->
                    @error('archivo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            
               
              
            </div>
            <div class="card-footer" style="text-align:center">
                <button type="submit" class="btn btn-primary "><i class="fas fa-save"></i> Grabar</button>
                <a href="{{route('cancelarNorm')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
            </div>
        </div>     
    </form>
</div>

<style>
   .switchBtn {
        position: relative;
        display: inline-block;
        width: 110px;
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