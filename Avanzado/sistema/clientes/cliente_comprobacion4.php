<?php

require("../../../system/config.php");
$cliente= $_POST["cliente"];
$rut= $_POST["rut"];




$sql=mysql_query("SELECT cliente,rut FROM SP_soporte_crear_cliente WHERE (cliente='$cliente' or rut='$rut')  ");

if(mysql_num_rows($sql)>0){
header("Location: ver_datos_com.php?cliente=$cliente&rut=$rut");    
	        
        }
		else if(mysql_num_rows($sql)==0){
header("Location: clientes_com_busqueda.php?id=1");    
        }


?>