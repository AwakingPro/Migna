<?php
include("../../../system/config.php");
include("../../../services2/config.php");

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
$cliente2=$_SESSION['MM_Username'];
$bienvenido=mysql_query("SELECT nombre FROM usuarios WHERE usuario='$cliente2'");
 $id_morosos=$_GET['id_morosos'];
 $cliente=$_GET['cliente'];
 $rut=$_GET['rut'];
 $id=$_GET['id'];
 $deuda=$_GET['deuda'];
 $factura=$_GET['factura'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Migna | Sistema Gestión de Clientes</title>

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
<script src="../../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
     <script src="../../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
  <script src="../../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
  <script type="text/javascript" src="../../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../../js/jquery-ui.min.js"></script>
<link href="../../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="../../../script/jquery.js"></script>
  <script type="text/javascript" src="../../../script/jquery.jCombo.min.js"></script>
  <script type='text/javascript' src='../../../javascript/jquery.autocomplete.js'></script>
  <script src="../../../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../../../javascript/jquery.autocomplete.css" />
<link href="../../../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../../../css/estilos2.css">

<script src="../../../data/media/js/jquery.js"></script>
<script src="../../../data/media/js/jquery.dataTables.js"></script>
<script src="../../../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../../../data/media/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../../../jquery/css/ui-lightness/jquery-ui-1.10.4.custom.css">
<script type="text/javascript" src="../../../jquery/js/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript" src=".././../jquery/js/jquery-ui-1.10.4.custom.min.js"></script>
<script src="../../../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>

<link rel="stylesheet" href="../../../css/estilos2.css">
<style type="text/css">
body {
	background-color: #FFF;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
<link href="../../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script language="javascript">
$(document).ready(function() {
    $('#example2').dataTable();
} );
$(document).ready(function() {
    $('#example3').dataTable();
} );
</script>
<script>

$(function() {
$( "#dialog" ).dialog();
});
</script>
  <script type="text/javascript">
$().ready(function() {
	$("#course").autocomplete("busqueda_razon.php", {
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
	$("#course1").autocomplete("busqueda_rut.php", {
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
	$("#course2").autocomplete("busqueda_ip.php", {
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


</head><body bgcolor="#F2F2F2">



<div id="body">
<div id="top"><div id="inc_logo"></div><?php 
	   $nombre=$_SESSION['MM_Username'];
	   $bienvenido=mysql_query("SELECT * FROM usuarios WHERE usuario='$nombre'");
	  
	  while($row=mysql_fetch_array($bienvenido)){
     	$user7=$row['nombre'];
	?>
	
     <?php echo "<a href='#' class='Menu10'>Bienvenido  "." ".$row['nombre']." , </a>"?><a href="/migna/Avanzado/sistema/sistema.php" class="Menu10"> Inicio</a> | 
  <a href="<?php echo $logoutAction ?>
" class="Menu10"> Salir </a>
  <?php
	  }
	  ?></div>


<div id="Menu"> 
    <ul id="MenuBar1" class="MenuBarHorizontal">
      <li><a href="clientes.php" id="supermenu" >Clientes</a></li>
      <li><a href="../Factibilidades/factibilidades.php"> Ventas</a></li>
      <li><a href="../Retiros/retiros.php"> Retiro</a></li>
      <li><a href="../ticket/ticket.php">Ticket</a></li>
      
      <li><a href="../radio planning/radio_planning.php">Radio </a></li>
      
<li><a href="../inventario/inventario.php">Inventario</a></li>
      <li><a href="../Indicadores/indicadores.php">Kpi</a></li>
      <li><a href="../intranet/intranet1.php">Intranet</a></li>
      <li><a href="../pppoe/index.php">PPPoE</a></li>
    </ul>
  </div>
 <?php include '../../../include/estructura/submenu_clientes_busqueda.php';?>
  <div id="busqueda_clientes">
    <div id="datos_com"><strong> Nueva Acción</strong><br /></div>
    <form action="accion1.php" method="POST">
      <table width="746" border="0">
        <tr>
          <td width="185">Nombre</td>
          <td width="551"><label for="cliente"></label>
          <input name="cliente" type="text" readonly="readonly" class="formularioBuscar" id="cliente" value="<?php echo $cliente;?>" /></td>
        </tr>
        <tr>
          <td>Rut</td>
          <td><label for="rut"></label>
          <input name="rut" type="text" readonly="readonly" class="formularioBuscar" id="rut" value="<?php echo $rut;?>"/></td>
        </tr>
        <tr>
          <td>Nº Factura</td>
          <td><input name="factura" type="text" readonly="readonly" class="formularioBuscar" id="rut2" value="<?php echo $factura;?>"/></td>
        </tr>
        <tr>
          <td>Deuda</td>
          <td><input name="rut3" type="text" readonly="readonly" class="formularioBuscar" id="rut3" value="<?php echo $deuda;?>"/></td>
        </tr>
        <tr>
          <td>Accion</td>
          <td><label for="accion"></label>
            <select name="accion" class="formularioBuscar" id="accion">
            <option value='Pendiente'>Pendiente</option>
            <option value='Activar'>Activar</option>
          </select></td>
        </tr>
        <tr>
          <td>Monto Cancelado</td>
          <td><span id="sprytextfield1">
          <label for="monto"></label>
          <input name="monto" type="text" class="formularioBuscar" id="monto" placeholder="37000" />
          <span class="textfieldRequiredMsg">X</span><span class="textfieldInvalidFormatMsg">X</span></span></td>
        </tr>
        <tr>
          <td>Tipo Documento</td>
          <td><select name="documento" class="formularioBuscar" id="accion2">
            <option value='Efectivo'>Efectivo</option>
            <option value='Transferencia'>Transferencia</option>
            <option value='Desposito con Cheque'>Deposito con Cheque</option>
            <option value='Cheque a Fecha'>Cheque a Fecha</option>
            <option value='Vale Vista'>Vale Vista</option>
                        <option value='PAC'>PAC</option>

          </select></td>
        </tr>
        <tr>
          <td>Fecha</td>
          <td><span id="sprytextfield2">
          <label for="fecha"></label>
          <input name="fecha" type="text" class="formularioBuscar" id="fecha" placeholder="03-03-2016"/>
          <span class="textfieldRequiredMsg">X</span><span class="textfieldInvalidFormatMsg">X</span></span></td>
        </tr>
        <tr>
          <td>Hora</td>
          <td><span id="sprytextfield3">
          <label for="hora"></label>
          <input name="hora" type="text" class="formularioBuscar" id="hora" placeholder="17:30"/>
          <span class="textfieldRequiredMsg">X</span><span class="textfieldMinCharsMsg">X</span><span class="textfieldMaxCharsMsg">X</span><span class="textfieldInvalidFormatMsg">X</span></span></td>
        </tr>
        <tr>
          <td>Comentario Adicional</td>
          <td><label for="comentario"></label>
          <textarea name="comentario" cols="45" rows="5" class="formularioBuscar" id="comentario"></textarea></td>
        </tr>
        <tr>
          <td>     <input type='hidden' value="<?php echo $id;?>" name='id' />
          <input type='hidden' value="<?php echo $user7;?>" name='usuario_sistema' /></td>
          <td><input name="Ejecutar" type="submit" class="boton_intranet" id="Ejecutar" value="Ejecutar" /></td>
        </tr>
      </table>
 
    </form>
      <br />
  </div>
</div> 
</div>

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer", {validateOn:["change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "date", {format:"dd-mm-yyyy", validateOn:["change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "time", {validateOn:["change"]});
</script>
</body>
</html>
