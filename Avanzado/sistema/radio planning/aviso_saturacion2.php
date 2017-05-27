<?php
require("../../../system/config.php");
include("../../../mail/class.phpmailer.php");
include("../../../mail/class.smtp.php");

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
$sql=mysql_query("SELECT clientes_live,ip,estacion,ssid,funcion,mac,frecuencia,ancho_canal,marca,modelo FROM INT_radio_planning WHERE funcion='PMP'");

while ($row = mysql_fetch_row($sql)){
	
            $clientes=$row[0]; 
			$ip=$row[1]; 
			$estacion=$row[2]; 
			$ssid=$row[3]; 
			$funcion=$row[4]; 
			$mac=$row[5];
			$frec=$row[6];
			$ancho=$row[7];
			$marca=$row[8];
			$modelo=$row[9];
			
			if ($clientes>25)
			{
				
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

<table border='1' cellpadding='5' cellspacing='1' width='100%'>
  <tr>
    <td colspan=2 bgcolor='#FF0000' ><font face='verdana' font color='#FFFFFF' size='2'><b>Asunto</b></font></td>
  </tr>
  <tr>
      <td colspan=2 bgcolor='#FFFFCC'><font face='verdana' size='2'><strong>AP Saturada | </strong></font><strong><font size='2' face='verdana, helvetica, arial'>$clientes</font> Clientes</strong></td>
   </tr>
  <tr>
      <td colspan=2 bgcolor='#FF0000'><b><font color='#FFFFFF'  >Detalle del PMP Saturado</font></b></td>
    </tr>
  <tr>
    <td bgcolor='#FFFFCC'><font face='verdana' size='2'>Estacion</font></td>
    <td bgcolor'#F9F9F5'>$estacion</td>
  </tr>
  <tr>
    <td bgcolor='#FFFFCC'><font size='2' face='verdana'>AP</font></td>
    <td bgcolor='#F9F9F5'>$ip</td>
  </tr>
  <tr>
    <td bgcolor='#FFFFCC'><font face='verdana' size='2'>SSID</font></td>
    <td bgcolor='#F9F9F5'>$ssid</td>
  </tr>
  <tr>
    <td bgcolor='#FFFFCC'><font face='verdana' size='2'>Funcion</font></td>
    <td bgcolor='#F9F9F5'>$funcion</td>
  </tr>
  <tr>
    <td bgcolor='#FFFFCC'>MAC</td>
    <td bgcolor='#F9F9F5'>$mac</td>
  </tr>
  <tr>
    <td bgcolor='#FFFFCC'><font size='2' face='verdana'>Frecuencia</font></td>
    <td bgcolor='#F9F9F5'>$frec</td>
  </tr>
  <tr>
    <td bgcolor='#FFFFCC'>Ancho de Canal</td>
    <td bgcolor='#F9F9F5'>$ancho</td>
  </tr>
    <tr>
         <td colspan=2 bgcolor='#FF0000'><font color='#FFFFFF'  class='FONT'   ><b>Detalle de la Alarma</b></font></td>
    </tr>
  <tr>
    <td width='121' bgcolor='#FFFFCC'>
      <font face='verdana' size='2'>Asignado Por</font></td>
    <td width='1291' bgcolor'#F9F9F5'>Luis Ponce Z.</td>
  </tr>
  <tr>
    <td width='121' bgcolor='#FFFFCC'>
      <font face='verdana' size='2'>Estado</font></td>
    <td width='1291' bgcolor='#F9F9F5'>Critico</td>
  </tr>
  <tr>
      <td width='121' bgcolor='#FFFFCC'>
	 <font face='verdana' size='2'>Clientes</font></td>
      <td width='1291' bgcolor='#F9F9F5'><font size='2' face='verdana, helvetica, arial'>$clientes</font></td>
  </tr>
 <tr>
      <td width='121' bgcolor='#FFFFCC'>
	  <font face='verdana' size='2'>Comentario</font></td>
      <td width='1291' bgcolor='#F9F9F5'><font face='verdana, helvetica, arial' size='2'>Estudiar Instalacion de nueva AP en Direccion al Sector afectado o ver Factibilidad de Migrar a clientes a otra AP.</font></td>
  </tr>
</table>



<table border='0' cellpadding='5' cellspacing='1' width='100%'>
<tr>
     <td align='right' bgcolor='#000000'><font face='verdana, helvetica, arial' size='2' font color='#FFFFFF'>Generado :  $fecha_final |  $hora </font></td>
  </tr>
  <tr>
    <td>
      <p align='right'><font face='verdana' size='2' color='#999999'><b>Migna | Sistema Gestion de Clientes</b></font></td>
  </tr>
</table>

</body>

</html>";  


$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "201.217.255.7";
$mail->Username = "migna@netlandchile.com";
$mail->Password = "m9a7r5s3";
$mail->From = "migna@netlandchile.com";
$mail->FromName = "Sistema Gestion de Clientes";
$mail->Subject = "AP Saturada";
$mail->MsgHTML($registro);

$mail->AddAttachment("ruta-del-archivo/archivo.zip");
$mail->AddAddress("lponce@netlandchile.com", "Luis Ponce");
$mail->AddAddress("ayanez@netlandchile.com", "Antonio Yanez");
$mail->AddAddress("fbarros@netlandchile.com", "Felipe Barros");

$mail->IsHTML(true);
if(!$mail->Send()) {

  echo "Error: " . $mail->ErrorInfo;

} else {

echo "OK";
} 
 
 
				
				
				
				
				
			}
		

}



 


?>