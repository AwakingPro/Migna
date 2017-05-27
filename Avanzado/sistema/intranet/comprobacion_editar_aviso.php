<?php

require("../../../system/config.php");
$id_aviso= $_GET["id_aviso"];


$sql=mysql_query("SELECT id FROM INT_avisos WHERE id='$id_aviso'  ");

if (mysql_num_rows($sql)>0)
{
header("Location: modificar_avisos.php?id_aviso=$id_aviso");
} else if(mysql_num_rows($sql)==0){
header("Location: avisos.php?id=10");    
	   




      
        }
mysql_free_result($sql);
mysql_free_result($sql2);
mysql_close();

?>