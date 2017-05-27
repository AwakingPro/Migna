<?php
//include ('../../system/config.php'); 
require("class.mikrotik.php");

$usuario=$_POST['usuario'];
$password=$_POST['password'];
$ip=$_POST['ip'];

$mac="ayanezf";
$ip_server="172.16.1.254";
$usuario_server="admin";
$password_server="m9a7r5s3";
     $API = new routeros_api();
     $API->debug = false;	   
		 if ($API->connect($ip_server,$usuario_server,$password_server)) {		
             
 $API->write("/ppp/active/print",false);
                     $API->write('?name='.$mac,true);     
                     $READ = $API->read(false);
                     $ARRAY = $API->parse_response($READ);
                     $delete=$READ[1];

		 }
	else {            echo "no conectado";     
}
	$API->disconnect();
	echo "Listo";
?>