<?php
require("../../../system/config.php");

$estacion = $_POST["estacion"];


$archivo = $_FILES["kmz"]["tmp_name"];
$tamanio = $_FILES["kmz"]["size"];
$tipo    = $_FILES["kmz"]["type"];
$nombre  = $_FILES["kmz"]["name"];


$fp = fopen($archivo, "rb");
$kmz = fread($fp, $tamanio);
$kmz = addslashes($kmz);
fclose($fp);


$sql=mysql_query("SELECT estacion FROM INT_radio_planning_estaciones WHERE estacion='$estacion'");


if (mysql_num_rows($sql)>0)
{
header("Location: kml_actualizado.php");    
		
 $sql7=mysql_query("UPDATE INT_radio_planning_estaciones	 
SET  estacion=	'$estacion',nombre=	'$nombre',kmz=	'$kmz'  WHERE estacion='$estacion' ");
} else if(mysql_num_rows($sql_remarks)==0){



header("Location: kml_actualizado.php");
}

?>