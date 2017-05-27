<?php
include("../../../system/config.php");
include("../../../services2/config.php");
$alias = $_GET["alias"];
$numero = $_GET["numero"];
$id = $_GET["id"];
$ap = $_GET["ap"];
$rut = $_GET["rut"];


$ticket_type=$_GET['ticket_type'];
$cliente= $_GET["cliente"];
$sql_cliente3=mysql_query("SELECT * FROM SP_dato_cliente WHERE cliente='$cliente' AND alias='$alias' or rut='$rut' AND alias='$alias'");
$sql_tipo=mysql_query("SELECT tipo FROM TICKET_tipo ORDER BY tipo ASC");
$sql_departamento=mysql_query("SELECT departamento FROM TICKET_departamento ORDER BY departamento ASC");
$sql_origen=mysql_query("SELECT origen FROM TICKET_origen ORDER BY origen ASC");
$sql_prioridad=mysql_query("SELECT prioridad FROM TICKET_prioridad ");
$sql_cliente=mysql_query("SELECT cliente FROM SP_soporte_crear_cliente ORDER BY cliente ASC");

$sql_status=mysql_query("SELECT status FROM TICKET_status ");
$sql_como=mysql_query("SELECT como FROM TICKET_como ");
$sql_plan=mysql_query("SELECT plan FROM TICKET_plan ");
$sql_comuna=mysql_query("SELECT comuna FROM comunas_factibilidad ORDER BY comuna ASC");


$sql_hora=mysql_query("SELECT hora FROM TICKET_hora ");
$sql_responsable=mysql_query("SELECT nombre FROM usuarios ORDER BY nombre ASC");
$fecha=date("Y-m-d H:i:s");
$fecha_actualizacion=date("Y-m-d H:i:s");


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
$creador=$_SESSION['MM_Username'];

$bienvenido=mysql_query("SELECT nombre FROM usuarios WHERE usuario='$usuario'");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


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
<script type="text/javascript" src="../../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../../js/jquery-ui.min.js"></script>
   <link href="../../../css/sistema.css" rel="stylesheet" type="text/css" />
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
<link rel="stylesheet" href="../../../css/estilos2.css">
<script>
$(function() {
$( "#dialog" ).dialog();
});
</script>
<style type="text/css">
#apDiv5 {
	position: absolute;
	width: 305px;
	height: 264px;
	z-index: 1;
	left: 626px;
	top: 332px;
}
#apDiv6 {
	position: absolute;
	width: 177px;
	height: 280px;
	z-index: 1;
	left: 694px;
	top: 340px;
}
#apDiv7 {
	position: absolute;
	width: auto;
	height: auto;
	z-index: 1;
	left: 628px;
	top: 341px;
	border: thin dashed #F30;
}
</style>
<link href="../../../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #F9F9F9;
}
</style>
<script type="text/javascript">
$().ready(function() {
	$("#course").autocomplete("busqueda_cliente.php", {
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
      <li><a href="../clientes/clientes.php" >Clientes</a></li>
      
      <li><a href="../Factibilidades/factibilidades.php" id="supermenu" >Ventas</a></li>
      
      <li><a href="../Retiros/retiros.php">Retiro</a></li>
      <li><a href="../ticket/ticket.php">Ticket</a></li>
      <li><a href="../radio planning/radio_planning.php">Radio</a>      </li>
      
<li><a href="../inventario/inventario.php">Inventario</a></li>

      <li><a href="../Indicadores/indicadores.php">Kpi</a></li>
      <li><a href="../intranet/intranet1.php">Intranet</a></li>
         <li><a href="../pppoe/index.php">PPPoE</a></li>
</ul>
  </div> <?php include '../../../include/estructura/submenu_factibilidades_ticket_nuevo.php';?>

  <div id="ticket_nuevo">
    <form method="post" action="ticket_comprobacion_nuevo2.php" >
      <div id="datos_com"><strong>Nueva Solicitud de Instalación</strong><br /><br /></div>
<br />
<div id='envolver'>
      <table width="772" border="0">
  <tr>
    <td width="136">Razón Social </td>
    <td width="21">:</td>
    <td colspan="2"><span id="sprytextfield1">
      <label for="cliente"></label>
      <input name="cliente" type="text" class="formulario_grande_intranet" id="cliente" />
      <span class="textfieldMinCharsMsg"></span><span class="textfieldMaxCharsMsg"></span><span class="textfieldRequiredMsg"></span></span><span>
      </td>
  </tr>
  <tr>
    <td>Rut</td>
    <td>:</td>
    <td colspan="2">
     <span id="sprytextfield5">
    <label for="rut"></label>
    <input name="rut" type="text" class="formulario_grande_intranet" id="rut" />
</span></td>
  </tr>
  <tr>
    <td>Correo</td>
    <td>:</td>
    <td colspan="2">
     <span id="sprytextfield6">
    <label for="correo"></label>
    <input name="correo" type="text" class="formulario_grande_intranet" id="correo" />
</span></td>
  </tr>
  <tr>
    <td>Plan de Interés</td>
    <td>:</td>
    <td colspan="2"><select name="plan" class="formulario_grande_intranet2"  >
      <?php while($row = mysql_fetch_array($sql_plan)){ ?>
      <option value="<?php echo $row['plan']; ?>" size="30"><?php echo $row['plan']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  <tr>
    <td>Teléfono</td>
    <td>:</td>
    <td colspan="2">
    <span id="sprytextfield2">
    <label for="telefono"></label>
    <input name="telefono" type="text" class="formulario_grande_intranet" id="telefono" />
</span></td>
  </tr>
  <tr>
    <td>Dirección</td>
    <td>:</td>
    <td colspan="2">
    <span id="sprytextfield3">
    <label for="direccion"></label>
    <input name="direccion" type="text" class="formulario_grande_intranet" id="direccion" />
    <span class="textfieldMaxCharsMsg"></span></span></td>
  </tr>
  <tr>
    <td>Comuna</td>
    <td>:</td>
    <td colspan="2"><select name="comuna" class="formulario_grande_intranet2"  >
      <?php while($row = mysql_fetch_array($sql_comuna)){ ?>
      <option value="<?php echo $row['comuna']; ?>" size="30"><?php echo $row['comuna']; ?></option>
      <?php } ?>
    </select></td>
  </tr>
  <tr>
    <td>Como nos conoció</td>
    <input type="hidden" name="fecha_actualizacion" readonly="readonly" value="<?php echo $fecha_actualizacion?>" class="EDITARCopiaCopia2" />
    <td>:</td>
    <td colspan="2"><select name="como" class="formulario_grande_intranet2"  >
      
      <?php while($row = mysql_fetch_array($sql_como)){ ?>
      <option value="<?php echo $row['como']; ?>" size="30"><?php echo $row['como']; ?></option>
      <?php } ?>
      </select></td>
  </tr>
  <tr>
    <td>Prioridad</td>
    <td>:</td>
    <td colspan="2"><select name="prioridad" class="formulario_grande_intranet2"  >
      
      <?php while($row = mysql_fetch_array($sql_prioridad)){ ?>
      <option value="<?php echo $row['prioridad']; ?>" size="30"><?php echo $row['prioridad']; ?></option>
      <?php } ?>
      </select></td>
  </tr>
  <tr>
    <td>Asignar a </td>
    <td>:</td>
    <td colspan="2"><select name="responsable" class="formulario_grande_intranet2"  >
      
      <?php while($row = mysql_fetch_array($sql_responsable)){ ?>
      <option value="<?php echo $row['nombre']; ?>" size="30"><?php echo $row['nombre']; ?></option>
      <?php } ?>
      </select></td>
  </tr>
  <tr>
    <td>Comentario </td>
    <td>:</td>
    <td colspan="2" rowspan="3" ><span id="sprytextarea1">
    <label for="comentario"></label>
    <textarea name="comentario" cols="45" rows="7" class="formulario_grande_intranet" id="comentario2"></textarea>
    <span class="textareaRequiredMsg"></span><span class="textareaMinCharsMsg"></span><span class="textareaMaxCharsMsg"></span></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <input name="fecha_creacion" type="hidden" class="EDITARCopia" value="<?php echo $fecha;?>" size="20"/>
 
<?php $creador2=mysql_query("SELECT nombre FROM usuarios WHERE usuario='$creador'");
while($row = mysql_fetch_array($creador2)){

?>
 <input name="usuario" readonly="readonly" type="hidden" class="EDITARCopiaCopia2" value="<?php echo $usuario;?>" size="60">   
    <input name="creador" type="hidden" class="EDITARCopia" value="<?php echo $row['nombre']; ?>" size="20"/>
       <?php } ?>
  <tr>
    <td><input name="btn_submit" type="submit" class="boton_intranet" value="Crear Factibilidad" /></td>
    <td>&nbsp;</td>
    <td width="442">
      
      
        <input name="btn_submit2" type="reset" value="Limpiar  Datos" class="boton_intranet" />
   </td>
    <td width="155">&nbsp;</td>
    </tr>
</table>
  </form>
    
    <?php
	if (empty($id)){}
	
	if ($id==1){
		echo "<div id='dialog' title='Factibilidad'>Factibilidad #".$numero." Creada exitosamente!</div>";
		}
	if ($id==8){
		echo "<div id='dialog' title='Error'>Registro Duplicado , el nombre ingresado ya esta en la Base de Datos , intente con otro nombre.</div>";
		}
	
	
	?>
	&nbsp;</p>
  </div> 
  
  </div>


<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});

var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["change"]});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["change"], minChars:1, maxChars:100});

var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {minChars:1, maxChars:200, validateOn:["change"]});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "email", {validateOn:["change"], minChars:1, maxChars:100});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {minChars:1, maxChars:300, validateOn:["change"]});
</script>
</body>
</html>
