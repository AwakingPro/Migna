<form id="guardarDatos">
<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Agregar Contacto</h4>
      </div>
      <div class="modal-body">
			<div id="datos_ajax_register"></div>
		  <div class="form-group">
            <label for="nombre0" class="control-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre0" name="nombre" required maxlength="20">
          </div>
		  <div class="form-group">
            <label for="apellido0" class="control-label">Apellido:</label>
            <input type="text" class="form-control" id="apellido0" name="apellido" required maxlength="20">
          </div>
		  <div class="form-group">
            <label for="telefono0" class="control-label">Telefono:</label>
            <input type="text" class="form-control" id="telefono0" name="telefono" required maxlength="15"> 
          </div>
		      
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar datos</button>
      </div>
    </div>
  </div>
</div>
</form>