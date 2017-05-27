<?php

require("../../../system/config.php");
include("../../../services2/config.php");


$fecha_1= $_POST["fecha_1"];
$fecha_2= $_POST["fecha_2"];
$c=$_POST["c"];

if ($c="c")
	{ 
header("Location: ver_factibilidades.php?fecha_1=$fecha_1&fecha_2=$fecha_2");
     }
	 
  
	

	


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