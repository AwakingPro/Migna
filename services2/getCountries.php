<?php


	// connect database
	include("config.php");
	
	// execute query in correct order 
	//(value,text)
	$query = "SELECT id_country, country_name FROM countries2 ORDER BY country_name ASC";
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