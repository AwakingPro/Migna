<?php

require("../../../system/config.php");
$serial2= $_POST["serial"];
$serial= trim($serial2);

$tipo2= $_POST["tipo"];
$tipo= trim($tipo2);

$marca2= $_POST["marca"];
$marca= trim($marca2);




$modelo2= $_POST["modelo"];
$modelo= trim($modelo2);

$proveedor2= $_POST["proveedor"];
$proveedor= trim($proveedor2);

$bodega2= $_POST["bodega"];
$bodega= trim($bodega2);

$factura2= $_POST["factura"];
$factura= trim($factura2);

$estado= $_POST["estado"];
$responsable= $_POST["responsable"];


$mac2=$_POST['mac'];
$mac= trim($mac2);

$sql=mysql_query("SELECT mac FROM INV_activos WHERE mac='$mac'   ");

if (mysql_num_rows($sql)>0)
{
header("Location: inventario_ingresos_activos.php?id=2");
} else {

header("Location: inventario_ingresos_activos.php?id=1");    
	   
		 $sql2=mysql_query("INSERT INTO INV_activos(serial,mac,tipo,marca,modelo,proveedor,bodega,factura) values ('$serial','$mac','$tipo','$marca','$modelo','$proveedor','$bodega','$factura')");

}
    
?>