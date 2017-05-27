<?php

require("../../../system/config.php");

$serial2= $_POST["serial2"];
$mac2= $_POST["mac2"];
$serial= $_POST["serial"];
$mac= $_POST["mac"];
$tipo= $_POST["tipo"];
$marca= $_POST["marca"];
$modelo= $_POST["modelo"];
$proveedor= $_POST["proveedor"];
$bodega= $_POST["bodega"];
$factura= $_POST["factura"];
$estado= $_POST["estado"];



$sql=mysql_query("SELECT mac FROM INV_activos WHERE mac='$mac' AND NOT mac='$mac2'");

if (mysql_num_rows($sql)>0)
{
	 
header("Location: inventario_editar_activos_dup.php?mac=$mac");



} else {
	
$sql2=mysql_query("UPDATE INV_activos	 
SET serial=	'$serial' ,mac=	'$mac',tipo='$tipo',marca=	'$marca' ,modelo=	'$modelo',proveedor='$proveedor',bodega=	'$bodega' ,factura=	'$factura' WHERE serial='$serial2' or mac='$mac2' ");

$sql3=mysql_query("UPDATE SP_dato_cliente	 
SET mac_su=	'$mac'  WHERE  mac_su='$mac2' ");

$sql4=mysql_query("UPDATE SP_dato_cliente	 
SET mac_router=	'$mac'  WHERE  mac_router='$mac2' ");

$sql4=mysql_query("UPDATE INT_radio_planning	 
SET mac=	'$mac'  WHERE  mac='$mac2' ");


header("Location: inventario_editar_activos.php?mac=$mac&serial=$serial&id=1");

}
?>