<?php
include("../../class/Inventario/Inventario.php");

$Inventario = new Inventario();
$Inventario->Guardar($_POST['idEdit'],$_POST['Mod'],$_POST['Tipo'],$_POST['Marca'],$_POST['Modelo']);

?>