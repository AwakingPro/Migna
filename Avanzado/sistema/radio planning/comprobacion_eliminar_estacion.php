<?php
require("../../../system/config.php");

$estacion= $_GET["estacion"];


$sql=mysql_query("SELECT * FROM INT_radio_planning_estaciones WHERE  estacion='$estacion' ");

if (mysql_num_rows($sql)>0)
{
	 header("Location: resultado_estaciones.php?estacion=$estacion&id=10");	
} ?>