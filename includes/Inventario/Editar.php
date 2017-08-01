<?php
include("../../class/Inventario/Inventario.php");

$Inventario = new Inventario();
$Inventario->Editar($_POST['idEdit'],$_POST['Mod']);

?>