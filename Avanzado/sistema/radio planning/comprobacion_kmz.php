<?php
include("../../../system/config.php");
$estacion= $_GET["estacion"];
$ssid= $_GET["ssid"];
$mac= $_GET["mac"];
$estacion= $_GET["estacion"];
$sql=mysql_query("SELECT estacion FROM INT_radio_planning_estaciones WHERE estacion='$estacion' and nombre=''");


if (mysql_num_rows($sql)>0)
{
header("Location: resultado_estaciones.php?ssid=$ssid&ip=$ip&id=11&mac=$mac&estacion=$estacion");

} 
else if(mysql_num_rows($sql)==0){
header("Location: kmz_estaciones2.php?remarks=$remarks&ssid=$ssid");    
		

}

?>