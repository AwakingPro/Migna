<?php
require("../../../system/config.php");

$id_aviso= $_GET["id_aviso"];




if (isset($_GET['Si']))
{
header("Location: avisos.php?id=4");

$DEL=mysql_query("DELETE  FROM INT_avisos WHERE  id='$id_aviso' ");


}
if (isset($_GET['No']))
{
header("Location: avisos.php");


}



 		
 
//}


?>