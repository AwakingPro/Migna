<?php

require("../../../system/config.php");
$id_pago= $_GET["id_pago"];


$sql=mysql_query("SELECT id FROM historial_pagos WHERE id='$id_pago'  ");

if (mysql_num_rows($sql)>0)
{
header("Location: ver_pagos_detalle.php?id_pago=$id_pago");
} else if(mysql_num_rows($sql)==0){
header("Location: avisos.php?id=10");    
	   




      
}

?>