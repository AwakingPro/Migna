<?php
include("../../../system/config.php");


$aviso2= $_POST["aviso2"];
 $id_2= $_POST["id_2"];
$aviso= $_POST["aviso"];
$proveedor= $_POST["proveedor"];
$fecha_contratacion= $_POST["fecha_contratacion"];
$fecha_expiracion=$_POST['fecha_expiracion'];
$comentario=$_POST['comentario'];
 



	
	if (1==1)
	{


		
$sql=mysql_query("UPDATE INT_avisos	 
SET aviso=	'$aviso' ,proveedor=	'$proveedor',fecha_contratacion=	'$fecha_contratacion',fecha_expiracion='$fecha_expiracion',comentario=	'$comentario' WHERE aviso='$aviso2' AND id='$id_2' ");
header("Location: avisos.php?id=3");
}


?>

