<?php
include("../../../system/config.php");

$cliente = $_POST["cliente"];
$rut= $_POST["rut"];
$alias= $_POST["alias"];

//Otros Valores
$via= $_POST["via"];
$fecha_sol= $_POST["fecha_sol"];
$motivo=$_POST['motivo'];
$estado=$_POST['estado'];
$fecha_retiro= $_POST["fecha_retiro"];
$comentario_retiro= $_POST["comentario_retiro"];




$sql_cliente=mysql_query("SELECT cliente FROM SP_soporte_crear_cliente WHERE  rut='$rut' OR cliente='$cliente'");
	
	if (mysql_num_rows($sql_cliente)>0)
	{
		
$sql2=mysql_query("UPDATE SP_dato_cliente	 
SET via=	'$via' ,fecha_sol=	'$fecha_sol',motivo=	'$motivo',estado='$estado',fecha_retiro=	'$fecha_retiro' ,comentario_retiro=	'$comentario_retiro' WHERE cliente='$cliente' AND alias='$alias'");

header("Location:  retiros_por_gestionar.php?cliente=$cliente&id=1");


  // $sql11=mysql_query("INSERT INTO INV_activos_paso SELECT * FROM INV_activos WHERE mac='$mac_antigua'");
   //$sql7=mysql_query("DELETE FROM INV_activos_paso WHERE   mac='$mac_su' ");	
	
//$sql4=mysql_query("UPDATE INV_activos	 SET id='0'  WHERE mac='$mac_antigua' ");
//$sql5=mysql_query("UPDATE INV_activos	 SET id='0'  WHERE mac='$mac_antigua_router' ");
//$sql2=mysql_query("UPDATE INV_activos	 SET id='1'  WHERE mac='$mac_su' ");
//$sql3=mysql_query("UPDATE INV_activos	 SET id='1'  WHERE mac='$mac_router' ");	

//$sql4=mysql_query("UPDATE INV_activos_paso	 
//SET bodega=	'terreno'  WHERE mac='$mac_antigua' ");
//$sql5=mysql_query("UPDATE INV_activos	 
//SET bodega=	'$cliente'  WHERE mac='$mac_router' ");
// $sql6=mysql_query("DELETE FROM INV_activos_paso WHERE  mac='$mac_router' ");
//       $sql7=mysql_query("DELETE FROM INV_activos_paso WHERE   mac='$mac_su' ");
	   

	}
	else
	{
		header("Location:  retiros_por_gestionar.php?cliente=$cliente&id=1");

		}


?>

