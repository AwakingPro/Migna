<?php
include("../../../system/config.php");
include("../../../services/config.php");



$resultado_contar = mysql_query($contar,$conectar); 
$contados = mysql_result($resultado_contar,0,'COUNT'); 

if (!isset($_SESSION)) {
  session_start();
}

$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
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

function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) {
  $isValid = False;

  if (!empty($UserName)) {

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
<html xmlns="http://www.w3.org/1999/xhtml"><head>


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
<link href="../../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../../../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<script src="../../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script type="text/javascript" src="../../../script/jquery.js"></script>
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
	background-color: #333;
}
</style>
<script language="javascript">
$(document).ready(function() {
    $('#example').dataTable();
} );
</script>

<script language="javascript">
$(function() {
$("#dialog").dialog();
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

<div id="Menu"> 
    <ul id="MenuBar1" class="MenuBarHorizontal">
      <li><a href="../clientes/clientes.php" >Clientes</a></li>
      <li><a href="../Factibilidades/factibilidades.php"> Factibilidad</a></li>
      <li><a href="../Retiros/retiros.php"> Retiro</a></li>
      <li><a href="../ticket/ticket.php">Ticket</a></li>
      
      <li><a href="../radio planning/radio_planning.php">Radio </a></li>
      
<li><a href="../inventario/inventario.php">Inventario</a></li>
      <li><a href="../Indicadores/indicadores.php">Kpi</a></li>
      <li><a href="../intranet/intranet1.php">Intranet</a></li>
      <li><a href="index.php" id="supermenu">PPPoE</a></li>
    </ul>
  </div>
  <?php include '../../../include/estructura/submenu_clientes_busqueda_pppoe_ver_server.php';?>

 
  <div id="ticket_resultado3">
    <div id="datos_com"><strong>Servidores PPPoE </strong><br />
      <br />
  </div>
    <?php if ($id==3){
		   echo "<div id='dialog' title='Registro Actualizado'><center>Registro Actualizado Exitosamente!
	   </center></div>
	   ";
		   
		   }
   
   ?>
<div id='envolver'>
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
               
              
                <th width="25%">Nombre</th>
                <th width="10%">IP</th>
                <th width="16%">Estación</th>
                <th width="10%">Modelo</th>     
                <th width="8%">Uso <br /> CPU</th>   
                <th width="9%"><center>Sesiones<br />  PPPoE</center></th>     
                <th width="14%"><center>Uso de Ancho<br /> de <br /> Banda</center></th>      
                <th width="8%">Editar</th>


 
            </tr>
        </thead>
 
   
         <tr>
        <?php $server_list=mysql_query("SELECT * FROM PPPoE_SRV ");

while ($row = mysql_fetch_row($server_list)){?>
                          <td><?php echo $row[1];?></td>
                          <td><?php echo $row[2];?></td>
                          <td><?php echo $row[3];?></td>
                          <td><?php echo $row[6];?></td>
                          <td><center><?php echo $row[7];?> % </center></td>
                          <td><center><?php echo $row[8];?></center></td>
                          <td><a   href='http://<?php echo $row[2]; ?><?php echo $row[9]; ?>'><center><img src='../../../imagenes/grafico.png' /></center></a></td>
                          <td><a class='link' href='comprobacion_editar_server.php?id_server=<?php echo $row[0];?>&estacion=<?php echo $row[3];?>'><center><img src='../../../imagenes/editar.jpg' /></center></a></td>
                         
                      

        </tr><?php } ?> </tbody>
  </table>

   
 
  </div>
</div>
  
  </div>
</div>
<div id="foot">Migna | Sistema Gestión de Clientes - Todos los derechos reservados &copy; <?php
echo date("Y"); ?></div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
