<?php
if (!isset($_SESSION)) {
  session_start();
}

require("../../../system/config.php");
include("../../../services2/config.php");
$_SESSION['anios']=$_REQUEST['anios'];
$_SESSION['mes']=$_REQUEST['mes'];

$anios= $_POST["anios"];
$mes= $_POST["mes"];

if ($mes!=20)
	{ 
header("Location: indicadores_instalaciones_resultado.php?anios=$anios&mes=$mes&id_filter=1");
     }
	  if ($mes==20) {
		 header("Location: indicadores_instalaciones_resultado_todas.php?anios=$anios&mes=$mes&id_filter=2");

		 }
  
	


?>