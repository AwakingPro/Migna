<?php

require("../../../system/config.php");
$estacion= $_GET["estacion"];


$sql=mysql_query("SELECT * FROM historial_pagos WHERE estacion='$estacion'  ");

if (mysql_num_rows($sql)>0)
{
header("Location: historial_pagos_de_luz.php?estacion=$estacion");
} else if(mysql_num_rows($sql)==0){
header("Location: pagos_de_luz.php?id=11");    
	   




      
}

?>