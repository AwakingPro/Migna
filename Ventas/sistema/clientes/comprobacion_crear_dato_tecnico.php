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
$fecha_inst2= $_POST["fecha_inst"];
//formato fecha americana

$fecha_inst=date("Y-m-d",strtotime($fecha_inst2));
//El nuevo valor de la variable: $fecha2="20-10-2008"


$instalador= $_POST["instalador"];
$plan= $_POST["plan"];
$renta= $_POST["renta"];
$velocidad= $_POST["velocidad"];
$tipo= $_POST["tipo"];
$fidelizado2= $_POST["fidelizado"];

//formato fecha americana

$fidelizado=date("Y-m-d",strtotime($fidelizado2));
//El nuevo valor de la variable: $fecha2="20-10-2008"
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










$sql=mysql_query("SELECT mac_su FROM SP_dato_cliente WHERE mac_su='$mac_su'   ");

if (mysql_num_rows($sql)>0)
{
header("Location: registro_ingresado_duplicado.php?cliente=$cliente");
} else  if (mysql_num_rows($sql)==0){
header("Location: dato_tecnico_ingresado.php?cliente=$cliente");
		 $sql3=mysql_query("INSERT INTO SP_dato_cliente(cliente,rut,contactos,contrato,telefonos,correos,direccion_comercial,direccion_instalacion,nota,fecha_inst,instalador,plan,renta,velocidad,tipo,fidelizado,estado,mac_su,modelo_su,ip_su,puerto_su,senal,frec,estacion,ap,vlan,alias,mac_router,modelo_router,configuracion,ip,puerto_router,wifi) values ('$cliente','$rut','$contactos','$contrato','$telefonos','$correos','$direccion_comercial','$direccion_instalacion','$nota','$fecha_inst','$instalador','$plan','$renta','$velocidad','$tipo','$fidelizado','$estado','$mac_su','$modelo_su','$ip_su','$puerto_su','$senal','$frec','$estacion','$ap','$vlan','$alias','$mac_router','$modelo_router','$configuracion','$ip','$puerto_router','$wifi')");


 $sql4=mysql_query("UPDATE INV_activos	 
SET bodega=	'$cliente'  WHERE mac='$mac_su' ");
 $sql5=mysql_query("UPDATE INV_activos	 
SET bodega=	'$cliente'  WHERE mac='$mac_router' ");
 $sql6=mysql_query("DELETE FROM INV_activos_paso WHERE  mac='$mac_router' ");
       $sql7=mysql_query("DELETE FROM INV_activos_paso WHERE   mac='$mac_su' ");
	   



$sql_comprobacion=mysql_query("SELECT bodega FROM INV_bodega WHERE bodega='$cliente'   ");
		if (mysql_num_rows($sql_comprobacion)>0)
{
	   

      } else if(mysql_num_rows($sql)==0){
		   $sql4=mysql_query("INSERT INTO INV_bodega(bodega) values ('$cliente')");
        }
}


?>

