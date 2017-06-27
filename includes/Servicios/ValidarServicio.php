<?php
include("../../class/Servicios/Servicios.php");

$Servicios = new Servicios();
$Servicios->ValidarServicio($_POST['Data']);

?>