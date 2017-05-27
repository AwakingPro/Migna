<?php

require("../../../system/config.php");
$cliente= $_GET["cliente"];
$rut= $_GET["rut"];




$sql=mysql_query("SELECT cliente,rut FROM SP_dato_cliente WHERE cliente='$cliente' or rut='$rut' ");

if (mysql_num_rows($sql)>1)
{
header("Location: ../clientes/clientes_con_mas_resultados.php?cliente=$cliente&rut=$rut");
} else if(mysql_num_rows($sql)>0){
header("Location: ../clientes/ver_clientes.php?cliente=$cliente&rut=$rut");    
	        
        }
		else if(mysql_num_rows($sql)==0){
header("Location: sin_registros.php");    
        }
mysql_free_result($sql);
mysql_free_result($sql2);
mysql_close();

?>