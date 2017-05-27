<?php

include("../../system/config.php");

$proc= $_GET["proc"];


$sql=mysql_query("SELECT * FROM SIS_procedimientos WHERE proc='$proc'");


while ($row = mysql_fetch_row($sql)){
       

header("Content-type: application/pdf");
header("Content-Description:File Transfer");
header("Content-type: application/pdf");

       header("Content-Disposition: attachment; filename=$descarga.pdf");
        header("Content-Transfer-Encoding: binary");
 echo $row[0]; 


}


?>


