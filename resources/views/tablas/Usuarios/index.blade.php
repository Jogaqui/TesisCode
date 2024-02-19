@extends('layouts.plantilla')
 
@section('contenido')

<div class="container-fluid">
    <h3 style="position:relative; opacity: 1 !important;">GESTIÓN DE USUARIOS</h3>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Listado de Usuarios</h3>
            <a href="{{route('usuario.create')}}" class="btn btn-success" style="float:right;"><i class="fas fa-plus"></i> Nuevo Registro</a>
            <br><br>
            @php
            
            @endphp
            <h3 class="card-title" style="font-size: 15px;">Hasta el momento hay: '<b style="color: blue;"> @php echo $usuarios->count(); @endphp</b>' usuarios registrados.</h3>

        </div>
          <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th scope="col">Código</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Nombres</th>
                <th scope="col">Usuario</th>
                <!-- <th scope="col">Unidad</th> -->
                <th scope="col" style="max-width: 4cm">Puesto</th>
                <!-- <th scope="col">Correo</th> -->
                <!-- <th scope="col">Celular</th> -->
                <th scope="col">Rol</th>
                <th scope="col">Opciones</th>
              </tr>
              </thead>
              <tbody>
              @foreach($usuarios as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->usu_apepaterno}} {{$item->usu_apematerno}}</td>
                <td>{{$item->usu_nombres}}</td>
                <td>{{$item->usu_login}}</td>
                
                <td>{{$item->trab_puesto}}</td>
             
                <td>{{$item->rol}}</td>
                
                <td>
                  <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#mostrarInfo{{$item->id}}"><i class="fas fa-info"></i></a>  
                  <a href="{{route('usuario.edit',$item->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}"><i class="fas fa-trash"></i></a>
                </td>  
            </tr>
            <!------ ESTE ES EL MODAL QUE SE MUESTRA AL DAR CLICK EN EL BOTON "ELIMINAR" ------>
            <div class="modal fade" id="exampleModalCenter{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background: red">
                            <h3 style="color: white">Eliminación</h3>
                        </div>
                        <div class="modal-body">
                            <h5>¿Desea eliminar el registro de {{$item->usu_apepaterno}} {{$item->usu_apematerno}} {{$item->usu_nombres}}?</h5>
                        </div>
                        <div class="modal-footer">
                            <form action="{{route('usuario.destroy', $item->id)}}" method="POST">
                                @method('delete')
                                @csrf
                                <a type="button" href="{{route('cancelarUsu')}}" class="btn btn-secondary"><i class="fas fa-ban"></i> Cancelar</a>
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!--fin modal-->

            <!------ ESTE ES EL MODAL QUE SE MUESTRA AL DAR CLICK EN EL BOTON "INFO" ------>
            <div class="modal fade" id="mostrarInfo{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="mostrarInfoTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                      <div class="modal-header" style="background: rgb(0, 183, 255)">
                          <h3 style="color: white"><i class="fas fa-info-circle"></i> Datos del Usuario</h3>
                      </div>
                      <div class="modal-body">
                          <div class="form-group">
                            <div class="row d-flex">
                              <div class="col-12">
                                  <div class="row d-flex">
                                    
                                    <div class="col-9">
                                      <label for="usu_apepaterno" style="float: left">Nombre Completo</label>
                                      <input type="text" class="form-control" id="usu_apepaterno" name="usu_apepaterno" aria-describedby="descripcionHelp" placeholder="Ingrese Nombres" value="{{$item->usu_apepaterno}} {{$item->usu_apematerno}} {{$item->usu_nombres}}" disabled>
                                    </div>

                                    <div class="col-3">
                                      <label for="usu_dni" style="float: left">DNI</label>
                                      <input type="text" class="form-control" id="usu_dni" name="usu_dni" aria-describedby="descripcionHelp" value="{{$item->usu_dni}}" disabled>
                                    </div>
                                </div>
                              </div>
                           
                              <div class="col-9 mt-1">
                                <label for="trab_puesto" style="float: left">Puesto</label>
                                <input type="text" class="form-control" id="trab_puesto" name="trab_puesto" aria-describedby="descripcionHelp" value="{{$item->trab_puesto}}" disabled>
                              </div>
                              
                              <div class="col-9 mt-1">
                                <label for="usu_email" style="float: left">Correo</label>
                                <input type="text" class="form-control" id="usu_email" name="usu_email" aria-describedby="descripcionHelp" value="{{$item->usu_email}}" disabled>
                              </div>
                              
                              <div class="col-9 mt-2">
                                <label for="usu_login" style="float: left">Usuario</label>
                                <input type="text" class="form-control" id="usu_login" name="usu_login" aria-describedby="descripcionHelp" value="{{$item->usu_login}}" disabled>
                              </div>

                              <div class="col-3 mt-2">
                                <label for="rol" style="float: left">Rol</label>
                                <input type="text" class="form-control" id="rol" name="rol" aria-describedby="descripcionHelp" value="{{$item->rol}}" disabled>
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
                  <th scope="col">Usuario</th>
                  <!-- <th scope="col">Unidad</th> -->
                  <th scope="col" style="max-width: 4cm">Puesto</th>
                  <!-- <th scope="col">Correo</th> -->
                  <!-- <th scope="col">Celular</th> -->
                  <th scope="col">Rol</th>
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
