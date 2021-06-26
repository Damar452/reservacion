@extends('home')

@section('contenido')



<div class="container-fluid" style="background:white">



@if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

  <h2>Configuraciones</h2>

  <br> <br>

                    <form class="center-block" style="width:500px" method="POST" action="{{ route('admin.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                    @csrf

                    <h3 align="center">Disponibilidad de Sedes</h3>
                    <br>

                  <div class="form-group">
                      <div class="input-group">
                      <span class="input-group-addon "><i class="fa" >&#xf0f7;</i></span>
                      <select name="sede" id="sede" class="form-control" required>
                        <option value="">Escoger Sede</option>
                        <option value="A">Sede A</option>
                        <option value="B">Sede B</option>
                        <option value="C">Sede C</option>
                        <option value="D">Sede D</option>
                        <option value="E">Sede E</option>
                        </select>
                        </div>
                  </div>

                  <br>

                      <div class="form-group">
                      <label for="file-upload" class=" btn btn-primary btn-lg btn-block" >
                          <i class="fa fa-cloud-upload" id="letras"> Subir excel</i>  <i id="info"></i>
                      </label>  

                      @error('archivo')
                                    <span class="invalid-feedback" role="alert" Style="color:red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        <input id="file-upload" onchange='cambiar()' type="file" style='display: none;' name="archivo" required/>
                      </div>
                      


                      <br>

                      <div class="form-group">
                      <button type="submit" class="btn btn-success btn-lg btn-block">Guardar</button>
                      </div>
                      
                      

                    </form>
<br>
<br>
<br>
<br>

                    </div>
  <script>
    function cambiar(){
    var pdrs = document.getElementById('file-upload').files[0].name;
    document.getElementById('info').innerHTML = pdrs;
    document.getElementById('letras').style.display = 'none';
}

  </script>

  @endsection