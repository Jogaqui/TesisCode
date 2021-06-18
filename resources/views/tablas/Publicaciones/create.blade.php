@extends('layouts.plantilla')

@section('contenido')
<div class="container">
    <h1>Crear Registro</h1>
    <form method="POST" action="{{route('publicacion.store')}}">
        @csrf

        <div class="form-group">
            <label for="imagen">Imagen</label><br>
            <!-- <input accept=".png, .jpg, .jpeg"  type="file"  id="imagen" name="imagen"> -->
            <!-- <input type="file" class="form-control form-control-user"  id="archivo1" name="archivo1" accept="application/pdf"
                  style="border-radius: 0 50px 50px 0;" required> -->
           <input type="text" class="form-control @error('imagen') is-invalid @enderror" id="imagen" name="imagen">
            @error('imagen')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo" name="titulo">
            @error('titulo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" class="form-control @error('fecha') is-invalid @enderror" id="fecha" name="fecha" style="width:50%">
            @error('fecha')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="creador">Información del usuario</label>
            <input type="text" class="form-control @error('creador') is-invalid @enderror" id="creador" name="creador" >
            @error('creador')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>  
        

        <div class="form-group">
            <label for="texto">Texto</label>
            <textarea rows="5" class="form-control @error('texto') is-invalid @enderror" id="texto" name="texto" ></textarea>
            @error('texto')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>      

        <div class="form-group">
            <label for="archivo">Archivo</label>
            <input type="text" class="form-control @error('archivo') is-invalid @enderror" id="archivo" name="archivo">
            @error('archivo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>      



        <div class="form-group">
            <label>Etiquetas</label>
            <div class="select2-purple">
                <select class="select2" multiple="multiple" data-placeholder="Selecciones etiqueta(s)" data-dropdown-css-class="select2-purple" style="width: 100%;" id="etiquetas[]" name="etiquetas[]" >
                    @foreach($etiqueta as $item)
                        <option value="{{$item->idEtiqueta}}" >{{$item->descripcion}}</option>
                    @endforeach
                </select>
            </div>
        </div>
                <!-- /.form-group -->


        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Grabar</button>
        <a href="{{route('cancelarPu')}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
    </form>
</div>
@endsection