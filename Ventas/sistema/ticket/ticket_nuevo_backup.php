<?php
include("../../../system/config.php");
include("../../../cache/cache.php");
$cliente= $_GET["cliente"];
$sql_tipo=mysql_query("SELECT tipo FROM TICKET_tipo ORDER BY tipo ASC");
$sql_departamento=mysql_query("SELECT departamento FROM TICKET_departamento ORDER BY departamento ASC");
$sql_origen=mysql_query("SELECT origen FROM TICKET_origen ORDER BY origen ASC");
$sql_prioridad=mysql_query("SELECT prioridad FROM TICKET_prioridad ");
$sql_hora=mysql_query("SELECT hora FROM TICKET_hora ");
$sql_responsable=mysql_query("SELECT nombre FROM usuarios ORDER BY nombre ASC");
$fecha=date("Y-m-d H:i:s");


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
$MM_authorizedUsers = "1";
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
<script type="text/javascript" src="../../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../../js/jquery-ui.min.js"></script>
  <script type='text/javascript' src='../../../javascript/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../../../javascript/jquery.autocomplete.css" />
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
		dateFormat: 'yy/mm/dd',
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
	background-image: url(../../../images/repeat.png);
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
    <td width="221"></td>
    <td width="128"><a href="../sistema.php" class="iconos_top">Inicio</a> |&nbsp;Admin |<a href="<?php echo $logoutAction ?>" class="iconos_top"> Salir</a></td>
    </tr>
  </table></div>
   </div>
   <div id="index_top">
     <div id="index_logo"></div>
   </div>
   <div id="index_menu">
   <div id="index_menu_principal">
     <ul id="MenuBar1" class="MenuBarHorizontal">
       <li><a href="../clientes/clientes.php" class="Blancos">Clientes</a>       </li>
       <li><a href="../../../Supervisor/sistema/ticket/inventario.php" class="Blancos">Inventario</a></li>
       <li><a href="#" class="CLASE_CLIENTES">Ticket</a>       </li>
       <li><a href="#" class="Blancos">Radius</a></li>
       <li><a href="#" class="Blancos">Intranet</a></li>
       <li><a href="../radio planning/radio_planning.php" class="Blancos">Radio Planning</a></li>
     </ul>
      </div>
   </div>
   <div id="inventario_submenu">
     <div id="inventario_sub_menu_1"> 
       <ul id="MenuBar2" class="MenuBarHorizontal">
         <li><a href="../../../Supervisor/sistema/ticket/buscar_activos.php" class="negros">Abiertos</a>         </li>
         <li><a href="../../../Supervisor/sistema/ticket/inventario_ingresos.php" class="negros">Incumplidos</a></li>
         <li><a href="../../../Supervisor/sistema/ticket/inventario_modificar.php" class="negros">Cerrados</a></li>
         <li><a href="#" class="ROJO">Nuevo</a></li>
         <li><a href="#" class="negros">Indicadores</a></li>
         <li><a href="#" class="negros">Informes</a></li>
       </ul>
     </div>
   </div>
   <div id="inventario_modulo_ingresos_activos4">
     <div id="crear_ticket">
      <div class="LINKCopia" id="inventario_menu_rght">Nuevo Ticket</div>
       <table width="559" border="0">  <form method="post"  name=tuformulario autocomplete="off" action="ticket_comprobacion_nuevo.php" onsubmit="return validarForm(this);">
         <tr>
           <td width="168">&nbsp;</td>
           <td colspan="2"></td>
         </tr>
         <tr>
           <td>Seleccione Cliente</td>
           <td colspan="2"><input name="cliente" type="text" value="<?php echo $cliente; ?>" class="iconos_top" id="course" size="50"/></td>
         </tr>
         <tr>
           <td height="20">Origen del Ticket</td>
           <td colspan="2"><select name="origen" class="iconos_top"  >
             <option value='' size="30">-------Seleccione Opcion-------</option>
             <?php while($row = mysql_fetch_array($sql_origen)){ ?>
             <option value="<?php echo $row['origen']; ?>" size="30"><?php echo $row['origen']; ?></option>
             <?php } ?>
           </select></td>
         </tr>
         <tr>
           <td height="21">Departamento</td>
           <td colspan="2"><select name="departamento" class="iconos_top"  ><option value='' size="30">-------Seleccione Opcion-------</option>
                    <?php while($row = mysql_fetch_array($sql_departamento)){ ?>
                    <option value="<?php echo $row['departamento']; ?>" size="30"><?php echo $row['departamento']; ?></option>
        <?php } ?>
      </select></td>
         </tr>
         <tr>
           <td>Tipo</td>
           <td colspan="2">&nbsp;</td>
         </tr>
         <tr>
           <td>Sub Tipo</td>
           <td colspan="2"><select name="tipo" class="iconos_top"  ><option value=''>-------Seleccione Opcion-------</option>
                    <?php while($row = mysql_fetch_array($sql_tipo)){ ?>
                    <option value="<?php echo $row['tipo']; ?>" size="30"><?php echo $row['tipo']; ?></option>
        <?php } ?>
      </select></td>
         </tr>
         <tr>
           <td>Comentario</td>
           <td colspan="2"><label for="textarea"></label>
            <textarea name="comentario" cols="55" rows="5" class="negros" id="textarea"></textarea></td>
         </tr>
         <tr>
           <td>Fecha Máxima de Solución</td>
           <td colspan="2"><input name="fecha_solucion" type="text" class="iconos_top" id="datepicker" size="20"/></td>
         </tr>
         <tr>
           <td>Hora Estimada Solución</td>
           <td colspan="2"><select name="hora" class="iconos_top"  >
             <option value=''>-------Seleccione Opcion-------</option>
             <?php while($row = mysql_fetch_array($sql_hora)){ ?>
             <option value="<?php echo $row['hora']; ?>" size="30"><?php echo $row['hora']; ?></option>
             <?php } ?>
           </select></td>
         </tr>
         <tr>
           <td>Prioridad</td>
           <td colspan="2"><select name="prioridad" class="iconos_top"  >
             <option value=''>-------Seleccione Opcion-------</option>
             <?php while($row = mysql_fetch_array($sql_prioridad)){ ?>
             <option value="<?php echo $row['prioridad']; ?>" size="30"><?php echo $row['prioridad']; ?></option>
             <?php } ?>
           </select></td>
         </tr><?php while($row2 = mysql_fetch_array($bienvenido2)){ ?>
         <input name="usuario"  type="hidden" value="<?php echo $row2['nombre']; ?>"  size="30"/><?php } ?>
         <input name="fecha_creacion"  type="hidden" value="<?php echo $fecha; ?>"  size="30"/>
         <tr>
           <td>Asignar a</td>
           <td colspan="2"><select name="responsable" class="iconos_top"  >
             <option value=''>-------Seleccione Opcion-------</option>
             <?php while($row = mysql_fetch_array($sql_responsable)){ ?>
             <option value="<?php echo $row['nombre']; ?>" size="30"><?php echo $row['nombre']; ?></option>
             <?php } ?>
           </select></td>
         </tr>
         <tr>
           <td><input  type="submit" class="iconos_top"   value="Crear Ticket"/></td>
           <td width="86">&nbsp;</td>
           <td width="291"><input  type="reset" class="iconos_top"    value="Restaurar Valores"/></td>
         </tr></FORM>
       </table>
       <p>&nbsp;</p>
     </div>
   </div>
   
   <div id="index_foot"></div>
   <div id="index_footer">Sistema Gestión de Clientes - Netland Chile S.A. - Todos los derechos reservados</div>
   
   
  </div>
  <script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../../SpryAssets/SpryMenuBarRightHover.gif"});
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgDown:"../../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../../SpryAssets/SpryMenuBarRightHover.gif"});
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