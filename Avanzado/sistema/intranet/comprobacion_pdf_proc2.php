<?php
include("../../../system/config.php");
$proc= $_GET["proc"];

$sql=mysql_query("SELECT pdf,nombre FROM SIS_procedimientos WHERE proc='$proc'");

while ($row = mysql_fetch_row($sql)){
	
 header("Content-type: application/octet-stream");
 header("Content-Description: File Transfer");
        header("Content-Type: application/octet-stream; ");
        header("Content-Disposition: attachment; filename=$proc.pdf");
        header("Content-Transfer-Encoding: binary");
 echo $row[0]; 


}

?>
