@extends('layouts.app')

@section('content')

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<div class="container">
    <div class="row justify-content-center">
    
        <div class="col-md-6">
        <br>
            <div class="">
                

                <div class="card-body">
                <br>
                <div class="form-group row" >
                <div class="center-block" >
                <i class="fa fa-user-circle" style="font-size:100px;color:#5cb85c"></i>
                </div>
                </div>
                
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                        
                        
                            <div class="col-md-8 offset-md-2">
                            <div class="input-group">
                            <span class="input-group-addon "><i class="fa"  style="color:green" >&#xf20a;</i></span>
                                <input id="identificacion" type="text" class="form-control " name="identificacion" value="{{ old('identificacion') }}" required autocomplete="identificacion" placeholder="Ingrese su Identificacion..." autofocus>
                                </div>
                                @error('identificacion')
                                    <small class="text-danger" style="display:block;" role="alert">
                                      {{ $message }}
                                    </small>
                                @enderror
                            
                        </div>
                        </div>

                        <div class="form-group row">
                           

                            <div class="col-md-8 offset-md-2">
                            <div class="input-group">
                            <span class="input-group-addon "><i class="fa" style="color:green">&#xf084;</i></span>
                                <input id="password" type="password" class="form-control" name="password"  placeholder="Ingrese su Contraseña..." required autocomplete="current-password">
                                </div>
                                @error('password')
                                    <small class="text-danger" style="display:block;" role="alert">
                                        {{ $message }}
                                    </small>
                                @enderror
                            
                        </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember" style="color:#5cb85c">
                                    &nbsp; &nbsp;&nbsp;Recordarme
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-success btn-block">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link btn-block" href="{{ route('password.request') }}" style="color:green">
                                        {{ __('¿Olvidaste tu Contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
