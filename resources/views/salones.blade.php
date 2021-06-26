@extends('home')

@section('contenido')

<div class="container-fluid">
  <h2>Espacios Disponibles</h2><br>

  <div class="row">

  <div class="col-md-6 col-md-offset-3" >
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Salon</th>
            <th>Accion</th>
        </tr>
    </thead>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <tbody>
 
            @foreach($salones as $datos)

            <tr>

                <td><strong>{{ $loop->iteration }}</strong></td>
                <td><strong> {{ $datos }} <i style="font-size:20px" class="fa"> &#xf124;</i></strong></td>

                <td><span>

                        <form action="{{ route('pendientes.update', $datos)}}" method="POST">
                        @csrf
                        @method('PUT')

                         <input type="hidden"  value="{{$salon}}" name="salon">
                         <input type="hidden"  value="{{$idsolicitud}}" name="idsolicitud">
                         
                            <button class="btn btn-success" type="submit" name="ides" value="{{json_encode($ides,TRUE)}}">
                            <i  class="fa">&#xf00c; Asignar</i></button>

                        </form> 
                        
                </span></td>


            </tr>
            @endforeach


        </tbody>

      
     
    </div>

</table>
</div>
</div>
<a href="javascript: history.go(-1)" class="btn btn-success " type="submit" name="ides" >
<i style="font-size:20px" class="fa">&#xf112;</i></a>

</div>

@endsection