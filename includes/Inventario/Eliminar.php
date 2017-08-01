<?php
include("../../class/Inventario/Inventario.php");

$Inventario = new Inventario();
$Inventario->Eliminar($_POST['Id'],$_POST['Mod']);

?>