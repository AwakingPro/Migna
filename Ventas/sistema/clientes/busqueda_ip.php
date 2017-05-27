<?php

require_once "../../../system/config.php";

$q = strtolower($_GET["q"]);
if (!$q) return;
$sql = "select DISTINCT ip as ip from SP_dato_cliente where ip LIKE '%$q%'";
$rsd = mysql_query($sql);

while($rs = mysql_fetch_array($rsd)) {
	
        $cname = $rs['ip'];
        echo "$cname\n";
}
?>