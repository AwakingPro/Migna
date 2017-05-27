<?php

require("../../../system/config.php");

$tipo= $_POST["tipo"];



$sql=mysql_query("SELECT tipo FROM INV_tipo WHERE  tipo='$tipo'");

if (mysql_num_rows($sql)>0)
{
header("Location: inventario_modificar_seleccione_tipo.php?tipo=$tipo");
} else if(mysql_num_rows($sql)==0){
header("Location: bodega_sin_registro.php");    
	
      
        }
mysql_free_result($sql);
mysql_free_result($sql2);
mysql_close();

?>