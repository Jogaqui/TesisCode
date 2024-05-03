@extends('layouts.plantilla')

@section('contenido')


<div class="container-fluid">
    <h3 style="position:relative; opacity: 1 !important;">GESTIÓN DE MULTIMEDIA</h3>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Listado de contenido multimedia</h3>
            <a href="{{route('multimedia.create')}}" class="btn btn-success" style="float:right;"><i class="fas fa-plus"></i> Nuevo Registro</a>
            <br><br>
            <h3 class="card-title" style="font-size: 15px;">Hasta el momento hay: '<b style="color: blue;"> @php echo $multimedias->count();@endphp</b>' multimedias registrados.</h3>

        </div>
          <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Código</th>
                <th>Título</th>
                <th>Resumen</th>
                <th>Tipo de multimedia</th>
                <th>Tipo de trámite</th>
                <th>Principal</th>

                <th>Opciones</th>
              </tr>
              </thead>
              <tbody>

              @foreach($multimedias as $item) 
                <tr>
                    <td style="text-align: center">{{$item->idMultimedia}}</td>
                    <td>{{$item->titulo}}</td>
                    <td>{{$item->resumen}}</td>
                    <td>{{$item->tipo_multimedia->descripcion}}</td>
                    <td>
                      @if(isset($item->tipo_tramite->descripcion))
                        {{$item->tipo_tramite->descripcion}}
                      @else
                        <i>- NINGUNO -</i>
                      @endif
                    </td>
                    <td>
                      @if($item->principal)
                        <p style="background-color: green; color: white; border-radius: 10px; padding:2px; text-align:center;">SÍ</p>
                      @else
                        <p style="background-color: rgb(168, 165, 165); color: white; border-radius: 10px; padding:2px; text-align:center;">NO</p>
                      @endif
                    </td>
                    <td>
                      @if ($item->estado == 1)
                        <a href="{{route('multimedia.edit',$item->idMultimedia)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$item->idMultimedia}}"><i class="fas fa-times"></i></a>
                      @else
                        <a href="" style="border: 1px solid black;" class="btn btn-light btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$item->idMultimedia}}"><i class="fas fa-check"></i> Activar</a>
                      @endif
                    </td>
                </tr>
                
            <!------ ESTE ES EL MODAL QUE SE MUESTRA AL DAR CLICK EN EL BOTON "ELIMINAR" ------>
            <div class="modal fade" id="exampleModalCenter{{$item->idMultimedia}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background: red">
                          @if ($item->estado == 1)
                          <h3 style="color: white">Desactivación</h3>
                          @else 
                              <h3 style="color: white">Activación</h3>
                          @endif
                        </div>
                        <div class="modal-body">
                            @if ($item->estado == 1)
                                <h5>¿Desea desactivar el registro de {{$item->titulo}}?</h5>
                            @else 
                            <h5>¿Desea activar el registro de {{$item->titulo}}?</h5>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <form action="{{route('multimedia.destroy', $item->idMultimedia)}}" method="POST">
                                @method('delete')
                                @csrf
                                <a type="button" href="{{route('cancelarMultimedia')}}" class="btn btn-secondary"><i class="fas fa-ban"></i> Cancelar</a>
                                @if ($item->estado == 1)
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
                  <th>Título</th>
                  <th>Resumen</th>
                  <th>Tipo de multimedia</th>
                  <th>Tipo de trámite</th>
                  <th>Principal</th>
  
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
