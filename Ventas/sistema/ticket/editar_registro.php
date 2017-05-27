<?php
include("../../../system/config.php");
include("../../../services2/config.php");

$cliente= $_GET["cliente"];

$numero= $_GET["numero"];


$sql_editar=mysql_query("SELECT * FROM TICKET WHERE  cliente='$cliente' and numero='$numero'");
$sql_editar2=mysql_query("SELECT * FROM TICKET WHERE  cliente='$cliente' and numero='$numero'");


$sql_estaciones=mysql_query("SELECT estacion FROM INT_radio_planning_estaciones ");

$sql_tipo=mysql_query("SELECT tipo FROM TICKET_tipo ORDER BY tipo ASC");
$sql_departamento=mysql_query("SELECT departamento FROM TICKET_departamento ORDER BY departamento ASC");
$sql_origen=mysql_query("SELECT origen FROM TICKET_origen ORDER BY origen ASC");
$sql_resultado=mysql_query("SELECT resultado FROM TICKET_resultado ");
$sql_status=mysql_query("SELECT status FROM TICKET_status ");
$sql_progreso=mysql_query("SELECT estado_factibilidad FROM TICKET_estado_factibilidad ");


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
$creador=mysql_query("SELECT nombre FROM usuarios WHERE usuario='$usuario'");


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

  <script type="text/javascript" src="../../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../../js/jquery-ui.min.js"></script>
       <link href="../../../js/jquery-ui-1.7.2.custom.css" rel="stylesheet" type="text/css" />
   <link href="../../../css/sistema.css" rel="stylesheet" type="text/css" />

  <link href="../../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
  <link href="../../../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
  <script src="../../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
  <link href="../../../js/jquery-ui-1.7.2.custom.css" rel="stylesheet" type="text/css" />
  <script src="../../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script type="text/javascript" src="../../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../../js/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../../javascript/jquery.autocomplete.css" />
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
 
function validarForm(formulario) {
  if(formulario.comentario_interno.value.length==0) { //comprueba que no esté vacío
    formulario.comentario_interno.focus();   
    alert('No has Escrito Comentario'); 
    return false; //devolvemos el foco
  }
  
  return true;
}

</script>
  </head>
    
  <body>
  <body onload="prettyForms()">
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
           <td width="79" class="Blancos_chico"><a href="../sistema.php" class="Blancos_chico">Inicio</a>  |<a href="<?php echo $logoutAction ?>" class="Blancos_chico"> Salir</a></td>
         </tr>
       </table>
     </div>
   </div>
   <div id="index_top"></div>
   <div id="index_menu">
   <div id="index_menu_principal">
     <ul id="MenuBar1" class="MenuBarHorizontal">
       <li><a href="../clientes/clientes.php" class="BlancosCopia">Clientes</a>       </li>
       <li><a href="../inventario/inventario.php" class="BlancosCopia">Inventario</a></li>
       <li><a href="ticket.php" class="BlancosSelection">Ticket</a>       </li>
       <li><a href="../Radius/radius.php" class="BlancosCopia">Radius</a></li>
       <li><a href="../Intranet/intranet.php" class="BlancosCopia">Intranet</a></li>
       <li><a href="../radio planning/radio_planning.php" class="BlancosCopia">Radio Planning</a></li>
       <li><a href="../Indicadores/indicadores.php" class="BlancosCopia">Indicadores</a></li>
       <li><a href="../evaluaciones/evaluaciones.php" class="BlancosCopia">Evaluaciones</a></li>
     </ul>
      </div>
   </div>
   <div id="inventario_submenu"><table width="1000" border="0">
  <tr>
    <td width="5" height="15" class="Sub_menu">&nbsp;</td>
    <td width="100" class="Sub_menu"><a href="buscar_ticket.php" class="LINKSub">Buscar Ticket</a></td>
    <td width="100" class="Sub_menu"><a href="ticket_nuevo.php" class="Sub_menu">Nuevo</a></td>
    <td width="100" class="Sub_menu"><a href="ticket_abiertos.php" class="Sub_menu">Abiertos
      <?php $sql = "SELECT COUNT(*) FROM TICKET WHERE status='Abierto' ";
$resultado = mysql_query($sql);

$select=mysql_query("SELECT * FROM TICKET WHERE status='Abierto' ");
if (mysql_num_rows($select)>0){
 $row = mysql_fetch_array($resultado);
 echo "("; echo $row[0]; echo ")"; }
else {echo "";}

?>
    </a></td>
    <td width="100" class="Sub_menu"><a href="ticket_incumplidos.php" class="Sub_menu">Incumplidos
      <?php 
	  $fecha2=date("Y-m-d H:i:s");
	  $sql2 = "SELECT COUNT(*) FROM TICKET WHERE status='Abierto' and    fecha_solucion<'$fecha2' ";
$resultado2 = mysql_query($sql2);

$select2=mysql_query("SELECT * FROM TICKET WHERE status='Abierto' and  fecha_solucion<'$fecha2'");
if (mysql_num_rows($select2)>0){
 $row = mysql_fetch_array($resultado2);
 echo "("; echo $row[0]; echo ")"; }
else {echo "";}

?>
    </a></td>
    <td width="100" class="Sub_menu"><a href="ticket_cerrados.php" class="Sub_menu">Cerrados
      <?php $sql3 = "SELECT COUNT(*) FROM TICKET WHERE status='Cerrado'";
$resultado3 = mysql_query($sql3);

$select3=mysql_query("SELECT * FROM TICKET WHERE status='Cerrado'");
if (mysql_num_rows($select3)>0){
 $row = mysql_fetch_array($resultado3);
 echo "("; echo $row[0]; echo ")"; }
else {echo "";}

?>
    </a></td>
    <td width="100" class="Sub_menu"><a href="mis_ticket.php" class="Sub_menu">Mis Ticket
      <?php $user3=mysql_query("SELECT nombre FROM usuarios WHERE usuario='$usuario'");

 while($row=mysql_fetch_array($user3)){
     	$user4 =$row['nombre'];
	    global $user4; 
	}$sql4 = "SELECT COUNT(*) FROM TICKET WHERE creador='$user4'";
$resultado4 = mysql_query($sql4);

$select4=mysql_query("SELECT * FROM TICKET WHERE creador='$user4'");
if (mysql_num_rows($select4)>0){
 $row = mysql_fetch_array($resultado4);
 echo "("; echo $row[0]; echo ")"; }
else {echo "";}

?>
    </a></td>
    <td width="100" class="Sub_menu"><a href="asignar.php" class="Sub_menu">Asignados
      <?php $user7=mysql_query("SELECT nombre FROM usuarios WHERE usuario='$usuario'");

 while($row=mysql_fetch_array($user7)){
     	$user7 =$row['nombre'];
	    global $user7; 
	}$sql7 = "SELECT COUNT(*) FROM TICKET WHERE asignar='$user4' and status='Abierto'";
$resultado7 = mysql_query($sql7);

$select7=mysql_query("SELECT * FROM TICKET WHERE asignar='$user4' and status='Abierto'");
if (mysql_num_rows($select7)>0){
 $row = mysql_fetch_array($resultado7);
 echo "("; echo $row[0]; echo ")"; }
else {echo "";}

?>
    </a></td>
    <td width="100" class="Sub_menu"><a href="ticket_finalizados.php" class="Sub_menu">Finalizados
      <?php $sql8 = "SELECT COUNT(*) FROM TICKET WHERE status='Finalizado'";
$resultado8 = mysql_query($sql8);

$select8=mysql_query("SELECT * FROM TICKET WHERE status='Finalizado'");
if (mysql_num_rows($select8)>0){
 $row = mysql_fetch_array($resultado8);
 echo "("; echo $row[0]; echo ")"; }
else {echo "";}

?>
    </a></td>
    <td width="100" class="Sub_menu">&nbsp;</td>
    <td width="49" class="Sub_menu">&nbsp;</td>
  </tr>
</table>
</div>
   <div id="sistema_ingreso_ticket_nuevo">
   <p class="MENU"><span class="negros">Editar Ticket</span><form method="post" action="comprobacion_guardar_factibilidad.php" onsubmit="return validarForm(this);">
     
     <table width="809" border="0">
  <tr>
    <td width="139"><span class="style1 style2">Razon Social :</span></td>
    <td colspan="3"><input name="cliente"  readonly="readonly" value="<?php echo $cliente; ?>"  type="text" id="course"  size="60" class="EDITARCopiaCopia2"/></td>
    <td width="35" class="style1 style2">&nbsp;</td>
    </tr>
  <tr><?php while($row = mysql_fetch_array($sql_editar)){ ?>
    <td><span class="style1 style2">Atendido Por :</span></td>
    <td colspan="3"><input type="text" name="creador" readonly="readonly" value="<?php echo $row['creador'];?>" class="EDITARCopiaCopia2" /></td>
    <td class="style1 style2">&nbsp;</td>
  </tr>
  <tr><input type="hidden" name="numero" readonly="readonly" value="<?php echo $row['numero'];?>" class="EDITARCopiaCopia2" />
    <td><span class="style1 style2">Origen :</span></td>
    <td colspan="3"><input type="text" name="origen" readonly="readonly" value="<?php echo $row['origen'];?>" class="EDITARCopiaCopia2">
    
    
    </td>
    <td class="style1 style2">&nbsp;</td>
    </tr>
  <tr>
    <td><span class="style1 style2">Departamento :</span></td>
    <td colspan="3"><input type="text" name="depto" readonly="readonly" value="<?php echo $row['depto'];?>" class="EDITARCopiaCopia2"></td></td>
    <td width="1" >
  </tr>
  <tr>
    <td><span class="style1 style2">Tipo :</span></td>
    <td colspan="3"><input name="tipo" type="text" readonly="readonly" class="EDITARCopiaCopia2" value="<?php echo $row['tipo'];?>" size="60"></td>
    <td class="style1 style2">&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style1 style2">Subtipo :</span></td>
    <td colspan="3"><input name="subtipo" readonly="readonly" type="text" class="EDITARCopiaCopia2" value="<?php echo $row['subtipo'];?>" size="60"></td>

    <td class="style1 style2">&nbsp;</td>
  </tr>
  <tr>
    
    
  </tr>
  <tr>
    <td>Resultado Factibilidad:</td>
    <td colspan="2"><select name="resultado" class="EDITARCopia" >
        <option value='<?php echo $row['resultado']; ?>'><?php echo $row['resultado'];?></option>
                
                   <?php while($row2 = mysql_fetch_array($sql_resultado)){ ?> <option value="<?php echo $row2['resultado'];?>"> <?php echo $row2['resultado']; ?>
                  <?php } ?> </option>
      
      </select></td>
    <td>&nbsp;</td>
    <td class="style1 style2">&nbsp;</td>
  </tr>
  <tr>
    <td>Reasignar a :</td>
    <td colspan="2"><select name="asignar" class="EDITARCopia" >
        <option value='<?php echo $row['asignar']; ?>'><?php echo $row['asignar'];?></option>
                
                   <?php while($row3 = mysql_fetch_array($sql_responsable)){ ?> <option value="<?php echo $row3['nombre'];?>"> <?php echo $row3['nombre']; ?>
                  <?php } ?> </option>
      
      </select></td>
    <td>&nbsp;</td>
    <td class="style1 style2">&nbsp;</td>
  </tr>
  <tr>
    <td>Estado :</td>
    <td colspan="2"><select name="status" class="EDITARCopia" >
      <option value='<?php echo $row['status']; ?>'><?php echo $row['status'];?></option>
      <?php while($row3 = mysql_fetch_array($sql_status)){ ?>
      <option value="<?php echo $row3['status'];?>"> <?php echo $row3['status']; ?>
        <?php } ?>
        </option>
    </select></td>
    <td>&nbsp;</td>
    <td class="style1 style2">&nbsp;</td>
  </tr>
  <tr>
    <td>Fecha Próxima Gestión</td>
    <td colspan="2"><input type="text" name="fecha_prox_gestion"  id="datepicker" class="EDITARCopia"></td>
    <td>&nbsp;</td>
    <td class="style1 style2">&nbsp;</td>
  </tr>
  <tr>
    <td>Progreso : </td>
    <td colspan="2"><select name="progreso" class="EDITARCopia" >
        <option value='<?php echo $row['estado_factibilidad']; ?>'><?php echo $row['estado_factibilidad'];?></option>
                
                   <?php while($row3 = mysql_fetch_array($sql_progreso)){ ?> <option value="<?php echo $row3['estado_factibilidad'];?>"> <?php echo $row3['estado_factibilidad']; ?>
                  <?php } ?> </option>
      
      </select></td>
    <td>&nbsp;</td>
    <td class="style1 style2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" rowspan="3"><textarea name="comentario" readonly="readonly"  cols="60" rows="7" class="EDITARCopiaCopia2" id="comentario2"><?php  echo $row['comentario'];?></textarea></td>
    <td width="1" rowspan="3">&nbsp;</td>
    <td rowspan="3" class="style1 style2">&nbsp;</td>
  </tr>
  <tr>
    <td>Comentario :</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>Comentario Interno </td>
    <td rowspan="2"><?php
	

	
	
	
	
$sql_abiertos2=mysql_query("SELECT * FROM TICKET_comentario_interno WHERE  cliente='$cliente' and numero='$numero' order by actualizacion desc");

//Sentencia sql (sin limit) 
$_pagi_sql = "SELECT * FROM TICKET_comentario_interno WHERE  cliente='$cliente' and numero='$numero' order by actualizacion desc"; 

//cantidad de resultados por página (opcional, por defecto 20) 



$_pagi_cuantos = 3; 

//Incluimos el script de paginación. Éste ya ejecuta la consulta automáticamente 
include("paginator.inc.php"); 


 
echo "<table  border = '0' bordercolor = 'silver'   cellspacing = '2' cellpadding='3'> \n";
echo "<tr> \n";
echo "<td bgcolor='#58ACC4'><font color='#FFFFFF'><center>Actualización</center></td> \n";
echo "<td bgcolor='#58ACC4'><font color='#FFFFFF'><center>Usuario</center></td> \n";
echo "<td bgcolor='#58ACC4'><font color='#FFFFFF'><center>Comentario</center></td> \n";


echo "</tr> \n";
while ($row = mysql_fetch_row($_pagi_result)){
echo "<tr> \n";
echo "<td>"; echo "<input type='text' class='EDITARCopiaCopia2Copia' value='$row[1]' readonly='readonly' >"; echo "</td> \n";
echo "<td>"; echo "<input type='text' class='EDITARCopiaCopia2Copia' value='$row[2]' readonly='readonly' >"; echo "</td> \n";echo "<td>"; echo "<textarea name='mensaje' class='EDITARCopiaCopia2Copia' cols='42' readonly='readonly' id='mensaje' rows='4'>";echo $row[3]; echo "</textarea>"; echo "</td> \n";



}
echo "</table></center> \n";
echo"<p>".$_pagi_navegacion."</p>";



  
?></td>
    <td rowspan="2" class="style1 style2">&nbsp;</td>
    </tr>
  <tr><?php } ?>
    <td>&nbsp;</td>
  </tr><input name="usuario" readonly="readonly" type="hidden" class="EDITARCopiaCopia2" value="<?php echo $usuario;?>" size="60">
  <tr>
    <td>Agregar comentario</td>
    <td rowspan="2"><textarea name="comentario_interno"  cols="60" rows="7" class="EDITARCopia" id="comentario_interno">
    </textarea></td>
    <td rowspan="2">&nbsp;</td>
    <td rowspan="2">&nbsp;</td>
    <td rowspan="2" class="style1 style2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td class="style1 style2">&nbsp;</td>
  </tr>
  <tr>
    <td><input name="btn_submit3" type="submit" class="EDITARCopia" value="Guardar Cambios" /></td>
    <td><input name="btn_submit4" type="reset" value="Limpiar  Datos" class="EDITARCopia" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td class="style1 style2">&nbsp;</td>
  </tr>
     </table>
    </form></p>
   </div>
   
   <div id="index_foot"></div>
   <div id="index_footer">Sistema Gestión de Clientes y Control Interno - Netland Chile S.A. | Todos los derechos reservados &copy; 2013<p class="lp">
   Desarrollado por Luis Ponce Zúñiga




</div>
   
   
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