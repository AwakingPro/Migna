<?php

require("../../../system/config.php");
$bodega= $_GET["bodega"];




$sql=mysql_query("SELECT bodega FROM INV_bodega WHERE bodega='$bodega'  ");

if (mysql_num_rows($sql)>0)
{
header("Location: inventario_editar_bodega.php?bodega=$bodega");
} else if(mysql_num_rows($sql)==0){
header("Location: no_registro.php");    
      
        }
mysql_free_result($sql);
mysql_free_result($sql2);
mysql_close();

?>