<?php
require("../../../system/config.php");

$estacion = $_POST["estacion"];
$remarks= $_POST["remarks"];
$ip= $_POST["ip"];
$ssid= $_POST["ssid"];
$mac= $_POST["mac"];


$sql=mysql_query("SELECT estacion,ip,remarks,ssid,mac FROM INT_radio_planning WHERE estacion='$estacion' or ip='$ip' or ssid='$ssid' or remarks='$remarks' or mac='$mac'");

if (mysql_num_rows($sql)>0)
{
header("Location: resultado_radio_planning.php?ip=$ip&estacion=$estacion&remarks=$remarks&ssid=$ssid&mac=$mac");
} else if(mysql_num_rows($sql)==0){
header("Location: sin_registros.php");
 		
 
}

?>