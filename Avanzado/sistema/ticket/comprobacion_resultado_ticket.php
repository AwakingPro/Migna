<?php
require("../../../system/config.php");

$numero = $_POST["numero"];
$cliente= $_POST["cliente"];



$sql=mysql_query("SELECT numero,cliente FROM TICKET where numero='$numero' or cliente='$cliente' ");

if (mysql_num_rows($sql)>0)
{
header("Location: resultado_ticket.php?numero=$numero&cliente=$cliente");
} else if(mysql_num_rows($sql)==0){
header("Location: buscar_ticket.php?id=1");
 		
 
}

?>