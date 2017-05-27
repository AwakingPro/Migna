<?php
require("../../../system/config.php");
include("../../../mail/class.phpmailer.php");
include("../../../mail/class.smtp.php");
$accion= $_POST["accion"];
$cliente= $_POST["cliente"];
$monto= $_POST["monto"];
$factura= $_POST["factura"];
$documento= $_POST["documento"];
$fecha= $_POST["fecha"];
$hora= $_POST["hora"];
$comentario= $_POST["comentario"];
$id= $_POST["id"];
if($accion=='Activar'){
	$accion2="Activar";
	
	}
	else {
		$accion2="No Activar";
		}
$usuario= $_POST["usuario_sistema"];


$sql_update2=mysql_query("UPDATE morosos SET id_status=3 ,accion='$accion',monto='$monto',documento='$documento',fecha_pago='$fecha',hora_pago='$hora',comentario='$comentario' WHERE id='$id'");
	header("Location: cargar.php");


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
<p>Con Fecha : $fecha :  hora $hora  , el <b>$cliente</b> pago un monto : <b>$monto</b> correspondiente a la  factura Numero :  <b>$factura </b></p>
Comentario Interna : $comentario
<br>
<br>
<b>Accion : $accion2</b>
<br>
<br>
Este Mensaje se genera automaticamente.
<p>Atte.</p>
$usuario
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
$mail->Subject = "Migna : Pago cliente $cliente ";
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





 
?>