<?php
include("../../../system/config.php");
include("../../../services/config.php");
$tecnico = $_POST["tecnico"];
$fecha_evaluacion = $_POST["fecha_evaluacion"];


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
	background-image: url(../../../images/repeat.png);
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
	$("#course").autocomplete("busqueda_razon.php", {
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
	$("#course1").autocomplete("busqueda_rut.php", {
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
	$("#course2").autocomplete("busqueda_contacto.php", {
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
	$("#course3").autocomplete("busqueda_mac.php", {
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
	$("#course4").autocomplete("busqueda_ip.php", {
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
	$("#course6").autocomplete("busqueda_proveedor.php", {
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
       <li><a href="../inventario/inventario.php" class="BlancosCopia">Inventario</a></li>
       <li><a href="../ticket/ticket.php" class="BlancosCopia">Ticket</a>       </li>
       <li><a href="../Radius/radius.php" class="BlancosCopia">Radius</a></li>
       <li><a href="../Intranet/intranet.php" class="BlancosCopia">Intranet</a></li>
       <li><a href="../radio planning/radio_planning.php" class="BlancosCopia">Radio Planning</a></li>
       <li><a href="../Indicadores/indicadores.php" class="BlancosCopia">Indicadores</a></li>
       <li><a href="evaluaciones.php" class="BlancosSelection">Evaluaciones</a></li>
     </ul>
      </div>
   </div>
   <div id="inventario_submenu"><table width="1000" border="0">
  <tr>
    <td width="130" class="iconos_topCENTRO"><a href="evaluar_a.php" class="iconos_top">Evaluar</a></td>
    <td width="130" class="iconos_topCENTRO"><a href="notas.php" class="iconos_top">Ver Notas Parciales</a></td>
    <td width="130" class="iconos_topCENTRO">&nbsp;</td>
<td width="130" class="iconos_topCENTRO">&nbsp;</td>
<td width="130" class="iconos_topCENTRO">&nbsp;</td>

    <td width="324">&nbsp;</td>
  </tr>
</table></div><div id="inventario_submenu3">
   <p>Trabajador : <?php echo $tecnico;?> <p>Fecha = <?php echo $fecha_evaluacion;?></p><form action="prueba.php" method="post">
   <table width="800" border="0">
     <tr class="Blancos_chico">
       <td bgcolor="#58ACC4" class="MENU">Desempeño Laboral</td>
       <td width="60" bgcolor="#58ACC4" class="MENU">E</td>
       <td width="60" bgcolor="#58ACC4" class="MENU">MB</td>
       <td width="60" bgcolor="#58ACC4" class="MENU">B</td>
       <td width="60" bgcolor="#58ACC4" class="MENU">R</td>
       <td width="60" bgcolor="#58ACC4" class="MENU">M</td>
       <td width="60" bgcolor="#58ACC4" class="MENU">MM</td>
       <td width="60" bgcolor="#58ACC4" class="MENU">P</td>
     </tr>
     <tr>
       <td width="346">Puntualidad</td>
       <td class="iconos_topCENTRO"><input type="radio" name="puntualidad" value="7">         <br></td>
       <td class="iconos_topCENTRO"><input type="radio" name="puntualidad" value="6" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="puntualidad" value="5" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="puntualidad" value="4" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="puntualidad" value="3" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="puntualidad" value="2" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="puntualidad" value="1" /></td>
     </tr>
     <tr>
       <td>Responsabilidad</td>
       <td class="iconos_topCENTRO"><input type="radio" name="responsabilidad" value="7" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="responsabilidad" value="6" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="responsabilidad" value="5" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="responsabilidad" value="4" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="responsabilidad" value="3" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="responsabilidad" value="2" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="responsabilidad" value="1" /></td>
     </tr>
     <tr>
       <td>Calidad de Trabajo</td>
       <td class="iconos_topCENTRO"><input type="radio" name="calidad" value="7" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="calidad" value="6" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="calidad" value="5" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="calidad" value="4" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="calidad" value="3" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="calidad" value="2" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="calidad" value="1" /></td>
      </tr>
     <tr>
       <td>Cumplimiento de Rutas</td>
       <td class="iconos_topCENTRO"><input type="radio" name="cumplimiento" value="7" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="cumplimiento" value="6" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="cumplimiento" value="5" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="cumplimiento" value="4" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="cumplimiento" value="3" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="cumplimiento" value="2" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="cumplimiento" value="1" /></td>
      </tr>
     <tr>
       <td>Documentacion e Informes</td>
       <td class="iconos_topCENTRO"><input type="radio" name="documentacion" value="7" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="documentacion" value="6" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="documentacion" value="5" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="documentacion" value="4" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="documentacion" value="3" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="documentacion" value="2" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="documentacion" value="1" /></td>
      </tr>
     <tr>
       <td>Grado de Conocimiento Técnico</td>
       <td class="iconos_topCENTRO"><input type="radio" name="conocimiento" value="7" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="conocimiento" value="6" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="conocimiento" value="5" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="conocimiento" value="4" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="conocimiento" value="3" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="conocimiento" value="2" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="conocimiento" value="1" /></td>
      </tr>
     <tr>
       <td>Resolución de Conflictos</td>
       <td class="iconos_topCENTRO"><input type="radio" name="resolucion" value="7" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="resolucion" value="6" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="resolucion" value="5" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="resolucion" value="4" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="resolucion" value="3" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="resolucion" value="2" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="resolucion" value="1" /></td>
      </tr>
   </table>
   <table width="800" border="0">
     <tr class="MENU">
       <td bgcolor="#58ACC4" class="MENU">Relación Interpersonal</td>
       <td width="60" bgcolor="#58ACC4" class="MENU">E</td>
       <td width="60" bgcolor="#58ACC4" class="MENU">MB</td>
       <td width="60" bgcolor="#58ACC4" class="MENU">B</td>
       <td width="60" bgcolor="#58ACC4" class="MENU">R</td>
       <td width="60" bgcolor="#58ACC4" class="MENU">M</td>
       <td width="60" bgcolor="#58ACC4" class="MENU">MM</td>
       <td width="60" bgcolor="#58ACC4" class="MENU">P</td>
     </tr>
     <tr>
       <td width="346">Actitud Hacia la Empresa</td>
       <td class="iconos_topCENTRO"><input type="radio" name="actitud_e" value="7">         <br></td>
       <td class="iconos_topCENTRO"><input type="radio" name="actitud_e" value="6" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="actitud_e" value="5" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="actitud_e" value="4" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="actitud_e" value="3" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="actitud_e" value="2" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="actitud_e" value="1" /></td>
     </tr>
     <tr>
       <td>Actitud Hacia los Superiores</td>
       <td class="iconos_topCENTRO"><input type="radio" name="actitud_s" value="7" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="actitud_s" value="6" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="actitud_s" value="5" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="actitud_s" value="4" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="actitud_s" value="3" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="actitud_s" value="2" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="actitud_s" value="1" /></td>
     </tr>
     <tr>
       <td>Actituda Hacia los Compañeros</td>
       <td class="iconos_topCENTRO"><input type="radio" name="actitud_c" value="7" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="actitud_c" value="6" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="actitud_c" value="5" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="actitud_c" value="4" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="actitud_c" value="3" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="actitud_c" value="2" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="actitud_c" value="1" /></td>
      </tr>
     <tr>
       <td>Actitud con el Cliente</td>
       <td class="iconos_topCENTRO"><input type="radio" name="actitud_cc" value="7" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="actitud_cc" value="6" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="actitud_cc" value="5" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="actitud_cc" value="4" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="actitud_cc" value="3" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="actitud_cc" value="2" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="actitud_cc" value="1" /></td>
      </tr>
     <tr>
       <td>Trabajo en Equipo</td>
       <td class="iconos_topCENTRO"><input type="radio" name="trabajo_e" value="7" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="trabajo_e" value="6" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="trabajo_e" value="5" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="trabajo_e" value="4" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="trabajo_e" value="3" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="trabajo_e" value="2" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="trabajo_e" value="1" /></td>
      </tr>
   </table>
   <table width="800" border="0">
     <tr class="MENU">
       <td bgcolor="#58ACC4" class="MENU">Habilidades</td>
       <td width="60" bgcolor="#58ACC4" class="MENU">E</td>
       <td width="60" bgcolor="#58ACC4" class="MENU">MB</td>
       <td width="60" bgcolor="#58ACC4" class="MENU">B</td>
       <td width="60" bgcolor="#58ACC4" class="MENU">R</td>
       <td width="60" bgcolor="#58ACC4" class="MENU">M</td>
       <td width="60" bgcolor="#58ACC4" class="MENU">MM</td>
       <td width="60" bgcolor="#58ACC4" class="MENU">P</td>
     </tr>
     <tr>
       <td width="346" height="23">Iniciativa</td>
       <td class="iconos_topCENTRO"><input type="radio" name="iniciativa" value="7">         <br></td>
       <td class="iconos_topCENTRO"><input type="radio" name="iniciativa" value="6" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="iniciativa" value="5" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="iniciativa" value="4" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="iniciativa" value="3" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="iniciativa" value="2" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="iniciativa" value="1" /></td>
     </tr>
     <tr>
       <td>Creatividad</td>
       <td class="iconos_topCENTRO"><input type="radio" name="creatividad" value="7" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="creatividad" value="6" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="creatividad" value="5" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="creatividad" value="4" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="creatividad" value="3" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="creatividad" value="2" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="creatividad" value="1" /></td>
     </tr>
     <tr>
       <td>Respuesta Bajo Presión</td>
       <td class="iconos_topCENTRO"><input type="radio" name="respuesta" value="7" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="respuesta" value="6" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="respuesta" value="5" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="respuesta" value="4" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="respuesta" value="3" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="respuesta" value="2" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="respuesta" value="1" /></td>
      </tr>
     <tr>
       <td>Relación con el Cliente</td>
       <td class="iconos_topCENTRO"><input type="radio" name="relacion" value="7" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="relacion" value="6" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="relacion" value="5" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="relacion" value="4" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="relacion" value="3" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="relacion" value="2" /></td>
       <td class="iconos_topCENTRO"><input type="radio" name="relacion" value="1" /></td>
      </tr>
   </table>
   <table width="800" border="0">
     <tr>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
     </tr>
     <tr>
       <td>Comentario</td>
       <td><textarea cols="70" name="comentario" rows="6" class="EDITARCopia"
       ></textarea></td>
       <td>&nbsp;</td>
     </tr>
     <tr>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
     </tr>
   </table>
   <p><p>
   <input type="hidden" value="<?php echo $fecha_evaluacion;?>" name="fecha_evaluacion" />
      <input type="hidden" value="<?php echo $tecnico; ?>" name="tecnico" />

   <input type="submit" value="Ingresar Evaluacion" />
   <input type="reset" value="Restaurar Valores" />
   </form>
   <p>&nbsp;</p>
   <p>&nbsp;</p>
   <p>&nbsp;</p>
   </div>
   <div id="index_foot"></div>
   <div id="index_footer">Sistema Gestión de Clientes y Control Interno - Netland Chile S.A. | Todos los derechos reservados © 2013 </p>
     <p>Desarrollado por Luis Ponce Zúñiga</div>
   
   
  </div>
  <script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../../SpryAssets/SpryMenuBarRightHover.gif"});
  </script>
  </body>
  </html>

