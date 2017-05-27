<?php
include("../../../system/config.php");
include("../../../services/config.php");

$serial= $_GET["serial"];
$mac= $_GET["mac"];
$tipo= $_GET["tipo"];
$marca= $_GET["marca"];
$modelo= $_GET["modelo"];
$proveedor= $_GET["proveedor"];
$bodega= $_GET["bodega"];
  

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
<?php include '../../../include/estructura/title.php';?>
<?php include '../../../include/estructura/bordes.php';?>
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
 <script type="text/javascript" src="../../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../../js/jquery-ui.min.js"></script>
<link href="../../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="../../../script/jquery.js"></script>
  <script type="text/javascript" src="../../../script/jquery.jCombo.min.js"></script>
  <script type='text/javascript' src='../../../javascript/jquery.autocomplete.js'></script>
  <script src="../../../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../../../javascript/jquery.autocomplete.css" />
<link href="../../../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="../../../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
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
 <?php include '../../../include/estructura/banner.php';?>

 <?php include '../../../include/estructura/menu_inventario.php';?>
 <?php include '../../../include/estructura/submenu_inventario_buscar_activos.php';?>
 
  
  <div id="inventario_seleccione_activos">
  </br>
    <div id="titulo_ticket_abiertos_left">Resultado Busqueda :</div>
    <p>
    <p><?php
$sql_abiertos2=mysql_query("SELECT serial,mac,tipo,marca,modelo,proveedor,bodega FROM INV_activos WHERE serial='$serial' or mac='$mac' or tipo='$tipo' or marca='$marca' or modelo='$modelo' or proveedor='$proveedor' or bodega='$bodega' ORDER BY bodega ASC");


 if (mysql_num_rows($sql_abiertos2)>0)
{




echo "<table  border = '0' bordercolor = 'silver'  class='Tablas2' cellspacing = '0' cellpadding='0'> \n";
echo "<tr> \n";
echo "<td bgcolor='#C9101A'><font color='#FFFFFF'>Serial</center></td> \n";
echo "<td bgcolor='#C9101A'><font color='#FFFFFF'>Mac</td> \n";
echo "<td bgcolor='#C9101A'><font color='#FFFFFF'>Tipo</td> \n";
echo "<td bgcolor='#C9101A'><font color='#FFFFFF'>Marca</font></td> \n";
echo "<td bgcolor='#C9101A'><font color='#FFFFFF'>Modelo</td> \n";

echo "<td bgcolor='#C9101A'><font color='#FFFFFF'><center>Editar</center></td> \n";
echo "<td bgcolor='#C9101A'><font color='#FFFFFF'><center>Eliminar</center></td> \n";


echo "</tr> \n";
while ($row = mysql_fetch_row($sql_abiertos2)){
echo "<tr> \n";
echo "<td><div id='divi'>$row[0]</div></td> \n";
echo "<td><div id='divi'>$row[1]</div></td> \n";
echo "<td><div id='divi'>$row[2]</div></td> \n";
echo "<td><div id='divi'>$row[3]</div></td> \n";
echo "<td><div id='divi'>$row[4]</div></td> \n";

echo "<td><div id='divi'><a  href='inventario_comprobacion_editar_activos.php?mac=$row[1]&serial=$row[0]'><center><img src='../../../imagenes/editar.jpg'></a></div></center></td> \n";
echo "<td><div id='divi'><a   href='comprobacion_eliminar5.php?mac=$row[1]&serial=$row[0]'><center><img src='../../../imagenes/eliminar.png'></a></div></center></td> \n";

}
echo "</table></center> \n";
}
else {
	echo "No hay Registros";
	
	}
?>

<?php
   $id=$_GET['id'];
   $id2=$_GET['mac'];
   $id3=$_GET['serial'];
   if ($id==1){
	   echo "<div id='dialog' title='Eliminar Registro'><center>Esta Seguro que desea eliminar este registro : "." ".$id2." "."</br>
	   <a  name='link' href='comprobacion_eliminado5.php?serial=$id3&mac=$id2&ide=1' >SI</a>"." &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp        "."<a  name='link' href='comprobacion_eliminado5.php?serial=$id3&mac=$id2' >NO</a>
	   </center></div>
	   ";
	   
	   
	   }
	   else if ($id==3){
		   echo "<div id='dialog' title='Eliminar Registro'><center>Registro Eliminado Exitosamente!
	   </center></div>
	   ";
		   
		   }
		   else if ($id==10){
		   echo "<div id='dialog' title='Error'><center>No se puede eliminar el activo, ya que esta registrado en algun cliente del sistema, o radio planning, Favor elimine el registro antes de eliminar el Activo.
	   </center></div>
	   ";
		   
		   }
   
   ?>


</div>

<?php include '../../../include/estructura/foot.php';?>
  
 </div> 
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