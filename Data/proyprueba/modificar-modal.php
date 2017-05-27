<form id="actualizarDatos">
<div class="modal fade" id="dataUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Modificar Contacto:</h4>
      </div>
      <div class="modal-body">
			<div id="datos_ajax"></div>
      <div class="form-group">
      <input type="hidden" class="form-control" id="id" name="id">
          </div>    
			
		  <div class="form-group">
            <label for="nombre" class="control-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required maxlength="20">
          </div>
		  <div class="form-group">
            <label for="apellido" class="control-label">Apellido:</label>
            <input type="text" class="form-control" id="apellido" name="apellido" required maxlength="20">
          </div>
		  <div class="form-group">
            <label for="telefono" class="control-label">Telefono:</label>
            <input type="text" class="form-control" id="telefono" name="telefono" required maxlength="15"> 
          </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Actualizar datos</button>
      </div>
    </div>
  </div>
</div>
</form>