<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <!-- modal editar -->
  <div class="modal-dialog" style="width:400px" role="document">
    <div class="modal-content ">
      <div class="modal-header" style="background:#337ab7; color:white">
        <h5 class="modal-title navbar-brand" id="exampleModalLabel">Modificar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('usuario.update','id')}}">
          @csrf
          @method('PUT')

          <input type="hidden" name="id" id="id">

          <div class="form-group">
            <label class="col-form-label">Identificacion:</label>
            <input type="text" class="form-control" id="midentificacion" name="uidentificacion" 
            onKeyPress="return soloNumeros(event)" required readonly> 
          </div>

          <div class="form-group">
            <label  class="col-form-label">Nombre:</label>
            <input onblur="validacion1();"  onKeyPress="return soloLetras(event)" type="text" class="form-control" id="mname" name="uname" required>
            <small id="mnamed" class="form-text text-danger" style="display:none;">Debe ingresar como minimo un nombre y apellido</small>
          </div>

          <div class="form-group">
            <label  class="col-form-label">Email:</label>
            <input type="email" class="form-control" id="memail" name="uemail" required>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Telefono:</label>
            <input onblur="validacion1();"  type="text" onKeyPress="return soloNumeros(event)" class="form-control" id="mmtelefono" name="uutelefono" required>
            <small id="mtel" class="form-text text-danger" style="display:none;">Minimo 7 digitas...</small>
          </div>

          <div class="form-group">
            <select name="mmtipo" id="mmtipo" class="form-control">
              <option value="empleado">Empleado</option>
              <option value="administrativo">Administrativo</option>
            </select>
          </div>

          <div class="form-group">
            <select name="mmsede" id="mmsede" class="form-control">
              <option value="sede_a">Sede A</option>
              <option value="sede_b">Sede B</option>
              <option value="sede_c">Sede C</option>
              <option value="sede_d">Sede D</option>
              <option value="sede_e">Sede E</option>
            </select>
          </div>


          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>

        </form>
      </div>

    </div>
  </div>
</div>


<script>
function validacion1() {
    var name = document.getElementById("mname").value; 
      var Valido = /\s/;

    if(!Valido.test(name) || document.getElementById("mname").value.length < 7){ 
     
     document.getElementById("mnamed").style.display="block"


    }
     if(Valido.test(name) || document.getElementById("mname").value.length >= 7){ 
     
     document.getElementById("mnamed").style.display="none"

    } 
  
  
  if(document.getElementById("mmtelefono").value.length < 7){ 
     
     document.getElementById("mtel").style.display="block"



    } 
    
    if ( document.getElementById("mmtelefono").value.length >= 7) {

      document.getElementById("mtel").style.display="none"

    }


    }



</script>