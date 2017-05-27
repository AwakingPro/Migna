<?php

include("../../../system/config.php");
session_cache_limiter();
$proc= $_GET["proc"];


$sql=mysql_query("SELECT * FROM SIS_manual WHERE proc='$proc'");


while ($row = mysql_fetch_row($sql)){
       

// Vamos a mostrar un PDF
header('Content-type: application/pdf');

// Se llamará downloaded.pdf
header('Content-Disposition: attachment; filename="descarga.pdf"');

// La fuente de PDF se encuentra en original.pdf
readfile('descarga.pdf');

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Fecha en el pasado

}

?>


