<?php

require("../../../system/config.php");
include("../../../services2/config.php");

$anios= $_POST["anios"];
$mes= $_POST["mes"];

if ($c="c")
	{ 
header("Location: indicadores_factibilidades.php?anios=$anios&mes=$mes&id_filter=1");
     }
	 
  
	


?>