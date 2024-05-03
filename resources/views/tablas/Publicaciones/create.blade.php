@extends('layouts.plantilla')

@section('contenido')
<div class="container" align="center">
    <form method="POST" action="{{route('publicacion.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="card text-white bg-dark mb-3" style="max-width: 50rem; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif !important;">
            <div class="card-header"><h1 style="font-weight: bold;text-align:center">Crear Publicación</h1></div>
            <div class="card-body">

                <div class="form-group">
                    <label for="imagen" style="float: left">Imagen</label><br><br>
                    <input accept=".png, .jpg, .jpeg"  type="file"  id="imagen" name="imagen">
                    <!-- <input type="text" class="form-control @error('imagen') is-invalid @enderror" id="imagen" name="imagen"> -->
                    @error('imagen')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="titulo" style="float: left">Título</label>
                    <input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo" name="titulo" required>
                    @error('titulo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="resumen" style="float: left">Resumen</label>
                    <textarea rows="3" class="form-control @error('resumen') is-invalid @enderror" id="resumen" name="resumen" required></textarea>
                    @error('resumen')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>    

                <div class="form-group">
                    <label for="texto" style="float: left">Texto</label>
                    <textarea rows="5" class="form-control @error('texto') is-invalid @enderror" id="texto" name="texto" required></textarea>
                    @error('texto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>      

                {{-- <div class="form-group">
                    <label for="archivo" style="float: left">Archivo</label>
                    <input type="text" class="form-control @error('archivo') is-invalid @enderror" id="archivo" name="archivo">
                    @error('archivo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>   --}}
                
                <div class="form-group">        
                    <label style="float: left">Etiquetas</label><br>
                    <div class="select2-purple">
                        <select class="select2" multiple="multiple" data-placeholder="Selecciones etiqueta(s)" data-dropdown-css-class="select2-purple" style="width: 100%;" id="etiquetas[]" name="etiquetas[]" >
                            @foreach($etiqueta as $item)
                                <option value="{{$item->idEtiqueta}}" >{{$item->descripcion}}</option>
                            @endforeach
                        </select>
                    </div> 
                </div>

                <div class="form-group">
                    <label for="ruta_pagina" style="float: left">Ruta (opcional)</label>
                    <input type="text" class="form-control @error('ruta_pagina') is-invalid @enderror" id="ruta_pagina" name="ruta_pagina" >
                    @error('ruta_pagina')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="archivo" style="float: left">Archivo (opcional)</label><br><br>
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
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Grabar</button>
                <a href="{{route('cancelarPu')}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
            </div>
        </div> 
    </form>
</div>
@endsection