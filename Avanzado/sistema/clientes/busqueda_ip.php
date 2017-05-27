<?php

require_once "../../../system/config.php";

$q = strtolower($_GET["q"]);
if (!$q) return;

$sql = "select DISTINCT id_dato as id_dato from SP_dato_cliente where id_dato LIKE '%$q%'";
$rsd = mysql_query($sql);

while($rs = mysql_fetch_array($rsd)) {
	
        $cname = $rs['id_dato'];
        echo "00"."$cname\n";
}
?>