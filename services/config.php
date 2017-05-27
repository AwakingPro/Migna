<?php

	$host_name = 'localhost';
$user_name = 'root';
$pass_word = 'm9a7r5s32016';
$database_name = 'SGC';
	

	// connecting to database
	$link = mysql_connect($host_name,$user_name,$pass_word);

	mysql_select_db($database_name,$link);
	
	
?>