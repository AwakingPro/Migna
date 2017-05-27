<?php
include ("system/config.php"); 	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="data/media/js/jquery.js"></script>
<script src="data/media/js/jquery.dataTables.js"></script>
<link href="data/media/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
<script language="javascript">
$(document).ready(function() {
    $('#example').dataTable();
} );
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Monitoreo Bandwith Enlaces Troncales</title>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 00px;
	margin-bottom: 0px;
	background-color: #000;
}
#contenedor {
	height: auto;
	width: auto;
	margin-right: auto;
	margin-left: auto;
	border: thin solid #D5DFE5;
	padding: 20px;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 13px;
	color: #333;
	background-color: #F9F9F9;
}
#titulo {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 15px;
	color: #000;
	padding: 10px;
	height: 30px;
	width: auto;
	text-align: center;
}
</style>



</head>

<body>
<div id="contenedor">
  <div id="titulo">
    <p>Monitoreo Throughput Máximo de Enlaces Troncales. <em>&quot;Versión Beta&quot;</em></p>
  </div>


<table id="example" class="display" cellspacing="0" width="100%">
      <thead>
            <tr>
               

                <th>Enlace</th>
                <th>IP Maestro</th>
                <th>IP Esclavo</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Frecuencia</th>
                <th>Distancia Km</th>
                <th>Ancho Canal</th>
                <th>Subida</th>
                <th><center>
                Bajada
                </center></th>
   <th>Fecha</th>
                <th><center>
                Hora
                </center></th>
            
         

            </tr>
        </thead>
 
   
         <tr>
        <?php 
				$mon_1=mysql_query("SELECT enlace FROM MON_main ");

		while ($row = mysql_fetch_row($mon_1)){
			$enlace=$row[0];
		$mon=mysql_query("SELECT * FROM MON_historial WHERE enlace='$enlace' ORDER by id DESC LIMIT 1");

while ($row = mysql_fetch_row($mon)){

	?>                          
            <td><?php echo $row[1];?></td>
              <td><center><?php echo $row[6];?></center></td>
           <td><center><?php echo $row[7];?></center></td>
           <td><center><?php echo $row[8];?></center></td>
           <td><center><?php echo $row[9];?></center></td>
           <td><center><?php echo $row[10];?></center></td>
           <td><center><?php echo $row[11];?></center></td>
           <td><center><?php echo $row[12];?></center></td>
            <td><center><?php echo $row[2];?></center></td>
            <td><center><?php echo $row[3];?></center></td>
            <td><center><?php echo $row[4];?></center></td>
           <td><center><?php echo $row[5];?></center></td>



      </tr><?php }}?> </tbody>
  </table>
	  </div>
</body>
</html>