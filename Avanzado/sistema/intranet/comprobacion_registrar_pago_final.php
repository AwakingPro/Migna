<?php
include("../../../system/config.php");
$estacion= $_POST["estacion"];
$monto= $_POST["monto"];
$kw= $_POST["kw"];
$fecha_pago= $_POST["fecha_pago"];
$comentario= $_POST["comentario"];

header("Location: pagos_de_luz.php?id=5");

		 $sql3=mysql_query("INSERT INTO historial_pagos(estacion,monto,kw,fecha_pago,comentario) values ('$estacion','$monto','$kw','$fecha_pago','$comentario')");


?>

