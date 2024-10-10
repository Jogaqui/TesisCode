@extends('layouts.plantilla')
@section('contenido')
<div class="container" align="center">
    <form method="POST" action="{{route('usuario.update',$usuario->id)}}"  enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="card text-white bg-dark mb-3" style="max-width: 50rem; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif !important;">
            <div class="card-header"><h1 style="font-weight: bold;text-align:center;  color: #ffb606">Editar Usuario</h1></div>
            <div class="card-body">
                <div class="form-group">
                    <label for="apPaterno" style="float: left">Apellido Paterno</label>
                    <input type="text" class="form-control @error('apPaterno') is-invalid @enderror" id="apPaterno" name="apPaterno" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$" value="{{$usuario->usu_apepaterno}}" required>
                    @error('apPaterno')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="apMaterno" style="float: left">Apellido Materno</label>
                    <input type="text" class="form-control @error('apMaterno') is-invalid @enderror" id="apMaterno" name="apMaterno" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$" value="{{$usuario->usu_apematerno}}" required>
                    @error('apMaterno')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nombres" style="float: left">Nombres</label>
                    <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$" value="{{$usuario->usu_nombres}}" required>
                    @error('nombres')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="correo" style="float: left">Correo</label>
                    <input type="email" class="form-control @error('correo') is-invalid @enderror" id="correo" name="correo" pattern="^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$" value="{{$usuario->usu_email}}" required>
                    @error('correo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="puesto" style="float: left">Puesto</label>
                    <input type="text" class="form-control @error('puesto') is-invalid @enderror" id="puesto" name="puesto" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$" value="{{$usuario->trab_puesto}}" required>
                    @error('puesto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="dni" style="float: left">DNI</label>
                    <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni" maxlength="8" pattern="[0-9]{8}" title="Ingrese sólo números" value="{{$usuario->usu_dni}}" required>
                    @error('dni')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>  
                
                <div class="form-group">
                    <label for="rol" style="float: left">Rol</label>
                    <select class="form-control @error('rol') is-invalid @enderror" id="rol" name="rol" required>
                        <option value="{{$tipo_usuario->idTipo_usuario}}">{{$tipo_usuario->rol}}</option>
                        @foreach($tipos_usuario as $item)
                            @if($tipo_usuario->idTipo_usuario!==$item->idTipo_usuario)
                                <option value="{{$item->idTipo_usuario}}" >{{$item->rol}}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('idUnidad')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <br>
                <hr>
                <div class="form-group">
                    <label for="login" style="float: left; color: #ffb606">Usuario</label>
                    <input type="text" class="form-control" name="usu_login" value="{{$usuario->usu_login}}" readonly>
                </div>
                
                <div class="form-group">
                    <label for="password" style="float: left; color: #ffb606">Contraseña:</label>
                    <input type="password" class="form-control" name="password" >
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="password_confirmation" style="float: left; color: #ffb606">Confirmar contraseña:</label>
                    <input type="password" class="form-control" name="password_confirmation" >
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                

            </div>
            <div class="card-footer" style="text-align:center">
                <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Actualizar</button>
                <a href="{{route('cancelarUsu')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
            </div>  
        </div>
    </form>
</div>


@endsection

