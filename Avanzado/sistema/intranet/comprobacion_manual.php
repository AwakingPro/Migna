<?php
include("file:///Y|/system/config.php");

$menu= $_GET["menu"];
$fecha_actualizacion= $_GET ["fecha_actualizacion"];

$sql=mysql_query("SELECT * FROM SIS_manual WHERE menu='$menu' ");


if (mysql_num_rows($sql)>0)
{

header("Location: manual_net.php?menu=$menu");	


} else if(mysql_num_rows($sql)==0){
header("Location: pdf_procedimientos.php? proc=$proc&fecha_actualizacion=$fecha_actualizacion");    		

}


?>