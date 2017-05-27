<?php
//include ('../../system/config.php'); 
require("class.mikrotik.php");

$usuario=$_POST['usuario'];
$password=$_POST['password'];
$ip=$_POST['ip'];
$usuario2="hmunoz";
$ip_server="172.16.1.254";
$usuario_server="admin";
$password_server="m9a7r5s3";
     $API = new routeros_api();
     $API->debug = false;	   
		 if ($API->connect($ip_server,$usuario_server,$password_server)) {		
             
                     
		 //$API->comm("/ppp/secret/remove", array(
          //"numbers"     => "ayanezf",
		  //));
		  
		   $API->write("/ppp/active/print",false);
                     $API->write('?name='.$usuario2,true);     
                     $READ = $API->read(false);
                     $ARRAY = $API->parse_response($READ);
                      $delete=$READ[1];
		 list($reciduo, $delete2) = explode("=.id=", $delete);

		 echo $delete2;
		   //$API->write("ppp active remove numbers=$delete2",true);
          $API->comm("/ppp/active/remove", array(
         "numbers"     => "$delete2",
		  ));

	}
	else {            echo "no conectado";     
}
	$API->disconnect();

?>