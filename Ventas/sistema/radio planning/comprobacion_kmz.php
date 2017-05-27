<?php
include("../../../system/config.php");
$estacion= $_GET["estacion"];

$sql=mysql_query("SELECT estacion FROM INT_radio_planning_estaciones WHERE estacion='$estacion' and nombre=''");


if (mysql_num_rows($sql)>0)
{
header("Location: sin_kmz.php");

} else if(mysql_num_rows($sql)==0){
header("Location: kmz_estaciones.php?estacion=$estacion");    
		

}


?>