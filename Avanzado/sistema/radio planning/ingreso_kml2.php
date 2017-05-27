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
  <script type="text/javascript" src="../../../script/jquery.js"></script>
  <script type="text/javascript" src="../../../script/jquery.jCombo.min.js"></script>
  <script type='text/javascript' src='../../../javascript/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../../../javascript/jquery.autocomplete.css" />
<script type="text/javascript">
function validarForm(formulario) {
  if(formulario.estacion.value.length==0) { //comprueba que no esté vacío
    formulario.estacion.focus();   
    alert('No has seleccionado Estacion'); 
    return false; //devolvemos el foco
  }
  if(formulario.funcion.value.length==0) { //comprueba que no esté vacío
    formulario.funcion.focus();
    alert('No has escrito Funcion');
    return false;
  }
  if(formulario.ip.value.length==0) { //comprueba que no esté vacío
    formulario.ip.focus();
    alert('No has escrito IP');
    return false;
  }
  if(formulario.puerto.value.length==0) {  //comprueba que no esté vacío
    formulario.puerto.focus();
    alert('No has escrito Puerto');
    return false;
  }
  if(formulario.marca.value.length==0) {  //comprueba que no esté vacío
    formulario.marca.focus();
    alert('No has escrito Marca');
    return false;
  }
  if(formulario.modelo.value.length==0) {  //comprueba que no esté vacío
    formulario.modelo.focus();
    alert('No has escrito Modelo');
    return false;
  }
  if(formulario.mac.value.length==0) {  //comprueba que no esté vacío
    formulario.mac.focus();
    alert('No has escrito la Mac Address');
    return false;
  }
  if(formulario.remarks.value.length==0) {  //comprueba que no esté vacío
    formulario.remarks.focus();
    alert('No has escrito el Remarks');
    return false;
  }
  if(formulario.ssid.value.length==0) {  //comprueba que no esté vacío
    formulario.ssid.focus();
    alert('No has escrito el SSID');
    return false;
  }

  return true;
}
</script>
  </head>
    
  <body>
  <div id="contenedor">
   <div id="index_top_top"></div>
   <div id="index_welcome">
     <div id="sistema_welcome_left"><?php while($row=mysql_fetch_array($bienvenido)){
     	echo "Bienvenido ".$row['nombre'];
	
	}?></div>
     <div id="sistema_welcome_top">
       <table width="359" border="0">
         <tr>
           <td width="270"></td>
           <td width="79" class="Blancos_chico"><a href="../sistema.php" class="Blancos_chico">Inicio</a>  |<a href="<?php echo $logoutAction ?>" class="Blancos_chico"> Salir</a></td>
         </tr>
       </table>
     </div>
   </div>
   <div id="index_top"></div>
   <div id="index_menu">
   <div id="index_menu_principal">
     <ul id="MenuBar1" class="MenuBarHorizontal">
       <li><a href="../clientes/clientes.php" class="BlancosCopia">Clientes</a>       </li>
       <li><a href="../inventario/inventario.php" class="BlancosCopia">Inventario</a></li>
       <li><a href="../ticket/ticket.php" class="BlancosCopia">Ticket</a>       </li>
       <li><a href="../Radius/radius.php" class="BlancosCopia">Radius</a></li>
       <li><a href="../Intranet/intranet.php" class="BlancosCopia">Intranet</a></li>
       <li><a href="radio_planning.php" class="BlancosSelection">Radio Planning</a></li>
       <li><a href="../Indicadores/indicadores.php" class="BlancosCopia">Indicadores</a></li>
       <li><a href="../evaluaciones/evaluaciones.php" class="BlancosCopia">Evaluaciones</a></li>
     </ul>
     </div>
   </div>
   <div id="inventario_submenu"><table width="1000" border="0">
  <tr>
    <td width="130" class="iconos_topCENTRO"><a href="busqueda_radio_planning.php" class="iconos_top">Buscar Registro</a></td>
    <td width="130" class="iconos_topCENTRO"><a href="radio_planning_ingresos.php" class="iconos_top">Ingresar Registros</a></td>
    <td width="130" class="iconos_topCENTRO"><a href="busqueda_estacion_radio_planning.php" class="iconos_top">Buscar Estación</a></td>
<td width="130" class="iconos_topCENTRO"><a href="radio_planning_ingresos_estaciones.php" class="iconos_top">Ingresar Estación</a></td>
<td width="130" class="iconos_topCENTRO"><a href="ingreso_kml.php" class="iconos_top">Subir KML</a></td>

    <td width="324">&nbsp;</td>
  </tr>
</table></div>
   <div id="radio_planning_kml">
     <p class="iconos_top"> </FORM>
     <p>&nbsp;</p>
   </div>
   
   <div id="index_foot"></div>
   <div id="index_footer">
Sistema Gestión de Clientes y Control Interno - Netland Chile S.A. | Todos los derechos reservados © 2013 </p>
     <p>Desarrollado por Luis Ponce Zúñiga</div>
   
   
  </div>
  <script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../../SpryAssets/SpryMenuBarRightHover.gif"});
  </script>
  </body>
  </html>
