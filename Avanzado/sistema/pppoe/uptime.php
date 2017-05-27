<?php
include ('../../../system/config.php'); 
require("class.mikrotik.php");

$reg=mysql_query("SELECT * FROM PPPoE_Client");

while ($row = mysql_fetch_row($reg)){
	
	 $server=$row[3];
	 $user_pppoe=$row[4];
	 
	 $reg2=mysql_query("SELECT * FROM PPPoE_SRV WHERE nombre_server='$server'");

while ($row = mysql_fetch_row($reg2)){

     $ip_server=$row[2];
     $usuario_server=$row[4];
     $password_server=$row[5];
	 
	 
	   $API = new routeros_api();
     $API->debug = false;	   
		 if ($API->connect($ip_server,$usuario_server,$password_server)) {		
             
                     

		  
		   $API->write("/ppp/active/print",false);
                     $API->write('?name='.$user_pppoe,true);     
                     $READ = $API->read(false);
                     $ARRAY = $API->parse_response($READ);
                     $uptime2=$READ[6];
		             list($reciduo, $uptime) = explode("=uptime=", $uptime2);

		 

			$sql_update=mysql_query("UPDATE PPPoE_Client SET   uptime=	'$uptime' WHERE user_pppoe='$user_pppoe'");


	}
	else {            
	 
	 echo "no conectado";     
}
	$API->disconnect();
	 
	  }

}
   

?>