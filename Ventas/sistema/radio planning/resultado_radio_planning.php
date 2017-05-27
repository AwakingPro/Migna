<?php
include("../../../system/config.php");
include("../../../services/config.php");
$estacion= $_GET["estacion"];
$ip= $_GET["ip"];
$ssid= $_GET["ssid"];
$remarks= $_GET["remarks"];
$mac= $_GET["mac"];



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
	background-image: url(../../../images/imagen.png);
}
  </style>
  <link href="../../../css/sistema.css" rel="stylesheet" type="text/css" />
  <link href="../../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
  <link href="../../../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
  <script src="../../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
  <script type="text/javascript" src="../../../script/jquery.js"></script>
  <script type="text/javascript" src="../../../script/jquery.jCombo.min.js"></script>
  <script type='text/javascript' src='../../../javascript/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../../../javascript/jquery.autocomplete.css" />
  <script type="text/javascript">
$().ready(function() {
	$("#course").autocomplete("busqueda_estacion.php", {
		width: 260,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
});
$().ready(function() {
	$("#course2").autocomplete("busqueda_ip.php", {
		width: 260,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
});
$().ready(function() {
	$("#course3").autocomplete("busqueda_ssid.php", {
		width: 260,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
});
$().ready(function() {
	$("#course4").autocomplete("busqueda_remarks.php", {
		width: 260,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
});

$().ready(function() {
	$("#course7").autocomplete("busqueda_bodega.php", {
		width: 260,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
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
     <div id="sistema_welcome_top">
       
       <table width="359" border="0">
         <tr>
           <td width="273"></td>
           <td width="76"><a href="../../../User/sistema/radio planning/sistema.php" class="Blancos_chico">Inicio</a><span class="Blancos_chico"> |<a href="<?php echo $logoutAction ?>" class="Blancos_chico"> Salir</a></span></td>
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
       <li><a href="../ticket/ticket.php" class="BlancosCopia">Ticket</a>       </li>
       <li><a href="../Radius/radius.php" class="BlancosCopia">Radius</a></li>
       <li><a href="../Intranet/intranet.php" class="BlancosCopia">Intranet</a></li>
       <li><a href="radio_planning.php" class="BlancosSelection">Radio Planning</a></li>
       <li><a href="../Indicadores/indicadores.php" class="BlancosCopia">Indicadores</a></li>
       <li><a href="../evaluaciones/evaluaciones.php" class="BlancosCopia">Evaluaciones</a></li>
     </ul>

     </div>
   </div>
   <div id="inventario_submenu"><table width="1000" border="0">
  <tr>
    <td width="130" class="iconos_topCENTRO"><a href="busqueda_radio_planning.php" class="iconos_top">Buscar Registro</a></td>
    <td width="130" class="iconos_topCENTRO"><a href="radio_planning_ingresos.php" class="iconos_top">Ingresar Registros</a></td>
    <td width="130" class="iconos_topCENTRO"><a href="busqueda_estacion_radio_planning.php" class="iconos_top">Buscar Estación</a></td>
<td width="130" class="iconos_topCENTRO"><a href="radio_planning_ingresos_estaciones.php" class="iconos_top">Ingresar Estación</a></td>
<td width="130" class="iconos_topCENTRO"><a href="ingreso_kml.php" class="iconos_top">Subir KML</a></td>

    <td width="324">&nbsp;</td>
  </tr>
</table></div>
   <div id="radio_planning_resultado">
     <p class="iconos_topCENTRO">Resultado busqueda Radio Planning     
     <p>
	 <?php
$sql=mysql_query("SELECT estacion,funcion,ip,password,ancho_canal,frecuencia,ssid,remarks,puerto FROM INT_radio_planning WHERE estacion='$estacion' or ip='$ip' or remarks='$remarks' or ssid='$ssid' or mac='$mac'");

//Sentencia sql (sin limit) 
$_pagi_sql = "SELECT estacion,funcion,ip,password,ancho_canal,frecuencia,ssid,remarks,puerto FROM INT_radio_planning WHERE estacion='$estacion' or ip='$ip' or remarks='$remarks' or ssid='$ssid' or mac='$mac'"; 

//cantidad de resultados por página (opcional, por defecto 20) 



$_pagi_cuantos = 10; 

//Incluimos el script de paginación. Éste ya ejecuta la consulta automáticamente 
include("../../../Basico/sistema/radio planning/paginator.inc.php"); 
echo "<center><table border = '0' cellspacing = '1' cellpadding='3'></center> \n";
echo "<tr> \n";
echo "<td bgcolor='#58ACC4'><font color='#ffffff'><center>Estación</center></td> \n";
echo "<td bgcolor='#58ACC4'><font color='#ffffff'><center>Función</center></td> \n";
echo "<td bgcolor='#58ACC4'><font color='#ffffff'><center>Direccion IP</font></td> \n";

echo "<td bgcolor='#58ACC4'><font color='#ffffff'><center>Ancho Canal</center></td> \n";
echo "<td bgcolor='#58ACC4'><font color='#ffffff'><center>Frecuencia</center></td> \n";
echo "<td bgcolor='#58ACC4'><font color='#ffffff'><center>SSID/Remarks</center></td> \n";

echo "<td bgcolor='#58ACC4'><font color='#ffffff'><center>Google Earth</center></td> \n";
echo "<td bgcolor='#58ACC4'><font color='#ffffff'><center>Modificar</center></td> \n";
echo "<td bgcolor='#58ACC4'><font color='#ffffff'><center>Más Info</center></td> \n";
echo "</tr> \n";
while ($row = mysql_fetch_row($_pagi_result)){
echo "<tr> \n";
echo "<td><center>$row[0]</center></td> \n";
echo "<td><center>$row[1]</center></td> \n";
echo "<td><center><a style='color:#000'  href='http://$row[2]:$row[8]' >$row[2]</center></td> \n";

echo "<td><center>$row[4]</center></td> \n";
echo "<td><center>$row[5]</center></td> \n";
echo "<td>$row[7]</td> \n";
echo "<td><center><a style='color:#000'  href='comprobacion_kmz2.php?remarks=$row[7]&ssid=$row[8]' target='popup' onclick='window.open('', 'popup', 'width=300,height=200')' text-decoration:none>Descargar KML</a></center></td> \n";
echo "<td><center><a style='color:#000'  href='comprobacion_editar.php?remarks=$row[7]&ip=$row[2]' text-decoration:none><img src='../../../images/editar.png'  alt='Editar'/></a></center></td> \n";

echo "<td><center><a style='color:#000'  href='comprobacion_mas_info.php?remarks=$row[7]&ip=$row[2]' text-decoration:none><img src='../../../images/mas.png'  alt='Eliminar'/></a></center></td> \n";
echo "</tr> \n";

}
echo "</table></center> \n";
echo"<p>".$_pagi_navegacion."</p>";
mysql_free_result($sql);
mysql_free_result($sql2);
?>
	 

    </div>
   
   <div id="index_foot"></div>
   <div id="index_footer">
     <p>Sistema Gestión de Clientes y Control Interno - Netland Chile S.A. | Todos los derechos reservados © 2013</p>
     <p> Desarrollado por Luis Ponce Zúñiga </p>
   </div>
   
   
  </div>
  <script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../../SpryAssets/SpryMenuBarRightHover.gif"});
  </script>
  </body>
  </html>
