<?php
include("../../../system/config.php");
$id_2= $_POST["id_2"];
$estacion= $_POST["estacion"];
$monto= $_POST["monto"];
$kw= $_POST["kw"];
$fecha_pago= $_POST["fecha_pago"];
$comentario=$_POST['comentario'];
 



	
	if (1==1)
	{


		
$sql=mysql_query("UPDATE historial_pagos	 
SET monto=	'$monto',kw=	'$kw',fecha_pago=	'$fecha_pago',comentario=	'$comentario' WHERE  id='$id_2' ");
header("Location: historial_pagos_de_luz.php?id=3&estacion=$estacion");
}


?>

