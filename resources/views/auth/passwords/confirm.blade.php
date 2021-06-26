@extends('home')

@section('contenido')
<div class="container-fluid" style="background:white">
   
   <h2>Confirmar Contraseña</h2>
   <br><br>

                    <form method="POST" class="center-block" style="width:500px" action="{{ route('password.confirm') }}">
                        @csrf
                        <div class="form-group " align="center">
              
                <i class="fa fa-lock" style="font-size:100px;color:#5cb85c"></i>
            
                </div>
                        <h4 align="center">Confirme su contraseña para continuar</h4>
                        
                        <br>

                        <div class="form-group">
                            
                           
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                name="password" required autocomplete="current-password" placeholder="Contraseña...">

                                @error('password')
                                
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        {{ $message }}
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="row">
                                <div class="col">

                                    <div class="form-group col-md-12">
                                        
                                            <button type="submit" class="btn btn-success col-md-12">
                                            Confirmar
                                            </button>
                                    </div>
                                </div>

                                <!-- <div class="col">

                                    <div class="form-group col-md-6">

                                            <button type="" onClick="javascript: history.go(-1)" class="btn btn-primary col-md-12">
                                            Cancelar
                                            </button>
                                        
                                    
                                    </div>
                                </div> -->
                        </div>

                        <!-- <div class="form-group " align="center">
                            
                               @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                             
                            
                        </div> -->
                    </form>

                    <br>
<br>
<br>
<br>
<br>
        
</div>
@endsection
