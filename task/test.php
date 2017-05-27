
<?php
include ("../system/config.php"); 
 
$sql_main = mysql_query("SELECT ip FROM INT_radio_planning WHERE marca='Ubiquiti Networks' and up='1' LIMIT 20");
while($row = mysql_fetch_array($sql_main))
{
	$ip=$row['ip'];
	$conexion='';
	$reciduo="";
	$conexion2="";
	$connection = @ssh2_connect("$ip", 22);
	if (@ssh2_auth_password($connection, 'ubnt', 'NeT357')) 
	{
		$stream = ssh2_exec($connection, 'ubntbox mca-status | grep "wlanConnections"');
		while(!feof($stream)) 
		{
 			$conexion .= fread($stream, 1024);
 			list($reciduo, $conexion2) = explode("=", $conexion);
		}
	 	echo $conexion2;
	} 
	else 
	{
		die('Authentication Failed...');
	}

}

?>
