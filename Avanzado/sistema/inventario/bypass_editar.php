<?php

require("../../../system/config.php");
$serial= $_POST["serial"];
$mac= $_POST["mac"];





$sql=mysql_query("SELECT serial,mac FROM INV_activos WHERE serial='$serial' or mac='$mac'");

if (mysql_num_rows($sql)>0)
{
header("Location: inventario_modificar_seleccione_activos.php?proveedor=$proveedor&serial=$serial&mac=$mac&tipo=$tipo&marca=$marca&modelo=$modelo&bodega=$bodega");
} else if(mysql_num_rows($sql)==0){
header("Location: inventario_modificar_activos.php?id=1");    
	
      
        }
mysql_free_result($sql);
mysql_free_result($sql2);
mysql_close();

?>