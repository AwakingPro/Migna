<?php
include("../../../system/config.php");
include("../../../services/config.php");
$Sql = mysql_query("SELECT numero,id FROM TICKET ");
$Ticket = 0;
while($Record = mysql_fetch_array($Sql)){
    $Random = rand(100000,999999);
    echo $Ticket  = $Record[0];
    $Id = $Record[1];
    if($Ticket==$Random){
        echo "Igual";
    }
    else{
        mysql_query("UPDATE TICKET SET numero = $Random WHERE origen='WEB' AND id = $Id");
        echo "Actualizado";
    }
}


?>