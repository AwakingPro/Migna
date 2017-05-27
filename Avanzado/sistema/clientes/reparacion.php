<?php
include("../../../system/config.php");

       $ticket=mysql_query("SELECT id,cliente,numero,fecha_creacion FROM TICKET  ");

while ($row = mysql_fetch_row($ticket)){
	
	$id=$row[0];
    $cliente=$row[1];
	$numero=$row[2];
	$fecha_creacion=$row[3];
	list($fecha_ticket, $hora_ticket) = explode(" ", $fecha_creacion);
	$fecha_ticket;
	
	$sql2=mysql_query("UPDATE TICKET	 SET fecha_sistema='$fecha_ticket'  WHERE cliente='$cliente' AND id='$id' ");

	
	//$fecha_ticket=date("d-m-Y",strtotime($fecha_ticket2));
}
	
	
?>