@extends('home')

@section('contenido')
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
  integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
<div class="container-fluid">
  <h2>Usuarios</h2>

 

  <form>
    @csrf
    <div class="input-group input-group-lg">
      <input type="search" name="search" class="form-control" placeholder="Buscar por Identificacion, Nombre, Tipo">
      <div class="input-group-btn">
        <button class="btn btn-success btn-lg" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
      </div>
    </div>
  </form>
  @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
            @endif
  
  @error('identificacion')
      <div class="alert alert-warning" >
       <strong>{{ $message }}</strong>
       <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
  @enderror

  @error('name')
      <div class="alert alert-warning" >
       <strong>{{ $message }}</strong>
       <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
  @enderror

  @error('email')
      <div class="alert alert-warning" >
       <strong>{{ $message }}</strong>
        </div>
  @enderror

  <!-- <button type="button" class="btn btn-primary new"  ><i class="fa fa-edit"></i></button> -->
  <!-- <a type="button" class="btn btn-primary "   href="{{ route('register') }}" ><i class="fa fa-user-plus" aria-hidden="true"></i></a> -->
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
    <i class="fa fa-user-plus" aria-hidden="true"></i>
    <br>
  </button>

<br>


  <table class="table">

    <thead class="thead-dark" style="background:#343a40;color:white">
   
      <tr>
      <br>
        <th>#</th>
        <th>Identificacion</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Telefono</th>
        <th>Tipo</th>
        <th>Sede</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
      <tbody>
        <!-- <input type="hidden" value="{{$a=1}}"> -->
        @forelse($users as $user)


        <tr>

          <td>{{ $loop->iteration }}</td>

          {{ $user['password'] == null}}
          <td><span id="identificacion{{$user['id']}}">{{ $user['identificacion']}}</span></td>
          <td><span id="name{{$user['id']}}">{{ $user['name']}}</span></td>
          <td><span id="email{{$user['id']}}">{{ $user['email']}}</span></td>
          <td><span id="telefono{{$user['id']}}">{{ $user['telefono']}}</span></td>
          <td><span id="tipo{{$user['id']}}">{{$user['tipo']}}</span></td>
          <td><span id="sede{{$user['id']}}">{{ $user['sede']}}</span></td>
          <td>
            <div class="btn-group">
              <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Editar</button> -->
              <!-- <input class="btn btn-primary" value="Editar" onclick="play();" type="button"> -->


              <form action="{{route('usuario.destroy', $user['id'])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-primary edit" value="{{$user->id}}"><i
                    class="fa fa-edit"></i></button>
                <button type="submit" class="btn btn-danger"
                  onclick="return confirm('confirmar, eliminar usuario!!!');"><i class="fa fa-trash-o"
                    aria-hidden="true"></i></button>

              </form>


            </div>
            @empty

          </td>


        </tr>



      </tbody>
    </div>

  </table>




  <div class="alert alert-info">
    <strong>No se encontraron resultados!!!</strong>
  </div>
  @endforelse

</div>



<script>





</script>



@endsection