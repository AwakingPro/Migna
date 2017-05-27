<?php
include("../../../system/config.php");
$fecha1 = $_POST["fecha1"];
$fecha2= $_POST["fecha2"];









$sql=mysql_query("SELECT mac_su FROM SP_dato_cliente WHERE mac_su='$mac_su'   ");

if (mysql_num_rows($sql)>0)
{
header("Location: ver_instalaciones.php?cliente=$cliente");
} else  {
header("Location: ver_instalaciones.php?fecha1=$fecha1&fecha2=$fecha2");

}


?>

