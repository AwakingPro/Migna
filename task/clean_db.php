<?php
require("../system/config.php");

if (1==1){
$sql=mysql_query("DELETE FROM SP_dato_cliente WHERE cliente=''");
$sql=mysql_query("DELETE FROM SP_soporte_crear_cliente WHERE cliente=''");
}
?>