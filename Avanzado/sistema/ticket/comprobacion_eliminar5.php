<?php
require("../../../system/config.php");

$numero= $_GET["numero"];
$ticket_filter= $_GET["ticket_filter"];


$cliente= $_GET["cliente"];


$sql=mysql_query("SELECT cliente,numero FROM TICKET WHERE  cliente='$cliente' and numero='$numero'");

if (mysql_num_rows($sql)>0)
{
header("Location: ticket_finalizados.php?cliente=$cliente&numero=$numero&id=1&ticket_filter=$ticket_filter");
} else if(mysql_num_rows($sql)==0){
header("Location: error.php");
 		
 
}


?>