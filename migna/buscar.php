<?php
include('system/config.php');

$mac=$_POST['mac'];
$resp=$_POST['resp'];

$query=mysql_query("SELECT mac from INVENTARIO_base WHERE mac='$mac' LIMIT 1");
$query2=mysql_query("SELECT * from INVENTARIO_base WHERE mac='$mac' LIMIT 1");
if(mysql_num_rows($query)>0){

mysql_query("UPDATE INVENTARIO_base SET id_base='$resp' WHERE mac='$mac'");	

while($row=mysql_fetch_array($query2)){

$mac=$row['mac'];
$serial=$row['serial'];
$tipo=$row['tipo'];
$modelo=$row['modelo'];
}
echo "<tr><td >$tipo</td><td ><center>$modelo</center></td><td ><center>$mac</center></td><td><center>$serial</center></td></tr>";

}
else {

	echo "0";

}
		
?>		