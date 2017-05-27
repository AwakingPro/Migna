
	
<?php    
$cliente = $_GET["cliente"];
$numero = $_GET["numero"];
$depto = $_GET["depto"];
$comentario = $_GET["comentario"];
$creador = $_GET["creador"];
$fecha_creacion= $_GET["fecha_creacion"];
$prioridad= $_GET["prioridad"];
$asignar= $_GET["asignar"];	
 $origen= $_GET["origen"];
 $fecha_creacion= $_GET["fecha_creacion"];
 $status= $_GET["status"];
 $asignar= $_GET["asignar"];
$prioridad= $_GET["prioridad"];
$status= $_GET["status"];


    include("../../../system/config.php");
    include("../../../phpmailer/class.phpmailer.php");
    include("../../../phpmailer/class.smtp.php");
	
	$fecha = date("d/m/Y");

$registro="Estimados<br><br>Con Fecha $fecha Se ha creado el Siguiente Ticket de Atencion : <br><br>
<table>
<tr>
    <td width='50'>Cliente</td>
    <td >$cliente</td>
  </tr>
<tr>
    <td >Ticket</td>
    <td >$numero</td>
  </tr>
  <tr>
    <td >Origen</td>
    <td >$origen</td>
  </tr>
  <tr>
    <td>Comentario</td>
    <td>$comentario</td>
  </tr>
  <tr>
    <td >Creado por</td>
    <td >$creador</td>
  </tr>
 
  <tr>
    <td>Fecha Creacion</td>
    <td>$fecha_creacion</td>
  </tr>
  <tr>
    <td >Prioridad</td>
    <td >$prioridad</td>
  </tr>
  <tr>
    <td>Asignado a:</td>
    <td>$asignar</td>
  </tr>
  <tr>
    <td>Estado:</td>
    <td>$status</td>
  </tr>
</table>
<br> 
Icarus Sistema Gestion<br>
Netland Chile S.A. |
icarus@netlandchile.com 
";  








$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "mta.gtdinternet.com";
$mail->Username = "icarus@netlandchile.com";
$mail->Password = "soporte123";
$mail->From = "icarus@netlandchile.com";
$mail->FromName = "Icarus Sistema de Gestion";
$mail->Subject = "Modulo Ticket : Se ha creado un Nuevo Ticket";
$mail->Body = $cuerpo; 
$mail->MsgHTML($registro);
$mail->CharSet = 'UTF-8';

$mail->AddAttachment("ruta-del-archivo/archivo.zip");
$mail->AddAddress("lponce@netlandchile.com");




$mail->IsHTML(true);
if(!$mail->Send()) {

  echo "Error: " . $mail->ErrorInfo;

} else {

 header("Location: ticket_creado.php?numero=$numero&cliente=$cliente");

}
?>