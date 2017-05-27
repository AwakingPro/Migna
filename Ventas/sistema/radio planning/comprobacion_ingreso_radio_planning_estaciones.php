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


$sql_estacion=mysql_query("SELECT estacion FROM INT_radio_planning_estaciones WHERE estacion='$estacion'");


if (mysql_num_rows($sql_estacion)>0)
{
header("Location: estacion_duplicada");
} else if(mysql_num_rows($sql_remarks)>0){


} else if(mysql_num_rows($sql)==0){
header("Location: estacion_ingresada.php");    
		
 
		 $sql2=mysql_query("INSERT INTO INT_radio_planning_estaciones(estacion,kmz,nombre) values ('$estacion','$kmz','$nombre')");


}

?>