
  <div class="modal fade bd-example-modal-lg" id="pedidos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="exampleModalLabel">Nuevo Pedido</h4>
        </div>
        <div class="modal-body">

          <form method="post">
          <div class="row">
            <div class="col-md-6">  
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Cantidad de Invitados</label>
                <input type="text" class="form-control" id="recipient-name" name="invitado" required="">
              </div>
            </div>
               <div class="col-md-6">  
             <div class="form-group">
              <label for="recipient-name" class="form-control-label">e-mail</label>
              <input type="text" class="form-control" id="recipient-name" name="email" required="">
            </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6"> 
             <div class="form-group">
              <label for="recipient-name" class="form-control-label">Telefono de Contacto:</label>
              <input type="text" class="form-control" id="recipient-name" name="nrocelu" required="">
            </div>
            </div>
            <div class="col-md-6"> 
             <div class="form-group">
              <label for="recipient-name" class="form-control-label">Fecha Reserva (18/12/2020):</label>
              <input type="date" class="form-control" id="recipient-name" name="fecha" required="">
            </div>
            </div>
            </div>
             <div class="row">
                <div class="col-md-6"> 
             <div class="form-group">
              <label for="recipient-name" class="form-control-label">Hora de Reserva (22:00):</label>
              <input type="text" class="form-control" id="recipient-name" name="hora" required="">
            </div>
            </div>
              <!-- <div class="col-md-6"> 
                <div class="form-group">
                  <label for="message-text" class="form-control-label">Observaciones:</label>
                    <textarea class="form-control" id="message-text" name="observaciones" required="">Sin Restricciones</textarea>
                </div>
              </div> -->
            <input type="hidden" name="idpedi" value="<?php echo $_SESSION['invitado']; ?>">
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="agregar">Agregar Reserva</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php  
$registrar = new PedidosController();
$registrar->agregarPedidosController();
?>