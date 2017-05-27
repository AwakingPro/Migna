<?php
include('system/config.php');

$nombre=$_POST['nombre'];
$comentario=$_POST['comentario'];
$hora= date("G:H:s");
$fecha= date("Y-m-d");
$responsable=$_POST['responsable'];

$insert="INSERT INTO INV_orden (nombre,comentario,hora,fecha,responsable) VALUES ('$nombre','$comentario','$hora','$fecha','$responsable')";
mysql_query($insert);

$sql=mysql_query("SELECT id FROM INV_orden WHERE nombre='$nombre' AND fecha='$fecha' AND hora='$hora' LIMIT 1");
while($row=mysql_fetch_array($sql)){
  $id=$row[0];
}

echo "<input type='hidden' value='$id' id='prueba' name='prueba'>";
		
?>		