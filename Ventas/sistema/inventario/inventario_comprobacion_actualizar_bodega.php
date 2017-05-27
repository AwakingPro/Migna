<?php

require("../../../system/config.php");
$bodega= $_POST["bodega"];
$bodega2= $_POST["bodega2"];



$sql=mysql_query("SELECT bodega FROM INV_bodega WHERE bodega='$bodega2' ");

if (mysql_num_rows($sql)>0)
{
	 $sql2=mysql_query("UPDATE INV_bodega	 
SET bodega=	'$bodega'  WHERE  bodega='$bodega2' ");

 $sql3=mysql_query("UPDATE INV_activos	 
SET bodega=	'$bodega'  WHERE  bodega='$bodega2' ");

 $sql4=mysql_query("UPDATE INV_activos_paso	 
SET bodega=	'$bodega'  WHERE  bodega='$bodega2' ");

header("Location: inventario_actualizo_activo.php");
} else if(mysql_num_rows($sql)==0){
	


header("Location: n.php");    

      
        }
mysql_free_result($sql);
mysql_free_result($sql2);
mysql_close();

?>