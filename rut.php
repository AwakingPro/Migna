<?php
require_once('system/config.php'); 

	

	
	$sql=mysql_query("SELECT rut FROM SP_soporte_crear_cliente");
	while($row=mysql_fetch_array($sql)){
		
		$rut_antiguo=$row[0];
		$count=strlen($rut_antiguo);
		if($count==9){
			     $rut_nuevo="0".$rut_antiguo;
	              $update=mysql_query("UPDATE `SP_soporte_crear_cliente` SET rut='$rut_nuevo' WHERE rut='$rut_antiguo'");
	
	         }
		}
	?>