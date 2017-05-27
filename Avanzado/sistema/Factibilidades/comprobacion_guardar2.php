<?php
require("../../../system/config.php");
$usuario2= $_POST["usuario"];

$usuario3=mysql_query("SELECT nombre FROM usuarios WHERE usuario='$usuario2'");
while($row=mysql_fetch_array($usuario3)){
     	$usuario = $row['nombre'];
		global $usuario;
	
	
}



$actualizacion=date("Y-m-d H:i:s");

$numero = $_POST["numero"];
$fecha_actualizacion= $_POST["fecha_actualizacion"];
$cliente= $_POST["cliente"];
$comentario_interno= $_POST["comentario_interno"];
$prioridad= $_POST["prioridad"];
$asignar= $_POST["asignar"];
$status= $_POST["status"];
$resultado=$_POST['resultado']; 
$seguimiento=$_POST['seguimiento']; 

$comuna=$_POST['comuna']; 


$sql_editar=mysql_query("SELECT * FROM TICKET WHERE numero='$numero' and cliente='$cliente'");

if (mysql_num_rows($sql_editar)>0)
{
	
header("Location: editar_registro.php?id=1&cliente=$cliente&numero=$numero&factibilidad=Factibilidad");
 $sql7=mysql_query("UPDATE TICKET	 
SET   prioridad=	'$prioridad',asignar=	'$asignar',status=	'$status' ,fecha_actualizacion=	'$fecha_actualizacion',   resultado=	'$resultado',   estado_factibilidad=	'$seguimiento',comuna='$comuna' WHERE numero='$numero' and cliente='$cliente'");

$sql8=mysql_query("INSERT INTO TICKET_comentario_interno(actualizacion,usuario,comentario_interno,cliente,numero) values ('$actualizacion','$usuario','$comentario_interno','$cliente','$numero')");
 
 
} else if(mysql_num_rows($sql)==0){
header("Location: error.php");
} 

?>