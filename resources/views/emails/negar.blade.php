<!-- Modal -->
<div class="modal fade" id="negar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#d9534f; color:white">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

       
        <h4 class="modal-title">Rechazar Solicitud y Notificar</h4>
      </div>
      <div class="modal-body">
        
      <form method="POST" action="{{route('rechazadas.store')}}">
          @csrf
          <input type="hidden" id="nid" name="id">
          <div class="form-group">
         <strong> <i class="fa fa-address-card-o" >
          </i> Destinatario</strong>  <input id="nombre" type="text" class="form-control"  readonly required>
          </div>

          <div class="form-group">
         <strong> <i class="fa fa-envelope" >
          </i> Correo</strong>  <input id="correo" type="text" class="form-control"  readonly required>
          </div>

          <div class="form-group">
          <strong><i class="fa fa-edit" >
          </i> Mensaje</strong>
          <textarea  name="mensaje" class="form-control" id="mensaje"  rows="4"> </textarea>
          
          </div>
          
     
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Notificar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

      </form>

    </div>

 
  </div>
</div>