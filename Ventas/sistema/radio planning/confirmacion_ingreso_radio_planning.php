
	
<?php    

$estacion = $_GET["estacion"];
$funcion = $_GET["funcion"];
$marca = $_GET["marca"];
$modelo = $_GET["modelo"];
$ip= $_GET["ip"];
$mac = $_GET["mac"];
$ssid = $_GET["ssid"];
$asignado = $_GET["asignado"];
    include("../../../system/config.php");
    include("../../../phpmailer/class.phpmailer.php");
    include("../../../phpmailer/class.smtp.php");
	
	$fecha = date("d/m/Y");

$registro="Estimados<br><br>Con Fecha $fecha Se ha ingresado el siguiente Registro en el Radio Planning : <br><br>
<table>
<tr>
    <td >Estacion</td>
    <td >$estacion</td>
  </tr>
  <tr>
    <td >Funcion</td>
    <td >$funcion</td>
  </tr>
  <tr>
    <td>Marca</td>
    <td>$marca</td>
  </tr>
  <tr>
    <td >Modelo</td>
    <td >$modelo</td>
  </tr>
  <tr>
    <td>Direccion IP</td>
    <td>$ip</td>
  </tr>
  <tr>
    <td >Mac Address</td>
    <td >$mac</td>
  </tr>
  <tr>
    <td>SSID/Remarks</td>
    <td>$ssid</td>
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
$mail->Subject = "Se ha Ingresado un nuevo registro al Radio Planning";
$mail->Body = $cuerpo; 
$mail->MsgHTML($registro);
$mail->CharSet = 'UTF-8';

$mail->AddAttachment("ruta-del-archivo/archivo.zip");
$mail->AddAddress($asignado);

$mail->IsHTML(true);
if(!$mail->Send()) {

  echo "Error: " . $mail->ErrorInfo;

} else {

  header("Location: registro_ingresado.php"); 

}
?>