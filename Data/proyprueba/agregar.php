<?php
	# conectare la base de datos
include("conexion.php");
    
	/*Inicia validacion del lado del servidor*/
	 if (empty($_POST['nombre'])){
			$errors[] = "Nombre vacío";
		} else if (empty($_POST['apellido'])){
			$errors[] = "Apellido vacío";
		} else if (empty($_POST['telefono'])){
			$errors[] = "Telefono vacío";
		} else if (
			!empty($_POST['nombre']) &&
			!empty($_POST['apellido']) &&
			!empty($_POST['telefono'])
			
		){

		// escaping, additionally removing everything that could be (html/javascript-) code
		$nombre=mysqli_real_escape_string($conexion,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$apellido=mysqli_real_escape_string($conexion,(strip_tags($_POST["apellido"],ENT_QUOTES)));
		$telefono=mysqli_real_escape_string($conexion,(strip_tags($_POST["telefono"],ENT_QUOTES)));
		
		$sql="INSERT INTO contactos (nombre, apellido, 	telefono ) VALUES ('".$nombre."','".$apellido."', '".$telefono."')";
		$query_update = mysqli_query($conexion,$sql);
			if ($query_update){
				$messages[] = "Los datos se guardaron de manera Exitosa.";
			} else{
				$errors []= "Error al guardar, intente nuevamente.".mysqli_error($conexion);
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
						<strong>Mensaje</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>