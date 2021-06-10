@extends('layouts.plantilla')

@section('contenido')

<div class="container">
 
    <h3>NUESTRAS UNIDADES</h3>

    <a href="{{route('unidad.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo Registro</a>

    <nav class="navbar float-right">
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Buscar por descripcion" aria-label="Search" id="buscarpor" name="buscarpor" value="{{$buscarpor}}">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    </nav>

    @if (session('datos'))
    <div class="alert alert-warning alert-dismissible fade show mt-3" roles="alert">
        {{ session('datos') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Descripción</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($unidad as $itemunidad)
            <tr>
                <td>{{$itemunidad->idUnidad}}</td>
                <td>{{$itemunidad->descripcion}}</td>
                <td>
                    <a href="{{route('unidad.edit',$itemunidad->idUnidad)}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Editar</a>
                    <a href="{{route('unidad.confirmar',$itemunidad->idUnidad)}}" class="btn btn-danger btn-sm"><i class="fas fa-edit"></i>Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{$unidad->links()}}
@endsection
