<?php
include("../../../system/config.php");
include("../../../services/config.php");

$cliente = $_GET["cliente"];
$alias = $_GET["alias"];
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
$sql_mac_su=mysql_query("SELECT mac FROM INV_activos where id=0 and tipo='Access Point' ");
$sql_mac_router=mysql_query("SELECT mac FROM INV_activos where id=0 and tipo='Router'  ");
$sql_ap=mysql_query("SELECT ip FROM INT_radio_planning ORDER by ip ASC  ");
$sql_configuracion=mysql_query("SELECT configuracion FROM SP_row_configuracion_ip ORDER by configuracion ASC  ");

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
$username2=$_SESSION['MM_Username'];
$bienvenido=mysql_query("SELECT nombre FROM usuarios WHERE usuario='$username2'");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include '../../../include/estructura/title.php';?>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #F9F9F9;
}
</style>
<link href="../../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="../../../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<head>

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
  <script type="text/javascript" src="../../../script/jquery.jCombo.min.js"></script><script src="../../../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="../../../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="../../../css/estilos2.css">
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
	$("#course3").autocomplete("busqueda_tipo.php", {
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
	$("#course4").autocomplete("busqueda_marca.php", {
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
	$("#course5").autocomplete("busqueda_modelo.php", {
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
	$("#course6").autocomplete("busqueda_proveedor.php", {
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
	$("#course7").autocomplete("busqueda_bodega.php", {
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



</head>

<body>

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
      <li><a href="clientes.php" id="supermenu" >Cliente</a></li>
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
 <?php include '../../../include/estructura/submenu_clientes_busqueda_ingreso_dato_tecnico.php';?>
 
  <div id="crear_dato_tecnico2">
  <div id="datos_com"><strong>Datos Comerciales</strong></div>
  <form id="form2" name="form2" method="post" action="comprobacion_crear_otros.php">
  
  <?php while($row=mysql_fetch_array($sql_cliente)){?>
        <input name="cliente"  type="hidden"  class="formularioCopia" value="<?php echo $row['cliente']; ?>" /> <?PHP }?>
        
    <?php while($row=mysql_fetch_array($sql_rut)){?>
        <input name="rut"  type="hidden"  class="formularioCopia" value="<?php echo $row['rut']; ?>" /> <?PHP }?>     
        
         <?php while($row=mysql_fetch_array($sql_contacto)){?>
        <input name="contactos"  type="hidden"  class="formularioCopia" value="<?php echo $row['contacto']; ?>" /> <?PHP }?>
        
         <?php while($row=mysql_fetch_array($sql_telefonos)){?>
        <input name="telefonos"  type="hidden"  class="formularioCopia" value="<?php echo $row['telefonos']; ?>" /> <?PHP }?>
        
         <?php while($row=mysql_fetch_array($sql_correos)){?>
        <input name="correos"  type="hidden"  class="formularioCopia" value="<?php echo $row['correos']; ?>" /> <?PHP }?>
         <?php while($row=mysql_fetch_array($sql_direccion_comercial)){?>
        <input name="direccion_comercial"  type="hidden"  class="formularioCopia" value="<?php echo $row['direccion_comercial']; ?>" /> <?PHP }?>
        
    <table width="1021" border="0">
     <tr>
       <td width="160" >Razón Social :</td><?php while($row=mysql_fetch_array($sql_cliente2)){?>
       <td width="530"> <input  type="TEXT" disabled="disabled"  class="formulario_grande_intranet" value="<?php echo $row['cliente']; ?>"  readonly="readonly"/> </td><?PHP }?>
       <td width="91" >&nbsp;</td>
      <td width="222">&nbsp;</td></tr>
  <tr>
    <td>Rut :</td><?php while($row=mysql_fetch_array($sql_rut2)){?>
    <td><input type="TEXT" disabled="disabled"  class="formulario_chico_intranet" value="<?php echo $row['rut']; ?>" readonly="readonly"/><?PHP }?></td>
    <td width="91" >&nbsp;</td>
    <td width="222">&nbsp;</td>
    </tr>
  <tr>
    <td>Contacto :</td><?php while($row=mysql_fetch_array($sql_contacto2)){?>
    <td><input type="TEXT" disabled="disabled" class="formulario_grande_intranet" value="<?php echo $row['contacto']; ?>" readonly="readonly"/><?PHP }?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>Telefonos :</td><?php while($row=mysql_fetch_array($sql_telefonos2)){?>
    <td><input type="text" disabled="disabled"  class="formulario_grande_intranet"  value="<?php echo $row['telefonos']; ?>" readonly="readonly" />
      <?PHP }?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>Correos :</td><?php while($row=mysql_fetch_array($sql_correos2)){?>
    <td><input type="text" disabled="disabled"  class="formulario_grande_intranet"  value="<?php echo $row['correos']; ?>" size="80" readonly="readonly"/><?PHP }?></td>
    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>Dirección Comercial :</td><?php while($row=mysql_fetch_array($sql_direccion_comercial2)){?>
    <td><input  type="text" disabled="disabled"  class="formulario_grande_intranet"  value="<?php echo $row['direccion_comercial']; ?>" readonly="readonly" />
     </td>
   
    <td>&nbsp;</td>
    <td><div align="left"></td>
    </tr>
   </table>
  <div id="datos_com"><strong>Datos Técnicos</strong> <strong>Otros Servicios</strong></div>

  <table width="942" border="0">
  <tr>
    <td>Servicio : </td>
    <td><span id="sprytextfield1">
    <label for="servicio"></label>
    <input name="servicio" type="text" class="formulario_grande_intranet" id="servicio" />
    <span class="textfieldRequiredMsg">X</span><span class="textfieldMinCharsMsg">X</span><span class="textfieldMaxCharsMsg">X</span></span></td>
  </tr>
  <tr>
    <td>Fecha Habilitación :</td>
    <td><span id="sprytextfield2">
    <label for="fecha_habilitacion"></label>
    <input name="fecha_habilitacion" type="text" class="formulario_chico_intranet" id="fecha_habilitacion" />
    <span class="textfieldRequiredMsg">X</span><span class="textfieldInvalidFormatMsg">X</span></span></td>
    </tr>
  <tr>
    <td width="163"><span class="style1 style2">Descripción :</span></td>
    <td width="769" rowspan="2"><span id="sprytextarea1">
    <label for="descripcion"></label>
    <textarea name="descripcion" cols="45" rows="10" class="formulario_grande_intranet" id="descripcion"></textarea>
    <span class="textareaRequiredMsg">X</span><span class="textareaMinCharsMsg">X</span></span></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  </table>
  <br />
<BR />
  <table width="931">
    <tr><?PHP }?>
      <td></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
    <input type="hidden" value="<?php echo $alias;?>" name="alias" />
      <td width="279"><input  type="submit" class="boton_intranet"   value="      Ingresar Nuevo Servicio      "/></td>
      <td width="640"><input  type="reset" class="boton_intranet"   value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Restablecer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"/></td>
      </tr>
</table>
  </form>
  <?php
	  $id=$_GET['id']; 
	  if ($id==1){
	  echo "<div id='dialog' title='Ingresar Dato Técnico'><center><p>Registro ingresado Exitosamente!<br><br><br>
		   <form action='header.php' method='post'>
		   	   <input type='hidden' name='id_header' value='7'>
		   	   		   	   <input type='hidden' name='cliente' value='$cliente'>

	   <input type='submit' value='cerrar'>
	   </form></center></div>";
	  }
	  
	  else if ($id==10){
	  echo "<div id='dialog' title='Error'><center><P>Nombre de Enlace duplicado, no se puede ingresar registro a la Base de Datos, intente con otro nombre para el Enlace.<br><br><br>
		   <form action='header.php' method='post'>
		   	   <input type='hidden' name='id_header' value='7'>
		   	   		   	   <input type='hidden' name='cliente' value='$cliente'>

	   <input type='submit' value='cerrar'>
	   </form></center></div>";
	  }
	  ?>
      <br />
      <br />
</div>

  </div>
 
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {validateOn:["change"], minChars:1, maxChars:0});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["change"], minChars:1, maxChars:100});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "date", {validateOn:["change"], format:"yyyy-mm-dd"});
</script>
</body>
</html>
