<?php
$id_header=$_POST['id_header'];
$cliente=$_POST['cliente'];
$rut=$_POST['rut'];
$alias=$_POST['alias'];
if ($id_header==1)
    {
	header("Location: clientes.php");
	}
else if ($id_header==2) {
	header("Location: ver_clientes.php?cliente=$cliente&alias=$alias&rut=$rut");

	}
	else if ($id_header==3) {
	header("Location: clientes_com_busqueda.php");

	}
	else if ($id_header==4) {
	header("Location: ver_datos_com.php?cliente=$cliente");
	}
	else if ($id_header==5) {
	header("Location: clientes_busqueda_ingreso_dato_tecnico.php");

	}
		else if ($id_header==6) {
				header("Location: crear_clientes.php");


	}
	else if ($id_header==7) {
				header("Location: clientes_ingreso_dato_tecnico.php?cliente=$cliente");


	}
?>