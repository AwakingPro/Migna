<?php
include("../../../system/config.php");

 $cliente2 = $_POST["cliente2"];
 $rut2 = $_POST["rut2"];

 $cliente = $_POST["cliente"];
 
$rut= $_POST["rut"];
$giro= $_POST["giro"];
$contacto= $_POST["contacto"];
$telefonos=$_POST['telefonos'];
$correos=$_POST['correos'];
$direccion_comercial= $_POST["direccion_comercial"];
 


$sql_nombre=mysql_query("SELECT rut FROM SP_soporte_crear_cliente WHERE  rut='$rut' AND NOT rut='$rut2'");
	
	if (mysql_num_rows($sql_nombre)>0)
	{
		header("Location: ver_datos_com?cliente=$cliente&id=2");

		}
else if (mysql_num_rows($sql_alias)==0){


		
$sql2=mysql_query("UPDATE SP_soporte_crear_cliente	 
SET cliente=	'$cliente' ,rut=	'$rut',giro=	'$giro',contacto='$contacto',telefonos=	'$telefonos' ,correos=	'$correos',direccion_comercial='$direccion_comercial' WHERE cliente='$cliente2' AND rut='$rut2' ");

$sql3=mysql_query("UPDATE SP_dato_cliente	 
SET cliente=	'$cliente' ,rut=	'$rut',contactos=	'$contacto',telefonos=	'$telefonos' ,correos=	'$correos',direccion_comercial='$direccion_comercial' WHERE cliente='$cliente2' AND rut='$rut2' ");

$sql4=mysql_query("UPDATE TICKET	 
SET cliente=	'$cliente'  WHERE cliente='$cliente2' ");

$sql5=mysql_query("UPDATE TICKET_comentario_interno	 
SET cliente=	'$cliente'  WHERE cliente='$cliente2' ");

header("Location:  ver_datos_com?cliente=$cliente&id=1");


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


?>

