<?php

require("../../../system/config.php");
$serial= $_POST["serial"];
$mac= $_POST["mac"];
$tipo= $_POST["tipo"];
$marca= $_POST["marca"];
$modelo= $_POST["modelo"];




$sql=mysql_query("SELECT serial,mac,tipo,marca,modelo,proveedor,bodega FROM INV_activos WHERE serial='$serial' or mac='$mac' or tipo='$tipo' or marca='$marca' or modelo='$modelo' or proveedor='$proveedor' or bodega='$bodega'");

if (mysql_num_rows($sql)>0)
{
header("Location: resultado_busqueda_inventario.php?serial=$serial&mac=$mac&tipo=$tipo&marca=$marca&modelo=$modelo&proveedor=$proveedor&bodega=$bodega");
} else if(mysql_num_rows($sql)==0){
header("Location: buscar_activos.php?id=4");    
	
      
        }
mysql_free_result($sql);
mysql_free_result($sql2);
mysql_close();

?>