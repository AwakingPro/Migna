<?php
include("../../../system/config.php");
include("../../../services/config.php");
$cliente = $_GET["cliente"];
$sql_cliente=mysql_query("SELECT cliente FROM SP_soporte_crear_cliente WHERE cliente='$cliente'  ");
$sql_rut=mysql_query("SELECT rut FROM SP_soporte_crear_cliente WHERE cliente='$cliente'  ");
$sql_contacto=mysql_query("SELECT contacto FROM SP_soporte_crear_cliente WHERE cliente='$cliente'  ");
$sql_telefonos=mysql_query("SELECT telefonos FROM SP_soporte_crear_cliente WHERE cliente='$cliente'  ");
$sql_correos=mysql_query("SELECT correos FROM SP_soporte_crear_cliente WHERE cliente='$cliente'  ");
$sql_direccion_comercial=mysql_query("SELECT direccion_comercial FROM SP_soporte_crear_cliente WHERE cliente='$cliente'  ");
$sql_usuarios=mysql_query("SELECT nombre FROM usuarios ORDER by nombre ASC  ");
$sql_plan=mysql_query("SELECT plan FROM SP_row_plan ORDER by plan ASC  ");
$sql_tipo=mysql_query("SELECT tipo FROM SP_row_tipo ORDER by tipo ASC  ");
$sql_estado=mysql_query("SELECT estado FROM SP_row_estado ORDER by estado ASC  ");
$sql_mac_su=mysql_query("SELECT mac FROM INV_activos ORDER by mac ASC  ");
$sql_mac_router=mysql_query("SELECT mac FROM INV_activos ORDER by mac ASC  ");
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
	background-image: url(../../../images/repeat.png);
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
     <div id="sistema_welcome_top"><table width="359" border="0">
  <tr>
    <td width="221"></td>
    <td width="128">Inicio |&nbsp;Admin | Salir</td>
    </tr>
  </table></div>
   </div>
   <div id="index_top">
     <div id="index_logo"></div>
   </div>
   <div id="index_menu">
   <div id="index_menu_principal">
     <ul id="MenuBar1" class="MenuBarHorizontal">
       <li><a href="#"> Clientes</a>       </li>
       <li><a href="../../../Supervisor/sistema/clientes/inventario.php">Inventario</a></li>
       <li><a href="#">Ticket</a>       </li>
       <li><a href="#">Radius</a></li>
       <li><a href="#">Intranet</a></li>
       <li><a href="#">Indicadores</a></li>
     </ul>
      </div>
   <div id="inventario_usted_esta_modificar2"></div>
      
   </div>
   <div id="inventario_submenu">
     <div id="inventario_sub_menu_1">
       <ul id="MenuBar2" class="MenuBarHorizontal">
         <li><a href="#">Buscar Clientes</a>         </li>
         <li><a href="../../../Supervisor/sistema/clientes/inventario_ingresos.php">Crear Clientes</a></li>
<li><a href="../../../Supervisor/sistema/clientes/inventario_modificar_activos.php">Crear Dato Tecnico</a>         </li>
<li><a href="#">Otros Servicios</a></li>
<li><a href="#">Otros Datos Técnicos</a></li>
       </ul>
     </div>
   </div>
   <div id="sistema_ingreso_dato_tecnico">
   <table width="926" border="0">
     <tr>
       <td width="921" bgcolor="#333333" class="MENU">Datos Comerciales</td>
     </tr>
   </table>
   <table width="926" border="0">
     <FORM name=tuformulario autocomplete="off" ACTION="comprobacion_crear_dato_tecnico.php" METHOD="POST">
  <tr>
    <td width="179" >Razón Social</td><?php while($row=mysql_fetch_array($sql_cliente)){?>
    <td width="500"> <input name="cliente"  readonly="readonly" value="<?php echo $row['cliente']; ?>"  type="TEXT"   size="80" class="form_dato"/> </td><?PHP }?>
    <td width="100" >Fecha Inst.</td>
    <td width="143">
      
      <div align="right">
        <input name="fecha_inst" type="TEXT" id="datepicker" size="15" class="form_dato"/>
      </div></td></tr>
  <tr>
    <td class="style1 style2">Rut</td><?php while($row=mysql_fetch_array($sql_rut)){?>
    <td><input name="rut" type="TEXT" readonly="readonly" value="<?php echo $row['rut']; ?>" size="25" class="form_dato"/><?PHP }?></td>
    <td class="style1 style2">Instalador</td>
    <td><div align="right"><select name="instalador" class="form_dato"><option value=''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seleccione&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                  <?php while($row=mysql_fetch_array($sql_usuarios)){?>
                    <option value="<?php echo $row['nombre']; ?>" ><?php echo $row['nombre']; ?></option>
       <?PHP }?>
      </select>
    </div></td>
  </tr>
  <tr>
    <td class="style1 style2">Contacto</td><?php while($row=mysql_fetch_array($sql_contacto)){?>
    <td><input name="contactos" type="TEXT" value="<?php echo $row['contacto']; ?>" size="40" class="form_dato"/><?PHP }?></td>
    <td>Plan</td>
    <td><div align="right">
      <select name="plan" class="form_dato"><option value=''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seleccione&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                   <?php while($row=mysql_fetch_array($sql_plan)){?>
                    <option value="<?php echo $row['plan']; ?>" ><?php echo $row['plan']; ?></option>
   <?PHP }?>
      </select>
    </div></td>
  </tr>
  <tr>
    <td class="style1 style2">Contrato</td>
    <td><input name="contrato" type="TEXT"  size="25" class="form_dato"/></td>
    <td>Renta </td>
    <td><div align="right">
      <input name="renta" type="TEXT"  size="15" class="form_dato"/>
    </div></td>
  </tr>
  <tr>
    <td class="style1 style2">Telefonos</td><?php while($row=mysql_fetch_array($sql_telefonos)){?>
    <td><input name="telefonos" type="text"  value="<?php echo $row['telefonos']; ?>" size="80" class="form_dato"/><?PHP }?></td>
    <td>Velocidad</td>
    <td><div align="right">
      <input name="velocidad" type="text"  size="15" class="form_dato"/>
    </div></td>
  </tr>
  <tr>
    <td class="style1 style2">Correos</td><?php while($row=mysql_fetch_array($sql_correos)){?>
    <td><input name="correos" type="text" value="<?php echo $row['correos']; ?>"  size="80" class="form_dato"/><?PHP }?></td>
    <td>Tipo</td>
    <td><div align="right">
     <select name="tipo" class="form_dato"><option value=''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seleccione&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                    <?php while($row=mysql_fetch_array($sql_tipo)){?>
                    <option value="<?php echo $row['tipo']; ?>" ><?php echo $row['tipo']; ?></option>
       <?PHP }?>
      </select>
    </div></td>
  </tr>
  <tr>
    <td class="style1 style2">Direccion Comercial</td><?php while($row=mysql_fetch_array($sql_direccion_comercial)){?>
    <td><input name="direccion_comercial"  value="<?php echo $row['direccion_comercial']; ?>"  type="text"  size="80" class="form_dato"/><?PHP }?></td>
    <td class="style1 style2">Fidelizado</td>
    <td><div align="right">
      <input name="fidelizado" type="text"  id="datepicker2" size="15" class="form_dato"/>
    </div></td>
  </tr>
  <tr>
    <td class="style1 style2">Direccion Instalacion</td>
    <td><input name="direccion_instalacion"    type="text"  size="80" class="form_dato"/></td>
    <td>Estado</td>
    <td><div align="right"><select name="estado" class="form_dato">
      <option value=''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seleccione&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
      <?php while($row=mysql_fetch_array($sql_estado)){?>
      <option value="<?php echo $row['estado']; ?>" ><?php echo $row['estado']; ?></option><?PHP }?>
    </select></td>
  </tr>
  <tr>
    <td class="style1 style2">Nota</td>
    <td><label for="textarea"></label>
      <textarea name="nota" cols="79" rows="1" class="form_dato" id="textarea"></textarea></td>
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
   <table width="926" border="0">
     <tr>
       <td width="921" bgcolor="#333333" class="MENU">Datos Técnicos</td>
     </tr>
   </table><table width="926" border="0">
  
  <tr>
    <td width="150"><div align="center" class="style1 style2">Mac SU</div></td>
    <td width="150"><div align="center" class="style1 style2">Modelo</div></td>
    <td width="150"><div align="center" class="style1 style2">IP SU</div></td>
    <td width="150"><div align="center" class="style1 style2">Puerto SU</div></td>
    <td width="150"><div align="center" class="style1 style2">Señal</div></td>
    <td width="150"><div align="center" class="style1 style2">Frecuencia</div></td>
  </tr>
  <tr>
    <td><div align="center">
      <select name="mac_su" class="DATOS_TECNICOS"><option value=''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seleccione&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                    <?php while($row = mysql_fetch_array($sql_mac_su)){ ?>
                    <option value="<?php echo $row['mac']; ?>" ><?php echo $row['mac']; ?><?php } ?></option>
        
      </select>
    </div></td>
    <td><div align="center">
      <input name="modelo_su" type="text" size="20" class="DATOS_TECNICOS"/>
    </div></td>
    <td><div align="center">
      <input name="ip_su" type="text" size="20" class="DATOS_TECNICOS"/>
    </div></td>
    <td><div align="center">
      <input name="puerto_su" type="text" size="20" class="DATOS_TECNICOS"/>
    </div></td>
    <td><div align="center"><input name="senal" type="text" size="20" class="DATOS_TECNICOS"/></div></td>
    <td><div align="center"><input name="frec" type="text" size="20" class="DATOS_TECNICOS"/></div></td>
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
    <td><div align="center">
      <select name="estacion" class="DATOS_TECNICOS">
        <option value=''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seleccione&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
        <?php while($row = mysql_fetch_array($sql_estaciones)){ ?>
        <option value="<?php echo $row['estacion']; ?>" ><?php echo $row['estacion']; ?>
          <?php } ?>
          </option>
      </select>
    </div></td>
    <td><div align="center">  
      <select name="ap" class="DATOS_TECNICOS"><option value=''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seleccione&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                  <?php while($row = mysql_fetch_array($sql_ap)){ ?>
                    <option value="<?php echo $row['ip']; ?>" ><?php echo $row['ip']; ?><?php } ?></option>
        
      </select> 
    </div></td>
    <td><div align="center">
      <input name="vlan" type="text" size="20" class="DATOS_TECNICOS"/>
    </div></td>
    <td><div align="center">
      <input name="alias" type="text" size="20" class="DATOS_TECNICOS"/>
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
    <td><div align="center">
      <select name="mac_router" class="DATOS_TECNICOS">
        <option value=''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seleccione&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <?php while($row = mysql_fetch_array($sql_mac_router)){ ?>
        <option value="<?php echo $row['mac']; ?>" ><?php echo $row['mac']; ?><?php } ?></option>
      </select>
    </div></td>
    <td><div align="center">
      <input name="modelo_router" type="text" size="20" class="DATOS_TECNICOS"/>
    </div></td>
    <td><div align="center">
      <select name="configuracion" class="DATOS_TECNICOS">
        <option value=''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seleccione&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
        <?php while($row = mysql_fetch_array($sql_configuracion)){ ?>
        <option value="<?php echo $row['configuracion']; ?>" ><?php echo $row['configuracion']; ?><?php } ?></option>
      </select>
    </div></td>
    <td><div align="center">
      <input name="ip" type="text" size="20" class="DATOS_TECNICOS"/>
    </div></td>
    <td><div align="center"><input name="puerto_router" type="text" size="20" class="DATOS_TECNICOS"/> </div></td>
    <td><div align="center" class="style1 style10">
      <input name="wifi" type="text"  size="20" class="DATOS_TECNICOS"/>
      </div></td>
  </tr>
</table>
   <table width="926" border="0">
     <tr>
       <td width="10">&nbsp;</td>
       <td width="135"><input  type="submit" class="ui-dialog"   value="Crear Dato Tecnico"/></td>
       <td width="453">&nbsp;</td>
       <td width="310"><input  type="submit" class="ui-dialog"   value="Restaurar Valores"/></td>
     </tr>
   </table></form>
   <p>&nbsp;</p>
   <p>
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
mysql_free_result($bienvenido);
?>