<?php
include("../../../system/config.php");
$cliente= $_POST["cliente"];
$sql=mysql_query("SELECT * FROM SP_dato_cliente WHERE cliente='$cliente' ");
if (mysql_num_rows($sql)>=1)
{
header("Location: crear_cliente_pppoe2.php?cliente=$cliente");    
}
else  if (mysql_num_rows($sql)==0){
header("Location: crear_cliente_pppoe.php?id=6");     
}
?>

