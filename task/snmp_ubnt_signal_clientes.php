<?php
include ("../system/config.php"); 
 
$sql_main = mysql_query("SELECT ip_su FROM SP_dato_cliente WHERE estado='Activo'");
   while($row = mysql_fetch_array($sql_main))
    {
	  $ip_su=$row['ip_su'];  
	  $senal_live='0';
	  $senal_live2='0';
      $senal=shell_exec("snmpwalk -c public -v 1 '$ip_su' iso.3.6.1.4.1.14988.1.1.1.1.1.4.5"); 
        



 list($reciduo, $senal_live2) = explode(":", $senal);

	

echo $senal_live2."<br>";
	 $sql_update=mysql_query("UPDATE SP_dato_cliente SET senal_live='$senal_live2'  WHERE  ip_su='$ip_su' ");


    



}

?>
