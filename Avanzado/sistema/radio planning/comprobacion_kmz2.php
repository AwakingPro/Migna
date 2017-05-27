<?php
include("../../../system/config.php");

$ssid= $_GET["ssid"];
$mac= $_GET["mac"];
$estacion= $_GET["estacion"];

$ip= $_GET["ip"];

$sql=mysql_query("SELECT ssid FROM INT_radio_planning WHERE ssid='$ssid' and nombre=''");


if (mysql_num_rows($sql)>0)
{
header("Location: resultado_radio_planning.php?ssid=$ssid&ip=$ip&id=11&mac=$mac&estacion=$estacion");

} else if(mysql_num_rows($sql)==0){
header("Location: kmz_estaciones2.php?remarks=$remarks&ssid=$ssid");    
		

}


?>