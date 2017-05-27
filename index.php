<?php



require_once('system/config.php'); 

?>
<?php $id=$_GET['id'] ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_name, $conn);
$query_SG_Login_Usuario = "SELECT * FROM usuarios ORDER BY nivel ASC";
$SG_Login_Usuario = mysql_query($query_SG_Login_Usuario, $conn) or die(mysql_error());
$row_SG_Login_Usuario = mysql_fetch_assoc($SG_Login_Usuario);
$totalRows_SG_Login_Usuario = mysql_num_rows($SG_Login_Usuario);
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['usuario'])) {
  $loginUsername=$_POST['usuario'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "nivel";
  $MM_redirectLoginSuccess = "Administrador/sistema/sistema.php";
  $MM_redirectLoginSuccess2 = "Basico/sistema/sistema.php";
  $MM_redirectLoginSuccess3 = "Avanzado/sistema/sistema.php";
  $MM_redirectLoginSuccess4 = "Ventas/sistema/sistema.php";
  $MM_redirectLoginFailed = "index.php?id=1";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_name, $conn);

  $LoginRS__query=sprintf("SELECT usuario, clave, nivel FROM usuarios WHERE usuario=%s AND clave=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text"));

  $LoginRS = mysql_query($LoginRS__query, $conn) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {

    $loginStrGroup  = mysql_result($LoginRS,0,'nivel');

    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];
    }
       if($loginStrGroup==1) { header("Location: " . $MM_redirectLoginSuccess ); }
          if($loginStrGroup==2) { header("Location: " . $MM_redirectLoginSuccess2 ); }
          if($loginStrGroup==3) { header("Location: " . $MM_redirectLoginSuccess3 ); }
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Migna | Sistema Gestión de Clientes</title>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url();
}
</style>
<link href="css/estilos.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#apDiv1 {
	position: absolute;
	width: 265px;
	height: 278px;
	z-index: 1;
	left: 7px;
	top: 200px;
	background-color: #B6D2F7;
}
#apDiv2 {
	position: absolute;
	width: 237px;
	height: 150px;
	z-index: 1;
	left: 801px;
	top: 21px;
	background-color: #E4EEF8;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 11px;
	color: #333;
	border: thin solid #ABADB3;
}
</style>
  <script type="text/javascript" src="../../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../../js/jquery-ui.min.js"></script>
<link rel="stylesheet" href="css/estilos2.css">
<script>
$(function() {
$( "#dialog" ).dialog();
});
</script>
</head>

<body>
<div id="body_index">
  <div id="banner_index">
      <div id="acceso"></div>
     <center> <form ACTION="<?php echo $loginFormAction; ?>" METHOD="POST" name="ingreso" id="ingreso"><table width="223" border="0">
  <tr>
    <td height="20"><center>Usuario</center></td>
    </tr>
  <tr>
    <td><input name="usuario" type="text" class="Form"  id="usuario" size="30"/></td>
    </tr>
  <tr>
    <td><center>Contraseña</center></td>
    </tr>
  <tr>
    <td><input name="password" type="password" class="Form"  id="password" size="30"/></td>
    </tr>
  <tr>
    <td width="217"></td>
    </tr>
</table>
<center><input name="button2" type="submit" class="boton_intranet"   id="button2"  onclick="return Ingreso();" value="Acceso al Sistema"/></center>
</form></center>
<?php 

if (empty($id)){}
if ($id==1){
	echo "<div id='dialog'title='Error'> <p>Nombre de Usuario o Contraseña inválidos! Intente nuevamente.</div>";
	
	}


?>
   
  </div>
</div>
</body>
</html>
