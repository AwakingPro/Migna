<?php
require("../../../system/config.php");


$marca= $_POST["marca"];


$sql=mysql_query("SELECT marca FROM INV_marca WHERE marca='$marca'  ");

if (mysql_num_rows($sql)>0)
{
header("Location: inventario_activo_duplicado.php");
} else if(mysql_num_rows($sql)==0){
header("Location: inventario_ingreso_activo.php");    
		
 
		 $sql2=mysql_query("INSERT INTO INV_marca(marca) values ('$marca')");



      
        }



mysql_free_result($sql);
mysql_free_result($sql2);
mysql_close();
?>

