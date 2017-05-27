<?php

require("class.mikrotik.php");

$user_pppoe='ZWF-06-06-01';
     $ip_server="10.52.0.2";
     $usuario_server="PPPoE";
     $password_server="p9p7p5o3e";
	 
	 
	   $API = new routeros_api();
     $API->debug = false;	   
		 if ($API->connect($ip_server,$usuario_server,$password_server)) {		
             
                     
 echo " conectado";  
		  
		   $API->write("/interface/pppoe-server/print",false);
                     $API->write('?user='.$user_pppoe,true);     
                     $READ = $API->read(false);
                     $ARRAY = $API->parse_response($READ);
                     echo $READ[0];
					 echo $READ[1];
					 echo $READ[2];
					 echo $READ[3];
					 echo $READ[4];
					 echo $READ[5];
					 echo $READ[6];
					 echo $READ[7];
					 echo $READ[8];
					 echo $READ[9];

		 


}

	else {            
	 
	 echo "no conectado";     
}
	$API->disconnect();
	 



   

?>