<?php
require("../../../system/config.php");

$numero= $_GET["numero"];
$id_ticket= $_GET["id_ticket"];
$cliente= $_GET["cliente"];


$sql=mysql_query("SELECT cliente,numero,id FROM TICKET WHERE  cliente='$cliente' and numero='$numero' and id='$id_ticket'");

if (mysql_num_rows($sql)>0)
{
	
$sql7=mysql_query("UPDATE TICKET	SET   eliminado=	'1' WHERE numero='$numero' and cliente='$cliente'");	
	
header("Location: ticket_abiertos.php?id=1");
} else if(mysql_num_rows($sql)==0){
header("Location: error.php");
 		
 
}


?>