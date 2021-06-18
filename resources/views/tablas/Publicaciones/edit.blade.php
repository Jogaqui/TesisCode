@extends('layouts.plantilla')

@section('contenido')
<div class="container">
    <form method="POST" action="{{route('publicacion.update',$publicacion->idPublicacion)}}">
        @method('put')
        @csrf
        <h1>Editar Publicación</h1>
        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="text" class="form-control @error('imagen') is-invalid @enderror" id="imagen" name="imagen" value="{{$publicacion->imagen}}">
            @error('imagen')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo" name="titulo" value="{{$publicacion->titulo}}">
            @error('titulo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


        <div class="form-group">
            <label for="texto">Texto</label>
            <textarea rows="5" class="form-control @error('texto') is-invalid @enderror" id="texto" name="texto">{{$publicacion->texto}}</textarea>
            @error('texto')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>      

        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Grabar</button>
        <a href="{{route('cancelarPu')}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
    </form>
</div>
@endsection