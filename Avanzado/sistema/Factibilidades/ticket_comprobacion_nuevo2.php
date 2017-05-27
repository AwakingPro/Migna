<?php
include("../../../system/config.php");
include("../../../mail/class.phpmailer.php");
include("../../../mail/class.smtp.php");
include("../../../services2/config.php");
 $cliente2= $_POST["cliente"];
 $cliente= trim($cliente2);
 $creador= $_POST["creador"];
 $depto="Soporte Tecnico";
 $tipo= "Coordinacion";
 $comuna= $_POST["comuna"];
 $prioridad= $_POST["prioridad"];

 $comentario= $_POST["comentario"];
 $fecha_creacion= $_POST["fecha_creacion"];
 $rut= $_POST["rut"];
 $correo= $_POST["correo"];
 $plan= $_POST["plan"];
 $direccion= $_POST["direccion"];
 $subtipo= 'Factibilidad';
 $status= 'Abierto';;
 $telefono= $_POST["telefono"];
 $como= $_POST["como"];

 $asignar= $_POST["responsable"];
 $numero = rand(100004,999899);
 
 $sql_consulta=mysql_query("SELECT * FROM TICKET WHERE cliente='$cliente'");

 
 if (mysql_num_rows($sql_consulta)==0)
 {



		 $sql3=mysql_query("INSERT INTO TICKET(cliente,rut,correo,telefono,plan,direccion,como,asignar,creador,numero,fecha_creacion,subtipo,comentario,status,depto,tipo,comuna,prioridad) values ('$cliente','$rut','$correo','$telefono','$plan','$direccion','$como','$asignar','$creador','$numero','$fecha_creacion','$subtipo','$comentario','$status','$depto','$tipo','$comuna','$prioridad')");

header("Location: ticket_nuevo_factibilidad.php?numero=$numero&id=1");

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
    <td colspan=2 bgcolor='#CC6600' ><font face='verdana' font color='#FFFFFF' size='2'><b>Asunto</b></font></td>
  </tr>
  <tr>
      <td colspan=2 bgcolor='#F9F9F5'><font face='verdana' size='2'>Factibilidad</font></td>
   </tr>
  <tr>
      <td colspan=2 bgcolor='#CC6600'><b><font color='#FFFFFF'  >Detalle de Cliente</font></b></td>
    </tr>
  <tr>
    <td bgcolor='#FFE2C6'><font face='verdana' size='2'>Nombre</font></td>
    <td bgcolor'#F9F9F5'>$cliente</td>
  </tr>
  <tr>
    <td bgcolor='#FFE2C6'>Prioridad</td>
    <td bgcolor='#F9F9F5'>$prioridad</td>
  </tr>
  <tr>
    <td bgcolor='#FFE2C6'><font face='verdana' size='2'>Rut</font></td>
    <td bgcolor='#F9F9F5'>$rut</td>
  </tr>
  <tr>
    <td bgcolor='#FFE2C6'><font face='verdana' size='2'>Correo</font></td>
    <td bgcolor='#F9F9F5'>$correo</td>
  </tr>
  <tr>
    <td bgcolor='#FFE2C6'><font face='verdana' size='2'>Plan</font></td>
    <td bgcolor='#F9F9F5'>$plan</td>
  </tr>
  <tr>
    <td bgcolor='#FFE2C6'><font face='verdana' size='2'>Telefono</font></td>
    <td bgcolor='#F9F9F5'>$telefono</td>
  </tr>
  <tr>
    <td bgcolor='#FFE2C6'><font face='verdana' size='2'>Comuna</font></td>
    <td bgcolor='#F9F9F5'>$comuna</td>
  </tr>
    <tr>
         <td colspan=2 bgcolor='#CC6600'><font color='#FFFFFF'  class='FONT'   ><b>Comentario</b></font></td>
    </tr>
  <tr>
    <td width='121' bgcolor='#E8FFF3'>
      <font face='verdana' size='2'>Mensaje</font></td>
    <td width='1291' bgcolor'#F9F9F5'>$comentario</td>
  </tr>
</table>



<table border='0' cellpadding='5' cellspacing='1' width='100%'>
<tr>
     <td align='right' bgcolor='#000000'>&nbsp;</td>
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
$mail->Host = "201.217.255.8";
$mail->Username = "migna@netlandchile.com";
$mail->Password = "m9a7r5s3";
$mail->From = "migna@netlandchile.com";
$mail->FromName = "Sistema Gestion de Clientes";
$mail->Subject = "Nueva Factibilidad";
$mail->SMTPSecure = 'tls';                           
$mail->Port = 587;
$mail->MsgHTML($registro);

$mail->AddAttachment("ruta-del-archivo/archivo.zip");
$mail->AddAddress("lponce@netlandchile.com", "Luis Ponce");
$mail->AddAddress("ventas@netlandchile.com", "Ventas");
$mail->AddAddress("fbarros@netlandchile.com", "Felipe Barros");
$mail->AddAddress("ayanez@netlandchile.com", "Antonio Yanez");
$mail->AddAddress("mpavez@netlandchile.com", "Mario Pavez");
$mail->AddAddress("fmarquez@netlandchile.com", "Francisco Marquez");

$mail->IsHTML(true);
if(!$mail->Send()) {

  echo "Error: " . $mail->ErrorInfo;

} else {

echo "OK";
}



}
           else {
			   
header("Location: ticket_nuevo_factibilidad.php?id=8");
			   
			
			   
			   
			   
			   
			   }
     

?>