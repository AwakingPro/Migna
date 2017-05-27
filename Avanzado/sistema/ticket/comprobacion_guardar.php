<?php
require("../../../system/config.php");
include("../../../mail/class.phpmailer.php");
include("../../../mail/class.smtp.php");

$usuario2= $_POST["usuario"];

$usuario3=mysql_query("SELECT nombre FROM usuarios WHERE usuario='$usuario2'");
while($row=mysql_fetch_array($usuario3)){
     	$usuario = $row['nombre'];
		global $usuario;
	
	
}



$actualizacion=date("Y-m-d H:i:s");

 $numero = $_POST["numero"];
  $fecha_actualizacion= $_POST["fecha_actualizacion"];

 $cliente= $_POST["cliente"];
$comentario_interno= $_POST["comentario_interno"];
$prioridad= $_POST["prioridad"];
$asignar= $_POST["asignar"];
$status= $_POST["status"];


$sql_editar=mysql_query("SELECT * FROM TICKET WHERE numero='$numero' and cliente='$cliente'");

if (mysql_num_rows($sql_editar)>0)
{
	
header("Location: editar_registro.php?id=1&cliente=$cliente&numero=$numero");
 $sql7=mysql_query("UPDATE TICKET	 
SET   prioridad=	'$prioridad',asignar=	'$asignar',status=	'$status' ,fecha_actualizacion=	'$fecha_actualizacion' WHERE numero='$numero' and cliente='$cliente'");

$sql8=mysql_query("INSERT INTO TICKET_comentario_interno(actualizacion,usuario,comentario_interno,cliente,numero) values ('$actualizacion','$usuario','$comentario_interno','$cliente','$numero')");
 
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

<table border='0' cellpadding='5' cellspacing='1' width='100%'>
  <tr>
    <td colspan=2 bgcolor='#FF6600' ><font face='verdana' font color='#FFFFFF' size='2'><b>Asunto</b></font></td>
  </tr>
  <tr>
      <td colspan=2 bgcolor='#F9F9F5'><font face='verdana' size='2'>Se te ha Asignado el Ticket #$numero</font></td>
   </tr>
  <tr>
      <td colspan=2 bgcolor='#FF6600'><b><font color='#FFFFFF'  >Detalle Cliente</font></b></td>
    </tr>
  <tr>
    <td bgcolor='#E8EEFF'><font face='verdana' size='2'>Nombre</font></td>
    <td bgcolor'#F9F9F5'>$cliente</td>
  </tr>
  <tr>
    <td bgcolor='#E8EEFF'><font face='verdana' size='2'>Comuna</font></td>
    <td bgcolor='#F9F9F5'>$comuna</td>
  </tr>
  <tr>
    <td bgcolor='#E8EEFF'><font face='verdana' size='2'>Telefono</font></td>
    <td bgcolor='#F9F9F5'>$localidad</td>
  </tr>
  <tr>
    <td bgcolor='#E8EEFF'><font face='verdana' size='2'>Contacto</font></td>
    <td bgcolor='#F9F9F5'>$id_localidad</td>
  </tr>
  <tr>
    <td bgcolor='#E8EEFF'><font face='verdana' size='2'>IP SU</font></td>
    <td bgcolor='#F9F9F5'>$codigo_ap</td>
  </tr>
  <tr>
    <td bgcolor='#E8EEFF'><font face='verdana' size='2'>IP Trabajo</font></td>
    <td bgcolor='#F9F9F5'>$ip</td>
  </tr>
    <tr>
   
   </tr>
    <tr>
         <td colspan=2 bgcolor='#FF6600'><font color='#FFFFFF'  class='FONT'   ><b>Detalle Ticket </b></font></td>
    </tr>
  <tr>
    <td width='121' bgcolor='#E8EEFF'>
      <font face='verdana' size='2'>Asignado Por</font></td>
    <td width='1291' bgcolor'#F9F9F5'>$asignar</td>
  </tr>
  <tr>
    <td width='121' bgcolor='#E8EEFF'>
      <font face='verdana' size='2'>Estado</font></td>
    <td width='1291' bgcolor='#F9F9F5'>$status</td>
  </tr>
  <tr>
      <td width='121' bgcolor='#E8EEFF'>
	 <font face='verdana' size='2'>Prioridad</font></td>
      <td width='1291' bgcolor='#F9F9F5'><font face='verdana, helvetica, arial' size='2'>$prioridad</font></td>
  </tr>
 <tr>
      <td width='121' bgcolor='#E8EEFFD'>
	  <font face='verdana' size='2'>Comentario</font></td>
      <td width='1291' bgcolor='#F9F9F5'><font face='verdana, helvetica, arial' size='2'>$comentario_interno</font></td>
  </tr>
</table>



<table border='0' cellpadding='5' cellspacing='1' width='100%'>
<tr>
     <td align='right' bgcolor='#000000'><font face='verdana, helvetica, arial' size='2' font color='#FFFFFF'>Generado :  $fecha_final |  $hora </font></td>
  </tr>
  <tr>
    <td>
      <p align='right'><font face='verdana' size='2' color='#999999'><b>Migna | Sistema Gestión de Clientes</b></font></td>
  </tr>
</table>

</body>

</html>

";  







$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "mail.netlandchile.com";
$mail->Username = "migna@netlandchile.com";
$mail->Password = "m9a7r5s3";
$mail->From = "migna@netlandchile.com";
$mail->FromName = "Sistema Gestion de Clientes";
$mail->Subject = "Ingreso Cliente";
$mail->MsgHTML($registro);

$mail->AddAttachment("ruta-del-archivo/archivo.zip");
$mail->AddAddress("lponce@netlandchile.com", "Luis Ponce");
$mail->IsHTML(true);
if(!$mail->Send()) {

  echo "Error: " . $mail->ErrorInfo;

} else {

echo "OK";
} 
 
} else if(mysql_num_rows($sql)==0){
header("Location: error.php");
} 

?>