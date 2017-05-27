<?php
include("../../../system/config.php");
include("../../../services/config.php");
$kpi = $_GET['kpi'];
$fecha_1A = $_GET['fecha_1'];
$fecha1= $fecha_1A." "."00:00:00";
$fecha_2A= $_GET['fecha_2'];
$fecha2= $fecha_2A." "."00:00:00";

$cliente = $_GET["cliente"];
$sql_cliente=mysql_query("SELECT cliente FROM SP_soporte_crear_cliente WHERE cliente='$cliente'  ");
$sql_cliente2=mysql_query("SELECT cliente FROM SP_soporte_crear_cliente WHERE cliente='$cliente'  ");

$sql_rut=mysql_query("SELECT rut FROM SP_soporte_crear_cliente WHERE cliente='$cliente'  ");
$sql_rut2=mysql_query("SELECT rut FROM SP_soporte_crear_cliente WHERE cliente='$cliente'  ");

$sql_contacto=mysql_query("SELECT contacto FROM SP_soporte_crear_cliente WHERE cliente='$cliente'  ");
$sql_contacto2=mysql_query("SELECT contacto FROM SP_soporte_crear_cliente WHERE cliente='$cliente'  ");

$sql_telefonos=mysql_query("SELECT telefonos FROM SP_soporte_crear_cliente WHERE cliente='$cliente'  ");
$sql_telefonos2=mysql_query("SELECT telefonos FROM SP_soporte_crear_cliente WHERE cliente='$cliente'  ");



$sql_correos=mysql_query("SELECT correos FROM SP_soporte_crear_cliente WHERE cliente='$cliente'  ");
$sql_correos2=mysql_query("SELECT correos FROM SP_soporte_crear_cliente WHERE cliente='$cliente'  ");

$sql_direccion_comercial=mysql_query("SELECT direccion_comercial FROM SP_soporte_crear_cliente WHERE cliente='$cliente'  ");
$sql_direccion_comercial2=mysql_query("SELECT direccion_comercial FROM SP_soporte_crear_cliente WHERE cliente='$cliente'  ");

$sql_usuarios=mysql_query("SELECT nombre FROM usuarios ORDER by nombre ASC  ");
$sql_plan=mysql_query("SELECT plan FROM SP_row_plan ORDER by plan ASC  ");
$sql_tipo=mysql_query("SELECT tipo FROM SP_row_tipo ORDER by tipo ASC  ");
$sql_estado=mysql_query("SELECT estado FROM SP_row_estado ORDER by estado ASC  ");
$sql_mac_su=mysql_query("SELECT mac FROM INV_activos where id=0 and tipo='Antena' ");
$sql_mac_router=mysql_query("SELECT mac FROM INV_activos where id=0 and tipo='Router'  ");
$sql_ap=mysql_query("SELECT ip FROM INT_radio_planning ORDER by ip ASC  ");
$sql_configuracion=mysql_query("SELECT configuracion FROM SP_row_configuracion_ip ORDER by configuracion ASC  ");


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
<?php include("no_back.php");?>
<link href="../../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="../../../script/jquery.js"></script>
  <script type="text/javascript" src="../../../script/jquery.jCombo.min.js"></script>
  <script type='text/javascript' src='../../../javascript/jquery.autocomplete.js'></script>
  <script src="../../../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
  <script src="../../../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../../../javascript/jquery.autocomplete.css" />
<link href="../../../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="../../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="../../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../../js/jquery-ui.min.js"></script>
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
      <li><a href="../clientes/clientes.php" >Clientes</a></li>
      <li><a href="factibilidades.php" id="supermenu">Factibilidades</a></li>
      <li><a href="../Retiros/retiros.php">Retiros</a></li>
      <li><a href="../ticket/ticket.php">Ticket</a></li>
      <li><a href="../radio planning/radio_planning.php">Radio Planning</a>      </li>
<li><a href="../Informaciones/informaciones.php">Informaciones</a></li>
      <li id="supermenu"><a href="../inventario/inventario.php">Inventario</a></li>
      <li><a href="../Indicadores/indicadores.php">Indicadores</a></li>
</ul>
  </div>
      <div id="footer_menu"></div>
   <div id="contacto_1"><table width="890" border="0" >
  <tr>
    <td width="67" height="15"><a href="factibilidades_buscar.php" class="Menu" >Buscar </a></td>
    <td width="67" class="Sub_menu"><a href="ticket_nuevo_factibilidad.php" class="Menu">Nueva </a></td>
    <td width="115" class="Sub_menu"><a href="factibilidades_pendientes.php" class="Menu">Pendientes
      <?php $sql = "SELECT COUNT(*) FROM TICKET WHERE status='Abierto' and subtipo='Factibilidad' ";
$resultado = mysql_query($sql);

$select=mysql_query("SELECT * FROM TICKET WHERE status='Abierto' and subtipo='Factibilidad'");
if (mysql_num_rows($select)>0){
 $row = mysql_fetch_array($resultado);
 echo "("; echo $row[0]; echo ")"; }
else {echo "";}

?>
    </a></td>
    <td width="109" class="Menu"><a href="asignar_factibilidades.php" class="Menu">Asignados
        <?php $user7=mysql_query("SELECT nombre FROM usuarios WHERE usuario='$usuario'");

 while($row=mysql_fetch_array($user7)){
     	$user7 =$row['nombre'];
	    global $user7; 
	}$sql7 = "SELECT COUNT(*) FROM TICKET WHERE asignar='$user7' and status='Abierto'  ";
$resultado7 = mysql_query($sql7);

$select7=mysql_query("SELECT * FROM TICKET WHERE asignar='$user7' and status='Abierto'");
if (mysql_num_rows($select7)>0){
 $row = mysql_fetch_array($resultado7);
 echo "("; echo $row[0]; echo ")"; }
else {echo "";}

?>
        &nbsp;</a></td>
    <td width="510" class="Menu"><a href="factibilidades_kpi.php" class="Menu4">KPI Factibilidades Mensuales</a></td>
    </tr>
</table></div>
  <div id="inventario">
    <p><?PHP if (empty($kpi)) {?> KPI Factibilidades </p>
    <p>Seleccione entre que fechas desea ver las estadísticas de las factibilidades (*Campos Obligatorios)</p>
    <FORM name=tuformulario autocomplete="off" ACTION="comprobacion_factibilidades.php" METHOD="POST">
     <table width="800" border="0">
     <tr>
       
       
       <td width="153">&nbsp;</td>
     </tr>
     <tr>
       <td>Fecha de Inicio</td>
       <td width="605"><span id="sprytextfield1">
       <label for="fecha_1"></label>
       <input name="fecha_1" type="text" class="formulariochico" id="fecha_1" />
       <span class="textfieldRequiredMsg">Se necesita un valor.</span><span class="textfieldInvalidFormatMsg">Formato no válido.</span></span>Formato (aaaa-dd-mm)</td>
       <td width="28">&nbsp;</td>
     </tr>
     <tr>
       <td>Fecha de Término</td>
       <td><span id="sprytextfield2">
       <label for="fecha_2"></label>
       <input name="fecha_2" type="text" class="formulariochico" id="fecha_2" />
       <span class="textfieldRequiredMsg">Se necesita un valor.</span><span class="textfieldInvalidFormatMsg">Formato no válido.</span></span>Formato (aaaa-dd-mm)</td>
       <td>&nbsp;</td>
     </tr>
     <tr>
       <td><input name="Ir al Registro" type="submit"   class="formulariochico" value="Consultar"/></td>
       <td><input name="Restaurar Valores" type="reset"    class="formulariochico"/></td>
       <td>&nbsp;</td>
     </tr>
   </table>
   </FORM></p>
    <p>
    <?php
  $id=$_GET['id'];
  
  if ($id==1){
	  
	  echo "<div id='dialog' title='Error'><p>La fecha de Inicio no puede ser mayor a la fecha de terminado</div>";
	  
	  }
  
  
  
  ?>
  
      <?php }?>
    </p>
    <p><?PHP if ($kpi==1) {?>
    </p>
    <p>Resultado Busqueda :<?php echo $fecha1;?></p><table width="400" border="0" align="left" cellpadding="0" cellspacing="0" >
       <tr class="Tablas">
         <td width="289" >Resultado Factibilidades</td>
         <td width="97" ><center>Cantidad</center></td>
      </tr>
       <tr>
         <td id="divi" >Positivas</td>
         <td id="divi">
          <?php $sql10 = "SELECT COUNT(*) FROM TICKET WHERE (subtipo='Factibilidad' AND  resultado='Positiva') AND fecha_creacion  BETWEEN '$fecha_1' AND '$fecha_2'  ";
$resultado10 = mysql_query($sql10);

$select10=mysql_query("SELECT COUNT(*) FROM TICKET WHERE (subtipo='Factibilidad' AND resultado='Positiva') AND fecha_creacion  BETWEEN '$fecha_1' AND '$fecha2'  ");
if (mysql_num_rows($select10)>0){
 $row10 = mysql_fetch_array($resultado10);
  echo "<center>".$row10[0]."</center>";  }
else {echo "";}?>
        </td>
       </tr>
       <tr>
         <td bgcolor="#FFFFFF"  id="divi">Pendientes</td>
         <td bgcolor="#FFFFFF" id="divi">
          <?php $sql10 = "SELECT COUNT(*) FROM TICKET WHERE (subtipo='Factibilidad' AND resultado='Pendiente') AND fecha_creacion  BETWEEN '$fecha_1' AND '$fecha2'  ";
$resultado10 = mysql_query($sql10);

$select10=mysql_query("SELECT COUNT(*) FROM TICKET WHERE (subtipo='Factibilidad' AND resultado='Pendiente') AND fecha_creacion  BETWEEN '$fecha_1' AND '$fecha2'  ");
if (mysql_num_rows($select10)>0){
 $row10 = mysql_fetch_array($resultado10);
  echo "<center>".$row10[0]."</center>";  }
else {echo "";}?>
        </td>
       </tr>
       <tr>
         <td  id="divi">Negativas</td>
         <td id="divi">
          <?php $sql10 = "SELECT COUNT(*) FROM TICKET WHERE (subtipo='Factibilidad' AND resultado='Negativa') AND fecha_creacion  BETWEEN '$fecha_1' AND '$fecha2'  ";
$resultado10 = mysql_query($sql10);

$select10=mysql_query("SELECT COUNT(*) FROM TICKET WHERE (subtipo='Factibilidad' AND resultado='Negativa') AND fecha_creacion  BETWEEN '$fecha_1' AND '$fecha2'  ");
if (mysql_num_rows($select10)>0){
 $row10 = mysql_fetch_array($resultado10);
  echo "<center>".$row10[0]."</center>";  }
else {echo "";}?>
        </td>
       </tr>
       <tr>
         <td bgcolor="#FFFFFF" id="divi">Rechazada</td>
         <td bgcolor="#FFFFFF" id="divi"><?php $sql10 = "SELECT COUNT(*) FROM TICKET WHERE (subtipo='Factibilidad' AND resultado='Rechazada') AND fecha_creacion  BETWEEN '$fecha_1' AND '$fecha2'  ";
$resultado10 = mysql_query($sql10);

$select10=mysql_query("SELECT COUNT(*) FROM TICKET WHERE (subtipo='Factibilidad' AND resultado='Rechazada') AND fecha_creacion  BETWEEN '$fecha_1' AND '$fecha2'  ");
if (mysql_num_rows($select10)>0){
 $row10 = mysql_fetch_array($resultado10);
  echo "<center>".$row10[0]."</center>";  }
else {echo "";}?></td>
       </tr>
       <tr>
         <td  id="divi">TOTAL</td>
         <td  id="divi">
          <?php $sql10 = "SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' AND fecha_creacion  BETWEEN '$fecha_1' AND '$fecha2' ";
$resultado10 = mysql_query($sql10);

$select10=mysql_query("SELECT COUNT(*) FROM TICKET WHERE  subtipo='Factibilidad' AND fecha_creacion  BETWEEN '$fecha_1' AND '$fecha2'");
if (mysql_num_rows($select10)>0){
 $row10 = mysql_fetch_array($resultado10);
  echo "<center>".$row10[0]."</center>";  }
else {echo "";}?>
       </td>
       </tr>
     </table>&nbsp;</p>
    <p>
      <?php }?>
    </p>
  </div>
  <div id="foot">
 
    
  </div>
  <div id="derechos">Migna | Sistema Gestión de Clientes - Todos los derechos reservados &copy; <?php
echo date("Y");
?>  </div>
  
  
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "date", {format:"yyyy-mm-dd", validateOn:["change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "date", {format:"yyyy-mm-dd", validateOn:["change"]});
</script>
</body>
</html>
<?php
mysql_free_result($SG_Login_Usuario);
mysql_free_result($cliente);
mysql_free_result($bienvenido);
?>