<?php
include("../../../system/config.php");
$cliente = $_POST["cliente"];
$rut= $_POST["rut"];
$servicio= $_POST["servicio"];
$fecha_habilitacion=$_POST['fecha_habilitacion'];
$descripcion=$_POST['descripcion'];
$alias= $_POST["alias"];

$sql=mysql_query("SELECT * FROM SP_dato_cliente WHERE cliente='$cliente' ");
$sql_otros=mysql_query("SELECT * FROM SP_servicio_otros WHERE cliente='$cliente' and alias='$alias' ");

if (mysql_num_rows($sql)>0)
{
	if (mysql_num_rows($sql_otros)==0 )
	{
				 $sql3=mysql_query("INSERT INTO SP_servicio_otros(cliente,rut,servicio,fecha_habilitacion,descripcion,alias) values ('$cliente','$rut','$servicio','$fecha_habilitacion','$descripcion','$alias')");
				 header("Location: clientes_busqueda_ingreso_dato_tecnico.php?id=9");
		}

   else  if (mysql_num_rows($sql_otros)>=1){
	
header("Location: clientes_busqueda_ingreso_dato_tecnico.php?id=7");
	

}

else if (mysql_num_rows($sql)==0){
	header("Location: clientes_busqueda_ingreso_dato_tecnico.php?id=10");

	
	}

}






?>
