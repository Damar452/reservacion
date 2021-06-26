
<!-- Modal -->
<div class="modal fade" id="rechazadaver" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:620px" role="document">
    <div class="modal-content">
      <div class="modal-header " style="background:#337ab7; color:white">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Ver Solicitud Rechazada...</h4>
      </div>
      <div class="modal-body">
        
      <label class="list-group-item list-group-item-info"><i class="fa fa-address-card-o" ></i> Identificacion: <span id="ride"></span></label>
      <label class="list-group-item list-group-item-info"> <i class="fa fa-user" ></i> <span id="rnombre"></span>&nbsp; &nbsp; &nbsp; &nbsp; Tipo: <span id="rtipo"></span></label>
      <label class="list-group-item list-group-item-info"><i class="fa fa-phone" ></i> Telefono: <span id="rtelefono"> </span>  &nbsp; &nbsp; &nbsp; &nbsp;<i class="fa fa-envelope" ></i> Correo: <span id="rcorreo"></span></label>
      <br>
      <label class="list-group-item list-group-item-success"><i class="fa fa-building" ></i> Sede: <span id="rsede"> </span>&nbsp; &nbsp; &nbsp; &nbsp;
      <i class="fa fa-thumb-tack" ></i> Espacio: <span id="respacio"> 
      </span>&nbsp; &nbsp; &nbsp; &nbsp;
      <i class="fa fa-institution" ></i>  Facultad: <span id="rfacultad"></span></label>
      <label class="list-group-item list-group-item-success"><i class="fa fa-calendar" ></i> <span id="rfecha"> 12/12/2024 </span>
      &nbsp; &nbsp; &nbsp; <i class="fa fa-clock-o" ></i> 
      <span id="rhorai"> 12:30 PM  </span> -- <span id="rhoraf">2:30 PM</span></label>

      <label class="list-group-item list-group-item-success">Motivo de Solicitud:  <span id="rmotivo"> </span></label>
      <br>
      <label class="list-group-item list-group-item-danger" >Motivo de rechazo:  <span  id="rmensaje" > </span></label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>