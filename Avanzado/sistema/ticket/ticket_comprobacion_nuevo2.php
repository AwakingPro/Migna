<?php

require("../../../system/config.php");
include("../../../services2/config.php");

 $cliente2= $_POST["cliente"];
 $cliente= trim($cliente2);
 $creador= $_POST["creador"];
 $depto="Soporte Tecnico";
 $tipo= "Coordinacion";


 $comentario= $_POST["comentario"];
 $fecha_creacion= $_POST["fecha_creacion"];
 $rut= $_POST["rut"];
  $correo= $_POST["correo"];
   $plan= $_POST["plan"];
    $direccion= $_POST["direccion"];
	 $subtipo= 'Factibilidad';
	 $status= 'Abierto';;
	 $telefono= $_POST["telefono"];
	 $como= $_POST["como"];

 $asignar= $_POST["responsable"];
 $numero = rand(100004,999899);
 

		 $sql3=mysql_query("INSERT INTO TICKET(cliente,rut,correo,telefono,plan,direccion,como,asignar,creador,numero,fecha_creacion,subtipo,comentario,status,depto,tipo) values ('$cliente','$rut','$correo','$telefono','$plan','$direccion','$como','$asignar','$creador','$numero','$fecha_creacion','$subtipo','$comentario','$status','$depto','$tipo')");

header("Location: ticket_nuevo.php?numero=$numero&id=1");



           
     

?>