@extends('layouts.plantilla')
@section('contenido')
<div class="container">
    <form method="POST" action="{{route('unidad.destroy',$unidad->idUnidad)}}">
        @method('delete')
        @csrf
        <div class="form-group">
            <h1>Desea eliminar el registro ? </h1>
            <h1>Código: {{$unidad->idUnidad}}</h1>
            <h1>Descripción: {{$unidad->descripcion}}</h1>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> SI</button>
        <a href="{{route('cancelarp')}}" class="btn btn-danger"><i class="fas fa-ban"></i> NO</a>
        
    </form>
</div>

@endsection
