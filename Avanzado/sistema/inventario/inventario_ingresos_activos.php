<?php
include("../../../system/config.php");
include("../../../services/config.php");

$sql_bodega=mysql_query("SELECT bodega FROM INV_bodega ORDER BY bodega ASC");
$sql_marca=mysql_query("SELECT marca FROM INV_marca ORDER BY marca ASC");
$sql_modelo=mysql_query("SELECT modelo FROM INV_modelo ORDER BY modelo ASC");
$sql_tipo=mysql_query("SELECT tipo FROM INV_tipo ORDER BY tipo ASC");
$sql_proveedor=mysql_query("SELECT nombre FROM INV_proveedor ORDER BY nombre ASC");
$sql_responsable=mysql_query("SELECT nombre FROM usuarios ORDER BY nombre ASC");
$sql_estado=mysql_query("SELECT estado FROM INV_estado ORDER BY estado ASC");

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
 <?php include '../../../include/estructura/submenu_inventario_ingresos.php';?>

    
  <div id="inventario_ingresos_activos">
    <div id="inventario_left">
      <div class="Menu10" id="menu_inventario">Menu Ingresos</div>
      <ul id="MenuBar2" class="MenuBarVertical">
        <li><a href="inventario_ingresos_activos.php" class="Menu10">Activos</a>        </li>
<li><a class="Menu10" href="inventario_ingresos_proveedor.php">Proveedores</a></li>
</ul>
    </div>
    <div id="inventario_right2">
      <div id="menu_inventario">Ingresar Activo :</div>
      <form method="post" action="inventario_comprobacion_ingreso_activos.php" >
      <table width="592" border="0">  
        
         <tr>
           <td width="240">&nbsp;</td>
           <td colspan="2">&nbsp;</td>
         </tr>
         <tr>
           <td>Número de Serie</td>
           <td colspan="2"><span class="formulariochico" id="sprytextfield1">
           <label for="serial"></label>
           <input name="serial" type="text" class="formulariochico" id="serial" />
           <span class="textfieldRequiredMsg">X</span><span class="textfieldMinCharsMsg">X</span><span class="textfieldMaxCharsMsg">X</span></span></td>
         </tr>
         <tr>
           <td height="20">Mac Address</td>
           <td colspan="2"><span id="sprytextfield2">
           <input name="mac" type="text" class="formulariochico" id="mac" />
           <span class="textfieldRequiredMsg">X</span><span class="textfieldMaxCharsMsg">X</span></span>Ej: 00:00:00:00:00:00</td>
         </tr>
         <tr>
           <td height="21">Tipo Activo</td>
           <td colspan="2"><select name="tipo" class="formulariochico"  >
                    <?php while($row = mysql_fetch_array($sql_tipo)){ ?>
                    <option value="<?php echo $row['tipo']; ?>" size="30"><?php echo $row['tipo']; ?></option>
        <?php } ?>
      </select></td>
         </tr>
         <tr>
           <td>Marca Activo</td>
           <td colspan="2"><select name="marca" class="formulariochico"  >
                    <?php while($row = mysql_fetch_array($sql_marca)){ ?>
                    <option value="<?php echo $row['marca']; ?>" size="30"><?php echo $row['marca']; ?></option>
        <?php } ?>
      </select></td>
         </tr>
         <tr>
           <td>Modelo Activo</td>
           <td colspan="2"><select name="modelo" class="formulariochico"  >
                    <?php while($row = mysql_fetch_array($sql_modelo)){ ?>
                    <option value="<?php echo $row['modelo']; ?>" size="30"><?php echo $row['modelo']; ?></option>
        <?php } ?>
      </select></td>
         </tr>
         <tr>
           <td>Proveedor</td>
           <td colspan="2"><select name="proveedor" class="formulariochico"  >
                    <?php while($row = mysql_fetch_array($sql_proveedor)){ ?>
                    <option value="<?php echo $row['nombre']; ?>" size="30"><?php echo $row['nombre']; ?></option>
        <?php } ?>
      </select></td>
         </tr>
         <tr>
           <td>Bodega Destino</td>
           <td colspan="2"><select name="bodega" class="formulariochico"  >
                    <?php while($row = mysql_fetch_array($sql_bodega)){ ?>
                    <option value="<?php echo $row['bodega']; ?>" size="30"><?php echo $row['bodega']; ?></option>
        <?php } ?>
      </select></td>
         </tr>
         <tr>
           <td>Número Factura</td>
           <td colspan="2"><span id="sprytextfield3">
           <label for="factura"></label>
           <input name="factura" type="text" class="formulariochico" id="factura" />
           <span class="textfieldRequiredMsg">X.</span><span class="textfieldInvalidFormatMsg">X</span></span></td>
         </tr>
         <tr>
           <td><input  type="submit" class="formulariochico"   value="Ingresar Activo"/></td>
           <td width="158"><input  type="reset" class="formulariochico"    value="Restaurar Valores"/></td>
           <td width="180">&nbsp;</td>
         </tr>
     </table>
     </FORM>
      </br>
	  <?php 
	
	$ingresado= $_GET["id"];
	if ($ingresado==1){
		
		echo "<div id='dialog' title='Ingreso Activo'>Registro ingresado exitosamente!</div>";
		
		}
		
	if ($ingresado==2){
		
		echo "<div id='dialog' title='Error en el Ingreso'>El Registro "." ".$rut." "."se encuentra duplicado en la Base de Datos, verifique bien que los datos sean correctos.</div>";
		
		}
	
	
	?>
    </div>
    
   
  </div>
  <?php include '../../../include/estructura/foot.php';?></div>
  
  
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgRight:"../../../SpryAssets/SpryMenuBarRightHover.gif"});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["change"], minChars:1, maxChars:30});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "mac", {validateOn:["change"], maxChars:20});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "integer", {validateOn:["change"]});
</script>
</body>
</html>
<?php
mysql_free_result($SG_Login_Usuario);
mysql_free_result($cliente);
mysql_free_result($bienvenido);
?>