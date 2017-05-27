<?php
require("../../../system/config.php");

$ssid= $_GET["ssid"];
$mac= $_GET["mac"];
$estacion= $_GET["estacion"];

$ip= $_GET["ip"];

$sql=mysql_query("SELECT * FROM INT_radio_planning WHERE  ssid='$ssid' and ip='$ip' ");

if (mysql_num_rows($sql)>0)
{
	 header("Location: resultado_radio_planning.php?ssid=$ssid&ip=$ip&id=10&mac=$mac&estacion=$estacion");	
} ?>