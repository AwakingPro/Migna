<?php
require_once "../../../system/config.php";
$q = strtolower($_GET["q"]);
if (!$q) return;

$sql = "select DISTINCT tipo as tipo from INV_activos where tipo LIKE '%$q%'";
$rsd = mysql_query($sql);
while($rs = mysql_fetch_array($rsd)) {
        $cname = $rs['tipo'];
        echo "$cname\n";
}
?>