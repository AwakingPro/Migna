<?php
include("../../../system/config.php");
include("../../../services/config.php");
$id_aviso = $_GET["id_aviso"];

$sql_aviso=mysql_query("SELECT * FROM INT_avisos WHERE id='$id_aviso'  LIMIT 1");



//initialize the session
if (!isset($_SESSION)) {
  session_start();
}


// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);

  $logoutGoTo = "../../index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "3";
$MM_donotCheckaccess = "false";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) {
  // For security, start by assuming the visitor is NOT authorized.
  $isValid = False;

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username.
  // Therefore, we know that a user is NOT logged in if that Session variable is blank.
  if (!empty($UserName)) {
   // Besides being logged in, you may restrict access to only certain users based on an ID established when they login.
    // Parse the strings into arrays.
    $arrUsers = Explode(",", $strUsers);
    $arrGroups = Explode(",", $strGroups);
    if (in_array($UserName, $arrUsers)) {
      $isValid = true;
    }
    // Or, you may restrict access to only certain users based on their username.
    if (in_array($UserGroup, $arrGroups)) {
      $isValid = true;
    }
    if (($strUsers == "") && false) {
      $isValid = true;
    }
  }
  return $isValid;
}

$MM_restrictGoTo = "../../index.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0)
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo);
  exit;
}
$cliente=$_SESSION['MM_Username'];
$bienvenido=mysql_query("SELECT nombre FROM usuarios WHERE usuario='$cliente'");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="favicon.png" />
<link rel="stylesheet" type="text/css" href="../engine1/style.css" />
	<script type="text/javascript" src="../engine1/jquery.js"></script>
	<script src="../../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<title>Migna | Sistema Gestión de Clientes</title>
<?php include '../../../include/estructura/title.php';?>
<?php include '../../../include/estructura/bordes.php';?>
<link href="../../../css/estilos.css" rel="stylesheet" type="text/css" />
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
	width: 253px;
	height: 150px;
	z-index: 1;
	left: 677px;
	top: 24px;
	background-color: #FFF;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 11px;
	color: #333;
	border: thin none #CCC;
}
</style>
<style type="text/css">
#apDiv3 {
	position: absolute;
	width: 270px;
	height: 267px;
	z-index: 1;
	border: thin none #CCC;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 11px;
	color: #666;
}
#apDiv4 {
	position: absolute;
	width: 270px;
	height: 267px;
	z-index: 1;
	left: 303px;
	top: 244px;
}
</style>
<link href="../../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />

  <script src="../../../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>

  <link href="../../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />


</head>
</head>

<body>
<div id="top"></div>
 <div id="body">
 <?php include '../../../include/estructura/banner.php';?>

 <?php include '../../../include/estructura/menu_intranet.php';?>
  <?php include '../../../include/estructura/submenu_intranet.php';?>
  <P>
<div id="ticket_resultado3">
Modificar Aviso : 
  <P>
  <?php while($row=mysql_fetch_array($sql_aviso)){?>
<form action="comprobacion_crear_aviso.php" method="post">
<table width="917" border="0">
  <tr>
    <td>Servicio</td>
    <td colspan="2"><span id="sprytextfield1">
      <label for="aviso"></label>
      <input name="aviso" type="text" value='<?php echo $row['aviso']; ?>' class="formulario" id="aviso" />
      <span class="textfieldRequiredMsg">Se necesita un valor.</span><span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span><span class="textfieldMaxCharsMsg">Se ha superado el número máximo de caracteres.</span></span></td>
  </tr>
  <tr>
    <td>Proveedor</td>
    <td colspan="2"><span id="sprytextfield1">
      <label for="proveedor"></label>
      <input name="proveedor" type="text" value='<?php echo $row['proveedor']; ?>' class="formulario" id="aviso" />
      <span class="textfieldRequiredMsg">Se necesita un valor.</span><span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span><span class="textfieldMaxCharsMsg">Se ha superado el número máximo de caracteres.</span></span></td>
  </tr>
  <tr>
    <td width="220"><span class="style1 style2">Fecha de Contratacion</span></td>
    <td colspan="2"><span id="sprytextfield2">
    <label for="fecha_contratacion"></label>
    <input name="fecha_contratacion" type="text" class="formulariochico" id="fecha_contratacion" value='<?php echo $row['fecha_contratacion']; ?>' />
    <span class="textfieldRequiredMsg">Se necesita un valor.</span><span class="textfieldInvalidFormatMsg">Formato no válido.</span></span></td>
  </tr>
  <tr>
    <td><span class="style1 style2">Fecha de Vencimiento</span></td>
    <td colspan="2"><span id="sprytextfield3">
    <label for="fecha_expiracion"></label>
    <input name="fecha_expiracion" type="text" class="formulariochico"id="fecha_expiracion" value='<?php echo $row['fecha_expiracion']; ?>' />
    <span class="textfieldRequiredMsg">Se necesita un valor.</span><span class="textfieldInvalidFormatMsg">Formato no válido.</span></span></td>
    </tr>
  <tr>
    <td><input name="btn_submit" type="submit" class="formulariochico" value="Crear Aviso"></td>
    <td width="399">
      
      
      <input name="btn_submit2" type="reset" value="Limpiar Datos" class="formulariochico" />
      </td>
    <td width="284">&nbsp;</td>
  </tr>
</table></form><?php }?>
    <?php
   $id=$_GET['id_procedimientos'];
   $id2=$_GET['fecha_actualizacion'];
   $id3=$_GET['proc'];
   if ($id==1){
	   echo "<div id='dialog' title='Eliminar Procedimiento'>Esta Seguro que desea eliminar el Procedimiento  : "."#".$id3." "."</br>
	   <center><form method='GET' 
	   
	   action='comprobacion_eliminado_proc.php'>
	   <input type='hidden' name='proc' value='$id3'>
	   <input type='hidden' name='fecha_actualizacion' value='$id2'>
	   	   <input type='hidden' name='ticket_filter' value='$ticket_filter'>

	   
	   <input type='submit' class='formulariosuperchico'  value='Si' name='Si'>"." &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp        "."<input type='submit'  value='No' class='formulariosuperchico'  name='No'></form></center>
	   </div>
	   ";
	   
	   
	   }
	   else if ($id==3){
		   echo "<div id='dialog' title='Procedimiento Eliminado'><center>Registro Eliminado Exitosamente!
	   </center></div>
	   ";
		   
		   }
   
   ?>
  </div>

  <?php include '../../../include/estructura/foot.php';?>
  
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["change"], minChars:1, maxChars:400});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["change"], minChars:1, maxChars:400});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "date", {format:"yyyy-mm-dd", validateOn:["change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "date", {format:"yyyy-mm-dd", validateOn:["change"]});
</script>
</body>
</html>
<?php
mysql_free_result($SG_Login_Usuario);
mysql_free_result($cliente);
mysql_free_result($bienvenido);
?>