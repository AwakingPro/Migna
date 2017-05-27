<?php
include("../../../system/config.php");
include("../../../services/config.php");
$id_morosos = $_GET["id_morosos"];
$cliente = $_GET["cliente"];
$rs = $_GET["cliente"];
$alias = $_GET["alias"];
$rut = $_GET["rut"];
$mac = $_GET["mac"];
$ID_suspension = $_GET["ID_suspension"];

if (empty($cliente) || empty($rut) || empty($alias) ){
	header("Location: clientes_busqueda.php?id=6");
	
	} else {

//$contactos = $_GET["contactos"];
//$ip= $_GET["ip"];
//$mac_su = $_GET["mac_su"];

$sql_cliente=mysql_query("SELECT * FROM SP_dato_cliente WHERE cliente='$cliente' AND alias='$alias' or rut='$rut' AND alias='$alias' LIMIT 1");
$sql_pppoe=mysql_query("SELECT * FROM PPPoE_Client WHERE cliente='$cliente' AND alias='$alias' LIMIT 1");
$sql_voip=mysql_query("SELECT * FROM SP_servicio_voip WHERE (cliente='$cliente' or rut='$rut') AND alias='$alias' LIMIT 1");
$sql_otros=mysql_query("SELECT * FROM SP_servicio_otros WHERE (cliente='$cliente' or rut='$rut') AND alias='$alias' LIMIT 1");





include '../../../include/estructura/session_admin.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


	

<?php include '../../../include/estructura/title.php';?>
<style type="text/css">
a:hover {
text-decoration:none;
}
a img {
border-width:0;
}

</style>
<link href="../../../css/estilos.css" rel="stylesheet" type="text/css" />
<STYLE>
A {text-decoration: none;}
</STYLE>

<script src="../../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
     <script src="../../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
  <script src="../../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
  <script type="text/javascript" src="../../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../../js/jquery-ui.min.js"></script>
<link href="../../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="../../../script/jquery.js"></script>
  <script type="text/javascript" src="../../../script/jquery.jCombo.min.js"></script>
  <script type='text/javascript' src='../../../javascript/jquery.autocomplete.js'></script>
  <script src="../../../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../../../javascript/jquery.autocomplete.css" />
<link href="../../../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../../../css/estilos2.css">

<script src="../../../data/media/js/jquery.js"></script>
<script src="../../../data/media/js/jquery.dataTables.js"></script>
<script src="../../../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../../../data/media/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../../../jquery/css/ui-lightness/jquery-ui-1.10.4.custom.css">
<script type="text/javascript" src="../../../jquery/js/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript" src=".././../jquery/js/jquery-ui-1.10.4.custom.min.js"></script>
<script src="../../../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<script language="javascript">
$(document).ready(function() {
    $('#example').dataTable();
} );
</script>
<script language="javascript">
$(document).ready(function() {
    $('#example2').dataTable();
} );
</script>
<script>
$(function() {
$( "#dialog" ).dialog();
});
</script>

<style type="text/css">
#apDiv5 {
	position: absolute;
	width: 381px;
	height: 171px;
	z-index: 1;
	left: 930px;
	top: 338px;
	border: thin solid #CDCDCD;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 11px;
	color: #333;
	padding: 5px;
	background-image: url(../../../imagenes/patron_body.png);
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #F9F9F9;
}
</style>
<link href="../../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../../../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
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
      <li><a href="clientes.php" id="supermenu" >Clientes</a></li>
      <li><a href="../Factibilidades/factibilidades.php"> Ventas</a></li>
      <li><a href="../Retiros/retiros.php"> Retiro</a></li>
      <li><a href="../ticket/ticket.php">Ticket</a></li>
      
      <li><a href="../radio planning/radio_planning.php">Radio </a></li>
      
<li><a href="../inventario/inventario.php">Inventario</a></li>
      <li><a href="../Indicadores/indicadores.php">Kpi</a></li>
      <li><a href="../intranet/intranet1.php">Intranet</a></li>
      <li><a href="#">PPPoE</a></li>
    </ul>
  </div>
   <?php include '../../../include/estructura/submenu_clientes_busqueda.php';?>

  

  <div id="crear_dato_tecnico">
  
  <div id="datos_com"><strong>Datos Comerciales</strong>  <br /><br />
 
 </div>
       <?php if ($ID_suspension=="55") {}else {?>
   <FORM name=tuformulario autocomplete="off" ACTION="ver_clientes.php" METHOD="GET">
  <input type="hidden" name="cliente"  value="<?php echo $cliente;?>"/>
    <input type="hidden" name="alias"  value="<?php echo $alias;?>"/>
  <input type="hidden" name="rut"  value="<?php echo $rut;?>"/>
  <input type="hidden" name="ID_suspension"  value="55"/>
<input type="hidden" name="id_morosos"  value="<?php echo $id_morosos; ?>"/>
  <input name="modificar"  type="submit"  class='boton_intranet'value="Cambiar Estado Cliente"/>
  </FORM>
   <?php } ?>
  <FORM name=tuformulario autocomplete="off" ACTION="opcion.php" METHOD="POST">
    <table width="894" border="0">
    
  <td width="243"></td>
  <tr>
    <td width="243" >Razón Social</td>
    <?php while($row=mysql_fetch_array($sql_cliente)){?>
    <td width="641"><input name="cliente"  type="TEXT" class="formulario_grande_intranet" value="<?php echo $row['cliente']; ?>"   size="75"  readonly="readonly"/></td>
    </tr>
  <tr>
    <td class="iconos_top">Rut</td>
    <td width="641"><input name="rut" type="TEXT" class="formulario_chico_intranet" value="<?php echo $row['rut']; ?>" size="25" readonly="readonly"/></td>
    </tr>
  <tr>
    <input name="mac_antigua" type="hidden" value="<?php echo $row['mac_su']; ?>" size="40" class="EDITARCopia"/>
    <input name="mac_antigua_router" type="hidden" value="<?php echo $row['mac_router']; ?>" size="40" class="EDITARCopia"/>
    <td class="iconos_top">Contacto</td>
    <td><input name="contactos" type="TEXT" class="formulario_grande_intranet" value="<?php echo $row['contactos']; ?>" size="40" readonly="readonly"/></td>
    </tr>
  <tr>
    <td class="style1 style2">Teléfonos</td>
    <td><input name="telefonos" type="text" class="formulario_grande_intranet"  value="<?php echo $row['telefonos']; ?>" size="75" readonly="readonly"/></td>
    </tr>
  <tr>
    <td class="style1 style2">Correos</td>
    <td><input name="correos" type="text" class="formulario_grande_intranet" value="<?php echo $row['correos']; ?>"  size="75" readonly="readonly"/></td>
    </tr>
  <tr>
    <td class="style1 style2">Dirección Comercial</td>
    <td><input name="direccion_comercial"  type="text" class="formulario_grande_intranet"  value="<?php echo $row['direccion_comercial']; ?>"  size="75" readonly="readonly"/></td>
    </tr>
  <tr>
    <td class="style1 style2">Dirección Instalación</td>
    <td><input name="direccion_instalacion" type="text" class="formulario_grande_intranet"   value="<?php echo $row['direccion_instalacion']; ?>"  size="75" readonly="readonly"/></td>
    </tr>
  <tr>
    <td class="style1 style2">Nota</td>
    <td><input name="nota"class="formulario_grande_intranet" id="textarea" value="<?php echo $row['nota']; ?>" readonly="readonly" /></td>
    </tr></table>
    <div id="datos_com"><strong>Servicio de Internet | Intranet</strong></div>

    <table width="915" border="0">
  
  <tr>
    <td width="243"><span class="style1 style2">Contrato</span></td>
    <td width="234"><input name="contrato" type="text" class="formulario_chico_intranet" value="<?php echo $row['contrato']; ?>" size="25" readonly="readonly"/></td>
    <td><span class="style1 style2">Instalador</span></td>
    <td><input name="fecha_inst2" type="text" class="formulario_chico_intranet" value="<?php echo $row['instalador']; ?>" size="15" readonly="readonly"/></td>
    </tr>
  <tr>
    <td>Plan</td>
    <td><input name="fecha_inst3" type="text" class="formulario_chico_intranet" value="<?php echo $row['plan']; ?>" size="15" readonly="readonly"/></td>
    <td><span class="style1 style2">Mac  SU</span></td>
    <td><input name="modelo_su5"type="text" class="formulario_chico_intranet" value="<?php echo $row['mac_su']; ?>" size="16" readonly="readonly"/></td>
    </tr>
  <tr>
    <td>Descripcion Plan</td>
    <td><input name="fecha_inst6" type="text" class="formulario_chico_intranet" value="<?php echo $row['desc_plan']; ?>" size="15" readonly="readonly"/></td>
    <td><span class="style1 style2">Enlace</span></td>
    <td><input name="alias3" type="text" class="formulario_chico_intranet" value="<?php echo $row['alias']; ?>"size="16" readonly="readonly"/></td>
    </tr>
  <tr>
    <td>Tipo Cliente</td>
    <td><input name="fecha_inst4" type="text" class="formulario_chico_intranet" value="<?php echo $row['tipo']; ?>" size="15" readonly="readonly"/></td>
    <td><span class="style1 style2">Señal</span></td>
    <td><input name="modelo_su3" type="text" class="formulario_chico_intranet"value="<?php echo $row['senal']; ?>" size="16" readonly="readonly"/></td>
    </tr>
  <tr>
    <td>Fecha Instalación</td>
    <td><input name="fecha_inst" type="text" class="formulario_chico_intranet" value="<?php 
	  
	  
	  $f1=date("d-m-Y",strtotime($row['fecha_inst']));
	  
	  echo $f1; ?>" size="15" readonly="readonly"/></td>
    <td><span class="style1 style2">IP de Trabajo</span></td>
    <td><input name="modelo_router2" type="text"class="formulario_chico_intranet" value="<?php echo $row['ip']; ?>" size="16" readonly="readonly"/></td>
    </tr>
  <tr>
    <td>Auditado</td>
    <?php $auditado=$row['auditado']; ?>
    <td><?php if ($auditado=='No'){ echo "<input name='fecha_inst7' type='text' class='formulario_chico_intranet' value='$auditado' size='15' readonly='readonly'/>";}else { echo "<input name='fecha_inst7' type='text' class='formulario_chico_intranet' value='$auditado' size='15' readonly='readonly'/>"; } ?></td>
    <td><span class="style1 style2">AP</span></td>
    <td><input name="alias4" type="text" class="formulario_chico_intranet"value="<?php echo $row['ap']; ?>" size="16" readonly="readonly"/></td>
    </tr>
  <tr>
    <td>Velocidad</td>
    <td><input name="velocidad" type="text" class="formulario_chico_intranet" value="<?php echo $row['velocidad']; ?>" size="15" readonly="readonly"/></td>
    <td><span class="style1 style2">Configuración IP</span></td>
    <td><input name="modelo_su6" type="text" class="formulario_chico_intranet" value="<?php echo $row['configuracion']; ?>"size="16" readonly="readonly"/></td>
    </tr>
  <tr>
    <td>Estado Servicio</td>
    <?php  $estado=$row['estado'];  $fecha_suspension=$row['fecha_suspension'];
	$f2=date("d-m-Y",strtotime($fecha_suspension));
	  
	
	
	?>
    <td><?PHP if ($estado=='Suspendido'){ echo "<input name='fecha_inst5' type='text' class='formulariochicorojo' value='$estado' size='15' readonly='readonly'/>"; } else {echo "<input name='fecha_inst5' type='text' class='formulario_chico_intranet' value='$estado' size='15' readonly='readonly'/>"; }?></td>
    <td><span class="style1 style2">IP SU</span></td>
    <td><input name="ip_su2" type="text" class="formulario_chico_intranet" value="<?php echo $row['ip_su']; ?>"size="16" readonly="readonly"/></td>
    </tr>
  <tr>
    <td><?PHP if ($estado=='Suspendido'){ echo "Fecha Suspención"; } else {}?></td>
    <td><?PHP if ($estado=='Suspendido'){ echo "<input name='fecha_inst8' type='text' class='formulariochicorojo' value='$f2' size='15' readonly='readonly'/>"; } else {}?></td>
    <td><span class="style1 style2">Mac  Router</span></td>
    <td><input name="modelo_su7"type="text" class="formulario_chico_intranet" value="<?php echo $row['mac_router']; ?>" size="16" readonly="readonly"/></td>
  </tr>
  <tr>
    <td>Código de servicio</td>
    <td><input name="modelo_su2"type="text" class="formulario_chico_intranet" value="00<?php echo $row['id_dato']; ?>" size="16" readonly="readonly"/></td>
    <td width="159">Facturado</td>
    <td width="261"><input name="modelo_su9"type="text" class="formulario_chico_intranet" value="<?php  $facturado=$row['factura']; if ($facturado=='1') {echo "Facturado"; } else {echo "No Facturado";}  ?>" size="16" readonly="readonly"/></td>
  </tr>
  <?php }?>
</table>

<?php if (mysql_num_rows($sql_voip)>0)
{?>
    <?php while($row=mysql_fetch_array($sql_voip)){?>

    <div id="datos_com"><strong>Servicios de Telefonía IP</strong></div>
    <table width="915" border="0">
  
  <tr>
    <td>Linea 1</td>
    <td><input name="modelo_su2"type="text" class="formulario_chico_intranet" value="<?php echo $row['linea1']; ?>" size="16" readonly="readonly"/></td>
    <td><span class="style1 style2">Plan de Minutos</span></td>
    <td><input name="ip_su" type="text" class="formulario_chico_intranet" value="<?php echo $row['plan']; ?>"size="16" readonly="readonly"/></td>
    </tr>
  <tr>
    <td><span class="style1 style2">Linea 2</span></td>
    <td><input name="alias2" type="text" class="formulario_chico_intranet"value="<?php echo $row['linea2']; ?>" size="16" readonly="readonly"/></td>
    <td><span class="style1 style2">Fecha Instalación</span></td>
    <td><input name="modelo_su" type="text" class="formulario_chico_intranet"value="<?php echo $row['fecha_inst']; ?>" size="16" readonly="readonly"/>
      &nbsp;</td>
    </tr>
  <tr>
    <td><span class="style1 style2">Linea 3</span></td>
    <td><input name="modelo_su4" type="text" class="formulario_chico_intranet" value="<?php echo $row['linea3']; ?>"size="16" readonly="readonly"/>&nbsp;</td>
    <td><span class="style1 style2">Mac ATA</span></td>
    <td><input name="modelo_router" type="text"class="formulario_chico_intranet" value="<?php echo $row['mac']; ?>" size="16" readonly="readonly"/></td>
    </tr>
  <tr>
    <td width="243"><span class="style1 style2">Linea 4</span></td>
    <td width="237"><input name="modelo_su8" type="text" class="formulario_chico_intranet" value="<?php echo $row['linea4']; ?>"size="16" readonly="readonly"/></td>
    <td width="157">&nbsp;</td>
    <td width="260">&nbsp;</td>
    </tr>
</table>
<?php }}?>
<?php if (mysql_num_rows($sql_pppoe)>0)
{?>
    <?php while($row=mysql_fetch_array($sql_pppoe)){?>

    <div id="datos_com"><strong>Configuracion PPPoE</strong></div>
    <table width="915" border="0">
  
  <tr>
    <td>User</td>
    <td><input name="modelo_su2"type="text" class="formulario_chico_intranet" value="<?php echo $row['user_pppoe']; ?>" size="16" readonly="readonly"/></td>
    <td><span class="style1 style2">Dirección IP</span></td>
    <td><input name="ip_su" type="text" class="formulario_chico_intranet" value="<?php echo $row['ip_pppoe']; ?>"size="16" readonly="readonly"/></td>
    </tr>
  <tr>
    <td><span class="style1 style2">Password</span></td>
    <td><input name="alias2" type="text" class="formulario_chico_intranet"value="<?php echo $row['pass_pppoe']; ?>" size="16" readonly="readonly"/></td>
    <td>Uptime / Estado</td>
    <td><?php $uptime=$row['uptime']; 
	         if ($uptime==""){ ?>
             <input  type='text' class='formulario_chico_intranet2' value='Caido'size='16' readonly='readonly'/>
             <?php
				 }
				 else { ?>
					 <input  type='text' class='formulario_chico_intranet' value='<?php echo $row['uptime']; ?>'size='16' readonly='readonly'/>
					 <?php 
                     } 
	
	 ?></td>
    </tr>
  <tr>
    <td><span class="style1 style2">Plan</span></td>
    <td><input name="modelo_su4" type="text" class="formulario_chico_intranet" value="<?php echo $row['plan']; ?> Mbps"size="16" readonly="readonly"/>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td width="243"><span class="style1 style2">Servidor</span></td>
    <td width="237"><input name="modelo_su8" type="text" class="formulario_chico_intranet" value="<?php echo $row['srv']; ?>"size="16" readonly="readonly"/></td>
    <td width="157">&nbsp;</td>
    <td width="260">&nbsp;</td>
    </tr>
</table>
<?php }}?>
<?php if (mysql_num_rows($sql_otros)>0)
{?>
<?php while($row=mysql_fetch_array($sql_otros)){?>
<div id="datos_com"><strong>Otros Servicios</strong></div>
<table width="915" border="0">
  
  <tr>
    <td>Servicio</td>
    <td width="240"><input name="servicio"type="text" class="formulario_chico_intranet" value="<?php echo $row['servicio']; ?>" size="16" readonly="readonly"/></td>
    <td width="159">Fecha Habilitación</td>
    <td width="258"><input name="fecha_habilitacion"type="text" class="formulario_chico_intranet" value="<?php echo $row['fecha_habilitacion']; ?>" size="16" readonly="readonly"/></td>
    </tr>
  <tr>
    <td width="240">Descripción del Servicio </td>
    <td colspan="3" rowspan="8"><span id="sprytextarea1">
      <label for="descripcion"></label>
      <textarea name="descripcion" cols="45" rows="10" readonly="readonly" class="formulario_grande_intranet" id="descripcion"><?php echo $row['descripcion']; ?></textarea>
      <span class="textareaRequiredMsg">X</span></span></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<?php }?>
<?php }?>
    <?php if ($ID_suspension=="55"){
	  ?>
  <div id="datos_com"><strong>Cambiar Estado del Servicio</strong></div>
<table width="915" border="0">
  <tr>
    <td width="127">Estado Servicio</td>
    <td width="247"><select name="estado" class="formulario_chico_intranet">
   
        <option value="Activo" >Activo </option>
        <option value="Suspendido" >Suspendido</option>
        <option value="Retiro Solicitado" >Retiro Solicitado</option>
        <option value="Retirado" >Retirado</option>


      </select>
      <input type='hidden' name='usuario_sistema' value="<?php echo $usuario_sistema;?>" />
<input type='hidden' name='id_morosos' value="<?php echo $id_morosos;?>" />
      </td>
    <td width="122"><input name="suspender"  type="submit" class="boton_intranet" id="suspender"  value="Cambiar Estado"/></td>
    <td width="246"></td>
    <td width="151"></td>
  </tr>
  <input type='hidden' name='ID_suspension' value='55' />
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
  <?PHP }?>
<?php 
$comercial_existe=mysql_query("SELECT * FROM SP_suspensiones WHERE cliente='$cliente' ");
if (mysql_num_rows($comercial_existe)>0)
{ ?>
<div id="datos_com"><strong>Historial Comercial</strong></div>

<table id="example2" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
               
              
                <th>Fecha Gestión</th>
                <th>Estado</th>
                <th>Conexión</th>
                <th>Fecha Actualización</th>
                <th>Hora Actualización</th>

                <th>Actualizado por </th>
               <th>Eliminar</th>
            </tr>
        </thead>
 
   
         <tr>
        <?php $comercial=mysql_query("SELECT * FROM SP_suspensiones WHERE cliente='$cliente' ORDER BY fecha_sistema DESC");

while ($row = mysql_fetch_row($comercial)){
	
	 $id=$row[0];
	
	?>
                          <td><center><?php echo $row[8];?></center></td>
                          <td><center><?php echo $row[7];?></center></td>
                          <td><center><?php echo $row[5];?></center></td>
                          <td><center><?php echo $row[3];?></center></td>
                          <td><center><?php echo $row[4];?></center></td>
                          <td><center><?php echo $row[6];?></center></td>
                           <td><center>
                             <a href="eliminar_historial_comercial.php?id=<?php echo $id; ?>&cliente=<?php echo $cliente;?>&rut=<?php echo $rut;?>&alias=<?php echo $alias;?>"><img src="../../../imagenes/eliminar.jpg" width="12" height="12" /></a>
           </center></td>


        </tr><?php } ?> </tbody>
  </table>
 <?php } ?> 

<?php 
$ticket_existe=mysql_query("SELECT * FROM TICKET WHERE cliente='$cliente'  ");
if (mysql_num_rows($ticket_existe)>0)
{ ?>
<div id="datos_com"><strong>Ticket de Soporte</strong></div>

<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
               
                <th>ID</th>
                <th>Fecha Creación</th>
                <th>Hora Creación</th>
                <th>N° Ticket </th>
                <th>Subtipo</th>
                <th>Prioridad</th>
                <th>Atendido por :</th>
                <th>Asignado a :</th>
                <th>Estado</th>
                <th>Ver Ticket</th>
            </tr>
        </thead>
 
   
         <tr>
        <?php $ticket=mysql_query("SELECT * FROM TICKET WHERE cliente='$cliente' ORDER BY id ASC ");

while ($row = mysql_fetch_row($ticket)){
	
	
	$fecha_ticket_old=$row[8];
	list($fecha_ticket2, $hora_ticket) = explode(" ", $fecha_ticket_old);
	$fecha_sistema=date("d-m-Y",strtotime($fecha_ticket2));

	?>
                              <td><center><?php echo $row[0];?></center></td>

                          <td><center><?php echo $fecha_sistema;?></center></td>
                          <td><center><?php echo $hora_ticket;?></center></td>

                          <td><center><?php echo $numero=$row[13];?></center></td>
                          <td><?php echo $row[5];?></td>
                          <td><center><?php echo $row[10];?></center></td>
                          <td><center><?php echo $row[12];?></center></td>

                          <td><center><?php echo $row[11];?></center></td>
                          <td><center><?php echo $row[14];?></center></td>
                          <td><center>
                            <a href="../ticket/ver_registro.php?cliente=<?php echo $cliente;?>&numero=<?php echo $numero;?>"><img src="../../../imagenes/lupa.png" width="17" height="17" /></a>
           </center></td>

        </tr><?php } ?> </tbody>
  </table>
 <?php } ?> 





   
      <p>
        <span class="Menu">
          <input type="hidden" name='alias' value='<?php echo $alias; ?>'/>
          <input type="hidden" name='rut' value='<?php echo $rut; ?>'/>
          <input type="hidden" name='cliente' value='<?php echo $rs; ?>'/>
          <input type="hidden" name='ticket_type' value='3'/>
        </span></p>
      <p>
        
        <center></center>
      </p>
    
      
    
      <table width="934" border="0">
        <tr>        </tr>
      <tr>        </tr>
    </table>
      <table width="1035" border="0">
    <tr> 
      <td width="290"><input  type="submit" class="boton_intranet" name="modificar"  value="      Modificar Datos de Internet       "/></td>
      <td width="251"><?php if (mysql_num_rows($sql_voip)>0)
{ echo "<input  type='submit' class='boton_intranet' name='modificar_voip'  value='      Modificar Servicio VOIP      '/>";  }?></td>
      <td width="248"><?php if (mysql_num_rows($sql_otros)>0)
{ echo "<input  type='submit' class='boton_intranet' name='modificar_otros'  value='      Modificar Otros Servicios     '/>";  }?></td>
      <td width="228"><input type="submit" class="boton_intranet" value='      Nuevo Ticket de Atención      '  name='ticket' clas='formulariochico'/></td>
      </tr>
  </table>
  </form>

  <?php $id=$_GET['id'];
  $mac_a=$_GET['mac_a'];
  $mac_b=$_GET['mac_b'];
	  
	  if ($id==1){
		  
		  echo "<div id='dialog' title='Editar Cliente'><center><p>Registro Actualizado Exitosamente!<br><br><br>
		   <form action='header.php' method='post'>
		   	   <input type='hidden' name='id_header' value='2'>
		   	   <input type='hidden' name='cliente' value='$cliente'>
			   <input type='hidden' name='alias' value='$alias'>
			   <input type='hidden' name='rut' value='$rut'>
		   	   <input type='hidden' name='estacion' value='$estacion'>

	   <input type='submit' value='cerrar'>
	   </form></center></div>";
		  
		  }
		else if ($id==3){
		  
		  echo "<div id='dialog' title='Eliminar Registro'><center><p>Esta Seguro que desea eliminar este registro : "." ".$id2." "."</br>
	   <a  name='link' href='comprobacion_eliminado.php?cliente=$cliente&alias=$alias&rut=$rut&id=2&mac_a=$mac_a&mac_b=$mac_b' >SI</a>"." &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp        "."<a  name='link' href='comprobacion_eliminado.php?cliente=$cliente&alias=$alias&rut=$rut&id=5' >NO</a>
	   </center></div>
	   ";
		  
		  }
	  ?>
      <br />
      <br />
</div>
</div>
  
  </div>
</div>

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "date", {validateOn:["change"], format:"dd-mm-yyyy"});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
</script>
</body>
</html>
<?php }?>