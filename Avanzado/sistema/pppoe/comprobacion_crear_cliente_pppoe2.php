<?php
include("../../../system/config.php");
require("class.mikrotik.php");

$cliente= $_POST["cliente"];
$alias= $_POST["alias"];
$srv= $_POST["srv"];
$user_pppoe= $_POST["user_pppoe"];
$pass_pppoe= $_POST["pass_pppoe"];
$ip_pppoe= $_POST["ip_pppoe"];
$plan= $_POST["plan"];


$sql=mysql_query("SELECT * FROM PPPoE_Client WHERE cliente='$cliente' and alias='$alias'");
if (mysql_num_rows($sql)>0)
{
header("Location: crear_cliente_pppoe.php?id=7");
} else  if (mysql_num_rows($sql)==0){

//Conexion a Servidor 

$sql_server=mysql_query("SELECT * FROM PPPoE_SRV WHERE nombre_server='$srv'");
while($row = mysql_fetch_array($sql_server))
{ 
$ip_server=$row['ip_server']; 
$user_server=$row['user_server']; 
$pass_server=$row['pass_server']; 
}

     $API = new routeros_api();
     $API->debug = false;	   
		 if ($API->connect($ip_server,$user_server,$pass_server)) {		
             
                     
		 $API->comm("/ppp/secret/add", array(
          "name"     => "$user_pppoe",
          "password" => "$pass_pppoe",
          "remote-address" => "$ip_pppoe",
          "service"  => "pppoe",
		  "profile"  => "$plan",

));
$sql3=mysql_query("INSERT INTO PPPoE_Client(cliente,alias,srv,user_pppoe,pass_pppoe,ip_pppoe,plan) values ('$cliente','$alias','$srv','$user_pppoe','$pass_pppoe','$ip_pppoe','$plan')");
header("Location: crear_servidor_pppoe.php?id=1");


	}
	else 
{      
header("Location: crear_servidor_pppoe.php?id=8");
      
}
	$API->disconnect();






   
}



?>

