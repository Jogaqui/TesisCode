@extends('layouts.plantilla')

@section('contenido')
<div class="container" align="center">
  <div class="card text-white bg-dark mb-3" style="max-width: 50rem; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif !important;">
      <form action="{{route('consulta.update', $consulta->idConsulta)}}" method="post">
        @csrf
        @method('PUT')
        <div class="card-header"><h1 style="font-weight: bold;text-align:center">RESPUESTA CONSULTA N° {{$consulta->idConsulta}}</h1></div>
        <div class="card-body">
            <div class="form-group">
                <label for="nombre" style="float: left">De:</label>
                <input type="email" class="form-control" value="{{ Auth::User()->usu_email }}" disabled>

                <label for="correo" style="float: left">Para:</label>
                <input type="email" class="form-control" value="{{ $consulta->correo }}" disabled>

                
                <label for="correo" style="float: left">Consulta:</label>
                <textarea readonly rows="2" class="form-control @error('texto') is-invalid @enderror" id="Mensaje" name="Mensaje">{{$consulta->mensaje}}</textarea>

                <label for="respuesta" style="float: left">Respuesta:</label>
                <textarea rows="4" class="form-control @error('texto') is-invalid @enderror" id="respuesta" name="respuesta" autofocus required></textarea>

                <hr>
                <label for="input_password" style="float: left; color: #ffb606">Contraseña del correo:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
        </div>
        <div class="card-footer" style="text-align:center">
          <a style="float:left" type="button" href="{{route('cancelarC')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Regresar</a>
          <button style="float:right" type="submit" class="btn btn-warning"><i class="fas fa-envelope"></i> Enviar email</button>
        </div>
      </form>
    </div>
</div>
@endsection
