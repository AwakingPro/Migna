<?php
require("../../../system/config.php");


$tipo= $_POST["tipo"];


$sql=mysql_query("SELECT tipo FROM INV_tipo WHERE tipo='$tipo'  ");

if (mysql_num_rows($sql)>0)
{
header("Location: inventario_activo_duplicado.php");
} else if(mysql_num_rows($sql)==0){
header("Location: inventario_ingreso_activo.php");    
		
 
		 $sql2=mysql_query("INSERT INTO INV_tipo(tipo) values ('$tipo')");



      
        }



mysql_free_result($sql);
mysql_free_result($sql2);
mysql_close();
?>

