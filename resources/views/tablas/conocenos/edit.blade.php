@extends('layouts.plantilla')
@section('contenido')
<div class="container" align="center">
    <form method="POST" action="{{route('conocenos.update',$conocenos->idConocenos)}}">
        @method('put')
        @csrf
        <div class="card text-white bg-secondary mb-3" style="max-width: 40rem;">
            <div class="card-header"><h1 style="font-weight: bold;text-align:center">Editar Tipo</h1></div>
            <div class="card-body">
                <div class="form-group">
                    <input type="hidden" name="tipo" id="tipo" value="{{$conocenos->tipo}}">
                    <label for="descripcion" style="float: left">Descripción</label>
                    <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" aria-describedby="descripcionHelp" placeholder="Ingrese descripcion" value="{{$conocenos->descripcion}}">
                    <small id="descripcionHelp" class="form-text text-muted">Ingrese aquí el descripcion</small>
                    @error('descripcion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="card-footer" style="text-align:center">
                <button type="submit" class="btn btn-primary "><i class="fas fa-save"></i> Grabar</button>
                
                <a href="{{route('cancelarc',$conocenos->tipo)}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
            </div>
        </div>
    </form>
</div>
@endsection