<?php
require("../../../system/config.php");

$estacion = $_POST["estacion"];

$estacion2=$_POST['estacion2'];


$sql=mysql_query("SELECT estacion FROM INT_radio_planning_estaciones WHERE estacion='$estacion2'");

if (mysql_num_rows($sql)>0)
{
header("Location: estacion_editado.php");
 $sql7=mysql_query("UPDATE INT_radio_planning_estaciones	 
SET  estacion=	'$estacion' WHERE estacion='$estacion2' ");
 
  $sql8=mysql_query("UPDATE INT_radio_planning 
SET estacion=	'$estacion'  WHERE estacion='$estacion2' ");

 $sql9=mysql_query("UPDATE SP_dato_cliente	 
SET estacion=	'$estacion'  WHERE estacion='$estacion2' ");
} else if (mysql_num_rows($sql)==0)
{
	
header("Location: error_guardar.php");
  

} 

?>