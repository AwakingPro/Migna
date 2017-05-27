<?php
include ("../system/config.php"); 

	  
	  $senal=shell_exec("snmpwalk -c public -v 1 172.17.26.11 iso.3.6.1.4.1.14988.1.1.1.1.1.4.5");



echo $senal;

?>
