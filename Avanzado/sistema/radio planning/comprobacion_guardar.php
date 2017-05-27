<?php
require("../../../system/config.php");

$estacion = $_POST["estacion"];
$funcion= $_POST["funcion"];
$ip= $_POST["ip"];
$puerto= $_POST["puerto"];
$ancho_canal= $_POST["ancho_canal"];
$frecuencia=$_POST['frecuencia'];
$tx_power=$_POST['tx_power'];
$base_id=$_POST['base_id'];
$ap_id=$_POST['ap_id'];
$ssid=$_POST['ssid'];
$mac=$_POST['mac'];
$ip_antigua=$_POST['ip_antigua'];
$mac_antigua=$_POST['mac_antigua'];
$alarma=$_POST['alarma'];
$url=$_POST['url'];






$sql_ip=mysql_query("SELECT ip FROM INT_radio_planning WHERE ip='$ip' AND NOT ip='$ip_antigua'");

if (mysql_num_rows($sql_ip)>0)
{
header("Location: registro_duplicado_ips.php?ip=$ip");
} else if (mysql_num_rows($sql_ip)==0)
{
	
header("Location: editar_registro.php?id=1&ip=$ip&ssid=$ssid");
 $sql7=mysql_query("UPDATE INT_radio_planning	 
SET  url='$url' , estacion=	'$estacion',ip=	'$ip',funcion=	'$funcion' ,puerto=	'$puerto',marca=	'$marca',modelo=	'$modelo',password=	'$password',canal=	'$canal' ,ancho_canal=	'$ancho_canal' ,frecuencia=	'$frecuencia',tx_power=	'$tx_power',base_id=	'$base_id',ap_id=	'$ap_id' ,mac=	'$mac',ssid=	'$ssid',remarks=	'$remarks',alarma='$alarma'   WHERE ip='$ip_antigua' ");

 
 $sql8=mysql_query("UPDATE SP_dato_cliente	 
SET ap=	'$ip'  WHERE ap='$ip_antigua' ");

 $sql4=mysql_query("UPDATE INV_activos	 SET id='0'  WHERE mac='$mac_antigua' ");
 
  $sql5=mysql_query("UPDATE INV_activos	 SET id='1'  WHERE mac='$mac' ");

  
  

} 

?>