<?php
include("../../../system/config.php");
include("../../../services/config.php");



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
<link rel="icon" type="image/png" href="../favicon.png" />
<link rel="stylesheet" type="text/css" href="../../engine1/style.css" />
	<script type="text/javascript" src="../../engine1/jquery.js"></script>
	<script src="../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
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
<link href="../../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div id="top"></div>
 <div id="body">
 <?php include '../../../include/estructura/banner.php';?>

 <?php include '../../../include/estructura/menu_intranet.php';?>
  <?php include '../../../include/estructura/submenu_intranet.php';?>

  
  
  
  
 <div id="cliente2">
 </br>
<a href="ingresar_manual.php"><input type="button" name="agregar" value="Crear Procedimiento" class="boton" OnClick="ingresar_manual.php"> </a>
 </div>

      
  
  <div id="ticket_resultado3">
    <p>&nbsp;</p>
   
      <p >
	  
	  <?php

  $sql_abiertos2=mysql_query("SELECT * FROM SIS_manual ");

 if (mysql_num_rows($sql_abiertos2)>0)
{



echo "Manuales :";

echo "<table  border = '0' bordercolor = 'silver' height='3'  class='Tablas2' cellspacing = '0' cellpadding='0'> \n";

echo "<tr> \n";

echo "<td bgcolor='#C9101A'><font color='#FFFFFF'>Fecha</center></td> \n";

echo "<td bgcolor='#C9101A'><font color='#FFFFFF'>Nombre	</td> \n";

echo "<td bgcolor='#C9101A'><font color='#FFFFFF'>Nombre archivo	</td> \n";


echo "<td bgcolor='#C9101A'><font color='#FFFFFF'><center>Editar</center></td> \n";

echo "<td bgcolor='#C9101A'><font color='#FFFFFF'><center>Eliminar</center></td> \n";


echo "</tr> \n";
while ($row = mysql_fetch_row($sql_abiertos2)){
echo "<tr> \n";
echo "<td><div id='divi'>$row[2]</div></td> \n";
echo "<td><div id='divi'>$row[3]</div></td> \n";
echo "<td><div id='divi'>$row[1]</div></td> \n";
echo "<td><div id='divi'>
<a href='comprobacion_pdf_manual.php?proc=$row[3]'><center><img src='../../../imagenes/pdf1.png'</a></div></center></td> \n";

echo "<td><div id='divi'><a   

href='comprobacion_eliminado_proc.php?proc=$row[1]&numero=$row[13]&ticket_filter=$ticket_filter'><center>
<img src='../../../imagenes/eliminar.png'</a></div></center></td> \n";




}
echo "</table></center> \n";
echo "<p>";

$sql = "SELECT COUNT(*) FROM SIS_manual  ";
$resultado = mysql_query($sql);

$select=mysql_query("SELECT * FROM SIS_manual ");
if (mysql_num_rows($select)>0){
 $row = mysql_fetch_array($resultado);
 echo "Cantidad de Registros = ".$row[0]; }
else {echo "";}


}
else {
	echo "No tienes Procedimientos  que coincidan con el Filtro de Busqueda.";			
	
	
	}
		  
		  
		  
		  
	?>
	  
      </p>
   
    <?php
   $id=$_GET['id_manual'];
   $id2=$_GET['fecha_actualizacion'];
   $id3=$_GET['proc'];
   if ($id==1){
	   echo "<div id='dialog' title='Eliminar Procedimiento'>Esta Seguro que desea eliminar el Procedimiento  : "."#".$id3." "."</br>
	   <center><form method='GET' 
	   
	   action='comprobacion_eliminado_proc.php'>
	   <input type='hidden' name='proc' value='$id3'>
	   <input type='hidden' name='fecha_actualizacion' value='$id2'>
	   	   <input type='hidden' name='ticket_filter' value='$ticket_filter'>

	   
	   <input type='submit' class='formulariosuperchico'  value='Si' name='Si'>"." &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp        "."<input type='submit'  value='No' class='formulariosuperchico'  name='No'></form></center>
	   </div>
	   ";
	   
	   
	   }
	   else if ($id==3){
		   echo "<div id='dialog' title='Procedimiento Eliminado'><center>Registro Eliminado Exitosamente!
	   </center></div>
	   ";
		   
		   }
   
   ?>
  </div>

  <?php include '../../../include/estructura/foot.php';?>
  
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