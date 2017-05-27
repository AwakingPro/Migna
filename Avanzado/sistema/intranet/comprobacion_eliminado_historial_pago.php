<?php
require("../../../system/config.php");

$id_pago= $_GET["id_pago"];

$estacion= $_GET["estacion"];


if (isset($_GET['Si']))
{
header("Location: pagos_de_luz.php?id=4");

$DEL=mysql_query("DELETE  FROM historial_pagos WHERE  id='$id_pago' ");


}
if (isset($_GET['No']))
{
header("Location: historial_pagos_de_luz.php?estacion=$estacion");


}



 		
 
//}


?>