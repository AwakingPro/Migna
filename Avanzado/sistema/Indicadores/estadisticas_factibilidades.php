<?php
include("../../../system/config.php");
include("../../../services/config.php");
$fecha_1= $_GET["fecha_1"];
$fecha_2= $_GET["fecha_2"];




$sql_indicadores=mysql_query("SELECT indicador FROM INDICADORES ");


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
      <link href="../../../js/jquery-ui-1.7.2.custom.css" rel="stylesheet" type="text/css" />

  <script type="text/javascript" src="../../../script/jquery.js"></script>
  <script type="text/javascript" src="../../../script/jquery.jCombo.min.js"></script>
  <script type="text/javascript" src="../../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../../js/jquery-ui.min.js"></script>
  <script type="text/javascript">
jQuery(function($){
	$.datepicker.regional['en'] = {
		closeText: 'Cerrar',
		prevText: '&#x3c;Ant',
		nextText: 'Sig&#x3e;',
		currentText: 'Hoy',
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		'Jul','Ago','Sep','Oct','Nov','Dic'],
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		weekHeader: 'Sm',
		dateFormat: 'yy/mm/dd',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['en']);
});    
 
$(document).ready(function() {
   $("#datepicker").datepicker();
 });
jQuery(function($){
	$.datepicker.regional['en'] = {
		closeText: 'Cerrar',
		prevText: '&#x3c;Ant',
		nextText: 'Sig&#x3e;',
		currentText: 'Hoy',
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		'Jul','Ago','Sep','Oct','Nov','Dic'],
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		weekHeader: 'Sm',
		dateFormat: 'yy/mm/dd',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['en']);
});    
 
$(document).ready(function() {
   $("#datepicker2").datepicker();
 });
</script>
  <script type="text/javascript">
jQuery(function($){
	$.datepicker.regional['en'] = {
		closeText: 'Cerrar',
		prevText: '&#x3c;Ant',
		nextText: 'Sig&#x3e;',
		currentText: 'Hoy',
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		'Jul','Ago','Sep','Oct','Nov','Dic'],
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		weekHeader: 'Sm',
		dateFormat: 'yy/mm/dd',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['en']);
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
     <div id="sistema_welcome_top">
       <table width="359" border="0">
         <tr>
           <td width="270"></td>
           <td width="79"><span class="Blancos_chico"><a href="../sistema.php" class="Blancos_chico">Inicio</a>  |</span><a href="<?php echo $logoutAction ?>" class="Blancos_chico"> Salir</a></td>
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
       <li><a href="../radio planning/radio_planning.php" class="BlancosCopia">Radio Planning</a></li>
       <li><a href="indicadores.php" class="BlancosSelection">Indicadores</a></li>
       <li><a href="../evaluaciones/evaluaciones.php" class="BlancosCopia">Evaluaciones</a></li>
     </ul>

     </div>
   </div>
   <div id="inventario_submenu"><table width="900" border="0">
  <tr>
    <td width="32" class="negros"><a href="factibilidades_mensuales.php" class="negros"></a></td>
    <td width="203"><a href="factibilidades_mensuales.php" class="iconos_top">Factibilidades Mensuales</a></td>
    <td width="129"><a href="comprobacion_todas.php" class="iconos_top">Ver Todas</a></td>
    <td width="420"><a href="estadisticas_factibilidades.php" class="iconos_top">Estadisticas</a></td>
    <td width="43">&nbsp;</td>
    <td width="47">&nbsp;</td>
  </tr>
</table></div>
   <div class="Sub_menu" id="indi999">
     <p class="iconos_top"><span class="MENU"><strong>Fa</strong></span><span class="Sub_menu"><strong>Todas las Factibilidades registradas en el Sistema</strong></span>
     <p class="iconos_top"><strong>Tablas</strong>
     <p class="iconos_top">     
     <table width="400" border="1" align="left" cellpadding="1" cellspacing="1" class="iconos_top">
       <tr>
         <td width="289" bgcolor="#7092BE" class="Blancos_chicoCopia"><span class="Blancos_chico">Resultado Factibilidades</span></td>
         <td width="97" bgcolor="#7092BE" class="Blancos_chico">Cantidad</td>
       </tr>
       <tr>
         <td bgcolor="#5DB5CD" class="Blancos_chicoCopia"><span class="Blancos_chicoCopia">Positivas</span></td>
         <td bgcolor="#5DB5CD"><span class="Blancos_chicoCopia">
          <?php $sql10 = "SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and resultado='Positiva'";
$resultado10 = mysql_query($sql10);

$select10=mysql_query("SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and resultado='Positiva'");
if (mysql_num_rows($select10)>0){
 $row10 = mysql_fetch_array($resultado10);
  echo $row10[0];  }
else {echo "";}?>
         </span></td>
       </tr>
       <tr>
         <td bgcolor="#FFFFFF" class="Blancos_chicoCopia"><span class="Blancos_chicoCopia">Pendientes</span></td>
         <td bgcolor="#FFFFFF"><span class="Blancos_chicoCopia">
          <?php $sql10 = "SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and resultado='Pendiente'";
$resultado10 = mysql_query($sql10);

$select10=mysql_query("SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and resultado='Pendiente'");
if (mysql_num_rows($select10)>0){
 $row10 = mysql_fetch_array($resultado10);
 echo $row10[0];  }
else {echo "";}?>
         </span></td>
       </tr>
       <tr>
         <td bgcolor="#5DB5CD" class="Blancos_chicoCopia"><span class="Blancos_chicoCopia">Negativas</span></td>
         <td bgcolor="#5DB5CD"><span class="Blancos_chicoCopia">
          <?php $sql10 = "SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and resultado='Negativa'";
$resultado10 = mysql_query($sql10);

$select10=mysql_query("SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and resultado='Negativa'");
if (mysql_num_rows($select10)>0){
 $row10 = mysql_fetch_array($resultado10);
  echo $row10[0];  }
else {echo "";}?>
         </span></td>
       </tr>
       <tr>
         <td bgcolor="#FFFFFF" class="Blancos_chicoCopia">Rechazada</td>
         <td bgcolor="#FFFFFF"><?php $sql10 = "SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and resultado='Rechazada'";
$resultado10 = mysql_query($sql10);

$select10=mysql_query("SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and resultado='Rechazada'");
if (mysql_num_rows($select10)>0){
 $row10 = mysql_fetch_array($resultado10);
  echo $row10[0];  }
else {echo "";}?></td>
       </tr>
       <tr>
         <td bgcolor="#5DB5CD" class="Blancos_chicoCopia">&nbsp;</td>
         <td bgcolor="#5DB5CD">&nbsp;</td>
       </tr>
       <tr>
         <td bgcolor="#FFFFFF" class="Blancos_chicoCopia"><span class="Blancos_chicoCopia">TOTAL</span></td>
         <td bgcolor="#FFFFFF"><span class="Blancos_chicoCopia">
          <?php $sql10 = "SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' ";
$resultado10 = mysql_query($sql10);

$select10=mysql_query("SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' ");
if (mysql_num_rows($select10)>0){
 $row10 = mysql_fetch_array($resultado10);
  echo $row10[0];  }
else {echo "";}?>
         </span></td>
       </tr>
     </table><table width="400" border="1" align="right" cellpadding="1" cellspacing="1" class="iconos_top">
       <tr>
         <td width="289" bgcolor="#7092BE" class="Blancos_chicoCopia"><span class="Blancos_chico">Seguimiento Factibilidades</span></td>
         <td width="97" bgcolor="#7092BE" class="Blancos_chico">Cantidad</td>
       </tr>
       <tr>
         <td bgcolor="#5DB5CD" class="Blancos_chicoCopia"><span class="Blancos_chicoCopia">Instalados</span></td>
         <td bgcolor="#5DB5CD"><span class="Blancos_chicoCopia">
          <?php $sql10 = "SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and estado_factibilidad='Instalado'";
$resultado10 = mysql_query($sql10);

$select10=mysql_query("SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and estado_factibilidad='Instalado'");
if (mysql_num_rows($select10)>0){
 $row10 = mysql_fetch_array($resultado10);
  echo $row10[0];  }
else {echo "";}?>
         </span></td>
       </tr>
       <tr>
         <td bgcolor="#FFFFFF" class="Blancos_chicoCopia"><span class="Blancos_chicoCopia">Rechazados</span></td>
         <td bgcolor="#FFFFFF"><span class="Blancos_chicoCopia">
          <?php $sql10 = "SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and estado_factibilidad='Rechazado'";
$resultado10 = mysql_query($sql10);

$select10=mysql_query("SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and estado_factibilidad='Rechazado'");
if (mysql_num_rows($select10)>0){
 $row10 = mysql_fetch_array($resultado10);
  echo $row10[0];  }
else {echo "";}?>
         </span></td>
       </tr>
       <tr>
         <td bgcolor="#5DB5CD" class="Blancos_chicoCopia">En Espera</td>
         <td bgcolor="#5DB5CD"><?php $sql10 = "SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and estado_factibilidad='En Espera'";
$resultado10 = mysql_query($sql10);

$select10=mysql_query("SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and estado_factibilidad='En Espera'");
if (mysql_num_rows($select10)>0){
 $row10 = mysql_fetch_array($resultado10);
  echo $row10[0];  }
else {echo "";}?></td>
       </tr>
       <tr>
         <td bgcolor="#FFFFFF" class="Blancos_chicoCopia">Negativas</td>
         <td bgcolor="#FFFFFF"><?php $sql10 = "SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and estado_factibilidad='Negativa'";
$resultado10 = mysql_query($sql10);

$select10=mysql_query("SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and estado_factibilidad='Negativa'");
if (mysql_num_rows($select10)>0){
 $row10 = mysql_fetch_array($resultado10);
  echo $row10[0];  }
else {echo "";}?></td>
       </tr>
       <tr>
         <td bgcolor="#5DB5CD" class="Blancos_chicoCopia"><span class="Blancos_chicoCopia">No Contactado</span></td>
         <td bgcolor="#5DB5CD"><span class="Blancos_chicoCopia">
          <?php $sql10 = "SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and estado_factibilidad='No Contactado'";
$resultado10 = mysql_query($sql10);

$select10=mysql_query("SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' and estado_factibilidad='No Contactado'");
if (mysql_num_rows($select10)>0){
 $row10 = mysql_fetch_array($resultado10);
  echo $row10[0];  }
else {echo "";}?>
         </span></td>
       </tr>
       <tr>
         <td bgcolor="#FFFFFF" class="Blancos_chicoCopia"><span class="Blancos_chicoCopia">TOTAL</span></td>
         <td bgcolor="#FFFFFF"><span class="Blancos_chicoCopia">
          <?php $sql10 = "SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' ";
$resultado10 = mysql_query($sql10);

$select10=mysql_query("SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' ");
if (mysql_num_rows($select10)>0){
 $row10 = mysql_fetch_array($resultado10);
  echo $row10[0];  }
else {echo "";}?>
         </span></td>
       </tr>
     </table>
     <p class="iconos_top">     
     <p class="iconos_top">
     <p class="iconos_topCENTRO"><img src="pie_factibilidades.php" width="350" height="250" /><img src="pie_estado_factibilidades.php" width="350" height="250" /></p>
   </div>
   
   <div id="index_foot"></div>
   <div id="index_footer">
     <p>Sistema Gestión de Clientes y Control Interno - Netland Chile S.A. | Todos los derechos reservados © 2013</p>
     <p>Desarrollado por Luis Ponce Zúñiga</p>
   </div>
   
   
  </div>
  <script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../../SpryAssets/SpryMenuBarRightHover.gif"});
  </script>
  </body>
  </html>
