<?php
require_once "../../../system/config.php";
$q = strtolower($_GET["q"]);
if (!$q) return;

$sql = "select DISTINCT bodega as bodega from INV_activos where bodega LIKE '%$q%'";
$rsd = mysql_query($sql);
while($rs = mysql_fetch_array($rsd)) {
        $cname = $rs['bodega'];
        echo "$cname\n";
}
?>