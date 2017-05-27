<?php
include("../../../system/config.php");
$remarks= $_GET["remarks"];
$ssid= $_GET["ssid"];


$sql=mysql_query("SELECT remarks FROM INT_radio_planning WHERE remarks='$remarks' and nombre=''");


if (mysql_num_rows($sql)>0)
{
header("Location: sin_kmz.php");

} else if(mysql_num_rows($sql)==0){
header("Location: kmz_estaciones2.php?remarks=$remarks&ssid=$ssid");    
		

}


?>