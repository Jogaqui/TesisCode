@extends('layouts.plantilla')

@section('contenido')


<div class="container-fluid">
    <h3>GESTIÓN DE UNIDADES</h3>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Listado de unidades</h3>
            <a href="{{route('unidad.create')}}" class="btn btn-primary" style="float:right;"><i class="fas fa-plus"></i> Nuevo Registro</a>
            <br><br>
            @php
            
            @endphp
            <h3 class="card-title" style="font-size: 15px;">Hasta el momento hay: '<b style="color: blue;"> @php echo $unidad->count(); @endphp</b>' unidades registradas.</h3>

        </div>
          <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Código</th>
                <th>Descripción</th>
                <th>Opciones</th>
              </tr>
              </thead>
              <tbody>
              @foreach($unidad as $itemunidad)
            <tr>
                <td>{{$itemunidad->idUnidad}}</td>
                <td>{{$itemunidad->descripcion}}</td>
                <td>
                    <a href="{{route('unidad.edit',$itemunidad->idUnidad)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i>Editar</a>
                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$itemunidad->idUnidad}}"><i class="fas fa-edit"></i> Eliminar</a>
                </td>
            </tr>
            <!------ ESTE ES EL MODAL QUE SE MUESTRA AL DAR CLICK EN EL BOTON "ELIMINAR" ------>
            <div class="modal fade" id="exampleModalCenter{{$itemunidad->idUnidad}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header d-flex justify-content-center" style="background: red">
                            <h3 style="color: white">Desea eliminar el registro ? </h3>
                        </div>
                        <div class="modal-body">
                            <h3>Código: {{$itemunidad->idUnidad}}</h3>
                            <h3>Descripción: {{$itemunidad->descripcion}}</h3>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <form action="{{route('unidad.destroy', $itemunidad->idUnidad)}}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> SI</button>
                                <a href="{{route('cancelarp')}}" class="btn btn-danger"><i class="fas fa-ban"></i> NO</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!--fin modal-->
            
            @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>Código</th>
                <th>Descripción</th>
                <th>Opciones</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
  </div>
  <!-- /.container-fluid -->

  {{$unidad->links()}}  
@endsection
