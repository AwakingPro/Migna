<?php
include("../../../system/config.php");
include("../../../services/config.php");

$sql_nombre=mysql_query("SELECT cliente FROM SP_soporte_crear_cliente ORDER  BY cliente ASC");
$sql_rut=mysql_query("SELECT rut FROM SP_soporte_crear_cliente ORDER  BY rut ASC");


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
$cliente=$_SESSION['MM_Username'];
$bienvenido=mysql_query("SELECT nombre FROM usuarios WHERE usuario='$cliente'");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php include '../../../include/estructura/title.php';?>
<head>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script type="text/javascript" src="../../../js/Servicios/Servicios.js"></script>
  <script src="https://use.fontawesome.com/dd52e99da5.js"></script>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link href="../../../css/estilos.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
  <link href="../../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
  <link href="../../../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
  <script src="../../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
    <style>
      #datos_com{
        height : 30px;
      }
      #supermenu{
        height : 28px;
      }
      #top{
        height : 100px;
      }
    </style>
    
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
      <li><a href="../pppoe/index.php">PPPoE</a></li>
    </ul>
  </div>

 <?php include '../../../include/estructura/submenu_clientes_busqueda_ingreso_dato_tecnico.php';?>
  <div id="busqueda_clientes">
    <div id="datos_com"><strong>Asociar Servicio a Cliente</strong></div>
		<br>
		<div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <label for="sel1"> Razón Social</label>
        <select class="selectpicker form-control" data-live-search="true" id="Cliente">
				<?php $QueryCliente = mysql_query("SELECT cliente FROM SP_soporte_crear_cliente");
					while($row = mysql_fetch_array($QueryCliente)){
						echo "<option>".utf8_encode($row[0])."</option>";
					}
				?>
				</select>
      </div> 
    </div>
    <div class="col-sm-3"> 
      <div class="form-group">
        <label for="sel1"> Servicio</label>
        <select class="form-control" id="Servicio">
          <option value="1">Servicios de Internet | Intranet </option>
					<option value="2">Servicios de Telefonía IP </option>
					<option value="3">Otros Servicios (Datacenter,VPN,Etc.)</option>
					<option value="4">ACRONIS</option>
        </select>

      </div> 
    </div>
    <div class="col-sm-3">
      <div class="form-group">
          <label for="sel1">&nbsp;&nbsp; </label>
        <button type="button" class="btn btn-primary col-sm-12" id="Validar">Ingresar</button>
      </div> 
    </div>
  </div> 

   <p class="Nota">Nota : Escriba las iniciales o coincidencia de caractéres en el campo de búsqueda.</p>
 
  <?php
	
	$ingresado= $_GET["id"];
	if ($ingresado==1){
		
		echo "<div id='dialog' title='Error'><p><center>No se encuentra Registro.<br><br><br>
		   <form action='header.php' method='post'>
		   	   <input type='hidden' name='id_header' value='5'>
	   <input type='submit' value='cerrar'>
	   </form></center></div>";
		

		}
	else if ($ingresado==10){
		
		echo "<div id='dialog' title='Error'><p><center>Se debe ingresar Dato Técnico de Internet primero<br><br><br>
		   <form action='header.php' method='post'>
		   	   <input type='hidden' name='id_header' value='5'>
	   <input type='submit' value='cerrar'>
	   </form></center></div>";
		

		}
		else if ($ingresado==9){
		
		echo "<div id='dialog' title='Registro VOIP'><p><center>Registro Ingresado Exitosamente<br><br><br>
		   <form action='header.php' method='post'>
		   	   <input type='hidden' name='id_header' value='5'>
	   <input type='submit' value='cerrar'>
	   </form></center></div>";
		

		}
		else if ($ingresado==8){
		
		echo "<div id='dialog' title='Error'><p><center>Cliente ya cuenta con Servicio VOIP en este enlace<br><br><br>
		   <form action='header.php' method='post'>
		   	   <input type='hidden' name='id_header' value='5'>
	   <input type='submit' value='cerrar'>
	   </form></center></div>";
		

		}
		else if ($ingresado==7){
		
		echo "<div id='dialog' title='Error'><p><center>Cliente ya cuenta con Otros Servicios en este enlace<br><br><br>
		   <form action='header.php' method='post'>
		   	   <input type='hidden' name='id_header' value='5'>
	   <input type='submit' value='cerrar'>
	   </form></center></div>";
		

		}
	
	?>
  </div>
   <div id="extension"></div><div id="extension"></div>

</div>
  
  
</div>

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>

