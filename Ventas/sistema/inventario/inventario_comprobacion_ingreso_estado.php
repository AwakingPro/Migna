<?php
require("../../../system/config.php");

$estado2 = $_POST["estado"];

$estado= trim($estado2);


$sql=mysql_query("SELECT estado FROM INV_estado WHERE estado='$estado'  ");

if (mysql_num_rows($sql)>0)
{
header("Location: inventario_activo_duplicado.php");
} else if(mysql_num_rows($sql)==0){
header("Location: inventario_ingreso_activo.php");    
		
 
		 $sql2=mysql_query("INSERT INTO INV_estado(estado) values ('$estado')");



      
        }
mysql_free_result($sql);
mysql_free_result($sql2);
mysql_close();

?>