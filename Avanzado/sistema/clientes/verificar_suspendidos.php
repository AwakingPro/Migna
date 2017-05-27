<?php
include("../../../system/config.php");

$fecha_actual = date("Y-m-d");
$nuevafecha = strtotime('-3 month',strtotime($fecha_actual));
$nuevafecha = date("Y-m-d",$nuevafecha);
 

$sql_ap=mysql_query("SELECT fecha_suspension,cliente,rut,contactos,contrato,correos,plan,velocidad,estado  FROM SP_dato_cliente ");

while ($row = mysql_fetch_row($sql_ap)){
	
           $fecha_suspension=$row[0]; 
		    $cliente=$row[1]; 
			$rut=$row[2]; 
			$contactos=$row[3]; 
			$contrato=$row[4]; 
			$correos=$row[5]; 
			$plan=$row[6]; 
			$velocidad=$row[7]; 
			$estado=$row[8]; 
		
               if ($fecha_suspension=='No Registra' || $fecha_suspension==''){
				   
				  // echo $cliente."-".$fecha_suspension."<br>";
				   }
			   
			   else if ($fecha_suspension<=$nuevafecha){
				   
				   $sql_insert=mysql_query("INSERT INTO SP_morosos (cliente,rut,contactos,contrato,correos,plan,velocidad,estado,fecha_suspension) VALUES ('$cliente','$rut','$contactos','$contrato','$correos','$plan','$velocidad','$estado','$fecha_suspension')");
				
			
			   }
		
		

}


 

 
?>
