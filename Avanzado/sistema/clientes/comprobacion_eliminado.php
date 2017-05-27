<?php
require("../../../system/config.php");

$alias= $_GET["alias"];
$mac_a= $_GET["mac_a"];
$mac_b= $_GET["mac_b"];
$cliente= $_GET["cliente"];
$rut= $_GET["rut"];

$id= $_GET["id"];


$sql=mysql_query("SELECT cliente,alias,rut FROM SP_dato_cliente WHERE  cliente='$cliente' and alias='$alias' AND $id='2'");

if (mysql_num_rows($sql)>0)
{

$sql2=mysql_query("UPDATE INV_activos	 SET id='0'  WHERE mac='$mac_a' ");
$sql3=mysql_query("UPDATE INV_activos	 SET id='0'  WHERE mac='$mac_b' ");
$eliminar=mysql_query("DELETE  FROM SP_dato_cliente WHERE alias='$alias' and cliente='$cliente'");

header("Location: clientes_busqueda.php?id=20");




} else if(mysql_num_rows($sql)==0){
header("Location: ver_clientes.php?cliente=$cliente&alias=$alias&rut=$rut");
 		
 
}


?>