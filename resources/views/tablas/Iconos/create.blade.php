@extends('layouts.plantilla')

@section('contenido')
<div class="container" align="center">
    
    <form method="POST" action="{{route('icono.store')}}">
        @csrf
        <div class="card text-white bg-dark mb-3" style="max-width: 50rem; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif !important;">
            <div class="card-header"><h1 style="font-weight: bold;text-align:center">Crear Icono</h1></div>
            <div class="card-body">
                <div class="form-group">
                    <label for="nombre" style="float: left">Nombre</label>
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" 
                    pattern="^(?!.* (?: |$))[A-Z][A-Za-záéíóú1-9 ]+$" title="Debe poner solo palabras con la primera letra en Mayuscula" required>
                    @error('nombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="card-footer" style="text-align:center">
                <button type="submit" class="btn btn-primary "><i class="fas fa-save"></i> Grabar</button>
                <a href="{{route('cancelarI')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
            </div>
        </div>     
    </form>
</div>
@endsection