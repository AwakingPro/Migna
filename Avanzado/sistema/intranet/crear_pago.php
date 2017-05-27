<?php
include("../../../system/config.php");
include("../../../services/config.php");



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

  <script type="text/javascript" src="../../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../../js/jquery-ui.min.js"></script>
<script type="text/javascript" src="../../../jquery/js/jquery-1.10.2"></script>
<script src="../../../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link rel="stylesheet" href="../../../css/estilos2.css">
<style type="text/css">
body {
	background-color: #333333;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
<link href="../../../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../../../jquery/css/ui-lightness/jquery-ui-1.10.4.custom.css">
<script type="text/javascript" src="../../../jquery/js/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript" src=".././../jquery/js/jquery-ui-1.10.4.custom.min.js"></script>
<script>
$(function($){
    $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'yy-mm-dd',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);
});  </script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  $(function() {
    $( "#datepicker2" ).datepicker();
  });
  $(function() {
$( "#dialog" ).dialog();
});
</script>

</head>
</head>

<body>
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

<div id="ticket_resultado3">
<div id="busqueda_clientes">
<div id="datos_com"><strong>Crear Nuevo Registro de Luz:</strong>  <br />

 
</div>
<form action="comprobacion_crear_pago.php" method="post">
  <table width="883" border="0">
  <tr>
    <td>Nombre del Registro </td>
    <td>:</td>
    <td colspan="2"><span id="sprytextfield1">
      <label for="aviso"></label>
      <input name="estacion" type="text" class="formulario_grande_intranet" id="aviso" />
      <span class="textfieldRequiredMsg">X</span><span class="textfieldMinCharsMsg">X</span><span class="textfieldMaxCharsMsg">X</span></span></td>
  </tr>
  <tr>
    <td>Dirección </td>
    <td>:</td>
    <td colspan="2"><span id="sprytextfield1">
      <label for="proveedor"></label>
      <span id="sprytextfield4">
      <label for="direccion"></label>
      <input name="direccion" type="text" class="formulario_grande_intranet" id="direccion" />
      <span class="textfieldRequiredMsg">X</span><span class="textfieldMinCharsMsg">X</span><span class="textfieldMaxCharsMsg">X</span></span>      <span class="textfieldRequiredMsg">X</span><span class="textfieldMinCharsMsg">X</span><span class="textfieldMaxCharsMsg"></span></span></td>
  </tr>
  <tr>
    <td width="158"><span class="style1 style2">Contacto</span></td>
    <td width="10">:</td>
    <td colspan="2"><span id="sprytextfield2">
    <label for="fecha_contratacion"></label>
    <input name="contacto" type="text" class="formulario_grande_intranet" id="fecha_contratacion" />
    <span class="textfieldRequiredMsg">X</span><span class="textfieldMinCharsMsg">X</span><span class="textfieldMaxCharsMsg">X</span></span></td>
  </tr>
  <tr>
    <td><span class="style1 style2">Teléfono</span></td>
    <td>:</td>
    <td colspan="2"><span id="sprytextfield5">
    <label for="telefono"></label>
    <input name="telefono" type="text" class="formulario_grande_intranet" id="telefono" />
    <span class="textfieldRequiredMsg">X</span><span class="textfieldMinCharsMsg">X.</span><span class="textfieldMaxCharsMsg">X</span></span></td>
  </tr>
  <tr>
    <td>Correo</td>
    <td>:</td>
    <td colspan="2"><span id="sprytextfield6">
    <label for="correo"></label>
    <input name="correo" type="text" class="formulario_grande_intranet" id="correo" />
    <span class="textfieldRequiredMsg">X</span><span class="textfieldMinCharsMsg">X</span><span class="textfieldMaxCharsMsg">X</span></span></td>
  </tr>
  <tr>
    <td><span class="style1 style2">Fecha Próximo Pago</span></td>
    <td>:</td>
    <td colspan="2"><span id="sprytextfield3">
    <label for="fecha_expiracion"></label>
    <input name="fecha_proximo_pago" type="text" class="formulario_chico_intranet" id="datepicker" />
    <span class="textfieldRequiredMsg">X</span><span class="textfieldInvalidFormatMsg">X</span></span></td>
  </tr>
  <tr>
    <td><span class="style1 style2">Comentario </span></td>
    <td>:</td>
    <td colspan="2" rowspan="2"><span id="sprytextarea1">
    <label for="comentario"></label>
    <textarea name="comentario" cols="45" rows="9" class="formulario_grande_intranet" id="comentario"></textarea>
    <span class="textareaRequiredMsg">X</span><span class="textareaMinCharsMsg">X</span><span class="textareaMaxCharsMsg">X</span></span></td>
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
    <td><input name="btn_submit" type="submit" class="boton_intranet" value="Crear Registro " /></td>
    <td>&nbsp;</td>
    <td width="497">
      
      
      <input name="btn_submit2" type="reset" value="Limpiar Datos" class="boton_intranet" />
      </td>
    <td width="205">&nbsp;</td>
  </tr>
</table></form>
<BR />
<BR />
    <?php
   $id=$_GET['id'];

  
	   if ($id==1){
		   echo "<div id='dialog' title='Aviso Creado'><center><P>Registro de Pago Creado Exitosamente!
	   </center></div>
	   ";
		   
		   }
   
   ?>
   
  </div>
  </div>
  
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["change"], minChars:1, maxChars:400});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["change"], minChars:1, maxChars:400});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["change"], minChars:1, maxChars:100});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "date", {format:"yyyy-mm-dd", validateOn:["change"]});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {minChars:1, maxChars:400, validateOn:["change"]});
</script>
<div id="foot">Migna | Sistema Gestión de Clientes - Todos los derechos reservados &copy; <?php
echo date("Y"); ?></div>
<script type="text/javascript">
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {minChars:1, maxChars:100, validateOn:["change"]});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "none", {minChars:1, maxChars:100, validateOn:["change"]});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "none", {minChars:1, maxChars:100, validateOn:["change"]});
</script>
</body>

</html>
