<?php
include("../../../system/config.php");
$cliente = $_POST["cliente"];
$rut= $_POST["rut"];

$linea1= $_POST["linea1"];
$linea2=$_POST['linea2'];
$linea3=$_POST['linea3'];
$linea4=$_POST['linea4'];
$plan= $_POST["plan"];
$fecha_inst= $_POST["fecha_inst"];
$mac= $_POST["mac"];
$alias= $_POST["alias"];

$sql=mysql_query("SELECT * FROM SP_dato_cliente WHERE cliente='$cliente' ");
$sql_voip=mysql_query("SELECT * FROM SP_servicio_voip WHERE cliente='$cliente' and alias='$alias' ");

if (mysql_num_rows($sql)>0)
{
	if (mysql_num_rows($sql_voip)==0 )
	{
				 $sql3=mysql_query("INSERT INTO SP_servicio_voip(cliente,rut,linea1,linea2,linea3,linea4,plan,fecha_inst,mac,alias) values ('$cliente','$rut','$linea1','$linea2','$linea3','$linea4','$plan','$fecha_inst','$mac','$alias')");
				 header("Location: clientes_busqueda_ingreso_dato_tecnico.php?id=9");
		}

   else  if (mysql_num_rows($sql_voip)>=1){
	
header("Location: clientes_busqueda_ingreso_dato_tecnico.php?id=8");
	

}

else if (mysql_num_rows($sql)==0){
	header("Location: clientes_busqueda_ingreso_dato_tecnico.php?id=10");

	
	}

}






?>
