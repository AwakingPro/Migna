<?php
include("../../../system/config.php");
include("../../../services2/config.php");
$id_select= $_GET["id_select"];

$cliente= $_GET["cliente"];
$sql_tipo=mysql_query("SELECT tipo FROM TICKET_tipo ORDER BY tipo ASC");
$sql_departamento=mysql_query("SELECT departamento FROM TICKET_departamento ORDER BY departamento ASC");
$sql_origen=mysql_query("SELECT origen FROM TICKET_origen ORDER BY origen ASC");
$sql_prioridad=mysql_query("SELECT prioridad FROM TICKET_prioridad ");
$sql_cliente=mysql_query("SELECT cliente FROM SP_soporte_crear_cliente ORDER BY cliente ASC");

$sql_status=mysql_query("SELECT status FROM TICKET_status ");
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
       <link href="../../../js/jquery-ui-1.7.2.custom.css" rel="stylesheet" type="text/css" />
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
<link href="../../../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#apDiv5 {
	position: absolute;
	width: 305px;
	height: 264px;
	z-index: 1;
	left: 626px;
	top: 332px;
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
<?php include '../../../include/estructura/banner.php';?>

    <?php include '../../../include/estructura/menu_ticket.php';?>
 <?php include '../../../include/estructura/submenu_ticket.php';?>
	
  <div id="ticket_nuevo">
    <div id="titulo_ticket_abierto">
      <div id="titulo_ticket_abiertos_left">Nuevo Ticket</div>
      <div id="titulo_ticket_abiertos_right">
        <form method="GET" action="ticket_abiertos.php">
          <select name="ticket_filter" class="formulariochico" id='ticket_filter'>
               <option value="" size="30">Es Cliente</option>
              <option value="1" size="30">No es Cliente</option>
  </select>
  <input type="submit" class="formulariosuperchico" value="Cambiar"/>
	 </form>
</div>
    </div>
    
 <form method="post" action="ticket_comprobacion_nuevo.php">
     <?php if($_POST['country'] && $_POST['city'] && $_POST['zone']): ?>
     
  <? endif; ?>
  
  <table width="900" border="0">
  <tr>
    <td width="100">Razon Social </td>
    <td width="18">:</td>
    <td colspan="2"><span id="sprytextfield1">
    <?php
	if  (empty($cliente)) {?>
    <label for="cliente"></label>
    <select name="cliente" class="formulario"  >
  
      <?php while($row = mysql_fetch_array($sql_cliente)){ ?>
      <option value="<?php echo $row['cliente']; ?>" size="30"><?php echo $row['cliente']; ?></option>
      <?php } ?>
    </select>
    
    <?php }else {?>
    <input name="cliente" type="text" class="formulario"  readonly="readonly" value="<?php echo $cliente; ?>" size="20"/>
    </span><span>
    <?php }?>
    <span class="textfieldRequiredMsg">X</span><span class="textfieldMinCharsMsg">X</span><span class="textfieldMaxCharsMsg">X</span></span>
    
    
  
    
    </td>
    </tr>
  <tr>
    <td><span class="style1 style2">Origen </span></td>
    <input type="hidden" name="fecha_actualizacion" readonly="readonly" value="<?php echo $fecha_actualizacion?>" class="EDITARCopiaCopia2" />
    <td>:</td>
    <td colspan="2"><select name="origen" class="formulariochico"  >
  
      <?php while($row = mysql_fetch_array($sql_origen)){ ?>
      <option value="<?php echo $row['origen']; ?>" size="30"><?php echo $row['origen']; ?></option>
      <?php } ?>
    </select></td>
    </tr>
  <tr>
    <td><span class="style1 style2">Departamento </span></td>
    <td>:</td>
    <td colspan="2"><select name="country" id="country" class="formulariochico"></select>&nbsp;</td>
    </tr>
  <tr>
    <td><span class="style1 style2">Tipo </span></td>
    <td>:</td>
    <td colspan="2"><select name="city" id="city" class="formulariochico"></select></td>
    </tr>
  <tr>
    <td><span class="style1 style2">Subtipo </span></td>
    <td>:</td>
    <td colspan="2"><select name="zone" id="zone" class="formulariochico"></select></td>
    <?php
	// calculate first values to populate data (Victoria Park, Calgary, Canada) id = 13
	$query = "	SELECT zones.id_zone, cities.id_city, countries.id_country FROM zones 
				INNER JOIN cities ON zones.id_city = cities.id_city 
				INNER JOIN countries ON countries.id_country = cities.id_country
				WHERE zones.id_zone = '13'";
	$result = mysql_query($query);
	if($result && mysql_num_rows($result)>0) {
		$row = mysql_fetch_assoc($result);
		$country_id = intval($row['id_country']);	
		$city_id = intval($row['id_city']);	
		$zone_id = intval($row['id_zone']);	
	}
	
?>
  <script type="text/javascript">
$(function() {
	$("#country").jCombo("../../../services2/getCountries.php", { selected_value : '<?php print($country_id); ?>' } );
    $("#city").jCombo("../../../services2/getCities.php?id=", { 
					parent: "#country", 
					parent_value: '<?php print($country_id); ?>', 
					selected_value: '<?php print($city_id); ?>' 
				});		
    $("#zone").jCombo("../../../services2/getZones.php?id=", { 
					parent: "#city", 
					parent_value: '<?php print($city_id); ?>', 
					selected_value: '<?php print($zone_id); ?>' 
				});
	$("#btn_getvalues").click(function() {
		$("#val_country").html($("#country").val() + " => " + $("#country option:selected").html());
		$("#val_city").html($("#city").val() + " => " + $("#city option:selected").html());		
		$("#val_zone").html($("#zone").val() + " => " + $("#zone option:selected").html());
		return false;
	});
	
});
</script>  </tr>
  <tr>
    <td>Prioridad </td>
    <td>:</td>
    <td colspan="2"><select name="prioridad" class="formulariochico"  >
     
      <?php while($row = mysql_fetch_array($sql_prioridad)){ ?>
      <option value="<?php echo $row['prioridad']; ?>" size="30"><?php echo $row['prioridad']; ?></option>
      <?php } ?>
    </select></td>
    </tr>
  <tr>
    <td>Asignar a </td>
    <td>:</td>
    <td colspan="2"><select name="responsable" class="formulariochico"  >
     
      <?php while($row = mysql_fetch_array($sql_responsable)){ ?>
      <option value="<?php echo $row['nombre']; ?>" size="30"><?php echo $row['nombre']; ?></option>
      <?php } ?>
    </select></td>
    </tr>
  <tr>
    <td>Estado </td>
    <td>:</td>
    <td colspan="2"><select name="status" class="formulariochico"  >

      <?php while($row = mysql_fetch_array($sql_status)){ ?>
      <option value="<?php echo $row['status']; ?>" size="30"><?php echo $row['status']; ?></option>
      <?php } ?>
    </select></td>
    </tr>
  <tr>
    <td>Comentario </td>
    <td>:</td>
    <td colspan="2" rowspan="3"><span class="formulario" id="sprytextarea1">
    <label for="comentario"></label>
    <textarea name="comentario" cols="45" rows="5" class="formulario" id="comentario2"></textarea>
    <span class="textareaRequiredMsg">X</span><span class="textareaMinCharsMsg">X</span><span class="textareaMaxCharsMsg">X</span></span></td>
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
 
    <input name="creador" type="hidden" class="EDITARCopia" value="<?php echo $row['nombre']; ?>" size="20"/>
       <?php } ?>
  <tr>
    <td><input name="btn_submit" type="submit" class="formulariochico" value="Crear Ticket" /></td>
    <td>&nbsp;</td>
    <td width="360">
      
      
        <input name="btn_submit2" type="reset" value="Limpiar  Datos" class="formulariochico" />
   </td>
    <td width="437">&nbsp;</td>
    </tr>
</table>
    </form>
	
	&nbsp;</p>
  </div>
  
 <?php include '../../../include/estructura/foot.php';?>
  
  
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["change"], minChars:1, maxChars:50});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {validateOn:["change"], minChars:1, maxChars:300});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["change"]});
</script>
</body>
</html>
<?php
mysql_free_result($SG_Login_Usuario);
mysql_free_result($cliente);
mysql_free_result($bienvenido);
?>