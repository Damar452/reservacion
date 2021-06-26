@extends('layouts.app')

@section('content')



<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <meta name="_token" content="{{ csrf_token() }}">
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Solicitud</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

        <!-- Styles -->



        <!-- <link href = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel = "stylesheet"> -->
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.min.js">
        </script>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

        <link
            href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css"
            rel="stylesheet">

        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js">
        </script>



    </head>

    <body>

        <div class="container"  >


            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
            @endif

            <div class="row" >

                        <form  method="POST" action="{{ route('reservas.store') }}" class="center-block" name="solicitud" >
                        <div class="col-md-6">
                            
                           <h3>Datos del Solicitante <a id="link" href="javascript:editar()"> <i class="fa fa-edit" id="confirmHelp" style="display:none; font-size:15px"></a></i></h3>

                            <br>
                    
                            <!--  App\Http\Controllers\Auth\RegisterController  -->
                            @csrf

                                    <div class="form-group" >
                                    <div class="input-group">
                                    <span class="input-group-addon"><i class="fa" >&#xf20a;</i></span>
                                        <input id="identificacion" type="text" 
                                            class="form-control"
                                            name="identificacion" value="{{ old('identificacion') }}"
                                            onblur="validacion1();"  placeholder="Identificacion..." required autocomplete="off"
                                            onKeyPress="return soloNumeros(event)" autofocus>
                                       
                                    
                                    </div>
                                    <small id="iden" class="form-text text-danger" style="display:none;">Ingrese una identificacion valida...</small>
                                    @error('identificacion')
                                        <small class="text-danger" style="display:block;" role="alert">
                                            {{ $message }}
                                        </small>

                                        @enderror
                                    </div>


                            <div class="form-group ">
                            <div class="input-group ">
                            <span class="input-group-addon" ><i class="fa" >&#xf2c3;</i></span>
                            
                                <input id="nombres" type="text"
                                    class="mayuscula form-control " name="nombres"
                                    onblur="validacion1();"    onKeyPress="return soloLetras(event)" placeholder="Nombres..." required
                                    autocomplete="off">

                              

                              
                            </div>
                            <small id="nom" class="form-text text-danger" style="display:none;">Ingresar Nombres validos...</small>

                            @error('nombres')
                                <small class="text-danger" style="display:block;" role="alert">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>

                            <div class="form-group" >
                            <div class="input-group">
                            <span class="input-group-addon" ><i class="fa" >&#xf2c3;</i></span>
                                <input id="apellidos" type="text"
                                    class=" mayuscula form-control" name="apellidos"
                                    onblur="validacion1();"   onKeyPress="return soloLetras(event)"  value="{{ old('apellidos') }}" placeholder="Apellidos..." required
                                    autocomplete="apellidos">

                               
                            </div>
                            <small id="ape" class="form-text text-danger" style="display:none;">Ingresar Apellidos validos...</small>
                            @error('apellidos')
                                <small class="text-danger" style="display:block;" role="alert">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            


                            <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon "><i class="fa" >&#xf095;</i></span>
                                <input id="telefono" type="text"
                                    class="form-control" name="telefono"
                                    onblur="validacion1();"    value="{{ old('telefono') }}" placeholder="numero de celular o telefono..." required
                                    autocomplete="off" onKeyPress="return soloNumeros(event)"  >

                            </div>
                            <small id="tel" class="form-text text-danger" style="display:none;">Ingresar Telefono valido...</small>
                            @error('telefono')
                                <small class="text-danger" style="display:block;" role="alert">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>

                            <div class="form-group" >
                            <div class="input-group">
                            <span class="input-group-addon "><i class="fa" >&#xf003;</i></span>
                                <input id="correo" type="email"
                                    class="form-control " name="correo"
                                    value="{{ old('correo') }}" placeholder="Correo..." required  autocomplete="off" >
                              

                            </div>
                            @error('correo')
                                <small class="text-danger" style="display:block;" role="alert">
                                   {{ $message }}
                                </small>
                                @enderror
                            </div>

                           

                            <div class="form-group">

                            <div class="input-group">
                           
                                            <span class="input-group-addon "><i class="fa" >&#xf19c;</i></span>
                                            <select name="facultad" id="facultad" class="form-control " required>
                                                <option value="">Facultad...</option>
                                                <option value="ciencias Administrativas">ciencias Administrativas</option>
                                                <option value="ciencias de la ingenieria">ciencias de la ingenieria</option>
                                                <option value="ciencias de la salud">ciencias de la salud</option>
                                                <option value="ciencias sociales">ciencias sociales</option>
                                            </select>
                               
                                </div>
                                @error('facultad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                
                            </div>
                            
                            <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon "><i class="fa" >&#xf0c0;</i></span>
                                <select name="tipo" id="tipo" class="form-control" required>
                                <option value="">Tipo De Usuario</option>
                                    <option value="estudiante">Estudiante</option>
                                    <option value="docente">Docente</option>
                                </select>
                            </div>

                            </div>
                            @error('tipo')
                                <small class="invalid-feedback" style="display:block;" role="alert">
                                    {{ $message }}
                                </small>
                                @enderror
                                </div>
                                
                                <div class="col-md-6">
                                <h3>Datos de Solicitud</h3>
                                <br>

                                <div class="form-group form-inline" id="div">
                                <div class="input-group" style="width:50%">
                                            <span class="input-group-addon "><i class="fa" >&#xf0f7;</i></span>
                                            <select name="sede" id="sede" class="form-control " required>
                                                <option value="">Escoger Sede...</option>
                                                <option value="sede_a">Sede A</option>
                                                <option value="sede_b">Sede B</option>
                                                <option value="sede_c">Sede C</option>
                                                <option value="sede_d">Sede D</option>
                                                <option value="sede_e">Sede E</option>
                                            </select>
                                </div>
                                <div class="input-group" style="width:50%">
                                <span class="input-group-addon "><i class="fa" >&#xf08d;</i></span>
                                            <select name="espacio" id="espacio" class="form-control " required>
                                                <option value="">Espacios...</option>
                                                <option value="salon">Salon</option>
                                                <option value="audiovisuales">Audiovisuales</option>
                                                <option value="sistemas">Sala de sistemas</option>
                                                <option value="laboratorio">Laboratorio</option>
                                                
                                            </select>
                                </div>
                                </div>

                                

                                
                                <div class="form-group">
                                        <div class="input-group">
                                        
                                        <span class="input-group-addon "><i class="fa">&#xf073;</i></span>
                                        
                                        <input name="fecha" id="fecha" class="datepicker form-control " type="text" required>
                                        
                                        
                                        </div>
                                        
                                </div> 

                                <div>

                                <div class="form-group form-inline">
                        
                                <div class="input-group " style="width:50%">
                                <span class="input-group-addon" ><i class="fa" style="color:green">&#xf017;</i></span>

                                <select class="form-control "  id="hora_inicio" name="hora_inicio" required>
                                    <option value="" selected>Escoger Hora Inicial</option>
                                    @foreach ($horas as $hora)
                                    <option value="{{$hora->id}}">{{date('g:i A',strtotime($hora->hora_inicio))}}</option>
                                    @endforeach
                                </select>
                                    </div>
                                    <div class="input-group" style="width:50%">
                                    <span class="input-group-addon" ><i class="fa" style="color:red">&#xf017;</i></span>
                                    <select class="form-control" id="hora_fin" name="hora_fin" required>
                                    
                                        <option value="" selected>Escoger Hora Fin...</option>
                                    
                                        
                                    </select>
                                    </div>
                                    </div>

                                    <div class="form-group">
                                    
                                 
                                    <textarea class="form-control" id="motivo" name="motivo" rows="3" style="height:65px" required
                                    placeholder="Motivos de la Solicitud..."
                                    ></textarea>

                                    
                                </div>

                                   
                                    </div>
                                      

                                        <div class="form-group" align="center" >
                                    
                                        {!! htmlFormSnippet() !!}

                                        @error('g-recaptcha-response')
                                            <span class="invalid-feedback" role="alert"  Style="display:block;color:red">
                                                <strong>{{ $message }}</strong>
                                            </span>

                                          
                                          
                                            
                                        @enderror
                                        </div>

                                        <br>
                                    </div>
                                   
                            <div class="col-md-12">
                           
                            <button type="submit" class="btn btn-success btn-lg btn-block" >Guardar Solicitud</button>
                            </div>
                         </form>

                    

                    
            </div>
        </div>
    </body>

</html>




<script>

$(document).ready(function(){
    $('#nombres').val("");
    $('#apellidos').val("");
    $('#telefono').val("");
    $('#correo').val("");
    $('#facultad').val("");
    $('#tipo').val("");
                  
});

 $(document).ready(function(){
    $('#identificacion').on('blur',function(){

$value=$(this).val();

$.ajax({
type : 'get',
url : '{{URL::to('search')}}',
data:{'search':$value},
success:function(data){

    if (data.length >= 0){
        for(var i= 0 ;i<data.length;i++)
                {
                    
                    $('#nombres').val(data[i].nombres).attr("readonly","readonly");
                    $('#apellidos').val(data[i].apellidos).attr("readonly","readonly");
                    $('#telefono').val(data[i].telefono).attr("readonly","readonly");
                    $('#correo').val(data[i].correo).attr("readonly","readonly");
                    $('#facultad').val(data[i].facultad).attr("disabled","disableds");
                    $('#tipo').val(data[i].tipo).attr("disabled","disabled");
                    $('#confirmHelp').css("display", "inline");
                    
                    
                   
                }
    } 
    
    if (data.length <= 0)  {

                    $('#nombres').val("").removeAttr("readonly");
                    $('#apellidos').val("").removeAttr("readonly");
                    $('#telefono').val("").removeAttr("readonly");
                    $('#correo').val("").removeAttr("readonly");
                    $('#facultad').val("").removeAttr("disabled");
                    $('#tipo').val("").removeAttr("disabled");
                    $('#confirmHelp').css("display", "none");

    }
  
  
}

});
});
});
</script>

<script type="text/javascript">

var date = new Date();
date.setDate(date.getDate() + 2);

var date2 = new Date();
date2.setDate(date2.getDate() + 7);

    $('.datepicker').datetimepicker({

format: 'YYYY-MM-DD',
daysOfWeekDisabled: [0, 0],
minDate: date,
maxDate: date2,
locale: 'es',



});



</script>






<script type="text/javascript">

var array= @json($horas);

$("#hora_inicio").change(function () {

        document.getElementById("hora_fin").innerHTML ="";
        $("#hora_inicio option:selected").each(function () {

               id = $(this).val();
    
                for(var i= id-1 ;i<array.length;i++)
                {
                    
                      var timeString12hr = new Date('1970-01-01T' + array[i].hora_fin + 'Z')
                      .toLocaleTimeString('en-US',
                        {timeZone:'UTC',hour12:true,hour:'numeric',minute:'numeric'}
                        
                    );
                document.getElementById("hora_fin").innerHTML += "<option value='"+array[i].id+"'>"+timeString12hr+"</option>"; 
                }
                  
        });
       
    });

</script>






<script type="text/javascript">
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

</script>


<script type="text/javascript">

// Solo permite ingresar numeros.
function soloNumeros(e){
	var key = window.Event ? e.which : e.keyCode
	return (key >= 48 && key <= 57)
}




</script>

<script>


	  //Validar las cajas de texto...
      
      function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
          


</script>

<script>

function editar(){
    $('#identificacion').attr("readonly","readonly");
    $('#telefono').removeAttr("readonly");
     $('#correo').removeAttr("readonly");
     $('#link').attr('href','javascript:cancelar()');
}

function cancelar(){
    $('#identificacion').removeAttr("readonly");
    $('#telefono').attr("readonly","readonly");
     $('#correo').attr("readonly","readonly");
     $('#link').attr('href','javascript:editar()');
  
     
}



</script>



<script>
function validacion1() {

    if(document.getElementById("identificacion").value.length > 0 && document.getElementById("identificacion").value.length < 7){ 
        document.getElementById("iden").style.display="block";

        return false;

       } else if( document.getElementById("identificacion").value.length >= 7){ 
        document.getElementById("iden").style.display="none";
        

       }
        if(document.getElementById("nombres").value.length > 0 && document.getElementById("nombres").value.length < 3){ 
        document.getElementById("nom").style.display="block";

       }else if( document.getElementById("nombres").value.length >= 3){ 
        document.getElementById("nom").style.display="none";
   
       }
       
        if(document.getElementById("apellidos").value.length > 0 && document.getElementById("apellidos").value.length < 4){ 
        document.getElementById("ape").style.display="block";

       }else if( document.getElementById("apellidos").value.length >= 3){ 
        document.getElementById("ape").style.display="none";
   
       }

       if(document.getElementById("telefono").value.length > 0 && document.getElementById("telefono").value.length < 7){ 
        document.getElementById("tel").style.display="block";

       }else if( document.getElementById("telefono").value.length >= 7){ 
        document.getElementById("tel").style.display="none";
   
       }









}

</script>


@endsection