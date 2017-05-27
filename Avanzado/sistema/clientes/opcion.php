<?php

require("../../../system/config.php");
include("../../../mail/class.phpmailer.php");
include("../../../mail/class.smtp.php");

$cliente= $_POST["cliente"];
$id_morosos= $_POST["id_morosos"];
$rut= $_POST["rut"];
$alias= $_POST["alias"];
$mac_antigua= $_POST["mac_antigua"];
$mac_antigua_router= $_POST["mac_antigua_router"];
$ticket_type= $_POST["ticket_type"];


$usuario_sistema2= $_POST["usuario_sistema"];
$sql_usuario=mysql_query("SELECT * FROM usuarios WHERE usuario='$usuario_sistema2'");
	  
	  while($row=mysql_fetch_array($sql_usuario)){
		  
		  $usuario_sistema= $row['nombre'];

		  }



$hora= date("G:H:s");
$fecha= date("d-m-Y");
$fecha_sistema= date("Y-m-d");

$fecha_estado= date("Y-m-d");
$estado= $_POST["estado"];

  if ($estado=='Suspendido'){
	  	  $fecha_suspension=date("Y-m-d",strtotime($fecha_estado));

	  
	  }



if (isset($_POST['modificar']))
{
header("Location: modificar.php?cliente=$cliente&alias=$alias&rut=$rut");
}
if (isset($_POST['modificar_voip']))
{
header("Location: modificar_voip.php?cliente=$cliente&alias=$alias&rut=$rut");
}
if (isset($_POST['modificar_otros']))
{
header("Location: modificar_otros.php?cliente=$cliente&alias=$alias&rut=$rut");
}
if (isset($_POST['eliminar']))
{
	


header("Location: ver_clientes.php?cliente=$cliente&alias=$alias&rut=$rut&id=3&mac_a=$mac_antigua&mac_b=$mac_antigua_router");
}
if (isset($_POST['ticket']))
{
	
header("Location: ../ticket/ticket_nuevo.php?cliente=$cliente&rut=$rut&alias=$alias&ticket_type=$ticket_type");
}
if (isset($_POST['suspender']) && $estado=='Suspendido')
{
	
	$sql_suspensiones=mysql_query("INSERT INTO SP_suspensiones(cliente,rut,fecha,hora,alias,usuario_sistema,estado,fecha_estado,fecha_sistema) values ('$cliente','$rut','$fecha','$hora','$alias','$usuario_sistema','$estado','$fecha_estado','$fecha_sistema')");
	
	$sql_update=mysql_query("UPDATE SP_dato_cliente	SET estado=	'$estado' ,fecha_suspension=	'$fecha_suspension' WHERE cliente='$cliente' AND alias='$alias'");
	
	$sql_update2=mysql_query("UPDATE morosos SET id_status=1 , suspendido='$usuario_sistema',fecha_suspencion='$fecha_sistema',hora_suspencion='$hora',gestion='$estado' WHERE rut='$rut'");
	header("Location: lista_suspencion.php?id_morosos=$id_morosos");
	
	
	
	
	$registro="<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Migna</title>
<style type='text/css'>
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
}
.FONT {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
}
</style>
</head>

<body bgcolor='#ffffff' text='#000000' link='#0000ff' vlink='#0000ff' alink='#0000ff'>
<p>Estimados</p>
<p>Con Fecha : $fecha :  hora $hora  , se ha suspendido al cliente :  <b>$cliente</b> </p>

Este Mensaje se genera automaticamente.
<p>Atte.</p>
$usuario_sistema
</body>

</html>";  







$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "201.217.255.8";
$mail->Username = "migna@netlandchile.com";
$mail->Password = "m9a7r5s3";
$mail->From = "migna@netlandchile.com";
$mail->FromName = "Sistema Gestion de Clientes";
$mail->Subject = "Migna : Suspension Cliente $cliente ";
$mail->SMTPSecure = 'tls';                           
$mail->Port = 587;
$mail->MsgHTML($registro);

$mail->AddAttachment("ruta-del-archivo/archivo.zip");
$mail->AddAddress("lponce@netlandchile.com", "Luis Ponce");
$mail->AddAddress("avillarroel@netlandchile.com", "Angela Villarroel");
$mail->AddAddress("fbarros@netlandchile.com", "Felipe Barros");
$mail->AddAddress("fmarquez@netlandchile.com", "Francisco Marquez");
$mail->AddAddress("iluna@netlandchile.com", "Ivonne Luna");
$mail->AddAddress("ayanez@netlandchile.com", "Antonio Yanez");
$mail->AddAddress("acorderoj@netlandchile.com", "Axel Cordero");
$mail->AddAddress("jtoro@netlandchile.com", "Josefina Toro");
$mail->AddAddress("pportales@netlandchile.com", "Paula Portales");
$mail->IsHTML(true);
if(!$mail->Send()) {

  echo "Error: " . $mail->ErrorInfo;

} else {

echo "OK";
}
}
if (isset($_POST['suspender']) && $estado=='Activo')
{	
	

	$sql_suspensiones=mysql_query("INSERT INTO SP_suspensiones(cliente,rut,fecha,hora,alias,usuario_sistema,estado,fecha_estado,fecha_sistema) values ('$cliente','$rut','$fecha','$hora','$alias','$usuario_sistema','$estado','$fecha_estado','$fecha_sistema')");
	
	$sql_update=mysql_query("UPDATE SP_dato_cliente	SET estado=	'$estado' ,fecha_suspension=	'$fecha_suspension' WHERE cliente='$cliente' AND alias='$alias'");
	
	$sql_update2=mysql_query("UPDATE morosos SET  id_status=2 ,habilitado='$usuario_sistema',fecha_habilitacion='$fecha_sistema',hora_habilitacion='$hora',gestion='$estado' WHERE rut='$rut'");
	
	
	$registro="<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Migna</title>
<style type='text/css'>
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
}
.FONT {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
}
</style>
</head>

<body bgcolor='#ffffff' text='#000000' link='#0000ff' vlink='#0000ff' alink='#0000ff'>
<p>Estimados</p>
<p>Con Fecha : $fecha :  hora $hora  , se ha Activado al cliente :  <b>$cliente</b> </p>

Este Mensaje se genera automaticamente.
<p>Atte.</p>
$usuario_sistema
</body>

</html>";  







$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "201.217.255.8";
$mail->Username = "migna@netlandchile.com";
$mail->Password = "m9a7r5s3";
$mail->From = "migna@netlandchile.com";
$mail->FromName = "Sistema Gestion de Clientes";
$mail->Subject = "Migna : Activacion Cliente $cliente ";
$mail->SMTPSecure = 'tls';                           
$mail->Port = 587;
$mail->MsgHTML($registro);

$mail->AddAttachment("ruta-del-archivo/archivo.zip");
$mail->AddAddress("lponce@netlandchile.com", "Luis Ponce");
$mail->AddAddress("avillarroel@netlandchile.com", "Angela Villarroel");
$mail->AddAddress("fbarros@netlandchile.com", "Felipe Barros");
$mail->AddAddress("fmarquez@netlandchile.com", "Francisco Marquez");
$mail->AddAddress("iluna@netlandchile.com", "Ivonne Luna");
$mail->AddAddress("ayanez@netlandchile.com", "Antonio Yanez");
$mail->AddAddress("acorderoj@netlandchile.com", "Axel Cordero");
$mail->AddAddress("jtoro@netlandchile.com", "Josefina Toro");
$mail->AddAddress("pportales@netlandchile.com", "Paula Portales");
$mail->IsHTML(true);
if(!$mail->Send()) {

  echo "Error: " . $mail->ErrorInfo;

} else {

echo "OK";
}
	
	header("Location: lista_activacion.php?id_morosos=$id_morosos");
	
	
	//header("Location: ver_clientes.php?cliente=$cliente&rut=$rut&alias=$alias&id=4");

	
//header("Location: ../ticket/ticket_nuevo.php?cliente=$cliente&rut=$rut&alias=$alias&ticket_type=$ticket_type");
}
?>