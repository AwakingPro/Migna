<?php
require("../../../system/config.php");
include("../../../mail/class.phpmailer.php");
include("../../../mail/class.smtp.php");




$registro="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Documento sin título</title>
<style type='text/css'>
.clase {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
	color: #333;
}
</style>
</head>

<body>
<p class='clase'>Estimados</p>
<p class='clase'>Se adjunta Excel con los clientes que llevan mas de 3 meses en estado Suspendido.</p>
<p class='clase'>Atte.</p>
<p class='clase'>Migna | Sistema Gestion de Clientes</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
";  


$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "201.217.255.7";
$mail->Username = "migna@netlandchile.com";
$mail->Password = "m9a7r5s3";
$mail->From = "migna@netlandchile.com";
$mail->FromName = "Sistema Gestion de Clientes";
$mail->Subject = "Clientes Morosos";
$mail->MsgHTML($registro);

$mail->AddAttachment("/var/www/migna/Avanzado/sistema/clientes/Morosos.xlsx");
$mail->AddAddress("lponce@netlandchile.com", "Luis Ponce");

$mail->IsHTML(true);
if(!$mail->Send()) {

  echo "Error: " . $mail->ErrorInfo;

} else {

echo "OK";
} 
 
 
				
				
				
				
				
	
		





 


?>