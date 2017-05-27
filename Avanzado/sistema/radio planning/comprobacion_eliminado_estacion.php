<?php
require("../../../system/config.php");


$estacion=$_GET["estacion"];
$id=$_GET["id"];


$sql=mysql_query("SELECT estacion FROM INT_radio_planning_estaciones WHERE  estacion='$estacion' and $id=9");

if (mysql_num_rows($sql)>0)
{
header("Location: resultado_estaciones.php?id=3");
$DEL=mysql_query("DELETE  FROM INT_radio_planning_estaciones WHERE  estacion='$estacion'  ");


} else if(mysql_num_rows($sql)==0){
header("Location: resultado_estaciones.php?estacion=$estacion");
 		
 
}


?>