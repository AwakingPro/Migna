<?php
require("../../../system/config.php");

$proveedor= $_GET["proveedor"];




$sql=mysql_query("SELECT nombre FROM INV_proveedor WHERE  nombre='$proveedor'");

if (mysql_num_rows($sql)>0)
{
header("Location: inventario_modificar_seleccione_proveedor.php?proveedor=$proveedor&id=1");
} else if(mysql_num_rows($sql)==0){
header("Location: error.php");
 		
 
}


?>