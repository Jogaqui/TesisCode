@extends('layouts.plantilla')
@section('contenido')
<div class="container" align="center">
    <form method="POST" action="{{route('tramite.update',$tramite->idTramite)}}">
        @method('put')
        @csrf
        <div class="card text-white bg-secondary mb-3" style="max-width: 40rem;">
            <div class="card-header"><h1 style="font-weight: bold;text-align:center">Editar Trámite</h1></div>
            
            <!-- <div class="card-body">
                <div class="form-group">
                    <label for="idIcono" style="float: left">Ícono</label>
                    <input type="text" class="form-control @error('icono') is-invalid @enderror" id="idIcono" name="idIcono" aria-describedby="descripcionHelp" placeholder="Ingrese Ícono" value="{{$tramite->idIcono}}" style="content:'Hokla'">
                    <small id="descripcionHelp" class="form-text text-muted">Ingrese aquí el ícono</small>
                    @error('idIcono')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div> -->

            <div class="card-body">
                <div class="form-group">
                    <label for="titulo" style="float: left">Título</label>
                    <input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo" name="titulo" aria-describedby="descripcionHelp" placeholder="Ingrese título" value="{{$tramite->titulo}}"
                    pattern="^(?!.* (?: |$))[A-Z][A-Za-záéíóú1-9 ]+$" title="Debe iniciar con la primera letra en Mayuscula" required>
                    @error('titulo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="descripcion" style="float: left">Descripción</label>
                    <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" aria-describedby="descripcionHelp" placeholder="Ingrese Descripción" value="{{$tramite->descripcion}}"
                    pattern="^(?!.* (?: |$))[A-Z][A-Za-záéíóú1-9 ]+$" title="Debe poner solo palabras con la primera letra en Mayuscula" required>
                    @error('descripcion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ruta" style="float: left">Ruta</label>
                    <input type="text" class="form-control @error('ruta') is-invalid @enderror" id="ruta" name="ruta" aria-describedby="descripcionHelp" placeholder="Ingrese Ruta" value="{{$tramite->ruta}}">
                    @error('ruta')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            

                <div class="form-group">
                    <label for="idIcono" style="float:left">Ícono</label>
                    <select class="form-control @error('idIcono') is-invalid @enderror" id="idIcono" name="idIcono">
                        <option value="{{$icono->idIcono}}" >{{$icono->nombre}}</option>
                        @foreach($iconos as $itemicono)
                            @if($icono->idIcono!==$itemicono->idIcono)
                                <option value="{{$itemicono->idIcono}}" >{{$itemicono->nombre}}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('idIcono')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="card-footer" style="text-align:center">
                <button type="submit" class="btn btn-primary "><i class="fas fa-save"></i> Grabar</button>
                <a href="{{route('cancelarT')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
            </div>
        </div>
    </form>
</div>
@endsection