<?php
include("../system/config.php");
include("../mail/class.phpmailer.php");
include("../mail/class.smtp.php");


$sql=mysql_query("SELECT senal_live,ip,ssid,estacion FROM INT_radio_planning WHERE  up='1' and funcion='PTP' AND alarma='1'");

while($row = mysql_fetch_array($sql)) { 
    
$senal = $row[0];
$ip = $row[1];
$ssid= $row[2];

 $estacion = $row[3];

 $fecha_actual=date("d-m-Y");
 

if ($senal<=-80 && $senal!=-96){
	
	$registro="<font face='verdana' size='2'>Estimados<br><br>Host <strong>$ip  </strong> Funci&oacute;n <strong>PtP</strong> , SSID  <strong>$ssid</strong> de la Estaci&oacute;n <strong>$estacion</strong> ,Presenta una se&ntilde;al de <strong>$senal</strong> , se recomienda revisar urgente.</font><br><br>Si ya soluciono el problema debe actualizar estado del dispositivo desde el M&oacute;dulo Radio Planning. <br><br>Si no desea recibir alarmas de este dispositivo , elimine la opci&oacute;n alarma desde el M&oacute;dulo Radio Planning.<br><br>Atte.<br>Migna | Sistema Gesti&oacute;n de Clientes y Dispositivos de Red";  




////////Mysql Datos del Servidor
$sql_server=mysql_query("SELECT * FROM SYS_SERVER");

while($row = mysql_fetch_array($sql_server)) { 
    
$hostname = $row[1];
$user = $row[2];
$pass = $row[3];
$correo = $row[4];
 
}

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = $hostname;
$mail->Username = $user;
$mail->Password = $pass;
$mail->From = $correo;
$mail->FromName = "Migna | Radio Planning";
$mail->Subject = "Problema Host";
$mail->MsgHTML($registro);

$mail->AddAttachment("ruta-del-archivo/archivo.zip");
$mail->AddAddress("lponce@netlandchile.com");



$mail->IsHTML(true);
if(!$mail->Send()) {

  echo "Error: " . $mail->ErrorInfo;

} else {

echo "OK";
}


       


	

	
	}
    







}
?>