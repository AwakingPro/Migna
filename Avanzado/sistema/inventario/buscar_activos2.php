<?php
include("../../../system/config.php");
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

  $logoutGoTo = "../index.php";
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
$MM_authorizedUsers = "1";
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
  <title>Sistema Gestion Clientes</title>
  <style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(../../../images/repeat.png);
}
  </style>
  <link href="../../../css/sistema.css" rel="stylesheet" type="text/css" />
  <link href="../../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
  <link href="../../../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
  <script src="../../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
  <script type="text/javascript" src="../../../javascript/jquery.js"></script>
<script type='text/javascript' src='../../../javascript/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../../../javascript/jquery.autocomplete.css" />
  <script type="text/javascript">
$().ready(function() {
	$("#course").autocomplete("busqueda_serial.php", {
		width: 260,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
});
$().ready(function() {
	$("#course2").autocomplete("busqueda_mac.php", {
		width: 260,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
});
$().ready(function() {
	$("#course3").autocomplete("busqueda_tipo.php", {
		width: 260,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
});
$().ready(function() {
	$("#course4").autocomplete("busqueda_marca.php", {
		width: 260,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
});
$().ready(function() {
	$("#course5").autocomplete("busqueda_modelo.php", {
		width: 260,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
});
$().ready(function() {
	$("#course6").autocomplete("busqueda_proveedor.php", {
		width: 260,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
});
$().ready(function() {
	$("#course7").autocomplete("busqueda_bodega.php", {
		width: 260,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
});
</script>
  </head>
    
  <body>
  <div id="contenedor">
   <div id="index_top_top"></div>
   <div id="index_welcome">
     <div id="sistema_welcome_left"><?php while($row=mysql_fetch_array($bienvenido)){
     	echo "Bienvenido ".$row['nombre'];
	
	}?></div>
     <div id="sistema_welcome_top"><table width="359" border="0">
  <tr>
    <td width="221"></td>
    <td width="128" class="Blancos_chico">Inicio |&nbsp;Admin | Salir</td>
    </tr>
  </table></div>
   </div>
   <div id="index_top"></div>
   <div id="index_menu">
   <div id="index_menu_principal">
     <ul id="MenuBar1" class="MenuBarHorizontal">
       <li><a href="../clientes/clientes.php" class="Blancos">Clientes</a>       </li>
       <li><a href="../../../Supervisor/sistema/inventario/inventario/inventario.php" class="CLASE_CLIENTES">Inventario</a></li>
       <li><a href="../ticket/ticket.php" class="Blancos">Ticket</a>       </li>
       <li><a href="#" class="Blancos">Radius</a></li>
       <li><a href="#" class="Blancos">Intranet</a></li>
       <li><a href="../radio planning/radio_planning.php" class="Blancos">Radio Planning</a></li>
     </ul>
      </div>
   </div>
   <div id="inventario_submenu"><table width="1000" border="0">
  <tr>
    <td width="100" class="iconos_topCENTRO"><a href="buscar_activos.php" class="iconos_top">Buscar</a></td>
    <td width="100" class="iconos_topCENTRO"><a href="inventario_ingresos.php" class="iconos_top">Ingresar</a></td>
    <td width="100" class="iconos_topCENTRO"><a href="inventario_modificar.php" class="iconos_top">Editar</a></td>
    <td width="682">&nbsp;</td>
  </tr>
</table></div>
   <div id="inventario_modulo_ingresos">
     <div id="inventario_busqueda">
       <div id="inventario_menu_rght">Buscar Activo a en la Base de Datos</div>
        <FORM name=tuformulario autocomplete="off" ACTION="bypass_editar2.php" METHOD="POST">
      <table width="527" border="0">
  <tr>
    <td>&nbsp;</td>
    <td><!--input type="button" value="Get Value" /--></td>
    </tr>
  <tr>
    <td> Serial</td>
    <td><input name="serial" type="text" class="EDITARCopiaCopia2" id="course" size="40" />
      <!--input type="button" value="Get Value" /-->
      <input type="submit" class="EDITARCopiaCopia2" value="Ver Registro" /></td>
    </tr>
  <tr>
    <td>Mac</td>
    <td><input name="mac" type="text" class="EDITARCopiaCopia2" id="course2" size="40" />
      <!--input type="button" value="Get Value" /-->
      <input type="submit" class="EDITARCopiaCopia2" value="Ver Registro" /></td>
  </tr>
  <tr>
    <td>Marca</td>
    <td><input name="marca" type="text" class="EDITARCopiaCopia2" id="course4" size="40" />
      <!--input type="button" value="Get Value" /-->
      <input type="submit" class="EDITARCopiaCopia2" value="Ver Registro" /></td>
  </tr>
  <tr>
    <td>Modelo</td>
    <td><input name="modelo" type="text" class="EDITARCopiaCopia2" id="course5" size="40" />
      <!--input type="button" value="Get Value" /-->
      <input type="submit" class="EDITARCopiaCopia2" value="Ver Registro" /></td>
  </tr>
  <tr>
    <td width="149"> Bodega</td>
    <td width="368"> <input name="bodega" type="text" class="EDITARCopiaCopia2" id="course7" size="40" />
      <!--input type="button" value="Get Value" /-->
      <input type="submit" class="EDITARCopiaCopia2" value="Ver Registro" /></td>
  </tr>
  </table>
      </FORM>
     </div>
   </div>
   
   <div id="index_foot"></div>
   <div id="index_footer">Sistema Gestión de Clientes - Netland Chile S.A. - Todos los derechos reservados</div>
   
   
  </div>
  <script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../../SpryAssets/SpryMenuBarRightHover.gif"});
  </script>
  </body>
  </html>
<?php
mysql_free_result($SG_Login_Usuario);
mysql_free_result($cliente);
mysql_free_result($bienvenido);
?>