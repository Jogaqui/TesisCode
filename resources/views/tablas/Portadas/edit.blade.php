@extends('layouts.plantilla')

@section('contenido')
<div class="container" align="center">
    <form method="POST" action="{{route('portada.update',$portada->idPortada)}}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="card text-white bg-secondary mb-3" style="max-width: 40rem;">
            <div class="card-header"><h1 style="font-weight: bold;text-align:center">Editar Portada</h1></div>
            <div class="card-body">

                <div class="form-group">
                    <label for="inicial" style="float: left">Frase Inicial</label>
                    <input type="text" class="form-control @error('titulo') is-invalid @enderror" id="inicial" name="inicial" value="{{$portada->intermedia}}"
                    pattern="^(?!.* (?: |$))[A-Z][A-Za-záéíóú1-9 ]+$" title="Debe poner solo palabras con la primera letra en Mayúscula" required>
                    @error('inicial')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="intermedia" style="float: left">Frase Resaltada</label>
                    <input type="text" class="form-control @error('intermedia') is-invalid @enderror" id="intermedia" name="intermedia" value="{{$portada->intermedia}}"
                    pattern="^(?!.* (?: |$))[A-Z][A-Za-záéíóú1-9 ]+$" title="Debe poner solo palabras con la primera letra en Mayúscula" required>
                    @error('intermedia')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="final" style="float: left">Frase Final</label>
                    <input type="text" class="form-control @error('final') is-invalid @enderror" id="final" name="final" value="{{$portada->final}}"
                    pattern="^(?!.* (?: |$))[A-Z][A-Za-záéíóú1-9 ]+$" title="Debe poner solo palabras con la primera letra en Mayúscula" required>
                    @error('final')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="imagen" style="float: left">Imagen</label><br><br>
                    <img src="{{$portada->imagen}}" alt="" style="border-radius:50%;width:200px;height:200px;"><br><br>
                    <input accept=".png, .jpg, .jpeg"  type="file"  id="imagen" name="imagen">
                    <!-- <input type="text" class="form-control @error('imagen') is-invalid @enderror" id="imagen" name="imagen"> -->
                    @error('imagen')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

            </div>
            <div class="card-footer" style="text-align:center">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Grabar</button>
                <a href="{{route('cancelarPor')}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
            </div>
        </div> 
    </form>
</div>
@endsection