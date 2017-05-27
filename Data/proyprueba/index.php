<?php  



?>
<!DOCTYPE html>
<html>
<head>

 <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script>

<title>Agenda</title>

</head>
<body>
<?php include("agregar-modal.php"); ?>
<?php include("modificar-modal.php");?>
<?php include("eliminar-modal.php");?>

<div class="container-fluid">
	 
		<div class='col-xs-6'>	
			<h3> Listado de Contactos</h3>
		</div>
		<div class='col-xs-6'>
			<h3 class='text-right'>		
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#dataRegister"><i class='glyphicon glyphicon-plus'></i> Agregar</button>
			</h3>
		</div>	
		
	  <div class="row">
		
		
		
		<div class="col-xs-12">
		<div id="loader" class="text-center"> <img src="loader.gif"></div>
		<div class="datos_ajax_delete"></div><!-- Datos ajax Final -->
		<div class="outer_div"></div><!-- Datos ajax Final -->
		</div>
	  </div>
	</div>
	
<script src="js/misfunciones.js"></script>
	<script>
		$(document).ready(function(){
			load(1);
		});
	</script>

<script>
//	$(document).ready(function() {
//		$('#tableres').dataTable( {
//		 "paging": true,
//		 "searching": false,
//		 "aProcessing": true,
//		 "aServerSide": true,
//		"ajax": "mostrardatos.php",
//			"columns":[
//			{"data":"id"},
//			{"data":"nombre"},
//			{"data":"apellido"},
//			{"data":"telefono"}
//			]
//		} 
//			
//		);
//	} );
</script>


</body>
</html>