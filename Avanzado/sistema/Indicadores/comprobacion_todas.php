<?php

require("../../../system/config.php");
include("../../../services2/config.php");


header("Location: ver_todas.php");
     
	 
  
	

	


mysql_free_result($sql1);
mysql_free_result($sql2);
mysql_free_result($sql3);
mysql_free_result($sql4);
mysql_free_result($sql5);
mysql_free_result($sql6);
mysql_free_result($sql7);
mysql_free_result($sql8);
mysql_close();

?>