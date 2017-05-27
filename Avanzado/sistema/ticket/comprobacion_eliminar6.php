<?php
require("../../../system/config.php");

$numero= $_GET["numero"];


$cliente= $_GET["cliente"];


$sql=mysql_query("SELECT cliente,numero FROM TICKET WHERE  cliente='$cliente' and numero='$numero'");

if (mysql_num_rows($sql)>0)
{
header("Location: resultado_ticket.php?cliente=$cliente&numero=$numero&id=1");
} else if(mysql_num_rows($sql)==0){
header("Location: error.php");
 		
 
}


?>