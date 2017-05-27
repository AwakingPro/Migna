<?php
require("../../../system/config.php");

$cliente= $_POST["cliente"];
$alias= $_POST["alias"];

header("Location: clientes_ingreso_voip.php?cliente=$cliente&alias=$alias");    


?>