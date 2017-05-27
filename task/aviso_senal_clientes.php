<?php
include("../system/config.php");
include("../mail/class.phpmailer.php");
include("../mail/class.smtp.php");
$fecha=date("Y-m-d");
$hora=date("H:i:s");

		  $fecha_termino_sesion2=date("Y-m-d");
		  $fecha_termino_sesion3=date("d-m-y",strtotime($fecha_termino_sesion2));
	list($dia2, $mes4, $anio2) = explode("-", $fecha_termino_sesion3);
    switch ($mes4) {
    case '01':
        $mes3='ene';
		break;
    case '02':
        $mes3='feb';
        break;
    case '03':
        $mes3='mar';
        break;
    case '04':
        $mes3='abr';
        break;
	case '05':
        $mes3='may';
        break;
	case '06':
        $mes3='jun';
        break;
	case '07':
        $mes3='jul';
        break;
	case '08':
        $mes3='ago';
        break;
	case '09':
        $mes3='sep';
        break;
	case '10':
        $mes3='oct';
        break;
	case '11':
        $mes3='nov';
        break;
	case '12':
        $mes3='dic';
        break;		
}
$fecha_final=$dia2."-".$mes3."-".$anio2;

$sql=mysql_query("SELECT senal_live,cliente,alias,ip_su,ip FROM SP_dato_cliente WHERE  senal_live < -81");

while($row = mysql_fetch_array($sql)) { 
    
$senal = $row[0];
$cliente = $row[1];
$alias= $row[2];
$ip_su= $row[3];
$ip= $row[4];
 $estacion = $row[3];

 $fecha_actual=date("d-m-Y");
 

if ($senal<=-82 && $senal!=-96){
	
	$registro="<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Spot Manager</title>
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
<blockquote>&nbsp;</blockquote>

<table border='0' cellpadding='5' cellspacing='1' width='100%'>
  <tr>
    <td colspan=2 bgcolor='#FF0000' ><font face='verdana' font color='#FFFFFF' size='2'><b>Asunto</b></font></td>
  </tr>
  <tr>
      <td colspan=2 bgcolor='#F9F9F5'><font face='verdana' size='2'>Cliente con mala Senal</font></td>
   </tr>
  <tr>
      <td colspan=2 bgcolor='#FF0000'><b><font color='#FFFFFF'  >Detalle </font></b></td>
    </tr>
  <tr>
    <td bgcolor='#E8FFF3'><font face='verdana' size='2'>Cliente</font></td>
    <td bgcolor'#F9F9F5'>$cliente</td>
  </tr>
  <tr>
    <td bgcolor='#E8FFF3'><font face='verdana' size='2'>Enlace</font></td>
    <td bgcolor='#F9F9F5'>$alias</td>
  </tr>
  <tr>
    <td bgcolor='#E8FFF3'><font face='verdana' size='2'>Senal</font></td>
    <td bgcolor='#F9F9F5'>$senal</td>
  </tr>
  <tr>
    <td bgcolor='#E8FFF3'><font face='verdana' size='2'>IP SU</font></td>
    <td bgcolor='#F9F9F5'>$ip_su</td>
  </tr>
  <tr>
    <td bgcolor='#E8FFF3'><font face='verdana' size='2'>IP Trabajo</font></td>
    <td bgcolor='#F9F9F5'>$ip</td>
  </tr>
    <tr>
         <td colspan=2 bgcolor='#FF0000'><font color='#FFFFFF'  class='FONT'   ><b>Comentario</b></font></td>
    </tr>
  <tr>
    <td width='121' bgcolor='#E8FFF3'>
      <font face='verdana' size='2'>Mensaje</font></td>
    <td width='1291' bgcolor'#F9F9F5'>Se debe agendar visita urgente para corregir problema</td>
  </tr>
</table>



<table border='0' cellpadding='5' cellspacing='1' width='100%'>
<tr>
     <td align='right' bgcolor='#333333'><font face='verdana, helvetica, arial' size='2' font color='#FFFFFF'>Generado :  $fecha_final |  $hora </font></td>
  </tr>
  <tr>
    <td>
      <p align='right'><font face='verdana' size='2' color='#999999'><b>Monitoreo Proactivo 
    Migna </b></font></td>
  </tr>
</table>

</body>

</html>";  




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
$mail->SMTPSecure = 'tls';                           
$mail->Port = 587;

$mail->FromName = "Migna | Monitoreo Proactivo";
$mail->Subject = "Cliente con Problema de Senal";
$mail->MsgHTML($registro);

$mail->AddAttachment("ruta-del-archivo/archivo.zip");
//$mail->AddAddress("lponce@netlandchile.com");
$mail->AddAddress("hmunoz@netlandchile.com");
$mail->AddAddress("fbarros@netlandchile.com");
$mail->AddAddress("fmarquez@netlandchile.com");
$mail->AddAddress("acorderoj@netlandchile.com");
$mail->AddAddress("ayanez@netlandchile.com");
$mail->AddAddress("mpavez@netlandchile.com");

$mail->IsHTML(true);
if(!$mail->Send()) {

  echo "Error: " . $mail->ErrorInfo;

} else {

echo "OK";
}


       


	

	
	}
    







}
?>
