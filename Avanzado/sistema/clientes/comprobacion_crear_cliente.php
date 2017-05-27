<?php
include("../../../system/config.php");
 include("../../../mail/class.phpmailer.php");
    include("../../../mail/class.smtp.php");

$cliente3= $_POST["cliente"];
$cliente= trim($cliente3);



$rut2= $_POST["rut"];
$rut= trim($rut2);

$giro2= $_POST["giro"];
$giro= trim($giro2);

$telefonos2= $_POST["telefonos"];
$telefonos= trim($telefonos2);

$correos2= $_POST["correos"];
$correos= trim($correos2);


$contacto2= $_POST["contacto"];
$contacto= trim($contacto2);

$direccion_comercial2= $_POST["direccion_comercial"];
$direccion_comercial= trim($direccion_comercial2);



$sql=mysql_query("SELECT * FROM SP_soporte_crear_cliente WHERE rut='$rut'");

if (mysql_num_rows($sql)>0)
{
header("Location: crear_clientes.php?id=2&rut=$rut");
} else  if (mysql_num_rows($sql)==0){
header("Location: crear_clientes.php?id=1");


		 $sql3=mysql_query("INSERT INTO SP_soporte_crear_cliente(cliente,rut,giro,telefonos,correos,contacto,direccion_comercial) values ('$cliente','$rut','$giro','$telefonos','$correos','$contacto','$direccion_comercial')");


$registro="Se ha ingresado el siguiente Cliente : <p>
Nombre : $cliente<br>
Rut : $rut<br>
Giro : $giro<br>
Telefono : $telefonos<br>
Correo : $correos<br>
Contacto : $contacto<br>
Direccion : $direccion_comercial
<p>
Atte.<br>
Sistema Gestion de Clientes


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


       
}



?>

