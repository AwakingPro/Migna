<?php

require("../../../system/config.php");
$serial= $_GET["serial"];
$mac= $_GET["mac"];




$sql=mysql_query("SELECT serial,mac FROM INV_activos WHERE serial='$serial' or mac='$mac' ");

if (mysql_num_rows($sql)>0)
{
	 $sql2=mysql_query("DELETE FROM INV_activos	  WHERE serial='$serial' or mac='$mac' ");

header("Location: inventario_elimino_activo.php");
} else if(mysql_num_rows($sql)==0){
	


header("Location: n.php");    

      
        }
mysql_free_result($sql);
mysql_free_result($sql2);
mysql_close();

?>