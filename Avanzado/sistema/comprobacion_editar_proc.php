<?php
require("../../system/config.php");

$fecha_actualizacion= $_GET["fecha_actualizacion"];
$procedimientos= $_GET["procedimientos"];

$proc= $_GET["proc"];


$sql=mysql_query("SELECT proc,fecha_actualizacion FROM SIS_procedimientos WHERE  proc='$proc' and fecha_actualizacion='$fecha_actualizacion'");

if (mysql_num_rows($sql)>0)
{
header("Location: procedimientos_ingreso.php?proc=$proc&fecha_actualizacion=$fecha_actualizacion&procedimientos=$procedimientos");
} else if(mysql_num_rows($sql)==0){
header("Location: error.php");
 		
 
}


?>