@extends('layouts.plantilla')

@section('contenido')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Listado de generalidades</h3>
            <a href="{{route('conocenos.create')}}" class="btn btn-success" style="float:right;"><i class="fas fa-plus"></i> Nuevo Registro</a>
            <br><br>
            @php
                //dd($id);
            @endphp
            <h3 class="card-title" style="font-size: 15px;">Hasta el momento hay: '<b style="color: blue;"> @php echo $conocenos->count(); @endphp</b>' generalidades registradas.</h3>

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
              @foreach($conocenos as $itemconocenos)
                <tr>
                    <td>{{$itemconocenos->idConocenos}}</td>
                    <td>{{$itemconocenos->descripcion}}</td>
                    <td>
                        <a href="{{route('conocenos.edit',$itemconocenos->idConocenos)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a>
                        <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$itemconocenos->idConocenos}}"><i class="fas fa-trash"></i> Eliminar</a>
                    </td>
                </tr>

            <!------ ESTE ES EL MODAL QUE SE MUESTRA AL DAR CLICK EN EL BOTON "ELIMINAR" ------>
            <div class="modal fade" id="exampleModalCenter{{$itemconocenos->idConocenos}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background: red">
                            <h3 style="color: white">Eliminación</h3>
                        </div>
                        <div class="modal-body">
                            <h5>¿Desea eliminar el registro de {{$itemconocenos->descripcion}}?</h5>
                        </div>
                        <div class="modal-footer">
                            <form action="" method="POST">
                                @method('delete')
                                @csrf
                                <a type="button" href="{{route('cancelarc')}}" class="btn btn-secondary"><i class="fas fa-ban"></i> Cancelar</a>
                                <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!--fin modal-->
            @endforeach   
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection