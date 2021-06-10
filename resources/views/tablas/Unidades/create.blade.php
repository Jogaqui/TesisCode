@extends('layouts.plantilla')

@section('contenido')
<div class="container">
    <h1>Crear Registro</h1>
    <form method="POST" action="{{route('unidad.store')}}">
        @csrf

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion">
            @error('descripcion')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Grabar</button>
        <a href="{{route('cancelarp')}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
    </form>
</div>
@endsection