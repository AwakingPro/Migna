<?php

require("../../../system/config.php");
$cliente= $_POST["cliente"];
$rut= $_POST["rut"];
$alias= $_POST["alias"];
$mac_antigua= $_POST["mac_antigua"];



if (isset($_POST['modificar']))
{
header("Location: modificar.php?cliente=$cliente&alias=$alias");
}
if (isset($_POST['eliminar']))
{
	
$insertar=mysql_query("INSERT INTO INV_activos_paso (serial,mac,tipo,marca,modelo,proveedor,bodega,factura,fecha,garantia,cantidad,precio,estado,comentario,responsable,creador)  SELECT serial,mac,tipo,marca,modelo,proveedor,bodega,factura,fecha,garantia,cantidad,precio,estado,comentario,responsable,creador from INV_activos WHERE mac='$mac_antigua'");

$actualizar=mysql_query("UPDATE INV_activos	 SET bodega=	'terreno'  WHERE mac='$mac_antigua' ");

$actualizar2=mysql_query("UPDATE INV_activos_paso	 SET bodega=	'terreno'  WHERE mac='$mac_antigua' ");

	
	$eliminar=mysql_query("DELETE  FROM SP_dato_cliente WHERE alias='$alias' and cliente='$cliente'");

	
header("Location: eliminar.php");
}
if (isset($_POST['ticket']))
{
header("Location: ../ticket/ticket_nuevo.php?cliente=$cliente");
}
?>