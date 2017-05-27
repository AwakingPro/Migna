<?php

require("../../../system/config.php");


$fecha_1= $_POST["fecha_1"];
$fecha_2= $_POST["fecha_2"];

if ($fecha_1>$fecha_2)
	{ 
header("Location: factibilidades_kpi.php?id=1");
     }
	 else {
		 
		 header("Location: factibilidades_kpi.php?id=2&fecha_1=$fecha_1&fecha_2=$fecha_2&kpi=1");

		 }
  
	
?>