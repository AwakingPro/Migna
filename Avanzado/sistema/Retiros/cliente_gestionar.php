<?php

require("../../../system/config.php");
$cliente= $_GET["cliente"];
$rut= $_GET["rut"];
$alias= $_GET["alias"];




$sql=mysql_query("SELECT cliente FROM SP_soporte_crear_cliente WHERE cliente='$cliente'  ");

if (mysql_num_rows($sql)>0)
{
header("Location: clientes_ingreso_dato_tecnico.php?cliente=$cliente");
} else if(mysql_num_rows($sql)==0){
header("Location: clientes_busqueda_ingreso_dato_tecnico.php?id=1");    
	   




      
        }
mysql_free_result($sql);
mysql_free_result($sql2);
mysql_close();

?>