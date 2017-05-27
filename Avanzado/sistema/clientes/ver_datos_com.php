<?php
include("../../../system/config.php");
include("../../../services/config.php");
$cliente = $_GET["cliente"];

$rut = $_GET["rut"];

$sql_cliente=mysql_query("SELECT * FROM SP_soporte_crear_cliente WHERE cliente='$cliente' or rut='$rut' LIMIT 1");

include '../../../include/estructura/session_admin.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../../../jquery/css/ui-lightness/jquery-ui-1.10.4.custom.css">
<script type="text/javascript" src="../../../jquery/js/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript" src=".././../jquery/js/jquery-ui-1.10.4.custom.min.js"></script>
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
<link href="../../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../../../css/estilos2.css">
<style type="text/css">
body {
	background-color: #FFFFFF;
	margin-left: 00px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
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
      <li><a href="clientes.php" id="supermenu" >Cliente</a></li>
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
 <?php include '../../../include/estructura/submenu_clientes_com_busqueda.php';?>
    <div id="busqueda_clientes">

  <div id="crear_clientes">
    <form method="post" action="opcion2.php" >
    <div id="datos_com"><strong>Datos Comerciales :</strong>  <br />
      <br />
 
 </div>
 <p>
    <?php while($row=mysql_fetch_array($sql_cliente)){?>
     <table width="917" border="0">
  <tr>
    <td width="220"><span class="style1 style2">Razón Social</span></td>
    <td colspan="2"><span id="sprytextfield1">
      <label for="cliente"></label>
      <input name="cliente" type="text" value="<?php echo $row['cliente']; ?>"  readonly="readonly" class="formulario_grande_intranet" id="cliente" />
      <span class="textfieldRequiredMsg"></span><span class="textfieldMinCharsMsg"></span><span class="textfieldMaxCharsMsg"></span></span></td>
  </tr>
  <tr>
    <td><span class="style1 style2">Rut</span></td>
    <td colspan="2"><span id="sprytextfield7">
      <input name="rut" type="text" value="<?php echo $row['rut']; ?>" readonly="readonly" class="formulario_chico_intranet" id="rut" />
      <span class="textfieldRequiredMsg"></span></span></td>
    </tr>
  <tr>
    <td><span class="style1 style2">Giro</span></td>
    <td colspan="2"><span id="sprytextfield2">
    <label for="giro"></label>
    <input name="giro" type="text" value="<?php echo $row['giro']; ?>" readonly="readonly" class="formulario_grande_intranet" id="giro" />
    <span class="textfieldMinCharsMsg"> </span><span class="textfieldMaxCharsMsg"> </span><span class="textfieldRequiredMsg"></span></span></td>
    </tr>
  <tr>
    <td><span class="style1 style2">Contacto</span></td>
    <td colspan="2"><span id="sprytextfield3">
    <label for="contacto"></label>
    <input name="contacto" type="text" value="<?php echo $row['contacto']; ?>"  readonly="readonly" class="formulario_grande_intranet" id="contacto" />
    <span class="textfieldRequiredMsg"></span><span class="textfieldMinCharsMsg"></span><span class="textfieldMaxCharsMsg"> </span></span></td>
    </tr>
  <tr>
    <td><span class="style1 style2">Teléfonos</span></td>
    <td colspan="2"><span id="sprytextfield4">
    <label for="telefonos"></label>
    <input name="telefonos" value="<?php echo $row['telefonos']; ?>" readonly="readonly" type="text" class="formulario_grande_intranet" id="telefonos" />
    <span class="textfieldRequiredMsg"></span><span class="textfieldMinCharsMsg"> </span><span class="textfieldMaxCharsMsg"> </span></span></td>
    </tr>
  <tr>
    <td><span class="style1 style2">Correos</span></td>
    <td colspan="2"><span id="sprytextfield5">
    <label for="correos"></label>
    <input name="correos" type="text" value="<?php echo $row['correos']; ?>"  readonly="readonly" class="formulario_grande_intranet" id="correos" />
    <span class="textfieldRequiredMsg"></span><span class="textfieldInvalidFormatMsg"></span></span></td>
    </tr>
  <tr>
    <td><span class="style1 style2">Dirección Comercial</span></td>
    <td colspan="2"><span id="sprytextfield6">
    <label for="direccion_comercial"></label>
    <input name="direccion_comercial" type="text" readonly="readonly" value="<?php echo $row['direccion_comercial']; ?>"  class="formulario_grande_intranet" id="direccion_comercial" />
    <span class="textfieldRequiredMsg"></span><span class="textfieldMinCharsMsg"></span><span class="textfieldMaxCharsMsg"></span></span></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><input  type="submit" class="boton_intranet" name="modificar"  value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Modificar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></td>
    <td width="399">&nbsp;</td>
    <td width="284">&nbsp;</td>
    </tr>
</table>
    </form>
    <?php }?></p>
    <?php 
	
	$ingresado= $_GET["id"];
	if ($ingresado==1){
		
		echo "<div id='dialog' title='Registro Actualizado'><center><p>Registro actualizado exitosamente!<br><br><br>
		   <form action='header.php' method='post'>
		   	   <input type='hidden' name='id_header' value='4'>
		   	   <input type='hidden' name='cliente' value='$cliente'>
	   <input type='submit' value='cerrar'>
	   </form></center></div>";
		
		}
	$id= $_GET["id"];
	$rut= $_GET["rut"];
	if ($id==2){
		
		echo "<div id='dialog' title='Error al Ingresar Registro'><p>El Registro "." ".$rut." "."se encuentra duplicado en la Base de Datos, verifique  que los datos sean correctos.</div>";
		
		}
	
	
	?>
  </div>
  </div>
</div>
  
  
</div>

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {minChars:1, maxChars:100, validateOn:["change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {minChars:1, validateOn:["change"], maxChars:100});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {minChars:1, maxChars:100, validateOn:["change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {minChars:1, maxChars:20, validateOn:["change"]});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "email", {validateOn:["change"]});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "none", {minChars:1, maxChars:100, validateOn:["change"]});
</script>
</body>
</html>
