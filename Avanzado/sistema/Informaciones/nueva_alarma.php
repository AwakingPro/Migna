<?php
include("../../../system/config.php");
include("../../../services/config.php");

$cliente= $_GET["cliente"];
$sql_tipo=mysql_query("SELECT tipo FROM TICKET_tipo ORDER BY tipo ASC");
$sql_departamento=mysql_query("SELECT departamento FROM TICKET_departamento ORDER BY departamento ASC");
$sql_origen=mysql_query("SELECT origen FROM TICKET_origen ORDER BY origen ASC");
$sql_prioridad=mysql_query("SELECT prioridad FROM TICKET_prioridad ");
$sql_cliente=mysql_query("SELECT cliente FROM SP_soporte_crear_cliente ORDER BY cliente ASC");

$sql_status=mysql_query("SELECT status FROM TICKET_status ");
$sql_hora=mysql_query("SELECT hora FROM TICKET_hora ");
$sql_responsable=mysql_query("SELECT nombre FROM usuarios ORDER BY nombre ASC");
$fecha=date("Y-m-d H:i:s");
$fecha_actualizacion=date("Y-m-d H:i:s");
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
$creador=$_SESSION['MM_Username'];

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
       <li><a href="../clientes/clientes.php">Clientes</a>       </li>
       <li><a href="../inventario/inventario.php" c>Inventario</a></li>
       <li class="Form"><a href="../ticket/ticket.php">Ticket</a>       </li>
<li><a href="informaciones.php"class="formulariochicoCopia" id="supermenu" >Informaciones</a></li>
       <li><a href="../radio planning/radio_planning.php">Radio Planning</a></li>
       <li><a href="../Indicadores/indicadores.php" >Indicadores</a></li>
</ul>
  </div>
   <div id="contacto_1"><table width="382" height="24" border="0">
  <tr>
    <td width="106" height="15" class="Sub_menu"><a href="informaciones.php" class="Menu">Informaciones</a></td>
    <td width="106" class="Sub_menu"><a href="nueva_alarma.php" class="Menu" id="ok">Nueva Alarma</a></td>
    <td width="95" class="Sub_menu"><a href="ticket_abiertos.php" class="Menu">Alarmas
      <?php $sql = "SELECT COUNT(*) FROM INFO_alarmas WHERE status='Abierto' ";
$resultado = mysql_query($sql);

$select=mysql_query("SELECT * FROM INFO_alarmas WHERE status='Abierto' ");
if (mysql_num_rows($select)>0){
 $row = mysql_fetch_array($resultado);
 $cuenta=$row[0];
 if ($cuenta>30){
 echo "("; echo '+30'; echo ")"; }
else {echo '('.$cuenta.')';}
}
?>
    </a></td>
    </tr>
</table></div>
  <div id="ticket">
    <p><strong>Nueva Alarma</strong>    
    <form method="post" action="info_comprobacion_nuevo_alarma.php"  ><table width="900" border="0">
  <tr>
    <td width="100">Asignar a </td>
    <td width="18">:</td>
    <td colspan="2"><select name="responsable" class="formulariochico"  >
      
      <?php while($row = mysql_fetch_array($sql_responsable)){ ?>
      <option value="<?php echo $row['nombre']; ?>" size="30"><?php echo $row['nombre']; ?></option>
      <?php } ?>
      </select></td>
  </tr>
  <tr>
    <td>Estado </td>
    <td>:</td>
    <td colspan="2"><select name="status" class="formulariochico"  >

      <?php while($row = mysql_fetch_array($sql_status)){ ?>
      <option value="<?php echo $row['status']; ?>" size="30"><?php echo $row['status']; ?></option>
      <?php } ?>
    </select></td>
    </tr><input name="fecha_creacion" type="hidden" class="EDITARCopia" value="<?php echo $fecha;?>" size="20"/>
  <tr><?php $creador2=mysql_query("SELECT nombre FROM usuarios WHERE usuario='$creador'");
while($row = mysql_fetch_array($creador2)){

?>
 
    <input name="creador" type="hidden" class="EDITARCopia" value="<?php echo $row['nombre']; ?>" size="20"/>
       <?php } ?>
    <td>Comentario </td>
    <td>:</td>
    <td colspan="2" rowspan="3"><span class="formulario" id="sprytextarea1">
    <label for="comentario"></label>
    <textarea name="comentario" cols="45" rows="5" class="formulario" id="comentario2"></textarea>
    </span></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <input name="fecha_creacion" type="hidden" class="EDITARCopia" value="<?php echo $fecha;?>" size="20"/>
 
<?php 

?>
 
       
  <tr>
    <td><input name="btn_submit" type="submit" class="formulariochico" value="Crear Alarma" /></td>
    <td>&nbsp;</td>
    <td width="360">
      
      
        <input name="btn_submit2" type="reset" value="Limpiar  Datos" class="formulariochico" />
   </td>
    <td width="437">&nbsp;</td>
    </tr>
</table></form></p>
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