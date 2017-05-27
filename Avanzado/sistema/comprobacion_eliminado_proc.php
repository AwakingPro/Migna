<?php
require("../../../system/config.php");
$proc= $_GET["proc"];
$fecha_actualizacion= $_GET["fecha_actualizacion"];


$sql=mysql_query("SELECT * FROM SIS_procedimientos WHERE proc='$proc' ");

if (mysql_num_rows($sql)>0)
{
	 header("Location: procedimientos.php?	proc=$proc");	
} ?>

