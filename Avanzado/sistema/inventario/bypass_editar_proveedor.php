<?php

require("../../../system/config.php");
$proveedor= $_POST["proveedor"];




$sql=mysql_query("SELECT nombre FROM INV_proveedor WHERE nombre='$proveedor' ");

if (mysql_num_rows($sql)>0)
{
header("Location: inventario_modificar_seleccione_proveedor.php?proveedor=$proveedor");
} else if(mysql_num_rows($sql)==0){
header("Location: inventario_modificar_proveedores.php?id=1");    
	
      
        }
mysql_free_result($sql);
mysql_free_result($sql2);
mysql_close();

?>