<?php
include("../../../system/config.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


	
<script src="../../../data/media/js/jquery.js"></script>
<script src="../../../data/media/js/jquery.dataTables.js"></script>
<script language="javascript">
$(document).ready(function() {
    $('#example').dataTable();
} );
</script>
<script>
$(function() {
$( "#dialog" ).dialog();
});
</script>
</head>

<body>

   <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
               
              
                <th>Estación</th>
                <th>Función</th>
                 <th>IP </th>
                <th>Mac</th>
                <th>Ancho Canal</th>
               <th>Frecuencia</th>
                         <th>SSID</th>  
                         <th>Punto KMZ</th>
                 
                 
                 
            </tr>
        </thead>
 
   
         <tr>
        <?php $sql_reporte_1=mysql_query("SELECT estacion,funcion,ip,ancho_canal,frecuencia,ssid,puerto,mac FROM INT_radio_planning WHERE estacion='$estacion' or ip='$ip'  or ssid='$ssid' or mac='$mac' ");

while ($row = mysql_fetch_row($sql_reporte_1)){?>
          
                <td><center><?php echo $row[1];?></center></td>
                <td><center><?php echo $row[2];?></center></td>
             
             
          
           <td><center><?php echo $row[3];?></center></td>
                <td><center><?php echo $row[4];?></center></td>
                <td><center><?php echo $row[5];?></center></td>
                  <td><center><?php echo $row[6];?></center></td>
              
                    <td><center><?php $senal=$row[9];
					
	
					
					switch ($senal) {
    case '-65':
        echo "<img src='imagenes/65.png' width='149' height='14' />".$senal;
		break;
    case '-66':
        echo "<img src='imagenes/66.png' width='149' height='14' />".$senal;
        break;
    case '-67':
        echo "<img src='imagenes/67.png' width='149' height='14' />".$senal;
        break;
    case '-68':
        echo "<img src='imagenes/68.png' width='149' height='14' />".$senal;
        break;
	case '-69':
        echo "<img src='imagenes/69.png' width='149' height='14' />".$senal;
        break;
	case '-70':
        echo "<img src='imagenes/70.png' width='149' height='14' />".$senal;
        break;
	case '-71':
        echo "<img src='imagenes/71.png' width='149' height='14' />".$senal;
        break;
	case '-72':
        echo "<img src='imagenes/72.png' width='149' height='14' />".$senal;
        break;
	case '-73':
        echo "<img src='imagenes/73.png' width='149' height='14' />".$senal;
        break;
	case '-74':
        echo "<img src='imagenes/74.png' width='149' height='14' />".$senal;
        break;
	case '-75':
        echo "<img src='imagenes/75.png' width='149' height='14' />".$senal;
        break;
	case '-76':
        echo "<img src='imagenes/76.png' width='149' height='14' />".$senal;
        break;
	case '-77':
        echo "<img src='imagenes/77.png' width='149' height='14' />".$senal;
        break;
		case '-78':
        echo "<img src='imagenes/78.png' width='149' height='14' />".$senal;
        break;
		case '-79':
        echo "<img src='imagenes/79.png' width='149' height='14' />".$senal;
        break;
		case '-80':
        echo "<img src='imagenes/80.png' width='149' height='14' />".$senal;
        break;
		case '-81':
        echo "<img src='imagenes/81.png' width='149' height='14' />".$senal;
        break;
		case '-82':
        echo "<img src='imagenes/82.png' width='149' height='14' />".$senal;
        break;
		case '-83':
        echo "<img src='imagenes/83.png' width='149' height='14' />".$senal;
        break;
		case '-84':
        echo "<img src='imagenes/84.png' width='149' height='14' />".$senal;
        break;	
		

 
		
}
?>
                      
                    </center></td>
                        <td><center><?php echo $row[10];?></center></td>
        </tr>
         <?php }  ?> </tbody>
  </table>
  
</body>
</html>
