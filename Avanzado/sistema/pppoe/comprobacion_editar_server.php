<?php
require("../../../system/config.php");

$id_server= $_GET["id_server"];
$estacion= $_GET["estacion"];

$sql=mysql_query("SELECT id FROM PPPoE_SRV WHERE  id='$id_server' ");

if (mysql_num_rows($sql)>0)
{
header("Location: editar_server.php?id_server=$id_server&estacion=$estacion");
} else if(mysql_num_rows($sql)==0){
header("Location: error.php");		
 
}


?>