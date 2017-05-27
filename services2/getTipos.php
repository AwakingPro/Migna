<?php

	// connect database
	include("config.php");
		
	// get id param (from get vars)
	$id = !empty($_GET['id'])?intval($_GET['id']):0;
	// execute query in correct order 
	//(value,text)
	$query = "SELECT id_tipo, tipo_name FROM TICKET_tipo WHERE id_depto = '$id' ORDER BY tipo_name ASC";
	$result = mysql_query($query);
	$items = array();
	if($result &&   mysql_num_rows($result)>0) {
		while($row = mysql_fetch_array($result)) {
			$items[] = array( $row[0], $row[1]);
		}		
	}
	mysql_close();
	// encode to json
	echo(json_encode($items)); 
?>