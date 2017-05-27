<?php
include("../../../system/config.php");
include("../../../services/config.php");
$id=$_GET['id'];
$sql=mysql_query("SELECT * FROM UPS WHERE  id='$id'");
while($row = mysql_fetch_array($sql))
{
	$estacion = $row[0];
	$ip = $row[1];
	$marca = $row[2];
	$consumo = $row[3];
	$capacidad = $row[4];
	$baterias = $row[5];
	$cantidad = $row[6];
	$autonomia  = $row[7];
	$clave = $row[8];
	$fecha_instalacion_ups = $row[9];
	$fecha_instalacion_baterias = $row[10];
	$fecha_caducidad_baterias = $row[11];
	$comentario = $row[12];
}

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
 <script type="text/javascript" src="../../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../../js/jquery-ui.min.js"></script>
<link href="../../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="../../../script/jquery.js"></script>
  <script type="text/javascript" src="../../../script/jquery.jCombo.min.js"></script>
  <script type='text/javascript' src='../../../javascript/jquery.autocomplete.js'></script>
  <script src="../../../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../../../javascript/jquery.autocomplete.css" />
<link href="../../../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="../../../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
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
	
      
  <div id="rpe">
    <p class="iconos_top">
	
<div id="datos_com"><strong>Resultado Busqueda</strong>  <br /><br />
 
 </div>     <form method="post" enctype="multipart/form-data"  action="guardar_ups.php" >
    <table width="660" border="0">
  <tr>
    <td>&nbsp;</td>
    <td>Estación :</td>
    <td><input name="estacion" type="text" value="<?php echo $estacion; ?>" class="formulario_chico_intranet" id="course4" size="25" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>IP :</td>
    <td><input name="ip" type="text" value="<?php echo $ip; ?>" class="formulario_chico_intranet"  size="25" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Marca :</td>
    <td><input name="marca" type="text" value="<?php echo $marca; ?>" class="formulario_chico_intranet"  size="25" /></td>
    <td><input name="id" type="hidden" value="<?php echo $id; ?>" class="formulario_chico_intranet"  size="25" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Consumo :</td>
    <td><input name="consumo" type="text" value="<?php echo $consumo; ?>" class="formulario_chico_intranet"  size="25" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Capacidad :</td>
    <td><input name="capacidad" type="text" value="<?php echo $capacidad; ?>" class="formulario_chico_intranet"  size="25" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Baterias :</td>
    <td><input name="baterias" type="text" value="<?php echo $baterias ?>" class="formulario_chico_intranet"  size="25" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Cantidad :</td>
    <td><input name="cantidad" type="text" value="<?php echo $cantidad ?>" class="formulario_chico_intranet"  size="25" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Autonomia :</td>
    <td><input name="autonomia" type="text" value="<?php echo $autonomia;?>" class="formulario_chico_intranet"  size="25" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="8">&nbsp;</td>
    <td width="228"> Fecha Instalación UPS :</td>
    <td><!--input type="button" value="Get Value" /-->
      <input name="fecha_instalacion_ups" type="date" value="<?php echo $fecha_instalacion_ups;?>" class="formulario_chico_intranet"  size="25" /></td>
    <td width="119">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Fecha Instalación Baterias :</td>
    <td><input name="fecha_instalacion_baterias" type="date" value="<?php echo $fecha_instalacion_baterias;?>" class="formulario_chico_intranet"  size="25" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Fecha Caducidad Baterias :</td>
    <td><input name="fecha_caducidad_baterias" type="date" value="<?php echo $fecha_caducidad_baterias;?>" class="formulario_chico_intranet"  size="25" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td rowspan="2">&nbsp;</td>
    <td>Comentario :</td>
    <td rowspan="2"><label for="textarea"></label><textarea name="comentario" id="textarea" cols="45" class="formulario_chico_intranet" rows="5"><?php echo $comentario;?></textarea></td>
    <td rowspan="2">&nbsp;</td>
  </tr>
  <tr>
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
    <td><input type="submit" class="boton_intranet" value="Guardar Registro"   /></td>
    <td width="287"><input type="reset" class="boton_intranet"   value="Borrar valores escritos"   /></td>
    <td>&nbsp;</td>
  </tr>
      </table>
    <p>&nbsp;</p>
     </form></p>

  </div>
 
  
  
  
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
