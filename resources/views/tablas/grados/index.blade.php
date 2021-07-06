@extends('layouts.plantilla')

@section('contenido')


<div class="container-fluid">
    <h3>GESTIÓN DE GRADOS</h3>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Listado de grados</h3>
            <a href="{{route('grados.create')}}" class="btn btn-success" style="float:right;"><i class="fas fa-plus"></i> Nuevo Registro</a>
            <br><br>
            @php
            
            @endphp
            <h3 class="card-title" style="font-size: 15px;">Hasta el momento hay: '<b style="color: blue;"> @php echo $grado->count(); @endphp</b>' grados registrados.</h3>

        </div>
          <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Código</th>
                <th>Abreviatura</th>
                <th>Nombre</th>
                <th>Opciones</th>
              </tr>
              </thead>
              <tbody>
              @foreach($grado as $itemgrado)
            <tr>
                <td>{{$itemgrado->idGrado}}</td>
                <td>{{$itemgrado->abreviatura}}</td>
                <td>{{$itemgrado->nombre}}</td>
                <td>
                    @if ($itemgrado->estado == 1)
                      <a href="{{route('grados.edit',$itemgrado->idGrado)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i>Editar</a>
                      <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$itemgrado->idGrado}}"><i class="fas fa-times"></i> Desactivar</a>
                    @else
                      <a href="" style="border: 1px solid black;" class="btn btn-light btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$itemgrado->idGrado}}"><i class="fas fa-check"></i> Activar</a>
                    @endif
                </td>
            </tr>
            <!------ ESTE ES EL MODAL QUE SE MUESTRA AL DAR CLICK EN EL BOTON "ELIMINAR" ------>
            <div class="modal fade" id="exampleModalCenter{{$itemgrado->idGrado}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background: red">
                          @if ($itemgrado->estado == 1)
                            <h3 style="color: white">Desactivación</h3>
                          @else 
                            <h3 style="color: white">Activación</h3>
                          @endif
                        </div>
                        <div class="modal-body">
                            @if ($itemgrado->estado == 1)
                                <h5>¿Desea desactivar el registro de {{$itemgrado->nombre}}?</h5>
                            @else 
                            <h5>¿Desea activar el registro de {{$itemgrado->nombre}}?</h5>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <form action="{{route('grados.destroy', $itemgrado->idGrado)}}" method="POST">
                                @method('delete')
                                @csrf
                                <a type="button" href="{{route('cancelargr')}}" class="btn btn-secondary"><i class="fas fa-ban"></i> Cancelar</a>
                                @if ($itemgrado->estado == 1)
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-times"></i> Desactivar</button>
                                @else
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-check"></i> Activar</button>
                                @endif
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
                <th>Abreviatura</th>
                <th>Nombre</th>
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
@endsection
