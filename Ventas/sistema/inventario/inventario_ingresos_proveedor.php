<?php
include("../../../system/config.php");
$sql_bodega=mysql_query("SELECT bodega FROM INV_bodega ORDER BY bodega ASC");
$sql_marca=mysql_query("SELECT marca FROM INV_marca ORDER BY marca ASC");
$sql_modelo=mysql_query("SELECT modelo FROM INV_modelo ORDER BY modelo ASC");
$sql_tipo=mysql_query("SELECT tipo FROM INV_tipo ORDER BY tipo ASC");
$sql_proveedor=mysql_query("SELECT nombre FROM INV_proveedor ORDER BY proveedor ASC");
$sql_responsable=mysql_query("SELECT nombre FROM usuarios ORDER BY nombre ASC");
$sql_estado=mysql_query("SELECT estado FROM INV_estado ORDER BY estado ASC");


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
   <link href="../../../css/sistema.css" rel="stylesheet" type="text/css" />
  <link href="../../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
  <link href="../../../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
  <link href="../../../js/jquery-ui-1.7.2.custom.css" rel="stylesheet" type="text/css" />
  <script src="../../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>

   <script type="text/javascript">
function validarForm(formulario) {
  if(formulario.rut.value.length==0) { //comprueba que no esté vacío
    formulario.rut.focus();   
    alert('No has escrito el Rut'); 
    return false; //devolvemos el foco
  }
  if(formulario.nombre.value.length==0) { //comprueba que no esté vacío
    formulario.nombre.focus();
    alert('No has escrito Razon Social');
    return false;
  }
 if(formulario.especialidad.value.length==0) { //comprueba que no esté vacío
    formulario.especialidad.focus();
    alert('No has escrito especialidad');
    return false;
  }
   if(formulario.direccion.value.length==0) { //comprueba que no esté vacío
    formulario.direccion.focus();
    alert('No has escrito direccion');
    return false;
  }
   if(formulario.telefono.value.length==0) { //comprueba que no esté vacío
    formulario.telefono.focus();
    alert('No has escrito telefono');
    return false;
  }
   if(formulario.correo.value.length==0) { //comprueba que no esté vacío
    formulario.correo.focus();
    alert('No has escrito correo');
    return false;
  }
   if(formulario.contacto.value.length==0) { //comprueba que no esté vacío
    formulario.contacto.focus();
    alert('No has escrito contacto');
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
	background-image: url(../../../images/imagen.png);
}
  </style>
 
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
       </table>
</div>
   </div>
   <div id="index_top"></div>
   <div id="index_menu">
   <div id="index_menu_principal">
     
<ul id="MenuBar1" class="MenuBarHorizontal">
       <li><a href="../clientes/clientes.php" class="BlancosCopia">Clientes</a>       </li>
       <li><a href="inventario.php" class="BlancosSelection">Inventario</a></li>
       <li><a href="../ticket/ticket.php" class="BlancosCopia">Ticket</a>       </li>
       <li><a href="../Radius/radius.php" class="BlancosCopia">Radius</a></li>
       <li><a href="../Intranet/intranet.php" class="BlancosCopia">Intranet</a></li>
       <li><a href="../radio planning/radio_planning.php" class="BlancosCopia">Radio Planning</a></li>
       <li><a href="../Indicadores/indicadores.php" class="BlancosCopia">Indicadores</a></li>
       <li><a href="../evaluaciones/evaluaciones.php" class="BlancosCopia">Evaluaciones</a></li>
     </ul>

      </div>
   </div>
   <div id="inventario_submenu"><table width="900" border="0">
  <tr>
    <td width="200" class="iconos_topCENTRO"><a href="buscar_activos.php" class="iconos_top">Sección Busqueda</a></td>
    <td width="200" class="iconos_topCENTRO"><a href="inventario_ingresos.php" class="iconos_top">Sección Ingresos</a></td>
    <td width="200" class="iconos_topCENTRO"><a href="inventario_modificar.php" class="iconos_top">Sección Editar</a></td>
    <td width="382">&nbsp;</td>
  </tr>
</table>



</div>
   <div id="inventario_modulo_ingresos_activos">
     <div id="inventario_ingresos_menu_left2">
       <div id="inventario_modulo_left_menu">Menu Ingresos</div>
       <div id="inventario_menu_lateral">
       <ul id="MenuBar3" class="MenuBarVertical">
         <li><a href="inventario_ingresos_activos.php" class="negros">Activos</a>         </li>
         <li><a href="inventario_ingresos_bodega.php" class="negros">Bodegas</a></li>
         <li><a href="inventario_ingresos_proveedor.php" class="Menues">Proveedores</a>         </li>
         <li><a href="inventario_ingresos_tipo.php" class="negros">Tipo </a></li>
         <li><a href="inventario_ingresos_marca.php" class="negros">Marca</a></li>
         <li><a href="inventario_ingresos_modelo.php" class="negros">Modelo</a></li>
         <li><a href="inventario_ingresos_estado.php" class="negros">Estado</a></li>
       </ul>
       </div>
       <div id="nota">
         <div id="notita">
           <p><em><strong>Nota:</strong></em></p>
           <p><em>Antes de ingresar activos recuerde que debe ingresar Proveedor,Bodega de destino,marca,modelo y tipo.</em></p>
         </div>
       </div>
       
     </div>
     <div id="inventario_modulo_right_ingresos">
       <div id="inventario_menu_rght">Ingresar Nuevo Proveedor</div>
       <table width="500" border="0">  <form method="post" action="inventario_comprobacion_ingreso_proveedor.php" onsubmit="return validarForm(this);">
         <tr>
           <td width="249">&nbsp;</td>
           <td width="241">&nbsp;</td>
         </tr>
         <tr>
           <td>Rut</td>
           <td><input name="rut" type="text" class="EDITARCopiaCopia2Copia" i size="30"/></td>
         </tr>
         <tr>
           <td>Razon Social</td>
           <td><input name="nombre" type="text" class="EDITARCopiaCopia2Copia"  size="30"/></td>
         </tr>
         <tr>
           <td>Especialidad</td>
           <td><input name="especialidad" type="text" class="EDITARCopiaCopia2Copia"  size="30"/></td>
         </tr>
         <tr>
           <td>Dirección</td>
           <td><input name="direccion" type="text" class="EDITARCopiaCopia2Copia"  size="30"/></td>
         </tr>
         <tr>
           <td>Teléfonos</td>
           <td><input name="telefono" type="text" class="EDITARCopiaCopia2Copia"  size="30"/></td>
         </tr>
         <tr>
           <td>Correo</td>
           <td><input name="correo" type="text" class="EDITARCopiaCopia2Copia"  size="30"/></td>
         </tr>
         <tr>
           <td>Contacto</td>
           <td><input name="contacto" type="text" class="EDITARCopiaCopia2Copia"  size="30"/></td>
         </tr>
          <tr>
           <td><input  type="submit" class="EDITARCopiaCopia2Copia"   value="Ingresar Proveedor"/></td>
           <td width="241"><input  type="reset" class="EDITARCopiaCopia2Copia"    value="Restaurar Valores"/></td>
          </tr></FORM>
       </table>
       <p>&nbsp;</p>
     </div>
   </div>
   
   <div id="index_foot"></div>
   <div id="index_footer">
Sistema Gestión de Clientes y Control Interno - Netland Chile S.A. | Todos los derechos reservados &copy; 2013<p class="lp">
   Desarrollado por Luis Ponce Zúñiga
</div>
   
   
  </div>
  <script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../../SpryAssets/SpryMenuBarRightHover.gif"});
var MenuBar3 = new Spry.Widget.MenuBar("MenuBar3", {imgRight:"../../../SpryAssets/SpryMenuBarRightHover.gif"});
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


?>