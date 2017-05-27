<?php
require_once "../../../system/config.php";
$q = strtolower($_GET["q"]);
if (!$q) return;

$sql = "select DISTINCT remarks as remarks from INT_radio_planning where remarks LIKE '%$q%'";
$rsd = mysql_query($sql);
while($rs = mysql_fetch_array($rsd)) {
        $cname = $rs['remarks'];
        echo "$cname\n";
}

?>