<?php
require("../../../system/config.php");

$remarks= $_GET["remarks"];
$ip= $_GET["ip"];
$ssid= $_GET["ssid"];

$sql=mysql_query("SELECT ip,remarks FROM INT_radio_planning WHERE  remarks='$remarks' and ip='$ip' or ssid='$ssid' and ip='$ip'");

if (mysql_num_rows($sql)>0)
{
header("Location: mas_info.php?ip=$ip&remarks=$remarks&ssid=$ssid");
} else if(mysql_num_rows($sql)==0){
header("Location: sin_registros_editar.php");
 		
 
}

?>