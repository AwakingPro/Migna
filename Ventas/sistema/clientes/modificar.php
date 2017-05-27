<?php
include("../../../system/config.php");
include("../../../services/config.php");
$cliente = $_GET["cliente"];
$alias = $_GET["alias"];
$sql_cliente=mysql_query("SELECT cliente FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'");
$sql_contrato=mysql_query("SELECT contrato FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias' ");
$sql_direccion_instalacion=mysql_query("SELECT direccion_instalacion FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias' ");
$sql_fecha_inst=mysql_query("SELECT fecha_inst FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias' ");


$sql_rut=mysql_query("SELECT rut FROM SP_dato_cliente WHERE cliente='$cliente'  AND  alias='$alias'");
$sql_contacto=mysql_query("SELECT contactos FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias' ");
$sql_telefonos=mysql_query("SELECT telefonos FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias' ");
$sql_correos=mysql_query("SELECT correos FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias' ");
$sql_direccion_comercial=mysql_query("SELECT direccion_comercial FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias' ");
$sql_usuarios=mysql_query("SELECT nombre FROM usuarios ORDER by nombre ASC  ");
$sql_instalador=mysql_query("SELECT instalador FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  ");



$sql_renta2=mysql_query("SELECT renta FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  ");

$sql_velocidad2=mysql_query("SELECT velocidad FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  ");

$sql_nota2=mysql_query("SELECT nota FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  ");

$sql_tipo2=mysql_query("SELECT tipo FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  ");

$sql_fidelizado2=mysql_query("SELECT fidelizado FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  ");

$sql_estado2=mysql_query("SELECT estado FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  ");



$sql_mac_su2=mysql_query("SELECT mac_su FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  ");
$sql_mac_antigua=mysql_query("SELECT mac_su FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  ");

$sql_modelo_su2=mysql_query("SELECT modelo_su FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  ");
$sql_puerto_su2=mysql_query("SELECT puerto_su FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  ");
$sql_senal2=mysql_query("SELECT senal FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  ");
$sql_frec2=mysql_query("SELECT frec FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  ");
$sql_estacion2=mysql_query("SELECT estacion FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  ");
$sql_ap2=mysql_query("SELECT ap FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  ");
$sql_vlan2=mysql_query("SELECT vlan FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  ");
$sql_alias2=mysql_query("SELECT alias FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  ");
$sql_mac_router2=mysql_query("SELECT mac_router FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  ");
$sql_modelo_router2=mysql_query("SELECT modelo_router FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  ");
$sql_configuracion2=mysql_query("SELECT configuracion FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  ");
$sql_ip2=mysql_query("SELECT ip FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  ");
$sql_puerto_router2=mysql_query("SELECT puerto_router FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  ");
$sql_wifi2=mysql_query("SELECT wifi FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  ");
$sql_ipsu2=mysql_query("SELECT ip_su FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  ");









$sql_plan=mysql_query("SELECT plan FROM SP_row_plan ORDER by plan ASC  ");
$sql_plan2=mysql_query("SELECT plan FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  ");
$sql_tipo=mysql_query("SELECT tipo FROM SP_row_tipo ORDER by tipo ASC  ");
$sql_estado=mysql_query("SELECT estado FROM SP_row_estado ORDER by estado ASC  ");
$sql_mac_su=mysql_query("SELECT mac FROM INV_activos_paso ORDER by mac ASC  ");
$sql_mac_router=mysql_query("SELECT mac FROM INV_activos_paso ORDER by mac ASC  ");
$sql_estaciones=mysql_query("SELECT estacion FROM INT_radio_planning_estaciones ORDER by estacion ASC  ");
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
   $("#datepicker2").datepicker();
 });

</script>
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
 if(formulario.fecha_inst.value.length==0) { //comprueba que no esté vacío
    formulario.fecha_inst.focus();
    alert('No has seleccionado fecha');
    return false;
  }

   if(formulario.contactos.value.length==0) { //comprueba que no esté vacío
    formulario.contactos.focus();
    alert('No has ingresado contactos');
    return false;
  }
   if(formulario.plan.value.length==0) { //comprueba que no esté vacío
    formulario.plan.focus();
    alert('No has ingresado plan');
    return false;
  }
   if(formulario.contrato.value.length==0) { //comprueba que no esté vacío
    formulario.contrato.focus();
    alert('No has ingresado contrato');
    return false;
  }
   if(formulario.renta.value.length==0) { //comprueba que no esté vacío
    formulario.renta.focus();
    alert('No has ingresado renta');
    return false;
  }
   if(formulario.telefonos.value.length==0) { //comprueba que no esté vacío
    formulario.telefonos.focus();
    alert('No has ingresado telefonos');
    return false;
  }
   if(formulario.velocidad.value.length==0) { //comprueba que no esté vacío
    formulario.velocidad.focus();
    alert('No has ingresado velocidad');
    return false;
  }
   if(formulario.correos.value.length==0) { //comprueba que no esté vacío
    formulario.correos.focus();
    alert('No has ingresado correo');
    return false;
  }
   if(formulario.tipo.value.length==0) { //comprueba que no esté vacío
    formulario.tipo.focus();
    alert('No has seleccionado tipo de cliente');
    return false;
  }
   if(formulario.direccion_comercial.value.length==0) { //comprueba que no esté vacío
    formulario.direccion_comercial.focus();
    alert('No has ingresado direccion');
    return false;
  }

   if(formulario.direccion_instalacion.value.length==0) { //comprueba que no esté vacío
    formulario.direccion_instalacion.focus();
    alert('No has ingresado direccion de instalacion');
    return false;
  }
   if(formulario.estado.value.length==0) { //comprueba que no esté vacío
    formulario.estado.focus();
    alert('No has seleccionado estado');
    return false;
  }

   if(formulario.mac_su.value.length==0) { //comprueba que no esté vacío
    formulario.mac_su.focus();
    alert('No has seleccionado mac');
    return false;
  }
   if(formulario.modelo_su.value.length==0) { //comprueba que no esté vacío
    formulario.modelo_su.focus();
    alert('No has ingresado modelo su');
    return false;
  }
   if(formulario.ip_su.value.length==0) { //comprueba que no esté vacío
    formulario.ip_su.focus();
    alert('No has ingresado ip antena');
    return false;
  }
   if(formulario.puerto_su.value.length==0) { //comprueba que no esté vacío
    formulario.puerto_su.focus();
    alert('No has ingresado puerto su');
    return false;
  }
   if(formulario.senal.value.length==0) { //comprueba que no esté vacío
    formulario.senal.focus();
    alert('No has ingresado señal');
    return false;
  }
   if(formulario.frec.value.length==0) { //comprueba que no esté vacío
    formulario.frec.focus();
    alert('No has ingresado Frecuencia operativa');
    return false;
 }
    if(formulario.estacion.value.length==0) { //comprueba que no esté vacío
    formulario.estacion.focus();
    alert('No has seleccionado estacion');
    return false;
  }
   if(formulario.ap.value.length==0) { //comprueba que no esté vacío
    formulario.ap.focus();
    alert('No has seleccionado ap');
    return false;
  }
   if(formulario.vlan.value.length==0) { //comprueba que no esté vacío
    formulario.vlan.focus();
    alert('No has ingresado Vlan');
    return false;
  }
   if(formulario.alias.value.length==0) { //comprueba que no esté vacío
    formulario.alias.focus();
    alert('No has ingresado Alias');
    return false;
 }

   if(formulario.configuracion.value.length==0) { //comprueba que no esté vacío
    formulario.configuracion.focus();
    alert('No has seleccionado tipo de conexion');
    return false;
  }
   if(formulario.ip.value.length==0) { //comprueba que no esté vacío
    formulario.ip.focus();
    alert('No has ingresado IP');
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
       <td width="880" bgcolor="#000000" class="MENU">Modificar Datos Comerciales</td>
     </tr>
   </table>
   <table width="880" border="0">
     <FORM name=tuformulario autocomplete="off" ACTION="comprobacion_actualizar_dato_tecnico.php" METHOD="POST" onsubmit="return validarForm(this);">
  <tr>
    <td width="145" >Razón Social</td><?php while($row=mysql_fetch_array($sql_cliente)){?>
    <td width="529"> <input name="cliente"  readonly="readonly" value="<?php echo $row['cliente']; ?>"  type="TEXT"   size="80" class="iconos_top"/> </td><?PHP }?>
    <td width="95" >Fecha Inst.</td>
    <td width="139">
      
      <div align="right"><?php while($row=mysql_fetch_array($sql_fecha_inst)){?>
        <input name="fecha_inst" type="TEXT" value="<?php $fecha=date("d-m-Y",strtotime($row['fecha_inst'])); echo $fecha; ?>" id="datepicker" size="15" class="EDITAR"/>
      </div></td><?PHP }?></tr>
  <tr>
    <td class="style1 style2">Rut</td><?php while($row=mysql_fetch_array($sql_rut)){?>
    <td><input name="rut" type="TEXT" readonly="readonly" value="<?php echo $row['rut']; ?>" size="25" class="iconos_top"/><?PHP }?></td>
    <td class="style1 style2">Instalador</td><?php while($row=mysql_fetch_array($sql_instalador)){?>
    <td><div align="right"><select name="instalador" class="EDITAR"><option value='<?php echo $row['instalador']; ?>'><?php echo $row['instalador']; ?></option><?PHP }?>
                  <?php while($row=mysql_fetch_array($sql_usuarios)){?>
                    <option value="<?php echo $row['nombre']; ?>" ><?php echo $row['nombre']; ?></option>
       <?PHP }?>
      </select>
    </div></td>
  </tr>
  <tr>
    <td class="style1 style2">Contacto</td><?php while($row=mysql_fetch_array($sql_contacto)){?>
    <td><input name="contactos" type="TEXT" value="<?php echo $row['contactos']; ?>" size="40" class="EDITAR"/><?PHP }?></td>
    <td>Plan</td>
    <td><div align="right"><?php while($row=mysql_fetch_array($sql_plan2)){?>
      <select name="plan" class="EDITAR"><option value='<?php echo $row['plan']; ?>'><?php echo $row['plan']; ?></option><?PHP }?>
                   <?php while($row=mysql_fetch_array($sql_plan)){?>
                    <option value="<?php echo $row['plan']; ?>" ><?php echo $row['plan']; ?></option>
   <?PHP }?>
      </select>
    </div></td>
  </tr>
  <tr>
    <td class="style1 style2">Contrato</td><?php while($row=mysql_fetch_array($sql_contrato)){?>
    <td><input name="contrato"  value="<?php echo $row['contrato']; ?>" type="TEXT"  size="25" class="EDITAR"/></td>
    <td>Renta </td><?php }?>
    <td><div align="right"><?php while($row=mysql_fetch_array($sql_renta2)){?>
      <input name="renta" type="TEXT"  value="<?php echo $row['renta']; ?>" size="15" class="EDITAR"/>
    </div></td><?PHP }?>
  </tr>
  <tr>
    <td class="style1 style2">Telefonos</td><?php while($row=mysql_fetch_array($sql_telefonos)){?>
    <td><input name="telefonos" type="text"  value="<?php echo $row['telefonos']; ?>" size="80" class="EDITAR"/><?PHP }?></td>
    <td>Velocidad</td>
    <td><div align="right"><?php while($row=mysql_fetch_array($sql_velocidad2)){?>
      <input name="velocidad" type="text"  value="<?php echo $row['velocidad']; ?>" size="15" class="EDITAR"/>  <?PHP }?>
    </div></td>
  </tr>
  <tr>
    <td class="style1 style2">Correos</td><?php while($row=mysql_fetch_array($sql_correos)){?>
    <td><input name="correos" type="text" value="<?php echo $row['correos']; ?>"  size="80" class="EDITAR"/><?PHP }?></td>
    <td>Tipo</td>
    <td><div align="right"><?php while($row=mysql_fetch_array($sql_tipo2)){?>
     <select name="tipo" class="EDITAR"><option value='<?php echo $row['tipo']; ?>'><?php echo $row['tipo']; ?></option><?PHP }?>
                    <?php while($row=mysql_fetch_array($sql_tipo)){?>
                    <option value="<?php echo $row['tipo']; ?>" ><?php echo $row['tipo']; ?></option>
       <?PHP }?>
      </select>
    </div></td>
  </tr>
  <tr>
    <td class="style1 style2">Direccion Comercial</td><?php while($row=mysql_fetch_array($sql_direccion_comercial)){?>
    <td><input name="direccion_comercial"  value="<?php echo $row['direccion_comercial']; ?>"  type="text"  size="80" class="EDITAR"/><?PHP }?></td>
    <td class="style1 style2">Fidelizado</td>
    <td><div align="right"><?php while($row=mysql_fetch_array($sql_fidelizado2)){?>
      <input name="fidelizado" type="text" value="<?php $fecha2=date("m-d-Y",strtotime($row['fidelizado'])); echo $fecha2; ?>" id="datepicker2" size="15" class="EDITAR"/>
    </div></td><?PHP }?>
  </tr>
  <tr>
    <td class="style1 style2">Direccion Instalacion</td> <?php while($row=mysql_fetch_array($sql_direccion_instalacion)){?>
    <td><input name="direccion_instalacion"  value="<?php echo $row['direccion_instalacion'];?>"  type="text"  size="80" class="EDITAR"/></td><?PHP }?>
    <td>Estado</td><?php while($row=mysql_fetch_array($sql_estado2)){?>
    <td><div align="right"><select name="estado" class="EDITAR">
      <option value='<?php echo $row['estado'];?>'><?php echo $row['estado'];?></option><?PHP }?>
      <?php while($row=mysql_fetch_array($sql_estado)){?>
      <option value="<?php echo $row['estado']; ?>" ><?php echo $row['estado']; ?></option><?PHP }?>
    </select></td>
  </tr>
  <tr>
    <td class="style1 style2">Nota</td>
    <td><label for="textarea"></label><?php while($row=mysql_fetch_array($sql_nota2)){?>
      <textarea name="nota" value="" cols="79" rows="1" class="EDITAR" id="textarea"><?php echo $row['nota'];?></textarea></td>
    <td class="style1 style2">&nbsp;</td><?PHP }?>
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
       <td width="921" bgcolor="#000000" class="MENU">Modificar Datos Técnicos</td>
     </tr>
   </table><table width="880" border="0">
  
  <tr>
    <td width="150"><div align="center" class="style1 style2">Mac SU</div></td>
    <td width="150"><div align="center" class="style1 style2">Modelo</div></td>
    <td width="150"><div align="center" class="style1 style2">IP SU</div></td>
    <td width="150"><div align="center" class="style1 style2">Puerto SU</div></td>
    <td width="150"><div align="center" class="style1 style2">Señal</div></td>
    <td width="150"><div align="center" class="style1 style2">Frecuencia</div></td>
  </tr>
  <tr>
    <td><div align="center"> <?php while($row = mysql_fetch_array($sql_mac_su2)){ ?>
      <select name="mac_su" class="EDITAR"><option value='<?php echo $row['mac_su']; ?>'><?php echo $row['mac_su']; ?></option><?php } ?>
                    <?php while($row = mysql_fetch_array($sql_mac_su)){ ?>
                    <option value="<?php echo $row['mac']; ?>" ><?php echo $row['mac']; ?><?php } ?></option>
        
      </select>
    </div></td>
    <td><div align="center"><?php while($row = mysql_fetch_array($sql_modelo_su2)){ ?>
      <input name="modelo_su" type="text" value='<?php echo $row['modelo_su']; ?>' size="20" class="EDITAR"/>
    </div></td><?php } ?>
    <td><div align="center"><?php while($row = mysql_fetch_array($sql_ipsu2)){ ?>
      <input name="ip_su" type="text" value='<?php echo $row['ip_su']; ?>' size="15" class="EDITAR"/>
    </div></td><?php } ?>
    <td><div align="center"><?php while($row = mysql_fetch_array($sql_puerto_su2)){ ?>
      <input name="puerto_su" type="text"  value='<?php echo $row['puerto_su']; ?>' size="15" class="EDITAR"/>
    </div></td><?php } ?><?php while($row = mysql_fetch_array($sql_senal2)){ ?>
    <td><div align="center"><input name="senal"  value='<?php echo $row['senal']; ?>' type="text" size="15" class="EDITAR"/></div></td><?php } ?><?php while($row = mysql_fetch_array($sql_frec2)){ ?>
    <td><div align="center"><input name="frec"  value='<?php echo $row['frec']; ?>' type="text" size="15" class="EDITAR"/></div></td><?php } ?>
  </tr>
  <tr>
    <td><div align="center" class="style1 style2">Estación / Repetidor</div></td>
    <td><div align="center" class="style1 style2">AP</div></td>
    <td><div align="center" class="style1 style2">VLAN</div></td>
    <td><div align="center" class="style1 style2">Alias SU</div></td>
    <td><div align="center" class="style1 style2"></div></td>
       <td><div align="center" class="style1 style2"></div></td>
  </tr>
  <tr>
    <td><div align="center"><?php while($row = mysql_fetch_array($sql_estacion2)){ ?>
      <select name="estacion" class="EDITAR">
        <option value='<?php echo $row['estacion']; ?>'><?php echo $row['estacion']; ?><?php } ?></option>
        <?php while($row = mysql_fetch_array($sql_estaciones)){ ?>
        <option value="<?php echo $row['estacion']; ?>" ><?php echo $row['estacion']; ?>
          <?php } ?>
          </option>
      </select>
    </div></td>
    <td><div align="center">  <?php while($row = mysql_fetch_array($sql_ap2)){ ?>
      <select name="ap" class="EDITAR"><option value='<?php echo $row['ap']; ?>'><?php echo $row['ap']; ?></option>  <?php } ?>
                  <?php while($row = mysql_fetch_array($sql_ap)){ ?>
                    <option value="<?php echo $row['ip']; ?>" ><?php echo $row['ip']; ?><?php } ?></option>
        
      </select> 
    </div></td>
    <td><div align="center"><?php while($row = mysql_fetch_array($sql_vlan2)){ ?>
      <input name="vlan" type="text" value='<?php echo $row['vlan']; ?>' size="15" class="EDITAR"/><?php } ?>
    </div></td>
    <td><div align="center"><?php while($row = mysql_fetch_array($sql_alias2)){ ?>
      <input name="alias" type="text" value='<?php echo $row['alias']; ?>' size="15" class="EDITAR"/><?php } ?>
    </div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center" class="style1 style2">Mac Router </div></td>
    <td><div align="center" class="style1 style2">Modelo </div></td>
    <td><div align="center" class="style1 style2">Configuracion IP </div></td>
    <td><div align="center" class="style1 style2">Dirección IP </div></td>
    <td><div align="center" class="style1 style2">Puerto Acceso </div></td>
    <td><div align="center" class="style1 style2">Clave Wi-Fi</div></td>
  </tr>
  <tr>
    <td><div align="center"><?php while($row = mysql_fetch_array($sql_mac_router2)){ ?>
      <select name="mac_router" class="EDITAR">
        <option value='<?php echo $row['mac_router']; ?>'><?php echo $row['mac_router']; ?><?php } ?></option>
          <?php while($row = mysql_fetch_array($sql_mac_router)){ ?>
        <option value="<?php echo $row['mac']; ?>" ><?php echo $row['mac']; ?><?php } ?></option>
      </select>
    </div></td>
    <td><div align="center"><?php while($row = mysql_fetch_array($sql_modelo_router2)){ ?>
      <input name="modelo_router" value='<?php echo $row['modelo_router']; ?>' type="text" size="20" class="EDITAR"/><?php } ?>
    </div></td>
    <td><div align="center"><?php while($row = mysql_fetch_array($sql_configuracion2)){ ?>
      <select name="configuracion" class="EDITAR">
        <option value='<?php echo $row['configuracion']; ?>'><?php echo $row['configuracion']; ?><?php } ?></option>
        <?php while($row = mysql_fetch_array($sql_configuracion)){ ?>
        <option value="<?php echo $row['configuracion']; ?>" ><?php echo $row['configuracion']; ?><?php } ?></option>
      </select>
    </div></td>
    <td><div align="center"><?php while($row = mysql_fetch_array($sql_ip2)){ ?>
      <input name="ip" type="text" value="<?php echo $row['ip']; ?>"  size="20" class="EDITAR"/><?php } ?>
    </div></td><?php while($row = mysql_fetch_array($sql_puerto_router2)){ ?>
    <td><div align="center"><input name="puerto_router" value="<?php echo $row['puerto_router']; ?>" type="text" size="15" class="EDITAR"/> </div></td><?php } ?>
    <td><div align="center" class="style1 style10"><?php while($row = mysql_fetch_array($sql_wifi2)){ ?>
      <input name="wifi" type="text"  value="<?php echo $row['wifi']; ?>" size="15" class="EDITAR"/>
      </div></td><?php } ?>
  </tr>
</table>
   <table width="880" border="0">
     <tr>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
     </tr>      <input name="cliente2" type="hidden"  value="<?php echo $cliente;?>" size="20" class="iconos_topCENTRO"/>
      <input name="alias2" type="hidden"  value="<?php echo $alias;?>" size="20" class="iconos_topCENTRO"/>
 <?php while($row = mysql_fetch_array($sql_mac_antigua)){ ?>     
<input name="mac2" type="hidden"  value="<?php echo $row['mac_su'];?>" size="20" class="iconos_topCENTRO"/>
     <tr><?php } ?>
       <td width="300"><input  type="submit" class="ui-dialog"   value="Guardar los Cambios"/></td>
       <td width="219">&nbsp;</td>
       <td width="87">&nbsp;</td>
       <td width="302"><input  type="reset" class="ui-dialog"   value="Restaurar Valores"/></td>
     </tr>
   </table></form>
   <p>&nbsp;</p>
   <p>
</div>
   
   <div id="index_foot"></div>
   <div id="index_footer">

Sistema Gestión de Clientes y Control Interno - Netland Chile S.A. | Todos los derechos reservados &copy; 2013<p class="lp">
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