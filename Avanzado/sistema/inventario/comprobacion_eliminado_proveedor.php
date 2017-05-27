<?php
require("../../../system/config.php");

$proveedor= $_GET["proveedor"];



$ide=$_GET["ide"];


$sql=mysql_query("SELECT nombre FROM INV_proveedor WHERE nombre='$proveedor' AND $ide=1");

if (mysql_num_rows($sql)>0)
{
header("Location: inventario_modificar_seleccione_proveedor.php?id=3");
$DEL=mysql_query("DELETE  FROM INV_proveedor WHERE  nombre='$proveedor' ");



} else if(mysql_num_rows($sql)==0){
	
header("Location: inventario_modificar_seleccione_proveedor.php?proveedor=$proveedor");
 		
}


?>