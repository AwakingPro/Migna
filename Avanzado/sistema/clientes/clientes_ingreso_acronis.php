<?php
include("../../../system/config.php");
include("../../../services/config.php");

$cliente = $_GET["cliente"];
$alias = $_GET["alias"];


$NombreCliente;
$Rut;
$Contacto;
$Telefon;
$Correo;
$Direccion;
$QueryCliente = mysql_query("SELECT cliente,rut,contacto,telefonos,correos,direccion_comercial FROM SP_soporte_crear_cliente WHERE cliente='$cliente'");
while($row = mysql_fetch_array($QueryCliente)){
  $NombreCliente = $row[0];
  $Rut = $row[1];
  $Contacto  = $row[2];
  $Telefono = $row[3];
  $Correo = $row[4];
  $Direccion = $row[5];
}

include("../../../system/config.php");
include("../../../services/config.php");

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
$username2=$_SESSION['MM_Username'];
$bienvenido=mysql_query("SELECT nombre FROM usuarios WHERE usuario='$username2'");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include '../../../include/estructura/title.php';?>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #F9F9F9;
}
</style>

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
 
  <div id="crear_dato_tecnico2">
  <div id="datos_com"><strong>Datos Comerciales</strong></div>

  <div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <label for="sel1"> Razón Social</label>
        <input type="text" class="form-control" id="Cliente" disabled value="<?php echo $NombreCliente; ?>">
      </div> 
    </div>
    <div class="col-sm-3"> 
      <div class="form-group">
        <label for="sel1"> Rut</label>
        <input type="text" class="form-control" id="Rut" disabled value="<?php echo $Rut; ?>">

      </div> 
    </div>
    <div class="col-sm-3">
      <div class="form-group">
          <label for="sel1">Contacto</label>
          <input type="text" class="form-control"  disabled value="<?php echo $Contacto; ?>">
      </div> 
    </div>
  </div> 

  <div class="row">
    <div class="col-sm-3">
      <div class="form-group">
        <label for="sel1">Correos</label>
        <input type="text" class="form-control" disabled value="<?php echo $Correo; ?>">
      </div> 
    </div>
    <div class="col-sm-3">
      <div class="form-group">
        <label for="Contrato"> Teléfonos</label>
        <input type="text" class="form-control" disabled value="<?php echo $Telefono; ?>">
      </div>
    </div>
    <div class="col-sm-6"> 
      <div class="form-group">
        <label for="sel1"> Dirección Comercial</label>
        <input type="text" class="form-control" disabled value="<?php echo $Direccion ?>">
      </div> 
    </div>
  </div> 
  
  <div id="datos_com"><strong>Datos Servicio</strong> <strong>ACRONIS</strong></div>
  <br>
  <div class="row">
    <div class="col-sm-3">
      <div class="form-group">
        <label for="sel1"><i class="fa fa-cloud-upload "></i> Nube</label>
        <select class="form-control" id="Nube">
          <option>Netland</option>
          <option>Acronis</option>
        </select>
      </div> 
    </div>
    <div class="col-sm-3"> 
      <div class="form-group">
        <label for="sel1"><i class="fa fa-database "></i> Plan</label>
        <select class="form-control" id="Plan">
          <option>4.167 GB</option>
          <option>22.222 GB</option>
          <option>50.000 GB</option>
          <option>114.286 GB</option>
        </select>
      </div> 
    </div>
    <div class="col-sm-3">
      <div class="form-group">
          <label for="sel1"><i class="fa fa-cogs "></i> Administración</label>
          <select class="form-control" id="Administracion">
            <option>Netland</option>
            <option>Cliente</option>
          </select>
        </div> 
    </div>
    <div class="col-sm-3">
      <div class="form-group">
        <label for="Contrato"><i class="fa fa-legal "></i> Número Contrato</label>
        <input type="text" class="form-control" id="Contrato">
      </div>
    </div>
  </div> 

  <div class="row">
    <div class="col-sm-3">
      <div class="form-group">
        <div class="form-group">
        <label for="Fecha"><i class="fa fa-calendar "></i> Fecha Contrato</label>
        <input type="text" class="form-control" id="Fecha">
      </div>
      </div> 
    </div>
    <div class="col-sm-3"> 
      <div class="form-group">
        <label for="sel1"><i class="fa fa-user "></i> Tipo Contrato</label>
        <select class="form-control" id="Tipo">
          <option>Cliente</option>
          <option>Agente</option>
          <option>Distribuidor</option>
        </select>
      </div> 
    </div>
    <div class="col-sm-3">
      <div class="form-group">
        <label for="sel1">&nbsp;&nbsp; </label>
        <button type="button" class="btn btn-primary col-sm-12" id="Guardar">Guardar</button>
      </div> 
    </div>
    <div class="col-sm-3">
    </div>
  </div>
 
    <input type="hidden" value="<?php echo $alias;?>" name="alias" id="Alias"/>
  <?php
	  $id=$_GET['id']; 
	  if ($id==1){
	  echo "<div id='dialog' title='Ingresar Dato Técnico'><center><p>Registro ingresado Exitosamente!<br><br><br>
		   <form action='header.php' method='post'>
		   	   <input type='hidden' name='id_header' value='7'>
		   	   		   	   <input type='hidden' name='cliente' value='$cliente'>

	   <input type='submit' value='cerrar'>
	   </form></center></div>";
	  }
	  
	  else if ($id==10){
	  echo "<div id='dialog' title='Error'><center><P>Nombre de Enlace duplicado, no se puede ingresar registro a la Base de Datos, intente con otro nombre para el Enlace.<br><br><br>
		   <form action='header.php' method='post'>
		   	   <input type='hidden' name='id_header' value='7'>
		   	   		   	   <input type='hidden' name='cliente' value='$cliente'>

	   <input type='submit' value='cerrar'>
	   </form></center></div>";
	  }
	  ?>
      <br />
      <br />
</div>

  </div>
 


</body>
</html>
