<?php
include("../../../system/config.php");
include("../../../services/config.php");
$estacion= $_GET["estacion"];
$otros_datos=mysql_query("SELECT contacto,telefonos,correos,ubicacion,energia,procedimiento,comentario,torre,autonomia,baterias,ups,fecha_operacion,contrato FROM INT_radio_planning_estaciones WHERE estacion='$estacion'");
while ($row = mysql_fetch_row($otros_datos))
{
	$contacto=$row[0];
	$telefonos=$row[1];
	$correos=$row[2];
	$ubicacion=$row[3];
	$energia=$row[4];
	$procedimento=$row[5];
	$comentario=$row[6];
	$torre=$row[7];
	$autonomia=$row[8];
	$bateria=$row[9];
	$ups=$row[10];
	$fecha_operacion=$row[11];
	$contrato=$row[12];
}
$ip= $_GET["ip"];
$ssid= $_GET["ssid"];
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
$usuario=$_SESSION['MM_Username'];
$bienvenido=mysql_query("SELECT nombre FROM usuarios WHERE usuario='$usuario'");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


	<script src="../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
     <script src="../../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
  <script src="../../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
  <script type="text/javascript" src="../../../script/jquery.js"></script>
  <script type="text/javascript" src="../../../script/jquery.jCombo.min.js"></script>
<title>Migna | Sistema Gestión de Clientes</title>
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
<link href="../../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="../../../script/jquery.js"></script>
  <script type="text/javascript" src="../../../script/jquery.jCombo.min.js"></script>
  <script type='text/javascript' src='../../../javascript/jquery.autocomplete.js'></script>
  <script src="../../../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../../../javascript/jquery.autocomplete.css" />
<link href="../../../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="../../../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="../../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../../js/jquery-ui.min.js"></script>
<link rel="stylesheet" href="../../../css/estilos2.css">
<script src="../../../data/media/js/jquery.js"></script>
<script src="../../../data/media/js/jquery.dataTables.js"></script>
<link href="../../../data/media/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #F7F7F7;
}
</style>
<script language="javascript">
$(document).ready(function() {
    $('#example').dataTable();
} );

$(document).ready(function() {
    $('#example2').dataTable();
} );
</script>
<script>
$(function() {
$( "#dialog" ).dialog();
});
</script>
</head>

<body>

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
      <li><a href="../clientes/clientes.php" >Cliente</a></li>
      <li><a href="../Factibilidades/factibilidades.php"> Factibilidad</a></li>
      <li><a href="../Retiros/retiros.php"> Retiro</a></li>
      <li><a href="../ticket/ticket.php">Ticket</a></li>
      
      <li><a href="radio_planning.php" id="supermenu">Radio </a></li>
      
<li><a href="../inventario/inventario.php">Inventario</a></li>
      <li><a href="../Indicadores/indicadores.php">Kpi</a></li>
      
        <li><a href="../intranet/intranet1.php">Intranet</a></li>
        
</ul>
  </div>
<?php include '../../../include/estructura/submenu_radio_planning_busqueda.php';?>
     
 
<div id="rpe2">
<br />
<div id="datos_com"><strong>UPS Estaciones</strong>  <br />
 
 </div>
 <?php if ($_GET['update']==1){
	 echo "<center><b>Registro Actualizado Exitosamente!</center></b>";
	 }?>
<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
               
              
              <th>Estacion</th>
              <th>IP</th>
              <th>Marca</th>
                <th>Consumo(W)</th>
                <th>Capacidad</th>
                         <th>Baterías</th>  
                         <th>Cantidad</th>  
                         <th>Autonomia </th>
              <th>Editar</th>
      
                 
                 
                 
            </tr>
        </thead>
 
   
         <tr>
        <?php $sql_reporte_1=mysql_query("SELECT * FROM UPS order by estacion ASC");

while ($row = mysql_fetch_row($sql_reporte_1)){?>
                          <td><center><?php  echo $row[0];?></center></td>

                <td><center><?php  echo "<a href='http://".$row[1]."'>".$row[1]."</a>";?></center></td>
             
             
          
           <td><center><?php  echo $row[2];?></center></td>
                <td><center><?php  echo $row[3];?></center></td>
                  <td><center> <?php  echo $row[4];?></center></td>
         




       

                    <td><center><?php  echo $row[5];?></center>
           
                  
                    </td>
                    <td><center><?php  echo $row[6];?></center>
           
                   </center>
                    </td>
                   <td><center><?php  echo $row[7];?>
                      </center>
           </td>
              <td><center><a href="editar_ups.php?id=<?php echo $row[13]?>">Editar</a>
                      </center>
           </td>
      
        
      </tr><?php }  ?> </tbody>
  </table>
  <?php
   $id=$_GET['id'];
   $id2=$_GET['ssid'];
   $id3=$_GET['ip'];
      $id4=$_GET['mac'];

   if ($id==10){
	   echo "<div id='dialog' title='Eliminar Registro'><center>Esta Seguro que desea eliminar este registro : "." ".$id3." "."</br>
	   <a  name='link' 
	   href='comprobacion_eliminado.php?ip=$id3&ssid=$id2&id=9&mac=$id4&estacion=$estacion' >SI</a>"." &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp        "."<a  name='link' 
	   href='comprobacion_eliminado.php?ip=$id3&ssid=$id2&id=8&estacion=$estacion' >NO</a>
	   </center></div>
	   ";
	   
	   
	   
	   

	   
	   
	   }
	   else if ($id==3){
		   echo "<div id='dialog' title='Radio Planning'><center>Registro Eliminado Exitosamente!
	   </center></div>
	   ";
		   
		   }
		   else if ($id==11){
		   echo "<div id='dialog' title='Radio Planning'><center>No Registra KMZ
	   </center></div>
	   ";
		   
		   }
   
   ?></p>
 </div>
</div>
</div>
</div>
  
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
