<?php
include("../../../mail/class.phpmailer.php");
include("../../../mail/class.smtp.php");
$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'm9a7r5s3';
$database = 'SGC';
$hora=date("G:H:s");
$fecha= date("Y-m-d");
$usuario=$_POST['usuario'];
$Descripcion = $_POST['Descripcion'];
$table = 'morosos';
if (!@mysql_connect($db_host, $db_user, $db_pass))
    die("No se pudo establecer conexión a la base de datos");
 
if (!@mysql_select_db($database))
    die("base de datos no existe");
    if(isset($_POST['submit']))
    {
         $fname = $_FILES['sel_file']['name'];
         echo 'Cargando nombre del archivo: '.$fname.' <br>';
         $chk_ext = explode(".",$fname);
 
         if(strtolower(end($chk_ext)) == "csv")
         {
             $filename = $_FILES['sel_file']['tmp_name'];
             $handle = fopen($filename, "r");
             $sql_id = "INSERT into id_morosos(fecha,hora,usuario,descripcion) values('$fecha','$hora','$usuario','$Descripcion')";
                mysql_query($sql_id) or die('Error: '.mysql_error());
				$sql_id_ver=mysql_query("SELECT id FROM id_morosos order by id ASC");
				while($row=mysql_fetch_array($sql_id_ver)){
					$id_mor=$row['0'];
					}		
             while (($data = fgetcsv($handle, 1000, ";")) !== FALSE)
             {
						
                $sql = "INSERT into morosos_total(cliente,rut,deuda,factura,fecha,hora,usuario,id_morosos) values('$data[0]','$data[1]','$data[3]','$data[2]','$fecha','$hora','$usuario','$id_mor')";
                mysql_query($sql) or die('Error: '.mysql_error());
				
		        
				
				
				
             }
             fclose($handle);
			 $sql = "INSERT into morosos(cliente,rut,deuda,factura,fecha,hora,usuario,id_morosos)  SELECT distinct cliente,rut,deuda,factura,fecha,hora,usuario,id_morosos  from morosos_total WHERE id_morosos='$id_mor'";
                mysql_query($sql) or die('Error: '.mysql_error());
				$registro="<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Migna</title>
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
<p>Estimados</p>
<p>Con Fecha $fecha se ha realizado la carga del listado de Morosos al sistema de gestion.</p>
<p>Atte.</p>
$usuario
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
$mail->Subject = "Migna : Carga Listado de Morosos ";
$mail->SMTPSecure = 'tls';                           
$mail->Port = 587;
$mail->MsgHTML($registro);

$mail->AddAttachment("ruta-del-archivo/archivo.zip");
$mail->AddAddress("lponce@netlandchile.com", "Luis Ponce");
$mail->AddAddress("avillarroel@netlandchile.com", "Angela Villarroel");
$mail->AddAddress("fbarros@netlandchile.com", "Felipe Barros");
$mail->AddAddress("fmarquez@netlandchile.com", "Francisco Marquez");
$mail->AddAddress("iluna@netlandchile.com", "Ivonne Luna");
$mail->AddAddress("ayanez@netlandchile.com", "Antonio Yanez");
$mail->AddAddress("acorderoj@netlandchile.com", "Axel Cordero");
$mail->AddAddress("jtoro@netlandchile.com", "Josefina Toro");
$mail->AddAddress("pportales@netlandchile.com", "Paula Portales");
$mail->IsHTML(true);
if(!$mail->Send()) {

  echo "Error: " . $mail->ErrorInfo;

} else {

echo "OK";
}
				
             		header("Location: cargar.php");
         }
         else
         {
             		header("Location: cargar.php?id=1");

         }
    }
 
?>