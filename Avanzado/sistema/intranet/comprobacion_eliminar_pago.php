<?php

require("../../../system/config.php");
$id_pago= $_GET["id_pago"];

$sql=mysql_query("SELECT id FROM Pagos_Luz WHERE id='$id_pago'  ");

if (mysql_num_rows($sql)>0)
{
header("Location: pagos_de_luz.php?id_pago=$id_pago&id=1");
} else if(mysql_num_rows($sql)==0){
header("Location: avisos.php?id=10");    
	   




      
        }


?>