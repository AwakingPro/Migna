<?php
include("../../../system/config.php");
include("../../../services2/config.php");
$cliente= $_GET["cliente"];
$factibilidad=$_GET['factibilidad'];
$numero= $_GET["numero"];
$sql_seguimiento=mysql_query("SELECT seguimiento FROM TICKET_seguimiento ");


$sql_editar=mysql_query("SELECT * FROM TICKET WHERE  cliente='$cliente' and numero='$numero'");
$sql_editar2=mysql_query("SELECT * FROM TICKET WHERE  cliente='$cliente' and numero='$numero'");

$sql_cliente3=mysql_query("SELECT * FROM SP_dato_cliente WHERE cliente='$cliente' AND alias='$alias' or rut='$rut' AND alias='$alias'");
$sql_estaciones=mysql_query("SELECT estacion FROM INT_radio_planning_estaciones ");

$sql_tipo=mysql_query("SELECT tipo FROM TICKET_tipo ORDER BY tipo ASC");
$sql_departamento=mysql_query("SELECT departamento FROM TICKET_departamento ORDER BY departamento ASC");
$sql_origen=mysql_query("SELECT origen FROM TICKET_origen ORDER BY origen ASC");
$sql_prioridad=mysql_query("SELECT prioridad FROM TICKET_prioridad ");
$sql_status=mysql_query("SELECT status FROM TICKET_status ");
$sql_resultado=mysql_query("SELECT resultado FROM TICKET_resultado ");


$sql_hora=mysql_query("SELECT hora FROM TICKET_hora ");
$sql_responsable=mysql_query("SELECT nombre FROM usuarios ORDER BY nombre ASC");
$fecha=date("Y-m-d H:i:s");
$fecha_actualizacion=date("Y-m-d H:i:s");
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
$nombre=$_SESSION['MM_Username'];
$usuario=$_SESSION['MM_Username'];
$bienvenido=mysql_query("SELECT nombre FROM usuarios WHERE usuario='$nombre'");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<?php include '../../../include/estructura/title.php';?>
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
<link rel="stylesheet" href="../../../jquery/css/ui-lightness/jquery-ui-1.10.4.custom.css">
<script type="text/javascript" src="../../../jquery/js/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript" src=".././../jquery/js/jquery-ui-1.10.4.custom.min.js"></script>
   <script type="text/javascript" src="../../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../../js/jquery-ui.min.js"></script>
   <link href="../../../css/sistema.css" rel="stylesheet" type="text/css" />
  <link href="../../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
  <link href="../../../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
  <link href="../../../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
  <script src="../../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
  <script src="../../../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
  <link rel="stylesheet" href="../../../css/estilos2.css">
  <style type="text/css">
  #apDiv5 {
	position: absolute;
	width: 271px;
	height: 178px;
	z-index: 1;
	left: 635px;
	top: 823px;
}
  #apDiv6 {
	position: absolute;
	width: 200px;
	height: 115px;
	z-index: 1;
	left: 665px;
	top: 1189px;
}
  body {
	background-color: #333;
	margin-left: 0px;
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
<div id="top"><?php 
	   $nombre=$_SESSION['MM_Username'];
	   $bienvenido=mysql_query("SELECT * FROM usuarios WHERE usuario='$nombre'");
	  
	  while($row=mysql_fetch_array($bienvenido)){
     	
	?>
	
     <?php echo "Bienvenido , "." ".$row['nombre']." | "?><a href="/migna/Avanzado/sistema/sistema.php" class="Menu10"> Inicio</a> | 
  <a href="<?php echo $logoutAction ?>
" class="Menu10"> Salir </a>
  <?php
	  }
	  ?></div>
 <div id="inc_banner">
  <div id="inc_logo"></div>
 </div>

  <?php include '../../../include/estructura/menu_ticket.php';?>
 <?php include '../../../include/estructura/submenu_ticket_buscar.php';?>



  <div id="ticket_nuevo_editar">
      <div id="busqueda_clientes">

  <div id="datos_com"><strong>Editar Ticket Seleccionado : </strong></div>
  <?php 
  
  if ($factibilidad!='Factibilidad'){
  
  ?>
  <form method="post" action="comprobacion_guardar.php">
    
    <table width="741" border="0">
  <tr>
    <td width="179"><span class="style1 style2">Razón Social :</span></td>
    <td colspan="2"><input name="cliente"  readonly="readonly" value="<?php echo $cliente; ?>"  type="text" id="course"  size="60" class="formulario_grande_intranet"/></td>
    </tr>
  <tr>
    <td>Número Ticket :</td>
    <td colspan="2"><input type="text" name="creador3" readonly="readonly" value="<?php echo $numero;?>" class="formulario_chico_intranet" /></td>
  </tr>
  <tr>
    <?php while($row = mysql_fetch_array($sql_editar)){ ?>
    <td><span class="style1 style2">Atendido Por :</span></td>
    <td colspan="2"><input type="text" name="creador2" readonly="readonly" value="<?php echo $row['creador'];?>" class="formulario_chico_intranet" /></td>
  </tr>
  <tr>
    <td><span class="style1 style2">Fecha | Hora Creación :</span></td>
    <td colspan="2"><input type="text" name="fecha_creacion" readonly="readonly" value="<?php echo $row['fecha_creacion']; ?>" class="formulario_chico_intranet" /></td>
    </tr>
  <tr><input type="hidden" name="numero" readonly="readonly" value="<?php echo $row['numero'];?>" class="EDITARCopiaCopia2" />
    <td><span class="style1 style2">Origen :</span></td>
    <td colspan="2"><input type="text" name="origen" readonly="readonly" value="<?php echo $row['origen'];?>" class="formulario_chico_intranet">
      
      
    </td>
    </tr>
  <tr>
    <td><span class="style1 style2">Departamento :</span></td>
    <td colspan="2"><input type="text" name="depto" readonly="readonly" value="<?php echo $row['depto'];?>" class="formulario_chico_intranet"></td>
    </tr>
  <tr>
    <td><span class="style1 style2">Tipo :</span></td>
    <td colspan="2"><input name="tipo" type="text" readonly="readonly" class="formulario_chico_intranet" value="<?php echo $row['tipo'];?>" size="60"></td>
    </tr>
  <tr>
    <td><span class="style1 style2">Subtipo :</span></td>
    <td colspan="2"><input name="subtipo" readonly="readonly" type="text" class="formulario_chico_intranet" value="<?php echo $row['subtipo'];?>" size="60"></td>
  </tr>
  <tr><input name="usuario" readonly="readonly" type="hidden" class="EDITARCopiaCopia2" value="<?php echo $usuario;?>" size="60">
    <td>Prioridad :</td>
    <td><select name="prioridad" class="formulario_chico_intranet_editar" >
      <option value='<?php echo $row['prioridad']; ?>'><?php echo $row['prioridad'];?></option>
      
      <?php while($row2 = mysql_fetch_array($sql_prioridad)){ ?> <option value="<?php echo $row2['prioridad'];?>"> <?php echo $row2['prioridad']; ?>
        <?php } ?> </option>
      
      </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Reasignar a :</td>
    <td><select name="asignar" class="formulario_chico_intranet_editar" >
        <option value='<?php echo $row['asignar']; ?>'><?php echo $row['asignar'];?></option>
                
                   <?php while($row3 = mysql_fetch_array($sql_responsable)){ ?> <option value="<?php echo $row3['nombre'];?>"> <?php echo $row3['nombre']; ?>
                  <?php } ?> </option>
      
      </select></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>Estado :</td>
    <td><select name="status" class="formulario_chico_intranet_editar" >
      <option value='<?php echo $row['status']; ?>'><?php echo $row['status'];?></option>
      <?php while($row3 = mysql_fetch_array($sql_status)){ ?>
      <option value="<?php echo $row3['status'];?>"> <?php echo $row3['status']; ?>
        <?php } ?>
        </option>
      </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Comentario :</td>
    <input type="hidden" name="fecha_actualizacion" readonly="readonly" value="<?php echo $fecha_actualizacion?>" class="EDITARCopiaCopia2" />
    <td rowspan="3"><textarea name="comentario" readonly="readonly"  cols="60" rows="7" class="formulario_grande_intranet" id="comentario2"><?php  echo $row['comentario'];?></textarea></td>
    <td width="34" rowspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>Agregar Comentario :</td>
    <td width="514" rowspan="2"><span id="sprytextarea1">
    <label for="comentario_interno"></label>
    <textarea name="comentario_interno" cols="45" rows="7" class="formulario_grande_intranet_editar" id="comentario_interno"></textarea>
    <span class="textareaRequiredMsg">X</span><span class="textareaMinCharsMsg">X</span><span class="textareaMaxCharsMsg">X</span></span></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td rowspan="1"><?php }?>
      <div id="history">Historial</div>
      
      <?php 
	  
	  
	   $sql1=mysql_query("SELECT * FROM TICKET_comentario_interno WHERE  cliente='$cliente' and numero='$numero'");

 if (mysql_num_rows($sql1)>0)
{
echo '<br />';
	
$sql_historial=mysql_query("SELECT * FROM TICKET_comentario_interno WHERE  cliente='$cliente' and numero='$numero' order by actualizacion desc");

while ($row = mysql_fetch_row($sql_historial)){?>
	
	<textarea name="comentario" readonly="readonly"  cols="60" rows="7" class="formulario_grande_intranet" id="comentario2"><?php   
	echo "Fecha : ".$row[1]." ";
	echo $row[2]." Escribio : ";
	echo $row[3]; ?></textarea>

<?php }

}else {
	echo "</BR>No registra Historial";
	
	} ?></td>
    <td rowspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><input name="btn_submit3" type="submit" class="boton_intranet" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Guardar Cambios&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" /></td>
    <td><input name="btn_submit4" type="reset" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Limpiar  Datos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" class="boton_intranet" /></td>
    <td>&nbsp;</td>
  </tr>
     </table>
  </form>&nbsp;</p>
  <?php }?>
    <?php 
  
  if($factibilidad=='Factibilidad'){
  
  ?>
  <form method="post" action="comprobacion_guardar2.php">
    
    <table width="606" border="0">
  <tr>
    <td width="186"><span class="style1 style2">Razón Social :</span></td>
    <td colspan="2"><input name="cliente"  readonly="readonly" value="<?php echo $cliente; ?>"  type="text" id="course"  size="60" class="formulario_grande_intranet"/></td>
    </tr>
  <tr>
    <td>Número Ticket : </td>
    <td colspan="2"><input type="text" name="creador4" readonly="readonly" value="<?php echo $numero;?>" class="formulario_chico_intranet" /></td>
  </tr>
  <tr><?php while($row = mysql_fetch_array($sql_editar)){ ?>
    <td><span class="style1 style2">Rut :</span></td>
    <td colspan="2"><input type="text" name="creador" readonly="readonly" value="<?php echo $row['rut'];?>" class="formulario_chico_intranet" /></td>
    </tr>
  <tr><input type="hidden" name="numero" readonly="readonly" value="<?php echo $row['numero'];?>" class="EDITARCopiaCopia2" />
    <td><span class="style1 style2">Correo :</span></td>
    <td colspan="2"><input type="text" name="origen" readonly="readonly" value="<?php echo $row['correo'];?>" class="formulario_chico_intranet">
<input name="usuario" readonly="readonly" type="hidden" class="EDITARCopiaCopia2" value="<?php echo $usuario;?>" size="60">      
    </td>
    </tr>
  <tr>
    <td>Plan :</td>
    <td colspan="2"><input type="text" name="depto" readonly="readonly" value="<?php echo $row['plan'];?>" class="formulario_chico_intranet"></td>
    </tr>
  <tr>
    <td><span class="style1 style2">Teléfono :</span></td>
    <td colspan="2"><input name="tipo" type="text" readonly="readonly" class="formulario_chico_intranet" value="<?php echo $row['telefono'];?>" size="60"></td>
    </tr>
  <tr>
    <td><span class="style1 style2">Dirección :</span></td>
    <td colspan="2"><input name="subtipo" readonly="readonly" type="text" class="formulario_grande_intranet" value="<?php echo $row['direccion'];?>" size="60"></td>
  </tr>
  <tr>
    <td>Reasignar a :</td>
    <td><select name="asignar" class="formulario_chico_intranet_editar" >
      <option value='<?php echo $row['asignar']; ?>'><?php echo $row['asignar'];?></option>
      
      <?php while($row3 = mysql_fetch_array($sql_responsable)){ ?> <option value="<?php echo $row3['nombre'];?>"> <?php echo $row3['nombre']; ?>
        <?php } ?> </option>
      
      </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Resultado :</td>
    <td><select name="resultado" class="formulario_chico_intranet_editar" >
        <option value='<?php echo $row['resultado']; ?>'><?php echo $row['resultado'];?></option>
                
                   <?php while($row2 = mysql_fetch_array($sql_resultado)){ ?> <option value="<?php echo $row2['resultado'];?>"> <?php echo $row2['resultado']; ?>
                  <?php } ?> </option>
      
      </select>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Seguimiento :</td>
    <td><select name="seguimiento" class="formulario_chico_intranet_editar" >
      <option value='<?php echo $row['estado_factibilidad']; ?>'><?php echo $row['estado_factibilidad'];?></option>
      <?php while($row2 = mysql_fetch_array($sql_seguimiento)){ ?>
      <option value="<?php echo $row2['seguimiento'];?>"> <?php echo $row2['seguimiento']; ?>
        <?php } ?>
        </option>
    </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Estado :</td>
    <td><select name="status" class="formulario_chico_intranet_editar" >
      <option value='<?php echo $row['status']; ?>'><?php echo $row['status'];?></option>
      <?php while($row3 = mysql_fetch_array($sql_status)){ ?>
      <option value="<?php echo $row3['status'];?>"> <?php echo $row3['status']; ?>
        <?php } ?>
        </option>
      </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Comentario :</td>
    <input type="hidden" name="fecha_actualizacion" readonly="readonly" value="<?php echo $fecha_actualizacion?>" class="EDITARCopiaCopia2" />
    <td rowspan="3"><textarea name="comentario" readonly="readonly"  cols="60" rows="7" class="formulario_grande_intranet" id="comentario2"><?php  echo $row['comentario'];?></textarea></td>
    <td width="1" rowspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>Agregar Comentario :</td>
    <td width="495" rowspan="2"><span id="sprytextarea1">
    <label for="comentario_interno"></label>
    <textarea name="comentario_interno" cols="45" rows="7" class="formulario_grande_intranet_editar" id="comentario_interno"></textarea>
    <span class="textareaRequiredMsg">X</span><span class="textareaMinCharsMsg">X</span><span class="textareaMaxCharsMsg">X</span></span></td>
    </tr>

  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td rowspan="2"><?php }?>
      <div id="history">Historial</div>
      
      <?php 
	  
	  
	   $sql1=mysql_query("SELECT * FROM TICKET_comentario_interno WHERE  cliente='$cliente' and numero='$numero'");

 if (mysql_num_rows($sql1)>0)
{
echo '<br />';
	
$sql_historial=mysql_query("SELECT * FROM TICKET_comentario_interno WHERE  cliente='$cliente' and numero='$numero' order by actualizacion desc");

while ($row = mysql_fetch_row($sql_historial)){?>
	
	<textarea name="comentario" readonly="readonly"  cols="60" rows="7" class="formulario_grande_intranet" id="comentario2"><?php   
	echo "Fecha : ".$row[1]." ";
	echo $row[2]." Escribio : ";
	echo $row[3]; ?></textarea>

<?php }

}else {
	echo "</BR>No registra Historial";
	
	} ?></td>
    <td rowspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><input name="btn_submit3" type="submit" class="boton_intranet" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Guardar Cambios&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" /></td>
    <td><input name="btn_submit4" type="reset" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Limpiar  Datos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" class="boton_intranet" /></td>
    <td>&nbsp;</td>
  </tr>
     </table>
  </form>&nbsp;</p>
  <?php }?>
 <?php 
  
  $id= $_GET["id"];
  if ($id==1){
	  
	  echo "<div id='dialog' title='Editar Registro'><center><p>Registro Actualizado exitosamente!<br><br><br>
		   <form action='header.php' method='post'>
		   	   <input type='hidden' name='id_header' value='2'>
		   	   		   	   <input type='hidden' name='numero' value='$numero'>
		   	   <input type='hidden' name='cliente' value='$cliente'>

	   <input type='submit' value='cerrar'>
	   </form></center></div>";
	  
	  }

  ?>    
 
    
  </div>
</div>
</div>
  
  </div>
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["change"]});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {validateOn:["change"], minChars:1, maxChars:100});
</script>
<div id="foot">Migna | Sistema Gestión de Clientes - Todos los derechos reservados &copy; <?php
echo date("Y"); ?></div>
</body>
</html>
