<?php
require("../../../system/config.php");

$estacion = $_POST["estacion"];

$funcion= $_POST["funcion"];
$ap_id= $_POST["ap_id"];

$base_id= $_POST["base_id"];
$alarma= $_POST["alarma"];


$ip2= $_POST["ip"];
$ip= trim($ip2);

$puerto2= $_POST["puerto"];
$puerto= trim($puerto2);

$ancho_canal= $_POST["ancho_canal"];

$frecuencia=$_POST['frecuencia'];

$tx_power=$_POST['tx_power'];

$ssid2=$_POST['ssid'];
$ssid= trim($ssid2);

$mac2=$_POST['mac'];
$mac= trim($mac2);


$archivo = $_FILES["kmz"]["tmp_name"];
$tamanio = $_FILES["kmz"]["size"];
$tipo    = $_FILES["kmz"]["type"];
$nombre  = $_FILES["kmz"]["name"];
$remarks  = $_POST["remarks"];

$fp = fopen($archivo, "rb");
$kmz = fread($fp, $tamanio);
$kmz = addslashes($kmz);
fclose($fp);


$sql_ip=mysql_query("SELECT ip FROM INT_radio_planning WHERE ip='$ip'");
$sql_remarks=mysql_query("SELECT remarks FROM INT_radio_planning WHERE remarks='$remarks'");
$sql_ssid=mysql_query("SELECT ssid FROM INT_radio_planning WHERE ssid='$ssid'");

if (mysql_num_rows($sql_ip)>0)
{
header("Location: radio_planning_ingresos.php?id=0");
} else if(mysql_num_rows($sql)==0){
header("Location: radio_planning_ingresos.php?id=1");    
		
 
		 $sql2=mysql_query("INSERT INTO INT_radio_planning(estacion,funcion,ip,puerto,ancho_canal,frecuencia,tx_power,ssid,mac,kmz,nombre,ap_id,base_id,alarma) values ('$estacion','$funcion','$ip','$puerto','$ancho_canal','$frecuencia','$tx_power','$ssid','$mac','$kmz','$nombre','$ap_id','$base_id','$alarma')");



  $sql_up=mysql_query("UPDATE INV_activos	 
SET id=	1  WHERE mac='$mac' ");
}


?>