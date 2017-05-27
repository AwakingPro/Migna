<?php

require("../../../system/config.php");
$serial2= $_POST["serial"];
$serial= trim($serial2);

$tipo2= $_POST["tipo"];
$tipo= trim($tipo2);

$marca2= $_POST["marca"];
$marca= trim($marca2);


$creador= $_POST["creador"];


$modelo2= $_POST["modelo"];
$modelo= trim($modelo2);

$proveedor2= $_POST["proveedor"];
$proveedor= trim($proveedor2);

$bodega2= $_POST["bodega"];
$bodega= trim($bodega2);

$factura2= $_POST["factura"];
$factura= trim($factura2);

$fecha2= $_POST["fecha"];

//formato fecha americana

$fecha=date("Y-m-d",strtotime($fecha2));
//El nuevo valor de la variable: $fecha2="20-10-2008"





$garantia= $_POST["garantia"];

$cantidad= $_POST["cantidad"];
$precio= $_POST["precio"];
$estado= $_POST["estado"];
$responsable= $_POST["responsable"];
$comentario= $_POST["comentario"];

$mac2=$_POST['mac'];
$mac= trim($mac2);


$sql=mysql_query("SELECT serial,mac FROM INV_activos WHERE serial='$serial' or mac='$mac' ");

if (mysql_num_rows($sql)>0)
{
header("Location: inventario_activo_duplicado.php");
} else if(mysql_num_rows($sql)==0){
header("Location: inventario_ingreso_activo.php");    
	   
		 $sql2=mysql_query("INSERT INTO INV_activos(serial,mac,tipo,marca,modelo,proveedor,bodega,factura,fecha,garantia,cantidad,precio,estado,responsable,comentario,creador) values ('$serial','$mac','$tipo','$marca','$modelo','$proveedor','$bodega','$factura','$fecha','$garantia','$cantidad','$precio','$estado','$responsable','$comentario','$creador')");

 $sql3=mysql_query("INSERT INTO INV_activos_paso(serial,mac,tipo,marca,modelo,proveedor,bodega,factura,fecha,garantia,cantidad,precio,estado,responsable,comentario,creador) values ('$serial','$mac','$tipo','$marca','$modelo','$proveedor','$bodega','$factura','$fecha','$garantia','$cantidad','$precio','$estado','$responsable','$comentario','$creador')");


      
        }
mysql_free_result($sql);
mysql_free_result($sql2);
mysql_free_result($sql3);
mysql_free_result($sql4);
mysql_close();

?>