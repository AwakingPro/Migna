<?php
include('system/config.php');

$mac=$_POST['mac'];
$serial=$_POST['serial'];
$tipo=$_POST['tipo'];
$modelo=$_POST['modelo'];
$proveedor=$_POST['proveedor'];
$ubicacion=$_POST['ubicacion'];
$factura=$_POST['factura'];
$fecha=$_POST['fecha'];
$hora= date("G:H:s");
$fecha_ingreso= date("Y-m-d");
$responsable=$_POST['responsable'];

$insert="INSERT INTO INVENTARIO_base (mac,serial,tipo,modelo,proveedor,ubicacion,numero_factura,fecha_ingreso,hora_ingreso,responsable,fecha_compra) VALUES ('$mac','$serial','$tipo','$modelo','$proveedor','$ubicacion','$factura','$fecha_ingreso','$hora','$responsable','$fecha')";
mysql_query($insert);
		
?>		