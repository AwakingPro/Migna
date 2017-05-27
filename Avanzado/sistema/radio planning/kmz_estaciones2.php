<?php

include("../../../system/config.php");
$remarks= $_GET["remarks"];
$ssid= $_GET["ssid"];


$sql=mysql_query("SELECT kmz,nombre FROM INT_radio_planning WHERE remarks='$remarks'");



while ($row = mysql_fetch_row($sql)){
	
 header("Content-type: application/octet-stream");
 header("Content-Description: File Transfer");
        header("Content-Type: application/octet-stream; ");
        header("Content-Disposition: attachment; filename=Estacion.kml");
        header("Content-Transfer-Encoding: binary");
 echo $row[0]; 

}

?>