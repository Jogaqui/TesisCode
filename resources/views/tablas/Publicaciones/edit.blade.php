@extends('layouts.plantilla')

@section('contenido')
<div class="container" align="center">
    <form method="POST" action="{{route('publicacion.update',$publicacion->idPublicacion)}}">
        @method('put')
        @csrf
        <div class="card text-white bg-secondary mb-3" style="max-width: 40rem;">
            <div class="card-header"><h1 style="font-weight: bold;text-align:center">Editar Publicación</h1></div>
            <div class="card-body">
                <div class="form-group">
                    <label for="imagen" style="float: left">Imagen</label>
                    <input type="text" class="form-control @error('imagen') is-invalid @enderror" id="imagen" name="imagen" value="{{$publicacion->imagen}}">
                    @error('imagen')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="titulo" style="float: left">Título</label>
                    <input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo" name="titulo" value="{{$publicacion->titulo}}">
                    @error('titulo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="texto" style="float: left">Texto</label>
                    <textarea rows="5" class="form-control @error('texto') is-invalid @enderror" id="texto" name="texto">{{$publicacion->texto}}</textarea>
                    @error('texto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>      
            </div>
            <div class="card-footer" style="text-align:center">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Grabar</button>
                <a href="{{route('cancelarPu')}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
            </div>
        </div> 
    </form>
</div>
@endsection