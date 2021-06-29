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
                <!-- <th scope="col">Unidad</th> -->
                <th scope="col" style="max-width: 4cm">Puesto</th>
                <!-- <th scope="col">Correo</th> -->
                <!-- <th scope="col">Celular</th> -->
                <th scope="col">Foto</th>
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
                <!-- <td>{{$item->descripcion}}</td> -->
                <td>{{$item->puesto}}</td>
                <!-- <td>{{$item->correo}}</td> -->
                <!-- <td>{{$item->telefono}}</td> -->
                
                <td><img src="{{$item->imagen}}" alt="" style="border-radius:50%;width:50px;height:50px;"></td>
                <td>
                  <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#mostrarInfo{{$item->idTrabajador}}"><i class="fas fa-info"></i></a>  
                  <a href="{{route('trabajador.edit',$item->idTrabajador)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$item->idTrabajador}}"><i class="fas fa-trash"></i></a>
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

            <!------ ESTE ES EL MODAL QUE SE MUESTRA AL DAR CLICK EN EL BOTON "INFO" ------>
            <div class="modal fade" id="mostrarInfo{{$item->idTrabajador}}" tabindex="-1" role="dialog" aria-labelledby="mostrarInfoTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                      <div class="modal-header" style="background: rgb(0, 183, 255)">
                          <h3 style="color: white"><i class="fas fa-info-circle"></i> Datos del Trabajador</h3>
                      </div>
                      <div class="modal-body">
                          <div class="form-group">
                            <div class="row d-flex">
                              <div class="col-9">
                                  <div class="row d-flex">
                                    <div class="col-2">
                                      <label for="grado" style="float: left">Grado</label>
                                      <input type="text" class="form-control" id="grado" name="grado" aria-describedby="descripcionHelp" value="{{$item->abrevGrado}}" disabled>
                                    </div>
                                    <div class="col-10">
                                      <label for="apPaterno" style="float: left">Nombre Completo</label>
                                      <input type="text" class="form-control" id="apPaterno" name="apPaterno" aria-describedby="descripcionHelp" placeholder="Ingrese Descripción" value="{{$item->apPaterno}} {{$item->apMaterno}} {{$item->nombres}}" disabled>
                                    </div>
                                    <div class="col-12">
                                      <label for="correo" style="float: left">Correo</label>
                                      <input type="email" class="form-control" id="correo" name="correo" aria-describedby="descripcionHelp" value="{{$item->correo}}" disabled>
                                    </div>
                                </div>
                              </div>
                              <div class="col-3" style="text-align: center">
                                <img src="{{$item->imagen}}" alt="" style="border-radius:50%;width:150px;height:150px;">
                              </div>
                              <div class="col-3">
                                <label for="dni" style="float: left">DNI</label>
                                <input type="text" class="form-control" id="dni" name="dni" aria-describedby="descripcionHelp" value="{{$item->dni}}" disabled>
                              </div>
                              <div class="col-9">
                                <label for="idUnidad" style="float: left">Unidad</label>
                                <input type="text" class="form-control" id="idUnidad" name="idUnidad" aria-describedby="descripcionHelp" value="{{$item->unidad->descripcion}}" disabled>
                              </div>
                              <div class="col-9">
                                <label for="puesto" style="float: left">Puesto</label>
                                <input type="text" class="form-control" id="puesto" name="puesto" aria-describedby="descripcionHelp" value="{{$item->puesto}}" disabled>
                              </div>
                              <div class="col-3">
                                <label for="telefono" style="float: left">Celular</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" aria-describedby="descripcionHelp" value="{{$item->telefono}}" disabled>
                              </div>
                            </div> 
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Salir</button>
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
                <!-- <th scope="col">Unidad</th> -->
                <th scope="col">Puesto</th>
                <!-- <th scope="col">Correo</th> -->
                <!-- <th scope="col">Celular</th> -->
                <th scope="col">Foto</th>
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
