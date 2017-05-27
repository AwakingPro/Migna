<?php
include("../../../system/config.php");


$aviso= $_POST["aviso"];
$proveedor= $_POST["proveedor"];
$fecha_expiracion= $_POST["fecha_expiracion"];

//El nuevo valor de la variable: $fecha2="20-10-2008"


$fecha_contratacion= $_POST["fecha_contratacion"];

$comentario= $_POST["comentario"];



$sql=mysql_query("SELECT * FROM INT_avisos WHERE aviso='$aviso'");

if (mysql_num_rows($sql)>0)
{
header("Location: crear_aviso.php?id=2&rut=$rut");
} else  if (mysql_num_rows($sql)==0){
header("Location: avisos.php?id=10");


		 $sql3=mysql_query("INSERT INTO INT_avisos(aviso,fecha_expiracion,fecha_contratacion,proveedor,comentario) values ('$aviso','$fecha_expiracion','$fecha_contratacion','$proveedor','$comentario')");

}



?>

