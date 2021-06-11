@extends('layouts.plantilla')
@section('contenido')
<div class="container">
    <form method="POST" action="{{route('trabajador.update',$trabajador->idTrabajador)}}">
        @method('put')
        @csrf
        <h1>Editar Información del Trabajador</h1>
        
        <div class="form-group">
            <label for="apPaterno">Apellido Paterno</label>
            <input type="text" class="form-control @error('apPaterno') is-invalid @enderror" id="apPaterno" name="apPaterno" aria-describedby="descripcionHelp" placeholder="Ingrese Descripción" value="{{$trabajador->apPaterno}}">
            @error('apellidos')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="apMaterno">Apellido Materno</label>
            <input type="text" class="form-control @error('apMaterno') is-invalid @enderror" id="apMaterno" name="apMaterno" aria-describedby="descripcionHelp" placeholder="Ingrese Apellido Paterno" value="{{$trabajador->apMaterno}}">
            @error('apellidos')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="nombres">Nombres</label>
            <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres" aria-describedby="descripcionHelp" placeholder="Ingrese Apellido Materno" value="{{$trabajador->nombres}}">
            @error('nombres')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="dni">DNI</label>
            <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni" minlength="8"  aria-describedby="descripcionHelp" placeholder="Ingrese DNI" value="{{$trabajador->dni}}">
            @error('dni')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>  
        
        <div class="form-group">
            <label for="puesto">Puesto</label>
            <input type="text" class="form-control @error('puesto') is-invalid @enderror" id="puesto" name="puesto" aria-describedby="descripcionHelp" placeholder="Ingrese Puesto" value="{{$trabajador->puesto}}">
            @error('puesto')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>      
        
      
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="descripcionHelp" placeholder="Ingrese Email" value="{{$trabajador->correo}}">
            <small id="emailHelp" class="form-text text-muted">Ingrese Email</small>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


        <div class="form-group">
            <label for="telefono">Telefono</label>
            <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" aria-describedby="descripcionHelp" placeholder="Ingrese Teléfono                  " value="{{$trabajador->telefono}}">
            @error('telefono')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div> 


        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Grabar</button>
        <a href="{{route('cancelarT')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
    </form>
</div>
@endsection