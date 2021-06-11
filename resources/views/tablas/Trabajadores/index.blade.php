@extends('layouts.plantilla')
 
@section('contenido')
<h1>listado de Trabajadores</h1>
 
 
<a href="{{route('trabajador.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo Registro</a>

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
            <th scope="col">Apellidos</th>
            <th scope="col">Nombres</th>
            <th scope="col">DNI</th>
            <th scope="col">Puesto</th>
            <th scope="col">Correo</th>
            <th scope="col">Telefono</th>
            <th scope="col">Opciones</th>

        </tr>
    </thead>
    <tbody>
        @foreach($trabajador as $item)
        <tr>
            <td>{{$item->idTrabajador}}</td>
            <td>{{$item->apPaterno}} {{$item->apMaterno}}</td>
            <td>{{$item->nombres}}</td>
            <td>{{$item->dni}}</td>
            <td>{{$item->puesto}}</td>
            <td>{{$item->correo}}</td>
            <td>{{$item->telefono}}</td>
            <td>
                <a href="{{route('trabajador.edit',$item->idTrabajador)}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Editar</a>
                <a href="{{route('trabajador.confirmar',$item->idTrabajador)}}" class="btn btn-danger btn-sm"><i class="fas fa-ban"></i> Eliminar</a>
            </td>            
        </tr>
        @endforeach
    </tbody>
</table>
</div>
{{$trabajador->links()}}
@endsection
