<?php
include("../../../system/config.php");
include("../../../services/config.php");
$sql_serial=mysql_query("SELECT serial FROM INV_activos ORDER BY serial ASC");

$sql_mac=mysql_query("SELECT mac FROM INV_activos ORDER BY mac ASC");
$sql_tipo=mysql_query("SELECT tipo FROM INV_tipo ORDER BY tipo ASC");

$sql_marca=mysql_query("SELECT marca FROM INV_marca ORDER BY marca ASC");

$sql_modelo=mysql_query("SELECT modelo FROM INV_modelo ORDER BY modelo ASC");



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
<title>Datacenter Netland Chile S.A.</title>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
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
<link rel="stylesheet" type="text/css" href="../../../javascript/jquery.autocomplete.css" />
<link href="../../../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="../../../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="top"></div>
<div id="body">
  <div id="banner_login">
    <div id="logo"></div>
    <div id="bienvenido">
    <div id="sesion"></br><a href="<?php echo $logoutAction ?>" class="Menu"> Cerrar Sesión</a></div>
      <div id="bienvenido_1">Sistema Gestión de Clientes</div>
      <div id="bienvenido"> <?php 
	   $var2=$_SESSION['MM_Username'];
	   $bienvenido=mysql_query("SELECT * FROM usuarios WHERE usuario='$var2'");
	  
	  while($row=mysql_fetch_array($bienvenido)){
     	
	?>
	
      <div id="cliente2"><?php echo "Bienvenido"." ".$row['nombre']; ?></div>

      
      <?php
	  }
	  ?></div>
      
      
    </div>
  </div>
  <div id="Menu"> 
    <ul id="MenuBar1" class="MenuBarHorizontal">
       <li><a href="clientes.php">Clientes</a>       </li>
       <li><a href="../inventario/inventario.php" c>Inventario</a></li>
       <li><a href="../ticket/ticket.php" >Ticket</a>       </li>
<li><a href="../Intranet/intranet.php" >Intranet</a></li>
       <li><a href="../radio planning/radio_planning.php">Radio </a></li>
       <li><a href="../Indicadores/indicadores.php" >Indicadores</a></li>
       <li><a href="../evaluaciones/evaluaciones.php" >Evaluaciones</a></li>
    </ul>
  </div>
   <div id="contacto_1"><table width="900" border="0" class="Menu">
  <tr>
    <td width="200" class="Menu"><a href="buscar_activos.php" class="Menu" c>Sección Busqueda</a></td>
    <td width="200" ><a href="inventario_ingresos.php" class="Menu" >Sección Ingresos</a></td>
    <td width="200" ><a href="inventario_modificar.php" class="Menu" >Sección Editar</a></td>
    <td width="382">&nbsp;</td>
  </tr>
</table></div>
  <div id="buscar_activos">
        <FORM name=tuformulario autocomplete="off" ACTION="bypass_editar2.php" METHOD="POST">
      <table width="705" border="0">
  <tr>
    <td>&nbsp;</td>
    <td><!--input type="button" value="Get Value" /--></td>
    </tr>
  <tr>
    <td> Número de Serie</td>
    <td><select name="tipo" class="formulario"  >
                    <?php while($row = mysql_fetch_array($sql_serial)){ ?>
                    <option value="<?php echo $row['serial']; ?>" size="30"><?php echo $row['serial']; ?></option>
        <?php } ?>
      </select>
      <!--input type="button" value="Get Value" /-->
      <input type="submit" class="Menu" value="Buscar en Inventario" /></td>
    </tr>
  <tr>
    <td>Mac Address</td>
    <td><select name="tipo" class="formulario"  >
                    <?php while($row = mysql_fetch_array($sql_mac)){ ?>
                    <option value="<?php echo $row['mac']; ?>" size="30"><?php echo $row['mac']; ?></option>
        <?php } ?>
      </select>
      <!--input type="button" value="Get Value" /-->
      <input type="submit" class="Menu" value="Buscar en Inventario" /></td>
  </tr>
  <tr>
    <td>Marca Activo</td>
    <td><select name="marca" class="formulario"  >
                    <?php while($row = mysql_fetch_array($sql_marca)){ ?>
                    <option value="<?php echo $row['marca']; ?>" size="30"><?php echo $row['marca']; ?></option>
        <?php } ?>
      </select>
      <!--input type="button" value="Get Value" /-->
      <input type="submit" class="Menu" value="Buscar en Inventario" /></td>
  </tr>
  <tr>
    <td>Modelo Activo</td>
    <td><select name="modelo" class="formulario"  >
                    <?php while($row = mysql_fetch_array($sql_modelo)){ ?>
                    <option value="<?php echo $row['modelo']; ?>" size="30"><?php echo $row['modelo']; ?></option>
        <?php } ?>
      </select>
      <!--input type="button" value="Get Value" /-->
      <input type="submit" class="Menu" value="Buscar en Inventario" /></td>
  </tr>
  <tr>
    <td width="136"> Tipo Activo</td>
    <td width="559"> <select name="tipo" class="formulario"  >
                    <?php while($row = mysql_fetch_array($sql_tipo)){ ?>
                    <option value="<?php echo $row['tipo']; ?>" size="30"><?php echo $row['tipo']; ?></option>
        <?php } ?>
      </select>
      <!--input type="button" value="Get Value" /-->
      <input type="submit" class="Menu" value="Buscar en Inventario" /></td>
  </tr>
  </table>
      </FORM>

  </div>
  <div id="foot">
 
    
  </div>
  <div id="derechos">Netland Chile S.A. | Todos los Derechos Reservados 2013 | Contáctenos : (56 - 2) 2 6973788  </div>
  
  
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
<?php
mysql_free_result($SG_Login_Usuario);
mysql_free_result($cliente);
mysql_free_result($bienvenido);
?>