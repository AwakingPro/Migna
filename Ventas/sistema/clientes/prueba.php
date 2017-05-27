<?php

require("../../../system/config.php");
$cliente= $_POST["cliente"];
$rut= $_POST["rut"];
$alias= $_POST["alias"];

if (isset($_POST['modificar']))
{
echo $cliente;
}
if (isset($_POST['eliminar']))
{
echo $rut;
}
?>