<?php


include("../../../system/config.php");
$serial= $_GET["serial"];
$mac= $_GET["mac"];
$tipo= $_GET["tipo"];
$marca= $_GET["marca"];
$modelo= $_GET["modelo"];
$proveedor= $_GET["proveedor"];
$bodega= $_GET["bodega"];
  
$sql=mysql_query("SELECT serial,mac,tipo,marca,modelo,proveedor,bodega FROM INV_activos WHERE serial='$serial' or mac='$mac' or tipo='$tipo' or marca='$marca' or modelo='$modelo' or proveedor='$proveedor' or bodega='$bodega' ORDER BY bodega ASC");

echo "<center><table border = '0' cellspacing = '1' cellpadding='3'></center> \n";
echo "<tr> \n";
echo "<td bgcolor='#333'><font color='#FFFFFF'><center>Serial</center></td> \n";
echo "<td bgcolor='#333'><font color='#FFFFFF'><center>Mac</font></td> \n";
echo "<td bgcolor='#333'><font color='#FFFFFF'><center>Tipo</font></td> \n";
echo "<td bgcolor='#333'><font color='#FFFFFF'><center>Marca</font></td> \n";
echo "<td bgcolor='#333'><font color='#FFFFFF'><center>Modelo</font></td> \n";
echo "<td bgcolor='#333'><font color='#FFFFFF'><center>Proveedor</font></td> \n";
echo "<td bgcolor='#333'><font color='#FFFFFF'><center>Bodega</center></td> \n";
echo "<td bgcolor='#333'><font color='#FFFFFF'><center>Modificar</center></td> \n";
echo "<td bgcolor='#333'><font color='#FFFFFF'><center>Eliminar</center></td> \n";
echo "</tr> \n";

while ($row = mysql_fetch_row($sql)){
echo "<tr> \n";
echo "<td><center>$row[0]</center></td> \n";
echo "<td><center>$row[1]</center></td> \n";
echo "<td><center>$row[2]</center></td> \n";
echo "<td><center>$row[3]</center></td> \n";
echo "<td><center>$row[4]</center></td> \n";
echo "<td><center>$row[5]</center></td> \n";
echo "<td><center>$row[6]</center></td> \n";
echo "<td><center><a style='color:#000'  href='inventario_comprobacion_editar_activos.php?serial=$row[0]&mac=$row[1]&' text-decoration:none><img src='../../../images/editar.png'  alt='Editar'/></a></center></td> \n";
echo "<td><center><a href='inventario_comprobacion_eliminar_activos_definitivo.php?serial=$row[0]&mac=$row[1]'><img src='../../../images/eliminar.png'  alt='Eliminar'/></a></center></td> \n";
echo "</tr> \n";  



}
echo "</table></center> \n";


header("Content-Type: application/vnd.ms-excel");

header("Expires: 0");

header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

header("content-disposition: attachment;filename=NOMBRE.xlsx");
mysql_free_result($sql);
mysql_free_result($sql2);
?>


