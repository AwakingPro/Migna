<?php

include("../../../system/config.php");
include("../../../services/config.php");
$id_filter=$_GET['id_filter'];
$cliente = $_GET["cliente"];
$mes=$_GET['mes'];
$anios=$_GET['anios'];
$fecha_1=$anios.'-'.$mes.'-01'.' '.'00:00:00';
$fecha_2=$anios.'-'.$mes.'-31'.' '.'00:00:00';
$fecha1=$anios.'-01-01'.' '.'00:00:00';
$fecha2=$anios.'-12-31'.' '.'00:00:00';
$fecha_inicial=$anios.'-01-01';
$fecha_termino=$anios.'-12-31';





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
<script src="../../../data/media/js/jquery.js"></script>
<script src="../../../data/media/js/jquery.dataTables.js"></script>
<link href="../../../data/media/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
<script language="javascript">
$(document).ready(function() {
    $('#example').dataTable();
} );
</script>
<script language="javascript">
$(document).ready(function() {
    $('#example2').dataTable();
} );
</script>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
	color: #333;
}
</style>
</head>

<body>
<div id="top"></div>
<div id="body">
 <?php include '../../../include/estructura/banner.php';?>

 <?php include '../../../include/estructura/menu_indicadores.php';?>
 <?php include '../../../include/estructura/submenu_indicadores_instalaciones.php';?>
 
      
      <?php if ($id_filter==2){?>
  <div id="datos_com"><strong>Grafico Instalaciones :<?php  echo $anios;?></strong>  <br /><br />
 
 </div>

      <img src="plot_instalaciones.php" width="931" height="401" /> 
    
      <?php }?>
 
   
</div>
<div id="datos_com"><strong>Detalle de Instalaciones : </strong></strong>  <br /><br />
 
</div>
<div id="cont_inst">

 <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
               
              
                <th>Cliente</th>
                <th>Plan</th>
                <th>Velocidad</th>
                <th>Contrato</th>
                <th>IP Trabajo</th>
                <th>IP SU</th>
                <th>Fecha Instalación</th>
                <th>Ver Detalle</th>


 
            </tr>
        </thead>
 
   
         <tr>
        <?php 
		
		
		$ticket=mysql_query("SELECT * FROM SP_dato_cliente WHERE fecha_inst BETWEEN '$fecha_inicial' and '$fecha_termino' order by contrato ASC ");

while ($row = mysql_fetch_row($ticket)){?>
                          <td><?php $rut=$row[2]; $cliente=$row[1]; echo $cliente;?></td>
                          <td><?php $alias=$row[27]; echo $row[12];?></td>

                          <td><?php echo $row[14];?></td>
                          <td><?php echo $row[4];?></td>
                          <td><?php echo $row[31];?></td>
                          <td><?php echo $row[20];?></td>
                          <td><?php 
						  
						  $f1=date("d-m-Y",strtotime($row[10]));
 
						  echo $f1;?></td>
                          <td><center>
                            <a href="../clientes/cliente_comprobacion3.php?cliente=<?php echo $cliente;?>&amp;alias=<?php echo $alias;?>&amp;rut=<?php echo $rut;?>"><img src="../../../imagenes/lupa.png" width="17" height="17" /></a>
                          </center></td>

        </tr><?php } ?> </tbody>
</table>
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
