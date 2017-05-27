<?php
include("../../../system/config.php");
include("../../../services/config.php");

$cliente = $_GET["cliente"];
$rs = $_GET["cliente"];
$alias = $_GET["alias"];
$rut = $_GET["rut"];
$mac = $_GET["mac"];
$ID_suspension = $_GET["ID_suspension"];



//$contactos = $_GET["contactos"];
//$ip= $_GET["ip"];
//$mac_su = $_GET["mac_su"];

$sql_cliente=mysql_query("SELECT * FROM SP_dato_cliente WHERE cliente='$cliente' AND alias='$alias' or rut='$rut' AND alias='$alias' LIMIT 1");
$sql_pppoe=mysql_query("SELECT * FROM PPPoE_Client WHERE cliente='$cliente' AND alias='$alias' LIMIT 1");
$sql_voip=mysql_query("SELECT * FROM SP_servicio_voip WHERE (cliente='$cliente' or rut='$rut') AND alias='$alias' LIMIT 1");
$sql_otros=mysql_query("SELECT * FROM SP_servicio_otros WHERE (cliente='$cliente' or rut='$rut') AND alias='$alias' LIMIT 1");





include '../../../include/estructura/session_admin.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


	

<?php include '../../../include/estructura/title.php';?>
<style type="text/css">
a:hover {
text-decoration:none;
}
a img {
border-width:0;
}

</style>
<link href="../../../css/estilos.css" rel="stylesheet" type="text/css" />
<STYLE>
A {text-decoration: none;}
</STYLE>

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
<link href="../../../data/media/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../../../jquery/css/ui-lightness/jquery-ui-1.10.4.custom.css">
<script type="text/javascript" src="../../../jquery/js/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript" src=".././../jquery/js/jquery-ui-1.10.4.custom.min.js"></script><script language="javascript">
$(document).ready(function() {
    $('#example').dataTable();
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

<style type="text/css">
#apDiv5 {
	position: absolute;
	width: 381px;
	height: 171px;
	z-index: 1;
	left: 930px;
	top: 338px;
	border: thin solid #CDCDCD;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 11px;
	color: #333;
	padding: 5px;
	background-image: url(../../../imagenes/patron_body.png);
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #F9F9F9;
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
      <li><a href="clientes.php" id="supermenu" >Clientes</a></li>
      <li><a href="../Factibilidades/factibilidades.php"> Ventas</a></li>
      <li><a href="../Retiros/retiros.php"> Retiro</a></li>
      <li><a href="../ticket/ticket.php">Ticket</a></li>
      
      <li><a href="../radio planning/radio_planning.php">Radio </a></li>
      
<li><a href="../inventario/inventario.php">Inventario</a></li>
      <li><a href="../Indicadores/indicadores.php">Kpi</a></li>
      <li><a href="../intranet/intranet1.php">Intranet</a></li>
      <li><a href="#">PPPoE</a></li>
    </ul>
  </div>
   <?php include '../../../include/estructura/submenu_clientes_busqueda.php';?>

  

  <div id="crear_dato_tecnico">
    <FORM name=tuformulario autocomplete="off" ACTION="opcion.php" METHOD="POST">
      <table width="915" border="0">
      <tr>        </tr>
    </table>
    <table width="915" border="0">
      <tr>        </tr>
    </table>
    <div id="datos_com"><strong>Listado Clientes</strong></div>

<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
               
                <th>ID</th>
                <th>Cliente</th>
                <th>Rut</th>
                <th>Fecha</th>
                <th>Hora</th>
 
                <th>Ver Ticket</th>
            </tr>
        </thead>
 
   
         <tr>
        <?php $ticket=mysql_query("SELECT * FROM morosos WHERE id_status='0'");

while ($row = mysql_fetch_row($ticket)){
	
	

	?>
                              <td><center><?php echo $row[1];?></center></td>

                          <td><center><?php echo $row[2];?></center></td>
                          <td><center><?php echo $row[3];?></center></td>

                          <td><center><?php echo $row[4];?></center></td>
                          <td><?php echo $row[5];?></td>
          
                          <td><center>
                            <a href="../ticket/ver_registro.php?cliente=<?php echo $cliente;?>&numero=<?php echo $numero;?>"><img src="../../../imagenes/lupa.png" width="17" height="17" /></a>
           </center></td>

        </tr><?php } ?> </tbody>
  </table>
  





   
      <p>&nbsp;</p>
      <p>
        
        <center></center>
      </p>
    
      
    
      <table width="934" border="0">
        <tr>        </tr>
      <tr>        </tr>
    </table>
    </form>
    <br />
      <br />
</div>
</div>
  
  </div>
</div>

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
