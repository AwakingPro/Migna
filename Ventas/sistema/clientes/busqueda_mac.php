<?php

require_once "../../../system/config.php";

$q = strtolower($_GET["q"]);
if (!$q) return;

$sql = "select DISTINCT mac_su as mac_su from SP_dato_cliente where mac_su LIKE '%$q%'";
$rsd = mysql_query($sql);

while($rs = mysql_fetch_array($rsd)) {
	
        $cname = $rs['mac_su'];
        echo "$cname\n";
}
?>