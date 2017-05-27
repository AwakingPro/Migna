<?php
include("../../../system/config.php");
include("../../../services/config.php");
$id_pago = $_GET["id_pago"];

$sql_aviso=mysql_query("SELECT * FROM historial_pagos WHERE id='$id_pago'  LIMIT 1");



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
  <style type="text/css">
  body {
	background-color: #333333;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
  </style>
  <script type="text/javascript" src="../../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../../js/jquery-ui.min.js"></script>

</head>


<body>
<div id="body">
<div id="top"><?php 
	   $nombre=$_SESSION['MM_Username'];
	   $bienvenido=mysql_query("SELECT * FROM usuarios WHERE usuario='$nombre'");
	  
	  while($row=mysql_fetch_array($bienvenido)){
     	
	?>
	
     <?php echo "Bienvenido , "." ".$row['nombre']." | "?><a href="/../Avanzado/sistema/sistema.php" class="Menu10"> Inicio</a> | 
  <a href="<?php echo $logoutAction ?>
" class="Menu10"> Salir </a>
  <?php
	  }
	  ?></div>
 <div id="inc_banner">
  <div id="inc_logo"></div>
 </div>

 <?php include '../../../include/estructura/menu_intranet.php';?>
  <?php include '../../../include/estructura/submenu_intranet_luz.php';?>
  <P>
<div id="ticket_resultado3">
<div id="busqueda_clientes">

<div id="datos_com"><strong>+ Info sobre el Pago:</strong>  <br />
      <br />
 </div>
  
  <?php while($row=mysql_fetch_array($sql_aviso)){?>
<form action="pagos_de_luz.php" method="post">
<table width="1141" border="0">
  <tr>
    <td>Nombre del Registro</td>
    <td>:</td>
    <td colspan="2"><span id="sprytextfield1">
      <label for="aviso"></label>
      <input name="aviso" type="text" class="formulario_grande_intranet" id="aviso" value='<?php echo $row['estacion']; ?>' readonly="readonly" />
      <span class="textfieldRequiredMsg">Se necesita un valor.</span><span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span><span class="textfieldMaxCharsMsg">Se ha superado el número máximo de caracteres.</span></span></td>
  </tr>
  <tr>
    <td>Monto Cancelado</td>
    <td>:</td>
    <td colspan="2"><span id="sprytextfield1">
      <label for="proveedor"></label>
      <input name="proveedor" type="text" class="formulario_grande_intranet" id="aviso" value='<?php echo $row['monto']; ?>' readonly="readonly" />
      <span class="textfieldRequiredMsg">Se necesita un valor.</span><span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span><span class="textfieldMaxCharsMsg">Se ha superado el número máximo de caracteres.</span></span></td>
  </tr>
  <tr>
    <td width="204"><span class="style1 style2">KW</span></td>
    <td width="10">:</td>
    <td colspan="2"><span id="sprytextfield2">
    <label for="fecha_contratacion"></label>
    <input name="aviso3" type="text" class="formulario_grande_intranet" id="aviso2" value='<?php echo $row['kw']; ?>' readonly="readonly" />
    <span class="textfieldRequiredMsg">Se necesita un valor.</span><span class="textfieldInvalidFormatMsg">Formato no válido.</span></span></td>
  </tr>
  <tr>
    <td>Fecha  Pago</td>
    <td>:</td>
    <td colspan="2"><span id="sprytextfield3">
      <label for="fecha_expiracion"></label>
      <input name="fecha_expiracion" type="text" class="formulario_chico_intranet"id="fecha_expiracion" value='<?php echo $row['fecha_pago']; ?>' />
      <input name="aviso2" type="hidden" class="formulariochicoEDIT"id="fecha_expiracion" value='<?php echo $row['aviso']; ?>' />
      <input name="id_2" type="hidden" class="formulariochicoEDIT"id="fecha_expiracion" value='<?php echo $row['id']; ?>' />
      <span class="textfieldRequiredMsg">Se necesita un valor.</span><span class="textfieldInvalidFormatMsg">Formato no válido.</span></span></td>
  </tr>
  <tr>
    <td>Comentario</td>
    <td>:</td>
    <td rowspan="2"><label for="textarea"></label>
      <textarea name="textarea" cols="45" rows="9" readonly="readonly" class="formulario_grande_intranet" id="textarea"><?php echo $row['comentario']; ?></textarea></td>
    <td rowspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><input name="btn_submit" type="submit" class="boton_intranet" value="Volver a Pagos" /></td>
    <td>&nbsp;</td>
    <td width="683">&nbsp;</td>
    <td width="226">&nbsp;</td>
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
		   echo "<div id='dialog' title='Procedimiento Eliminado'><center><P>Registro Eliminado Exitosamente!
	   </center></div>
	   ";
		   
		   }
	
   
   ?>
   <br />
   <br />
  </div>

   </div>
  
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["change"], minChars:1, maxChars:400});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["change"], minChars:1, maxChars:400});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "date", {format:"yyyy-mm-dd", validateOn:["change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "date", {format:"yyyy-mm-dd", validateOn:["change"]});
</script>
<div id="foot">Migna | Sistema Gestión de Clientes - Todos los derechos reservados &copy; <?php
echo date("Y"); ?></div>
</body>
</html>
