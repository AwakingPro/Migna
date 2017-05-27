<?php
include("../../../system/config.php");
include("../../../services/config.php");
?>
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
<script language="javascript">
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
  <div id="crear_dato_tecnico">
    
    <div id="datos_com"><strong>Monitoreo Señal Enlaces Troncales <span class="right_1"><a href="reporteexcelactivos.php"></a></span></strong><br />
    <br />
  </div>
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
               
              
                <th width="13%">Site A</th>
                <th width="10%">Site B</th>
                <th width="5%">Tipo <BR />
                Enlace</th>
                <th width="6%">Señal A</th>
                <th width="6%">Señal B</th>
                <th width="8%">Velocidad <br />Bajada</th>
                <th width="9%">Velocidad <br />Subida</th>
                <th width="6%">Dirección <br />IP A</th>
                <th width="7%">Dirección <br />IP B</th>
                 <th width="5%">Distancia</th>               
                   <th width="8%">Fecha <br />última <br />Medición</th>    


 
            </tr>
        </thead>
 
   
         <tr>
        <?php $mon=mysql_query("SELECT * FROM MON_signal");

while ($row = mysql_fetch_row($mon)){?>
                   

                          <td><center><?php echo $row[1];?></center></td>
                          <td><center><?php echo $row[2];?></center></td>
                          <td><center><?php echo $row[11];?></center></td>
                          <td><center><?php  $senal=$row[3];  
						  if ($senal==0){ echo "No Aplica"; }else{echo $senal." dBm";}
						  
						  ?> </center></td>
                          <td><center><?php  $senal2=$row[4];  
						  if ($senal2==0){ echo "No Aplica"; }else{echo $senal2." dBm";}
						  
						  ?></center></td>
                          <td><center><?php echo $row[5];?> Mbps</center></td>
                          <td><center><?php echo $row[6];?> Mbps</center></td>
                          <td><center><?php echo $row[7];?></center></td>
                           <td><center><?php echo $row[8];?></center></td>
                           <td><center><?php echo $row[9];?> Km</center></td>
                           <td><center><?php echo $row[10];?></center></td>
                         

        </tr><?php } ?> </tbody>
  </table>




  

  
</div>
</div>
  
  </div>
</div>

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
