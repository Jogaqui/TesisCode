@extends('layouts.plantilla')

@section('contenido')


<div class="container-fluid">
    <h3>GESTIÓN DE CONSULTAS</h3>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Listado de consultas</h3>
            
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
                      @php
                        if($item->estado==1){@endphp
                          <td>Pendiente</td>
                      @php
                        }else{@endphp
                          <td>Resuelto</td>
                      @php
                        }
                      @endphp
                    <td>
                      <a href="{{route('consulta.show',$item->idConsulta)}}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> Mensaje</a>
                      @php
                        if($item->estado==1){@endphp
                          <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$item->idConsulta}}"><i class="far fa-folder"></i></i> Resolver</a>
                      @php
                        }
                      @endphp
                    </td>
                </tr>
            <!------ ESTE ES EL MODAL QUE SE MUESTRA AL DAR CLICK EN EL BOTON "ELIMINAR" ------>
            <div class="modal fade" id="exampleModalCenter{{$item->idConsulta}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header d-flex justify-content-center" style="background: red">
                            <h3 style="color: white">Desea continuar la actualización? </h3>
                        </div>
                        <div class="modal-body">
                            <h3>Código: {{$item->idConsulta}}</h3>
                            <h3>Correo: {{$item->correo}}</h3>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <form action="{{route('consulta.destroy', $item->idConsulta)}}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> SI</button>
                                <a href="{{route('cancelarC')}}" class="btn btn-danger"><i class="fas fa-ban"></i> NO</a>
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
