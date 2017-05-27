<?php

require_once "../../../system/config.php";

$q = strtolower($_GET["q"]);
if (!$q) return;

$sql = "select DISTINCT rut as rut from SP_soporte_crear_cliente where rut LIKE '%$q%'";
$rsd = mysql_query($sql);

while($rs = mysql_fetch_array($rsd)) {
	
        $cname = $rs['rut'];
        echo "$cname\n";
}
?>