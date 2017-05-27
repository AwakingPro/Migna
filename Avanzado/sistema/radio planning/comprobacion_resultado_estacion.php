<?php
require("../../../system/config.php");

$estacion = $_POST["estacion"];


$sql=mysql_query("SELECT estacion FROM INT_radio_planning_estaciones WHERE estacion='$estacion'");

if (mysql_num_rows($sql)>0)
{
header("Location: resultado_estaciones.php?estacion=$estacion");
} else if(mysql_num_rows($sql)==0){
header("Location: busqueda_estacion_radio_planning.php?id=1");
 		
 
}

?>