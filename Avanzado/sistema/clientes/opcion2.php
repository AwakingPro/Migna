<?php

require("../../../system/config.php");

$cliente= $_POST["cliente"];
$rut= $_POST["rut"];




if (isset($_POST['modificar']))
{
header("Location: modificar_datos_com.php?cliente=$cliente&rut=$rut");
}

	


?>