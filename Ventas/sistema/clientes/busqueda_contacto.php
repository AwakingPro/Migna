<?php

require_once "../../../system/config.php";

$q = strtolower($_GET["q"]);
if (!$q) return;

$sql = "select DISTINCT contactos as contactos from SP_dato_cliente where contactos LIKE '%$q%'";
$rsd = mysql_query($sql);

while($rs = mysql_fetch_array($rsd)) {
	
        $cname = $rs['contactos'];
        echo "$cname\n";
}
?>