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
 $cliente= $_POST["cliente"];
$comentario_interno= mysql_real_escape_string($_POST['comentario_interno']);
$resultado= $_POST["resultado"];
$asignar= $_POST["asignar"];
$status= $_POST["status"];
$estado_factibilidad= $_POST["progreso"];
 $fecha_prox_gestion = $_POST["fecha_prox_gestion"];



$sql_editar=mysql_query("SELECT * FROM TICKET WHERE numero='$numero' and cliente='$cliente'");

if (mysql_num_rows($sql_editar)>0)
{
	
	
header("Location: registro_editado.php");
 $sql7=mysql_query("UPDATE TICKET	 
SET resultado=	'$resultado',asignar=	'$asignar',estado_factibilidad=	'$estado_factibilidad',resultado=	'$resultado',status=	'$status',fecha_prox_gestion=	'$fecha_prox_gestion'  WHERE numero='$numero' and cliente='$cliente'");

$sql8=mysql_query("INSERT INTO TICKET_comentario_interno(actualizacion,usuario,comentario_interno,cliente,numero) values ('$actualizacion','$usuario','$comentario_interno','$cliente','$numero')");
 
 
} else if(mysql_num_rows($sql)==0){
header("Location: sin_registros_editar.php");
} 

?>