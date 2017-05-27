<?php

include("system/config.php");

$id= $_GET["id"];



$sql=mysql_query("SELECT file,nombre_aleatorio,nombre,tipo FROM take_a_file WHERE nombre_aleatorio='$id'");



while ($row = mysql_fetch_row($sql)){
	$nombre=$row[2]; 
	$trozos = explode(".", $nombre); 
    $extension = end($trozos); 
	
	
	$tipo=$row[3]; 
	
 header("Content-type: application/octet-stream");
 header("Content-Description: File Transfer");
        header("Content-Type: $tipo; ");
        header("Content-Disposition: attachment; filename=$nombre");
        header("Content-Transfer-Encoding: binary");
 echo $row[0]; 

}

?>