<?php
include ('../../../system/config.php'); 
require("class.mikrotik.php");

$sql_server=mysql_query("SELECT * FROM PPPoE_SRV ");
while($row = mysql_fetch_array($sql_server))
{ 
$ip_server=$row['ip_server']; 
$user_server=$row['user_server']; 
$pass_server=$row['pass_server']; 


$cpu='0';

 	 $API = new routeros_api();
     $API->debug = false;	   
		if ($API->connect($ip_server,$user_server,$pass_server)) 
          {
            $ARRAY = $API->comm("/system/resource/print");
            $first = $ARRAY['0'];
             echo $cpu= $first['cpu-load'];
            
	          
							 
			 			 
$API->write('/ppp/active/print',false);
 $API->write('=count-only=');

   $READ = $API->read(false);
   $ARRAY = $API->parse_response($READ);


	$pppoe_client=substr($READ[1],5);
		   
	            $sql_cpu=mysql_query ("UPDATE PPPoE_SRV SET cpu = '$cpu',pppoe_client = '$pppoe_client' WHERE   ip_server='$ip_server' ");
					   
	                      
			  }
$API->disconnect();
}

	 
		




?>