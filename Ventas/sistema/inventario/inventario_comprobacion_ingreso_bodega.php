<?php
require("../../../system/config.php");




$bodega2= $_POST["bodega"];
$bodega= trim($bodega2);

$sql=mysql_query("SELECT bodega FROM INV_bodega WHERE bodega='$bodega'  ");

if (mysql_num_rows($sql)>0)
{
header("Location: inventario_activo_duplicado.php");
} else if(mysql_num_rows($sql)==0){

header("Location: ../../../envio.php?bodega=$bodega");    
		
 
		 $sql2=mysql_query("INSERT INTO INV_bodega(bodega) values ('$bodega')");



      
        }



mysql_free_result($sql);
mysql_free_result($sql2);
mysql_close();
?>

