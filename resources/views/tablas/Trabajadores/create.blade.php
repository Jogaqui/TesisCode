@extends('layouts.plantilla')

@section('contenido')
<div class="container" align="center">
    <form method="POST" action="{{route('trabajador.store')}}">
        @csrf
        <div class="card text-white bg-secondary mb-3" style="max-width: 40rem;">
            <div class="card-header"><h1 style="font-weight: bold;text-align:center">Crear Trabajador</h1></div>
            <div class="card-body">
                <div class="form-group">
                    <label for="apPaterno" style="float: left">Apellido Paterno</label>
                    <input type="text" class="form-control @error('apPaterno') is-invalid @enderror" id="apPaterno" name="apPaterno">
                    @error('apellidos')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="apMaterno" style="float: left">Apellido Materno</label>
                    <input type="text" class="form-control @error('apMaterno') is-invalid @enderror" id="apMaterno" name="apMaterno">
                    @error('apellidos')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nombres" style="float: left">Nombres</label>
                    <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres">
                    @error('nombres')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="dni" style="float: left">DNI</label>
                    <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni" maxlength="8">
                    @error('dni')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>  
                
                <div class="form-group">
                    <label for="idUnidad" style="float: left">Unidad</label>
                    <select class="form-control @error('idUnidad') is-invalid @enderror" id="idUnidad" name="idUnidad" required>
                        <option value="">Seleccionar Unidad</option>
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
                    <label for="puesto" style="float: left">Puesto</label>
                    <input type="text" class="form-control @error('puesto') is-invalid @enderror" id="puesto" name="puesto">
                    @error('puesto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>      
                
                <div class="form-group">
                    <label for="email" style="float: left">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                    
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="telefono" style="float: left">Telefono</label>
                    <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono">
                    @error('telefono')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>      
            </div>
            <div class="card-footer" style="text-align:center">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Grabar</button>
                <a href="{{route('cancelarTr')}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
            </div>  
        </div>
    </form>
</div>
@endsection