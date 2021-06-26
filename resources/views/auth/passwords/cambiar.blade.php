@extends('home')

@section('contenido')

<style>
		.fondo {
   background: url("{{ asset('images/fondo.png') }}")no-repeat center center fixed  ;
   
}
		
		
		
		</style>

<div class="container-fluid fondo" style="background:white">

@if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

  <h2>Cambiar Contraseña</h2>

  <br> <br>
        
      <form method="POST" class="center-block" style="width:500px" action="{{ route('usuario.store') }}">
                        @csrf

                        <div class="form-group" align="center">
               
                <i class="fa fa-lock" style="font-size:100px;color:#337ab7"></i>
                
                </div>

                        <div class="form-group ">

                            <div class="input-group col-md-12">
                            <span class="input-group-addon "><i class="fa" >&#xf084;</i></span>
                                <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" 
                                placeholder="Contraseña Actual..." required autocomplete="old_password" autofocus>

                               
                            </div>
                            @error('old_password')
                                    <span class="invalid-feedback" role="alert" style="color:blue">
                                        {{ $message }}
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group ">

                            <div class="input-group col-md-12">
                            <span class="input-group-addon "><i class="fa" >&#xf023;</i></span>
                                <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" 
                                placeholder="Contraseña Nueva..." required autocomplete="new-password">

                            </div>
                            
                            @error('new_password')
                                    <span class="invalid-feedback" role="alert" style="color:blue">
                                        {{ $message }}
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group ">
                          

                            <div class="input-group col-md-12">
                            <span class="input-group-addon "><i class="fa" >&#xf023;</i></span>
                                <input id="password_confirm" type="password" class="form-control" name="password_confirm" 
                                placeholder="Confirmar Contraseña" required autocomplete="password_confirm">
                            </div>
                            @error('password_confirm')
                                    <span class="invalid-feedback" role="alert" style="color:blue">
                                        {{ $message }}
                                    </span>
                                @enderror

                        </div>

                        <div class="form-group ">
                            <div class="">
                                <button type="submit" class="btn btn-primary btn-md btn-block">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <br>
<br>
<br>
<br>
                    </div>

                    @endsection