<?php
include("../../../system/config.php");
include("../../../services/config.php");

$cliente = $_GET["cliente"];

$rut = $_GET["rut"];
$alias = $_GET["alias"];

$sql_cliente=mysql_query("SELECT * FROM SP_dato_cliente WHERE (cliente='$cliente' or rut='$rut' ) and alias='$alias' LIMIT 1");
$sql_via=mysql_query("SELECT * FROM RET_via_retiro");
$sql_motivo=mysql_query("SELECT * FROM RET_motivo");
$sql_estado=mysql_query("SELECT * FROM SP_row_estado");

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
<link href="../../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="../../../script/jquery.js"></script>
  <script type="text/javascript" src="../../../script/jquery.jCombo.min.js"></script>
  <script type='text/javascript' src='../../../javascript/jquery.autocomplete.js'></script>
  <script src="../../../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
  <script src="../../../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
  <script src="../../../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../../../javascript/jquery.autocomplete.css" />
<link href="../../../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="../../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../../../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="top"></div>
<div id="body">
 <?php include '../../../include/estructura/banner.php';?>
 <?php include '../../../include/estructura/menu_retiros.php';?>
 <?php include '../../../include/estructura/submenu_retiros_por_gestionar.php';?>
 
  <div id="inventario2">
    <p>Retiros Por Gestionar </p><form method="post" action="comprobacion_actualizar_retiro.php" >
    
    Resultado Búsqueda:
    <?php while($row=mysql_fetch_array($sql_cliente)){?>
     <table width="917" border="0">
  <tr>
    <td width="220"><span class="style1 style2">Razón Social</span></td>
    <td colspan="2"><span id="sprytextfield1">
      <label for="cliente"></label>
      <input name="cliente" type="text" value="<?php echo $row['cliente']; ?>"  class="formulario_modificar" id="cliente"  readonly="readonly"/><input name="alias" type="hidden" value="<?php echo $row['alias']; ?>"  class="formulario_modificar" id="cliente"  readonly="readonly"/>
      <span class="textfieldRequiredMsg"></span><span class="textfieldMinCharsMsg"></span><span class="textfieldMaxCharsMsg"></span></span></td>
  </tr>
  <tr>
    <td><span class="style1 style2">Rut</span></td>
    <td colspan="2"><span id="sprytextfield7">
      <input name="rut" type="text" value="<?php echo $row['rut']; ?>"  readonly="readonly" class="formulariochicoEDIT" id="rut" />
      <span class="textfieldRequiredMsg"></span></span></td>
    </tr>
  <tr>
    
    </tr>
  <tr>
    <td><span class="style1 style2">Contacto</span></td>
    <td colspan="2"><span id="sprytextfield3">
    <label for="contacto"></label>
    <input name="contactos" type="text" value="<?php echo $row['contactos']; ?>"   class="formulario_modificar" id="contactos" readonly="readonly" />
    <span class="textfieldRequiredMsg"></span><span class="textfieldMinCharsMsg"></span><span class="textfieldMaxCharsMsg"> </span></span></td>
    </tr>
  <tr>
    <td><span class="style1 style2">Teléfonos</span></td>
    <td colspan="2"><span id="sprytextfield4">
    <label for="telefonos"></label>
    <input name="telefonos" value="<?php echo $row['telefonos']; ?>"  type="text" class="formulario_modificar" id="telefonos" readonly="readonly"/>
    <span class="textfieldRequiredMsg"></span><span class="textfieldMinCharsMsg"> </span><span class="textfieldMaxCharsMsg"> </span></span></td>
    </tr>
  <tr>
    <td><span class="style1 style2">Correos</span></td>
    <td colspan="2"><span id="sprytextfield5">
    <label for="correos"></label>
    <input name="correos" type="text" value="<?php echo $row['correos']; ?>"   class="formulario_modificar" id="correos" readonly="readonly"/>
    <span class="textfieldRequiredMsg"></span><span class="textfieldInvalidFormatMsg"></span></span></td>
    </tr>
  <tr>
    <td><span class="style1 style2">Dirección Comercial</span></td>
    <td colspan="2"><input name="direccion_comercial" type="text"  value="<?php echo $row['direccion_comercial']; ?>"  class="formulario_modificar" id="direccion_comercial" readonly="readonly" /></td>
  </tr>
  <tr>
    <td>Via Solicitud Retiro</td>
    <td colspan="2"><label for="via"></label>
      <select name="via" class="formulariochico"  >
         <option value="<?php echo $row['via']; ?>" size="30"><?php echo $row['via']; ?></option>     
      <?php while($row2 = mysql_fetch_array($sql_via)){ ?>
      
      <option value="<?php echo $row2['via']; ?>" size="30"><?php echo $row2['via']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  <tr>
    <td>Fecha Solicitud Retiro</td>
    <td colspan="2"><span id="sprytextfield2">
    <label for="fecha_sol"></label>
    <input name="fecha_sol" type="text" value="<?php echo $row['fecha_sol']; ?>"class="formulariochico" id="fecha_sol" />
    <span class="textfieldRequiredMsg">Se necesita un valor.</span><span class="textfieldMinCharsMsg">No se cumple el mínimo de caracteres requerido.</span><span class="textfieldMaxCharsMsg">Se ha superado el número máximo de caracteres.</span><span class="textfieldInvalidFormatMsg">Formato no válido.</span></span>(AAAA-MM-DD)</td>
  </tr>
  <tr>
    <td>Motivo</td>
    <td colspan="2"><select name="motivo" class="formulariochico"  >
        <option value="<?php echo $row['motivo']; ?>" size="30"><?php echo $row['motivo']; ?></option>
      <?php while($row3 = mysql_fetch_array($sql_motivo)){ ?>
      <option value="<?php echo $row3['motivo']; ?>" size="30"><?php echo $row3['motivo']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  <tr>
    <td>Cambiar Estado</td>
    <td colspan="2"><select name="estado" class="formulariochico"  >
           <option value="<?php echo $row['estado']; ?>" size="30"><?php echo $row['estado']; ?></option>

      <?php while($row4 = mysql_fetch_array($sql_estado)){ ?>
      <option value="<?php echo $row4['estado']; ?>" size="30"><?php echo $row4['estado']; ?></option>
      <?php } ?>
    </select>&nbsp;</td>
  </tr>
  <tr>
    <td>Fecha Retiro Efectivo</td>
    <td colspan="2"><span  id="sprytextfield8">
    <label for="fecha_retiro"></label>
    <input name="fecha_retiro" type="text" value="<?php echo $row['fecha_retiro']; ?>" class="formulariochico" id="fecha_retiro" />
    <span class="textfieldRequiredMsg">Se necesita un valor.</span><span class="textfieldInvalidFormatMsg">Formato no válido.</span></span></td>
  </tr>
  <tr>
    <td>Comentario</td>
    <td colspan="2"><span id="sprytextarea1">
      <label for="comentario_retiro"></label>
      <textarea name="comentario_retiro" cols="45" rows="5" class="formulario" id="comentario_retiro"><?php echo $row['comentario_retiro']; ?></textarea>
      <span class="textareaRequiredMsg">Se necesita un valor.</span></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span id="sprytextfield6">
    <label for="direccion_comercial"></label>
    <span class="textfieldRequiredMsg"></span><span class="textfieldMinCharsMsg"></span><span class="textfieldMaxCharsMsg"></span></span></td>
    </tr>
  <tr>
    <td><input type="submit" class="formulariochico" name="modificar"  value="Guardar"></td>
    <td width="399">
      
      
        <input name="btn_submit2" type="reset" value="Limpiar Datos" class="formulariochico" />
    </td>
    <td width="284">&nbsp;</td>
    </tr>
</table>
    </form>
    <?php }?>
    <?php 
	if (empty($id)){
		}
		else if($id==1){
			
			echo "Registro actualizado exitosamente";
			}
	
	
	?>
    </p>
   
  </div>
 
  <?php include '../../../include/estructura/foot.php';?>

  </div>
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "date", {validateOn:["change"], format:"yyyy-mm-dd"});
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8", "date", {format:"yyyy-mm-dd", validateOn:["change"]});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {validateOn:["change"]});
</script>
</body>
</html>
<?php
mysql_free_result($SG_Login_Usuario);
mysql_free_result($cliente);
mysql_free_result($bienvenido);
?>