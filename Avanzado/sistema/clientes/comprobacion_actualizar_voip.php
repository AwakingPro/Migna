<?php
include("../../../system/config.php");

$cliente = $_POST["cliente"];
$alias = $_POST["alias"]; 
$rut = $_POST["rut"]; 
$linea1= $_POST["linea1"];
$linea2= $_POST["linea2"];
$linea3= $_POST["linea3"];
$linea4=$_POST['linea4'];
$plan=$_POST['plan'];
$fecha_inst= $_POST["fecha_inst"];
$mac=$_POST['mac'];


		
$sql2=mysql_query("UPDATE SP_servicio_voip	 
SET linea1=	'$linea1' ,linea2=	'$linea2',linea3=	'$linea3',linea4='$linea4',plan=	'$plan' ,fecha_inst=	'$fecha_inst',mac='$mac' WHERE cliente='$cliente' AND alias='$alias' ");

header("Location: ver_clientes.php?cliente=$cliente&alias=$alias&rut=$rut&id=1");



?>

