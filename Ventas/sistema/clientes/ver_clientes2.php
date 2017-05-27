<?php
include("../../../system/config.php");
include("../../../services/config.php");

$cliente = $_GET["cliente"];
$alias = $_GET["alias"];
$rut = $_GET["rut"];
//$contactos = $_GET["contactos"];
//$ip= $_GET["ip"];
//$mac_su = $_GET["mac_su"];

$sql_cliente=mysql_query("SELECT * FROM SP_dato_cliente WHERE cliente='$cliente' and alias='$alias' or rut='$rut' and alias='$alias'");

$ticket=mysql_query("SELECT numero,cliente,tipo FROM TICKET WHERE cliente='$cliente' ORDER BY fecha_creacion DESC LIMIT 6");//initialize the session
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
$cliente=$_SESSION['MM_Username'];
$bienvenido=mysql_query("SELECT nombre FROM usuarios WHERE usuario='$cliente'");

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
	background-image: url(../../../images/imagen.png);
}
  </style>
  <link href="../../../css/sistema.css" rel="stylesheet" type="text/css" />
  <link href="../../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
  <link href="../../../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
  <script src="../../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
    <link href="../../../js/jquery-ui-1.7.2.custom.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="../../../script/jquery.js"></script>
  <script type="text/javascript" src="../../../script/jquery.jCombo.min.js"></script>
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
   $("#datepicker2").datepicker();
 });

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
   <div id="inventario_submenu"><table width="950" border="0">
  <tr>
    <td width="150" class="iconos_topCENTRO"><a href="clientes_busqueda.php" class="iconos_top">Buscar Cliente</a></td>
    <td width="150" class="iconos_topCENTRO"><a href="crear_clientes.php" class="iconos_top">Crear Cliente</a></td>
    <td width="150" class="iconos_topCENTRO"><a href="clientes_busqueda_ingreso_dato_tecnico.php" class="iconos_top">Ingresar Dato Técnico</a></td>
<td width="43" class="iconos_topCENTRO">&nbsp;</td>
<td width="122" class="iconos_topCENTRO">&nbsp;</td>

    <td width="309">&nbsp;</td>
  </tr>
</table></div>
   <div id="sistema_ingreso_dato_tecnico">
   <table width="880" border="0">
     <tr>
       <td width="921" bgcolor="#363636" class="Titulos">Datos Comerciales</td>
     </tr>
   </table>
   <table width="880" border="0">
     
  <td width="109"><tr> <FORM name=tuformulario autocomplete="off" ACTION="opcion.php" METHOD="POST">
    <td width="179" >Razón Social</td><?php while($row=mysql_fetch_array($sql_cliente)){?>
    <td width="500"> <input name="cliente"  readonly="readonly" value="<?php echo $row['cliente']; ?>"  type="TEXT"   size="80" class="iconos_top"/> </td>
    <td width="100" >Fecha Inst.</td>
    <td width="143">
      
      <div align="right">
        <input name="fecha_inst" type="TEXT" value="<?php echo $row['fecha_inst']; ?>" readonly="readonly" size="15" class="iconos_top"/>
      </div></td></tr>
  <tr>
    <td class="iconos_top">Rut</td>
    <td width="543"><input name="rut" type="TEXT" readonly="readonly" value="<?php echo $row['rut']; ?>" size="25" class="iconos_top"/></td>
    <td width="92" class="style1 style2">Instalador</td>
    <td width="118"><div align="right">
      <input name="fecha_inst2" type="text" value="<?php echo $row['instalador']; ?>" readonly="readonly" size="15" class="iconos_top"/>
    </div></td>
  </tr>
  <tr>
    <td class="iconos_top">Contacto</td>
    <td><input name="contactos" type="TEXT" readonly="readonly" value="<?php echo $row['contactos']; ?>" size="40" class="iconos_top"/></td>
    <td>Plan</td>
    <td><div align="right">
      <input name="fecha_inst3" type="text" value="<?php echo $row['plan']; ?>" readonly="readonly" size="15" class="iconos_top"/>
    </div></td>
  </tr>
  <tr>
    <td class="style1 style2">Contrato</td>
    <td><input name="contrato" type="TEXT" readonly="readonly" value="<?php echo $row['contrato']; ?>" size="25" class="iconos_top"/></td>
    <td>Renta </td>
    <td><div align="right">
      <input name="renta" type="TEXT" readonly="readonly"  size="15" value="<?php echo $row['renta']; ?>"class="iconos_top"/>
    </div></td>
  </tr>
  <tr>
    <td class="style1 style2">Telefonos</td>
    <td><input name="telefonos" type="text"  readonly="readonly" value="<?php echo $row['telefonos']; ?>" size="80" class="iconos_top"/></td>
    <td>Velocidad</td>
    <td><div align="right">
      <input name="velocidad" type="text" readonly="readonly" value="<?php echo $row['velocidad']; ?>" size="15" class="iconos_top"/>
    </div></td>
  </tr>
  <tr>
    <td class="style1 style2">Correos</td>
    <td><input name="correos" type="text" readonly="readonly" value="<?php echo $row['correos']; ?>"  size="80" class="iconos_top"/></td>
    <td>Tipo</td>
    <td><div align="right">
      <input name="fecha_inst4" type="text" value="<?php echo $row['tipo']; ?>" readonly="readonly" size="15" class="iconos_top"/>
    </div></td>
  </tr>
  <tr>
    <td class="style1 style2">Direccion Comercial</td>
    <td><input name="direccion_comercial"  readonly="readonly" value="<?php echo $row['direccion_comercial']; ?>"  type="text"  size="80" class="iconos_top"/></td>
    <td class="style1 style2">Fidelizado</td>
    <td><div align="right">
      <input name="fidelizado" type="text"  readonly="readonly" value="<?php echo $row['fidelizado']; ?>" size="15" class="iconos_top"/>
    </div></td>
  </tr>
  <tr>
    <td class="style1 style2">Direccion Instalacion</td>
    <td><input name="direccion_instalacion"   readonly="readonly" value="<?php echo $row['direccion_instalacion']; ?>" type="text"  size="80" class="iconos_top"/></td>
    <td>Estado</td>
    <td><div align="right">
      <input name="fecha_inst5" type="text" value="<?php echo $row['estado']; ?>" readonly="readonly" size="15" class="iconos_top"/></td>
  </tr>
  <tr>
    <td class="style1 style2">Nota</td>
    <td>
      <textarea name="nota" cols="79" rows="1" readonly="readonly"  class="iconos_top" id="textarea"><?php echo $row['nota']; ?></textarea></td>
    <td class="style1 style2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="style1 style2">&nbsp;</td>
    <td>&nbsp;</td>
    <td class="style1 style2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   </table>
   <table width="880" border="0">
     <tr>
       <td width="921" bgcolor="#273636" class="Titulos">Datos Técnicos</td>
     </tr>
   </table>
   <div id="datos_tecnicos_left"><table width="560" border="0">
  
  <tr>
    <td width="150"><div align="center" class="style1 style2">Mac SU</div></td>
    <td width="150"><div align="center" class="style1 style2">Modelo</div></td>
    <td width="150"><div align="center" class="style1 style2">IP SU</div></td>
    <td width="150"><div align="center" class="style1 style2">Puerto SU</div></td>
    </tr>
  <tr>
    <td><div align="center">
      <input name="modelo_su" readonly="readonly" value="<?php echo $row['mac_su']; ?>"type="text" size="16" class="iconos_topCENTRO"/>
    </div></td>
    <td><div align="center">
      <input name="modelo_su" readonly="readonly" value="<?php echo $row['modelo_su']; ?>"type="text" size="16" class="iconos_topCENTRO"/>
    </div></td>
    <td><div align="center">
      <input name="ip_su" readonly="readonly" type="text" value="<?php echo $row['ip_su']; ?>"size="16" class="iconos_topCENTRO"/>
    </div></td>
    <td><div align="center">
      <input name="puerto_su" readonly="readonly" value="<?php echo $row['puerto_su']; ?>"type="text" size="16" class="iconos_topCENTRO"/>
    </div></td>
    </tr>
  <tr>
    <td><div align="center" class="style1 style2">Señal</div></td>
    <td><div align="center" class="style1 style2">Frecuencia</div></td>
    <td><div align="center" class="style1 style2">Estación - Repetidor</div></td>
    <td><div align="center" class="style1 style2">AP</div></td>
    </tr>
  <tr>
    <td><div align="center">
      <input name="modelo_su3" readonly="readonly" value="<?php echo $row['senal']; ?>" type="text" size="16" class="iconos_topCENTRO"/>
    </div></td>
    <td><div align="center">
      <input name="modelo_su5" readonly="readonly"  type="text" value="<?php echo $row['frec']; ?>"size="16" class="iconos_topCENTRO"/>
    </div></td>
    <td><div align="center">
      <input name="vlan" readonly="readonly"  type="text" size="16" value="<?php echo $row['estacion']; ?>" class="iconos_topCENTRO"/>
    </div></td>
    <td><div align="center" class="LINKCopia">
   
    <?php $ap=$row['ap']; $puerto=$row['puerto_su']; $http="<a href='http://$ap:$puerto' style='color:#72B114; text-decoration:none'>$ap</a>"; echo $http;?>
      
    </div></td>
    </tr>
  <tr>
    <td><div align="center" class="style1 style2">Vlan</div></td>
    <td><div align="center" class="style1 style2">Alias SU</div></td>
    <td><div align="center" class="style1 style2">Mac Router</div></td>
    <td><div align="center" class="style1 style2">Modelo Router</div></td>
    </tr>
  <tr>
    <td><div align="center"><input name="modelo_su2" readonly="readonly" type="text" value="<?php echo $row['vlan']; ?>"size="16" class="iconos_topCENTRO"/></div></td>
    <td><div align="center"><input name="alias" readonly="readonly" type="text" value="<?php echo $row['alias']; ?>"size="16" class="iconos_topCENTRO"/></div></td>
    <td><div align="center"><input name="modelo_su8" readonly="readonly" type="text" value="<?php echo $row['mac_router']; ?>"size="16" class="iconos_topCENTRO"/></div></td>
    <td><div align="center"><input name="modelo_su9" readonly="readonly" type="text" value="<?php echo $row['modelo_router']; ?>"size="16" class="iconos_topCENTRO"/></div></td>
    </tr>
  <tr>
    <td><div align="center" class="style1 style2">Configuración</div></td>
    <td><div align="center" class="style1 style2">Dirección IP </div></td>
    <td><div align="center" class="style1 style2">Puerto Acceso</div></td>
    <td><div align="center" class="style1 style2">Clave WI-FI</div></td>
    </tr>
  <tr>
    <td><div align="center">
      <input name="modelo_su4" readonly="readonly" type="text" value="<?php echo $row['configuracion']; ?>"size="16" class="iconos_topCENTRO"/>
    </div></td>
    <td><div align="center">
      <input name="modelo_router" readonly="readonly" type="text" size="16" value="<?php echo $row['ip']; ?>"class="iconos_topCENTRO"/>
    </div></td>
    <td><div align="center">
      <input name="modelo_su6" readonly="readonly" type="text" size="16" value="<?php echo $row['puerto_router']; ?>"class="iconos_topCENTRO"/>
    </div></td>
    <td><div align="center">
      <input name="ip" type="text" readonly="readonly" size="16" value="<?php echo $row['wifi']; ?>"class="iconos_topCENTRO"/><?php }?>
    </div></td>
    </tr>
</table>
   </div>

   <div id="dato_tecnico_ticket">
     <p><span class="iconos_top"><strong>TICKET</strong></span>
<?php

if (mysql_num_rows($ticket)>0)
{
echo "<center><table width='278' border = '0' cellspacing = '1' cellpadding='3'></center> \n";
echo "<tr> \n";


echo "</tr> \n";

while ($row = mysql_fetch_row($ticket)){
echo "<tr> \n";
echo "<td><a style='color:#000'  href='../ticket/comprobacion_editar.php?numero=$row[0]&cliente=$row[1]' >$row[0]</a></td> \n";
echo "<td>$row[2]</td> \n";

echo "</tr> \n";   


}
echo "</table></center> \n";

} else  if (mysql_num_rows($sql)==0){
echo "<p>";
echo "<p>";
echo "<p>";
echo "<p>";
echo "Cliente sin ticket creados.";
}

mysql_free_result($sql);
mysql_free_result($sql2);
?>
     </p>
     <p>&nbsp;</p>
     <p>&nbsp;</p>
     <p>&nbsp;</p>
     <p>&nbsp;</p>
   </div>
   
   <p>
</div>
   <table width="880"  border="0" align="center" class="iconos_topCENTRO">
     <tr>
       <td width="281"><input name="modificar" type="submit" class="INGRESAR_clientes" id="button" value="Modificar Registro Tecnico" /></td>
       <td width="296">&nbsp;</td>
       <td width="289"><input name="ticket" type="submit" class="INGRESAR_clientes" id="button2" value="Crear Nuevo Ticket" /></td>
     </tr>
   </table>
   <div id="index_foot"></div>
   <div id="index_footer">Sistema Gestión de Clientes y Control Interno - Netland Chile S.A. | Todos los derechos reservados &copy; 2013<p class="lp">
   Desarrollado por Luis Ponce Zúñiga</div>
 
  </div>
 
  <script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../../SpryAssets/SpryMenuBarRightHover.gif"});
  </script>
  </body>
  </html>
