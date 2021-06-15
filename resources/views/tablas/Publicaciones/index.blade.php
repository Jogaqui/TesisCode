@extends('layouts.plantilla')

@section('contenido')


<div class="container-fluid">
    <h3>GESTIÓN DE PUBLICACIONES</h3>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Listado de publicaciones</h3>
            <a href="{{route('publicacion.create')}}" class="btn btn-primary" style="float:right;"><i class="fas fa-plus"></i> Nuevo Registro</a>
            <br><br>
            @php
            
            @endphp
            <h3 class="card-title" style="font-size: 15px;">Hasta el momento hay: '<b style="color: blue;"> @php echo $publicacion->count();@endphp</b>' publicaciones registradas.</h3>

        </div>
          <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Código</th>
                <th>Título</th>
                <th>Fecha</th>
                <th>Información de usuario</th>
                <th>Opciones</th>
              </tr>
              </thead>
              <tbody>

              @foreach($publicacion as $item) 
                <tr>
                    <td>{{$item->idPublicacion}}</td>
                    <td>{{$item->titulo}}</td>
                    <td>{{$item->fecha}}</td>
                    <td>{{$item->creador}}</td>
                    <td>
                    <a href="{{route('publicacion.edit',$item->idPublicacion)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i>Editar</a>
                    @php
                      if($item->estado==1){@endphp
                        <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$item->idPublicacion}}"><i class="fas fa-times"></i> Desactivar</a>
                    @php
                      }else{@endphp
                        <a href="" style="border: 1px solid black;" class="btn btn-light btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$item->idPublicacion}}"><i class="fas fa-check"></i> Activar</a>
                    @php
                      }
                    @endphp
                </tr>
            <!------ ESTE ES EL MODAL QUE SE MUESTRA AL DAR CLICK EN EL BOTON "ELIMINAR" ------>
            <div class="modal fade" id="exampleModalCenter{{$item->idPublicacion}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header d-flex justify-content-center" style="background: red">
                            <h3 style="color: white">Desea eliminar el registro ? </h3>
                        </div>
                        <div class="modal-body">
                            <h3>Código: {{$item->idPublicacion}}</h3>
                            <h3>Título: {{$item->titulo}}</h3>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <form action="{{route('publicacion.destroy', $item->idPublicacion)}}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> SI</button>
                                <a href="{{route('cancelarPu')}}" class="btn btn-danger"><i class="fas fa-ban"></i> NO</a>
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
                <th>Título</th>
                <th>Fecha</th>
                <th>Información de usuario</th>
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
