<?php
include("../../../system/config.php");

$cliente = $_POST["cliente"];
$alias = $_POST["alias"]; 
$rut = $_POST["rut"]; 
$servicio= $_POST["servicio"];
$descripcion= $_POST["descripcion"];
$fecha_habilitacion= $_POST["fecha_habilitacion"];



		
$sql2=mysql_query("UPDATE SP_servicio_otros 
SET servicio=	'$servicio' ,descripcion=	'$descripcion',fecha_habilitacion=	'$fecha_habilitacion' WHERE cliente='$cliente' AND alias='$alias' ");

header("Location: ver_clientes.php?cliente=$cliente&alias=$alias&rut=$rut&id=1");



?>

