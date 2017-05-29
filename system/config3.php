<?php

$host_name = 'netlandchile.com';
$user_name = 'wispland_netland';
$pass_word = 'Netland16';
$database_name = 'wispland_netland';
$conn = mysql_pconnect($host_name, $user_name, $pass_word) or die ('Error connecting to mysql');
mysql_select_db($database_name);
?>