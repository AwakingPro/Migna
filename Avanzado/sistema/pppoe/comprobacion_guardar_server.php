<?php
include("../../../system/config.php");

$nombre_server= $_POST["nombre_server"];
$nombre_server2= $_POST["nombre_server2"];
$estacion= $_POST["estacion"];
$ip_server= $_POST["ip_server"];
$ip_server2= $_POST["ip_server2"];
$user_server= $_POST["user_server"];
$pass_server= $_POST["pass_server"];
$modelo= $_POST["modelo"];

if ($ip_server==$ip_server2 && $nombre_server==$nombre_server2){
	header("Location: ver_server.php?id=3");

	$sql_update=mysql_query("UPDATE PPPoE_SRV 
SET   estacion=	'$estacion',user_server=	'$user_server',pass_server=	'$pass_server' ,modelo=	'$modelo' WHERE nombre_server='$nombre_server2'");
	
	}



else if ($ip_server!=$ip_server2 && $nombre_server==$nombre_server2)
{
		$sql=mysql_query("SELECT * FROM PPPoE_SRV WHERE  ip_server='$ip_server'");

if (mysql_num_rows($sql)>0)
{
			header("Location: ver_server.php?id=4");

}
else if (mysql_num_rows($sql)==0){
		header("Location: ver_server.php?id=3");
		$sql_update=mysql_query("UPDATE PPPoE_SRV 
SET   estacion=	'$estacion',user_server=	'$user_server',pass_server=	'$pass_server' ,ip_server=	'$ip_server',modelo=	'$modelo' WHERE nombre_server='$nombre_server2'");
	}
	
}

else if ($ip_server==$ip_server2 && $nombre_server!=$nombre_server2)
{
	$sql=mysql_query("SELECT * FROM PPPoE_SRV WHERE  nombre_server='$nombre_server'");

if (mysql_num_rows($sql)>0)
{
			header("Location: ver_server.php?id=5");

}
else if (mysql_num_rows($sql)==0){
		header("Location: ver_server.php?id=3");
		$sql_update=mysql_query("UPDATE PPPoE_SRV 
SET   estacion=	'$estacion',user_server=	'$user_server',pass_server=	'$pass_server' ,nombre_server=	'$nombre_server',modelo=	'$modelo' WHERE nombre_server='$nombre_server2'");
	}
}
//todos distintos
else if ($ip_server!=$ip_server2 && $nombre_server!=$nombre_server2)
{
	$sql=mysql_query("SELECT * FROM PPPoE_SRV WHERE  nombre_server='$nombre_server' ");
	$sql2=mysql_query("SELECT * FROM PPPoE_SRV WHERE  ip_server='$ip_server' ");

if (mysql_num_rows($sql)>0 || mysql_num_rows($sql2)>0)
{
			header("Location: ver_server.php?id=6");

}
else if (mysql_num_rows($sql)==0 || mysql_num_rows($sql2)==0){
		header("Location: ver_server.php?id=3");
		$sql_update=mysql_query("UPDATE PPPoE_SRV 
SET   estacion=	'$estacion',user_server=	'$user_server',pass_server=	'$pass_server' ,nombre_server=	'$nombre_server',modelo=	'$modelo' WHERE nombre_server='$nombre_server2'");
	}
}
?>

