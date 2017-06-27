<?php
include("../../../system/config.php");
include("../../../services/config.php");
$cliente = $_GET["cliente"];
$rut = $_GET["rut"];
$NombreCliente;
$Rut;
$Contacto;
$Telefon;
$Correo;
$Direccion;
$Nube;
$Plan;
$Administracion;
$Contrato;
$Fecha;
$Tipo;

$QueryCliente = mysql_query("SELECT cliente,rut,contacto,telefonos,correos,direccion_comercial FROM SP_soporte_crear_cliente WHERE cliente='$cliente' OR rut = '$rut'");
while($row = mysql_fetch_array($QueryCliente)){
  $NombreCliente = $row[0];
  $Rut = $row[1];
  $Contacto  = $row[2];
  $Telefono = $row[3];
  $Correo = $row[4];
  $Direccion = $row[5];
}

$QueryAcronis = mysql_query("SELECT Nube,Plan,Administracion,Contrato,Fecha,Tipo FROM SP_servicio_acronis WHERE cliente='$cliente' OR rut = '$rut'");
while($row = mysql_fetch_array($QueryAcronis)){
  $Nube = $row[0];
  $Plan = $row[1];
  $Administracion  = $row[2];
  $Contrato= $row[3];
  $Fecha = $row[4];
  $Tipo = $row[5];
}






include '../../../include/estructura/session_admin.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">




	

<?php include '../../../include/estructura/title.php';?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
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

  <br><br>
<div class="container-fluid">
    <div class="panel panel-primary">
        <div class="panel-heading "><h6>Datos Servicio ACRONIS</h6></div>
        <div class="panel-body">
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
            <div class="row">
                <div class="col-sm-3">
                <div class="form-group">
                    <label for="sel1"><i class="fa fa-cloud-upload "></i> Nube</label>
                    <input type="text" class="form-control" disabled value="<?php echo $Nube; ?>">
                </div> 
                </div>
                <div class="col-sm-3"> 
                <div class="form-group">
                    <label for="sel1"><i class="fa fa-database "></i> Plan</label>
                    <input type="text" class="form-control" disabled value="<?php echo $Plan; ?>">

                </div> 
                </div>
                <div class="col-sm-3">
                <div class="form-group">
                    <label for="sel1"><i class="fa fa-cogs "></i> Administración</label>
                    <input type="text" class="form-control" disabled value="<?php echo $Administracion; ?>">
                </div>

                </div>
                <div class="col-sm-3">
                <div class="form-group">
                    <label for="Contrato"><i class="fa fa-legal "></i> Número Contrato</label>
                    <input type="text" class="form-control" disabled value="<?php echo $Contrato; ?>">

                </div>
                </div>
            </div> 

            <div class="row">
                <div class="col-sm-3">
                <div class="form-group">
                    <div class="form-group">
                    <label for="Fecha"><i class="fa fa-calendar "></i> Fecha Contrato</label>
                    <input type="text" class="form-control" disabled value="<?php echo $Fecha; ?>">

                </div>
                </div> 
                </div>
                <div class="col-sm-3"> 
                <div class="form-group">
                    <label for="sel1"><i class="fa fa-user "></i> Tipo Contrato</label>
                    <input type="text" class="form-control" disabled value="<?php echo $Tipo; ?>">

                </div> 
                </div>
                <div class="col-sm-3">
                <div class="form-group">
                    
                </div> 
                </div>
                <div class="col-sm-3">
                </div>
            </div>
        
        </div>
    </div>
</div>    
            
   
   
</body>
</html>