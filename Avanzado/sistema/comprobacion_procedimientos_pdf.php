<?php
require("../../system/config.php");

$ip = $_POST["registros"];


$archivo = $_FILES["kmz"]["tmp_name"];
$tamanio = $_FILES["kmz"]["size"];
$tipo    = $_FILES["kmz"]["type"];
$nombre  = $_FILES["kmz"]["name"];


$fp = fopen($archivo, "rb");
$kmz = fread($fp, $tamanio);
$kmz = addslashes($kmz);
fclose($fp);
if (empty($nombre)){
	header("Location: ingreso_kml.php?id=2");    

	}

else

{
	header("Location: ingreso_kml.php?id=1");    
		
 $sql7=mysql_query("UPDATE INT_radio_planning	 
SET  ip=	'$ip',nombre=	'$nombre',kmz=	'$kmz'  WHERE ip='$ip' ");





}

?>