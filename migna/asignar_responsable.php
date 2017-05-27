<?php
include('system/config.php');

$responsable=$_POST['responsable'];
$resp=$_POST['resp'];
$bodega=$_POST['bodega'];
$hora= date("G:H:s");
$fecha= date("Y-m-d");
mysql_query("UPDATE INV_orden SET responsable_egreso='$responsable',bodega='$bodega',hora_egreso='$hora',fecha_egreso='$fecha' WHERE id='$resp'");	

		
?>		