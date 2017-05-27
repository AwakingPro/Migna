<?php
include("../../../system/config.php");
include("../../../services/config.php");

$proveedor= $_GET["proveedor"];

$sql=mysql_query("SELECT * FROM INV_proveedor WHERE  nombre='$proveedor'");



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
$cliente=$_SESSION['MM_Username'];
$bienvenido=mysql_query("SELECT nombre FROM usuarios WHERE usuario='$cliente'");

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
<div id="top"></div>
<div id="body">
 <?php include '../../../include/estructura/banner.php';?>
 <?php include '../../../include/estructura/menu_inventario.php';?>
 <?php include '../../../include/estructura/submenu_inventario_buscar_activos.php';?>
 
  <div id="inventario_editar_Activos">
    <div id="inventario_left">
      <div class="Menu10" id="menu_inventario">Menu Editar</div>
      <ul id="MenuBar2" class="MenuBarVertical">
        <li><a class="Menu10" href="inventario_modificar_activos.php">Activos</a>        </li>
<li><a class="Menu10" href="inventario_modificar_proveedores.php">Proveedores</a></li>
</ul>
    </div>
    <div id="inventario_right_editar">
      <div id="menu_inventario">Buscar Proveedor a Editar:</div>
     <form method="post" action="inventario_comprobacion_actualizar_proveedor.php">
      <table width="500" border="0">  
         <tr>
           <td width="169">&nbsp;</td>
           <td colspan="2">&nbsp;</td>
         </tr>
         <tr>
           <td>Rut</td><?php while($row = mysql_fetch_array($sql)){ ?>
           <td colspan="2"><span id="sprytextfield4">
           <input name="rut" value = "<?php echo $row['rut']; ?>" type="text" class="formulariochico" i size="30"/>
           <span class="textfieldRequiredMsg">X</span><span class="textfieldMinCharsMsg">X</span><span class="textfieldMaxCharsMsg">X</span></span>             
      </td><input type="hidden" name="proveedor2" value="<?php echo $row['nombre']; ?>" />
         </tr>
         <tr>
           <td>Razon Social</td>
        
           <td colspan="2"><input name="nombre" value = "<?php echo $row['nombre']; ?>"type="text" class="formulario" i="i" size="50"/></td>
          
         </tr>
         <tr>
           <td>Especialidad</td>
        
           <td colspan="2"><input name="especialidad" value = "<?php echo $row['especialidad']; ?>"type="text" class="formulario" i="i" size="50"/></td>
         </tr>
         <tr>
           <td>Dirección</td>
        
           <td colspan="2"><input name="direccion" value = "<?php echo $row['direccion']; ?>"type="text" class="formulario" i="i" size="50"/></td>
         </tr>
         <tr>
           <td>Teléfonos</td>
         
           <td colspan="2"><input name="telefono" value = "<?php echo $row['telefono']; ?>"type="text" class="formulario" i="i" size="50"/></td>
         </tr>
         <tr>
           <td>Correos</td>
           
           <td colspan="2"><input name="correo" value = "<?php echo $row['correo']; ?>"type="text" class="formulario" i="i" size="50"/></td>
         </tr>
         <tr>
           <td>Contacto</td>
           <td colspan="2"><input name="contacto" value = "<?php echo $row['contacto']; ?>"type="text" class="formulario" i="i" size="50"/></td>
         </tr>
         <?php } ?>
         <tr>
           <td><input  type="submit" class="formulariochico"   value="Modificar  Proveedor"/></td>
           <td width="183"><input  type="reset" class="formulariochico"    value="Restaurar Valores"/></td>
           <td width="134">&nbsp;</td>
         </tr>
       </table>
      </FORM>
      </p>
        <?php 
	if (isset($_GET['id'])){
			$ingresado= $_GET["id"];

	
	if ($ingresado==1){
		
		echo "<div id='dialog' title='Editar Proveedor'>Registro actualizado exitosamente!</div>";
		
		}
	}
	
	?>
    </div>
    
    
  </div>
 <?php include '../../../include/estructura/foot.php';?>
  </div>
  
  
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgRight:"../../../SpryAssets/SpryMenuBarRightHover.gif"});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {minChars:1, maxChars:20, validateOn:["change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "integer", {validateOn:["change"], minChars:1});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "mac", {validateOn:["change"], minChars:1});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "rut", {validateOn:["change"], minChars:1, maxChars:15});
</script>
</body>
</html>
<?php
mysql_free_result($SG_Login_Usuario);
mysql_free_result($cliente);
mysql_free_result($bienvenido);
?>