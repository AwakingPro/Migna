<?php

require("../../../system/config.php");
$id_pago= $_GET["id_pago"];
$estacion= $_GET["estacion"];
$sql=mysql_query("SELECT id FROM historial_pagos WHERE id='$id_pago'  ");

if (mysql_num_rows($sql)>0)
{
header("Location: historial_pagos_de_luz.php?id_pago=$id_pago&id=1&estacion=$estacion");
} else if(mysql_num_rows($sql)==0){
header("Location: avisos.php?id=10");    
	   




      
        }


?>