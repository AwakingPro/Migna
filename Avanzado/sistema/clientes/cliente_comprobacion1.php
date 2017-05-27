<?php
$cliente= $_POST["cliente"];
if (empty($cliente)){
require("../../../system/config.php");
$sql=mysql_query("SELECT cliente FROM SP_soporte_crear_cliente WHERE cliente='$cliente'  ");
if (mysql_num_rows($sql)>0)
{
header("Location: clientes_ingreso_dato_tecnico.php?cliente=$cliente");
} else if(mysql_num_rows($sql)==0){
header("Location: clientes_busqueda_ingreso_dato_tecnico.php?id=1");    
	      
        }
}
else 
    {
		header("Location: clientes_busqueda_ingreso_dato_tecnico.php");
	}

?>