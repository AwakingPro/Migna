<?php
require("../../../system/config.php");

$ssid= $_GET["ssid"];


$ip2= $_GET["ip"];
$ip= trim($ip2);

$ssid= $_GET["ssid"];

$sql=mysql_query("SELECT ip,remarks,ssid FROM INT_radio_planning WHERE  remarks='$remarks' and ip='$ip' or ssid='$ssid' and ip='$ip'");

if (mysql_num_rows($sql)>0)
{
header("Location: editar_registro.php?ip=$ip&remarks=$remarks&ssid=$ssid");
} else if(mysql_num_rows($sql)==0){
header("Location: sin_registros_editar.php");
 		
 
}


?>