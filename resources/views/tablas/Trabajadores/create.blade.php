@extends('layouts.plantilla')

@section('contenido')
<div class="container">
    <h1>Crear Registro</h1>
    <form method="POST" action="{{route('trabajador.store')}}">
        @csrf

        <div class="form-group">
            <label for="apPaterno">Apellido Paterno</label>
            <input type="text" class="form-control @error('apPaterno') is-invalid @enderror" id="apPaterno" name="apPaterno">
            @error('apellidos')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="apMaterno">Apellido Materno</label>
            <input type="text" class="form-control @error('apMaterno') is-invalid @enderror" id="apMaterno" name="apMaterno">
            @error('apellidos')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="nombres">Nombres</label>
            <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres">
            @error('nombres')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="dni">DNI</label>
            <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni" minlength="8">
            @error('dni')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>  
        
        <div class="form-group">
            <label for="idUnidad">Unidad</label>
            <select class="form-control @error('idUnidad') is-invalid @enderror" id="idUnidad" name="idUnidad" >
                @foreach($unidad as $itemunidad)
                    <option value="{{$itemunidad['idUnidad']}}">{{$itemunidad['descripcion']}}</option>
                @endforeach
            </select>
            @error('idUnidad')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="puesto">Puesto</label>
            <input type="text" class="form-control @error('puesto') is-invalid @enderror" id="puesto" name="puesto">
            @error('puesto')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>      
        
      
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" 
            
            >
            <small id="emailHelp" class="form-text text-muted">Ingrese Email</small>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


        <div class="form-group">
            <label for="telefono">Telefono</label>
            <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono">
            @error('telefono')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>      


        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Grabar</button>
        <a href="{{route('cancelarTr')}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
    </form>
</div>
@endsection