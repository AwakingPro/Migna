<?php
include("../../../system/config.php");
 include("../../../mail/class.phpmailer.php");
    include("../../../mail/class.smtp.php");

if (1==1){
$sql=mysql_query("SELECT * FROM INT_avisos");

  $datay3 = array();   
while($row = mysql_fetch_array($sql)) { 
    
$fecha = $row[2];
 $aviso = $row[1];
 $fecha_actual=date("Y-m-d");
 

$nuevafecha = strtotime ( '+30 day' , strtotime ( $fecha_actual ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );


if ($nuevafecha>=$fecha){
	
	
	$registro="Aviso :".$aviso." Vence en ".$fecha;  




////////Mysql Datos del Servidor
$sql_server=mysql_query("SELECT * FROM SYS_SERVER");

  $datos = array();   
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
$mail->FromName = "Migna | Avisos Importantes";
$mail->Subject = "Aviso Importante";
$mail->MsgHTML($registro);

$mail->AddAttachment("ruta-del-archivo/archivo.zip");
$mail->AddAddress("lponce@netlandchile.com");
$mail->AddAddress("mantencion@netlandchile.com");
$mail->IsHTML(true);
if(!$mail->Send()) {

  echo "Error: " . $mail->ErrorInfo;

} else {

echo "OK";
}


       


	

	
	}
    
}






}
?>