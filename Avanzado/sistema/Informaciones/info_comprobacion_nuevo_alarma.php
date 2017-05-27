<?php

require("../../../system/config.php");
	
  $creador= $_POST["creador"];
 $comentario= $_POST["comentario"];
 $fecha_creacion= $_POST["fecha_creacion"];
 $status= $_POST["status"];
 $asignar= $_POST["responsable"];
 
if (1==1)

{

		 $sql=mysql_query("INSERT INTO INFO_alarmas(comentario,fecha_creacion,asignar,creador,status) values ('$comentario','$fecha_creacion','$asignar','$creador','$status')");
}
 
    ?>