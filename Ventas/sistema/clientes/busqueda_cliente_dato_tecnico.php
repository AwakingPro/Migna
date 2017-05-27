<?php

require_once "../../../system/config.php";

$q = strtolower($_GET["q"]);
if (!$q) return;

$sql = "select DISTINCT cliente as cliente from SP_soporte_crear_cliente where cliente LIKE '%$q%'";
$rsd = mysql_query($sql);

while($rs = mysql_fetch_array($rsd)) {
	
        $cname = $rs['cliente'];
        echo "$cname\n";
}
?>