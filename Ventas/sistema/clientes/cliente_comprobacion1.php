<?php

require("../../../system/config.php");
$cliente= $_POST["cliente"];




$sql=mysql_query("SELECT cliente FROM SP_soporte_crear_cliente WHERE cliente='$cliente'  ");

if (mysql_num_rows($sql)>0)
{
header("Location: clientes_ingreso_dato_tecnico.php?cliente=$cliente");
} else if(mysql_num_rows($sql)==0){
header("Location: no_existe_registro.php");    
	   




      
        }
mysql_free_result($sql);
mysql_free_result($sql2);
mysql_close();

?>