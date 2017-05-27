<?php
include("../../../system/config.php");
$id_2= $_POST["id_2"];
$estacion= $_POST["estacion"];
$direccion= $_POST["direccion"];
$contacto= $_POST["contacto"];
$telefono= $_POST["telefono"];
$correo= $_POST["correo"];
$fecha_proximo_pago= $_POST["fecha_proximo_pago"];
$comentario=$_POST['comentario'];
 



	
	if (1==1)
	{


		
$sql=mysql_query("UPDATE Pagos_Luz	 
SET estacion=	'$estacion' ,direccion=	'$direccion',contacto=	'$contacto',telefono='$telefono',correo=	'$correo',fecha_proximo_pago=	'$fecha_proximo_pago',comentario=	'$comentario' WHERE  id='$id_2' ");
header("Location: pagos_de_luz.php?id=3");
}


?>

