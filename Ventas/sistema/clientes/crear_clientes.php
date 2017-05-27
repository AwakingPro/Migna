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

  $logoutGoTo = "../index.php";
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
$MM_authorizedUsers = "4";
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
  <title>Sistema Gestion Clientes</title>
  <style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
background-image: url(../../../images/imagen.png);}
  </style>
  <link href="../../../css/sistema.css" rel="stylesheet" type="text/css" />
  <link href="../../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
  <link href="../../../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
  <script src="../../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
  <script type="text/javascript" src="../../../script/jquery.js"></script>
  <script type="text/javascript" src="../../../script/jquery.jCombo.min.js"></script>
  
   <script type="text/javascript">
function validarForm(formulario) {
  if(formulario.cliente.value.length==0) { //comprueba que no esté vacío
    formulario.cliente.focus();   
    alert('No has ingresado Nombre'); 
    return false; //devolvemos el foco
  }
  if(formulario.rut.value.length==0) { //comprueba que no esté vacío
    formulario.rut.focus();
    alert('No has escrito Rut');
    return false;
  }
 if(formulario.giro.value.length==0) { //comprueba que no esté vacío
    formulario.giro.focus();
    alert('No has Escrito Giro');
    return false;
  }
   if(formulario.contacto.value.length==0) { //comprueba que no esté vacío
    formulario.contacto.focus();
    alert('No has ongresado contacto');
    return false;
  }
   if(formulario.telefonos.value.length==0) { //comprueba que no esté vacío
    formulario.telefonos.focus();
    alert('No has ingresado Telefonos');
    return false;
  }
   if(formulario.correos.value.length==0) { //comprueba que no esté vacío
    formulario.correos.focus();
    alert('No has ingresado correo');
    return false;
  }
   if(formulario.direccion_comercial.value.length==0) { //comprueba que no esté vacío
    formulario.direccion_comercial.focus();
    alert('No has ingresado Direccion');
    return false;
  }
   if(formulario.country.value.length==0) { //comprueba que no esté vacío
    formulario.country.focus();
    alert('No has seleccionado Region');
    return false;
  }
   if(formulario.city.value.length==0) { //comprueba que no esté vacío
    formulario.city.focus();
    alert('No has seleccionado provincia');
    return false;
  }
   if(formulario.zone.value.length==0) { //comprueba que no esté vacío
    formulario.zone.focus();
    alert('No has seleccionado comuna');
    return false;
  }
   if(formulario.cantidad.value.length==0) { //comprueba que no esté vacío
    formulario.cantidad.focus();
    alert('No has ingresado cantidad');
    return false;
  }
   if(formulario.precio.value.length==0) { //comprueba que no esté vacío
    formulario.precio.focus();
    alert('No has escrito el Precio');
    return false;
  }
   if(formulario.estado.value.length==0) { //comprueba que no esté vacío
    formulario.estado.focus();
    alert('No has seleccionado estado');
    return false;
  }
   if(formulario.responsable.value.length==0) { //comprueba que no esté vacío
    formulario.responsable.focus();
    alert('No has seleccionado Responsable');
    return false;
  }
  
  return true;
}
</script>
  </head>
    
  <body>
  <div id="contenedor">
   <div id="index_top_top"></div>
   <div id="index_welcome">
     <div id="sistema_welcome_left"><?php while($row=mysql_fetch_array($bienvenido)){
     	echo "Bienvenido ".$row['nombre'];
	
	}?></div>
     <div id="sistema_welcome_top">
       <table width="359" border="0">
         <tr>
           <td width="270"></td>
           <td width="79"><span class="Blancos_chico"><a href="../sistema.php" class="Blancos_chico">Inicio</a>  |</span><a href="<?php echo $logoutAction ?>" class="Blancos_chico"> Salir</a></td>
         </tr>
       </table>
     </div>
   </div>
   <div id="index_top"></div>
   <div id="index_menu">
   <div id="index_menu_principal">
     <ul id="MenuBar1" class="MenuBarHorizontal">
       <li><a href="clientes.php" class="BlancosSelection">Clientes</a>       </li>
       <li><a href="../inventario/inventario.php" class="BlancosCopia">Inventario</a></li>
       <li><a href="../ticket/ticket.php" class="BlancosCopia">Ticket</a>       </li>
       <li><a href="../Radius/radius.php" class="BlancosCopia">Radius</a></li>
       <li><a href="../Intranet/intranet.php" class="BlancosCopia">Intranet</a></li>
       <li><a href="../radio planning/radio_planning.php" class="BlancosCopia">Radio Planning</a></li>
       <li><a href="../Indicadores/indicadores.php" class="BlancosCopia">Indicadores</a></li>
       <li><a href="../evaluaciones/evaluaciones.php" class="BlancosCopia">Evaluaciones</a></li>
     </ul>
      </div>
   </div>
   <div id="inventario_submenu">
<table width="950" border="0">
  <tr>
    <td width="150" class="iconos_topCENTRO"><a href="clientes_busqueda.php" class="iconos_top">Buscar Cliente</a></td>
    <td width="150" class="iconos_topCENTRO"><a href="crear_clientes.php" class="iconos_top">Crear Cliente</a></td>
    <td width="150" class="iconos_topCENTRO"><a href="clientes_busqueda_ingreso_dato_tecnico.php" class="iconos_top">Ingresar Dato Técnico</a></td>
<td width="43" class="iconos_topCENTRO">&nbsp;</td>
<td width="122" class="iconos_topCENTRO">&nbsp;</td>

    <td width="309">&nbsp;</td>
  </tr>
</table></div>
   <div id="sistema_ingreso_cliente">
   <p class="iconos_top">Favor Ingrese el Nuevo Cliente  
   <form method="post" action="comprobacion_crear_cliente.php" onsubmit="return validarForm(this);">
     <?php if($_POST['country'] && $_POST['city'] && $_POST['zone']): ?>
     
  <? endif; ?>
     <table width="750" border="0">
  <tr>
    <td width="148"><span class="style1 style2">Razon Social</span></td>
    <td colspan="3"><input name="cliente"    type="text"   size="80" class="EDITARCopia"/></td>
    <td width="105" class="style1 style2">&nbsp;</td>
    </tr>
  <tr>
    <td><span class="style1 style2">Rut</span></td>
    <td colspan="3"><input name="rut" type="text" size="25" class="EDITARCopia"/></td>
    <td class="style1 style2">&nbsp;</td>
    </tr>
  <tr>
    <td><span class="style1 style2">Giro</span></td>
    <td colspan="3"><input name="giro" type="text"  size="80" class="EDITARCopia"/></td>
    <td class="style1 style2">&nbsp;</td>
    </tr>
  <tr>
    <td><span class="style1 style2">Contacto</span></td>
    <td colspan="3"><input name="contacto" type="text"  size="80" class="EDITARCopia"/></td>
    <td class="style1 style2">&nbsp;</td>
    </tr>
  <tr>
    <td><span class="style1 style2">Telefonos</span></td>
    <td colspan="3"><input name="telefonos" type="text"  size="80" class="EDITARCopia"/></td>
    <td class="style1 style2">&nbsp;</td>
    </tr>
  <tr>
    <td><span class="style1 style2">Correos</span></td>
    <td colspan="3"><input name="correos" type="text"  size="80" class="EDITARCopia"/></td>
    <td class="style1 style2">&nbsp;</td>
    </tr>
  <tr>
    <td><span class="style1 style2">Direccion Comercial</span></td>
    <td colspan="3"><input name="direccion_comercial"    type="text"   size="80" class="EDITARCopia"/></td>
    <td class="style1 style2">&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1 style2">Region</span></td>
    <td colspan="3"><select name="country" id="country" class="EDITARCopia"></select></td>
    <td class="style1 style2">&nbsp;</td>
    </tr>
  <tr>
    <td><span class="style1 style2">Provincia</span></td>
    <td colspan="3"><select name="city" id="city" class="EDITARCopia"></select></td>
    <td class="style1 style2">&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1 style2">Comuna</span></td>
    <td colspan="3"><select name="zone" id="zone" class="EDITARCopia"></select></td>
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
	$("#country").jCombo("../../../services/getCountries.php", { selected_value : '<?php print($country_id); ?>' } );
    $("#city").jCombo("../../../services/getCities.php?id=", { 
					parent: "#country", 
					parent_value: '<?php print($country_id); ?>', 
					selected_value: '<?php print($city_id); ?>' 
				});		
    $("#zone").jCombo("../../../services/getZones.php?id=", { 
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
</script>
    <td class="style1 style2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td width="1">&nbsp;</td>
    <td class="style1 style2">&nbsp;</td>
  </tr>
  <tr>
    <td><input name="btn_submit" type="submit" class="iconos_top" value="Ingresar Cliente"></td>
    <td width="473">
      
      <div align="right">
        <input name="btn_submit2" type="reset" value="Limpiar Datos" class="iconos_top" />
      </div></td>
    <td width="1">&nbsp;</td>
    <td>&nbsp;</td>
    <td class="style1 style2">&nbsp;</td>
    </tr>
</table>
    </form></p>
   </div>
   
   <div id="index_foot"></div>
   <div id="index_footer">Sistema Gestión de Clientes y Control Interno - Netland Chile S.A. | Todos los derechos reservados &copy; 2013<p class="lp">
   Desarrollado por Luis Ponce Zúñiga</div>
   
   
  </div>
  <script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../../SpryAssets/SpryMenuBarRightHover.gif"});
  </script>
  </body>
  </html>
<?php
mysql_free_result($SG_Login_Usuario);
mysql_free_result($cliente);
mysql_free_result($bienvenido);
?>