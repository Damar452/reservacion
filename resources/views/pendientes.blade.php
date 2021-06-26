@extends('home')

@section('contenido')
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
  integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
<div class="container-fluid">
  <h2>Pendientes</h2>


  <br>
  @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
            @endif

  <!-- <button type="button" class="btn btn-primary new"  ><i class="fa fa-edit"></i></button> -->
  <!-- <a type="button" class="btn btn-primary "   href="{{ route('register') }}" ><i class="fa fa-user-plus" aria-hidden="true"></i></a> -->
  <!-- <a type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" >
          <i class="fa fa-user-plus" aria-hidden="true"></i>
          </a> -->

  <table class="table">
    <thead class="thead-dark" style="background:#4A4D50;color:white">
      <tr>
        <th>#</th>
        <th>Solicitante</th>
        <th>Fecha</th>
        <th>Sede</th>
        <th>Espacio Sol.</th>
        <th>Hora Inicial</th>
        <th>Hora Final</th>
        <th>Aprobar</th>
        <th>Rechazar</th>
        <th>Ver</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($pendientes as $datos)
      <tr>
        <td><span> <strong> {{$loop->iteration}} </strong></span></td>
        <input type="hidden" id="identificacion{{$datos->id}}" value="{{ $datos->identificacion }}">
        <td><span id="nombre{{$datos->id}}">{{ucfirst ($datos->nombres) }} {{ucfirst ($datos->apellidos) }}</span></td>
        <input type="hidden" id="telefono{{$datos->id}}" value="{{ $datos->telefono}}">
        <input type="hidden" id="correo{{$datos->id}}" value="{{ $datos->correo}}">
        <td><span  id="fecha{{$datos->id}}" value="{{ $datos->fecha}}" > <?php
        setlocale(LC_TIME, 'es');
       echo \Carbon\Carbon::parse($datos->fecha)->formatLocalized('%A %d de %B de %Y')
        ?> </span> </td>
        <td><span  id="sede{{$datos->id}}" >{{ $datos->sede}} </span> </td>
        <td><span  id="espacio{{$datos->id}}" >{{ $datos->espacio}} </span> </td>
        <input type="hidden" id="facultad{{$datos->id}}" value="{{ $datos->facultad}}">
        <input type="hidden" id="tipo{{$datos->id}}" value="{{ucfirst($datos->tipo)}}">
        <td><span id="hora_inicio{{$datos->id}}" >{{date('g:i A',strtotime($datos->hora_inicio))}}</span></td>
        <td><span id="hora_fin{{$datos->id}}" >{{date('g:i A',strtotime($datos->hora_fin))}}</span></td>
        <input type="hidden" id="motivo{{$datos->id}}" value="{{ $datos->motivo}}">
        <td>
         <form method="GET" action="{{ route('pendientes.show', $datos->id) }}">  
            <button type="submit" class="btn btn-success" >
            <i class="fa fa-check-square-o" aria-hidden="true"></i></button>
          </form>
        </td>
        <td>
          <form>
            <button type="button" class="btn btn-danger negar" value="{{$datos->id}}" ><i
                class="fa fa-trash-o" aria-hidden="true"></i></button>
          </form>
        </td>
        <td>
          <form>
            <button type="button" class="btn btn-primary ver" value="{{$datos->id}}"><i class="fa fa-eye"
                aria-hidden="true"></i></button>
          </form>

          @empty
        </td>
      </tr>
     
    </tbody>

</div>
</table>
<div class="alert alert-warning" role="alert">
    <strong>No se encontraron resultados!!!</strong>
  </div>
  @endforelse

</div>
@endsection