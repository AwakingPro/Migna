<?php
$host_name = 'localhost';
$user_name = 'root';
$pass_word = 'm9a7r5s3';
$database_name = 'catchme';
$conn = mysql_connect($host_name, $user_name, $pass_word) or die ('Error connecting to mysql');
mysql_select_db($database_name);
?>