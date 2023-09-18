@extends('layouts.plantilla')

@section('contenido')
<div class="container" align="center">
    
    <form method="POST" action="{{route('tramite.store')}}" enctype="multipart/form-data" >
        @csrf
        <div class="card text-white bg-secondary mb-3" style="max-width: 40rem;">
            <div class="card-header"><h1 style="font-weight: bold;text-align:center">Crear Trámite</h1></div>

            <div class="card-body">
                <div class="form-group">
                    <label for="titulo" style="float: left">Título</label>
                    <input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo" name="titulo"
                    pattern="^(?!.* (?: |$))[A-Z][A-Za-záéíóú1-9 ]+$" title="Debe poner solo palabras con la primera letra en Mayuscula" required>
                    @error('titulo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="titulo_abrev" style="float: left">Título abreviado</label>
                    <input type="text" class="form-control @error('titulo_abrev') is-invalid @enderror" id="titulo_abrev" name="titulo_abrev"
                    pattern="^(?!.* (?: |$))[A-Z][A-Za-záéíóú1-9 ]+$" title="Debe poner solo palabras con la primera letra en Mayuscula" required>
                    @error('titulo_abrev')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="descripcion" style="float: left">Descripción</label>
                    <textarea rows="3" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" required></textarea>
                    @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>   

                <div class="form-group">
                    <label for="archivo" style="float: left">Archivo</label><br><br>
                    <input accept=".pdf, .doc, .docx" type="file"  id="archivo" name="archivo" required>
                    <!-- <input type="text" class="form-control @error('archivo') is-invalid @enderror" id="imagen" name="imagen"> -->
                    @error('archivo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="idIcono" style="float:left">Ícono</label>
                    <select class="form-control @error('idIcono') is-invalid @enderror" id="idIcono" name="idIcono" required>
                        <option value="">Seleccionar icono</option>
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
            </div>
            <div class="card-footer" style="text-align:center">
                <button type="submit" class="btn btn-primary "><i class="fas fa-save"></i> Grabar</button>
                <a href="{{route('cancelarT')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
            </div>
        </div>     
    </form>
</div>
@endsection