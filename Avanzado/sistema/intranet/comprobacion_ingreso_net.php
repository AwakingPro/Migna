<?php
require("../../../system/config.php");

$nombre = $_POST["nombre"];
$fecha_actualizacion = $_POST["fecha_actualizacion"];
$proc = $_POST["proc"];



     
$archivo 	= $_FILES["pdf"]["tmp_name"];
$tamanio	= $_FILES["pdf"]["size"];
$tipo    	= $_FILES["pdf"]["type"];
$nombre  	= $_FILES["pdf"]["name"];

 

$fp = fopen($archivo, "rb");
$pdf = fread($fp, $tamanio);
$pdf = addslashes($pdf);
fclose($fp);


$sql_nombre=mysql_query("SELECT proc FROM SIS_manual WHERE proc='$proc'");


if (mysql_num_rows($sql_nombre)>0)
{
header("Location: ingresar_manual.php?id=3");


} else if(mysql_num_rows($sql_nombre)==0){
header("Location: ingresar_manual.php?id=2");
		
 
		 $sql2=mysql_query("INSERT INTO SIS_manual(nombre,pdf,fecha_actualizacion,proc) values ('$nombre','$pdf','$fecha_actualizacion','$proc')");


}

?>