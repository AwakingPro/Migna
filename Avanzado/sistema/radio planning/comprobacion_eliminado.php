<?php
require("../../../system/config.php");

$ssid= $_GET["ssid"];
$mac= $_GET["mac"];
$estacion= $_GET["estacion"];


$ip= $_GET["ip"];
$id=$_GET["id"];

$sql=mysql_query("SELECT ssid,ip FROM INT_radio_planning WHERE  ssid='$ssid' and ip='$ip' and $id=9");

if (mysql_num_rows($sql)>0)
{
header("Location: resultado_radio_planning.php?ip=$ip&ssid=$ssid&estacion=$estacion&id=3");
$DEL=mysql_query("DELETE  FROM INT_radio_planning WHERE  ssid='$ssid' and ip='$ip' ");
$sql4=mysql_query("UPDATE INV_activos	 SET id='0'  WHERE mac='$mac' ");


} else if(mysql_num_rows($sql)==0){
header("Location: resultado_radio_planning.php?ip=$ip&ssid=$ssid&estacion=$estacion");
 		
 
}


?>