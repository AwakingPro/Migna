<?php

include("../../../system/config.php");
$serial= $_GET["serial"];
$mac= $_GET["mac"];
$tipo= $_GET["tipo"];
$marca= $_GET["marca"];
$modelo= $_GET["modelo"];
$proveedor= $_GET["proveedor"];
$bodega= $_GET["bodega"];
  
$sql=mysql_query("SELECT serial,mac,tipo,marca,modelo,proveedor,bodega FROM INV_activos WHERE serial='$serial' or mac='$mac' or tipo='$tipo' or marca='$marca' or modelo='$modelo' or proveedor='$proveedor' or bodega='$bodega' ORDER BY bodega ASC");
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
$MM_authorizedUsers = "1";
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
    <script language="JavaScript">
function confirmar ( mensaje ) {
return confirm( mensaje );
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
    <td width="221"></td>
    <td width="128" class="Blancos_chico">Inicio |&nbsp;Admin | Salir</td>
    </tr>
  </table></div>
   </div>
   <div id="index_top"></div>
   <div id="index_menu">
   <div id="index_menu_principal">
     <ul id="MenuBar1" class="MenuBarHorizontal">
       <li><a href="#" class="Blancos">Clientes</a>       </li>
       <li><a href="inventario.php" class="CLASE_CLIENTES">Inventario</a></li>
       <li><a href="#" class="Blancos">Ticket</a>       </li>
       <li><a href="#" class="Blancos">Radius</a></li>
       <li class="Blancos"><a href="#" class="Blancos">Intranet</a></li>
       <li><a href="#" class="Blancos">Radio Planning</a></li>
     </ul>
      </div>
   </div>
   <div id="inventario_submenu"></div>
   <div id="inventario_modulo_ingresos2">
     <p class="Titulos">Seleccione Activo  a Editar</p>
     <p class="formularios">
       <span class="Titulos">
       <?php

echo "<center><table border = '0' cellspacing = '1' cellpadding='3'></center> \n";
echo "<tr> \n";
echo "<td bgcolor='#333'><font color='#FFFFFF'><center>Serial</center></td> \n";
echo "<td bgcolor='#333'><font color='#FFFFFF'><center>Mac</font></td> \n";
echo "<td bgcolor='#333'><font color='#FFFFFF'><center>Tipo</font></td> \n";
echo "<td bgcolor='#333'><font color='#FFFFFF'><center>Marca</font></td> \n";
echo "<td bgcolor='#333'><font color='#FFFFFF'><center>Modelo</font></td> \n";
echo "<td bgcolor='#333'><font color='#FFFFFF'><center>Proveedor</font></td> \n";
echo "<td bgcolor='#333'><font color='#FFFFFF'><center>Bodega</center></td> \n";
echo "<td bgcolor='#333'><font color='#FFFFFF'><center>Modificar</center></td> \n";
echo "<td bgcolor='#333'><font color='#FFFFFF'><center>Eliminar</center></td> \n";
echo "</tr> \n";

while ($row = mysql_fetch_row($sql)){
echo "<tr> \n";
echo "<td><center>$row[0]</center></td> \n";
echo "<td><center>$row[1]</center></td> \n";
echo "<td><center>$row[2]</center></td> \n";
echo "<td><center>$row[3]</center></td> \n";
echo "<td><center>$row[4]</center></td> \n";
echo "<td><center>$row[5]</center></td> \n";
echo "<td><center>$row[6]</center></td> \n";
echo "<td><center><a style='color:#000'  href='inventario_comprobacion_editar_activos.php?serial=$row[0]&mac=$row[1]&' text-decoration:none><img src='../../../images/editar.png'  alt='Editar'/></a></center></td> \n";
echo "<td><center><a href='inventario_comprobacion_eliminar_activos.php?serial=$row[0]&mac=$row[1]'  onclick='return confirm('Esta¡ seguro de eliminar este registro? \n P.D.si lo elimina no lo podra recuperar de la base de datos.');'><img src='../../../images/eliminar.png'  alt='Eliminar'/></a></center></td> \n";
echo "</tr> \n";  



}
echo "</table></center> \n";
mysql_free_result($sql);
mysql_free_result($sql2);
?>


<?php 
?> <a href="../../../Supervisor/sistema/inventario/eliminar.php?id=5" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')">Eliminar</a>  <?php 
?>
       </span>
     <p class="Titulos">
  <a href="inventario_modificar_activos.php" class="Titulos">Volver</a> </div>
   
   <div id="index_foot"></div>
   <div id="index_footer">Sistema Gestión de Clientes - Netland Chile S.A. - Todos los derechos reservados</div>
   
   
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