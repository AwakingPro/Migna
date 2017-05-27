<?php
include("../../../system/config.php");
$estacion= $_POST["estacion"];
$direccion= $_POST["direccion"];
$contacto= $_POST["contacto"];
$telefono= $_POST["telefono"];
$correo= $_POST["correo"];
$fecha_proximo_pago= $_POST["fecha_proximo_pago"];
$comentario= $_POST["comentario"];
header("Location: pagos_de_luz.php?id=5");

		 $sql3=mysql_query("INSERT INTO Pagos_Luz(estacion,direccion,contacto,telefono,correo,fecha_proximo_pago,comentario) values ('$estacion','$direccion','$contacto','$telefono','$correo','$fecha_proximo_pago','$comentario')");


?>

