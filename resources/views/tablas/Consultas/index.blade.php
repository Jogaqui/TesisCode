@extends('layouts.plantilla')

@section('contenido')


<div class="container-fluid">
    <h3 style="position:relative; opacity: 1 !important;">GESTIÓN DE CONSULTAS</h3>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Listado de consultas</h3>
            <br><br>
            <h3 class="card-title" style="font-size: 15px;">Hasta el momento hay: '<b style="color: blue;"> @php echo $consulta->count();@endphp</b>' consultas registradas.</h3>

        </div>
          <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Fecha</th>
                <th>Unidad</th>
                <th>Estado</th>
                <th>Opciones</th>
              </tr>
              </thead>
              <tbody>

              @foreach($consulta as $item)
                <tr>
                    <td>{{$item->idConsulta}}</td>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->correo}}</td>
                    <td>{{$item->fecha}}</td>
                    <td>{{$item->unidad->descripcion}}</td>
                      @if ($item->estado==1)
                        <td>Pendiente</td>
                      @else
                        <td>Resuelto</td>
                      @endif
                    <td>
                      <a href="{{route('consulta.show',$item->idConsulta)}}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> Mensaje</a>
                      @if ($item->estado==1)
                      <a href="{{route('consulta.edit',$item->idConsulta)}}" class="btn btn-danger btn-sm"><i class="far fa-folder"></i> Resolver</a>
                      @endif
                    </td>
                </tr>
            <!-- ESTE ES EL MODAL QUE SE MUESTRA AL DAR CLICK EN EL BOTON "ELIMINAR" -->
            <div class="modal fade" id="exampleModalCenter{{$item->idConsulta}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background: red">
                            <h3 style="color: white">Actualización </h3>
                        </div>
                        <div class="modal-body">
                            <h3>¿Desea continuar la actualización del correo: {{$item->correo}}? </h3>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <form action="{{route('consulta.destroy', $item->idConsulta)}}" method="POST">
                                @method('delete')
                                @csrf
                                <a type="button" href="{{route('cancelarC')}}" class="btn btn-secondary"><i class="fas fa-ban"></i> Cancelar</a>
                                <button type="submit" class="btn btn-danger"><i class="fas fa-times"></i> Aceptar</button>
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
                <th>Nombre</th>
                <th>Correo</th>
                <th>Fecha</th>
                <th>Unidad</th>
                <th>Estado</th>
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
