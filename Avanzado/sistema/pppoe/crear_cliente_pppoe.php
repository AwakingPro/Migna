<?php
include("../../../system/config.php");
include("../../../services/config.php");

if (!isset($_SESSION)) {
  session_start();
}

$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
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

function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) {
  $isValid = False;

  if (!empty($UserName)) {
  
    $arrUsers = Explode(",", $strUsers);
    $arrGroups = Explode(",", $strGroups);
    if (in_array($UserName, $arrUsers)) {
      $isValid = true;
    }
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
<link rel="stylesheet" href="../../../jquery/css/ui-lightness/jquery-ui-1.10.4.custom.css">
<script type="text/javascript" src="../../../jquery/js/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript" src=".././../jquery/js/jquery-ui-1.10.4.custom.min.js"></script>
  <script type="text/javascript" src="../../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../../js/jquery-ui.min.js"></script>
    <script type='text/javascript' src='../../../javascript/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../../../javascript/jquery.autocomplete.css" />
  <link href="../../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
  <link href="../../../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
  <script src="../../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
  <script type="text/javascript" src="../../../script/jquery.js"></script>
  <script type="text/javascript" src="../../../script/jquery.jCombo.min.js"></script>
    <script src="../../../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
    <script src="../../../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="../../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../../../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="../../../css/estilos2.css">
<style type="text/css">
body {
	background-color: #333;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
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
<div id="top"><?php 
	   $nombre=$_SESSION['MM_Username'];
	   $bienvenido=mysql_query("SELECT * FROM usuarios WHERE usuario='$nombre'");
	  
	  while($row=mysql_fetch_array($bienvenido)){
     	
	?>
	
     <?php echo "Bienvenido , "." ".$row['nombre']." | "?><a href="/migna/Avanzado/sistema/sistema.php" class="Menu10"> Inicio</a> | 
  <a href="<?php echo $logoutAction ?>
" class="Menu10"> Salir </a>
  <?php
	  }
	  ?></div>
 <div id="inc_banner">
  <div id="inc_logo"></div>
 </div>


<div id="Menu"> 
    <ul id="MenuBar1" class="MenuBarHorizontal">
      <li><a href="../clientes/clientes.php" >Clientes</a></li>
      <li><a href="../Factibilidades/factibilidades.php"> Factibilidad</a></li>
      <li><a href="../Retiros/retiros.php"> Retiro</a></li>
      <li><a href="../ticket/ticket.php">Ticket</a></li>
      
      <li><a href="../radio planning/radio_planning.php">Radio </a></li>
      
<li><a href="../inventario/inventario.php">Inventario</a></li>
      <li><a href="../Indicadores/indicadores.php">Kpi</a></li>
      <li><a href="../intranet/intranet1.php">Intranet</a></li>
      <li><a href="index.php" id="supermenu">PPPoE</a></li>
    </ul>
  </div>
 <?php include '../../../include/estructura/submenu_clientes_busqueda_pppoe_crear.php';?>


  <div id="busqueda_clientes">
    <div id="datos_com"><strong>Paso 1 : Seleccionar Cliente</strong>  <br />
      <br />
 </div>

 <p class="Nota">Nota : Escriba las iniciales o coincidencia de caractéres en el campo de búsqueda.</p>



    <FORM name=tuformulario autocomplete="off" ACTION="comprobacion_crear_cliente_pppoe.php" METHOD="POST">
      <table width="1012" border="0">
  <tr>
    <td width="151" class="iconos_top"> Seleccione Cliente :</td>
    <td width="851"><input name="cliente" type="text" class="formulario_grande_intranet" id="course" size="60" />
       <!--input type="button" value="Get Value" /-->
       <input name="Enviar" type="submit" class="boton_intranet" value="      Seleccione Cliente      " /></td>
  </tr>
  <tr>
    <td height="18" class="LINK">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
  </FORM>
   
    

    <?php 
	
	$id=$_GET['id'];
	if (empty($id)){}
	if ($id==1){
		
		echo "<div id='dialog' title='Error'><center><p>Cliente no registra Datos Técnicos en el Sistema .<br><br><br>
		   <form action='header.php' method='post'>
		   	   <input type='hidden' name='id_header' value='1'>
		   	   
	   <input type='submit' value='cerrar'>
	   </form></center></div>";
		
		}
		if ($id==20){
		
		echo "<div id='dialog' title='Dato Técnico'><p>Registro Eliminado exitosamente!</div>";
		
		}
		if ($id==6){
		
		echo "<div id='dialog' title='Error de Sistema'><p>Error 606!</div>";
		
		}
	
	?>
  </div>
</div> 
</div>
<div id="foot">Migna | Sistema Gestión de Clientes - Todos los derechos reservados &copy; <?php
echo date("Y"); ?></div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
