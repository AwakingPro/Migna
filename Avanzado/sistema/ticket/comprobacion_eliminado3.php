<?php
require("../../../system/config.php");

$numero= $_GET["numero"];


$cliente= $_GET["cliente"];


$sql=mysql_query("SELECT cliente,numero FROM TICKET WHERE  cliente='$cliente' and numero='$numero'");

if (mysql_num_rows($sql)>0)
{
header("Location: ticket_incumplidos_all.php?id=3");
$DEL=mysql_query("DELETE  FROM TICKET_comentario_interno WHERE  cliente='$cliente' and numero='$numero'");
$DEL=mysql_query("DELETE  FROM TICKET WHERE  cliente='$cliente' and numero='$numero'");

} else if(mysql_num_rows($sql)==0){
header("Location: ticket_incumplidos_all.php");
 		
 
}


?>