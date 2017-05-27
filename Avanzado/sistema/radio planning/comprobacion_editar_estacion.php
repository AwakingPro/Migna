<?php
require("../../../system/config.php");

$estacion= $_GET["estacion"];

$sql=mysql_query("SELECT estacion FROM INT_radio_planning_estaciones  WHERE  estacion='$estacion'");

if (mysql_num_rows($sql)>0)
{
header("Location: editar_estacion.php?estacion=$estacion");

} else if(mysql_num_rows($sql)==0){
header("Location: sin_registros_editar.php");
 		
 
}

?>