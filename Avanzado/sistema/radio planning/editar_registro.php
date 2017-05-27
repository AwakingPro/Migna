<?php
include("../../../system/config.php");
include("../../../services/config.php");
$ip2= $_GET["ip"];
$ip= trim($ip2);
$ssid= $_GET["ssid"];

$sql=mysql_query("SELECT estacion,funcion,ip,puerto,marca,modelo,password,canal,ancho_canal,frecuencia,tx_power,base_id,ap_id,ssid,mac,remarks,alarma,url FROM INT_radio_planning WHERE  ssid='$ssid' and ip='$ip'");
$sql_estaciones=mysql_query("SELECT estacion FROM INT_radio_planning_estaciones ");
$sql_funcion=mysql_query("SELECT funcion FROM funciones ");


$sql_mac=mysql_query("SELECT mac FROM INV_activos WHERE id=0 AND tipo='Access Point'");

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

    <?php include '../../../include/estructura/menu_radio_planning.php';?>
 <?php include '../../../include/estructura/submenu_radio_planning.php';?>
	
      
  <div id="rpe">
    <p class="iconos_top">
	
<div id="datos_com"><strong>Resultado Busqueda</strong>  <br /><br />
 
 </div>     <form method="post" enctype="multipart/form-data"  action="comprobacion_guardar.php" >
    <table width="660" border="0">
  <tr>
    <td>&nbsp;</td>
    <td>Estación</td>   <?php while($row = mysql_fetch_array($sql)){ ?>
    <td><select name="estacion" class="formulario_chico_intranet" >
        <option value='<?php echo $row['estacion']; ?>'><?php echo $row['estacion'];?></option>
                
                   <?php while($row2 = mysql_fetch_array($sql_estaciones)){ ?> <option value="<?php echo $row2['estacion'];?>"> <?php echo $row2['estacion']; ?>
                  <?php } ?> </option>
      
      </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Función</td>
    <td><select name="funcion" class="formulario_chico_intranet" >
        <option value='<?php echo $row['funcion']; ?>'><?php echo $row['funcion'];?></option>
                
                   <?php while($row2 = mysql_fetch_array($sql_funcion)){ ?> <option value="<?php echo $row2['funcion'];?>"> <?php echo $row2['funcion']; ?>
                  <?php } ?> </option>
      
      </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Alarma Activada</td>
    <td><select name="alarma" class="formulario_chico_intranet" >
    <?php 
	$alarma=$row['alarma'];
	if ($alarma=='1'){
		 ?>      
        <option value='1'>Si</option>
         <option value='0'>No</option> 
      <?php } else {?>
      <option value='0'>No</option>
         <option value='1'>Si</option> 
      </select><?php }?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Dirección IP</td>
    <td><input name="ip" type="text" value="<?php echo $row['ip'];?>" class="formulario_chico_intranet" id="course4" size="25" /></td><input name="ip_antigua" type="hidden" value="<?php echo $row['ip'];?>" class="iconos_top" id="course4" size="25" />
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Puerto de Acceso</td>
    <td><input name="puerto" type="text" value="<?php echo $row['puerto'];?>" class="formulario_chico_intranet" id="course5" size="25" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>AP ID</td>
    <td><input name="ap_id" type="text" value="<?php echo $row['ap_id'];?>" class="formulario_chico_intranet" id="ap_id" size="25" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Base ID</td>
    <td><input name="base_id" type="text" value="<?php echo $row['base_id'];?>" class="formulario_chico_intranet" id="base_id" size="25" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Ancho de Canal</td>
    <td><input name="ancho_canal" type="text"  value="<?php echo $row['ancho_canal'];?>"class="formulario_chico_intranet" id="course10" size="25" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="8">&nbsp;</td>
    <td width="281"> Frecuencia</td>
    <td> <input name="frecuencia" type="text" value="<?php echo $row['frecuencia'];?>"class="formulario_chico_intranet" id="course" size="25" />
      <!--input type="button" value="Get Value" /--></td>
    <td width="119">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>TX Power</td>
    <td><input name="tx_power" type="text" value="<?php echo $row['tx_power'];?>"class="formulario_chico_intranet" id="course11" size="25" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Mac Address</td>
    <td><select name="mac" class="formulario_chico_intranet" >
      <option value='<?php echo $row['mac']; ?>'><?php echo $row['mac'];?></option>
      <?php while($row3 = mysql_fetch_array($sql_mac)){ ?>
      <option value="<?php echo $row3['mac'];?>" ><?php echo $row3['mac'];?><?php } ?></option>
          <option value='No registra'>No Registra</option>

      <input name="mac_antigua" type="hidden" value="<?php echo $row['mac'];?> " class="iconos_top" id="course4" size="25" />
      </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>SSID</td>
    <td><input name="ssid" type="text" value="<?php echo $row['ssid'];?>"class="formulario_chico_intranet" id="course3" size="25" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>URL Ancho de Banda</td>
    <td><input name="url" type="text" value="<?php echo $row['url'];?>" class="formulario_chico_intranet" id="url" size="25" /><?php } ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" class="boton_intranet" value="Guardar Registro"   /></td>
    <td width="234"><input type="reset" class="boton_intranet"   value="Borrar valores escritos"   /></td>
    <td>&nbsp;</td>
  </tr>
      </table>
    <p>&nbsp;</p>
     </form></p>
    <p>
    
    <?php
	$id_1=$_GET['id'];
	if (empty($id_1)){}
	
	if ($id_1==1){
		
		echo "<div id='dialog' title='Editar Registro'><p>Registro actualizado exitosamente</div>";
		
		}
	
	
	
	
	?>
    
    </p>
  </div>
 
  
  
  
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
