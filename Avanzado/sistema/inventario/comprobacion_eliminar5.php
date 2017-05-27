<?php
require("../../../system/config.php");

$mac= $_GET["mac"];


$serial= $_GET["serial"];


$sql=mysql_query("SELECT mac_su,mac_router FROM SP_dato_cliente WHERE  mac_su='$mac' or mac_router='$mac' ");

if (mysql_num_rows($sql)>0)
{
	 header("Location: resultado_busqueda_inventario.php?mac=$mac&serial=$serial&id=10");	
} else if(mysql_num_rows($sql)==0){
	
	$sql2=mysql_query("SELECT mac FROM INT_radio_planning WHERE  mac='$mac' ");

	 if (mysql_num_rows($sql2)>0){
		 	 header("Location:  resultado_busqueda_inventario.php?mac=$mac&serial=$serial&id=10");	

 
}
else if(mysql_num_rows($sql)==0){
	 header("Location:  resultado_busqueda_inventario.php?mac=$mac&serial=$serial&id=1");		

	
	}

}

?>