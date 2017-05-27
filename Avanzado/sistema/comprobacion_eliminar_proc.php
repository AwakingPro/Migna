<?php
include("../../../system/config.php");

$fecha_actualizacion= $_GET["fecha_actualizacion"];

$proc= $_GET["proc"];

$id_procedimientos= $_GET["id_procedimientos"];

$sql=mysql_query("SELECT fecha_actualizacion FROM SIS_procedimientos WHERE fecha_actualizacon='$fecha_actualizacon' and nombre=''");


if (mysql_num_rows($sql)>0)
{

header("Location: procedimientos.php?fecha_actualizacion=$fecha_actualizacion&proc=$proc&id_procedimientos=&proc=$proc");	


} else if(mysql_num_rows($sql)==0){
header("Location: pdf_procedimientos.php?proc=$proc&fecha_actualizacion=$");    
		

}


?>