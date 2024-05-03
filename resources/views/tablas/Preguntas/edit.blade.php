@extends('layouts.plantilla')
@section('contenido')
<div class="container" align="center">
    <form method="POST" action="{{route('pregunta.update',$pregunta->idPregunta)}}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="card text-white bg-dark mb-3" style="max-width: 50rem; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif !important;">
            <div class="card-header"><h1 style="font-weight: bold;text-align:center">Editar Pregunta</h1></div>
            

            <div class="card-body">
                <div class="form-group">

                    <label for="unidad" style="float: left">Unidad</label>
                    <select class="form-control @error('unidad') is-invalid @enderror" id="unidad" name="unidad" required>
                        <option value="{{$pregunta->idUnidad}}" selected>{{$pregunta->unidad->descripcion}}</option>
            
                        @foreach($unidades as $item)
                            @if($pregunta->idUnidad!==$item->idUnidad)
                                <option value="{{$item['idUnidad']}}">{{$item['descripcion']}}</option>
                            @endif 
                        @endforeach
                    </select>
                    @error('unidad')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="titulo" style="float: left">Título</label>
                    <input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo" name="titulo"  value="{{$pregunta->titulo}}" required>
                    @error('titulo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="texto" style="float: left">Texto</label>
                    <textarea rows="3" class="form-control @error('texto') is-invalid @enderror" id="texto" name="texto" required>{{$pregunta->texto}}</textarea>
                    @error('texto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>  

                <div class="form-group">
                    <label for="fecha" style="float: left">Fecha</label>
                    <input type="date" class="form-control @error('fecha') is-invalid @enderror" id="fecha" name="fecha" value="{{$pregunta->fecha}}" required>
                    @error('fecha')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

            
                <div class="form-group">
                    <label for="archivo" style="float: left; margin-top:15px">Archivo</label><br><br>
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
                <a href="{{route('cancelarPreg')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
            </div>
        </div>
    </form>
</div>
@endsection