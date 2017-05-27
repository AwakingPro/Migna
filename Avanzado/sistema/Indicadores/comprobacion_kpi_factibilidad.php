<?php


if (!isset($_SESSION)) {
  session_start();
}
require("../../../system/config.php");
$_SESSION['anios']=$_REQUEST['anios'];
$_SESSION['mes']=$_REQUEST['mes'];
$fecha_1=$_SESSION['anios'].'-01-01'.' '.'00:00:00';
$fecha_2=$_SESSION['anios'].'-12-31'.' '.'00:00:00';
$anios= $_POST["anios"];
$mes= $_POST["mes"];

$fecha_3=$_SESSION['anios'].'-'.$_SESSION['mes'].'-01'.' '.'00:00:00';
$fecha_4=$_SESSION['anios'].'-'.$_SESSION['mes'].'-31'.' '.'00:00:00';

$sql=mysql_query("SELECT * FROM TICKET WHERE subtipo='Factibilidad' AND fecha_creacion  BETWEEN '$fecha_1' AND '$fecha_2' ");
$sql2=mysql_query("SELECT * FROM TICKET WHERE subtipo='Factibilidad' AND fecha_creacion  BETWEEN '$fecha_3' AND '$fecha_4' ");





if (mysql_num_rows($sql)>0)
{
	
	if ($mes==20) {
		 header("Location: indicadores_factibilidades_resultado_todas.php?anios=$anios&mes=$mes&id_filter=2");

		 }
else if (mysql_num_rows($sql2)>0)
{


if ($mes!=20)
	{ 
header("Location: indicadores_factibilidades_resultado.php?anios=$anios&mes=$mes&id_filter=1");
     }
	  












}else if(mysql_num_rows($sql2)==0){
header("Location: indicadores_factibilidades.php?id_fac=1"); }

} else if(mysql_num_rows($sql)==0){
header("Location: indicadores_factibilidades.php?id_fac=1");  
	   




      
        }

?>