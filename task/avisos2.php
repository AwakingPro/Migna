<?php
include("../system/config.php");
include("../mail/class.phpmailer.php");
include("../mail/class.smtp.php");

if (1==1){
$sql=mysql_query("SELECT * FROM INT_avisos");

  $datay3 = array();   
while($row = mysql_fetch_array($sql)) { 
    
$fecha = $row[3];
 $aviso = $row[1];
 $fecha_actual=date("Y-m-d");
 

$nuevafecha = strtotime ( '+30 day' , strtotime ( $fecha_actual ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );


if ($nuevafecha>=$fecha){
	
	$f1=date("d-m-Y",strtotime($fecha));
	$registro="<font face='verdana' size='2'>Estimados</font><br><br><font face='verdana' size='2'>El siguiente Aviso :  </font>"."<font face='verdana' size='2'><b>".$aviso."</b></font>"." <font face='verdana' size='2'> , Tiene Fecha de Expiracion el : </font><B>".$f1."</B>"."<br><br><font face='verdana' size='2'>Favor no responder este correo ya que se genera automaticamente.</font>"."<br><br><font face='verdana' size='2'>Si ya realizo la gestion informada en este aviso, debe actualizar la fecha de expiracion para no seguir recibiendo este correo.</font>"."<br><font face='verdana' size='2'><br>Atte.<br><br>Migna | Sistema Gestion de Clientes</font>";  




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
$mail->SMTPSecure = 'tls';                           
$mail->Port = 587;

$mail->FromName = "Migna | Avisos Importantes";
$mail->Subject = "Aviso Importante";
$mail->MsgHTML($registro);

$mail->AddAttachment("ruta-del-archivo/archivo.zip");
$mail->AddAddress("lponce@netlandchile.com");
$mail->AddAddress("mpavez@netlandchile.com");
$mail->AddAddress("ayanez@netlandchile.com");
$mail->AddAddress("fmarquez@netlandchile.com");
$mail->AddAddress("fbarros@netlandchile.com");
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
