@extends('layouts.plantilla')

@section('contenido')

<div class="container">
 
    <h3>NUESTROS TIPOS DE GENERALIDADES Y FUNCIONES</h3>

    <a href="{{route('tipoconoce.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo Registro</a>

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
                <th scope="col">Nombre</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tipoconoce as $itemtipoconoce)
            <tr>
                <td>{{$itemtipoconoce->idConoce}}</td>
                <td>{{$itemtipoconoce->nombre}}</td>
                <td>
                    <a href="{{route('tipoconoce.edit',$itemtipoconoce->idConoce)}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Editar</a>
                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$itemtipoconoce->idConoce}}"><i class="fas fa-edit"></i> Eliminar</a>
                </td>
            </tr>
            <!------ ESTE ES EL MODAL QUE SE MUESTRA AL DAR CLICK EN EL BOTON "ELIMINAR" ------>
            <div class="modal fade" id="exampleModalCenter{{$itemtipoconoce->idConoce}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header d-flex justify-content-center" style="background: red">
                            <h3 style="color: white">Desea eliminar el registro ? </h3>
                        </div>
                        <div class="modal-body">
                            <h3>Código: {{$itemtipoconoce->idConoce}}</h3>
                            <h3>Nombre: {{$itemtipoconoce->nombre}}</h3>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <form action="{{route('tipoconoce.destroy', $itemtipoconoce->idConoce)}}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> SI</button>
                                <a href="{{route('cancelart')}}" class="btn btn-danger"><i class="fas fa-ban"></i> NO</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!--fin modal-->
            @endforeach
        </tbody>
    </table>
</div>
{{$tipoconoce->links()}}
@endsection