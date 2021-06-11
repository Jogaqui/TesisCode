@extends('layouts.plantilla')
@section('contenido')
<div class="container">
    <form method="POST" action="{{route('trabajador.destroy',$trabajador->idTrabajador)}}">
        @method('delete')
        @csrf
        <div class="form-group">
            <h1>Desea eliminar el registro ? </h1>
            <h1>Código: {{$trabajador->idTrabajador}}</h1>
            <h1>Apellidos y Nombres: {{$trabajador->apPaterno}} {{$trabajador->apMaterno}} {{$trabajador->nombres}}</h1>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> SI</button>
        <a href="{{route('cancelarT')}}" class="btn btn-danger"><i class="fas fa-ban"></i> NO</a>
    </form>
</div>
@endsection
