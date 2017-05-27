<?php

require("../../../system/config.php");
$alias= $_POST["alias"];
$cliente= $_POST["cliente"];
$rut= $_POST["rut"];



$sql=mysql_query("SELECT cliente,alias,rut FROM SP_dato_cliente WHERE cliente='$cliente' and alias='$alias' or rut='$rut' and alias='$alias' ");

if (mysql_num_rows($sql)>0)
{
header("Location: ver_clientes2.php?cliente=$cliente&alias=$alias&rut=$rut");
} 

		else if(mysql_num_rows($sql)==0){
header("Location: sin_registros.php");    
       }
mysql_free_result($sql);
mysql_free_result($sql2);
mysql_close();

?>