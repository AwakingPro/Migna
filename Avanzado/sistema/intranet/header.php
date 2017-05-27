<?php
$id_header=$_POST['id_header'];
$estacion=$_POST['estacion'];
if ($id_header==1)
    {
	header("Location: crear_pago.php");
	}
else if ($id_header==2) {
		header("Location: pagos_de_luz.php");

	}
	else if ($id_header==3) {
		header("Location: pagos_de_luz.php");

	}
	else if ($id_header==4) {
		header("Location: historial_pagos_de_luz.php?estacion=$estacion");

	}
	else if ($id_header==5) {
		header("Location: avisos.php");

	}
		else if ($id_header==6) {
		header("Location: crear_aviso.php");

	}
?>