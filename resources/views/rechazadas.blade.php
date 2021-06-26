@extends('home')

@section('contenido')
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
  integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
<div class="container-fluid">
  <h2>Rechazadas</h2>




  <br>


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
        <th>Espacio</th>
        <th>Hora inicial</th>
        <th>Hora final</th>
        <th>ver</th> 
      </tr>
    </thead>

    <tbody>
      @forelse ($rechazadas as $datos)

      <tr>
        <td><span> {{$loop->iteration}}</span></td>
        <input type="hidden" id="identificacionr{{$datos->id}}" value="{{ $datos->identificacion }}">
        <td><span id="nombresr{{$datos->id}}">{{ucfirst ($datos->nombres) }} {{ucfirst ($datos->apellidos) }}</span></td>
        <input type="hidden" id="telefonor{{$datos->id}}" value="{{ $datos->telefono}}">
        <input type="hidden" id="correor{{$datos->id}}" value="{{ $datos->correo}}">
        <td><span id="fechar{{$datos->id}}"> <?php
        setlocale(LC_TIME, 'es');
       echo \Carbon\Carbon::parse($datos->fecha)->formatLocalized('%A %d de %B de %Y')
        ?></span></td>
        <td><span id="seder{{$datos->id}}"> {{$datos->sede}}</span></td>
        <td><span id="espacior{{$datos->id}}"> {{$datos->espacio}}</span></td>
        <td><span id="horair{{$datos->id}}" > {{date('g:i A',strtotime($datos->hora_inicio))}}</span></td>
        <td><span id="horafr{{$datos->id}}">{{date('g:i A',strtotime($datos->hora_fin))}}</span></td>
        <input type="hidden" id="facultadr{{$datos->id}}" value="{{ $datos->facultad}}">
        <input type="hidden" id="tipor{{$datos->id}}" value="{{ucfirst($datos->tipo)}}">
        <input type="hidden" id="motivor{{$datos->id}}" value="{{ $datos->motivo}}">
        <input type="hidden" id="mensajer{{$datos->id}}" value="{{ $datos->mensaje}}">
        <td>
          <form>
            <button type="button" value="{{$datos->id}}" class="btn btn-primary rechazada_ver" ><i
                class="fa fa-eye" aria-hidden="true"></i></button>
          </form>
        </td> 
        @empty
      </tr>
      
    </tbody>
  
</table>

<div class="alert alert-warning">
    <strong>No se encontraron resultados!!!</strong>
  </div>
  @endforelse
</div>
@endsection