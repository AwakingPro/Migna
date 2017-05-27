<?php
require("../../../system/config.php");


$modelo= $_POST["modelo"];


$sql=mysql_query("SELECT modelo FROM INV_modelo WHERE modelo='$modelo'  ");

if (mysql_num_rows($sql)>0)
{
header("Location: inventario_activo_duplicado.php");
} else if(mysql_num_rows($sql)==0){
header("Location: inventario_ingreso_activo.php");    
		
 
		 $sql2=mysql_query("INSERT INTO INV_modelo(modelo) values ('$modelo')");



      
        }



mysql_free_result($sql);
mysql_free_result($sql2);
mysql_close();
?>

