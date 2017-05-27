<?php
require("../../../system/config.php");
$estacion = $_POST["estacion"];
$ip= $_POST["ip"];
$ssid= $_POST["ssid"];
$mac= $_POST["mac"];
if (empty($estacion)){
	
$sql=mysql_query("SELECT estacion FROM INT_radio_planning WHERE  ip='$ip' or ssid='$ssid'  or mac='$mac'");

if (mysql_num_rows($sql)>0)
{
	$sql2=mysql_query("SELECT estacion FROM INT_radio_planning WHERE  ip='$ip' or ssid='$ssid'  or mac='$mac'");
    while ($row = mysql_fetch_row($sql2)){$estacion=$row[0];}
	
	
	
header("Location: resultado_radio_planning.php?ip=$ip&estacion=$estacion&ssid=$ssid&mac=$mac");
} else if(mysql_num_rows($sql)==0){
header("Location: busqueda_radio_planning.php?id=1");
 		
 
}
	
	
	
	
	}
else{



$sql=mysql_query("SELECT estacion,ip,ssid,mac FROM INT_radio_planning WHERE estacion='$estacion' or ip='$ip' or ssid='$ssid'  or mac='$mac'");

if (mysql_num_rows($sql)>0)
{
	
header("Location: resultado_radio_planning.php?ip=$ip&estacion=$estacion&ssid=$ssid&mac=$mac");
} else if(mysql_num_rows($sql)==0){
header("Location: busqueda_radio_planning.php?id=1");
 		
 
}
}
?>