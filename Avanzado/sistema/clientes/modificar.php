<?php
include("../../../system/config.php");
include("../../../services/config.php");
$cliente = $_GET["cliente"];
$alias = $_GET["alias"];
$rut = $_GET["rut"];

$sql_cliente=mysql_query("SELECT cliente FROM SP_dato_cliente WHERE (cliente='$cliente' AND  alias='$alias') OR (rut='$rut' AND  alias='$alias') LIMIT 1");
$sql_contrato=mysql_query("SELECT contrato FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  OR (rut='$rut' AND  alias='$alias') LIMIT 1");
$sql_direccion_instalacion=mysql_query("SELECT direccion_instalacion FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias' OR (rut='$rut' AND  alias='$alias') LIMIT 1");
$sql_fecha_inst=mysql_query("SELECT fecha_inst FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias' OR (rut='$rut' AND  alias='$alias') LIMIT 1 ");
$sql_fecha_suspension=mysql_query("SELECT fecha_suspension FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias' OR (rut='$rut' AND  alias='$alias') LIMIT 1 ");


$sql_rut=mysql_query("SELECT rut FROM SP_dato_cliente WHERE cliente='$cliente'  AND  alias='$alias' OR (rut='$rut' AND  alias='$alias') LIMIT 1");
$sql_contacto=mysql_query("SELECT contactos FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias' OR (rut='$rut' AND  alias='$alias') LIMIT 1 ");
$sql_telefonos=mysql_query("SELECT telefonos FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias' OR (rut='$rut' AND  alias='$alias') LIMIT 1");
$sql_correos=mysql_query("SELECT correos FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias' OR (rut='$rut' AND  alias='$alias')LIMIT 1 ");
$sql_direccion_comercial=mysql_query("SELECT direccion_comercial FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias' OR (rut='$rut' AND  alias='$alias')LIMIT 1 ");
$sql_usuarios=mysql_query("SELECT nombre FROM usuarios ORDER by nombre ASC  ");
$sql_instalador=mysql_query("SELECT instalador FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  OR (rut='$rut' AND  alias='$alias')");

$sql_auditado=mysql_query("SELECT auditado FROM SP_auditado  ");
$sql_auditado2=mysql_query("SELECT auditado FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  OR (rut='$rut' AND  alias='$alias')");


$sql_renta2=mysql_query("SELECT renta FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  OR (rut='$rut' AND  alias='$alias')");

$sql_velocidad2=mysql_query("SELECT velocidad FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias' OR (rut='$rut' AND  alias='$alias')LIMIT 1 ");

$sql_nota2=mysql_query("SELECT nota FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'OR (rut='$rut' AND  alias='$alias') LIMIT 1 ");

$sql_tipo2=mysql_query("SELECT tipo FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias' OR (rut='$rut' AND  alias='$alias') ");


$sql_estado2=mysql_query("SELECT estado FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias' OR (rut='$rut' AND  alias='$alias') ");

$sql_factura=mysql_query("SELECT factura FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias' OR (rut='$rut' AND  alias='$alias') ");


$sql_mac_su2=mysql_query("SELECT mac_su FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias' OR (rut='$rut' AND  alias='$alias') ");
$sql_mac_antigua=mysql_query("SELECT mac_su FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  OR (rut='$rut' AND  alias='$alias')");

$sql_mac_antigua_router=mysql_query("SELECT mac_router FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias' OR (rut='$rut' AND  alias='$alias') ");

$sql_modelo_su2=mysql_query("SELECT modelo_su FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias' OR (rut='$rut' AND  alias='$alias') ");
$sql_puerto_su2=mysql_query("SELECT puerto_su FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'OR (rut='$rut' AND  alias='$alias')  ");
$sql_senal2=mysql_query("SELECT senal FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias' OR (rut='$rut' AND  alias='$alias')LIMIT 1 ");
$sql_frec2=mysql_query("SELECT frec FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  OR (rut='$rut' AND  alias='$alias')");
$sql_estacion2=mysql_query("SELECT estacion FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias' OR (rut='$rut' AND  alias='$alias')  ");
$sql_ap2=mysql_query("SELECT ap FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  OR (rut='$rut' AND  alias='$alias')");
$sql_vlan2=mysql_query("SELECT vlan FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias' OR (rut='$rut' AND  alias='$alias') ");
$sql_alias2=mysql_query("SELECT alias FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias' OR (rut='$rut' AND  alias='$alias') ");
$sql_mac_router2=mysql_query("SELECT mac_router FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  OR (rut='$rut' AND  alias='$alias')");
$sql_modelo_router2=mysql_query("SELECT modelo_router FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  OR (rut='$rut' AND  alias='$alias')");
$sql_configuracion2=mysql_query("SELECT configuracion FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  OR (rut='$rut' AND  alias='$alias')");
$sql_ip2=mysql_query("SELECT ip FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias' OR (rut='$rut' AND  alias='$alias') ");
$sql_puerto_router2=mysql_query("SELECT puerto_router FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  OR (rut='$rut' AND  alias='$alias')");
$sql_wifi2=mysql_query("SELECT wifi FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  OR (rut='$rut' AND  alias='$alias')");
$sql_ipsu2=mysql_query("SELECT ip_su FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias' OR (rut='$rut' AND  alias='$alias') ");









$sql_plan=mysql_query("SELECT plan FROM SP_row_plan ORDER by plan ASC  ");
$sql_plan2=mysql_query("SELECT plan FROM SP_dato_cliente WHERE cliente='$cliente' AND  alias='$alias'  OR (rut='$rut' AND  alias='$alias')");
$sql_tipo=mysql_query("SELECT tipo FROM SP_row_tipo ORDER by tipo ASC  ");
$sql_estado=mysql_query("SELECT estado FROM SP_row_estado ORDER by estado ASC  ");
$sql_mac_su=mysql_query("SELECT mac FROM INV_activos WHERE id='0' AND tipo='Access Point' ORDER by mac ASC  ");
$sql_mac_router=mysql_query("SELECT mac FROM INV_activos WHERE id='0' AND tipo='Router' ORDER by mac ASC  ");
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
$user=$_SESSION['MM_Username'];
$bienvenido=mysql_query("SELECT nombre FROM usuarios WHERE usuario='$user'");

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
  <script src="../../../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../../../javascript/jquery.autocomplete.css" />
<link href="../../../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="../../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../../../css/estilos2.css">
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #F9F9F9;
}
</style>
<script>
$(function() {
$( "#dialog" ).dialog();
});
</script>
</head>

<body>
</script>
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
      <li><a href="Factibilidades/factibilidades.php"> Ventas</a></li>
      <li><a href="Retiros/retiros.php"> Retiro</a></li>
      <li><a href="ticket/ticket.php">Ticket</a></li>
      
      <li><a href="radio planning/radio_planning.php">Radio </a></li>
      
<li><a href="inventario/inventario.php">Inventario</a></li>
      <li><a href="../Indicadores/indicadores.php">Kpi</a></li>
      <li><a href="intranet/intranet1.php">Intranet</a></li>
      <li><a href="../pppoe/index.php">PPPoE</a></li>
    </ul>
  </div>
 <?php include '../../../include/estructura/submenu_clientes_busqueda.php';?>

  <div id="crear_dato_tecnico3">
  <div id="datos_com"><strong>Datos Comerciales</strong></div>
   <FORM   ACTION="comprobacion_actualizar_dato_tecnico.php" METHOD="POST" >
 <table width="925" border="0">
    <input type="hidden" name='usuario_sistema' value='<?php echo $user; ?>' />
  <tr>
    <td width="172" >Razón Social</td><?php while($row=mysql_fetch_array($sql_cliente)){?>
    <td width="743"> <input name="cliente"  readonly="readonly" value="<?php echo $row['cliente'];?>"  type="TEXT"   size="80" class="formulario_grande_intranet_editar"/> </td><?PHP }?>
    </tr>
  <tr>
    <td class="style1 style2">Rut</td><?php while($row=mysql_fetch_array($sql_rut)){?>
    <td><input name="rut" type="TEXT" readonly="readonly" value="<?php echo $row['rut'];?>" size="25" class="formulario_chico_intranet_editar"/><?PHP }?></td>
    </tr>
  <tr>
    <td class="style1 style2">Contacto</td><?php while($row=mysql_fetch_array($sql_contacto)){?>
    <td><input name="contactos" type="TEXT" value="<?php echo $row['contactos'];?>" size="40" class="formulario_grande_intranet_editar"/><?PHP }?></td>
    </tr>
  <tr>
    <td class="style1 style2">Telefonos</td>
    <td><?php while($row=mysql_fetch_array($sql_telefonos)){?><input name="telefonos" type="text"  value="<?php echo $row['telefonos'];?>" size="80" class="formulario_grande_intranet_editar"/><?PHP }?></td>
    </tr>
  <tr>
    <td >Correos</td>
    <td><?php while($row=mysql_fetch_array($sql_correos)){?><input name="correos" type="text" value="<?php echo $row['correos'];?>"  size="80" class="formulario_grande_intranet_editar"/><?PHP }?></td>
    </tr>
  <tr>
    <td class="style1 style2">Direccion Comercial</td>
    <td><?php while($row=mysql_fetch_array($sql_direccion_comercial)){?><input name="direccion_comercial"  value="<?php echo $row['direccion_comercial']; ?>"  type="text"  size="80" readonly="readonly" class="formulario_grande_intranet_editar"/><?PHP }?></td>
    </tr>
  <tr>
    <td class="style1 style2">Direccion Instalacion</td>
    <td><?php while($row=mysql_fetch_array($sql_direccion_instalacion)){?><input name="direccion_instalacion"  value="<?php echo $row['direccion_instalacion'];?>"  type="text"  size="80" class="formulario_grande_intranet_editar"/><?PHP }?></td>
    </tr>
  <tr>
    <td class="style1 style2">Nota</td> 
    <td> <?php while($row=mysql_fetch_array($sql_nota2)){?><input name="nota"  value="<?php echo $row['nota'];?>"  type="text"  size="80" class="formulario_grande_intranet_editar"/><?PHP }?></td>
    </tr>
   </table>
    <div id="datos_com"><strong>Servicio de Internet | Intranet</strong></div>
    <table width="891" border="0">
  
  <tr>
    <td width="171"><span class="style1 style2">Contrato</span></td>
    <td width="301"><?php while($row=mysql_fetch_array($sql_contrato)){?>
      <span id="sprytextfield1">
      <label for="contrato"></label>
      <input name="contrato" type="text" value="<?php echo $row['contrato'];?>" class="formulario_chico_intranet_editar" id="contrato" />
      <span class="textfieldRequiredMsg">X</span><span class="textfieldMinCharsMsg">X</span><span class="textfieldMaxCharsMsg">X</span></span>
<?php }?></td>
    <td width="137">Mac SU</td>
    <td width="264"><?php while($row = mysql_fetch_array($sql_mac_su2)){ ?>
      <select name="mac_su" class="formulario_chico_intranet_editar">
        <option value='<?php echo $row['mac_su'];?>'><?php echo $row['mac_su']; ?></option>
        <?php } ?>
        <?php while($row = mysql_fetch_array($sql_mac_su)){ ?>
        <option value="<?php echo $row['mac']; ?>" ><?php echo $row['mac'];?>
          <?php } ?>
          </option>
        <option value= 'No registra' >No registra</option>
      </select></td>
    </tr>
  <tr>
    <td>
    </td>
    <td>
    </td>
    <td></td>
    <td></td>
    </tr>
  <tr>
    <td>Plan</td>
    <td><?php while($row=mysql_fetch_array($sql_plan2)){?>
      <select name="plan" class="formulario_chico_intranet_editar">
        <option value='<?php echo $row['plan'];?>'><?php echo $row['plan']; ?></option>
        <?PHP }?>
        <?php while($row=mysql_fetch_array($sql_plan)){?>
        <option value="<?php echo $row['plan'];?>" ><?php echo $row['plan']; ?></option>
        <?PHP }?>
        <option value= 'No registra' >No registra</option>
      </select></td>
    <td>Señal</td>
    <td><?php while($row = mysql_fetch_array($sql_senal2)){ ?>
      <input name="senal"  value='<?php echo $row['senal'];?>' type="text" size="15" class="formulario_chico_intranet_editar"/>
      <?php } ?></td>
    </tr>
  <tr>
    <td>Tipo </td>
    <td><?php while($row=mysql_fetch_array($sql_tipo2)){?>
      <select name="tipo" class="formulario_chico_intranet_editar">
        <option value='<?php echo $row['tipo'];?>'><?php echo $row['tipo']; ?></option>
        <?PHP }?>
        <?php while($row=mysql_fetch_array($sql_tipo)){?>
        <option value="<?php echo $row['tipo']; ?>" ><?php echo $row['tipo'];?></option>
        <?PHP }?>
        <option value= 'No registra' >No registra</option>
      </select></td>
    <td>Dirección IP</td>
    <td><?php while($row = mysql_fetch_array($sql_ip2)){ ?>
      <input name="ip" type="text" value="<?php echo $row['ip']; ?>"  size="20" class="formulario_chico_intranet_editar"/>
      <?php } ?></td>
    </tr>
  <tr>
    <td>Fecha Instalación</td>
    <td><?php while($row=mysql_fetch_array($sql_fecha_inst)){?>
      <span id="sprytextfield5">
      <label for="fecha_inst"></label>
      <?php $f1=date("d-m-Y",strtotime($row['fecha_inst'])); ?>
      <input name="fecha_inst" type="text" class="formulario_chico_intranet_editar" id="fecha_instalacion"  value="<?php echo $f1;?>"/>
      <span class="textfieldRequiredMsg">X</span><span class="textfieldInvalidFormatMsg">X</span></span>
<?PHP }?></td>
    <td>AP</td>
    <td><?php while($row = mysql_fetch_array($sql_ap2)){ ?>
      <select name="ap" class="formulario_chico_intranet_editar">
        <option value='<?php echo $row['ap']; ?>'><?php echo $row['ap'];?></option>
        <?php } ?>
        <?php while($row = mysql_fetch_array($sql_ap)){ ?>
        <option value="<?php echo $row['ip'];?>" ><?php echo $row['ip'];?>
          <?php } ?>
          </option>
        <option value= 'No registra' >No registra</option>
      </select></td>
    </tr>
  <tr>
    <td>Auditado</td>
    <td><select name="auditado" class="formulario_chico_intranet_editar">
      <?php while($row=mysql_fetch_array($sql_auditado2)){?>
        <option value='<?php echo $row['auditado'];?>'><?php echo $row['auditado'];?>
        <?PHP }?>
        </option>
        
        <?php while($row=mysql_fetch_array($sql_auditado)){?>
        <option value="<?php echo $row['auditado']; ?>" ><?php echo $row['auditado']; ?> 
        <?PHP }?>
        </option>
       

      </select>&nbsp;</td>
    <td>Configuración IP</td>
    <td><?php while($row = mysql_fetch_array($sql_configuracion2)){ ?>
      <select name="configuracion" class="formulario_chico_intranet_editar">
        <option value='<?php echo $row['configuracion']; ?>'><?php echo $row['configuracion']; ?>
          <?php } ?>
          </option>
        <?php while($row=mysql_fetch_array($sql_configuracion)){?>
        <option value="<?php echo $row['configuracion']; ?>" ><?php echo $row['configuracion'];?></option>
        <?PHP }?>
        <option value= 'No registra' >No registra</option>
      </select>
&nbsp;</td>
    </tr>
  <tr>
    <td>Velocidad</td>
    <td><?php while($row=mysql_fetch_array($sql_velocidad2)){?>
      <span id="sprytextfield2">
      <label for="velocidad5"></label>
      <input name="velocidad" type="text" value="<?php echo $row['velocidad'];?>" class="formulario_chico_intranet_editar" id="velocidad5" />
      <span class="textfieldRequiredMsg">X</span><span class="textfieldMinCharsMsg">X</span><span class="textfieldMaxCharsMsg">X</span></span>
<?PHP }?>
      
      </td>
    <td>IP SU</td>
    <td><?php while($row = mysql_fetch_array($sql_ipsu2)){ ?>
      <input name="ip_su" type="text" value='<?php echo $row['ip_su']; ?>' size="15" class="formulario_chico_intranet_editar"/>
      <?php } ?></td>
    </tr>
  <tr>
    <td>Instalador</td>
    <td><?php while($row=mysql_fetch_array($sql_instalador)){?>
      <select name="instalador" class="formulario_chico_intranet_editar">
        <option value='<?php echo $row['instalador']; ?>'><?php echo $row['instalador'];?></option>
        <?PHP }?>
        <?php while($row=mysql_fetch_array($sql_usuarios)){?>
        <option value="<?php echo $row['nombre']; ?>" ><?php echo $row['nombre'];?></option>
        <?PHP }?>
        <option value= 'No registra' >No registra</option>
      </select></td>
    <td>Mac Router</td>
    <td><?php while($row = mysql_fetch_array($sql_mac_router2)){ ?>
      <select name="mac_router" class="formulario_chico_intranet_editar">
        <option value='<?php echo $row['mac_router']; ?>'><?php echo $row['mac_router']; ?>
          <?php } ?>
          </option>
        <?php while($row = mysql_fetch_array($sql_mac_router)){ ?>
        <option value="<?php echo $row['mac']; ?>" ><?php echo $row['mac']; ?>
          <?php } ?>
          </option>
        <option value= 'No registra' >No registra</option>
      </select></td>
    </tr>
  <tr>
    <td>Conexión</td>
    <td><?php while($row = mysql_fetch_array($sql_alias2)){ ?>
      <span id="sprytextfield6">
      <label for="alias2"></label>
      <input name="alias" type="text" class="formulario_chico_intranet_editar" id="alias2" value='<?php echo $row['alias'];?>' />
      <span class="textfieldRequiredMsg">X</span><span class="textfieldMinCharsMsg">X</span><span class="textfieldMaxCharsMsg">X</span></span>
      <?php } ?></td>
    <td>Primera Factura</td>
    <td><?php while($row = mysql_fetch_array($sql_factura)){ $factura=$row['factura']; if ($factura=='1'){?>
      <select name="factura" class="formulario_chico_intranet_editar">   
       <option value= '1' >Facturado</option>
       <option value= '0' >No Facturado</option>

      </select>
      <?php } else {?>
      <select name="factura" class="formulario_chico_intranet_editar">  
       <option value= '0' >No Facturado</option> 
       <option value= '1' >Facturado</option>
      

      </select> 
	  <?php }}?>
      </td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
</table>
    <table width="934" border="0">
      <tr>        </tr>
      <tr>        </tr>
    </table>
      <table width="934" border="0">
    <tr>
      <td><input name="cliente2" type="hidden"  value="<?php echo $cliente;?>" size="20" class="iconos_topCENTRO"/>
	  <input name="rut2" type="hidden"  value="<?php echo $rut;?>" size="20" class="iconos_topCENTRO"/>
      <input name="alias2" type="hidden"  value="<?php echo $alias;?>" size="20" class="iconos_topCENTRO"/>
 <?php while($row = mysql_fetch_array($sql_mac_antigua)){ ?>     
<input name="mac2" type="hidden"  value="<?php echo $row['mac_su'];?>" size="20" class="iconos_topCENTRO"/>
    <?php } ?>
    <?php while($row = mysql_fetch_array($sql_mac_antigua_router)){ ?>     
<input name="mac3" type="hidden"  value="<?php echo $row['mac_router'];?>" size="20" class="iconos_topCENTRO"/>
    <?php } ?>
    
    </td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr> 
      <td width="228"><input  type="submit" class="boton_intranet"   value="Guardar los Cambios"/></td>
      <td width="542"><input  type="reset" class="boton_intranet"   value="Restaurar Valores"/></td>
      <td width="150">&nbsp;</td>
    </tr>
  </table>
  </form>
  
  <?php 
  $id=$_GET['id'];
  
  if (empty($id)){}
  else if($id=10){
	  
	  echo "<div id='dialog' title='Error'><p>No se puede actualizar registro, ya que el nombre para el enlace se encuentra duplicado en la Base de datos para este Cliente. Intente con otro Nombre para el Enlace</div>";
	  }
  
  ?>
  <br />
  <br />
</div>
  
 

  

    </div>
    </div>
   
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {validateOn:["change"], minChars:1, maxChars:100});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "date", {format:"dd-mm-yyyy", validateOn:["change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["change"], minChars:1, maxChars:10});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["change"], minChars:1, maxChars:10});
</script>
</body>
</html>
