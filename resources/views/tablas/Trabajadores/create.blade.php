@extends('layouts.plantilla')

@section('contenido')
<!-- <img src="public/uploads/imagen.jpg" alt=""> -->
<div class="container" align="center">
    <form method="POST" action="{{route('trabajador.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="card text-white bg-secondary mb-3" style="max-width: 40rem;">
            <div class="card-header"><h1 style="font-weight: bold;text-align:center">Crear Trabajador</h1></div>
            <div class="card-body">
                <div class="form-group">
                    <label for="apPaterno" style="float: left">Apellido Paterno</label>
                    <input type="text" class="form-control @error('apPaterno') is-invalid @enderror" id="apPaterno" name="apPaterno" pattern="^(?!.* (?: |$))[A-ZÁÉÍÓÚ][A-Za-záéíóúÁÉÍÓÚ\u00f1\u00d1 ]+$" title="Debe poner solo palabras con la primera letra en Mayuscula" required>
                    @error('apPaterno')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="apMaterno" style="float: left">Apellido Materno</label>
                    <input type="text" class="form-control @error('apMaterno') is-invalid @enderror" id="apMaterno" name="apMaterno" pattern="^(?!.* (?: |$))[A-ZÁÉÍÓÚ][A-Za-záéíóúÁÉÍÓÚ\u00f1\u00d1 ]+$" title="Debe poner solo palabras con la primera letra en Mayuscula" required>
                    @error('apMaterno')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nombres" style="float: left">Nombres</label>
                    <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres" pattern="^(?!.* (?: |$))[A-ZÁÉÍÓÚ][A-Za-záéíóúÁÉÍÓÚ\u00f1\u00d1 ]+$" title="Debe poner solo palabras con la primera letra en Mayuscula" required>
                    @error('nombres')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="dni" style="float: left">DNI</label>
                    <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni" maxlength="8" pattern="[0-9]{8}" title="Ingrese sólo números" required>
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
                    <label for="grado" style="float: left">Grado</label>
                    <select class="form-control @error('grado') is-invalid @enderror" id="grado" name="grado" required>
                        <option value="">Seleccionar Grado</option>
                        @foreach($grado as $itemgrado)
                            <option value="{{$itemgrado['idGrado']}}">{{$itemgrado['nombre']}}</option>
                        @endforeach
                    </select>
                    @error('grado')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="puesto" style="float: left">Puesto</label>
                    <input type="text" class="form-control @error('puesto') is-invalid @enderror" id="puesto" name="puesto" pattern="^(?!.* (?: |$))[A-ZÁÉÍÓÚ][A-Za-záéíóúÁÉÍÓÚ1-9,\u00f1\u00d1 ]+$" title="Debe poner solo palabras con la primera letra en Mayuscula">
                    @error('puesto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>   
                
                <div class="form-group">
                    <label for="linkedin" style="float: left">Linkedin (URL)</label>
                    <input type="text" class="form-control @error('linkedin') is-invalid @enderror" id="linkedin" name="linkedin">
                    @error('linkedin')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>   

                <div class="form-group">
                    <label for="facebook" style="float: left">Facebook (URL)</label>
                    <input type="text" class="form-control @error('facebook') is-invalid @enderror" id="facebook" name="facebook">
                    @error('facebook')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>  
                
                <div class="form-group">
                    <label for="correo" style="float: left">Correo</label>
                    <input type="email" class="form-control @error('correo') is-invalid @enderror" id="correo" name="correo" pattern="^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$" required>
                    @error('correo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="telefono" style="float: left">Celular</label>
                    <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" maxlength="9" pattern="[1-9][0-9]{8}">
                    @error('telefono')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>  

                <div class="form-group">
                    <label for="imagen" style="float: left">Imagen</label><br><br>
                    <input accept=".png, .jpg, .jpeg"  type="file"  id="imagen" name="imagen" required>
                    <!-- <input type="text" class="form-control @error('imagen') is-invalid @enderror" id="imagen" name="imagen"> -->
                    @error('imagen')
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