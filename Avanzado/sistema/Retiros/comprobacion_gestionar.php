<?php

require("../../../system/config.php");
$cliente= $_GET["cliente"];
$rut= $_GET["rut"];
$alias= $_GET["alias"];




$sql=mysql_query("SELECT * FROM SP_dato_cliente WHERE cliente='$cliente' AND rut='$rut' AND alias='$alias' ");

if (mysql_num_rows($sql)>0)
{
header("Location: retiros_por_gestionar_actualizar.php?cliente=$cliente&rut=$rut&alias=$alias");
} else if(mysql_num_rows($sql)==0){
header("Location: retiros_por_gestionar.php?id=1");    
	   




      
        }
mysql_free_result($sql);
mysql_free_result($sql2);
mysql_close();

?>