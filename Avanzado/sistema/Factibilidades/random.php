<?php
include("../../../system/config.php");
include("../../../services/config.php");
$Sql = mysql_query("SELECT numero FROM TICKET ");
$Ticket = 0;
while($Record = mysql_fetch_array($Sql)){
    $Random = rand(100000,999999);
    echo $Ticket  = $Record[0];
    if($Ticket==$Random){
        echo "Igual";
    }
    else{
        mysql_query("UPDATE TICKET SET numero = $Random WHERE origen='WEB'");
        echo "Actualizado";
    }
}


?>