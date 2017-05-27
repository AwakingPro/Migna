<?php
include("../../../system/config.php");

$cliente2 = $_POST["cliente2"];
$alias2 = $_POST["alias2"];
$mac_antigua = $_POST["mac2"];

$cliente = $_POST["cliente"];
$rut= $_POST["rut"];
$contactos= $_POST["contactos"];
$contrato=$_POST['contrato'];
$telefonos=$_POST['telefonos'];
$correos=$_POST['correos'];
$direccion_comercial= $_POST["direccion_comercial"];
$direccion_instalacion= $_POST["direccion_instalacion"];
$nota= $_POST["nota"];
$fecha_inst2= $_POST["fecha_inst"];
$fecha_inst=date("Y-m-d",strtotime($fecha_inst2));

$instalador= $_POST["instalador"];
$plan= $_POST["plan"];
$renta= $_POST["renta"];
$velocidad= $_POST["velocidad"];
$tipo= $_POST["tipo"];
$fidelizado2= $_POST["fidelizado"];
$fidelizado=date("Y-m-d",strtotime($fidelizado2));
$estado= $_POST["estado"];
$mac_su= $_POST["mac_su"];
$modelo_su= $_POST["modelo_su"];
$ip_su= $_POST["ip_su"];
$puerto_su= $_POST["puerto_su"];
$senal= $_POST["senal"];
$frec= $_POST["frec"];
$estacion= $_POST["estacion"];
$ap= $_POST["ap"];
$vlan= $_POST["vlan"];
$alias= $_POST["alias"];
$mac_router= $_POST["mac_router"];
$modelo_router= $_POST["modelo_router"];
$configuracion= $_POST["configuracion"];
$ip= $_POST["ip"];
$puerto_router= $_POST["puerto_router"];
$wifi= $_POST["wifi"];










$sql=mysql_query("SELECT rut FROM SP_dato_cliente WHERE rut='rut'");

if (mysql_num_rows($sql)>0)
{

header("Location: registro_duplicado.php?cliente=$cliente");	


} else  if (mysql_num_rows($sql)==0){

header("Location: dato_tecnico_actualizado.php?cliente=$cliente");
		
		
		$sql2=mysql_query("UPDATE SP_dato_cliente	 
SET contactos=	'$contactos' ,contrato=	'$contrato',telefonos='$telefonos',correos=	'$correos' ,direccion_instalacion=	'$direccion_instalacion',nota='$nota',fecha_inst=	'$fecha_inst' ,instalador=	'$instalador',plan='$plan',renta=	'$renta' ,velocidad=	'$velocidad',tipo='$tipo',fidelizado=	'$fidelizado' ,estado=	'$estado',mac_su='$mac_su' ,modelo_su='$modelo_su',ip_su='$ip_su',puerto_su='$puerto_su',senal='$senal',frec='$frec',estacion='$estacion',ap='$ap',vlan='$vlan',alias='$alias',mac_router='$mac_router',modelo_router='$modelo_router',configuracion='$configuracion',ip='$ip',puerto_router='$puerto_router',wifi='$wifi' WHERE cliente='$cliente2' AND alias='$alias2' ");

   $sql11=mysql_query("INSERT INTO INV_activos_paso SELECT * FROM INV_activos WHERE mac='$mac_antigua'");
   $sql7=mysql_query("DELETE FROM INV_activos_paso WHERE   mac='$mac_su' ");	
	
$sql4=mysql_query("UPDATE INV_activos	 
SET bodega=	'$cliente'  WHERE mac='$mac_su' ");

$sql4=mysql_query("UPDATE INV_activos_paso	 
SET bodega=	'terreno'  WHERE mac='$mac_antigua' ");
//$sql5=mysql_query("UPDATE INV_activos	 
//SET bodega=	'$cliente'  WHERE mac='$mac_router' ");
// $sql6=mysql_query("DELETE FROM INV_activos_paso WHERE  mac='$mac_router' ");
//       $sql7=mysql_query("DELETE FROM INV_activos_paso WHERE   mac='$mac_su' ");
	   



//$sql_comprobacion=mysql_query("SELECT bodega FROM INV_bodega WHERE bodega='$cliente'   ");
//		if (mysql_num_rows($sql_comprobacion)>0)
//{
	   

   
}

?>

