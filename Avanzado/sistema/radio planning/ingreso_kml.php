<?php
include("../../../system/config.php");
include("../../../services/config.php");

$sql=mysql_query("SELECT estacion FROM INT_radio_planning_estaciones ");
$sql_mac=mysql_query("SELECT mac FROM INV_activos_paso ORDER by mac ASC  ");
$sql_estaciones=mysql_query("SELECT estacion FROM INT_radio_planning_estaciones ");
$sql_registros=mysql_query("SELECT ip FROM INT_radio_planning order by ip asc");
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
  <script src="../../../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../../../javascript/jquery.autocomplete.css" />
<link href="../../../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="../../../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="../../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
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
	  }?>
      </div>

<?php include '../../../include/estructura/menu_radio_planning.php';?>
 <?php include '../../../include/estructura/submenu_radio_planning.php';?>

  <div id="rpege">
    <p class="iconos_top">
	
	Radio Planning     
     <p class="iconos_top"><strong>Ingreso KMZ Estaciones</strong>
     <form method="post" enctype="multipart/form-data"  action="comprobacion_kml.php"  >
     <table width="565" border="0">
  <tr>
    <td width="64">&nbsp;</td>
    <td width="209">Seleccione Estación</td>
    <td colspan="2"><select name="estacion" class="formulario" >
      <?php while($row = mysql_fetch_array($sql_estaciones)){ ?>
      <option value="<?php echo $row['estacion']; ?>" ><?php echo $row['estacion']; ?><?php } ?></option>
      
    </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Punto KMZ</td>
    <td colspan="2"><input name="kmz"  type="file" class="formulario" size="25" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" class="formulariochico" value="Ingresar Registro"   /></td>
    <td width="91"><input type="reset" class="formulariochico"   value="Borrar valores escritos"   /></td>
    <td width="183">&nbsp;</td>
    </tr>
      </table> </FORM>
     </p>
     <p>&nbsp;</p>
     <p><strong>Ingreso KMZ Registros</strong></p>
     <form method="post" enctype="multipart/form-data"  action="comprobacion_kml2.php"  >
     <table width="565" border="0">
  <tr>
    <td width="64">&nbsp;</td>
    <td width="209">Seleccione Registro</td>
    <td colspan="2"><select name="registros" class="formulario" >
      <?php while($row2 = mysql_fetch_array($sql_registros)){ ?>
      <option value="<?php echo $row2['ip']; ?>" ><?php echo $row2['ip']; ?><?php } ?></option>
      
    </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Punto KMZ</td>
    <td colspan="2"><input name="kmz"  type="file" class="formulario" size="25" ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" class="formulariochico" value="Ingresar Registro"   /></td>
    <td width="91"><input type="reset" class="formulariochico"   value="Borrar valores escritos"   /></td>
    <td width="183">&nbsp;</td>
    </tr>
      </table></form><?php 
	  
	  $id=$_GET['id'];
	  if(empty($id)){}
	  
	  if ($id==1){
		  
		  
				  echo "<div id='dialog' title='Ingreso KMZ'>Registro ingresado exitosamente</DIV>";
		  
		  
		  
		  }
	  
	  if($id==2){
		  
		  		  echo "<div id='dialog' title='Ingreso KMZ'>No has seleccionado KMZ</DIV>";

		  }
	  
	  
	  
	  
	  ?></p>
  </div>
  
  
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["change"], minChars:1, maxChars:30});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["change"], minChars:1, maxChars:40});
</script>
</body>
</html>
