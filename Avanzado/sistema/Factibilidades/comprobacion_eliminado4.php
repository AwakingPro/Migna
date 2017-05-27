<?php
require("../../../system/config.php");

$numero= $_GET["numero"];

$ticket_filter= $_GET["ticket_filter"];

$cliente= $_GET["cliente"];

if (isset($_GET['Si']))
{
header("Location: asignar_factibilidades.php?id=3&ticket_filter=$ticket_filter");
$DEL=mysql_query("DELETE  FROM TICKET_comentario_interno WHERE  cliente='$cliente' and numero='$numero'");
$DEL=mysql_query("DELETE  FROM TICKET WHERE  cliente='$cliente' and numero='$numero'");

}
if (isset($_GET['No']))
{
header("Location: asignar_factibilidades.php?ticket_filter=$ticket_filter");


}



 		
 
//}


?>