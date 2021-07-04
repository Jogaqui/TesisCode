@extends('layouts.plantilla')  

@section('contenido')
<div class="container" align="center">
    
    <form method="POST" action="{{route('grados.store')}}">
        @csrf
        <div class="card text-white bg-secondary mb-3" style="max-width: 40rem;">
            <div class="card-header"><h1 style="font-weight: bold;text-align:center">Crear Grado</h1></div>
            <div class="card-body">
                <div class="form-group">
                    <label for="abreviatura" style="float: left">Abreviatura</label>
                    <input type="text" class="form-control @error('abreviatura') is-invalid @enderror" id="abreviatura" name="abreviatura" pattern="^(?!.* (?: |$))([A-ZÁÉÍÓÚ][a-záéíóú\u00f1\u00d1 ]+([.])){1}$" title="Debe poner solo palabras con la primera letra en Mayuscula" required>
                    @error('abreviatura')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <label for="nombre" style="float: left">Nombre</label>
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" pattern="^(?!.* (?: |$))[A-ZÁÉÍÓÚ][A-Za-záéíóúÁÉÍÓÚ\u00f1\u00d1 ]+([.])?$" title="Debe poner solo palabras con la primera letra en Mayuscula" required>
                    @error('nombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="card-footer" style="text-align:center">
                <button type="submit" class="btn btn-primary "><i class="fas fa-save"></i> Grabar</button>
                <a href="{{route('cancelargr')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
            </div>
        </div>     
    </form>
</div>
@endsection