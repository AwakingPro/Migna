<?php
include("../../../system/config.php");
include("../../../services/config.php");
$sql=mysql_query("SELECT estacion FROM INT_radio_planning_estaciones ORDER by estacion ASC");
$sql_mac=mysql_query("SELECT mac FROM INV_activos WHERE id=0  AND tipo='Access Point' ORDER by mac ASC  ");
$sql_funcion=mysql_query("SELECT funcion FROM funciones ");

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

  $logoutGoTo = "../../../index.php";
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

$MM_restrictGoTo = "../../../index.php";
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
$usuario=$_SESSION['MM_Username'];
$bienvenido=mysql_query("SELECT nombre FROM usuarios WHERE usuario='$usuario'");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


	<script src="../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
     <script src="../../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
  <script src="../../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
  <script type="text/javascript" src="../../../script/jquery.js"></script>
  <script type="text/javascript" src="../../../script/jquery.jCombo.min.js"></script>
<title>Datacenter Netland Chile S.A.</title>
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
  <script type="text/javascript" src="../../../script/jquery.js"></script>
  <script type="text/javascript" src="../../../script/jquery.jCombo.min.js"></script>
  <script type='text/javascript' src='../../../javascript/jquery.autocomplete.js'></script>
  <script src="../../../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
  <script src="../../../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../../../javascript/jquery.autocomplete.css" />
<link href="../../../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="../../../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="../../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="../../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../../js/jquery-ui.min.js"></script>
<link rel="stylesheet" href="../../../css/estilos2.css">
<script>
$(function() {
$( "#dialog" ).dialog();
});
</script>
</head>

<body>
<div id="top"><div id="inc_logo"></div><?php 
	   $nombre=$_SESSION['MM_Username'];
	   $bienvenido=mysql_query("SELECT * FROM usuarios WHERE usuario='$nombre'");
	  
	  while($row=mysql_fetch_array($bienvenido)){
     	$user7=$row['nombre'];
	?>
	
     <?php echo "<a href='#' class='Menu10'>Bienvenido  "." ".$row['nombre']." , </a>"?><a href="/migna/Avanzado/sistema/sistema.php" class="Menu10"> Inicio</a> | 
  <a href="<?php echo $logoutAction ?>
" class="Menu10"> Salir </a>
  <?php
	  }
	  ?></div>
    <?php include '../../../include/estructura/menu_radio_planning.php';?>
 <?php include '../../../include/estructura/submenu_radio_planning.php';?>

<div id="rpa">
        <div id="datos_com"><strong>Ingresos</strong>  <br /><br /></div>
     <form method="post" enctype="multipart/form-data"  action="comprobacion_ingreso_radio_planning.php"  >
    
    <table width="614" border="0">
  <tr>
    <td>Estación</td>
    <td colspan="2">  <select name="estacion" class="formulario_chico_intranet" >
      <?php while($row = mysql_fetch_array($sql)){ ?>
      <option value="<?php echo $row['estacion']; ?>" ><?php echo $row['estacion']; ?><?php } ?></option>
      
    </select> </td>
    </tr>
  <tr>
    <td>Función</td>
    <td colspan="2">
    <select name="funcion" class="formulario_chico_intranet" >
      <?php while($row = mysql_fetch_array($sql_funcion)){ ?>
      <option value="<?php echo $row['funcion']; ?>" ><?php echo $row['funcion']; ?><?php } ?></option>
      
    </select></td>
    </tr>
  <tr>
    <td>Alarma Activada</td>
    <td colspan="2"><select name="alarma" class="formulario_chico_intranet" >
    
      <option value="1" >Si</option>
      <option value="0" >No</option>

      
    </select></td>
  </tr>
  <tr>
    <td>Dirección IP</td>
    <td colspan="2"><span id="sprytextfield2">
    <label for="ip"></label>
    <input name="ip" type="text" class="formulario_chico_intranet" id="ip" />
    <span class="textfieldRequiredMsg">X</span><span class="textfieldInvalidFormatMsg">X</span></span></td>
    </tr>
  <tr>
    <td>Puerto de Acceso</td>
    <td colspan="2"><span id="sprytextfield3">
    <label for="puerto"></label>
    <input name="puerto" type="text" class="formulario_chico_intranet" id="puerto" />
    <span class="textfieldRequiredMsg">X</span><span class="textfieldInvalidFormatMsg">X</span></span></td>
    </tr>
  <tr>
    <td>Ancho de Canal</td>
    <td colspan="2"><span id="sprytextfield4">
    <label for="ancho_canal"></label>
    <input name="ancho_canal" type="text" class="formulario_chico_intranet" id="ancho_canal" />
    <span class="textfieldRequiredMsg">X</span><span class="textfieldInvalidFormatMsg">X</span></span> MHZ</td>
  </tr>
  <tr>
    <td>AP ID</td>
    <td colspan="2"><label for="ap_id"></label>
      <input name="ap_id" type="text" class="formulario_chico_intranet" id="ap_id" /></td>
  </tr>
  <tr>
    <td>Base ID</td>
    <td colspan="2"><label for="base_id"></label>
      <input name="base_id" type="text" class="formulario_chico_intranet" id="base_id" /></td>
  </tr>
  <tr>
    <td width="209"> Frecuencia</td>
    <td colspan="2"><span id="sprytextfield5">
    <label for="frecuencia"></label>
    <input name="frecuencia" type="text" class="formulario_chico_intranet" id="frecuencia" />
    <span class="textfieldRequiredMsg">X</span><span class="textfieldInvalidFormatMsg">X</span></span> MHZ</td>
    </tr>
  <tr>
    <td>TX Power</td>
    <td colspan="2"><span id="sprytextfield6">
    <label for="tx_power"></label>
    <input name="tx_power" type="text" class="formulario_chico_intranet" id="tx_power" />
    <span class="textfieldRequiredMsg">X</span><span class="textfieldInvalidFormatMsg">X</span></span> DBm</td>
    </tr>
  <tr>
    <td>Mac Address</td>
    <td colspan="2"><select name="mac" class="formulario_chico_intranet" >
     <option value="No registra">No Registra</option>
      <?php while($row = mysql_fetch_array($sql_mac)){ ?>
      <option value="<?php echo $row['mac'];?>"><?php echo $row['mac'];?><?php } ?></option>
      
      </select></td>
  </tr>
  <tr>
    <td>SSID</td>
    <td colspan="2"><span id="sprytextfield7">
    <label for="ssid"></label>
    <input name="ssid" type="text" class="formulario_chico_intranet" id="ssid" />
    <span class="textfieldRequiredMsg">X</span><span class="textfieldMinCharsMsg">X</span><span class="textfieldMaxCharsMsg">X</span></span></td>
    </tr>
  <tr>
    <td>Punto GPS</td>
    <td colspan="2"><input name="kmz"  type="file" class="formulario_chico_intranet" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><input type="submit" class="boton_intranet" value="Ingresar Registro"   /></td>
    <td width="76"><input type="reset" class="boton_intranet"   value="Borrar valores escritos"   /></td>
    <td width="198">&nbsp;</td>
    </tr>
    </table></p>
    <?PHP 
	$id=$_GET['id'];
	if (empty($id)) {}
	if (isset($id)) {
	 if ($id==1){
		echo "<div id='dialog' title='Ingresar Registro'>Registro ingresado exitosamente</div>";
		}
		 else if ($id==0){
		echo "<div id='dialog' title='Error'>Direccion IP Duplicada, Registro No Ingresado</div>";
		
		}
	}
	
	?>
    </FORM>
  </div>
 
  
  
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["change"], minChars:1, maxChars:10});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "ip", {validateOn:["change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "integer", {validateOn:["change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "integer", {validateOn:["change"]});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "integer", {validateOn:["change"]});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "integer", {validateOn:["change"]});
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "none", {validateOn:["change"], minChars:1, maxChars:20});
</script>
</body>
</html>
