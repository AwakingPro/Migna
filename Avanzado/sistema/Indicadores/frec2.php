<?php
require("../../../system/config.php");
$estacion='Yerbas Buenas';
$frecuencia1="5000";
$frecuencia2="5800";
$sql=mysql_query("SELECT ip,frecuencia,ancho_canal FROM INT_radio_planning WHERE estacion='$estacion' and frecuencia BETWEEN '$frecuencia1' and '$frecuencia2' ORDER by frecuencia ASC");


?>
<form action="frec.php" method="post">
<?php
$i=1;
while ($row = mysql_fetch_row($sql))

{



	echo "<input type='text' name='i$i' value='$row[0]'><input type='text' name='frec$i' value='$row[1]'><input type='text' name='a$i' value='$row[2]'><br>";
	$i++;	
}


$sql2 = "SELECT COUNT(*)  FROM INT_radio_planning WHERE estacion='$estacion' and frecuencia BETWEEN '$frecuencia1' and '$frecuencia2'";
$resultado = mysql_query($sql2);

$select=mysql_query("SELECT ip,frecuencia,ancho_canal FROM INT_radio_planning WHERE estacion='$estacion' and frecuencia BETWEEN '$frecuencia1' and '$frecuencia2'");
if (mysql_num_rows($select)>0){
 $row = mysql_fetch_array($resultado);
 echo  $count=$row[0];
}
?>
<input type="hidden" value="<?php echo $estacion;?>" name="estacion"/>
<input type="hidden" value="<?php echo $count;?>" name="count"/>
<input type="hidden" value="<?php echo $frecuencia1;?>" name="frecuencia1"/>
<input type="hidden" value="<?php echo $frecuencia2;?>" name="frecuencia2"/>
<input type='submit' value='Graficar'>
</form>