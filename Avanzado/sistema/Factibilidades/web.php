<?php
include("../../../system/config.php");
include("../../../system/config3.php");
include("../../../services/config.php");

$ticket_filter=$_GET['ticket_filter'];


$resultado_contar = mysql_query($contar,$conectar); 
$contados = mysql_result($resultado_contar,0,'COUNT'); //Aqui haces referencia a un campo del resultado que te trajo la consulta 

//mysql_reuslt(variable_donde_regresa_la_consulta,numero_del_renglon_o_fila,nombre_campo) 











$numero = $_GET["numero"];
$cliente = $_GET["cliente"];


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
<html xmlns="http://www.w3.org/1999/xhtml"><head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="../../../script/jquery.js"></script>
<script type="text/javascript" src="../../../script/jquery.jCombo.min.js"></script>
  <script type="text/javascript" src="../../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../../js/jquery-ui.min.js"></script>
<link rel="stylesheet" href="../../../css/estilos2.css">
<script src="../../../data/media/js/jquery.js"></script>
<script src="../../../data/media/js/jquery.dataTables.js"></script>
<script src="../../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../../../data/media/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
<script language="javascript">
$(document).ready(function() {
    $('#example').dataTable(
 	{
        "order": [[ 10, "asc" ]]
    	}
);
} );
</script>
<script language="javascript">
$(document).ready(function() {
    $('#example2').dataTable();
} );
</script>
<script>
$(function() {
$( "#dialog" ).dialog();
});
</script>
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
<script type="text/javascript" src="../../../script/jquery.js"></script>
<script type="text/javascript" src="../../../script/jquery.jCombo.min.js"></script>
<script type='text/javascript' src='../../../javascript/jquery.autocomplete.js'></script>
<script src="../../../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../../../javascript/jquery.autocomplete.css" />
<link href="../../../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="../../../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #F9F9F9;
}
</style>
<link href="../../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
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
      <li><a href="../clientes/clientes.php" >Clientes</a></li>
      <li><a href="factibilidades.php" id="supermenu"> Ventas</a></li>
      <li><a href="../Retiros/retiros.php"> Retiro</a></li>
      <li><a href="../ticket/ticket.php">Ticket</a></li>
      
      <li><a href="../radio planning/radio_planning.php">Radio </a></li>
      
<li><a href="../inventario/inventario.php">Inventario</a></li>
      <li><a href="../Indicadores/indicadores.php">Kpi</a></li>
      <li><a href="../intranet/intranet1.php">Intranet</a></li>
      <li><a href="../pppoe/index.php">PPPoE </a></li>
    </ul>
</div> 
 <?php include '../../../include/estructura/submenu_factibilidades_pendientes.php';?>
 
  <div id="ticket_resultado3">
    <div id="datos_com"><strong>Solicitudes a Traves de la Pagina Web</strong><span class="right_1"><a href="reporteexcependientes.php"></a></span><br />
      <br />
  </div>
     <?php
   $id=$_GET['id'];
   $id2=$_GET['numero'];
   $id3=$_GET['cliente'];
   if ($id==1){
	   echo "<div id='dialog' title='Eliminar Factibilidad'><P>Esta Seguro que desea eliminar la Factibilidad : "."#".$id2." "."</br>
	   <center><form method='GET' action='comprobacion_eliminado.php'>
	   <input type='hidden' name='cliente' value='$id3'>
	   <input type='hidden' name='numero' value='$id2'>
	   	   <input type='hidden' name='ticket_filter' value='$ticket_filter'>

	   
	   <input type='submit' class='formulariosuperchico'  value='Si' name='Si'>"." &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp        "."<input type='submit'  value='No' class='formulariosuperchico'  name='No'></form></center>
	   </div>
	   ";
	   
	   
	   }
	   else if ($id==3){
		   echo "<div id='dialog' title='Factibilidad Eliminado'><center>Registro Eliminado Exitosamente!
	   </center></div>
	   ";
		   
		   }
   
   ?>
<div id='envolver'>
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
               
              
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Region</th>

                <th>V</th>
                <th>RM</th>
                <th>VI</th>
                <th>VII</th>
                <th>Como</th>
                <th>Fecha</th>


 
            </tr>
        </thead>
 
   
         <tr>
        <?php 
$array1= array();
$array2= array();
$array3= array();
$array4= array();
$array5= array();
$array6= array();
$array7= array();
$array8= array();
$array9= array();
$array10= array();
$sql1=mysql_query("SELECT field_value FROM  wp_cf7dbplugin_submits WHERE field_name='nombre'");
$sql2=mysql_query("SELECT field_value FROM  wp_cf7dbplugin_submits WHERE field_name='email'");
$sql3=mysql_query("SELECT field_value FROM  wp_cf7dbplugin_submits WHERE field_name='telefono'");
$sql4=mysql_query("SELECT field_value FROM  wp_cf7dbplugin_submits WHERE field_name='region'");
$sql5=mysql_query("SELECT field_value FROM  wp_cf7dbplugin_submits WHERE field_name='com-quinta'");
$sql6=mysql_query("SELECT field_value FROM  wp_cf7dbplugin_submits WHERE field_name='com-metro'");
$sql7=mysql_query("SELECT field_value FROM  wp_cf7dbplugin_submits WHERE field_name='com-sexta");
$sql8=mysql_query("SELECT field_value FROM  wp_cf7dbplugin_submits WHERE field_name='com-septima'");
$sql9=mysql_query("SELECT field_value FROM  wp_cf7dbplugin_submits WHERE field_name='como'");
$sql10=mysql_query("SELECT submit_time FROM  wp_cf7dbplugin_submits WHERE field_name='nombre'");
while($row = mysql_fetch_array($sql1)){
    $array1[] = $row[0];
}
while($row = mysql_fetch_array($sql2)){
    $array2[] = $row[0];
}
while($row = mysql_fetch_array($sql3)){
    $array3[] = $row[0];
}
while($row = mysql_fetch_array($sql4)){
    $array4[] = $row[0];
}
while($row = mysql_fetch_array($sql5)){
    $array5[] = $row[0];
}
while($row = mysql_fetch_array($sql6)){
    $array6[] = $row[0];
}
while($row = mysql_fetch_array($sql7)){
    $array7[] = $row[0];
}
while($row = mysql_fetch_array($sql8)){
    $array8[] = $row[0];
}
while($row = mysql_fetch_array($sql9)){
    $array9[] = $row[0];
}
while($row = mysql_fetch_array($sql10)){
    $array10[] = $row[0];
}
 $array1_lenght=count($array1);
$i=0;
while($i<$array1_lenght){ ?>
	
<td><?php  echo utf8_encode($array1[$i]); ?> </td> 
<td><?php  echo utf8_encode($array2[$i]); ?> </td> 
<td><?php  echo utf8_encode($array3[$i]); ?> </td> 
<td><?php  echo utf8_encode($array4[$i]); ?> </td> 
<td><?php  echo utf8_encode($array5[$i]); ?> </td> 
<td><?php  echo utf8_encode($array6[$i]); ?> </td> 
<td><?php  echo utf8_encode($array7[$i]); ?> </td> 
<td><?php  echo utf8_encode($array8[$i]); ?> </td> 
<td><?php  echo utf8_encode($array9[$i]); ?> </td> 
<td><?php  echo date('d/m/Y', $array10[$i]); ?> </td>
</tr><?php $i++; } ?> </tbody>
  </table>
  </div>
</div>
  
  </div>
</div>

<script type="text/javascript">
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgDown:"../../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../../SpryAssets/SpryMenuBarRightHover.gif"});
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
