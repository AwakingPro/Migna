<?php
include("../../../system/config.php");

$nombre_server= $_POST["nombre_server"];
$estacion= $_POST["estacion"];
$ip_server= $_POST["ip_server"];
$user_server= $_POST["user_server"];
$pass_server= $_POST["pass_server"];
$modelo= $_POST["modelo"];




$sql=mysql_query("SELECT * FROM PPPoE_SRV WHERE nombre_server='$nombre_server' OR ip_server='$ip_server'");

if (mysql_num_rows($sql)>0)
{
header("Location: crear_servidor_pppoe.php?id=2");
} else  if (mysql_num_rows($sql)==0){
header("Location: crear_servidor_pppoe.php?id=1");


		 $sql3=mysql_query("INSERT INTO PPPoE_SRV(nombre_server,estacion,ip_server,user_server,pass_server,modelo) values ('$nombre_server','$estacion','$ip_server','$user_server','$pass_server','$modelo')");

      
}



?>

