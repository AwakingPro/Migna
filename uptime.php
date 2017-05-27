<?php
//include ('../../system/config.php'); 
require("class.mikrotik.php");


$usuario2="ZWF-06-06-01";
$ip_server="10.52.0.2";
$usuario_server="PPPoE";
$password_server="p9p7p5o3e";
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
                      $delete=$READ[6];
		

		 echo $delete;
		 echo "conectado";  
		   //$API->write("ppp active remove numbers=$delete2",true);
         // $API->comm("/ppp/active/remove", array(
         //"numbers"     => "$delete2",
		 // ));

	}
	else {            echo "no conectado";     
}
	$API->disconnect();

?>