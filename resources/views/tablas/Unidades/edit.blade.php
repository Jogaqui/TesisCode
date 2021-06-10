@extends('layouts.plantilla')
@section('contenido')
<div class="container">
    <form method="POST" action="{{route('unidad.update',$unidad->idUnidad)}}">
        @method('put')
        @csrf
        <h1>Editar Unidad</h1>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" aria-describedby="descripcionHelp" placeholder="Ingrese Descripción" value="{{$unidad->descripcion}}">
            <small id="descripcionHelp" class="form-text text-muted">Ingrese aquí la descripción</small>
            @error('descripcion')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Grabar</button>
        <a href="{{route('cancelarp')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
    </form>
</div>
@endsection