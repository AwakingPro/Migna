<?php

	include("conexion.php");

	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['id'])) {
           $errors[] = "ID vacío";
		} else if (empty($_POST['nombre'])){
			$errors[] = "Nombre vacío";
		} else if (empty($_POST['apellido'])){
			$errors[] = "Apellido vacío";
		} else if (empty($_POST['telefono'])){
			$errors[] = "Telefono vacío";
		}   else if (
			!empty($_POST['id']) && 
			!empty($_POST['nombre']) &&
			!empty($_POST['apellido']) &&
			!empty($_POST['telefono'])
			
		){

		// escaping, additionally removing everything that could be (html/javascript-) code
		$nombre=mysqli_real_escape_string($conexion,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$apellido=mysqli_real_escape_string($conexion,(strip_tags($_POST["apellido"],ENT_QUOTES)));
		$telefono=mysqli_real_escape_string($conexion,(strip_tags($_POST["telefono"],ENT_QUOTES)));
		$id=intval($_POST['id']);
		$sql="UPDATE contactos SET  nombre='".$nombre."',
		apellido='".$apellido."', telefono='".$telefono."'	WHERE id='".$id."'";
		$query_update = mysqli_query($conexion,$sql);
			if ($query_update){
				$messages[] = "Los datos han sido actualizados satisfactoriamente.";
			} else{
				$errors []= "Error al actualizar intenta nuevamente.".mysqli_error($conexion);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Mensaje!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>