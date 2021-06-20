@extends('layouts.plantilla')

@section('contenido')
<div class="container" align="center">
    
    <form method="POST" action="{{route('contactanos.store')}}">
        @csrf
        <div class="card text-white bg-secondary mb-3" style="max-width: 40rem;">
            <div class="card-header"><h1 style="font-weight: bold;text-align:center">Crear Contacto</h1></div>
            <div class="card-body">
                <div class="form-group">
                    <label for="correo" style="float: left">Correo</label>
                    <input type="email" class="form-control @error('correo') is-invalid @enderror" id="correo" name="correo" required title="correo@unitru.edu.pe">
                    @error('correo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <label for="telefono" style="float: left">Teléfono</label>
                    <input type="tel" class="form-control" name="telefono" id="telefono" pattern="[0-9]{3}-[0-9]{6}" required title="XXX-XXXXXX">
                    <label for="direccion" style="float: left">Dirección</label>
                    <input type="text" class="form-control" name="direccion" id="direccion" required>
                </div>
            </div>
            <div class="card-footer" style="text-align:center">
                <button type="submit" class="btn btn-primary "><i class="fas fa-save"></i> Grabar</button>
                <a href="{{route('cancelars')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
            </div>
        </div>     
    </form>
    <p></p>
</div>
@endsection