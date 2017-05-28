<?php
include("../../class/Ventas/Ventas.php");

$Ventas = new Ventas();
$Ventas->Provincia($_POST['Id']);

?>