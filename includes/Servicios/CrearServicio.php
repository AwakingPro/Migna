<?php
include("../../class/Servicios/Servicios.php");

$Servicios = new Servicios();
$Servicios->CrearServicio($_POST['Data']);

?>