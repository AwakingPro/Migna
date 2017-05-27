<?php
$id_header=$_POST['id_header'];
$numero=$_POST['numero'];
$cliente=$_POST['cliente'];
if ($id_header==1)
    {
	header("Location: buscar_ticket.php");
	}
else if ($id_header==2) {
	header("Location: editar_registro.php?numero=$numero&cliente=$cliente");

	}
	else if ($id_header==3) {
	header("Location: ticket_nuevo.php");

	}
	else if ($id_header==4) {
	}
	else if ($id_header==5) {

	}
		else if ($id_header==6) {


	}
	else if ($id_header==7) {


	}
?>