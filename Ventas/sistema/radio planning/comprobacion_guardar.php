<?php
require("../../../system/config.php");

$estacion = $_POST["estacion"];
$funcion= $_POST["funcion"];
$ip= $_POST["ip"];
$puerto= $_POST["puerto"];
$marca= $_POST["marca"];
$modelo=$_POST["modelo"];
$password=$_POST["password"];
$canal=$_POST["canal"];
$ancho_canal= $_POST["ancho_canal"];
$frecuencia=$_POST['frecuencia'];
$tx_power=$_POST['tx_power'];
$base_id=$_POST['base_id'];
$ap_id=$_POST['ap_id'];
$ssid=$_POST['ssid'];
$mac=$_POST['mac'];
$remarks=$_POST['remarks'];
$ip_antigua=$_POST['ip_antigua'];

$mac_antigua=$_POST['mac_antigua'];


$sql_ip=mysql_query("SELECT ip FROM INT_radio_planning WHERE ip='$ip_antigua'");

if (mysql_num_rows($sql_ip2)>0)
{
header("Location: registro_duplicado_ips.php?ip=$ip");
} else if (mysql_num_rows($sql_ip)>0)
{
	
header("Location: registro_editado.php");
 $sql7=mysql_query("UPDATE INT_radio_planning	 
SET  estacion=	'$estacion',ip=	'$ip',funcion=	'$funcion' ,puerto=	'$puerto',marca=	'$marca',modelo=	'$modelo',password=	'$password',canal=	'$canal' ,ancho_canal=	'$ancho_canal' ,frecuencia=	'$frecuencia',tx_power=	'$tx_power',base_id=	'$base_id',ap_id=	'$ap_id' ,mac=	'$mac',ssid=	'$ssid',remarks=	'$remarks' WHERE ip='$ip_antigua' ");
 
 $sql8=mysql_query("UPDATE SP_dato_cliente	 
SET ap=	'$ip'  WHERE ap='$ip_antigua' ");

 $sql6=mysql_query("DELETE FROM INV_activos_paso WHERE  mac='$mac' ");
 
  $sql9=mysql_query("UPDATE INV_activos	 
SET bodega=	'$estacion'  WHERE mac='$mac' ");

  $sql10=mysql_query("UPDATE INV_activos	 
SET bodega=	'terreno'  WHERE mac='$mac_antigua' ");
   $sql11=mysql_query("INSERT INTO INV_activos_paso SELECT * FROM INV_activos WHERE mac='$mac_antigua'");
  $sql5=mysql_query("UPDATE  INV_activos_paso SET mac='$mac_antigua' WHERE mac='$mac'");
  
  

} 

?>