<?php
include("../../../system/config.php");
$cliente = $_POST["cliente"];
$rut= $_POST["rut"];
$contactos= $_POST["contactos"];
$contrato=$_POST['contrato'];
$telefonos=$_POST['telefonos'];
$correos=$_POST['correos'];
$direccion_comercial= $_POST["direccion_comercial"];
$direccion_instalacion= $_POST["direccion_instalacion"];
$nota= $_POST["nota"];
$fecha_inst= $_POST["fecha_inst"];
$instalador= $_POST["instalador"];
$plan= $_POST["plan"];
$velocidad= $_POST["velocidad"];
$tipo= $_POST["tipo"];
$estado= $_POST["estado"];
$mac_su= $_POST["mac_su"];
$ip_su= $_POST["ip_su"];
$senal= $_POST["senal"];
$ap= $_POST["ap"];
$alias= $_POST["alias"];
$mac_router= $_POST["mac_router"];
$configuracion= $_POST["configuracion"];
$ip= $_POST["ip"];











$sql=mysql_query("SELECT mac_su FROM SP_dato_cliente WHERE mac_su='$mac_su'  AND NOT mac_su='No registra' ");

if (mysql_num_rows($sql)>0)
{
header("Location: clientes_ingreso_dato_tecnico.php?cliente=$cliente&id=10");
} else  if (mysql_num_rows($sql)==0){
	
	$sql_alias=mysql_query("SELECT alias FROM SP_dato_cliente WHERE alias='$alias'  AND cliente='$cliente'");
	
	if (mysql_num_rows($sql_alias)>0)
	{
		header("Location: clientes_ingreso_dato_tecnico.php?cliente=$cliente&id=10");

		}
	else  if (mysql_num_rows($sql_alias)==0){
	
header("Location: clientes_ingreso_dato_tecnico.php?cliente=$cliente&id=1");
		 $sql3=mysql_query("INSERT INTO SP_dato_cliente(cliente,rut,contactos,contrato,telefonos,correos,direccion_comercial,direccion_instalacion,nota,fecha_inst,instalador,plan,velocidad,tipo,estado,mac_su,ip_su,senal,ap,alias,mac_router,configuracion,ip) values ('$cliente','$rut','$contactos','$contrato','$telefonos','$correos','$direccion_comercial','$direccion_instalacion','$nota','$fecha_inst','$instalador','$plan','$velocidad','$tipo','$estado','$mac_su','$ip_su','$senal','$ap','$alias','$mac_router','$configuracion','$ip')");


 
 $sql_up=mysql_query("UPDATE INV_activos	 
SET id=	1  WHERE mac='$mac_su' ");
	   
 $sql_up2=mysql_query("UPDATE INV_activos	 
SET id=	1  WHERE mac='$mac_router' ");

}


}









?>
