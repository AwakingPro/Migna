<?php
include("../../../system/config.php");
include("../../../services2/config.php");

$cliente= $_GET["cliente"];
$sql_tipo=mysql_query("SELECT tipo FROM TICKET_tipo ORDER BY tipo ASC");
$sql_departamento=mysql_query("SELECT departamento FROM TICKET_departamento ORDER BY departamento ASC");
$sql_origen=mysql_query("SELECT origen FROM TICKET_origen ORDER BY origen ASC");
$sql_prioridad=mysql_query("SELECT prioridad FROM TICKET_prioridad ");
$sql_status=mysql_query("SELECT status FROM TICKET_status ");


$sql_hora=mysql_query("SELECT hora FROM TICKET_hora ");
$sql_responsable=mysql_query("SELECT nombre FROM usuarios ORDER BY nombre ASC");
$fecha=date("Y-m-d H:i:s");


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
$MM_authorizedUsers = "4";
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
$creador=mysql_query("SELECT nombre FROM usuarios WHERE usuario='$usuario'");


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
	background-image: url(../../../images/imagen.png);
}
  </style>

  <script type="text/javascript" src="../../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../../js/jquery-ui.min.js"></script>
       <link href="../../../js/jquery-ui-1.7.2.custom.css" rel="stylesheet" type="text/css" />
   <link href="../../../css/sistema.css" rel="stylesheet" type="text/css" />

  <link href="../../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
  <link href="../../../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
  <script src="../../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
  <script type="text/javascript" src="../../../script/jquery.js"></script>
  <script type="text/javascript" src="../../../script/jquery.jCombo.min.js"></script>
    <script type='text/javascript' src='../../../javascript/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../../../javascript/jquery.autocomplete.css" />

  <script type="text/javascript">
  
$().ready(function() {
	$("#course").autocomplete("busqueda_cliente.php", {
		width: 260,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
	$("#course2").autocomplete("busqueda_ticket.php", {
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
  
function validarForm(formulario) {
  if(formulario.cliente.value.length==0) { //comprueba que no esté vacío
    formulario.cliente.focus();   
    alert('No has Seleccionado Cliente'); 
    return false; //devolvemos el foco
  }
  if(formulario.origen.value.length==0) { //comprueba que no esté vacío
    formulario.origen.focus();
    alert('No has seleccionado Origen');
    return false;
  }
 if(formulario.country.value.length==0) { //comprueba que no esté vacío
    formulario.country.focus();
    alert('No has Seleecionado Departamento');
    return false;
  }
   if(formulario.city.value.length==0) { //comprueba que no esté vacío
    formulario.city.focus();
    alert('No has Seleccionado Tipo');
    return false;
  }
   if(formulario.zone.value.length==0) { //comprueba que no esté vacío
    formulario.zone.focus();
    alert('No has Seleccionado Subtipo');
    return false;
  }
   if(formulario.comentario.value.length==0) { //comprueba que no esté vacío
    formulario.comentario.focus();
    alert('No has ingresado Comentario');
    return false;
  }
   if(formulario.comentario_interno.value.length==0) { //comprueba que no esté vacío
    formulario.comentario_interno.focus();
    alert('No has ingresado comentario Interno');
    return false;
  }
   if(formulario.prioridad.value.length==0) { //comprueba que no esté vacío
    formulario.prioridad.focus();
    alert('No has seleccionado Prioridad');
    return false;
  }
   if(formulario.responsable.value.length==0) { //comprueba que no esté vacío
    formulario.responsable.focus();
    alert('No has seleccionado a Asigado');
    return false;
  }
   if(formulario.status.value.length==0) { //comprueba que no esté vacío
    formulario.status.focus();
    alert('No has seleccionado Status');
    return false;
  }

  
  return true;
}

</script>

  </head>
    
  <body>
  <body onload="prettyForms()">
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
       <li><a href="ticket.php" class="BlancosSelection">Ticket</a>       </li>
       <li><a href="../Radius/radius.php" class="BlancosCopia">Radius</a></li>
       <li><a href="../Intranet/intranet.php" class="BlancosCopia">Intranet</a></li>
       <li><a href="../radio planning/radio_planning.php" class="BlancosCopia">Radio Planning</a></li>
       <li><a href="../Indicadores/indicadores.php" class="BlancosCopia">Indicadores</a></li>
       <li><a href="../evaluaciones/evaluaciones.php" class="BlancosCopia">Evaluaciones</a></li>
     </ul>
      </div>
   </div>
   <div id="inventario_submenu"><table width="1000" border="0">
  <tr>
    <td width="5" height="15" class="Sub_menu">&nbsp;</td>
    <td width="100" class="Sub_menu"><a href="buscar_ticket.php" class="Sub_menu">Buscar Ticket</a></td>
    <td width="100" class="Sub_menu"><a href="ticket_nuevo.php" class="LINKCopia">Nuevo</a></td>
    <td width="100" class="Sub_menu"><a href="ticket_abiertos.php" class="Sub_menu">Abiertos
      <?php $sql = "SELECT COUNT(*) FROM TICKET WHERE status='Abierto' ";
$resultado = mysql_query($sql);

$select=mysql_query("SELECT * FROM TICKET WHERE status='Abierto' ");
if (mysql_num_rows($select)>0){
 $row = mysql_fetch_array($resultado);
 echo "("; echo $row[0]; echo ")"; }
else {echo "";}

?>
    </a></td>
    <td width="100" class="Sub_menu"><a href="ticket_incumplidos.php" class="Sub_menu">Incumplidos
      <?php 
	  $fecha2=date("Y-m-d H:i:s");
	  $sql2 = "SELECT COUNT(*) FROM TICKET WHERE status='Abierto' and    fecha_solucion<'$fecha2' ";
$resultado2 = mysql_query($sql2);

$select2=mysql_query("SELECT * FROM TICKET WHERE status='Abierto' and  fecha_solucion<'$fecha2'");
if (mysql_num_rows($select2)>0){
 $row = mysql_fetch_array($resultado2);
 echo "("; echo $row[0]; echo ")"; }
else {echo "";}

?>
    </a></td>
    <td width="100" class="Sub_menu"><a href="ticket_cerrados.php" class="Sub_menu">Cerrados
      <?php $sql3 = "SELECT COUNT(*) FROM TICKET WHERE status='Cerrado'";
$resultado3 = mysql_query($sql3);

$select3=mysql_query("SELECT * FROM TICKET WHERE status='Cerrado'");
if (mysql_num_rows($select3)>0){
 $row = mysql_fetch_array($resultado3);
 echo "("; echo $row[0]; echo ")"; }
else {echo "";}

?>
    </a></td>
    <td width="100" class="Sub_menu"><a href="mis_ticket.php" class="Sub_menu">Mis Ticket
      <?php $user3=mysql_query("SELECT nombre FROM usuarios WHERE usuario='$usuario'");

 while($row=mysql_fetch_array($user3)){
     	$user4 =$row['nombre'];
	    global $user4; 
	}$sql4 = "SELECT COUNT(*) FROM TICKET WHERE creador='$user4'";
$resultado4 = mysql_query($sql4);

$select4=mysql_query("SELECT * FROM TICKET WHERE creador='$user4'");
if (mysql_num_rows($select4)>0){
 $row = mysql_fetch_array($resultado4);
 echo "("; echo $row[0]; echo ")"; }
else {echo "";}

?>
    </a></td>
    <td width="100" class="Sub_menu"><a href="asignar.php" class="Sub_menu">Asignados
      <?php $user7=mysql_query("SELECT nombre FROM usuarios WHERE usuario='$usuario'");

 while($row=mysql_fetch_array($user7)){
     	$user7 =$row['nombre'];
	    global $user7; 
	}$sql7 = "SELECT COUNT(*) FROM TICKET WHERE asignar='$user4' and status='Abierto'";
$resultado7 = mysql_query($sql7);

$select7=mysql_query("SELECT * FROM TICKET WHERE asignar='$user4' and status='Abierto'");
if (mysql_num_rows($select7)>0){
 $row = mysql_fetch_array($resultado7);
 echo "("; echo $row[0]; echo ")"; }
else {echo "";}

?>
    </a></td>
    <td width="100" class="Sub_menu"><a href="ticket_finalizados.php" class="Sub_menu">Finalizados
      <?php $sql8 = "SELECT COUNT(*) FROM TICKET WHERE status='Finalizado'";
$resultado8 = mysql_query($sql8);

$select8=mysql_query("SELECT * FROM TICKET WHERE status='Finalizado'");
if (mysql_num_rows($select8)>0){
 $row = mysql_fetch_array($resultado8);
 echo "("; echo $row[0]; echo ")"; }
else {echo "";}

?>
    </a></td>
    <td width="100" class="Sub_menu">&nbsp;</td>
    <td width="49" class="Sub_menu">&nbsp;</td>
  </tr>
</table></div>
   <div id="sistema_ingreso_ticket_nuevo2">
   <p class="MENU"><span class="negros">Buscar Ticket</span><FORM name=tuformulario autocomplete="off" ACTION="comprobacion_resultado_ticket.php" METHOD="POST"><table width="531" border="0">
  <tr>
    <td width="158">Cliente</td>
    <td width="363"><input name="cliente" type="text" class="EDITARCopia" id="course" size="38" />
      <!--input type="button" value="Get Value" /-->
      <input type="submit" class="EDITARCopia" value="Ir al registro" /></td>
    </tr>
  <tr>
    <td> Ticket</td>
    <td><input name="numero" type="text" class="EDITARCopia" id="course2" size="38" />
      <!--input type="button" value="Get Value" /-->
      <input type="submit" class="EDITARCopia" value="Ir al registro" /></td>
    </tr>
  </table>      </FORM></p>
   </div>
   
   <div id="index_foot"></div>
   <div id="index_footer">Sistema Gestión de Clientes y Control Interno - Netland Chile S.A. | Todos los derechos reservados &copy; 2013<p class="lp">
   Desarrollado por Luis Ponce Zúñiga




</div>
   
   
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