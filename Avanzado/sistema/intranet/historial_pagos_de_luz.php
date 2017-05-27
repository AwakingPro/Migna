<?php
include("../../../system/config.php");
include("../../../services/config.php");

$estacion= $_GET["estacion"];

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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="favicon.png" />
<link rel="stylesheet" type="text/css" href="../engine1/style.css" />
	<script type="text/javascript" src="../engine1/jquery.js"></script>
	<script src="../../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<title>Migna | Sistema Gestión de Clientes</title>
<?php include '../../../include/estructura/title.php';?>
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
  <script type="text/javascript" src="../../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../../js/jquery-ui.min.js"></script>
<script type="text/javascript" src="../../../jquery/js/jquery-1.10.2"></script>
<link rel="stylesheet" href="../../../css/estilos2.css">
<style type="text/css">
body {
	background-color: #333333;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>

<script src="../../../data/media/js/jquery.js"></script>
<script src="../../../data/media/js/jquery.dataTables.js"></script>
<script src="../../../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../../../data/media/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../../../jquery/css/ui-lightness/jquery-ui-1.10.4.custom.css">
<script type="text/javascript" src="../../../jquery/js/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript" src=".././../jquery/js/jquery-ui-1.10.4.custom.min.js"></script>
<script language="javascript">
$(document).ready(function() {
    $('#example').dataTable();
} );
</script>
<script>
$(function() {
$( "#dialog" ).dialog();
});
</script>
</head>

<body>
<div id="body">
<div id="top"><?php 
	   $nombre=$_SESSION['MM_Username'];
	   $bienvenido=mysql_query("SELECT * FROM usuarios WHERE usuario='$nombre'");
	  
	  while($row=mysql_fetch_array($bienvenido)){
     	
	?>
	
     <?php echo "Bienvenido , "." ".$row['nombre']." | "?><a href="/../Avanzado/sistema/sistema.php" class="Menu10"> Inicio</a> | 
  <a href="<?php echo $logoutAction ?>
" class="Menu10"> Salir </a>
      <?php
	  }
	  ?></div>
 <div id="inc_banner">
  <div id="inc_logo"></div>
 </div>

 <?php include '../../../include/estructura/menu_intranet.php';?>
  <?php include '../../../include/estructura/submenu_intranet_luz.php';?>

  
  
  
  
 <div id="cliente2">
 </br>
 </div>
 <div id="busqueda_clientes">

<div id="datos_com"><strong>Historial de Pagos de Luz</strong>  <br />
 </div>
      
  
  <div id="ticket_resultado3">
    <table id="example" class="display" cellspacing="0" width="100%">
      <thead>
            <tr>
               

                <th>Nombre del Registro</th>
                <th><center>Monto Cancelado</center></th>
                <th><center>KW</center></th>
                <th><center>Fecha Pago </center></th>
                <th><center>+ Info</center></th>
                <th><center>Editar</center></th>
                <th><center>Eliminar</center></th>
         

            </tr>
        </thead>
 
   
         <tr>
        <?php $ticket=mysql_query("SELECT * FROM historial_pagos WHERE estacion='$estacion' ORDER BY id ASC");

while ($row = mysql_fetch_row($ticket)){
	$f1=date("d-m-Y",strtotime($row[4]));

	
	$fecha_ticket_old=$row[8];
	list($fecha_ticket2, $hora_ticket) = explode(" ", $fecha_ticket_old);
	$fecha_ticket=date("d-m-Y",strtotime($fecha_ticket2));

	$id=$row[0];
	?>                          <td><?php echo $row[1];?></td>

                          <td><center><?php echo $row[2];?></center></td>
                       <td><center><?php echo $row[3];?></center></td>

            <td><center><?php echo $f1;?></center></td>
     
<td><center>
             <a href="comprobacion_historial_ver_pago.php?id_pago=<?php echo $row[0]; ?>"><img src='../../../imagenes/ver.png' /></a>
           </center></td>
          
           <td><center>
             <a href="comprobacion_editar_historial_pago.php?id_pago=<?php echo $row[0]; ?>"><img src='../../../imagenes/editar.png' /></a>
           </center></td>
            <td><center>
             <a   

href='comprobacion_eliminar_historial_pago.php?id_pago=<?php echo $row[0]; ?>&estacion=<?php echo $estacion; ?>'>
<img src='../../../imagenes/eliminar.png' /></a>
           </center></td>

      </tr><?php } ?> </tbody>
  </table>
	  
	  
      </p>
   
    <?php
 
   $id=$_GET['id'];
   $id_pago=$_GET['id_pago'];
   if ($id==1){
	   echo "<div id='dialog' title='Eliminar Registro'><P>Esta Seguro que desea eliminar el Registro Seleccionado? ".""." "."</br>
	   <center><form method='GET' 
	   
	   action='comprobacion_eliminado_historial_pago.php'>
	   <input type='hidden' name='id_pago' value='$id_pago'>	   
		   	   <input type='hidden' name='estacion' value='$estacion'>

	   <input type='submit' class='formulariosuperchico'  value='Si' name='Si'>"." &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp        "."<input type='submit'  value='No' class='formulariosuperchico'  name='No'></form></center>
	   </div>
	   ";
	   
	   
	   }
	   else if ($id==3){
		   echo "<div id='dialog' title='Registro Actualizado'><center><p>Se ha actualizado Registro.
		   <br><br><br>
		   <form action='header.php' method='post'>
		   	   <input type='hidden' name='id_header' value='4'>
		   	   
		   	   <input type='hidden' name='estacion' value='$estacion'>

	   <input type='submit' value='cerrar'>
	   </form>
	   </center></div>
	   ";
		   
		   }
    else if ($id==4){
		   echo "<div id='dialog' title='Aviso Eliminado'><center><P>Registro eliminado exitosamente!
	   </center></div>
	   ";
		   
		   }
		   else if ($id==5){
		   echo "<div id='dialog' title='Aviso Creado'><center><P>Registro de Pago Creado Exitosamente!
	   </center></div>
	   ";}
   ?>
  </div>
<center>
</center>
  <br />
  <br />
</div>
  </div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
<div id="foot">Migna | Sistema Gestión de Clientes - Todos los derechos reservados &copy; <?php
echo date("Y"); ?></div>
</body>
</html>
