@extends('layouts.plantilla')

@section('contenido')
<div class="container" align="center">
    <form method="POST" action="{{route('publicacion.store')}}">
        @csrf
        <div class="card text-white bg-secondary mb-3" style="max-width: 40rem;">
            <div class="card-header"><h1 style="font-weight: bold;text-align:center">Crear Publicación</h1></div>
            <div class="card-body">
                <div class="form-group">
                    <label for="imagen" style="float: left">Imagen</label><br>
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
                    <label for="titulo" style="float: left">Título</label>
                    <input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo" name="titulo"
                    pattern="^(?!.* (?: |$))[A-Z][A-Za-záéíóú1-9 ]+$" title="Debe poner solo palabras con la primera letra en Mayúscula" required>
                    @error('titulo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="resumen" style="float: left">Resumen</label>
                    <textarea rows="3" class="form-control @error('resumen') is-invalid @enderror" id="resumen" name="resumen" 
                    pattern="^(?!.* (?: |$))[A-Z][A-Za-záéíóú1-9]+$" title="Debe poner solo palabras con la primera letra en Mayúscula" required></textarea>
                    @error('resumen')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>    

                <div class="form-group">
                    <label for="texto" style="float: left">Texto</label>
                    <textarea rows="5" class="form-control @error('texto') is-invalid @enderror" id="texto" name="texto" 
                    pattern="^(?!.* (?: |$))[A-Z][A-Za-záéíóú1-9]+$" title="Debe poner solo palabras con la primera letra en Mayúscula" required></textarea>
                    @error('texto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>      

                <div class="form-group">
                    <label for="archivo" style="float: left">Archivo</label>
                    <input type="text" class="form-control @error('archivo') is-invalid @enderror" id="archivo" name="archivo">
                    @error('archivo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>      

                <div class="form-group">
                    <div class="row d-flex">
                        <div class="col-3">
                            <label style="float: left">Etiquetas</label>
                        </div>
                        <div class="col-9">
                            <div class="select2-purple">
                                <select class="select2" multiple="multiple" data-placeholder="Selecciones etiqueta(s)" data-dropdown-css-class="select2-purple" style="width: 100%;" id="etiquetas[]" name="etiquetas[]" >
                                    @foreach($etiqueta as $item)
                                        <option value="{{$item->idEtiqueta}}" >{{$item->descripcion}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
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