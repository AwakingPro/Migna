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
  <script type="text/javascript" src="../../../script/jquery.js"></script>
  <script type="text/javascript" src="../../../script/jquery.jCombo.min.js"></script>
  <script type='text/javascript' src='../../../javascript/jquery.autocomplete.js'></script>
  <script src="../../../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../../../javascript/jquery.autocomplete.css" />
<link href="../../../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="top"></div>
<div id="body">
 <?php include '../../../include/estructura/banner.php';?>

 <?php include '../../../include/estructura/menu_indicadores.php';?>
 <?php include '../../../include/estructura/submenu_indicadores_retiros.php';?>


      <?php if ($id_filter==1){?>
      <div id="informe"></div>

    <div id='auto3'>
     <div id="auto_left3">
     <p>Resultado de Búsqueda :     </p>
     <table width="400" border="0" align="left" cellpadding="0" cellspacing="0" >
       <tr class="Tablas">
         <td width="340" > Detalle de las Instalaciones realizadas</td>
         <td width="60" ><center>Cantidad</center></td>
      </tr>
       <tr>
         <td id="divi" >Cambio de Domicilio</td>
         <td id="divi">
         
         
         
          <?php $sql10 = "SELECT COUNT(*) FROM SP_dato_cliente WHERE (estado='Retiro Solicitado' or estado='Retirado') AND motivo='Cambio Domicilio'  AND fecha_sol  BETWEEN '$fecha_1' AND '$fecha_2'  ";
$resultado10 = mysql_query($sql10);

$select10=mysql_query("SELECT COUNT(*) FROM SP_dato_cliente WHERE (estado='Retiro Solicitado' or estado='Retirado') AND motivo='Cambio Domicilio'  AND fecha_sol  BETWEEN '$fecha_1' AND '$fecha_2'  ");
if (mysql_num_rows($select10)>0){
 $row10 = mysql_fetch_array($resultado10);
  echo "<center>".$row10[0]."</center>";  }
else {echo "";}?>
        </td>
       </tr>
       <tr>
         <td bgcolor="#FFFFFF"  id="divi">Cambio de Proveedor</td>
         <td bgcolor="#FFFFFF" id="divi">
          <?php $sql10 = "SELECT COUNT(*) FROM SP_dato_cliente WHERE (estado='Retiro Solicitado' or estado='Retirado') AND motivo='Cambio Proveedor'  AND fecha_sol  BETWEEN '$fecha_1' AND '$fecha_2'  ";
$resultado10 = mysql_query($sql10);

$select10=mysql_query("SELECT COUNT(*) FROM SP_dato_cliente WHERE (estado='Retiro Solicitado' or estado='Retirado') AND motivo='Cambio Proveedor'  AND fecha_sol  BETWEEN '$fecha_1' AND '$fecha_2'  ");
if (mysql_num_rows($select10)>0){
 $row10 = mysql_fetch_array($resultado10);
  echo "<center>".$row10[0]."</center>";  }
else {echo "";}?>
        </td>
       </tr>
       <tr>
         <td  id="divi">Mal Servicio</td>
         <td id="divi">
          <?php $sql10 = "SELECT COUNT(*) FROM SP_dato_cliente WHERE (estado='Retiro Solicitado' or estado='Retirado') AND motivo='Mal Servicio'  AND fecha_sol  BETWEEN '$fecha_1' AND '$fecha_2'  ";
$resultado10 = mysql_query($sql10);

$select10=mysql_query("SELECT COUNT(*) FROM SP_dato_cliente WHERE (estado='Retiro Solicitado' or estado='Retirado') AND motivo='Mal Servicio'  AND fecha_sol  BETWEEN '$fecha_1' AND '$fecha_2'  ");
if (mysql_num_rows($select10)>0){
 $row10 = mysql_fetch_array($resultado10);
  echo "<center>".$row10[0]."</center>";  }
else {echo "";}?>
        </td>
       </tr>
       <tr>
         <td bgcolor="#FFFFFF"  id="divi">Económico</td>
         <td bgcolor="#FFFFFF" id="divi"><?php $sql10 = "SELECT COUNT(*) FROM SP_dato_cliente WHERE (estado='Retiro Solicitado' or estado='Retirado') AND motivo='Economico'  AND fecha_sol  BETWEEN '$fecha_1' AND '$fecha_2'  ";
$resultado10 = mysql_query($sql10);

$select10=mysql_query("SELECT COUNT(*) FROM SP_dato_cliente WHERE (estado='Retiro Solicitado' or estado='Retirado') AND motivo='Economico'  AND fecha_sol  BETWEEN '$fecha_1' AND '$fecha_2'  ");
if (mysql_num_rows($select10)>0){
 $row10 = mysql_fetch_array($resultado10);
  echo "<center>".$row10[0]."</center>";  }
else {echo "";}?></td>
       </tr>
       <tr>
         <td  id="divi">Morosidad</td>
         <td  id="divi"><?php $sql10 = "SELECT COUNT(*) FROM SP_dato_cliente WHERE (estado='Retiro Solicitado' or estado='Retirado') AND motivo='Morosidad'  AND fecha_sol  BETWEEN '$fecha_1' AND '$fecha_2'  ";
$resultado10 = mysql_query($sql10);

$select10=mysql_query("SELECT COUNT(*) FROM SP_dato_cliente WHERE (estado='Retiro Solicitado' or estado='Retirado') AND motivo='Morosidad'  AND fecha_sol  BETWEEN '$fecha_1' AND '$fecha_2'  ");
if (mysql_num_rows($select10)>0){
 $row10 = mysql_fetch_array($resultado10);
  echo "<center>".$row10[0]."</center>";  }
else {echo "";}?></td>
       </tr>
       <tr>
         <td  id="divi">Otros</td>
         <td  id="divi"><?php $sql10 = "SELECT COUNT(*) FROM SP_dato_cliente WHERE (estado='Retiro Solicitado' or estado='Retirado') AND motivo='Otros'  AND fecha_sol  BETWEEN '$fecha_1' AND '$fecha_2'  ";
$resultado10 = mysql_query($sql10);

$select10=mysql_query("SELECT COUNT(*) FROM SP_dato_cliente WHERE (estado='Retiro Solicitado' or estado='Retirado') AND motivo='Otros'  AND fecha_sol  BETWEEN '$fecha_1' AND '$fecha_2'  ");
if (mysql_num_rows($select10)>0){
 $row10 = mysql_fetch_array($resultado10);
  echo "<center>".$row10[0]."</center>";  }
else {echo "";}?></td>
       </tr>
       <tr>
         <td  bgcolor="#FFFFFF" id="divi">TOTAL</td>
         <td  bgcolor="#FFFFFF" id="divi">
          <?php $sql10 = "SELECT COUNT(*) FROM SP_dato_cliente WHERE (estado='Retiro Solicitado' or estado='Retirado')   AND fecha_sol  BETWEEN '$fecha_1' AND '$fecha_2'  ";
$resultado10 = mysql_query($sql10);

$select10=mysql_query("SELECT COUNT(*) FROM SP_dato_cliente WHERE estado=('Retiro Solicitado' or estado='Retirado')   AND fecha_sol BETWEEN '$fecha_1' AND '$fecha_2'  ");
if (mysql_num_rows($select10)>0){
 $row10 = mysql_fetch_array($resultado10);
  echo "<center>".$row10[0]."</center>";  }
else {echo "";}?>
       </td>
       </tr>
   </table>
       <p>
       <br>
      </div>
     <div id="auto_right3"><img src="pie_retiros1.php" width="400" height="300" /></div>

</div>
    <div id='auto'><span class="Tablas2">Detalle</span>:
      <p>
     <?php
	  
		  
		 
	  $sql_abiertos2=mysql_query("SELECT * FROM SP_dato_cliente WHERE  (estado='Retiro Solicitado' or estado='Retirado')   AND fecha_sol  BETWEEN '$fecha_1' AND '$fecha_2'  ");

 if (mysql_num_rows($sql_abiertos2)>0)
{




echo "<table  border = '0' bordercolor = 'silver' height='3'  class='Tablas2' cellspacing = '0' cellpadding='0'> \n";
echo "<tr> \n";
echo "<td bgcolor='#C9101A'><font color='#FFFFFF'>Cliente</center></td> \n";
echo "<td bgcolor='#C9101A'><font color='#FFFFFF'>Contrato</td> \n";
echo "<td bgcolor='#C9101A'><font color='#FFFFFF'>Plan</td> \n";
echo "<td bgcolor='#C9101A'><font color='#FFFFFF'>Velocidad</font></td> \n";
echo "<td bgcolor='#C9101A'><font color='#FFFFFF'>Fecha Instalacion</td> \n";



echo "</tr> \n";
while ($row = mysql_fetch_row($sql_abiertos2)){
echo "<tr> \n";
echo "<td><div id='divi'>$row[1]</div></td> \n";
echo "<td><div id='divi'>$row[4]</div></td> \n";
echo "<td><div id='divi'>$row[12]</div></td> \n";
echo "<td><div id='divi'>$row[14]</div></td> \n";
echo "<td><div id='divi'>$row[10]</div></td> \n";


}
echo "</table></center> \n";
echo "<p>";

$sql = "SELECT COUNT(*) from SP_dato_cliente WHERE (estado='Retiro Solicitado' or estado='Retirado')   AND fecha_sol BETWEEN '$fecha_1' AND '$fecha_2'  ";
$resultado = mysql_query($sql);

$select=mysql_query("SELECT COUNT(*) from SP_dato_cliente WHERE (estado='Retiro Solicitado' or estado='Retirado')   AND fecha_sol BETWEEN '$fecha_1' AND '$fecha_2'  ");
if (mysql_num_rows($select)>0){
 $row = mysql_fetch_array($resultado);
 echo "Cantidad de Registros = ".$row[0]; }
else {echo "";}


}
else {
	echo "No hay registros para fechas seleccionadas";			
			
			
		}}
	  ?>
</p>
    <p>
      
      
      
      
      
      
  </div>
 <?php include '../../../include/estructura/foot.php';?>  
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
