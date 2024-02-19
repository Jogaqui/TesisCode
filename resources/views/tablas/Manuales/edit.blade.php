@extends('layouts.plantilla')
@section('contenido')
<div class="container" align="center">
    <form method="POST" action="{{route('manual.update',$manual->idManual)}}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="card text-white bg-secondary mb-3" style="max-width: 40rem;">
            <div class="card-header"><h1 style="font-weight: bold;text-align:center">Editar Manual</h1></div>
            

            <div class="card-body">
                <div class="form-group">
                    <label for="titulo" style="float: left">Título</label>
                    <input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo" name="titulo" value="{{$manual->titulo}}" required>
                    @error('titulo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="titulo_abrev" style="float: left">Título abreviado</label>
                    <input type="text" class="form-control @error('titulo_abrev') is-invalid @enderror" id="titulo_abrev" name="titulo_abrev" 
                    value="{{$manual->titulo_abrev}}" required>
                    @error('titulo_abrev')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="descripcion" style="float: left">Descripción</label>
                    <textarea rows="3" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" required>{{$manual->descripcion}}</textarea>
                    @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>  

                <div class="form-group">
                    <label for="tipo_usuario" style="float: left">Tipo de usuario</label>
                    <select class="form-control @error('tipo_usuario') is-invalid @enderror" id="tipo_usuario" name="tipo_usuario" required>
                        <option value="{{$manual->idTipo_usuario}}" selected>{{$manual_tipo_usuario->nombre}}</option>
                        
                        @foreach($tipos_usuario as $item)
                            @if($manual->idTipo_usuario!==$item->idTipo_usuario)
                                <option value="{{$item['idTipo_usuario']}}">{{$item['nombre']}}</option>
                            @endif 
                           
                        @endforeach
                    </select>
                    @error('tipo_usuario')
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
            
            </div>
            <div class="card-footer" style="text-align:center">
                <button type="submit" class="btn btn-primary "><i class="fas fa-save"></i> Grabar</button>
                <a href="{{route('cancelarHis')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
            </div>
        </div>
    </form>
</div>
@endsection