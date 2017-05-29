<?php
include("../../system/config.php");
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

  $logoutGoTo = "../../index.php";
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

$MM_restrictGoTo = "../../index.php";
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


//=============================================================================================
//Interferencia
//=============================================================================================

$int_2013_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Interferencia' and fecha_creacion BETWEEN '2013-01-01 00:00:00' and '2013-12-31 00:00:00'");
$int_2014_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Interferencia' and fecha_creacion BETWEEN '2014-01-01 00:00:00' and '2014-12-31 00:00:00'");
$int_2015_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Interferencia' and fecha_creacion BETWEEN '2015-01-01 00:00:00' and '2015-12-31 00:00:00'");
$int_2016_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Interferencia' and fecha_creacion BETWEEN '2016-01-01 00:00:00' and '2016-12-31 00:00:00'");
$int_2017_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Interferencia' and fecha_creacion BETWEEN '2017-01-01 00:00:00' and '2017-12-31 00:00:00'");

$int_2013=mysql_num_rows($int_2013_sql);
$int_2014=mysql_num_rows($int_2014_sql);
$int_2015=mysql_num_rows($int_2015_sql);
$int_2016=mysql_num_rows($int_2016_sql);
$int_2017=mysql_num_rows($int_2017_sql);

//=============================================================================================
//Despaneo
//=============================================================================================

$des_2013_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Despaneo' and fecha_creacion BETWEEN '2013-01-01 00:00:00' and '2013-12-31 00:00:00'");
$des_2014_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Despaneo' and fecha_creacion BETWEEN '2014-01-01 00:00:00' and '2014-12-31 00:00:00'");
$des_2015_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Despaneo' and fecha_creacion BETWEEN '2015-01-01 00:00:00' and '2015-12-31 00:00:00'");
$des_2016_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Despaneo' and fecha_creacion BETWEEN '2016-01-01 00:00:00' and '2016-12-31 00:00:00'");
$des_2017_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Despaneo' and fecha_creacion BETWEEN '2017-01-01 00:00:00' and '2017-12-31 00:00:00'");

$des_2013=mysql_num_rows($des_2013_sql);
$des_2014=mysql_num_rows($des_2014_sql);
$des_2015=mysql_num_rows($des_2015_sql);
$des_2016=mysql_num_rows($des_2016_sql);
$des_2017=mysql_num_rows($des_2017_sql);

//=============================================================================================
//Red
//=============================================================================================

$desc_2013_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Desconfiguracion equipos' and fecha_creacion BETWEEN '2013-01-01 00:00:00' and '2013-12-31 00:00:00'");
$desc_2014_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Desconfiguracion equipos' and fecha_creacion BETWEEN '2014-01-01 00:00:00' and '2014-12-31 00:00:00'");
$desc_2015_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Desconfiguracion equipos' and fecha_creacion BETWEEN '2015-01-01 00:00:00' and '2015-12-31 00:00:00'");
$desc_2016_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Desconfiguracion equipos' and fecha_creacion BETWEEN '2016-01-01 00:00:00' and '2016-12-31 00:00:00'");
$desc_2017_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Desconfiguracion equipos' and fecha_creacion BETWEEN '2017-01-01 00:00:00' and '2017-12-31 00:00:00'");

$desc_2013=mysql_num_rows($desc_2013_sql);
$desc_2014=mysql_num_rows($desc_2014_sql);
$desc_2015=mysql_num_rows($desc_2015_sql);
$desc_2016=mysql_num_rows($desc_2016_sql);
$desc_2017=mysql_num_rows($desc_2017_sql);

//=============================================================================================
//Red
//=============================================================================================

$eq_2013_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Equipo cliente' and fecha_creacion BETWEEN '2013-01-01 00:00:00' and '2013-12-31 00:00:00'");
$eq_2014_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Equipo cliente' and fecha_creacion BETWEEN '2014-01-01 00:00:00' and '2014-12-31 00:00:00'");
$eq_2015_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Equipo cliente' and fecha_creacion BETWEEN '2015-01-01 00:00:00' and '2015-12-31 00:00:00'");
$eq_2016_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Equipo cliente' and fecha_creacion BETWEEN '2016-01-01 00:00:00' and '2016-12-31 00:00:00'");
$eq_2017_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Equipo cliente' and fecha_creacion BETWEEN '2017-01-01 00:00:00' and '2017-12-31 00:00:00'");

$eq_2013=mysql_num_rows($eq_2013_sql);
$eq_2014=mysql_num_rows($eq_2014_sql);
$eq_2015=mysql_num_rows($eq_2015_sql);
$eq_2016=mysql_num_rows($eq_2016_sql);
$eq_2017=mysql_num_rows($eq_2017_sql);


//=============================================================================================
//Red
//=============================================================================================

$eqd_2013_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Equipos desconectados' and fecha_creacion BETWEEN '2013-01-01 00:00:00' and '2013-12-31 00:00:00'");
$eqd_2014_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Equipos desconectados' and fecha_creacion BETWEEN '2014-01-01 00:00:00' and '2014-12-31 00:00:00'");
$eqd_2015_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Equipos desconectados' and fecha_creacion BETWEEN '2015-01-01 00:00:00' and '2015-12-31 00:00:00'");
$eqd_2016_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Equipos desconectados' and fecha_creacion BETWEEN '2016-01-01 00:00:00' and '2016-12-31 00:00:00'");
$eqd_2017_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Equipos desconectados' and fecha_creacion BETWEEN '2017-01-01 00:00:00' and '2017-12-31 00:00:00'");

$eqd_2013=mysql_num_rows($eqd_2013_sql);
$eqd_2014=mysql_num_rows($eqd_2014_sql);
$eqd_2015=mysql_num_rows($eqd_2015_sql);
$eqd_2016=mysql_num_rows($eqd_2016_sql);
$eqd_2017=mysql_num_rows($eqd_2017_sql);

//=============================================================================================
//Red
//=============================================================================================

$eqdp_2013_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Poco conocimiento' and fecha_creacion BETWEEN '2013-01-01 00:00:00' and '2013-12-31 00:00:00'");
$eqdp_2014_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Poco conocimiento' and fecha_creacion BETWEEN '2014-01-01 00:00:00' and '2014-12-31 00:00:00'");
$eqdp_2015_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Poco conocimiento' and fecha_creacion BETWEEN '2015-01-01 00:00:00' and '2015-12-31 00:00:00'");
$eqdp_2016_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Poco conocimiento' and fecha_creacion BETWEEN '2016-01-01 00:00:00' and '2016-12-31 00:00:00'");
$eqdp_2017_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Poco conocimiento' and fecha_creacion BETWEEN '2017-01-01 00:00:00' and '2017-12-31 00:00:00'");

$eqdp_2013=mysql_num_rows($eqdp_2013_sql);
$eqdp_2014=mysql_num_rows($eqdp_2014_sql);
$eqdp_2015=mysql_num_rows($eqdp_2015_sql);
$eqdp_2016=mysql_num_rows($eqdp_2016_sql);
$eqdp_2017=mysql_num_rows($eqdp_2017_sql);
//=============================================================================================
//Red
//=============================================================================================

$d_2013_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Desconocido' and fecha_creacion BETWEEN '2013-01-01 00:00:00' and '2013-12-31 00:00:00'");
$d_2014_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Desconocido' and fecha_creacion BETWEEN '2014-01-01 00:00:00' and '2014-12-31 00:00:00'");
$d_2015_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Desconocido' and fecha_creacion BETWEEN '2015-01-01 00:00:00' and '2015-12-31 00:00:00'");
$d_2016_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Desconocido' and fecha_creacion BETWEEN '2016-01-01 00:00:00' and '2016-12-31 00:00:00'");
$d_2017_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Desconocido' and fecha_creacion BETWEEN '2017-01-01 00:00:00' and '2017-12-31 00:00:00'");

$d_2013=mysql_num_rows($d_2013_sql);
$d_2014=mysql_num_rows($d_2014_sql);
$d_2015=mysql_num_rows($d_2015_sql);
$d_2016=mysql_num_rows($d_2016_sql);
$d_2017=mysql_num_rows($d_2017_sql);

//=============================================================================================
//Red
//=============================================================================================

$de_2013_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Desconfiguracion equipos' and fecha_creacion BETWEEN '2013-01-01 00:00:00' and '2013-12-31 00:00:00'");
$de_2014_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Desconfiguracion equipos' and fecha_creacion BETWEEN '2014-01-01 00:00:00' and '2014-12-31 00:00:00'");
$de_2015_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Desconfiguracion equipos' and fecha_creacion BETWEEN '2015-01-01 00:00:00' and '2015-12-31 00:00:00'");
$de_2016_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Desconfiguracion equipos' and fecha_creacion BETWEEN '2016-01-01 00:00:00' and '2016-12-31 00:00:00'");
$de_2017_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Desconfiguracion equipos' and fecha_creacion BETWEEN '2017-01-01 00:00:00' and '2017-12-31 00:00:00'");

$de_2013=mysql_num_rows($de_2013_sql);
$de_2014=mysql_num_rows($de_2014_sql);
$de_2015=mysql_num_rows($de_2015_sql);
$de_2016=mysql_num_rows($de_2016_sql);
$de_2017=mysql_num_rows($de_2017_sql);

//=============================================================================================
//Red
//=============================================================================================

$r_2013_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Reinicio de equipos' and fecha_creacion BETWEEN '2013-01-01 00:00:00' and '2013-12-31 00:00:00'");
$r_2014_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Reinicio de equipos' and fecha_creacion BETWEEN '2014-01-01 00:00:00' and '2014-12-31 00:00:00'");
$r_2015_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Reinicio de equipos' and fecha_creacion BETWEEN '2015-01-01 00:00:00' and '2015-12-31 00:00:00'");
$r_2016_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Reinicio de equipos' and fecha_creacion BETWEEN '2016-01-01 00:00:00' and '2016-12-31 00:00:00'");
$r_2017_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Reinicio de equipos' and fecha_creacion BETWEEN '2017-01-01 00:00:00' and '2017-12-31 00:00:00'");

$r_2013=mysql_num_rows($r_2013_sql);
$r_2014=mysql_num_rows($r_2014_sql);
$r_2015=mysql_num_rows($r_2015_sql);
$r_2016=mysql_num_rows($r_2016_sql);
$r_2017=mysql_num_rows($r_2017_sql);

//=============================================================================================
//Red
//=============================================================================================

$p_2013_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Problema Fisico Equipos' and fecha_creacion BETWEEN '2013-01-01 00:00:00' and '2013-12-31 00:00:00'");
$p_2014_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Problema Fisico Equipos' and fecha_creacion BETWEEN '2014-01-01 00:00:00' and '2014-12-31 00:00:00'");
$p_2015_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Problema Fisico Equipos' and fecha_creacion BETWEEN '2015-01-01 00:00:00' and '2015-12-31 00:00:00'");
$p_2016_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Problema Fisico Equipos' and fecha_creacion BETWEEN '2016-01-01 00:00:00' and '2016-12-31 00:00:00'");
$p_2017_sql=mysql_query("SELECT * FROM `TICKET` WHERE subtipo='Problema Fisico Equipos' and fecha_creacion BETWEEN '2017-01-01 00:00:00' and '2017-12-31 00:00:00'");

$p_2013=mysql_num_rows($p_2013_sql);
$p_2014=mysql_num_rows($p_2014_sql);
$p_2015=mysql_num_rows($p_2015_sql);
$p_2016=mysql_num_rows($p_2016_sql);
$p_2017=mysql_num_rows($p_2017_sql);

  


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="favicon.png" />
<link rel="stylesheet" type="text/css" href="../engine1/style.css" />
<link href="../../data/media/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../../jquery/css/ui-lightness/jquery-ui-1.10.4.custom.css">
<script src="../../data/media/js/jquery.js"></script>
<script src="../../data/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../../jquery/js/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript" src="../../jquery/js/jquery-ui-1.10.4.custom.min.js"></script>
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js" type="text/javascript"></script>
<script src="../../js/Indicadores/Indicadores.js" type="text/javascript"></script>
  
<title>Migna | Sistema Gestión de Clientes</title>
<?php include '../../include/estructura/title.php';?>
<link href="../../css/estilos.css" rel="stylesheet" type="text/css" />
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
<link href="../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #fff;
}
</style>
<script language="javascript">
$(document).ready(function() {
    $('#example').dataTable();
} );
</script>
</head>
<body bgcolor="#FFF">
  <div id="body">
    <div id="top">
      <div id="inc_logo"></div>
        <?php 
	      $nombre=$_SESSION['MM_Username'];
	      $bienvenido=mysql_query("SELECT * FROM usuarios WHERE usuario='$nombre'");
	      while($row=mysql_fetch_array($bienvenido))
        {
     	    $user7=$row['nombre'];
	      ?>
        <?php echo "<a href='#' class='Menu10'>Bienvenido  "." ".$row['nombre']." , </a>"?><a href="/migna/Avanzado/sistema/sistema.php" class="Menu10"> Inicio</a> | 
        <a href="<?php echo $logoutAction ?>" class="Menu10"> Salir </a>
        <?php
	      }
	      ?>
      </div>
<div id="Menu"> 
    <ul id="MenuBar1" class="MenuBarHorizontal">
      <li><a href="clientes/clientes.php" >Clientes</a></li>
      <li><a href="Factibilidades/factibilidades.php"> Ventas</a></li>
      <li><a href="Retiros/retiros.php"> Retiro</a></li>
      <li><a href="ticket/ticket.php">Ticket</a></li>
      <li><a href="radio planning/radio_planning.php">Radio </a></li>  
      <li><a href="inventario/inventario.php">Inventario</a></li>
      <li><a href="Indicadores/indicadores.php">Kpi</a></li>
      <li><a href="intranet/intranet1.php">Intranet</a></li>
      <li><a href="pppoe/index.php">PPPoE</a></li>
    </ul>
  </div>
<div id="resumen_general_index">
  <p><strong>Bienvenido al Sistema Gestión de Clientes Migna</strong></p>

    
    <center>
    
          
    <center><div id="instalaciones_todas">
      <div id="datos_com"><strong>Gráfico Histórico de Instalaciones : </strong>  </strong><br /><br />
</div><canvas id="myChart" width="400" height="400"></canvas></div></center>
    <div id="instalaciones_todas">
      <div id="datos_com"><strong>Tipificación de Gestiones Anuales</strong>  </strong><br /><br />
    </div>
      <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>  
                <th>Subtipo</th>
                <th>2013</th>
                <th>2014</th>
                <th>2015</th>
                <th>2016</th>
                <th>2017</th>
            </tr>
        </thead>
              <tr>
                <td><center>Interferencia</center></td>
                <td><center><?php echo $int_2013;?></center></td>
                <td><center><?php echo $int_2014;?></center></td>
                <td><center><?php echo $int_2015;?></center></td>
                <td><center><?php echo $int_2016;?></center></td>
                <td><center><?php echo $int_2017;?></center></td>

              </tr>
                <tr>
                <td><center>Despaneo</center></td>
                <td><center><?php echo $des_2013;?></center></td>
                <td><center><?php echo $des_2014;?></center></td>
                <td><center><?php echo $des_2015;?></center></td>
                <td><center><?php echo $des_2016;?></center></td>
                <td><center><?php echo $des_2017;?></center></td>
              </tr>
          
              <tr>
                <td><center>Red Interna Equipos de Cliente</center></td>
                <td><center><?php echo $eq_2013;?></center></td>
                <td><center><?php echo $eq_2014;?></center></td>
                <td><center><?php echo $eq_2015;?></center></td>
                <td><center><?php echo $eq_2016;?></center></td>
                <td><center><?php echo $eq_2017;?></center></td>
              </tr>
                <tr>
                <td><center>Red Interna Equipos Desconectados</center></td>
                <td><center><?php echo $eqd_2013;?></center></td>
                <td><center><?php echo $eqd_2014;?></center></td>
                <td><center><?php echo $eqd_2015;?></center></td>
                <td><center><?php echo $eqd_2016;?></center></td>
                <td><center><?php echo $eqd_2017;?></center></td>
              </tr>
               <tr>
                <td><center>Red Interna Poco Conocimiento</center></td>
                <td><center><?php echo $eqdp_2013;?></center></td>
                <td><center><?php echo $eqdp_2014;?></center></td>
                <td><center><?php echo $eqdp_2015;?></center></td>
                <td><center><?php echo $eqdp_2016;?></center></td>
                <td><center><?php echo $eqdp_2017;?></center></td>
              </tr>
                <tr>
                <td><center>Problemas Desconocidos</center></td>
                <td><center><?php echo $d_2013;?></center></td>
                <td><center><?php echo $d_2014;?></center></td>
                <td><center><?php echo $d_2015;?></center></td>
                <td><center><?php echo $d_2016;?></center></td>
                <td><center><?php echo $d_2017;?></center></td>
              </tr>
                <tr>
                <td><center>Desconfiguración de Equipos</center></td>
                <td><center><?php echo $de_2013;?></center></td>
                <td><center><?php echo $de_2014;?></center></td>
                <td><center><?php echo $de_2015;?></center></td>
                <td><center><?php echo $de_2016;?></center></td>
                <td><center><?php echo $de_2017;?></center></td>
              </tr>
              <tr>
                <td><center>Reinicio de equipos</center></td>
                <td><center><?php echo $r_2013;?></center></td>
                <td><center><?php echo $r_2014;?></center></td>
                <td><center><?php echo $r_2015;?></center></td>
                <td><center><?php echo $r_2016;?></center></td>
                <td><center><?php echo $r_2017;?></center></td>
              </tr>
                 <tr>
                <td><center>Problema Físico de Equipos (Daños)</center></td>
                <td><center><?php echo $p_2013;?></center></td>
                <td><center><?php echo $p_2014;?></center></td>
                <td><center><?php echo $p_2015;?></center></td>
                <td><center><?php echo $p_2016;?></center></td>
                <td><center><?php echo $p_2017;?></center></td>
              </tr>
          </tbody>
      </table>
        </div>
        </center>
  </div>
  <div>
    
 
      </div>
      </div>
      
    </div>
    
    <script type="text/javascript">
    var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});

    </script>
</body>
</html>
