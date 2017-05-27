<?php
require("../../../system/config.php");

$cliente= $_GET["cliente"];
$id= $_GET["id"];
$rut= $_GET["rut"];
$alias= $_GET["alias"];


$sql=mysql_query("SELECT id,cliente FROM SP_suspensiones WHERE  cliente='$cliente' and $id='$id'");

if (mysql_num_rows($sql)>0)
{


$eliminar=mysql_query("DELETE  FROM SP_suspensiones WHERE cliente='$cliente' and id='$id'");

header("Location:ver_clientes.php?cliente=$cliente&rut=$rut&alias=$alias");


} else if(mysql_num_rows($sql)==0){
header("Location: ver_clientes.php?cliente=$cliente&alias=$alias&rut=$rut&id=9");
 		
 
}


?>