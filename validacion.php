<?php
require("system/config.php");
include("mail/class.phpmailer.php");
include("mail/class.smtp.php");
$correo=$_POST['correo'];
$archivo = $_FILES["file"]["tmp_name"];
$tamanio = $_FILES["file"]["size"];
$tipo    = $_FILES["file"]["type"];
$nombre  = $_FILES["file"]["name"];







$caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; //posibles caracteres a usar
$numerodeletras=10; //numero de letras para generar el texto
$cadena = ""; //variable para almacenar la cadena generada
for($i=0;$i<$numerodeletras;$i++)
{
    $cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
entre el rango 0 a Numero de letras que tiene la cadena */
}
$nombre_aleatorio=$cadena;

$fp = fopen($archivo, "rb");
$file = fread($fp, $tamanio);
$file = addslashes($file);
fclose($fp);

$sql=mysql_query("INSERT INTO take_a_file(nombre_aleatorio,file,nombre,tipo,archivo) values ('$nombre_aleatorio','$file','$nombre','$tipo','$archivo')");
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
URL de descarga : <br>http://172.16.10.3/get_a_file.php?id=$nombre_aleatorio

</body>

</html>";  







$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "201.217.255.8";
$mail->Username = "migna@netlandchile.com";
$mail->Password = "m9a7r5s3";
$mail->From = "migna@netlandchile.com";
$mail->FromName = "Take a File";
$mail->Subject = "Nueva Archivo";
$mail->SMTPSecure = 'tls';                           
$mail->Port = 587;
$mail->MsgHTML($registro);

$mail->AddAttachment("ruta-del-archivo/archivo.zip");
$mail->AddAddress("$correo", "Usuario");

$mail->IsHTML(true);
if(!$mail->Send()) {

  echo "Error: " . $mail->ErrorInfo;

} else {

echo "OK";
}
header("Location: take_a_file.php?id=$nombre_aleatorio");    

?>