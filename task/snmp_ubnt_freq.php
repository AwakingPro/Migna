<?php
include ("../system/config.php"); 
 
$sql_main = mysql_query("SELECT ip FROM INT_radio_planning WHERE marca='Ubiquiti Networks' and up='1' ");
   while($row = mysql_fetch_array($sql_main))
    {
	  $ip=$row['ip'];  
	    
		$ccq_live='';
if ($connection = ssh2_connect("$ip", 22)){
ssh2_auth_password($connection, 'ubnt', '842ubnt2');
$stream = ssh2_exec($connection, 'ubntbox mca-status  | grep "freq"');
while(!feof($stream)) {
 $ccq_live .= fread($stream, 1024);
 list($reciduo, $ccq_live2) = explode("=", $ccq_live);
}
$ccq_live3=$ccq_live2." MHz";
	 $sql_update=mysql_query("UPDATE INT_radio_planning SET freq_live='$ccq_live3'  WHERE  ip='$ip' ");
}

    else {
		
		
		$ccq_live3="no data";
	 $sql_update=mysql_query("UPDATE INT_radio_planning SET freq_live='$ccq_live3'  WHERE  ip='$ip' ");
		
		}



}

?>
