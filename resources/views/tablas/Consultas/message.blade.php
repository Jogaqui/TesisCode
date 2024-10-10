@extends('layouts.plantilla')

@section('contenido')
<div class="container" align="center">
    <div class="card text-white bg-dark mb-3" style="max-width: 50rem; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif !important;">
        <div class="card-header"><h1 style="font-weight: bold;text-align:center">VISUALIZACIÓN DE CONSULTA</h1></div>
        <div class="card-body">
            <div class="form-group">
                <label for="nombre" style="float: left">ID</label>
                <input type="text" class="form-control" name="codigo" value="{{$consulta->idConsulta}}" disabled>

                <label for="nombre" style="float: left">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="{{$consulta->nombre}}" disabled>
    
                <label for="correo" style="float: left">Correo</label>
                <input type="text" class="form-control" name="correo" value="{{$consulta->correo}}" disabled>        
              
                <div class="row">
                    <div class="col-6">
                        <label for="fecha" style="float: left">Fecha</label>
                        <input type="text" class="form-control" name="fecha" value="{{$consulta->fecha}}" disabled>
                    </div>
                    <div class="col-6">
                        <label for="texto" style="float: left">Estado</label>
                        @if ($consulta->estado==1)
                            <input type="text" style="color: red" class="form-control" name="fecha" value="Pendiente" disabled>                          
                        @else
                            <input type="text" style="color: black" class="form-control" name="fecha" value="Resuelto" disabled> 
                        @endif
                    </div>
                </div>

                <label for="texto" style="float: left; color: #ffb606">Mensaje</label>
                <textarea disabled rows="5" class="form-control @error('texto') is-invalid @enderror" id="Mensaje" name="Mensaje">{{$consulta->mensaje}}</textarea>
                @error('Mensaje')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <label for="texto" style="float: left; color: #ffb606">Respuesta</label>
                <textarea disabled rows="3" class="form-control @error('texto') is-invalid @enderror" id="respuesta" name="respuesta">{{$consulta->respuesta}}</textarea>
                @error('respuesta')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div> 
        </div>     
        <div class="card-footer" style="text-align:center">
            <a style="float:right" href="{{route('consulta.index')}}" class="btn btn-danger"><i class="	fas fa-arrow-left"></i> Regresar</a>
        </div>
    </div>
</div>
@endsection