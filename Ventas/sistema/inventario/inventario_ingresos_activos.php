<?php
include("../../../system/config.php");
include("../../../cache/cache.php");
$sql_bodega=mysql_query("SELECT bodega FROM INV_bodega ORDER BY bodega ASC");
$sql_marca=mysql_query("SELECT marca FROM INV_marca ORDER BY marca ASC");
$sql_modelo=mysql_query("SELECT modelo FROM INV_modelo ORDER BY modelo ASC");
$sql_tipo=mysql_query("SELECT tipo FROM INV_tipo ORDER BY tipo ASC");
$sql_proveedor=mysql_query("SELECT nombre FROM INV_proveedor ORDER BY nombre ASC");
$sql_responsable=mysql_query("SELECT nombre FROM usuarios ORDER BY nombre ASC");
$sql_estado=mysql_query("SELECT estado FROM INV_estado ORDER BY estado ASC");


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
$bienvenido2=mysql_query("SELECT nombre FROM usuarios WHERE usuario='$usuario'");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
   <link href="../../../css/sistema.css" rel="stylesheet" type="text/css" />
  <link href="../../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
  <link href="../../../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
  <link href="../../../js/jquery-ui-1.7.2.custom.css" rel="stylesheet" type="text/css" />
  <script src="../../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script type="text/javascript" src="../../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../../js/jquery-ui.min.js"></script>
<script type="text/javascript">
jQuery(function($){
	$.datepicker.regional['en'] = {
		closeText: 'Cerrar',
		prevText: '&#x3c;Ant',
		nextText: 'Sig&#x3e;',
		currentText: 'Hoy',
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		'Jul','Ago','Sep','Oct','Nov','Dic'],
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		weekHeader: 'Sm',
		dateFormat: 'dd/mm/yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['en']);
});    
 
$(document).ready(function() {
   $("#datepicker").datepicker();
 });

</script>
   <script type="text/javascript">
function validarForm(formulario) {
  if(formulario.serial.value.length==0) { //comprueba que no esté vacío
    formulario.serial.focus();   
    alert('No has escrito el Numero de Serie'); 
    return false; //devolvemos el foco
  }
  if(formulario.mac.value.length==0) { //comprueba que no esté vacío
    formulario.mac.focus();
    alert('No has escrito MAC');
    return false;
  }
 if(formulario.tipo.value.length==0) { //comprueba que no esté vacío
    formulario.tipo.focus();
    alert('No has seleccionado Tipo');
    return false;
  }
   if(formulario.marca.value.length==0) { //comprueba que no esté vacío
    formulario.marca.focus();
    alert('No has seleccionado Marca');
    return false;
  }
   if(formulario.modelo.value.length==0) { //comprueba que no esté vacío
    formulario.modelo.focus();
    alert('No has seleccionado Modelo');
    return false;
  }
   if(formulario.proveedor.value.length==0) { //comprueba que no esté vacío
    formulario.proveedor.focus();
    alert('No has seleccionado Proveedor');
    return false;
  }
   if(formulario.bodega.value.length==0) { //comprueba que no esté vacío
    formulario.bodega.focus();
    alert('No has seleccionado Bodega');
    return false;
  }
   if(formulario.factura.value.length==0) { //comprueba que no esté vacío
    formulario.factura.focus();
    alert('No has escrito numero de factura');
    return false;
  }
   if(formulario.fecha.value.length==0) { //comprueba que no esté vacío
    formulario.fecha.focus();
    alert('No has seleccionado Fecha');
    return false;
  }
   if(formulario.garantia.value.length==0) { //comprueba que no esté vacío
    formulario.garantia.focus();
    alert('No has escrito Garantia');
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
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Sistema Gestion Clientes</title>
  <style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(../../../images/imagen.png);
}
  </style>
  <link href="../../../js/inventario - ingresos.css" rel="stylesheet" type="text/css" />
  <link href="../../../js/inventario.css" rel="stylesheet" type="text/css" />
  </head>
    
  <body>
  <div id="contenedor">
   <div id="index_top_top"></div>
   <div id="index_welcome">
     <div id="sistema_welcome_left"><?php while($row=mysql_fetch_array($bienvenido)){
     	echo "Bienvenido ".$row['nombre'];
	
	}?></div>
     <div id="sistema_welcome_top"><table width="359" border="0">
         <tr>
           <td width="270"></td>
           <td width="79"><span class="Blancos_chico"><a href="../sistema.php" class="Blancos_chico">Inicio</a>  |</span><a href="<?php echo $logoutAction ?>" class="Blancos_chico"> Salir</a></td>
         </tr>
       </table></div>
   </div>
   <div id="index_top"></div>
   <div id="index_menu">
   <div id="index_menu_principal">
     <ul id="MenuBar1" class="MenuBarHorizontal">
       <li><a href="../clientes/clientes.php" class="BlancosCopia">Clientes</a>       </li>
       <li><a href="inventario.php" class="BlancosSelection">Inventario</a></li>
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


<table width="900" border="0">
  <tr>
    <td width="200" class="iconos_topCENTRO"><a href="buscar_activos.php" class="iconos_top">Sección Busqueda</a></td>
    <td width="200" class="iconos_topCENTRO"><a href="inventario_ingresos.php" class="iconos_top">Sección Ingresos</a></td>
    <td width="200" class="iconos_topCENTRO"><a href="inventario_modificar.php" class="iconos_top">Sección Editar</a></td>
    <td width="382">&nbsp;</td>
  </tr>
</table></div>
   <div id="inventario_modulo_ingresos_activos">
     <div id="inventario_ingresos_menu_left2">
       <div class="iconos_top" id="inventario_modulo_left_menu">Menu Ingresos</div>
       <div id="inventario_menu_lateral">
       <ul id="MenuBar3" class="MenuBarVertical">
         <li><a href="inventario_ingresos_activos.php" class="ROJO">Activos</a>         </li>
         <li><a href="inventario_ingresos_bodega.php" class="negros">Bodegas</a></li>
         <li><a href="inventario_ingresos_proveedor.php" class="negros">Proveedores</a>         </li>
         <li><a href="inventario_ingresos_tipo.php" class="negros">Tipo </a></li>
         <li><a href="inventario_ingresos_marca.php" class="negros">Marca</a></li>
         <li><a href="inventario_ingresos_modelo.php" class="negros">Modelo</a></li>
         <li><a href="#" class="negros">Estado</a></li>
       </ul>
       </div>
       <div id="nota">
         <div id="notita">
           <p><em><strong>Nota:</strong></em></p>
           <p><em>Antes de ingresar activos recuerde que debe ingresar Proveedor,Bodega de destino,marca,modelo y tipo.</em></p>
         </div>
       </div>
       
     </div>
<div id="inventario_modulo_right_ingresos">
      <div class="iconos_top" id="inventario_menu_rght">Ingresar Activos</div>
       <table width="494" border="0">  <form method="post" action="inventario_comprobacion_ingreso_activos.php" onsubmit="return validarForm(this);">
         <tr>
           <td width="247">&nbsp;</td>
           <td colspan="2">&nbsp;</td>
         </tr>
         <tr>
           <td>Número de Serie</td>
           <td colspan="2"><input name="serial" type="text" class="EDITARCopiaCopia2Copia" i size="40"/></td>
         </tr>
         <tr>
           <td height="20">Mac Address</td>
           <td colspan="2"><input name="mac" type="text" class="EDITARCopiaCopia2Copia"  size="40"/></td>
         </tr>
         <tr>
           <td height="21">Tipo Activo</td>
           <td colspan="2"><select name="tipo" class="EDITARCopiaCopia2Copia"  ><option value='' size="30">-------Seleccione Opcion-------</option>
                    <?php while($row = mysql_fetch_array($sql_tipo)){ ?>
                    <option value="<?php echo $row['tipo']; ?>" size="30"><?php echo $row['tipo']; ?></option>
        <?php } ?>
      </select></td>
         </tr>
         <tr>
           <td>Marca Activo</td>
           <td colspan="2"><select name="marca" class="EDITARCopiaCopia2Copia"  ><option value=''>-------Seleccione Opcion-------</option>
                    <?php while($row = mysql_fetch_array($sql_marca)){ ?>
                    <option value="<?php echo $row['marca']; ?>" size="30"><?php echo $row['marca']; ?></option>
        <?php } ?>
      </select></td>
         </tr>
         <tr>
           <td>Modelo Activo</td>
           <td colspan="2"><select name="modelo" class="EDITARCopiaCopia2Copia"  ><option value=''>-------Seleccione Opcion-------</option>
                    <?php while($row = mysql_fetch_array($sql_modelo)){ ?>
                    <option value="<?php echo $row['modelo']; ?>" size="30"><?php echo $row['modelo']; ?></option>
        <?php } ?>
      </select></td>
         </tr>
         <tr>
           <td>Proveedor</td>
           <td colspan="2"><select name="proveedor" class="EDITARCopiaCopia2Copia"  ><option value=''>-------Seleccione Opcion-------</option>
                    <?php while($row = mysql_fetch_array($sql_proveedor)){ ?>
                    <option value="<?php echo $row['nombre']; ?>" size="30"><?php echo $row['nombre']; ?></option>
        <?php } ?>
      </select></td>
         </tr>
         <tr>
           <td>Bodega Destino</td>
           <td colspan="2"><select name="bodega" class="EDITARCopiaCopia2Copia"  ><option value=''>-------Seleccione Opcion-------</option>
                    <?php while($row = mysql_fetch_array($sql_bodega)){ ?>
                    <option value="<?php echo $row['bodega']; ?>" size="30"><?php echo $row['bodega']; ?></option>
        <?php } ?>
      </select></td>
         </tr>
         <tr>
           <td>Número Factura</td>
           <td colspan="2"><input name="factura" type="text" class="EDITARCopiaCopia2Copia" id="usuario8" size="40"/></td>
         </tr><?php while($row2 = mysql_fetch_array($bienvenido2)){ ?>
         <input name="creador"  type="hidden" value="<?php echo $row2['nombre']; ?>"  size="30"/><?php } ?>
         <tr>
           <td>Fecha Adquisición</td>
           <td colspan="2"><input name="fecha" type="text" class="EDITARCopiaCopia2Copia" id="datepicker" size="40"/></td>
         </tr>
         <tr>
           <td>Garantía </td>
           <td colspan="2"><input name="garantia" type="text" class="EDITARCopiaCopia2Copia" id="usuario10" size="40"/></td>
         </tr>
         <tr>
           <td>Cantidad</td>
           <td colspan="2"><input name="cantidad" type="text" class="EDITARCopiaCopia2Copia" id="usuario11" size="40"/></td>
         </tr>
         <tr>
           <td>Precio</td>
           <td colspan="2"><input name="precio" type="text" class="EDITARCopiaCopia2Copia" id="usuario12" size="40"/></td>
         </tr>
         <tr>
           <td>Estado Activo</td>
           <td colspan="2"><select name="estado" class="EDITARCopiaCopia2Copia"  ><option value=''>-------Seleccione Opcion-------</option>
                    <?php while($row = mysql_fetch_array($sql_estado)){ ?>
                    <option value="<?php echo $row['estado']; ?>" size="30"><?php echo $row['estado']; ?></option>
        <?php } ?>
      </select></td>
         </tr>
         <tr>
           <td>Responsable Inventario</td>
           <td colspan="2"><select name="responsable" class="EDITARCopiaCopia2Copia"  ><option value=''>-------Seleccione Opcion-------</option>
                    <?php while($row = mysql_fetch_array($sql_responsable)){ ?>
                    <option value="<?php echo $row['nombre']; ?>" size="30"><?php echo $row['nombre']; ?></option>
        <?php } ?>
      </select></td>
         </tr>
         <tr>
           <td>Comentario</td>
           <td colspan="2"><input name="comentario" type="text" class="EDITARCopiaCopia2Copia" id="usuario2" size="40"/></td>
         </tr>
         <tr>
           <td><input  type="submit" class="EDITARCopiaCopia2Copia"   value="Ingresar Activo"/></td>
           <td width="50"><input  type="reset" class="EDITARCopiaCopia2Copia"    value="Restaurar Valores"/></td>
           <td width="183">&nbsp;</td>
         </tr></FORM>
       </table>
       <p>&nbsp;</p>
     </div>
   </div>
   
   <div id="index_foot"></div>
   <div id="index_footer">Sistema Gestión de Clientes y Control Interno - Netland Chile S.A. | Todos los derechos reservados &copy; 2013<p class="lp">
   Desarrollado por Luis Ponce Zúñiga
</div>
   
   
  </div>
  <script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../../SpryAssets/SpryMenuBarRightHover.gif"});
var MenuBar3 = new Spry.Widget.MenuBar("MenuBar3", {imgRight:"../../../SpryAssets/SpryMenuBarRightHover.gif"});
  </script>
  </body>
  </html>
<?php
mysql_free_result($SG_Login_Usuario);
mysql_free_result($cliente);
mysql_free_result($sql_bodega);
mysql_free_result($bienvenido);
mysql_free_result($sql_marca);
mysql_free_result($sql_modelo);
mysql_free_result($sql_tipo);
mysql_free_result($sql_responsable);
mysql_free_result($sql_proveedor);
mysql_free_result($sql_estado);

mysql_close();
?>