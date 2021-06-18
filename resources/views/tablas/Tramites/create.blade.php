@extends('layouts.plantilla')

@section('contenido')
<div class="container" align="center">
    
    <form method="POST" action="{{route('tramite.store')}}">
        @csrf
        <div class="card text-white bg-secondary mb-3" style="max-width: 40rem;">
            <div class="card-header"><h1 style="font-weight: bold;text-align:center">Crear Registro</h1></div>

            <div class="card-body">
                <div class="form-group">
                    <label for="titulo" style="float: left">Título</label>
                    <input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo" name="titulo">
                    @error('titulo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="descripcion" style="float: left">Descripción</label>
                    <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion">
                    @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="ruta" style="float: left">Ruta</label>
                    <input type="text" class="form-control @error('ruta') is-invalid @enderror" id="ruta" name="ruta">
                    @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="idIcono" style="float:left;padding:20px">Ícono</label>
                <select class="form-control @error('idIcono') is-invalid @enderror" id="idIcono" name="idIcono" style="width:95%;">
                    @foreach($icono as $itemicono)
                        <option value="{{$itemicono->idIcono}}" >{{$itemicono->nombre}}</option>
                    @endforeach
                </select>
                @error('idIcono')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="card-footer" style="text-align:center">
                <button type="submit" class="btn btn-primary "><i class="fas fa-save"></i> Grabar</button>
                <a href="{{route('cancelarT')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
            </div>
        </div>     
    </form>
</div>
@endsection