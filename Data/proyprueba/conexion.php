<?php  

$bd = "DATA";
$host= "localhost";
$user = "root";
$pass = "m9a7r5s3";

//$conexion = mysql_connect($host,$user,$pass) new trigger_error(mysql_error(),E_USER_ERROR());
$conexion = new mysqli($host,$user,$pass,$bd);
if ($conexion -> connect_errno)
{
	die( "Fallo la conexión a MySQL: (" . $conexion -> mysqli_connect_errno() 
. ") " . $conexion -> mysqli_connect_error());

}else 
{
	//echo "Conexion exitosa";
}

?>