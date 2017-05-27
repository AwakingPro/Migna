<?php
include("../../../system/config.php");
include("../../../services/config.php");



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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


	<script src="../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
     <script src="../../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
  <script src="../../../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
  <script type="text/javascript" src="../../../script/jquery.js"></script>
  <script type="text/javascript" src="../../../script/jquery.jCombo.min.js"></script>
<title>Datacenter Netland Chile S.A.</title>
<style type="text/css">

a:link   
{  
color:#333;
 border-bottom:0px dotted #FFFFFF;

 text-decoration:none;   
}  
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
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
</head>

<body>
<div id="top"></div>
<div id="body">
  <div id="banner_login">
    <div id="logo"></div>
    <div id="bienvenido">
    <div id="sesion"></br><a href="<?php echo $logoutAction ?>" class="Menu"> Cerrar Sesión</a></div>
      <div id="bienvenido_1">Sistema Gestión de Clientes</div>
      <div id="bienvenido"> <?php 
	   $var2=$_SESSION['MM_Username'];
	   $bienvenido=mysql_query("SELECT * FROM usuarios WHERE usuario='$var2'");
	  
	  while($row=mysql_fetch_array($bienvenido)){
     	
	?>
	
      <div id="cliente2"><?php echo "Bienvenido"." ".$row['nombre']; ?></div>

      
      <?php
	  }
	  ?></div>
      
      
    </div>
  </div>
  <div id="Menu"> 
    <ul id="MenuBar1" class="MenuBarHorizontal">
       <li><a href="../clientes/clientes.php">Clientes</a>       </li>
       <li><a href="../inventario/inventario.php" c>Inventario</a></li>
       <li class="Form"><a href="ticket.php" class="formulariochicoCopia" id="supermenu" >Ticket</a>       </li>
<li><a href="../Informaciones/informaciones.php" >Informaciones</a></li>
       <li><a href="../radio planning/radio_planning.php">Radio Planning</a></li>
       <li><a href="../Indicadores/indicadores.php" >Indicadores</a></li>
</ul>
  </div>
   <div id="contacto_1"><table width="920" border="0" >
  <tr>
    <td width="106" height="15" class="Sub_menu"><a href="buscar_ticket.php" class="Menu">Buscar Ticket</a></td>
    <td width="83" class="Sub_menu"><a href="ticket_nuevo.php" class="Menu">Nuevo</a></td>
    <td width="118" class="Sub_menu"><a href="ticket_abiertos.php" class="Menu">Abiertos
      <?php $sql = "SELECT COUNT(*) FROM TICKET WHERE status='Abierto' AND NOT subtipo='Factibilidad' ";
$resultado = mysql_query($sql);

$select=mysql_query("SELECT * FROM TICKET WHERE status='Abierto' AND NOT subtipo='Factibilidad' ");
if (mysql_num_rows($select)>0){
 $row = mysql_fetch_array($resultado);
 echo "("; echo $row[0]; echo ")"; }
else {echo "";}

?>
    </a></td>
    <td width="118" class="Sub_menu"><a href="ticket_incumplidos.php" class="Menu" id="ok">Incumplidos
      <?php 
	  $fecha2=date("Y-m-d H:i:s");
	  $sql2 = "SELECT COUNT(*) FROM TICKET WHERE status='Abierto' and    fecha_solucion<'$fecha2' AND NOT subtipo='Factibilidad' ";
$resultado2 = mysql_query($sql2);

$select2=mysql_query("SELECT * FROM TICKET WHERE status='Abierto' and  fecha_solucion<'$fecha2' AND NOT subtipo='Factibilidad'");
if (mysql_num_rows($select2)>0){
 $row = mysql_fetch_array($resultado2);
 echo "("; echo $row[0]; echo ")"; }
else {echo "";}

?>
    </a></td>
    <td width="112" class="Sub_menu"><a href="asignar.php" class="Menu">Asignados
      <?php $user7=mysql_query("SELECT nombre FROM usuarios WHERE usuario='$usuario'");

 while($row=mysql_fetch_array($user7)){
     	$user7 =$row['nombre'];
	    global $user7; 
	}$sql7 = "SELECT COUNT(*) FROM TICKET WHERE asignar='$user7' and status='Abierto' AND NOT subtipo='Factibilidad'";
$resultado7 = mysql_query($sql7);

$select7=mysql_query("SELECT * FROM TICKET WHERE asignar='$user7' and status='Abierto' AND NOT subtipo='Factibilidad'");
if (mysql_num_rows($select7)>0){
 $row = mysql_fetch_array($resultado7);
 echo "("; echo $row[0]; echo ")"; }
else {echo "";}

?>
    </a></td>
    <td width="123" class="Sub_menu"><a href="ticket_finalizados.php" class="Menu">Revisión
      Terreno<?php $sql8 = "SELECT COUNT(*) FROM TICKET WHERE status='Finalizado' AND NOT subtipo='Factibilidad'";
$resultado8 = mysql_query($sql8);

$select8=mysql_query("SELECT * FROM TICKET WHERE status='Finalizado' AND NOT subtipo='Factibilidad'");
if (mysql_num_rows($select8)>0){
 $row = mysql_fetch_array($resultado8);
 echo "("; echo $row[0]; echo ")"; }
else {echo "";}

?>
    </a></td>
    </tr>
</table></div>
  <div id="ticket_resultado">
     <div id="titulo_ticket_abierto">
      <div id="titulo_ticket_abiertos_left">Ticket Incumplidos (Todos)</div>
    </div>
   
      <p>&nbsp;</p>
      <p>
        <?php
	  $fecha2=date("Y-m-d H:i:s");
$sql_abiertos2=mysql_query("SELECT * FROM TICKET  WHERE status='Abierto' and    fecha_solucion<'$fecha2'   AND NOT subtipo='Factibilidad' order by fecha_creacion DESC");


 if (mysql_num_rows($sql_abiertos2)>0)
{




echo "<table  border = '0' bordercolor = 'silver'  class='Tablas2' cellspacing = '0' cellpadding='0'> \n";
echo "<tr> \n";
echo "<td bgcolor='#333'><font color='#FFFFFF'>Fecha/Hora Creación</center></td> \n";
echo "<td bgcolor='#333'><font color='#FFFFFF'>Cliente</td> \n";
echo "<td bgcolor='#333'><font color='#FFFFFF'>Ticket</td> \n";
echo "<td bgcolor='#333'><font color='#FFFFFF'>Sub Tipo</font></td> \n";
echo "<td bgcolor='#333'><font color='#FFFFFF'>Prioridad</td> \n";
echo "<td bgcolor='#333'><font color='#FFFFFF'>Asignado a</td> \n";
echo "<td bgcolor='#333'><font color='#FFFFFF'>Estado</td> \n";
echo "<td bgcolor='#333'><font color='#FFFFFF'><center>Editar</center></td> \n";
echo "<td bgcolor='#333'><font color='#FFFFFF'><center>Eliminar</center></td> \n";


echo "</tr> \n";
while ($row = mysql_fetch_row($sql_abiertos2)){
echo "<tr> \n";
echo "<td><div id='divi'>$row[8]</div></td> \n";
echo "<td><div id='divi'>$row[1]</div></td> \n";
echo "<td><a style='color:#000'  href='ver.php?cliente=$row[1]&numero=$row[13]' text-decoration:none><div id='divi2'>$row[13]</div></a></td> \n";
echo "<td><div id='divi'>$row[5]</div></td> \n";
echo "<td><div id='divi'>$row[10]</div></td> \n";
echo "<td><div id='divi'>$row[11]</div></td> \n";
echo "<td><div id='divi'>$row[14]</div></td> \n";
echo "<td><div id='divi3'><a  href='comprobacion_editar.php?cliente=$row[1]&numero=$row[13]'><center>E</a></div></center></td> \n";
echo "<td><div id='divi2'><a   href='comprobacion_eliminar3.php?cliente=$row[1]&numero=$row[13]'><center>X</a></div></center></td> \n";

}
echo "</table></center> \n";
}else{
	echo "No tienes Ticket incumplidos, Felicitaciones!!!";
	
	}
?>
      </p>
   
    <?php
   $id=$_GET['id'];
   $id2=$_GET['numero'];
   $id3=$_GET['cliente'];
   if ($id==1){
	   echo "<div id='error'><center>Esta Seguro que desea eliminar este registro : "." ".$id2." "."</br>
	   <a  name='link' href='comprobacion_eliminado3.php?cliente=$id3&numero=$id2' >SI</a>"." &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp        "."<a  name='link' href='comprobacion_eliminado3.php' >NO</a>
	   </center></div>
	   ";
	   
	   
	   }
	   else if ($id==3){
		   echo "<div id='ok'><center>Registro Eliminado Exitosamente!
	   </center></div>
	   ";
		   
		   }
   
   ?></p>
   
  </div>
  <div id="foot">
 
    
  </div>
  <div id="derechos">Netland Chile S.A. | Todos los Derechos Reservados 2013 | Contáctenos : (56 - 2) 2 6973788  </div>
  
  
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
<?php
mysql_free_result($SG_Login_Usuario);
mysql_free_result($cliente);
mysql_free_result($bienvenido);
?>