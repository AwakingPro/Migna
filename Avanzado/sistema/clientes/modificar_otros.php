<?php
include("../../../system/config.php");
include("../../../services/config.php");
$cliente = $_GET["cliente"];
$alias = $_GET["alias"];
$rut = $_GET["rut"];

$sql_cliente=mysql_query("SELECT * FROM SP_servicio_otros WHERE cliente='$cliente' and  alias='$alias' LIMIT 1");

include '../../../include/estructura/session_admin.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


	<script src="../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
     <script src="../../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
  <script src="../../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
  <script type="text/javascript" src="../../../script/jquery.js"></script>
  <script type="text/javascript" src="../../../script/jquery.jCombo.min.js"></script>
  <script src="../../../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>


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
<script src="../../../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="../../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../../../css/estilos2.css">
<style type="text/css">
body {
	background-color: #FFFFFF;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
<link href="../../../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<script>
$(function() {
$( "#dialog" ).dialog();
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
      <li><a href="clientes.php" id="supermenu" >Clientes</a></li>
      <li><a href="Factibilidades/factibilidades.php"> Ventas</a></li>
      <li><a href="Retiros/retiros.php"> Retiro</a></li>
      <li><a href="ticket/ticket.php">Ticket</a></li>
      
      <li><a href="radio planning/radio_planning.php">Radio </a></li>
      
<li><a href="inventario/inventario.php">Inventario</a></li>
      <li><a href="../Indicadores/indicadores.php">Kpi</a></li>
      <li><a href="intranet/intranet1.php">Intranet</a></li>
      <li><a href="#">PPPoE</a></li>
    </ul>
  </div>
 <?php include '../../../include/estructura/submenu_clientes_busqueda.php';?>


   <div id="busqueda_clientes">

  <div id="crear_clientes">
  <div id="datos_com"><strong>Modificar Datos Técnicos de Otros Servicios:</strong>  <br />
      <br />
 
 </div>
 <P>
    <form method="post" action="comprobacion_actualizar_otros.php" >
    
    <?php while($row=mysql_fetch_array($sql_cliente)){?>
     <table width="917" border="0">
  <tr>
    <td width="220"><span class="style1 style2">Razón Social</span></td>
    <td colspan="2"><span id="sprytextfield1">
      <label for="cliente"></label>
      <input name="cliente" type="text"  class="formulario_grande_intranet_fijo" id="cliente" value="<?php echo $row['cliente']; ?>" readonly="readonly" />
      <input name="rut" type="hidden" value="<?php echo $row['rut']; ?>"  class="formulario_modificar" id="cliente2" /><input name="alias" type="hidden" value="<?php echo $row['alias']; ?>"  class="formulario_modificar" id="rut2" />
      <span class="textfieldRequiredMsg"></span><span class="textfieldMinCharsMsg"></span><span class="textfieldMaxCharsMsg"></span></span></td>
  </tr>
  <tr>
    <td>Nombre del Enlace</td>
    <td colspan="2"><span id="sprytextfield7">
      <input name="alias" type="text"  class="formulario_chico_intranet_fijo" id="rut" value="<?php echo $row['alias']; ?>" readonly="readonly" />
      <span class="textfieldRequiredMsg"></span></span></td>
    </tr>
  <tr>
    <td><span class="style1 style2">Servicio</span></td>
    <td colspan="2"><span id="sprytextfield2">
    <label for="giro"></label>
    <input name="servicio" type="text" value="<?php echo $row['servicio']; ?>"  class="formulario_chico_intranet_editar" id="giro" />
    <span class="textfieldMinCharsMsg"> </span><span class="textfieldMaxCharsMsg"> </span><span class="textfieldRequiredMsg"></span></span></td>
    </tr>
  <tr>
    <td><span class="style1 style2">Fecha Habilitación</span></td>
    <td colspan="2"><span id="sprytextfield3">
    <label for="contacto"></label>
    <input name="fecha_habilitacion" type="text" value="<?php echo $row['fecha_habilitacion']; ?>"   class="formulario_chico_intranet_editar" id="contacto" />
    <span class="textfieldRequiredMsg"></span><span class="textfieldMinCharsMsg"></span><span class="textfieldMaxCharsMsg"> </span><span class="textfieldInvalidFormatMsg">X</span></span></td>
    </tr>
  <tr>
    <td><span class="style1 style2">Descripción</span></td>
    <td colspan="2" rowspan="8"><span id="sprytextarea1">
    <label for="descripcion"></label>
    <textarea name="descripcion" cols="45" rows="10" class="formulario_grande_intranet" id="descripcion"><?php echo $row['descripcion']; ?></textarea>
    <span class="textareaRequiredMsg">X</span><span class="textareaMinCharsMsg">X</span><span class="textareaMaxCharsMsg">X</span></span></td>
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
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><input type="submit" class="boton_intranet" name="modificar"  value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Guardar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></td>
    <td width="399">
      
      
        <input name="btn_submit2" type="reset" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Limpiar Datos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" class="boton_intranet" />
    </td>
    <td width="284">&nbsp;</td>
    </tr>
</table>
    </form>
    <?php }?></p>
    <?php 
	
	$ingresado= $_GET["id"];
	if ($ingresado==1){
		
		echo "<div id='dialog' title='Ingresar Cliente'><p>Registro actualizado Exitosamente!</div>";
		
		}
	$id= $_GET["id"];
	$rut= $_GET["rut"];
	if ($id==2){
		
		echo "<div id='dialog' title='Error al Ingresar Registro'><p>El Registro "." ".$rut." "."se encuentra duplicado en la Base de Datos, verifique  que los datos sean correctos.</div>";
		
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
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {minChars:1, maxChars:100, validateOn:["change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {minChars:1, validateOn:["change"], maxChars:100});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "date", {validateOn:["change"], format:"yyyy-mm-dd"});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {validateOn:["change"], minChars:1, maxChars:600});
</script>
</body>
</html>
