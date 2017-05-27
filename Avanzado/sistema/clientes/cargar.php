<?php
include("../../../system/config.php");
include("../../../services2/config.php");

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
 $id_morosos=$_GET['id_morosos'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Migna | Sistema Gestión de Clientes</title>

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
<script src="../../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
     <script src="../../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
  <script src="../../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
  <script type="text/javascript" src="../../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../../js/jquery-ui.min.js"></script>
<link href="../../../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="../../../script/jquery.js"></script>
  <script type="text/javascript" src="../../../script/jquery.jCombo.min.js"></script>
  <script type='text/javascript' src='../../../javascript/jquery.autocomplete.js'></script>
  <script src="../../../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../../../javascript/jquery.autocomplete.css" />
<link href="../../../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../../../css/estilos2.css">

<script src="../../../data/media/js/jquery.js"></script>
<script src="../../../data/media/js/jquery.dataTables.js"></script>
<script src="../../../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../../../data/media/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../../../jquery/css/ui-lightness/jquery-ui-1.10.4.custom.css">
<script type="text/javascript" src="../../../jquery/js/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript" src=".././../jquery/js/jquery-ui-1.10.4.custom.min.js"></script>
<script src="../../../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>

<link rel="stylesheet" href="../../../css/estilos2.css">
<style type="text/css">
body {
	background-color: #FFF;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
<script language="javascript">
$(document).ready(function() {
    $('#example2').dataTable();
} );
$(document).ready(function() {
    $('#example3').dataTable();
} );
</script>
<script>

$(function() {
$( "#dialog" ).dialog();
});
</script>
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
</script>


</head><body bgcolor="#F2F2F2">



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
      <li><a href="clientes.php" id="supermenu" >Clientes</a></li>
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
 <?php include '../../../include/estructura/submenu_clientes_busqueda.php';?>


  <div id="busqueda_clientes">
    <div id="datos_com"><strong>Cargar CSV Morosos</strong>  <br />
      <br />
 </div>

 <p class="Nota">  <form action='control.php' method='post' enctype="multipart/form-data">
   Importar Archivo : <input name='sel_file' type='file' class="formulario_grande_intranet2" size='20'>
   <input type="hidden" value="<?php  echo $user7;?>" name="usuario" />
   <input name='submit' type='submit' class="boton_intranet" value='Cargar Listado'>
  </form><?php $id=$_GET['id']; if($id==1){ ?><br /><br /><div id="error">El Archivo que intenta Cargar es Inválido! , tiene que ser un archivo csv.</div><?php } else {}?></div>
  <div id="busqueda_clientes">
    <div id="datos_com"><strong> Listas de Morosos</strong><br /></div>
      <br />
      <?php 
	  $query_morosos=mysql_query("SELECT * FROM id_morosos");
	  if (mysql_num_rows($query_morosos)>0){?>
      <table id="example3" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
               <th width="2%">ID </th>
              
                <th width="15%">Fecha</th>
                <th width="5%">Hora</th>
                <th width="16%">Subida Por : </th>
                <th width="10%">Deuda <br />Total </th>
                <th width="9%">Deuda <br />Recuperada </th>
                <th width="9%">Porcentaje <BR />Recupero</th>
                <th width="16%">Ver</th>

            </tr>
        </thead>
 
   
         <tr>
        <?php $comercial=mysql_query("SELECT * FROM id_morosos ");

while ($row = mysql_fetch_row($comercial)){
	
	 $id_morosos2=$row[0];
	
	?> <td><center><?php echo $row[0];?></center></td>
                          <td><center><?php echo $row[1];?></center></td>
                          <td><center><?php echo $row[2];?></center></td>
                          <td><center><?php echo $row[3];?></center></td>
                          <td><center>$ <?php $sql_suma = mysql_query("select * from morosos_total where id_morosos='$id_morosos2'");
$suma = 0; // Empezar a contar desde 0

while($fila=mysql_fetch_array($sql_suma)) {
$suma = round($suma + $fila['deuda']);
}


echo $suma5=number_format($suma, 0, ",", "."); ?></center></td>
                          <td><center>$ <?php $sql_suma3 = mysql_query("select * from morosos where id_morosos='$id_morosos2'");
$suma3 = 0; // Empezar a contar desde 0

while($fila3=mysql_fetch_array($sql_suma3)) {
$suma3 = round($suma3 + $fila3['monto']);
}


echo $suma4=number_format($suma3, 0, ",", "."); ?></center></td>
<td><center><?php echo $por=round((($suma3/$suma)*100));?> %</center></td>
    <td><center>
                             <a href="cargar.php?id_morosos=<?php echo $id_morosos2; ?>"><img src="../../../imagenes/ver.png"  /></a>
           </center></td>
                       
                         


        </tr><?php } ?> </tbody>
  </table>
  <?php } else { echo "No hay Historial de Suspenciones"; }?>
 </div>

<div id="busqueda_clientes">
    <div id="datos_com"><strong>Listado Morosos</strong><br /></div>
      <br />
      <?php 
	 
	  $query_id_morosos=mysql_query("SELECT * FROM morosos where id_morosos='$id_morosos'");
	  if (mysql_num_rows($query_id_morosos)>0){?>
      <table id="example2" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
               
              
                <th width="17%">Nombre</th>
                <th width="6%">Rut</th>
                <th width="5%">Monto<br /> 
                Cancelado</th>
                <th width="7%">Forma<br /> 
                Pago</th>
                <th width="4%">Deuda</th>
                                <th width="4%">Nº Factura</th>

                <th width="7%">Última<br /> 
                Gestión</th>
                   <th width="9%">Suspendido <br />Por</th>
                      <th width="4%">Fecha <br />Suspensión</th>
                         <th width="6%">Hora<br />Suspensión</th>
                            <th width="10%">Habilitado <br />Por:</th>
                               <th width="5%">Fecha <br />Habilitación</th>
                                  <th width="9%">Hora <br />Habilitación</th>

               <th width="4%">Acción</th>
               <th width="3%">Editar</th>
            </tr>
        </thead>
 
   
         <tr>
        <?php $morosos=mysql_query("SELECT * FROM morosos where id_morosos='$id_morosos'");

while ($row = mysql_fetch_row($morosos)){
	$id_cliente=$row[0];
	$estados=$row[8];
	$id_estado=$row[6];
	
	?>
                          <td><?php echo $row[1];?></td>
                          <td><center><a href="cliente_comprobacion2.php?rut=<?php echo $row[2];?>&id_morosos=<?php echo $id_morosos; ?>"><?php echo $row[2];?></a></center></td>
                          <td><center><?php echo $row[15];?></center></td>
                           <td><center><?php echo $row[17];?></center></td>
                           <td><center><?php echo $row[21];?></center></td>
                           <td><center><?php echo $row[22];?></center></td>
                          <td><center><?php if($estados=='Suspendido'){echo "<div id='rojo'>Suspendido</div>";}
						  if($estados=='Activo'){echo "<div id='verde'>Activo</div>";}
						  if($estados=='Sin Gestionar'){echo "Sin Gestionar";}
						  
						  
						  ?></center></td>
                          <td><center><?php echo $row[9];?></center></td>
                          <td><center><?php echo $row[10];?></center></td>
                          
                          <td><center><?php echo $row[11];?></center></td>
                          <td><center><?php echo $row[12];?></center></td>
                          <td><center><?php echo $row[13];?></center></td>
                           <td><center><?php echo $row[14];?></center></td>


                           <td><center>
                           <?php if($id_estado==0){echo "Sin Accion";}if($id_estado==2){echo "Sin Accion";}if($id_estado==3){echo "<b>Pagado</b>";} if($id_estado==1) {?>
                             <a href="accion_activar.php?id=<?php echo $id_cliente; ?>&cliente=<?php echo $row[1];?>&rut=<?php echo $row[2];?>&deuda=<?php echo $row[21];?>&factura=<?php echo $row[22];?>"><img src="../../../imagenes/pago.png"  /></a>
           </center>
           <?php }?></td>
           <td><center>
                           <?php if($id_estado==0){echo "Editar";}if($id_estado==2){echo "Editar";}if($id_estado==3){echo "<b>Editar</b>";} if($id_estado==1) {?>
                             <a href="#?id=<?php echo $id_cliente; ?>&deuda=<?php echo $row[21];?>&factura=<?php echo $row[22];?>"><img src="../../../imagenes/editar.png"  /></a>
           </center>
           <?php }?></td>


        </tr><?php } ?> </tbody>
  </table>
  <?php } else { echo "No ha seleccionado Listado."; }?>
 </div>
</div> 
</div>

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
