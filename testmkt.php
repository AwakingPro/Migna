<?php
//include ('../../system/config.php'); 
require("class.mikrotik.php");




$ip_server="192.168.50.13";
$usuario_server="admin";
$password_server="m9a7r5s3";
     $API = new routeros_api();
     $API->debug = false;	   
		 if ($API->connect($ip_server,$usuario_server,$password_server)) {		
             
                     
		$ARRAY = $API->comm("/interface/wireless/scan WLAN");

//Leemos la respuesta y la mandamos a una variable
$READ = $API->read(false);

//Parseamos el resultado (Lo hacemos facil de leer)
$ARRAY = $API->parse_response($READ);

//imprimimos todo lo que esta contenido en la variable
echo "<pre>";
var_dump($ARRAY);
echo "</pre>";




	}
	else {            echo "no conectado";     
}
	$API->disconnect();
	echo "Listo";
?>