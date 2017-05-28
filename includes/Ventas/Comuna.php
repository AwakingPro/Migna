<?php
include("../../class/Ventas/Ventas.php");

$Ventas = new Ventas();
$Ventas->Comuna($_POST['Id']);

?>