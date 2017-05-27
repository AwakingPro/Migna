<?php
require("../../../system/config.php");

$estacion = $_POST['estacion'];
$id = $_POST['id'];
$ip = $_POST['ip'];
$marca = $_POST['marca'];
$consumo = $_POST['consumo'];
$capacidad = $_POST['capacidad'];
$baterias = $_POST['baterias'];
$cantidad = $_POST['cantidad'];
$autonomia  = $_POST['autonomia'];
$clave = $_POST['clave'];
$fecha_instalacion_ups = $_POST['fecha_instalacion_ups'];
$fecha_instalacion_baterias = $_POST['fecha_instalacion_baterias'];
$fecha_caducidad_baterias = $_POST['fecha_caducidad_baterias'];
$comentario = $_POST['comentario'];

$guardar =mysql_query("UPDATE UPS SET estacion='$estacion',ip='$ip',marca='$marca',consumo='$consumo',capacidad='$capacidad',baterias='$baterias',cantidad='$cantidad',autonomia='$autonomia',clave='$clave',fecha_instalacion_ups='$fecha_instalacion_ups',fecha_instalacion_baterias='$fecha_instalacion_baterias',fecha_caducidad_baterias='$fecha_caducidad_baterias',comentario='$comentario' WHERE id=$id");
header("Location: radio_planning_ups.php?update=1");
?>