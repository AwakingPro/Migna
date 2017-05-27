<?php
require("../../../system/config.php");

$mac= $_GET["mac"];


$serial= $_GET["serial"];
$ide=$_GET["ide"];


$sql=mysql_query("SELECT mac,serial FROM INV_activos WHERE  mac='$mac' and serial='$serial' AND $ide=1");

if (mysql_num_rows($sql)>0)
{
header("Location: resultado_busqueda_inventario.php?id=3");
$DEL=mysql_query("DELETE  FROM INV_activos WHERE  mac='$mac' and serial='$serial'");



} else if(mysql_num_rows($sql)==0){
header("Location: resultado_busqueda_inventario.php?serial=$serial&mac=$mac");
 		
}


?>