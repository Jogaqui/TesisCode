@extends('layouts.plantilla')
@section('contenido')
<div class="container" align="center">
    <form method="POST" action="{{route('trabajador.update',$trabajador->idTrabajador)}}">
        @method('put')
        @csrf
        <div class="card text-white bg-secondary mb-3" style="max-width: 40rem;">
            <div class="card-header"><h1 style="font-weight: bold;text-align:center">Editar Trabajador</h1></div>
            <div class="card-body">
                <div class="form-group">
                    <label for="apPaterno" style="float: left">Apellido Paterno</label>
                    <input type="text" class="form-control @error('apPaterno') is-invalid @enderror" id="apPaterno" name="apPaterno" aria-describedby="descripcionHelp" placeholder="Ingrese Descripción" value="{{$trabajador->apPaterno}}">
                    @error('apellidos')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="apMaterno" style="float: left">Apellido Materno</label>
                    <input type="text" class="form-control @error('apMaterno') is-invalid @enderror" id="apMaterno" name="apMaterno" aria-describedby="descripcionHelp" placeholder="Ingrese Apellido Paterno" value="{{$trabajador->apMaterno}}">
                    @error('apellidos')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nombres" style="float: left">Nombres</label>
                    <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres" aria-describedby="descripcionHelp" placeholder="Ingrese Apellido Materno" value="{{$trabajador->nombres}}">
                    @error('nombres')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="dni" style="float: left">DNI</label>
                    <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni" minlength="8"  aria-describedby="descripcionHelp" placeholder="Ingrese DNI" value="{{$trabajador->dni}}">
                    @error('dni')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>  

                <div class="form-group">
                    <label for="idUnidad" style="float: left">Unidad</label>
                    <select class="form-control @error('idUnidad') is-invalid @enderror" id="idUnidad" name="idUnidad" required>
                        <option value="{{$unidad->idUnidad}}">{{$unidad->descripcion}}
                        @foreach($unidades as $itemunidad)
                            @if($unidad->idUnidad!==$itemunidad->idUnidad)
                                <option value="{{$itemunidad->idUnidad}}" >{{$itemunidad->descripcion}}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('idIcono')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="puesto" style="float: left">Puesto</label>
                    <input type="text" class="form-control @error('puesto') is-invalid @enderror" id="puesto" name="puesto" aria-describedby="descripcionHelp" placeholder="Ingrese Puesto" value="{{$trabajador->puesto}}">
                    @error('puesto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>      
                
                <div class="form-group">
                    <label for="email" style="float: left">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="descripcionHelp" placeholder="Ingrese Email" value="{{$trabajador->correo}}">
                    
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="telefono" style="float: left">Telefono</label>
                    <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" aria-describedby="descripcionHelp" placeholder="Ingrese Teléfono" value="{{$trabajador->telefono}}">
                    @error('telefono')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div> 
            </div> 
            <div class="card-footer" style="text-align:center">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Grabar</button>
                <a href="{{route('cancelarTr')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
            </div>  
        </div>
    </form>
</div>
@endsection