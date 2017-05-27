<?php
require_once "../../../system/config.php";
$q = strtolower($_GET["q"]);
if (!$q) return;

$sql = "select DISTINCT ip as ip from INT_radio_planning where ip LIKE '%$q%'";
$rsd = mysql_query($sql);
while($rs = mysql_fetch_array($rsd)) {
	 
        
		$cname2 = $rs['ip'];
		$cname= trim($cname2);
       
        echo "$cname\n";
}

?>