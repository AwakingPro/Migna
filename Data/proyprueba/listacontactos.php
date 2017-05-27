<?php

	# conectare la base de datos
    include("conexion.php");

	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		
		$query = mysqli_query($conexion,"SELECT * FROM contactos ");
		$num = 1;
		if ($num>0){
			?>
		<table class="table table-bordered">
			  <thead>
				<tr>
				  <th>Id</th>
				  <th>Nombre</th>
				  <th>Apellido</th>
				  <th>Telefono</th>
				  <th>Acciones</th>
				</tr>
			</thead>
			<tbody>
			<?php
			while($row = mysqli_fetch_array($query)){
				?>
				<tr>
					<td><?php echo $row['id'];?></td>
					<td><?php echo $row['nombre'];?></td>
					<td><?php echo $row['apellido'];?></td>
					<td><?php echo $row['telefono'];?></td>
					
					<td>
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#dataUpdate" data-id="<?php echo $row['id']?>" data-nombre="<?php echo $row['nombre']?>" data-apellido="<?php echo $row['apellido']?>" data-telefono="<?php echo $row['telefono']?>" <i class='glyphicon glyphicon-edit'></i> Modificar</button>
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $row['id']?>"  ><i class='glyphicon glyphicon-trash'></i> Eliminar</button>
					</td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
		<div class="table-pagination pull-right">
		
		</div>
		
			<?php
			
		} else {
			?>
			<div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>Aviso!!!</h4> No hay datos para mostrar
            </div>
			
			<?php
		}
	}
?>