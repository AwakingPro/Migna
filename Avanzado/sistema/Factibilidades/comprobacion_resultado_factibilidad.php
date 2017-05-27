<?php
require("../../../system/config.php");

$numero = $_POST["numero"];
$cliente= $_POST["cliente"];



$sql=mysql_query("SELECT numero,cliente FROM TICKET where (numero='$numero' or cliente='$cliente') and subtipo='Factibilidad' ");

if (mysql_num_rows($sql)>0)
{
header("Location: resultado_factibilidad.php?numero=$numero&cliente=$cliente");
} else if(mysql_num_rows($sql)==0){
header("Location: factibilidades_buscar.php?id=1");
 		
 
}

?>