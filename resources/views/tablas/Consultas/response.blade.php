@extends('layouts.plantilla')

@section('contenido')
<div class="container" align="center">
    <div class="card text-white bg-secondary mb-3" style="max-width: 40rem;">
      <form action="{{route('consulta.update', $consulta->idConsulta)}}" method="post">
        @csrf
        @method('PUT')
        <div class="card-header"><h1 style="font-weight: bold;text-align:center">ENVÍO DE RESPUESTA</h1></div>
        <div class="card-body">
            <div class="form-group">
                <label for="nombre" style="float: left">De:</label>
                <input type="email" class="form-control" value="{{ Auth::User()->email }}" disabled required>

                <label for="correo" style="float: left">Para:</label>
                <input type="email" class="form-control" value="{{ $consulta->correo }}" disabled required>

                <label for="respuesta" style="float: left">Mensaje:</label>
                <textarea rows="5" class="form-control @error('texto') is-invalid @enderror" id="respuesta" name="respuesta" autofocus required></textarea>

                <label for="input_password" style="float: left">Contraseña del correo:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
        </div>
        <div class="card-footer" style="text-align:center">
          <button style="float:left" type="button" href="{{route('consulta.index')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Regresar</a>
          <button style="float:right" type="submit" class="btn btn-success"><i class="fas fa-eye"></i> Responder</button>
        </div>
      </form>
    </div>
</div>
@endsection
