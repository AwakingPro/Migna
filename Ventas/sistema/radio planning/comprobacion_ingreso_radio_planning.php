<?php
require("../../../system/config.php");

$estacion = $_POST["estacion"];
$funcion= $_POST["funcion"];
$ip2= $_POST["ip"];
$ip= trim($ip2);
$puerto2= $_POST["puerto"];
$puerto= trim($puerto2);
$marca= $_POST["marca"];
$marca2= $_POST["marca"];
$asignado= $_POST["asignado"];
$marca= trim($marca2);
$modelo=$_POST["modelo"];
$password=$_POST["password"];
$canal=$_POST["canal"];
$ancho_canal= $_POST["ancho_canal"];
$frecuencia=$_POST['frecuencia'];
$tx_power=$_POST['tx_power'];
$base_id=$_POST['base_id'];
$ap_id=$_POST['ap_id'];
$ssid2=$_POST['ssid'];
$ssid= trim($ssid2);
$mac2=$_POST['mac'];
$mac= trim($mac2);
$remarks2=$_POST['remarks'];
$remarks= trim($remarks2);

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
header("Location: registro_duplicado_ips.php?ip=$ip");
} else if(mysql_num_rows($sql_remarks)>0){
header("Location: registro_duplicado_remarks.php?remarks=$remarks");
} else if(mysql_num_rows($sql_ssid)>0){
header("Location: registro_duplicado_ssid.php?ssid=$ssid");
} else if(mysql_num_rows($sql)==0){
header("Location: registro_ingresado.php");    
		
 
		 $sql2=mysql_query("INSERT INTO INT_radio_planning(estacion,funcion,ip,puerto,marca,modelo,password,canal,ancho_canal,frecuencia,tx_power,base_id,ap_id,ssid,mac,remarks,kmz,nombre) values ('$estacion','$funcion','$ip','$puerto','$marca','$modelo','$password','$canal','$ancho_canal','$frecuencia','$tx_power','$base_id','$ap_id','$ssid','$mac','$remarks','$kmz','$nombre')");



 $sql4=mysql_query("UPDATE INV_activos	 
SET bodega=	'$estacion'  WHERE mac='$mac'");

 $sql6=mysql_query("DELETE FROM INV_activos_paso WHERE  mac='$mac'");
        $sql_comprobacion=mysql_query("SELECT bodega FROM INV_bodega WHERE bodega='$estacion'");
		if (mysql_num_rows($sql_comprobacion)>0)
{
	   

      } else if(mysql_num_rows($sql)==0){
		   $sql5=mysql_query("INSERT INTO INV_bodega(bodega) values ('$estacion')");
        }
		header("Location: confirmacion_ingreso_radio_planning.php?mac=$mac&estacion=$estacion&modelo=$modelo&marca=$marca&ssid=$ssid&ip=$ip&funcion=$funcion&asignado=$asignado");  
}


?>