<?php
require("../../../system/config.php");

$nombre = $_POST["nombre"];
$fecha_actualizacion = $_POST["fecha_actualizacion"];


$archivo = $_FILES["pdf"]["tmp_name"];
$tamanio = $_FILES["pdf"]["size"];
$tipo    = $_FILES["pdf"]["type"];
$nombre  = $_FILES["pdf"]["name"];

$fp = fopen($archivo, "rb");
$pdf = fread($fp, $tamanio);
$pdf = addslashes($pdf);
fclose($fp);
if (empty($nombre)){
	header("Location: procedimientos_subir.php?id=2");    

	}

else
{
header("Location: procedimientos_subir.php?id=1");    
		
 $sql7=mysql_query("UPDATE SIS_procedimientos	 
SET  nombre=	'$nombre',nombre=	'$nombre',pdf=	'$pdf'  WHERE nombre='$nombre' ");
}

?>