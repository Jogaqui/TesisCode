@extends('layouts.plantilla')

@section('contenido')
<div class="container" align="center">
    
    <form method="POST" action="{{route('funciones.store')}}">
        @csrf
        <div class="card text-white bg-secondary mb-3" style="max-width: 40rem;">
            <div class="card-header"><h1 style="font-weight: bold;text-align:center">Crear Función para el Tipo de Unidad</h1></div>
            <div class="card-body">
                <div class="form-group">
                    <label for="unidad" style="float: left">Tipo de Unidad</label>
                    <select type="text" class="form-control" aria-label="Default select example" id="unidad" name="unidad" required>
                        <option value="">Seleccionar tipo de Unidad</option>
                        @foreach ($unidad as $valores)
                            <option value="{{$valores->idUnidad}}">{{$valores->descripcion}}</option>
                        @endforeach
                    </select>
                    <label for="descripcion" style="float: left">Descripción</label>
                    <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" pattern="^(?!.* (?: |$))[A-Z][A-Za-záéíóú1-9 ]+$" title="Debe poner solo palabras con la primera letra en Mayuscula" required>
                    @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="card-footer" style="text-align:center">
                <button type="submit" class="btn btn-primary "><i class="fas fa-save"></i> Grabar</button>
                <a class="btn btn-danger" onclick="cancel();"><i class="fas fa-ban"></i> Cancelar</a>
            </div>
        </div>     
    </form>
</div>
@endsection