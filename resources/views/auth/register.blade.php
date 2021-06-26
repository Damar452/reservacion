
            <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:400px" role="document">
    <div class="modal-content ">
      <div class="modal-header " style="background:#21a454; color:white">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Registrar Usuario</h4>
      </div>
      <div class="modal-body">
        
                <form method="POST" action="{{ route('register') }}" onsubmit="return validacion()">
                    <!--  App\Http\Controllers\Auth\RegisterController  -->
                    @csrf

                    <div class="form-group">
                    <div class="input-group">
                            <span class="input-group-addon "><i class="fa" >&#xf20a;</i></span>
                        <input id="identificacion" type="text"
                            class="form-control @error('identificacion') is-invalid @enderror" name="identificacion"
                            placeholder="Ingrese su identificacion..." required autocomplete="identificacion"
                             onblur="minimo();" onKeyPress="return soloNumeros(event)" autofocus>
                            
                       
                    </div>

                    <small id="ide" class="form-text text-danger" style="display:none;">Ingrese una identificacion valida...</small>
                    @error('identificacion')
                        <small class="invalid-feedback ide text-danger" role="alert" >
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                    

                    <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon" ><i class="fa" >&#xf2c3;</i></span>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        onblur="minimo();"  onKeyPress="return soloLetras(event)"  name="name" placeholder="Nombre y Apellidos..." required autocomplete="name" autofocus>

                       
                    </div>
                    <small id="named" class="form-text text-danger" style="display:none;">Debe ingresar como minimo un nombre y apellido...</small>
                    @error('name')
                        <small class="invalid-feedback text-danger" role="alert">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>

                    <div class="form-group">
                    <div class="input-group">
                            <span class="input-group-addon "><i class="fa" >&#xf003;</i></span>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" placeholder="Correo electronico..." required
                            autocomplete="email">

                     
                    </div>
                    @error('email')
                        <small class="invalid-feedback text-danger" role="alert">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>

                  <div class="form-group ">   <!-- has-success has-feedback -->
                    
                    <div class="input-group">
                        
                            <span class="input-group-addon "><i class="fa" >&#xf095;</i></span>
                        <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror"
                        onblur="minimo();" onKeyPress="return soloNumeros(event)"  name="telefono" placeholder="Telefono..." autofocus>

                        
                    </div>
                    <small id="tel" class="form-text text-danger" style="display:none;">Ingrese un telefono valido...</small>
                    @error('telefono')
                        <small class="invalid-feedback text-danger" role="alert">
                            {{ $message }}
                        </small>
                        @enderror
                    
                    </div>

                    <div class="form-group">
                    <div class="input-group">
                            <span class="input-group-addon "><i class="fa" >&#xf0c0;</i></span>
                        <select name="tipo" id="tipo" class="form-control" required>
                           <option value="">Usuario</option>
                            <option value="empleado">Empleado</option>
                            <option value="administrativo">Admistrativo</option>
                        </select>

                        <span class="input-group-addon "><i class="fa" >&#xf0f7;</i></span>
                            <select name="sede" id="sede" class="form-control col-md-11" required>
                                <option value="">Sedes</option>
                                <option value="sede_a">Sede A</option>
                                <option value="sede_b">Sede B</option>
                                <option value="sede_c">Sede C</option>
                                <option value="sede_d">Sede D</option>
                                <option value="sede_e">Sede E</option>
                            </select>

                        
                    </div>
                    @error('tipo')
                        <small class="invalid-feedback text-danger" role="alert" >
                            {{ $message }}
                        </small>
                        @enderror
                    </div>

                    <div class="form-group" id="divpassword">
                    <div class="input-group">
                            <span class="input-group-addon "><i class="fa" >&#xf084;</i></span>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            placeholder="Contraseña..." required autocomplete="new-password">
                    </div>
                    <small id="passwordHelp" class="form-text text-danger" style="display:none;">Minimo 8 caracteres...</small>
                    @error('password')
                        <small class="invalid-feedback text-danger" role="alert" >
                            {{ $message }}
                        </small>
                        @enderror
                   
                    </div>

                    <div class="form-group" id="confirmp">
                        <!-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label> -->
                        <div class="input-group">
                            <span class="input-group-addon "><i class="fa" >&#xf084;</i></span>

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            placeholder="Confirmar Contraseña" required autocomplete="new-password">
                    </div>
            
                    <small id="confirmHelp" class="form-text text-danger" style="display:none;">Las contraseñas no conciden...</small>
            
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success ">
                    Guardar
                </button>

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </form>






            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
// Solo permite ingresar numeros.
function soloNumeros(e){
	var key = window.Event ? e.which : e.keyCode
	return (key >= 48 && key <= 57)
}




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
          





function validacion() {
    var name = document.getElementById("name").value; 
      var Valido = /\s/;

    if ( document.getElementById("identificacion").value.length < 7) {
        document.getElementById("ide").style.display="block"

    return false;       

    } else if(!Valido.test(name) || document.getElementById("name").value.length < 7){ 
     
     document.getElementById("named").style.display="block"

     return false;

    } else if(document.getElementById("telefono").value.length < 7){ 
     
     document.getElementById("tel").style.display="block"

     return false;

    }else if (document.getElementById("password").value.length <= 7) {

   
    document.getElementById("passwordHelp").style.display="block"

   
    return false;

    } else if (document.getElementById("password").value != document.getElementById("password-confirm").value) {
   
    document.getElementById("confirmHelp").style.display="block"
   
    return false;
    } 

    return true;
    }



function minimo(){

    if ( document.getElementById("identificacion").value.length >= 7) {

        document.getElementById("ide").style.display="none"

    }

    var name = document.getElementById("name").value; 
    var Valido = /\s/;

    if(Valido.test(name) || document.getElementById("name").value.length >= 7){ 
     
       document.getElementById("named").style.display="none"
    }

    if ( document.getElementById("telefono").value.length >= 7) {

    document.getElementById("tel").style.display="none"

    }

    if (document.getElementById("password").value.length > 7) {

   
    document.getElementById("passwordHelp").style.display="none"


    }

}



</script>

