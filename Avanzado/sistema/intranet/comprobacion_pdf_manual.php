<?php
include("../../../system/config.php");
    
$proc= $_GET["proc"];
$fecha_actualizacion= $_GET ["fecha_actualizacion"];

$sql=mysql_query("SELECT * FROM SIS_manual WHERE proc='$proc' ");


if (mysql_num_rows($sql)>0)
{

header("Location: manual_net.php?nombre=$nombre");	


} else if(mysql_num_rows($sql)==0){
header("Location: pdf_manual.php? proc=$proc&fecha_actualizacion=$fecha_actualizacion");    		

}


?>