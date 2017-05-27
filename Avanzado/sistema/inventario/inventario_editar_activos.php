<?php
include("../../../system/config.php");
include("../../../services/config.php");

$mac= $_GET["mac"];
$serial= $_GET["serial"];
$sql_activos=mysql_query("SELECT * FROM INV_activos WHERE  mac='$mac'  OR serial='$serial' ORDER BY bodega ASC LIMIT 0,1");
$sql_activos2=mysql_query("SELECT * FROM INV_activos WHERE  mac='$mac'  OR serial='$serial' ORDER BY bodega ASC");
$sql_tipo1=mysql_query("SELECT tipo FROM INV_activos WHERE mac='$mac'  OR serial='$serial' ORDER BY tipo ASC");
$sql_tipo2=mysql_query("SELECT tipo FROM INV_tipo  ORDER BY tipo ASC");
$sql_marca1=mysql_query("SELECT marca FROM INV_activos WHERE mac='$mac'  OR serial='$serial' ORDER BY marca ASC");
$sql_marca2=mysql_query("SELECT marca FROM INV_marca  ORDER BY marca ASC");
$sql_modelo1=mysql_query("SELECT modelo FROM INV_activos WHERE mac='$mac'  OR serial='$serial' ORDER BY modelo ASC");
$sql_modelo2=mysql_query("SELECT modelo FROM INV_modelo  ORDER BY modelo ASC");
$sql_proveedor1=mysql_query("SELECT proveedor FROM INV_activos WHERE mac='$mac'  OR serial='$serial' ORDER BY proveedor ASC");
$sql_proveedor2=mysql_query("SELECT nombre FROM INV_proveedor  ORDER BY nombre ASC");
$sql_bodega1=mysql_query("SELECT bodega FROM INV_activos WHERE mac='$mac'  OR serial='$serial' ORDER BY bodega ASC");
$sql_bodega2=mysql_query("SELECT bodega FROM INV_bodega  ORDER BY bodega ASC");
$sql_estado1=mysql_query("SELECT estado FROM INV_activos WHERE mac='$mac'  OR serial='$serial' ORDER BY estado ASC");
$sql_estado2=mysql_query("SELECT estado FROM INV_estado  ORDER BY estado ASC");
$sql_responsable1=mysql_query("SELECT responsable FROM INV_activos WHERE mac='$mac'  OR serial='$serial' ORDER BY responsable ASC");
$sql_responsable2=mysql_query("SELECT nombre FROM usuarios  ORDER BY nombre ASC");
$sql_comentario=mysql_query("SELECT comentario FROM INV_activos WHERE  mac='$mac'  OR serial='$serial' ");


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
  </br>
    <div id="inventario_left">
      <div class="Menu10" id="menu_inventario">Menu Editar</div>
      <ul id="MenuBar2" class="MenuBarVertical">
        <li><a class="Menu10" href="inventario_modificar_activos.php">Activos</a>        </li>
<li><a class="Menu10" href="inventario_modificar_proveedores.php">Proveedores</a></li>
</ul>
    </div>
    <div id="inventario_right_editar">
      <div id="menu_inventario">Buscar Activo a Editar:</div>
      <form method="post" action="inventario_comprobacion_actualizar_activos.php" >
      <table width="586" border="0">  
         <tr>
           <td width="186">Numero de Serie</td><?php while($row = mysql_fetch_array($sql_activos)){ ?>
           <td colspan="2"><span id="sprytextfield1">
           <label for="serial"></label>
           <input name="serial" value = "<?php echo $row['serial']; ?>" type="text" class="formulariochico" id="serial" />
           <span class="textfieldRequiredMsg">X</span><span class="textfieldMinCharsMsg">X</span><span class="textfieldMaxCharsMsg">X</span></span></td><input type="hidden" name="serial2" value="<?php echo $row['serial']; ?>" />
         </tr>
         <tr>
           <td>MAC</td>
           <td colspan="2"><span id="sprytextfield3">
           <input name="mac" type="text" value = "<?php echo $row['mac']; ?>" class="formulariochico" id="mac" />
           <span class="textfieldRequiredMsg">X</span><span class="textfieldMinCharsMsg">X</span></span>
             Formato : 00:00:00:00:00:00</td><input type="hidden" name="mac2" value="<?php echo $row['mac']; ?>" />
         </tr><?php } ?>
         <tr>
           <td>Tipo</td> <?php while($row = mysql_fetch_array($sql_tipo1)){ ?>
           <td colspan="2"><select name="tipo" class="formulariochico"  ><option value='<?php echo $row['tipo']; ?>' size="30"><?php echo $row['tipo']; ?></option> <?php } ?>
                    <?php while($row = mysql_fetch_array($sql_tipo2)){ ?>
                    <option value="<?php echo $row['tipo']; ?>" size="30"><?php echo $row['tipo']; ?></option>
        <?php } ?>
      </select></td>
         </tr>
         <tr>
           <td>Marca</td><?php while($row = mysql_fetch_array($sql_marca1)){ ?>
           <td colspan="2"><select name="marca" class="formulariochico"  ><option value='<?php echo $row['marca']; ?>'><?php echo $row['marca']; ?></option><?php } ?>
                    <?php while($row = mysql_fetch_array($sql_marca2)){ ?>
                    <option value="<?php echo $row['marca']; ?>" size="30"><?php echo $row['marca']; ?></option>
        <?php } ?>
      </select></td>
         </tr>
         <tr>
           <td>Modelo</td><?php while($row = mysql_fetch_array($sql_modelo1)){ ?>
           <td colspan="2"><select name="modelo" class="formulariochico"  ><option value='<?php echo $row['modelo']; ?>'><?php echo $row['modelo']; ?></option> <?php } ?>
                    <?php while($row = mysql_fetch_array($sql_modelo2)){ ?>
                    <option value="<?php echo $row['modelo']; ?>" size="30"><?php echo $row['modelo']; ?></option>
        <?php } ?>
      </select></td>
         </tr>
         <tr>
           <td>Proveedor</td><?php while($row = mysql_fetch_array($sql_proveedor1)){ ?>
           <td colspan="2"><select name="proveedor" class="formulariochico"  ><option value='<?php echo $row['proveedor']; ?>'><?php echo $row['proveedor']; ?></option>  <?php } ?>
                    <?php while($row = mysql_fetch_array($sql_proveedor2)){ ?>
                    <option value="<?php echo $row['nombre']; ?>" size="30"><?php echo $row['nombre']; ?></option>
        <?php } ?>
      </select></td>
         </tr>
         <tr>
           <td>Bodega</td><?php while($row = mysql_fetch_array($sql_bodega1)){ ?>
           <td colspan="2"><select name="bodega" class="formulariochico"  ><option value='<?php echo $row['bodega']; ?>'><?php echo $row['bodega']; ?></option><?php } ?>
                    <?php while($row = mysql_fetch_array($sql_bodega2)){ ?>
                    <option value="<?php echo $row['bodega']; ?>" size="30"><?php echo $row['bodega']; ?></option>
        <?php } ?>
      </select></td>
         </tr>
         <tr>
           <td>Factura</td><?php while($row2 = mysql_fetch_array($sql_activos2)){ ?>
           <td colspan="2"><span id="sprytextfield2">
           <label for="factura"></label>
           <input name="factura" type="text" value = "<?php echo $row2['factura']; ?>" class="formulariochico" id="factura" />
           <span class="textfieldRequiredMsg">X</span><span class="textfieldInvalidFormatMsg">X</span><span class="textfieldMinCharsMsg">X</span></span></td>
         </tr><?php } ?>    
         <tr>
           <td><input  type="submit" class="formulariochico"   value="Modificar Activo"/></td>
           <td width="214"><input  type="reset" class="formulariochico"    value="Restablecer"/></td>
           <td width="172">&nbsp;</td>
         </tr>
       </table>
      </FORM>
      </p>
        <?php 
	if (isset($_GET['id'])){
			$ingresado= $_GET["id"];

	
	if ($ingresado==1){
		
		echo "<div id='dialog' title='Editar Activo'>Registro actualizado exitosamente!</div>";
		
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
</script>
</body>
</html>
<?php
mysql_free_result($SG_Login_Usuario);
mysql_free_result($cliente);
mysql_free_result($bienvenido);
?>