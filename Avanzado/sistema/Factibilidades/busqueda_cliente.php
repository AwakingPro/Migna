<?php
require_once "../../../system/config.php";
$q = strtolower($_GET["q"]);
if (!$q) return;

$sql = "select DISTINCT cliente as cliente from TICKET where cliente LIKE '%$q%' and subtipo='Factibilidad'";
$rsd = mysql_query($sql);
while($rs = mysql_fetch_array($rsd)) {
        $cname = $rs['cliente'];
        echo "$cname\n";
}
?>