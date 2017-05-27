<?php
include("../../../system/config.php");


$sql_ap=mysql_query("SELECT ip  FROM INT_radio_planning where funcion='PMP'");

while ($row = mysql_fetch_row($sql_ap)){
	
            $ap=$row[0]; 
		
		if (empty($ap)){
			echo "0";
			
        

               } 
			
			
			
		else {
			
			$sql=mysql_query("SELECT count(*)  FROM SP_dato_cliente WHERE ap='$ap' and (estado='Activo' OR estado ='Suspendido' )");

                while ($row = mysql_fetch_row($sql)){
					$valor=$row[0];					
					$sql_update=mysql_query("UPDATE INT_radio_planning SET clientes_live='$valor' WHERE   ip='$ap'  ");

					
					
	}
		
		

}

}
 

?>