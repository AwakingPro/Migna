<?php
include("../../class/Inventario/Inventario.php");

$Inventario = new Inventario();
$Inventario->Ingresar($_POST['Tipo'],$_POST['Mod'],$_POST['Marca'],$_POST['Modelo']);

?>