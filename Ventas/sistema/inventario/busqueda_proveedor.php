<?php
require_once "../../../system/config.php";
$q = strtolower($_GET["q"]);
if (!$q) return;

$sql = "select DISTINCT proveedor as proveedor from INV_activos where proveedor LIKE '%$q%'";
$rsd = mysql_query($sql);
while($rs = mysql_fetch_array($rsd)) {
        $cname = $rs['proveedor'];
        echo "$cname\n";
}
?>