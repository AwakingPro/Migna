<?php
require("../../system/config.php");

$numero= $_GET["numero"];
$factibilidad= $_GET["factibilidad"];

$cliente= $_GET["cliente"];


$sql=mysql_query("SELECT cliente,numero FROM TICKET WHERE  cliente='$cliente' and numero='$numero'");

if (mysql_num_rows($sql)>0)
{
header("Location: editar_registro.php?cliente=$cliente&numero=$numero&factibilidad=$factibilidad");
} else if(mysql_num_rows($sql)==0){
header("Location: error.php");
 		
 
}


?>