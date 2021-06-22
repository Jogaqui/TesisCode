@extends('layouts.plantilla')
 
@section('contenido')

<div class="container-fluid">
    <h3>GESTIÓN DE TRABAJADORES</h3>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Listado de  trabajadores</h3>
            <a href="{{route('trabajador.create')}}" class="btn btn-success" style="float:right;"><i class="fas fa-plus"></i> Nuevo Registro</a>
            <br><br>
            @php
            
            @endphp
            <h3 class="card-title" style="font-size: 15px;">Hasta el momento hay: '<b style="color: blue;"> @php echo $trabajador->count(); @endphp</b>' trabajadores registrados.</h3>

        </div>
          <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th scope="col">Código</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Nombres</th>
                <th scope="col">DNI</th>
                <th scope="col">Unidad</th>
                <th scope="col">Puesto</th>
                <th scope="col">Correo</th>
                <th scope="col">Celular</th>
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
                <td>{{$item->descripcion}}</td>
                <td>{{$item->puesto}}</td>
                <td>{{$item->correo}}</td>
                <td>{{$item->telefono}}</td>
                <td>
                    <a href="{{route('trabajador.edit',$item->idTrabajador)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> </a>
                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$item->idTrabajador}}"><i class="fas fa-trash"></i> </a>
                </td>  
            </tr>
            <!------ ESTE ES EL MODAL QUE SE MUESTRA AL DAR CLICK EN EL BOTON "ELIMINAR" ------>
            <div class="modal fade" id="exampleModalCenter{{$item->idTrabajador}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background: red">
                            <h3 style="color: white">Eliminación</h3>
                        </div>
                        <div class="modal-body">
                            <h5>¿Desea eliminar el registro de {{$item->apPaterno}} {{$item->apMaterno}} {{$item->nombres}}?</h5>
                        </div>
                        <div class="modal-footer">
                            <form action="{{route('trabajador.destroy', $item->idTrabajador)}}" method="POST">
                                @method('delete')
                                @csrf
                                <a type="button" href="{{route('cancelarTr')}}" class="btn btn-secondary"><i class="fas fa-ban"></i> Cancelar</a>
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!--fin modal-->
            
            @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th scope="col">Código</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Nombres</th>
                <th scope="col">DNI</th>
                <th scope="col">Unidad</th>
                <th scope="col">Puesto</th>
                <th scope="col">Correo</th>
                <th scope="col">Celular</th>
                <th scope="col">Opciones</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
  </div>
  <!-- /.container-fluid -->




@endsection
