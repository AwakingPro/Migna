<?php
include("../../../system/config.php");

$sql_ap=mysql_query("SELECT ip  FROM INT_radio_planning where funcion='PMP'");

while ($row = mysql_fetch_row($sql_ap)){
	
            $ap=$row[0]; 
			$valor='0';
		    $valor_total='0';

		

			$sql=mysql_query("SELECT velocidad   FROM SP_dato_cliente WHERE ap='$ap' and (estado='Activo' OR estado ='Suspendido' )");

             
					 
		
   
                	 while ($row = mysql_fetch_row($sql)){
		           {
			
			    $valor=$row[0];
				$valor_total=$valor_total+$valor;	
			   
               
	               }	
				    


	  }		
			
			 $valor_total2=($valor_total/1024);
			   $valor_final=number_format($valor_total2, 1, ',', '');		
$sql_update=mysql_query("UPDATE INT_radio_planning SET nominal='$valor_final' WHERE   ip='$ap'  ");
		
				
		
		

}


 

?>
