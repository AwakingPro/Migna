<?php
require("../../../system/config.php");

$cliente= $_POST["cliente"];
$alias= $_POST["alias"];

header("Location: clientes_ingreso_acronis.php?cliente=$cliente&alias=$alias");    


?>