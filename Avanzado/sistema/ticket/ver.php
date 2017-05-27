<?php
require("../../../system/config.php");

$numero= $_GET["numero"];
$cliente= $_GET["cliente"];
$factibilidad= $_GET["factibilidad"];
$sql=mysql_query("SELECT cliente,numero FROM TICKET WHERE  cliente='$cliente' and numero='$numero'");

if (mysql_num_rows($sql)>0)
{
header("Location: ver_registro.php?cliente=$cliente&numero=$numero&factibilidad=$factibilidad");
} else if(mysql_num_rows($sql)==0){
header("Location: resultado_ticket.php?numero=$numero&cliente=$cliente");
 		
 
}


?>