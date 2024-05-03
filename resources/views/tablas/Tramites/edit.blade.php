@extends('layouts.plantilla')
@section('contenido')
<div class="container" align="center">
    <form method="POST" action="{{route('tramite.update',$tramite->idTramite)}}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="card text-white bg-dark mb-3" style="max-width: 50rem; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif !important;">
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
                    <input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo" name="titulo" aria-describedby="descripcionHelp" placeholder="Ingrese título" value="{{$tramite->titulo}}" required>
                    @error('titulo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="titulo_abrev" style="float: left">Título abreviado</label>
                    <input type="text" class="form-control @error('titulo_abrev') is-invalid @enderror" id="titulo_abrev" name="titulo_abrev" aria-describedby="descripcionHelp" placeholder="Ingrese título abreviado" value="{{$tramite->titulo_abrev}}" required>
                    @error('titulo_abrev')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="descripcion" style="float: left">Descripción</label>
                    <textarea rows="3" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" required>{{$tramite->descripcion}}</textarea>
                    @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>   

                <div class="form-group">
                    <label for="archivo" style="float: left">Archivo</label><br><br>
                    <input accept=".pdf, .doc, .docx" type="file"  id="archivo" name="archivo">
                    <!-- <input type="text" class="form-control @error('archivo') is-invalid @enderror" id="imagen" name="imagen"> -->
                    @error('archivo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
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