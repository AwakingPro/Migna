<?php
require("../../../system/config.php");

$ip = $_POST["registros"];


$archivo = $_FILES["kmz"]["tmp_name"];
$tamanio = $_FILES["kmz"]["size"];
$tipo    = $_FILES["kmz"]["type"];
$nombre  = $_FILES["kmz"]["name"];


$fp = fopen($archivo, "rb");
$kmz = fread($fp, $tamanio);
$kmz = addslashes($kmz);
fclose($fp);


$sql=mysql_query("SELECT ip FROM INT_radio_planning WHERE ip='$ip'");


if (mysql_num_rows($sql)>0)
{
header("Location: kml_actualizado.php");    
		
 $sql7=mysql_query("UPDATE INT_radio_planning	 
SET  ip=	'$ip',nombre=	'$nombre',kmz=	'$kmz'  WHERE ip='$ip' ");
} else if(mysql_num_rows($sql_remarks)==0){



header("Location: kml_actualizado.php");
}

?>