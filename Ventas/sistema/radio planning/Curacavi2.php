<?php   

include("../../../system/config.php");
include("../../../services/config.php");
$estacion= $_GET["estacion"];




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
$sql=mysql_query("SELECT estacion,funcion,ip,password,ancho_canal,frecuencia,ssid,remarks,puerto FROM INT_radio_planning WHERE estacion='Buin'");

//Sentencia sql (sin limit) 
$_pagi_sql = "SELECT estacion,funcion,ip,password,ancho_canal,frecuencia,ssid,remarks,puerto FROM INT_radio_planning WHERE estacion='Buin'"; 

//cantidad de resultados por página (opcional, por defecto 20) 



$_pagi_cuantos = 10; 

//Incluimos el script de paginación. Éste ya ejecuta la consulta automáticamente 
include("../../../paginator.inc.php"); 
echo "<center><table border = '0' cellspacing = '1' cellpadding='3'></center> \n";
echo "<tr> \n";
echo "<td bgcolor='#58ACC4'><font color='#ffffff'><center>Estación</center></td> \n";
echo "<td bgcolor='#58ACC4'><font color='#ffffff'><center>Función</center></td> \n";
echo "<td bgcolor='#58ACC4'><font color='#ffffff'><center>Direccion IP</font></td> \n";

echo "<td bgcolor='#58ACC4'><font color='#ffffff'><center>Ancho Canal</center></td> \n";
echo "<td bgcolor='#58ACC4'><font color='#ffffff'><center>Frecuencia</center></td> \n";
echo "<td bgcolor='#58ACC4'><font color='#ffffff'><center>SSID/Remarks</center></td> \n";

echo "<td bgcolor='#58ACC4'><font color='#ffffff'><center>Google Earth</center></td> \n";
echo "<td bgcolor='#58ACC4'><font color='#ffffff'><center>Modificar</center></td> \n";
echo "<td bgcolor='#58ACC4'><font color='#ffffff'><center>Más Info</center></td> \n";
echo "</tr> \n";
while ($row = mysql_fetch_row($_pagi_result)){
echo "<tr> \n";
echo "<td><center>$row[0]</center></td> \n";
echo "<td><center>$row[1]</center></td> \n";
echo "<td><center><a style='color:#000'  href='http://$row[2]:$row[8]' >$row[2]</center></td> \n";

echo "<td><center>$row[4]</center></td> \n";
echo "<td><center>$row[5]</center></td> \n";
echo "<td>$row[7]</td> \n";
echo "<td><center><a style='color:#000'  href='comprobacion_kmz2.php?remarks=$row[7]&ssid=$row[8]' target='popup' onclick='window.open('', 'popup', 'width=300,height=200')' text-decoration:none>Descargar KML</a></center></td> \n";
echo "<td><center><a style='color:#000'  href='comprobacion_editar.php?remarks=$row[7]&ip=$row[2]' text-decoration:none><img src='../../../images/editar.png'  alt='Editar'/></a></center></td> \n";

echo "<td><center><a style='color:#000'  href='comprobacion_mas_info.php?remarks=$row[7]&ip=$row[2]' text-decoration:none><img src='../../../images/mas.png'  alt='Eliminar'/></a></center></td> \n";
echo "</tr> \n";

}
echo "</table></center> \n";
echo"<p>".$_pagi_navegacion."</p>";
mysql_free_result($sql);
mysql_free_result($sql2);
?>
</body>
</html>
